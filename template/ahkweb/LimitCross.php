<?php
include('header.php');
?>

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">AADHAAR LIMIT CROSS SOLUTIONS</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">New APPLY</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-10 mx-auto">
						<h6 class="mb-0 text-uppercase">AADHAAR LIMIT CROSS</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
                                <div>
                                <h6 class="text-danger ">Attention: Please Marge Application Slip and Declaration Form In a Single PDF file Then Upload it. <br>* In aadhaar Attachment   AADHAAR FRONT and back Side Should  marge in one Single PDF  with Clear Visibility . <br>If Somebody need help then you can Contact with us <?php ahkweb('phone'); ?></h6>
                                
                                <div class="col-md-3">
                                <a class="btn btn-sm btn-success mb-3" download="Delf_declaration" href="sample/english_dec.pdf">Download Form ENGLISH <i class="bx bx-cloud-download"></i></a>
									</div>
                                <div class="col-md-3">
                                <a class="btn btn-sm btn-success ml-2 " download="Delf_declaration" href="sample/self_declaration.pdf">Download Form HINDI <i class="bx bx-cloud-download"></i></a>
									</div>
                                </div>
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-id-card me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Enter Details</h5>
									
								</div>
								<hr>
								<form action="" method="POST" class="row g-3"  enctype="multipart/form-data">
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Full Name</label>
										<input name="name" type="text"  placeholder="Name " required class="form-control" >
									</div>
									
									<div class="col-md-3">
										<label for="inputPassword" class="form-label">Mobile Number</label>
										<input name="mobile" type="text" placeholder="Enter Mobile Number" required  class="form-control" >
									</div>
									
								
									<!--  -->
                                    <div class="col-12 ml-2">
                                    <div class="col-md-3">
										<label for="inputFirstName" class="form-label">Upload Self Declaration with Slip</label>
										<input type="file" name="declaration" accept="application/pdf" required class="form-control" >
									</div>
									
									<div class="col-md-3 mt-4">
										<label for="inputPassword" class="form-label">Upload AADHAAR Front Back PDF <a download="Aadhaar_sample" class="btn btn-sm btn-success" href="sample/AadhaarSample.pdf">Download Sample <i class="bx bx-cloud-download"></i></a></label>
										<input  type="file" name="aadhaar" accept="application/pdf" required  class="form-control" >
									</div>
									</div>
                                    <!--  -->
									
									<div class="col-12 ml-2">
									<h5 class="text-warning ">Application Fee: <?php  
										$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT price FROM pricing WHERE service_name='limitcross_fee'")); 
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
                        <h5 class="mb-0">All LIMIT CROSS LIST</h5>
                    </div>
                   
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example2" class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">SL.</th>
                                <th class="text-center">Application No</th>
                                <th class="text-center">Full Name</th>
                                <th class="text-center">Mobile No</th>
                                <th class="text-center">Apply Date</th>
                                <th class="text-center">Remark</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                           
<?php
$res = mysqli_query($ahk_conn,"SELECT * FROM limitcross WHERE appliedby='".$udata['phone']."'  ORDER BY id DESC");
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
                        <h6 class="mb-1 font-14"><?php echo strtoupper($data['application_no']); ?></h6>
                    </div>
                </div>
            </td>
            <td class="text-center"><?php echo strtoupper($data['name']); ?></td>
            <td class="text-center"><?php echo strtoupper($data['mobile']); ?></td>
            <td class="text-center"><?php echo strtoupper($data['date']); ?></td>
            <td class="text-center"><?php
            if(!$data['remark'] ==NULL){
                ?>
                <b><?php echo strtoupper($data['remark']); ?></b>
                <?php
            }else{
                echo "Processing...";
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