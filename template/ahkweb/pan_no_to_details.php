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
    $api_key = "915917dbb254fc6852b189be2fb92bd23010f9c033a2cf64340dc8521b81cc2e";   // api buy from https://axenapi.online

    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn, "SELECT * FROM pricing WHERE service_name='pan_verify_hkb' "));
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
            CURLOPT_URL => "https://kyc-api.co.in/api/pan_details?panno=$pan_no",
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
        if (isset($json['status']) && $json['status'] == 'success' && isset($json['code']) && $json['code'] == '200') {
            // Deduct fee from the wallet
            $debit_fee = $wallet_amount - $fee;
            $debit = mysqli_query($ahk_conn, "UPDATE users SET balance=balance-$fee WHERE phone='$username'");
            
            $query=mysqli_query($ahk_conn,"INSERT INTO `pan_verify_hkb`(`name`, `fathername`, `gender`, `dob`, `pan`, `username`)  VALUES ('$name','$fathername','$gender','$dob','$pan_no','$username')");
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

            <div class="ps-3">
                <nav aria-label="breadcrumb">

                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">INSTNAT PAN DETAILS FIND SERVICE
                    <hr />
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-id-card me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Enter Pan Details</h5>
                            </div>
                            <hr>
                                            
                                                <form action="" method="POST" id="pan_verification" class="row g-3">
                                               
                                                     <div class="col-md-3">
                                                            <label for="inputLastName" class="form-label">Pan Number</label>
                                                            <input type="text" required="" class="form-control" name="pan_no" id="pan_no" placeholder="ENTER PAN NUMBER">
                                                        </div>
                                                 

                                                <div class="col-12 ml-2">
								                	<h5 class="text-warning ">Application Fee: <?php  
								                		$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT price FROM pricing WHERE service_name='pan_details'")); 
								                		echo "₹" .$price['price'];
								                		?></h5>
								                </div>
                                                 <div class="col-12">
                                                        <button type="submit" name="verify_pan" class="btn btn-primary px-5"> Verify PAN</button>
                                                    </div>
                                               
                                            </form>
                                        </div>
                                    </div>
                                    <?php if ($status == 'success') { ?>
                                        <div class="result-container" id="image_pr">
                                                <div class="alert alert-Success" role="alert">
                                                <strong><?php echo $status; ?></strong><hr>
                                                <h5>Pan No : <?php echo $pan_no; ?><hr></h5>
                                                <h5><h5>Name : <?php echo $name; ?></h5><hr>
                                                <h5>Father's Name : <?php echo $fathername; ?></h5><hr>
                                                <h5>Gender : <?php echo $gender; ?></h5><hr>
                                                <h5>Date of Birth : <?php echo $dob; ?></h5><hr>
                                                Power By Instnat Find!<br>
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
            downloadLink.download = 'Digital_PanGet_image.jpg'; // Set the desired filename

            // Trigger a click event on the link to start the download
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
        });
    }
</script>
</html>
