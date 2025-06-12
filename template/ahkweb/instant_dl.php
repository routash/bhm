<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php
include('header.php');
include('../../includes/config.php');

if (isset($_POST['A2A']) && $_POST['A2A'] == "Axen") {
    $dl = mysqli_real_escape_string($ahk_conn,$_POST['dl']);
    $type = mysqli_real_escape_string($ahk_conn,$_POST['type']);
    $application_no = "skyline_dl_".rand(000000,999999);
   
    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='instant_dl' "));
    $fee = $price['price'];
    $username = $udata['phone'];
    $wallet=$udata['balance'];
    
    if($wallet > $fee){
    $debit_fee =  $wallet - $fee;

    $apik = "TNG-API-a99247-c48e00-610491-ebb2ec-449dea";
    $url = "https://secure.thenextgenapi.co.in/dl_pdf_verification_v1?dl_number=$dl&dltype=$type&apikey=$apik";
    $curl = curl_init();
    curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => 'POST',
    ]);

    $response = curl_exec($curl);
    curl_close($curl);
    $resdata = json_decode($response, true);

       $name=$resdata['fullname'] ?? '';
       $dob=$resdata['dob'] ?? '';
       $dlNumber=$resdata['dl_number'] ?? '';
       $pdf=$resdata['Driving_Pdf'] ?? '';

    //    $name='asdsa';
    //    $dob='asdsa';
    //    $dlNumber='asdsa';
    //    $pdf='asdsa';
    //    $resdata['error'] = '';
    //    $resdata['Driving_Pdf'] = 'sd';
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
}else if($resdata['Driving_Pdf'] ==''){
    
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
      $insert = mysqli_query($ahk_conn, "INSERT INTO instant_dl (application_no,username,appliedby,dl_no,dob,status, fee,pdf) VALUES ('$name','$username','$username','$dlNumber', '$dob','success', '$fee','$pdf');");
      
           if($insert){
          ?>
           <script>
                        $(function(){
                            Swal.fire(
                                'Dl : <?php echo $dl;?> is Downloaded',
                                'Application : <?php echo $application_no; ?> Message : File Generated',
                                'success'
                            )
                        })
                        setTimeout(() => {
                            // window.location='Dl_pdf_list.php';
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
                                                                $price = mysqli_fetch_assoc(mysqli_query($ahk_conn, "SELECT * FROM pricing WHERE service_name='instant_dl'")); 
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
                                                                                <option selected value="1">CHIP</option>
                                                                                <option value="2">WITHOU CHIP</option>
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
                                <div class="card radius-10">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h5 class="mb-0">All PUC CERTIFICATE LIST</h5>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="table-responsive">
                                            <table id="example2" class="table align-middle mb-0">
                                                <thead class="table-light">
                                                <tr>
                                                    <th class="text-center">SL.</th>
                                                    <th class="text-center">Appliedby</th>
                                                    <th class="text-center">Application No</th>
                                                    <th class="text-center">Apply Date</th>
                                                    <th class="text-center">Driving Licence</th>
                                                    <th class="text-center">Date of Birth</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $res = mysqli_query($ahk_conn,"SELECT * FROM instant_dl WHERE appliedby='".$udata['phone']."'  ORDER BY id DESC");
                                                if(mysqli_num_rows($res)>0){
                                                    $x=0;
                                                    while($data = mysqli_fetch_assoc($res)){
                                                        $x ++;
                                                        ?>
                                                        <tr>
                                                            <td class="text-center"><?= $x;?></td>
                                                            <td class="text-center"><?= $data['appliedby'];?></td>
                                                            <td class="text-center"><?= $data['application_no'];?></td>
                                                            <td class="text-center"><?= $data['apply_date'];?></td>
                                                            <td class="text-center"><?php echo strtoupper($data['dl_no']); ?></td>
                                                            <td class="text-center"><?php echo strtoupper($data['dob']); ?></td>
                                                
                                                            <td align="center" valign="middle">
                                                            <!-- <a href="data:application/pdf;base64,<?php echo $data['pdf']; ?>" download="<?php echo $data['dl_no']; ?>.pdf"><img src="../template/ahkweb/pdf_doc.jpg" width="50" height="50" /></a> -->
                                                            <a href="<?php echo $data['pdf']; ?>" download="<?php echo $data['dl_no']; ?>.pdf"><img src="../template/ahkweb/pdf_doc.jpg" width="50" height="50" /></a>
                                                
                                                            </td >
                                                           </tr>
                                                        <?php
                                                       
                                                    }
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    </div>
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