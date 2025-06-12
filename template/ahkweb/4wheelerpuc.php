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
						
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-10 mx-auto">
						<h6 class="mb-0 text-uppercase">4 WHEELER PUC CERTIFICATE</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
                                
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-id-card me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Enter Vehicle Details</h5>
									
								</div>
								<hr>
								<form action="" method="POST" class="row g-3"  enctype="multipart/form-data">
									<div class="col-md-4">
										<label for="inputFirstName" class="form-label">Phone Number</label>
										<input name="phone" type="text"  placeholder="Phone Number" required class="form-control" >
									</div>
									
									<div class="col-md-4">
										<label for="inputPassword" class="form-label">Vehicle Number</label>
										<input name="vehicle" type="text" maxlength="10" placeholder="Enter Vehicle Number" required  class="form-control" >
									</div>

                                    <div class="col-md-4">
										<label for="inputFirstName" class="form-label">Bick Front Side Photo Upload</label>
										<input type="file" name="front_side" accept="image/jpeg" required class="form-control" >
									</div>
									
									 <!-- <div class="col-12 ml-2">
									 <div class="col-md-4">
										<label for="inputPassword" class="form-label">Bick Back Side Photo Upload</label>
										<input  type="file" name="back_side"  accept="image/jpeg" required  class="form-control" >
									</div>
									</div> -->
                                    <!--  -->
									
										<div class="col-12 ml-2">
									<h5 class="text-warning ">Application Fee: <?php  
										$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT price FROM pricing WHERE service_name='4wheelerpuc'")); 
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
                        <h5 class="mb-0">All PUC CERTIFICATE LIST</h5>
                    </div>
                   
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example2" class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">SL.</th>
                                <th class="text-center">Apply Date</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Vehicle No</th>
                                <th class="text-center">Remark</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                           
<?php
$res = mysqli_query($ahk_conn,"SELECT * FROM 4wheelerpuc WHERE appliedby='".$udata['phone']."'  ORDER BY id DESC");
if(mysqli_num_rows($res)>0){
    $x=0;
    while($data = mysqli_fetch_assoc($res)){
        $x ++;
        ?>
        <tr>
            <td class="text-center"><?= $x;?></td>
            <td class="text-center"><?php echo strtoupper($data['apply_date']); ?></td>
            <td class="text-center"><?php echo strtoupper($data['phone']); ?></td>
            <td class="text-center"><?php echo strtoupper($data['vehicle']); ?></td>
            <td class="text-center"><?php
            if(!$data['remark'] ==NULL){
                ?>
                <b><?php echo strtoupper($data['remark']); ?></b>
                <?php
            }else{
                echo "Processing Pleace Wait...";
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
                          <div class="text-center">
                                <a download="<?php echo $data['remark'] ?>" href="<?php echo $data['pdf_link'] ?>" class="btn btn-sm btn-success">Download PDF</a>
                         </div>
                            <?php
                    }else if($data['status']=="refunded"){
                            ?>
                             <div class="badge rounded-pill bg-light-info text-info w-100">Refunded
                            </div>
                            <br>
                            <?php echo "Remark: ". $data['remark']; ?>
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


</html>