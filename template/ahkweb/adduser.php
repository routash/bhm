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
						
								</li>
							
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
						<h6 class="mb-0 text-uppercase">Add New user</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-user me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">user Details</h5>
								</div>
								<hr>
								<form action="" method="POST" class="row g-3">
									<div class="col-md-4">
										<label for="inputFirstName" class="form-label">Name</label>
										<input name="name"  type="text"  placeholder="Name"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-4">
										<label for="inputFirstName" class="form-label">Phone Number</label>
										<input name="phone"  type="text"  placeholder="Phone"  class="form-control" id="inputFirstName">
									</div>
									
									<div class="col-md-4">
										<label for="inputFirstName" class="form-label">Email</label>
										<input name="email"  type="email"  placeholder="Enter Email"  class="form-control" id="inputFirstName">
									</div>
									
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Shop Name</label>
										<input name="shop"  type="text"  placeholder="Shop Name"  class="form-control" id="inputFirstName">
									</div>

									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">State</label>
										<input name="state"  type="text"  placeholder="Enter State"  class="form-control" id="inputFirstName">
									</div>
									
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Usertype</label>
										<select class="form-control" name="type" id="">
                                            <option value="retailer">Retailer</option>
                                            <option value="distributor">Distributor</option>
                                            <option value="super distributor">Super Distributor</option>
                                        </select>
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Password</label>
										<input name="password"  type="password"  placeholder="Password"  class="form-control" id="inputFirstName">
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