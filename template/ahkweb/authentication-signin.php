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
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
					
						<div class="card shadow-none">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center mb-0">
										<h3 class="">Sign in</h3>
										<p class="mb-0">Login to your account</p>
									</div>

									<br>
									<div class="d-grid gap-5">
										<a href="https://wa.me/917519146000?text=Hii Support" class="btn btn-primary"><span>WELCOME TO BHUMIKA ANMOL</span></a>
									</div>
								
									<div class="login-separater text-center mb-4"> <span>SIGN IN EMAIL OR PHONE</span>
										<hr/>
									</div>
									<div class="form-body">
										<form method="POSt" action="" class="row g-4">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email or Phone</label>
												<input name="username" type="text" class="form-control" id="inputEmailAddress" placeholder="Email or Phone">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Enter Password</label>
												<div class="input-group" id="show_hide_password">
													<input name="password" type="password" class="form-control border-end-0" id="inputChoosePassword" value="" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
													<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
												</div>
											</div>
											<div class="col-md-6 text-end">	<a href="forgot_password.php">Forgot Password ?</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
												</div>
											</div>
											<div class="col-12 text-center">
												<h6 class="mb-0">Don't have an account yet? <a href="register.php">Sign up here</a>
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
				<div><a href="https://wa.me/917519146000?text=Hii Support"><img src="WhatsApp.png" style="width:90px; height:90px; position: absolute; Right:30px; bottom: 20px;"></a></div>
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