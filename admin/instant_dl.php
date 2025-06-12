<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/header.php');

$price = mysqli_fetch_assoc(mysqli_query($ahk_conn, "SELECT * FROM pricing WHERE service_name='dl_pdf_fee' "));
$fee = 20;

if ($_POST['dl_number'] && $_POST['dob'] && $_POST['dltype']) {
    $dl_number = $_POST['dl_number'];
    $dob = $_POST['dob'];
    $dltype = $_POST['dltype'];
    $appliedby = $udata['phone'];
    $debit_fee = $udata['balance'] - $fee;

    if ($udata['balance'] >= $fee) {
        $apikey = 'YOUR_API_KEY';
        $url = "$tng_url/dl_pdf_verification_v1?dl_number=$dl_number&dob=$dob&dltype=$dltype&apikey=$tng_apikey";

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 60,
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        $resdata = json_decode($response, true);

        if ($resdata['Message'] === 'Failed') {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                Swal.fire({ icon: 'error', title: 'Error', text: '{$resdata['error']}', timer: 5000 });
                setTimeout(() => { window.location = ''; }, 5000);
            </script>";
        } elseif ($resdata['sampleCode'] === "200") {
            $debit = mysqli_query($ahk_conn, "UPDATE users SET balance=balance-$fee WHERE phone='$appliedby'");
            $updatehistory = mysqli_query($ahk_conn, "INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$appliedby','$fee','$debit_fee','DL PDF Verification','1','Debit')");
        }
    } else {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({ icon: 'error', title: 'Wallet Balance is Low!', text: 'Please Recharge Now!', timer: 2000 });
            setTimeout(() => { window.location = 'wallet.php'; }, 1200);
        </script>";
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
                                                         DL PDF Verification
                                                    </div>
                                                    <form action="" method="POST" class="row g-3">
                                                        <div class="card-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="dl_number">Enter DL Number</label>
                                                                    <input name="dl_number" type="text" id="dl_number" placeholder="Enter DL Number" class="form-control" required>
                                                                </div>
                                                                <div class="form-group mt-2">
                                                                    <label for="dob">Enter Date of Birth (DD-MM-YYYY)</label>
                                                                    <input name="dob" type="text" id="dob" placeholder="DD-MM-YYYY" class="form-control" required>
                                                                </div>
                                                                <div class="form-group mt-2">
                                                                    <label for="dltype">Select DL Type</label>
                                                                    <select name="dltype" class="form-control" required>
                                                                        <option value="">Select DL Type</option>
                                                                        <option value="1">Without Chip</option>
                                                                        <option value="2">Chip</option>
                                                                        <option value="3">Without Chip New</option>
                                                                    </select>
                                                                </div>
                                                                <hr>
                                                                <div class="row mt-3">
                                                                  <div class="col-md-6">
                                                                       <input class="form-control" value="Fee ₹ <?php echo $fee; ?>" readonly>
                                                                   </div>
                                                                   <div class="col-md-6 text-end">
                                                                       <button class="btn btn-primary" name="submit" id="submit"><i class="fa fa-check-circle"></i> Submit</button>
                                                                   </div>
                                                               </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if ($resdata['sampleCode'] === "200") { ?>
                                            <div class="col-lg-8 col-md-6 col-sm-6">
                                                <div class="card" style="background-color: #E8F6F3;">
                                                    <div class="card-body">
                                                        <h5 class="mb-3">DL Details</h5>
                                                        <table class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr><th>DL Number</th><td><?php echo htmlspecialchars($resdata['dl_number']); ?></td></tr>
                                                                <tr><th>Name</th><td><?php echo htmlspecialchars($resdata['fullname']); ?></td></tr>
                                                                <tr><th>Father Name</th><td><?php echo htmlspecialchars($resdata['fathername']); ?></td></tr>
                                                                <tr><th>Date of Birth</th><td><?php echo htmlspecialchars($resdata['dob']); ?></td></tr>
                                                                <tr><th>Address</th><td><?php echo htmlspecialchars($resdata['address']); ?></td></tr>
                                                                <tr><th>Message</th><td><?php echo htmlspecialchars($resdata['message']); ?></td></tr>
                                                                <tr><th>PDF</th><td><a href="<?php echo $resdata['Driving_Pdf']; ?>" 
                                                                          download="<?php echo htmlspecialchars($resdata['dl_number']); ?>.pdf"  target="_blank" class="btn btn-success">Download PDF</a></td></tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                         <?php } ?>
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

<?php include('footer.php'); ?>
<script src="../template/ahkweb/assets/js/bootstrap.bundle.min.js"></script>
<script src="../template/ahkweb/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="../template/ahkweb/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="../template/ahkweb/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="../template/ahkweb/assets/js/app.js"></script>
</html>
