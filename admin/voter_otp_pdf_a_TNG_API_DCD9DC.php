<?php
session_start();
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/header.php');

$appliedby = $udata['phone']; 
$TNG_APIKE = $tng_apikey;
$tng_url="https://secure.thenextgenapi.co.in";
$fee = 15; // service fee
$resdata = [];
$showOtpForm = false;
$epic = '';
$otp = '';
$showPdfButton = false;  

if (!empty($_SESSION['otp_sent']) && !empty($_SESSION['otp_epic'])) {
    $showOtpForm = true;
    $epic = $_SESSION['otp_epic'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $epic = trim($_POST['epic'] ?? '');
    $otp = trim($_POST['otp'] ?? '');

    
    if (!empty($epic) && empty($otp)) {
        $url = "$tng_url/voter_otp_verification.php?epic_number=" . urlencode($epic);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $response = false;
        }
        curl_close($ch);

        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";

        if ($response === false) {
            echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Failed to connect to OTP API.', timer: 4000 });</script>";
        } else {
            $resdata = json_decode($response, true);
            if (($resdata['Message'] ?? '') === 'Failed') {
                $errorMsg = htmlspecialchars($resdata['error'] ?? 'Unknown error');
                echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: '$errorMsg', timer: 4000 });</script>";
            } elseif (($resdata['sampleCode'] ?? '') === "200") {
              
                $_SESSION['otp_sent'] = true;
                $_SESSION['otp_epic'] = $epic;
                $showOtpForm = true;
                echo "<script>Swal.fire({ icon: 'success', title: 'OTP Sent', text: 'OTP sent successfully to voter number $epic', timer: 2500 });</script>";
            }
        }
    }
   
    elseif (!empty($epic) && !empty($otp)) {
        if ($udata['balance'] >= $fee) {
            $url = "$tng_url/voter_pdf_verification.php?epic_number=" . urlencode($epic) .
                   "&otp=" . urlencode($otp) .
                   "&apikey=" . urlencode($TNG_APIKE);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                $response = false;
            }
            curl_close($ch);

            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";

            if ($response === false) {
                echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Failed to connect to Verification API.', timer: 4000 });</script>";
                $showOtpForm = true;
            } else {
                $resdata = json_decode($response, true);

                if (($resdata['Message'] ?? '') === 'Failed') {
                    $errorMsg = htmlspecialchars($resdata['error'] ?? 'Verification failed');
                    echo "<script>Swal.fire({ icon: 'error', title: 'Verification Failed', text: '$errorMsg', timer: 4000 });</script>";
                    $showOtpForm = true;
                } elseif (($resdata['sampleCode'] ?? '') === "200") {
                   
                    $update = $ahk_conn->prepare("UPDATE users SET balance = balance - ? WHERE phone = ?");
                    $update->bind_param("is", $fee, $appliedby);
                    $update->execute();

                  
                    $purpose = "Voter PDF OTP Verification";
                    $status = "1";
                    $type = "Debit";

                    $stmtBalance = $ahk_conn->prepare("SELECT balance FROM users WHERE phone = ?");
                    $stmtBalance->bind_param("s", $appliedby);
                    $stmtBalance->execute();
                    $resultBalance = $stmtBalance->get_result()->fetch_assoc();
                    $currentBalance = $resultBalance['balance'] ?? 0;
                    $stmtBalance->close();

                    $stmt = $ahk_conn->prepare("INSERT INTO `wallethistory` (`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("idissi", $appliedby, $fee, $currentBalance, $purpose, $status, $type);
                    $stmt->execute();
                    $stmt->close();

                    echo "<script>Swal.fire({ icon: 'success', title: 'Verification Successful', text: 'Voter PDF Verified Successfully!', timer: 3000 });</script>";

                 
                    unset($_SESSION['otp_sent']);
                    unset($_SESSION['otp_epic']);

                 
                    $showPdfButton = true;
                }
            }
        } else {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>Swal.fire({ icon: 'error', title: 'Wallet Low', text: 'Please Recharge Now!', timer: 2500 });setTimeout(() => { window.location = 'wallet.php'; }, 2000);</script>";
            $showOtpForm = true;
        }
    }
}

