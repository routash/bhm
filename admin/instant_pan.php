<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/header.php');

$price = mysqli_fetch_assoc(mysqli_query($ahk_conn, "SELECT * FROM pricing WHERE service_name='Aadhar_to_pan_fee' "));

$tngcharge = [
  'server_1' => 20,
  'server_2' => 25,
];

if (!empty($_POST['aadhar']) && !empty($_POST['type'])) {
    $aadhar = $_POST['aadhar'];
    $type   = $_POST['type'];

    $fee = $tngcharge[$type] ?? 40;

    $appliedby = $udata['phone'];
    $debit_fee = $udata['balance'] - $fee;

    if ($udata['balance'] >= $fee) {
        $apikey = "Your API key"; // Your API key
        $url = "$tng_url/pan_find_verification?aadhar=$aadhar&type=$type&apikey=$tng_apikey";

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 60,
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        $resdata = json_decode($response, true);

        if (isset($resdata['Message'])) {
            if ($resdata['Message'] === 'Failed') {
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({ icon: 'error', title: 'Error', text: '".addslashes($resdata['error'])."', timer: 5000 });
                    setTimeout(() => { window.location = ''; }, 5000);
                </script>";
            } 
            elseif ($resdata['sampleCode'] === "200") {
                mysqli_query($ahk_conn, "UPDATE users SET balance = balance - $fee WHERE phone = '$appliedby'");
                mysqli_query($ahk_conn, "INSERT INTO wallethistory(userid, amount, balance, purpose, status, type) VALUES ('$appliedby', '$fee', '$debit_fee', 'Aadhar PDF Verification', '1', 'Debit')");
            }
            elseif ($resdata['sampleCode'] === "208" && !empty($resdata['fetched_from_cache'])) {
            }
            else {
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({ icon: 'error', title: 'Error', text: 'Unexpected API response.', timer: 4000 });
                    setTimeout(() => { window.location = ''; }, 4000);
                </script>";
            }
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
                                                         Aadhar To Pan Verification
                                                    </div>
                                                    <form action="" method="POST" class="row g-3">
                                                        <div class="card-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="aadhar">Enter Aadhar Number</label>
                                                                    <input name="aadhar" type="text" id="aadhar" placeholder="Enter Aadhar Number" class="form-control" required>
                                                                </div>
                                                                
                                                                <div class="form-group mt-2">
                                                                    <label for="type">Select Server Type</label>
                                                                   <select name="type" id="serverType" class="form-control" required>
                                                                       <option value="">Select Server Type</option>
                                                                       <option value="server_1">Server 1</option>
                                                                       <option value="server_2">Server 2</option>
                                                                   </select>
                                                                </div>
                                                                <hr>
                                                                <div class="row mt-3">
                                                                  <div class="col-md-6">
                                                                      <input id="feeDisplay" class="form-control" value="Fee ₹ -" readonly>
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

                                       <?php if (!empty($resdata) && $resdata['sampleCode'] === "200" || $resdata['sampleCode'] === "208") { 
                                            $aadhar_display = htmlspecialchars($resdata['aadhar'] ?? '');
                                            $pan_display = htmlspecialchars($resdata['pan'] ?? '');
                                            $message_display = htmlspecialchars($resdata['message'] ?? '');
                                        ?>
                                        <div class="col-lg-8 col-md-6 col-sm-6">
                                            <div class="card" style="background-color: #E8F6F3;">
                                                <div class="card-body">
                                                    <div id="capture-area" style="padding: 10px; background: white; color: black;">
                                                        <h5 class="mb-3">Aadhar To Pan Find</h5>
                                                        <table class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr><th>Aadhar Number</th><td><?php echo $aadhar_display; ?></td></tr>
                                                                <tr><th>Pan Number</th><td><?php echo $pan_display; ?></td></tr>
                                                                <tr><th>Message</th><td><?php echo $message_display; ?></td></tr>
                                                            </tbody>
                                                        </table>

                                                        <p style="margin-top: 20px; font-weight: bold; text-align: center;">Developed by TheNextGenAPI</p>

                                                        <div class="text-center">
                                                            <button id="downloadBtn" class="btn btn-success mt-3">Download PNG</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            const aadharNumber = "<?php echo $aadhar_display; ?>";
                                            const panNumber = "<?php echo $pan_display; ?>";
                                        </script>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    document.getElementById("downloadBtn")?.addEventListener("click", function () {
        const element = document.getElementById("capture-area");
        html2canvas(element).then(canvas => {
            const image = canvas.toDataURL("image/png");
            const link = document.createElement("a");
            link.href = image;
            link.download = "aadhar_to_pan_" + aadharNumber + "_" + panNumber + ".png";
            link.click();
        });
    });
</script>

<script>
    const charges = <?php echo json_encode($tngcharge); ?>;
    document.getElementById('serverType').addEventListener('change', function () {
        const selected = this.value;
        const fee = charges[selected] ?? '-';
        document.getElementById('feeDisplay').value = "Fee ₹ " + fee;
    });
</script>

<?php include('footer.php'); ?>
<script src="../template/ahkweb/assets/js/bootstrap.bundle.min.js"></script>
<script src="../template/ahkweb/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="../template/ahkweb/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="../template/ahkweb/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="../template/ahkweb/assets/js/app.js"></script>
</html>
