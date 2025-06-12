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
				
					</div>
					<div class="ms-auto">
						<div class="btn-group">
						
						
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
                <?php 
                $aadhaarpdf = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='aadhaarpdf'"));
                $aadhaar_no = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='aadhaar_no'"));
                $pan_pdf = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='pan_pdf'"));
                $pan_no = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='pan_no'"));
                $limitcross_fee = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='limitcross_fee'"));
                $uti_pdf = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='uti_pdf'"));
                $vaccine = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='vaccine'"));
                $mobile_no_to_pdf = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='mobile_no_to_pdf'"));
                $aadhaar = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='aadhaar'"));
                $complaint_data = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='complaint_data'"));
                $instant_dl = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='instant_dl'"));
                $ration_card = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='ration_card'"));
                $voter = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='voter'"));
                $ration_to_aadhaar = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='ration_to_aadhaar'"));
                $pan_details = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='pan_details'"));
                $aadhaarprint = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='aadhaarprint'"));
                $rc_print = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='rc_print'"));
                $lltext = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='lltext'"));
                $ayushman_find_fee = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='ayushman_find_fee'"));

				$dl_mobile_update_fee = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='dl_mobile_update_fee'"));
                $Twowheelerpuc = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='2wheelerpuc'"));
                $Fourwheelerpuc = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='4wheelerpuc'"));

                ?>
				<div class="row">
					<div class="col-xl-10 mx-auto">
						<h6 class="mb-0 text-uppercase">Website Pricing</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-cog me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Update Pricing Details</h5>
								</div>
								<hr>
								<form action="" method="POST" class="row g-3">
									
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">2wheelerpuc</label>
										<input name="2wheelerpuc" value="<?php echo $Twowheelerpuc['price']; ?>" type="text"  placeholder="2wheelerpuc"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">4wheelerpuc</label>
										<input name="4wheelerpuc" value="<?php echo $Fourwheelerpuc['price']; ?>" type="text"  placeholder="Aadhaar PDF"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Aadhaar PDF</label>
										<input name="aadhaarpdf" value="<?php echo $aadhaarpdf['price']; ?>" type="text"  placeholder="Aadhaar PDF"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">AADHAAR NO</label>
										<input name="aadhaar_no" value="<?php echo $aadhaar_no['price']; ?>" type="text"  placeholder="Aadhaar No"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">PAN PDF</label>
										<input name="pan_pdf" value="<?php echo $pan_pdf['price']; ?>" type="text"  placeholder="PAN PDF"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">PAN NO</label>
										<input name="pan_no" value="<?php echo $pan_no['price']; ?>" type="text"  placeholder="PAN NO"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">LIMIT CROSS FEE</label>
										<input name="limitcross_fee" value="<?php echo $limitcross_fee['price']; ?>" type="text"  placeholder="LIMIT CROSS Fee"  class="form-control" id="inputFirstName">
									</div>
									
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">UTI PAN PDF FEE</label>
										<input name="uti_pdf" value="<?php echo $uti_pdf['price']; ?>" type="text"  placeholder="uti_pdf"  class="form-control" id="inputFirstName">
									</div>
									
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">VACCINE FEE</label>
										<input name="vaccine" value="<?php echo $vaccine['price']; ?>" type="text"  placeholder="vaccine"  class="form-control" id="inputFirstName">
									</div>
									
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">MOBILE TO PDF FEE</label>
										<input name="mobile_no_to_pdf" value="<?php echo $mobile_no_to_pdf['price']; ?>" type="text"  placeholder="mobile_no_to_pdf"  class="form-control" id="inputFirstName">
									</div>
									
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">AADHAAR TO PDF FEE</label>
										<input name="aadhaar" value="<?php echo $aadhaar['price']; ?>" type="text"  placeholder="Aadhaar_no_to_pdf"  class="form-control" id="inputFirstName">
									</div>
									
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">COMPLAINT DATA FEE</label>
										<input name="complaint_data" value="<?php echo $complaint_data['price']; ?>" type="text"  placeholder="Complaint_Data"  class="form-control" id="inputFirstName">
									</div>
									
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">DRIVING LICENCE FEE</label>
										<input name="instant_dl" value="<?php echo $instant_dl['price']; ?>" type="text"  placeholder="Drivinl Licence"  class="form-control" id="inputFirstName">
									</div>
									
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">RATION CARD FEE</label>
										<input name="ration_card" value="<?php echo $ration_card['price']; ?>" type="text"  placeholder="Ration Card Fee"  class="form-control" id="inputFirstName">
									</div>
									
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">VOTER CARD PDF FEE</label>
										<input name="voter" value="<?php echo $voter['price']; ?>" type="text"  placeholder="Voter Card Fee"  class="form-control" id="inputFirstName">
									</div>
									
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">RATION NO TO AADHAAR NO FEE</label>
										<input name="ration_to_aadhaar" value="<?php echo $ration_to_aadhaar['price']; ?>" type="text"  placeholder="Aadhaar No Fee"  class="form-control" id="inputFirstName">
									</div>
									
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">PAN  DETAILS FEE</label>
										<input name="pan_details" value="<?php echo $pan_details['price']; ?>" type="text"  placeholder="Pan Details Fee"  class="form-control" id="inputFirstName">
									</div>
									
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">AADHAAR ADVANCE FEE</label>
										<input name="aadhaarprint" value="<?php echo $aadhaarprint['price']; ?>" type="text"  placeholder="Aadhaar Advance Fee"  class="form-control" id="inputFirstName">
									</div>
									
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">RC PDF FEE</label>
										<input name="rc_print" value="<?php echo $rc_print['price']; ?>" type="text"  placeholder="Aadhaar Advance Fee"  class="form-control" id="inputFirstName">
									</div>
									
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">L.L TEST PASS FEE</label>
										<input name="lltext" value="<?php echo $lltext['price']; ?>" type="text"  placeholder="L.L Test Pass Fee"  class="form-control" id="inputFirstName">
									</div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Ayushman Fee</label>
										<input name="ayushman_find_fee" value="<?php echo $ayushman_find_fee['price']; ?>" type="text"  placeholder="Ayushman Fee"  class="form-control" id="inputFirstName">
									</div>

									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">DL Mobile Update Fee</label>
										<input name="dl_mobile_update_fee" value="<?php echo $dl_mobile_update_fee['price']; ?>" type="text"  placeholder="Ayushman Fee"  class="form-control" id="inputFirstName">
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