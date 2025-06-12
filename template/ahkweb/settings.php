<?php
include('header.php');
?>

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Website Settings</div>
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
				<div class="row">
					<div class="col-xl-10 mx-auto">
						<h6 class="mb-0 text-uppercase">Website Settings</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-cog me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Update Details</h5>
								</div>
								<hr>
								<form action="" method="POST" class="row g-3">
									<div class="col-md-4">
										<label for="inputFirstName" class="form-label">Website Name</label>
										<input name="webname" value="<?php ahkweb('webname');  ?>" type="text"  placeholder="Website Name"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-4">
										<label for="inputFirstName" class="form-label">Phone</label>
										<input name="phone" value="<?php ahkweb('phone');  ?>" type="text"  placeholder="Phone"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-4">
										<label for="inputFirstName" class="form-label">Email</label>
										<input name="email" value="<?php ahkweb('email');  ?>" type="text"  placeholder="Email"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-5">
										<label for="inputFirstName" class="form-label">Address</label>
										<input name="address" value="<?php ahkweb('address'); ?>" type="text"  placeholder="Address"  class="form-control" id="inputFirstName">
									</div>
								
									<hr>
									<div class="col-md-4">
										<label for="inputFirstName" class="form-label">Retailer Registration Fee <span class="text-success"><sup>NEW</sup></span></label>
										<input name="ret_reg_fee" value="<?php ahkweb('ret_reg_fee'); ?>" type="text"  placeholder="Retailer Registration Fee"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-4">
										<label for="inputFirstName" class="form-label">Distributor Registration Fee </label>
										<input name="dist_reg_fee" value="<?php ahkweb('dist_reg_fee');  ?>" type="text"  placeholder="Distributor Registration Fee"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-4">
										<label for="inputFirstName" class="form-label">Super Distributor Registration Fee </label>
										<input name="super_dist_reg_fee" value="<?php ahkweb('super_dist_reg_fee');  ?>" type="text"  placeholder="Super Distributor Registration Fee"  class="form-control" id="inputFirstName">
									</div>
									<hr>
									<div class="col-md-6">
										<label for="inputFirstName" class="form-label">Payment Methods -</label>
										UPI <input type="checkbox" name="upi" <?php if($webdata['upi'] == 1){echo "value='1' checked"; }else{ echo "value='1'";} ?> > -
										QR <input type="checkbox" name="qr" <?php if($webdata['qr'] == 1){echo "value='1' checked"; }else{ echo "value='1'";} ?> >
									</div>
									<hr>
								
									<div>PAYU GATEWAY DETAILS</div>
									<div class="col-md-6">
										<label for="inputFirstName" class="form-label">UPI gateway Details</label>
										<input name="upi_key" value="<?php ahkweb('upi_key');  ?>" type="text"  placeholder="UPI KEY"  class="form-control" id="inputFirstName">
									</div>
									<hr>
									<div>QR GATEWAY DETAILS</div>
									<div class="col-md-6">
										<label for="inputFirstName" class="form-label">UPI ID (exampleupi@ybl)</label>
										<input name="upi_id" value="<?php  ahkweb('upi_id');  ?>" type="text"  placeholder="UPI ID"  class="form-control" id="inputFirstName">
									</div>
									<hr>
							
									<div>HomeTheme Setting</div>
									<div class="col-md-6">
										<label for="inputFirstName" class="form-label">Select HomeTemplate </label>
										<select name="HomeTemplatename" class="form-control" id="">
											<option value="">Please Select</option>
											<option <?php if($webdata['HomeTemplatename']== "default"){echo "selected";} ?> value="default">Default</option>
											<option <?php if($webdata['HomeTemplatename']== "realworld"){echo "selected";} ?> value="realworld">RealWorld</option>
											<option <?php if($webdata['HomeTemplatename']== "crypto"){echo "selected";} ?> value="crypto">Crypto</option>
										</select>
									</div>
									<div class="col-12">
										<button type="submit" class="btn btn-primary px-5">Save</button>
									</div>
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