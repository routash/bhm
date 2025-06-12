<!doctype html>
<html lang="en">

 

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
    <link rel="icon" href="<?php  ahkweb('logo');  ?>" type="image/png" />
	<!--plugins-->
	<link href="./template/ahkweb/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="./template/ahkweb/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="./template/ahkweb/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="./template/ahkweb/assets/css/pace.min.css" rel="stylesheet" />
	<script src="./template/ahkweb/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="./template/ahkweb/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="./template/ahkweb/assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="./template/ahkweb/assets/css/app.css" rel="stylesheet">
	<link href="./template/ahkweb/assets/css/icons.css" rel="stylesheet">
	<title><?php ahkweb('webname');  ?></title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="d-flex align-items-center justify-content-center py-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						<div class="card shadow-none">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center mb-0">
										<h3 class="">Sign Up</h3>
									
									</div>
								
									<div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
										<hr/>
									</div>
									<div class="form-body">
										<form method="POST" action="" class="row g-3">
											<div class="col-sm-6">
												<label for="inputFirstName" class="form-label">Full Name</label>
												<input required  name="name" type="text" class="form-control" id="inputFirstName" placeholder="Enter Your Name">
											</div>
											<div class="col-sm-6">
												<label for="inputLastName" class="form-label">Phone</label>
												<input required  maxlength="10" name="phone"  type="number" class="form-control" id="inputLastName" placeholder="Phone Number">
											</div>
											
											<div class="col-sm-6">
												<label for="inputLastName" class="form-label">Shop Name</label>
												<input required  name="shop"  type="text" class="form-control" id="inputLastName" placeholder="Shop Name">
											</div>
											
										<div class="col-sm-6">
												<label for="inputEmailAddress" class="form-label">State</label>
												<select class="form-control select" placeholder="State" name="state" value="" onkeyup="this.value = this.value.toUpperCase();" onblur="this.value = this.value.toUpperCase();" required="">
														<option value="">--Select State--</option>
														<option value="ANDAMAN AND NICOBAR ISLANDS">ANDAMAN AND NICOBAR ISLANDS</option>
														<option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
														<option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
														<option value="ASSAM">ASSAM</option>
														<option value="BIHAR">BIHAR</option>
														<option value="CHANDIGARH">CHANDIGARH</option>
														<option value="CHHATTISGARH">CHHATTISGARH</option>
														<option value="DADRA AND NAGAR HAVELI">DADRA AND NAGAR HAVELI</option>
														<option value="DAMAN AND DIU">DAMAN AND DIU</option>
														<option value="DELHI">DELHI</option>
														<option value="GOA">GOA</option>
														<option value="GUJARAT">GUJARAT</option>
														<option value="HARYANA">HARYANA</option>
														<option value="HIMACHAL PRADESH">HIMACHAL PRADESH</option>
														<option value="JAMMU AND KASHMIR">JAMMU AND KASHMIR</option>
														<option value="JHARKHAND">JHARKHAND</option>
														<option value="KARNATAKA">KARNATAKA</option>
														<option value="KERALA">KERALA</option>
														<option value="LAKSHADWEEP">LAKSHADWEEP</option>
														<option value="MADHYA PRADESH">MADHYA PRADESH</option>
														<option value="MAHARASHTRA">MAHARASHTRA</option>
														<option value="MANIPUR">MANIPUR</option>
														<option value="MEGHALAYA">MEGHALAYA</option>
														<option value="MIZORAM">MIZORAM</option>
														<option value="NAGALAND">NAGALAND</option>
														<option value="ODISHA">ODISHA</option>
														<option value="OTHER">OTHER</option>
														<option value="PONDICHERRY">PONDICHERRY</option>
														<option value="PUNJAB">PUNJAB</option>
														<option value="RAJASTHAN">RAJASTHAN</option>
														<option value="SIKKIM">SIKKIM</option>
														<option value="TAMILNADU">TAMILNADU</option>
														<option value="TELANGANA">TELANGANA</option>
														<option value="TRIPURA">TRIPURA</option>
														<option value="UTTAR PRADESH">UTTAR PRADESH</option>
														<option value="UTTARAKHAND">UTTARAKHAND</option>
														<option value="WEST BENGAL">WEST BENGAL</option>


													</select>
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input required  name="email" type="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input required  name="password" type="password" class="form-control border-end-0" id="inputChoosePassword" value="" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Confirm Password</label>
												<div class="input-group" id="show_hide_password">
													<input required  name="cpassword" type="password" class="form-control border-end-0" id="inputChoosePassword" value="" placeholder="Enter Confirm Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-12">
												<label for="inputSelectCountry" class="form-label">User Type</label>
												<select  required name="usertype" class="form-select" id="inputSelectCountry" aria-label="Default select example">
													<option value="">Please Select</option>
													<option value="retailer">Retailer</option>
													<option value="distributor">Distributor</option>
												</select>
											</div>
											<div class="col-12">
												<label for="inputSelectCountry" class="form-label">Select Payment Mode</label>
												<select  required name="mode" class="form-select" id="inputSelectCountry" aria-label="Default select example">
													
														<?php 
														if($webdata['paytm'] ==1){
															?>
															<option value="paytm">Paytm</option>
															<?php 
														}
														if($webdata['payu'] ==1){
															?>
															<option value="payu">PayU</option>
															<?php 
														}
														if($webdata['upi'] ==1){
															?>
															<option value="upi">UPI</option>
															<?php 
														}
														if($webdata['qr'] ==1){
															?>
															<option value="qr">QR</option>
															<?php 
														}
														?>
													
												</select>
											</div>
											
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Submit</button>
												</div>
											</div>
											<div class="col-12 text-center">
												<h6 class="mb-0">Already have an account? <a href="login.php">LogIn Here</a>
												</h6>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="./template/ahkweb/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="./template/ahkweb/assets/js/jquery.min.js"></script>
	<script src="./template/ahkweb/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="./template/ahkweb/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="./template/ahkweb/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="./template/ahkweb/assets/js/app.js"></script>
</body>


</html>