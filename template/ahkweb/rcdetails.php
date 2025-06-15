<?php
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
<?php

if (isset($_POST['find'])) {
    $rc_no = mysqli_real_escape_string($ahk_conn, $_POST['rc_dl']);
    $cardtypeo = mysqli_real_escape_string($ahk_conn, $_POST['type']);

    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn, "SELECT * FROM pricing WHERE service_name='rc_print' "));
    $fee = $price['price'];
    
    // $fee = "50";
    $username = $udata['phone'];
    $wallet_amount = $udata['balance'];
    $debit_fee = $wallet_amount - $fee;

    if ($wallet_amount > $fee) {


        // $rctype = $_POST['rctype']; // "1" Chip, "2" Without Chip, "3" Without Chip New, "4" Chip New
        $apikey = $tng_apikey;

        // URL ke through hi parameters 
        $url = "https://secure.thenextgenapi.co.in/vehicle_rcpdf_verification?rcno=$rc_no&rctype=$cardtypeo&apikey=$apikey";

        $curl = curl_init();
        curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST', // 
        ]);

        $response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($response, true);
        // Continue processing the result
        $statusMessage = $result['message'];
        $check_code = $result['sampleCode'];
        $bik_number = $result['rcno'];
        $name = $result['fullname'];
        $fathername = $result['fathername'];
        $address = $result['fulladdress'];
        $error = $result['error'];
        $file = $result['Rc_Pdf'];
       
       if ($error) {
            ?>
            <script>
                $(function(){
                    Swal.fire(
                        '<?php echo $error; ?>',
                        'Contact ADMIN',
                        'warning'
                    )
                });
                window.setTimeout(function(){
                    window.location.href='rc_get.php';
                },20000);
            </script>
            <?php
            } else if ($result['sampleCode'] == "200") {
            $debit = mysqli_query($ahk_conn, "UPDATE users SET balance=balance-$fee WHERE phone='$username'");
            date_default_timezone_set("Asia/Kolkata");
            $time_hkb = date('d/m/Y g:i:s');
            $insert = mysqli_query($ahk_conn, "INSERT INTO `rc_vehical`(`username`, `rc_vehical_no`, `status`, `pdf`, `date`) VALUES ('$username','$bik_number', '$statusMessage','$file','$time_hkb')");
            if (!$insert) {
                die('Error: ' . mysqli_error($ahk_conn));
            }
               $updatehistory = mysqli_query($ahk_conn,"INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$username','$fee','$debit_fee','RC Vehical PDF','1','Debit')");

        if ($insert) {
                ?>
                <script>
                    $(function(){
                        Swal.fire(
                            'Download Successfully, RC <?php echo $bik_number; ?>',
                            'Server : <?php echo $statusMessage ?>!',
                            'success'
                        )
                    })
                    setTimeout(() => {
                        window.location='rc_get_list.php';
                    }, 3000);
                </script>
                <?php
            }
        }
    } else {
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Opps',
                    'Wallet Balance Insufficient! Please Recharge ',
                    'error'
                )
            });
            window.setTimeout(function(){
                window.location.href='wallet.php';
            },4000);
        </script>
        <?php
    }
}
?>

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
			
<div class="content-wrap">
    <div class="main">
        <div class="col-md-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert alert-dark" role="alert">
                                    We Are Trying Our Best
                                    <a href="#" class="alert-link">RC BOOK / OWNER BOOK PDF DOWNLOAD</a>
                                </div>
                                <form name="" action="" method="post" id="Job_print">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="card-title" for="rc_dl">Enter Vehicle Number</label>
                                                <input type="text" required="" class="form-control" name="rc_dl" id="rc_dl" placeholder="BH01XX1454"  oninput="removeSpaces(this)">
                                            </div>
                                        </div>
                                        
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="card-title" for="type">Formate Card<span class="required-mark text-red" style="color:red;">*</span></label>
                                            <select name="type" id="type" required="" class="form-control">
                                                <option value="">-Select Card-</option>
                                                 <option value="1">Chip</option>
                                                <option value="2">Without Chip</option>
                                                <option value="3">Without Chip New</option>
                                                <option value="4">Chip New</option>
                                            </select>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row row-sm mg-t-20">
                                        <div class="col">
                                            <button type="submit" name="find" class="btn btn-primary w-100"><i class="fa fa-check-circle"></i> Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function removeSpaces(inputElement) {
    inputElement.value = inputElement.value.replace(/\s/g, '');
}
</script>
<?php include("footer.php");?>
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