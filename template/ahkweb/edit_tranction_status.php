<?php
include('header.php');
if(isset($_GET['id']) && $_GET['id']!=NULL){
    $id = base64_decode(getSafe($_GET['id']));
    $data = fetchRow("SELECT * FROM wallet WHERE id='$id'");

}
if(isset($_POST['id']) && $_POST['status']){
    $id = getSafe($_POST['id']);
    $status = getSafe($_POST['status']);
    if(ahkQuery("UPDATE wallet SET status='$status' WHERE id='$id'")){
        showAlert('Payment Successful!');
        ahkRedirect('',1200);
    }else{
        showAlert('Payment Not Updated!','','error');
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
						<h6 class="mb-0 text-uppercase">Edit Tranction Status</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Tranction Details</h5>
								</div>
							 <div style="width:350px;">
							  <form method="POST" action="" enctype="multipart/form-data">
                            <select class="form-control mb-2" name="status" id="">
                                    <option value="" required>Select Status</option>
                                    <option value="success"  required>Success</option>
                                    <option value="pending"  required>Pending</option>
                            </select>
                    
                            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                            <button class="btn  px-6 btn-success">Update</button>
                        </form>
							</div>
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
</body>

<script>
	// $(document).ready(function() {
	
	// $('#eid').inputmask();
	// $('#date').inputmask();
	// $('#timea').inputmask("hh:mm:ss", {
    //     placeholder: "00:00:00", 
    //     insertMode: false, 
    //     showMaskOnHover: false,
    //     hourFormat: 12
    //   });
	// });
</script>
</html>