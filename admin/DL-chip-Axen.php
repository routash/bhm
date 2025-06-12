<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/header.php');
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php
if (isset($_POST['A2A']) && $_POST['A2A'] == "Axen") {
    $dl = mysqli_real_escape_string($ahk_conn,$_POST['dl']);
    $type = mysqli_real_escape_string($ahk_conn,$_POST['type']);
    $application_no = "Axen_".rand(000000,999999);
   
   $apiKey = "DL_HD_apikey";     // change apikey from your api DRIVING LICENCE HD apikey from axendone.xyz
   
    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='dl_gf_instant' "));
    $fee = $price['price'];
    $username = $udata['phone'];
    $wallet=$udata['balance'];
    
    if($wallet > $fee){
    $debit_fee =  $wallet - $fee;

    $curl = curl_init();
    curl_setopt_array($curl, array( 
      CURLOPT_URL => "https://test.axenapi.co.in/Dashboard/Verify_api/Dl/DL-chip-v2.php?api=$apiKey&dl=$dl&type=$type",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));

       $response = curl_exec($curl);
       curl_close($curl);

      $resdata = json_decode($response, true);
      // Check for cURL errors
       $name=$resdata['name'] ?? '';
       $dob=$resdata['dob'] ?? '';
       $dlNumber=$resdata['dlno'] ?? '';
       $pdf=$resdata['pdf'] ?? '';
if($resdata['error']){
    ?>
     <script>
            $(function(){
                Swal.fire(
                    '<?php echo $resdata['error']; ?>',
                    'Something Went Wrong',
                    'warning'
                )
            });
            window.setTimeout(function(){
                window.location.href='';
            },20000);
            
        </script>
        <?php
}else if($resdata['pdf'] ==''){
    
    ?>
     <script>
            $(function(){
                Swal.fire(
                    '<?php echo $response; ?>',
                    'Please Contact Admin : ',
                    'error'
                )
            });
            window.setTimeout(function(){
                window.location.href='';
            },200000);
            
        </script>
        <?php
}else{
     $debit = mysqli_query($ahk_conn,"UPDATE `users` SET balance='$debit_fee' WHERE phone='$username'");
     if($debit){
      $insert = mysqli_query($ahk_conn, "INSERT INTO dlprint (application_no,username,dl_no,dob,status, fee,pdf) VALUES ('$name','$username','$dlNumber', '$dob','success', '$fee','$pdf');");
      
           if($insert){
          ?>
           <script>
                        $(function(){
                            Swal.fire(
                                'Dl : <?php echo $dl;?> is Downloaded',
                                'Application : <?php echo $application_no; ?> Message : File Generated?>',
                                'success'
                            )
                        })
                        setTimeout(() => {
                            window.location='Dl_pdf_list.php';
                        }, 1200);
                    </script>
          <?php
      }
     
     }
}
    
    }else{
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Opps',
                    'Wallet Balance Insufficient ! Please Recharge ',
                    'error'
                )
            });
            window.setTimeout(function(){
                window.location.href='wallet.php';
            },);
            
        </script>
        <?php
    }

}

?>

<!-- Start Page Wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!-- Page Header -->
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">DL PDF FIND</h6>
                <hr />
                <!-- Card Section -->
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <!-- Card Title -->
                        <div class="card-title d-flex align-items-center">
                            <div>
                                <i class="bx bxs-id-card me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Enter DL Number Details</h5>
                        </div>
                        <hr />

                        <!-- Content Wrapper -->
                        <div class="content-wrap">
                            <div class="main">
                                <div class="col-md-12">
                                    <div class="main-content">
                                        <!-- Section Header -->
                                        <div class="section-header">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <!-- Placeholder for Additional Information -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Card Details -->
                                        <div class="col-md-12">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <h3><strong> यदि इस सर्वर में डेटा नहीं आ रहा है तो हमारे अन्य सर्वर के साथ HD सर्वर का उपयोग करें - ( If data is not coming in this server then use HD server along with our other servers )</strong></h3>
                                                        <h4>Disclaimer: CHARGE - ₹ 
                                                            <?php 
                                                                $price = mysqli_fetch_assoc(mysqli_query($ahk_conn, "SELECT * FROM pricing WHERE service_name='dl_gf_instant'")); 
                                                                echo $price['price']; 
                                                            ?>, FAST SERVICE
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Form Section -->
                                        <div class="container-fluid">
                                            <div class="card col-12">
                                                <hr />
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form name="" action="" method="post" id="dlprint">
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label class="card-title" for="dl">DL Number</label>
                                                                            <input type="hidden" name="A2A" value="Axen" />
                                                                            <input type="text" class="form-control" name="dl" id="dl" placeholder="Enter DL Number" oninput="this.value = this.value.replace(/\s/g, '')" />
                                                                        </div>
                                                                         <!-- Card Background -->
                                                                        <div class="form-group">
                                                                            <label class="card-title" for="type">Card Formate<span class="required-mark text-red">*</span></label>
                                                                            <select name="type" id="type" required class="form-control">
                                                                                <option selected value="chip">CHIP</option>
                                                                                <option value="nochip">WITHOU CHIP</option>
                                                                            </select>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-actions">
                                                                            <div class="text-left">
                                                                                <button type="submit" class="btn btn-info">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Form Section -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Content Wrapper -->
                    </div>
                </div>
                <!-- End Card Section -->
            </div>
        </div>
    </div>
</div>
<!-- End Page Wrapper -->

<?php 
include('footer.php');
?>
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