?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="content-wrap">
 <div class="main">
  <div class="page-wrapper">
    <div class="page-content">
      <div class="mobile-menu-overlay"></div>
      <div class="main-container">
        <div class="col-lg-12">
          <div class="card" style="margin-left: 10px; padding-left: 30px; padding-top: 12px; box-shadow: 1px 5px 5px 5px;">
            <div class="stat-widget-two">
              <div class="stat-content">
                <div class="stat-text">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card">
                          <div class="card-body">
                            <div class="alert alert-info" role="alert">
                              Voter PDF OTP Verification
                            </div>
                            <form action="" method="POST" class="row g-3">
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="epic">Enter Voter Number</label>
                                  <input name="epic" type="text" id="epic" placeholder="Enter Voter Number" value="<?= htmlspecialchars($epic) ?>" class="form-control" required <?= $showOtpForm ? 'readonly' : '' ?>>
                                </div>
                              </div>

                              <?php if ($showOtpForm): ?>
                              <div class="card-body">
                                <div class="form-group mt-2">
                                  <label for="otp">Enter OTP</label>
                                  <input name="otp" type="text" id="otp" placeholder="Enter OTP" class="form-control" required autofocus>
                                </div>
                              </div>
                              <?php endif; ?>

                              <hr>
                              <div class="row mt-3">
                                <div class="col-md-6">
                                  <input class="form-control" value="Fee ₹ <?= $fee ?>" readonly>
                                </div>
                                <div class="col-md-6 text-end">
                                  <button class="btn btn-primary" name="submit" id="submit">
                                    <i class="fa fa-check-circle"></i>
                                    <?= $showOtpForm ? 'Verify OTP' : 'Send OTP' ?>
                                  </button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <?php if (!empty($resdata['sampleCode']) && $resdata['sampleCode'] === "200" && !empty($resdata['epic_number'])): ?>
                      <div class="col-lg-8 col-md-6 col-sm-6">
                        <div class="card" style="background-color: #E8F6F3;">
                          <div class="card-body">
                            <h5 class="mb-3">Voter PDF Verification Result</h5>
                            <table class="table table-bordered table-striped">
                              <tbody>
                             
                                <?php if ($showOtpForm && !$showPdfButton): ?>
                                    <tr><th>Voter Number</th><td><?= htmlspecialchars($resdata['epic_number']) ?></td></tr>
                                    <tr><th>Name</th><td><?= htmlspecialchars($resdata['fullname']) ?></td></tr>
                                    <tr><th>Father Name</th><td><?= htmlspecialchars($resdata['fathername'] ?? '') ?></td></tr>
                                    <tr><th>State Name</th><td><?= htmlspecialchars($resdata['state'] ?? '') ?></td></tr>
                                    <tr><th>Message</th><td><?= htmlspecialchars($resdata['message'] ?? '') ?></td></tr>
                                <?php endif; ?>

                               
                                <?php if ($showPdfButton): ?>
                                    <tr><th>Voter Number</th><td><?= htmlspecialchars($resdata['epic_number']) ?></td></tr>
                                    <tr><th>Name</th><td><?= htmlspecialchars($resdata['fullname']) ?></td></tr>
                                    <tr><th>Father Name</th><td><?= htmlspecialchars($resdata['fathername'] ?? '') ?></td></tr>
                                    <tr><th>State Name</th><td><?= htmlspecialchars($resdata['state'] ?? '') ?></td></tr>
                                    <tr><th>Message</th><td><?= htmlspecialchars($resdata['message'] ?? '') ?></td></tr>
                                    <tr><th>PDF</th>
                                      <td>
                                        <a href="<?= htmlspecialchars($resdata['Voter_pdf'] ?? '#') ?>" 
                                           download="<?= htmlspecialchars($resdata['epic_number']) ?>.pdf" 
                                           target="_blank" 
                                           class="btn btn-success">
                                          Download PDF
                                        </a>
                                      </td>
                                    </tr>
                                <?php endif; ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <?php endif; ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br><br><br><br>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
<script src="../template/ahkweb/assets/js/bootstrap.bundle.min.js"></script>
<script src="../template/ahkweb/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="../template/ahkweb/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="../template/ahkweb/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="../template/ahkweb/assets/js/app.js"></script>
</body>
</html>
