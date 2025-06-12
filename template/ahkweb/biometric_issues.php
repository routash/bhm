<?php
include('header.php');
?>

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
							
							
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
						
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-10 mx-auto">
						<h6 class="mb-0 text-uppercase">BIOMETRIC ISSUE AADHAAR NUMBER FIND</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
							     <h5 class="text-danger ">This enrolment has been rejected due to biometric issues. Kindly contact UIDAI helpline 1947 or the nearest UIDAI Regional office. Contact details available at www.UIDAI.gov.in</h5>
							    	<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-id-card me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Enter EID Details</h5>
								</div>
								<hr>
								<form action="" method="POST" class="row g-3">
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Name</label>
										<input name="name" type="text"  placeholder="Name As Per EID"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputLastName" class="form-label">EID No</label>
										<input name="eid" type="text" id="eid"  data-inputmask="'mask': '9999 99999 99999'"   placeholder="Enter 14 Digit EID no" class="form-control" >
									</div>
									<div class="col-md-3">
										<label for="inputEmail" class="form-label">Date</label>
										<input name="date" type="text"  data-inputmask="'mask': '99/99/9999'"  placeholder="DD/MM/YYYY" class="form-control" id="date">
									</div>
									<div class="col-md-3">
										<label for="inputPassword" class="form-label">Time</label>
										<input name="time" type="text"  placeholder="00:00:00" class="form-control" id="timea">
									</div>
									
									
									<div class="col-12 ml-2">
									<h5 class="text-warning ">Application Fee: <?php  
										$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT price FROM pricing WHERE service_name='biometric'")); 
										echo "₹" .$price['price'];
										?></h5>
										<input type="hidden" name="fee" value="<?php echo $price['price'];  ?>">
									</div>
									<div class="col-12">
										<button type="submit" class="btn btn-primary px-5">Apply</button>
									</div>
								</form>
							</div>
						</div>
					
					</div>
				</div>
				<div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">All BIOMETRIC ISSUE AADHAAR NUMBER FIND LIST</h5>
                    </div>
                   
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example2" class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">SL.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">EID</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Time</th>
                                <th class="text-center">AADHAAR No</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                           
<?php

$res = mysqli_query($ahk_conn,"SELECT * FROM aadhaar_no WHERE appliedby='".$udata['phone']."' AND purpose='Biometric' ORDER BY id DESC");
if(mysqli_num_rows($res)>0){
    $x=0;
    while($data = mysqli_fetch_assoc($res)){
        $x ++;
        ?>
        <tr>
            <td class="text-center"><?= $x;?></td>
            <td class="text-center">
                <div class="d-flex align-items-center">
                    
                    <div class="ms-2">
                        <h6 class="mb-1 font-14"><?php echo strtoupper($data['name']); ?></h6>
                    </div>
                </div>
            </td>
            <td class="text-center"><?php echo strtoupper($data['eid']); ?></td>
            <td class="text-center"><?php echo strtoupper($data['date']); ?></td>
            <td class="text-center"><?php echo strtoupper($data['time']); ?></td>
            <td class="text-center"><?php
            if(!$data['aadhaar_no'] ==NULL){
                ?>
                <b><?php echo strtoupper($data['aadhaar_no']); ?></b>
                <?php
            }else{
                echo "Aadhaar Not generated Yet.";
            }
            ?></td>
            <td class="text-center">
                <?php
                    if($data['status']=="pending"){
                        ?>
                        <div class="badge rounded-pill bg-light-warning text-warning w-100">Pending...
                        </div>
                    
                        <?php
                    }else if($data['status']=="success"){
                            ?>
                             <div class="badge rounded-pill bg-light-success text-success w-100">Success
                        </div>
                            <?php
                    }else if($data['status']=="refunded"){
                            ?>
                             <div class="badge rounded-pill bg-light-info text-info w-100">Refunded
                            </div>
                            <?php
                    }
                ?>
            </td>
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
		
		<!--end page wrapper -->
		<?php 
		include('footer.php');
		?>
	<!-- Bootstrap JS -->
	

	<script src="../template/ahkweb/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<!-- <script src="../template/ahkweb/assets/js/jquery.min.js"></script> -->
	<script src="../template/ahkweb/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="../template/ahkweb/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="../template/ahkweb/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
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

<script>
	$(document).ready(function() {
	
	$('#eid').inputmask();
	$('#date').inputmask();
	$('#timea').inputmask("hh:mm:ss", {
        placeholder: "00:00:00", 
        insertMode: false, 
        showMaskOnHover: false,
        // hourFormat: 24
      });
	});
</script>
</html>