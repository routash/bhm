<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/header.php');

if (isset($_POST['rationNumber'])) {
    $rationNumber = $_POST['rationNumber'] ?? null;
    
    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn, "SELECT * FROM pricing WHERE service_name='ration2_uid_findfee'"));
    $fee =$price['price'];
    $username = $udata['phone'];
    $wallet = $udata['balance'];

    if ($wallet > $fee) {
        $debit_fee = $wallet - $fee;

       $api_thenextgenapi =$tng_apikey; // Buy API from this website https://thenextgenapi.in
        $url = "https://secure.thenextgenapi.co.in/ration_to_aadhar_up_verification?ration_no=$rationNumber&apikey=$api_thenextgenapi";

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 40,
            CURLOPT_TIMEOUT => 40,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ]);

        $response = curl_exec($curl);
        curl_close($curl);
        $resdata = json_decode($response, true);

        if ($resdata['error']) {
            ?>
            <script>
                $(function(){
                    Swal.fire(
                        '<?php echo $resdata['error']; ?>',
                        'Please Try Correct Details',
                        'warning'
                    )
                });
                window.setTimeout(function(){
                    window.location.href='#';
                }, 20000);
            </script>
            <?php
        } elseif ($resdata['sampleCode'] == "200") {
            $debit = mysqli_query($ahk_conn, "UPDATE `users` SET balance='$debit_fee' WHERE phone='$username'");
            date_default_timezone_set('Asia/Kolkata');
            $timestamp = date("Y-m-d H:i:s");      
            $updatehistory = mysqli_query($ahk_conn,"INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$username','$fee','$debit_fee','Ration 2 uid Find','1','Debit')");


            ?>
            <script>
                $(function(){
                    Swal.fire(
                        'Found Successfully ',
                        'Status: <?php echo $resdata['message']; ?>!',
                        'success'
                    )
                })
                setTimeout(() => {
                    window.location='#';
                }, 12000);
            </script>
            <?php

        } 
    } else {
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Oops',
                    'Wallet Balance Insufficient! Please Recharge',
                    'error'
                )
            });
            window.setTimeout(function(){
                window.location.href='wallet.php';
            }, 10000);
        </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="main">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="main-content">
                                <div class="card card-default">
                                    <div class="card-header bg-warning">
                                        <div class="card-title">
                                            <h3><strong>RATION TO AADHAAR FIND INSTANT Only ( Uttar Pradesh )</strong></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-12">
                                    <hr>
                            <div class="row dgnform">
                                <form name="" action="" method="post" id="rasan_print">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="card-title" for="rationNumber">Ration Number <span class="required-mark text-red" style="color:red;">*</span></label>
                                                <input type="text" class="form-control" name="rationNumber" id="rationNumber" placeholder="Enter Ration Number">
                                            </div>
                                        </div>
                                            <div class="col-12 ml-2">
                                                <h5 class="text-warning">Application Fee: 
                                                    <?php  
                                                    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT price FROM pricing WHERE service_name='ration2_uid_findfee'")); 
                                                    echo "₹" .$price['price'];
                                                    ?>
                                                </h5>
                                            </div>
                                        <div class="row row-sm mg-t-20">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary w-100"><i class="fa fa-check-circle"></i> Submit</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
                    <div class="col-md-12">
                        <?php if (isset($resdata) && $resdata['sampleCode'] == "200") : ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                       
                                       <tr>
                                           <th class="text-center">Aadhar No</th>
                                           <th class="text-center"> Name</th>
                                           <th class="text-center">Fathername</th>
                                           <th class="text-center">Gender</th>
                                           <th class="text-center">DOB</th>
                                           <th class="text-center">Relation</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        // Display Data details
                                        if (!empty($resdata['data'])) :
                                            foreach ($resdata['data'] as $members): 
                                        ?>
                                            <tr>
                                                <td><?= $members['uidNumber']; ?></td>
                                                <td><?= $members['name']; ?></td>
                                                <td><?= $members['fathername']; ?></td>
                                                <td><?= $members['gender']; ?></td>
                                                <td><?= $members['dob']; ?></td>
                                                <td><?= $members['relation']; ?></td>
                                            </tr>
                                        <?php 
                                            endforeach; 
                                        else: 
                                        ?>
                                            <tr>
                                                <td> <button class="btn btn-success"><B> NOT FOUND</B></button></td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
    </div>
	<script src="../template/ahkweb/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<!-- <script src="../template/ahkweb/assets/js/jquery.min.js"></script> -->
	<script src="../template/ahkweb/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="../template/ahkweb/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="../template/ahkweb/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--app JS-->
	<script src="../template/ahkweb/assets/js/app.js"></script>
</body>
</html>


		<?php 
		include('../template/ahkweb/footer.php');
		?>