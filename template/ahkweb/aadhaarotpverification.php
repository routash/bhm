<?php 
include('header.php');

$otpSent = $success = $error = $loggedIn = false;

if (isset($_POST['otp']) && !empty($_POST['otp']) && isset($_POST['mobileNo']) && !empty($_POST['mobileNo'])) {
    $mobileNo = trim($_POST['mobileNo']);
    $otp = trim($_POST['otp']);
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://test.axenapi.co.in/Dashboard/Verify_api/aaOTP/verify_otp.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query(['mobileNo' => $mobileNo, 'otp' => $otp]),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'User-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    $res = json_decode($response, true);
    if ($res['status'] == true) {
        $success = $res['message'];
        $loggedIn = true;
        $jwtToken = $res['token'];
        $_SESSION['es_jwtToken'] = $jwtToken;
        $_SESSION['es_saltValue'] = $otp;
        $_SESSION['es_mobileNo'] = $mobileNo;
        echo '<script>alert("'.$res['message'].'");window.location.replace("aadhaarprint.php");</script>';
    } else {
        $error = $res['message'];
        echo '<script>alert("'.$res['message'].'");window.location.replace("aadhaarotpverification.php");</script>';
    }
} elseif (isset($_POST['mobileNo']) && !empty($_POST['mobileNo'])) {
    $mobileNo = trim($_POST['mobileNo']);
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://test.axenapi.co.in/Dashboard/Verify_api/aaOTP/send_otp.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query(['mobileNo' => $mobileNo]),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'User-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    
    $res = json_decode($response, true);
    if ($res['status'] == true) {
        $success = $res['message'];
        $otpSent = true;
        echo '<script>alert("'.$res['message'].'");</script>';
    } else {
        $error = $res['message'];
        echo '<script>alert("'.$res['message'].'");</script>';
    }
}
?>

<!-------start link for popup video-------->
<link rel="stylesheet" href="popup/videopopup.css" />
<!-------stop link for popup video-------->

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

            <div class="ps-3">
                <nav aria-label="breadcrumb">

                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-10 mx-auto">
           <h6 class="mb-0 text-uppercase">Aadhaar Advance FingerPrint</h6>
               <hr />
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-id-card me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Enter Mobile Details ( कृप्या ध्यान दें :- आप किसी का भी मोबाइल नंबर डाल कर OTP ले सकते है आधार प्रिंट करने के लिए)</h5>
                            </div>
                            <hr>
                                 <form action="" method="POST" class="row g-3">
                                    <div class="col-md-4">
                                        <label for="inputLastName" class="form-label">Enter Mobile Number</label>
                           
                                        <div class="input-group">
                                            <input name="mobileNo" type="text" autofocus maxlength="10" value="<?= htmlspecialchars($mobileNo ?? '') ?>" class="form-control vd_Required A_AadharNo" aria-describedby="Help" autocomplete="off" <?= $otpSent ? 'readonly' : '' ?> placeholder="******4512" />
                                        </div>
                                    </div>
                                    <?php if ($otpSent) : ?>
                                         <div class="col-md-4">
                                            <label for="otp" class="form-label">Enter OTP</label>
                                            <div class="input-group">
                                                <input name="otp" type="text" autofocus maxlength="6" class="form-control vd_Required A_AadharNo" aria-describedby="Help" autocomplete="off" placeholder="******4512" />
                                            </div>
                                        </div>
                                    <?php endif; ?>
                       
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <button type="submit" id="submitBtn" class="btn btn-danger px-5"><?= $otpSent ? 'Submit' : 'Send OTP' ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php include('footer.php'); ?>
                </div>
</div>

<!-- Bootstrap JS -->
<script src="../template/ahkweb/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="../template/ahkweb/assets/js/jquery.min.js"></script>
<script src="../template/ahkweb/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="../template/ahkweb/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="../template/ahkweb/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="../template/ahkweb/assets/plugins/chartjs/chart.min.js"></script>
<script src="../template/ahkweb/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="../template/ahkweb/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../template/ahkweb/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="../template/ahkweb/assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
<script src="../template/ahkweb/assets/plugins/jquery-knob/excanvas.js"></script>
<script src="../template/ahkweb/assets/plugins/jquery-knob/jquery.knob.js"></script>
<script>
$(function() {
    $(".knob").knob();
});
</script>
<script src="../template/ahkweb/assets/js/index.js"></script>
<!--app JS-->
<script src="../template/ahkweb/assets/js/app.js"></script>
<!-- datatable -->
<script src="../template/ahkweb/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="../template/ahkweb/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
	
</body>



</html>
