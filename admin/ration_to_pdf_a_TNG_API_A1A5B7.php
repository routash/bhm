<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/header.php');

// fetch fee from databasee 
$price = mysqli_fetch_assoc(mysqli_query($ahk_conn, "SELECT * FROM pricing WHERE service_name='ration_pdf_fee' "));
$fee = 20;

if ($_POST['ration_no'] && $_POST['rationtype']) {
    $ration_no = $_POST['ration_no'];
    $rationtype = $_POST['rationtype'];
    $appliedby = $udata['phone'];
    $debit_fee =  $udata['balance'] - $fee;

    if ($udata['balance'] >= $fee) {
        $apikey = $tng_apikey;
        $url = "$tng_url/ration_pdf_verification_v1?ration_no=$ration_no&rationtype=$rationtype&apikey=$apikey";

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
            $updatehistory = mysqli_query($ahk_conn, "INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$appliedby','$fee','$debit_fee','Ration To Pdf ','1','Debit')");
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
                                                         Ration PDF Verification
                                                    </div>
                                                    <form action="" method="POST" class="row g-3">
                                                        <div class="card-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="ration_no">Enter Ration Number</label>
                                                                    <input name="ration_no" type="text" id="ration_no" placeholder="Enter Ration Number" class="form-control" required>
                                                                </div>
                                                                
                                                                <div class="form-group mt-2">
                                                                    <label for="rationtype">Select Ration Type</label>
                                                                    <select name="rationtype" class="form-control" required>
                                                                        <option value="">Select Ration Type</option>
                                                                        <option value="new"> Mera Ration 2.0</option>
                                                                        <option value="old">Old Formet</option>
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
                                                        <h5 class="mb-3">Ration  Details</h5>
                                                        <table class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr><th>Ration Number</th><td><?php echo htmlspecialchars($resdata['ration_no']); ?></td></tr>
                                                                <tr><th>Name</th><td><?php echo htmlspecialchars($resdata['name']); ?></td></tr>
                                                                <tr><th>Dist Name</th><td><?php echo htmlspecialchars($resdata['DistName']); ?></td></tr>
                                                                <tr><th>State Name</th><td><?php echo htmlspecialchars($resdata['StateName']); ?></td></tr>
                                                                <tr><th>Message</th><td><?php echo htmlspecialchars($resdata['message']); ?></td></tr>
                                                                <tr><th>PDF</th><td><a href="<?php echo $resdata['Ration_Pdf']; ?>" 
                                                                          download="<?php echo htmlspecialchars($resdata['ration_no']); ?>.pdf"  target="_blank" class="btn btn-success">Download PDF</a></td></tr>
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
