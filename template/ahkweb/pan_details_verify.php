<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <title>PAN Verification</title>
</head>

<body>

<?php
include('header.php');

// Check if PAN is submitted
if (isset($_POST['verify_pan'])) {
    $pan_no = $_POST['pan_no'];
    $api_key = "915917dbb254fc6852b189be2fb92bd23010f9c033a2cf64340dc8521b81cc2e";   // api buy from https://axendone.xyz

    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn, "SELECT * FROM pricing WHERE service_name='pan_details_verify' "));
    $fee = $price['price'];
    $username = $udata['phone'];
    $wallet_amount = $udata['balance'];

    // Check wallet balance
    if ($wallet_amount < $fee) {
        ?>
        <script>
            $(function() {
                Swal.fire(
                    'Insufficient Balance',
                    'Your wallet balance is too low to process this request',
                    'error'
                );
            });
            setTimeout(() => {
                window.location.href = 'wallet.php';
            }, 2000);
        </script>
        <?php
    } else {
        // API Request
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://test.axenapi.co.in/Dashboard/Verify_api/pan_advance/pan_api.php?api=$api_key&pan_no=$pan_no",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $json = json_decode($response, true);
        $status = $json['status'];
        $code = $json['code'];
        $error = $json['error'];
        $message = $json['message'];
        $name = $json['name'];
        $fathername = $json['fathername'];
        $gender = $json['gender'];
        $dob = $json['dob'];
        date_default_timezone_set("Asia/Kolkata");
        $time_hkb = date('d/m/Y g:i:s');
        if (isset($json['status']) && $json['status'] == 'success' && isset($json['code']) && $json['code'] == '200') {
            // Deduct fee from the wallet
            $debit_fee = $wallet_amount - $fee;
            $debit = mysqli_query($ahk_conn, "UPDATE users SET balance=balance-$fee WHERE phone='$username'");
            
            $query=mysqli_query($ahk_conn,"INSERT INTO `pan_verify_hkb`(`name`, `fathername`, `gender`, `dob`, `pan`, `username`,`date`)  VALUES ('$name','$fathername','$gender','$dob','$pan_no','$username','$time_hkb')");
            $updatehistory = mysqli_query($ahk_conn,"INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$username','$fee','$debit_fee','PAN Details Verify','1','Debit')");

        }
    }
}
?>

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">PAN DOB FIND</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">New APPLY</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
        <div class="main">
            <div class="col-md-12">
                <div class="main-content">
                    <div class="col-md-12">
                        <div class="card card-default">
                            <div class="card-header bg-warning">
                                <div class="card-title">
                                    <h3><strong>Enter PAN Details</strong></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="card col-12">
                            <hr>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <form name="" action="" method="post" id="pan_verification">
                                                <div class="card-body">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="card-title" for="pan_no">PAN Number</label>
                                                            <input type="text" required="" class="form-control" name="pan_no" id="pan_no" placeholder="ENTER PAN NUMBER">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 ml-2">
								                	<h5 class="text-warning ">Application Fee: <?php  
								                		$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT price FROM pricing WHERE service_name='pan_details_verify'")); 
								                		echo "₹" .$price['price'];
								                		?></h5>
								                </div>
                                                <div class="row row-sm mg-t-20">
                                                    <div class="col-lg">
                                                        <button type="submit" name="verify_pan" class="btn btn-primary w-100"><i class="fa fa-check-circle"></i> Verify PAN</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php if ($status == 'success') { ?>
                                        <div class="result-container" id="image_pr">
                                            <div class="alert alert-success" role="alert">
                                                <strong><?php echo $status; ?></strong><br>
                                                Name: <?php echo $name; ?><br>
                                                Father's Name: <?php echo $fathername; ?><br>
                                                Gender: <?php echo $gender; ?><br>
                                                Date of Birth: <?php echo $dob; ?><br><br>
                                                Power By HKB!<br><br>
                                               <button id="printButton" class="btn btn-info mt-3" onclick="captureAndDownload()">Print</button>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($status == 'fail') { ?>
                                        <div class="result-container">
                                            <div class="alert alert-danger" role="alert">
                                                Status=<?php echo $status; ?><br>
                                                <strong><?php echo $message; ?></strong><br>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($error) { ?>
                                        <div class="result-container">
                                            <div class="alert alert-danger" role="alert">
                                                <strong><?php echo $error; ?></strong><br>
                                                Contact Admin Immeddiately !
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add your footer content here -->

    <script src="../template/ahkweb/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../template/ahkweb/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="../template/ahkweb/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="../template/ahkweb/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="../template/ahkweb/assets/js/app.js"></script>
</body>
<script>
    function captureAndDownload() {
        // Specify the target element for capture
        var targetElement = document.getElementById('image_pr');

        // Use html2canvas to capture the content of the target element
        html2canvas(targetElement).then(function (canvas) {
            // Convert the canvas to a data URL
            var imageDataUrl = canvas.toDataURL('image/jpeg');

            // Create a link element for downloading the image
            var downloadLink = document.createElement('a');
            downloadLink.href = imageDataUrl;
            downloadLink.download = 'Hkb_pan_image.jpg'; // Set the desired filename

            // Trigger a click event on the link to start the download
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
        });
    }
</script>
</html>
