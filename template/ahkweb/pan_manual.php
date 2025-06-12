<?php
include('header.php');
?>
<?php
if (isset($_POST['panNumber'])) {
    $pan_no = $_POST['panNumber'];
    $pan_no = strtoupper($pan_no);
    $api_key = "915917dbb254fc6852b189be2fb92bd23010f9c033a2cf64340dc8521b81cc2e";   // api buy from https://axenapi.online

    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn, "SELECT * FROM pricing WHERE service_name='panauto' "));
    $fee = $price['price'];
    $username = $udata['phone'];
    $wallet_amount = $udata['balance'];

    // Check wallet balance
    if ($wallet_amount < $fee) {
        ?>
        <script>
            $(function() {
                Swal.fire(
                    'Insufficient Balance',
                    'Your wallet balance is too low to process this request',
                    'error'
                );
            });
            setTimeout(() => {
                window.location.href = 'wallet.php';
            }, 2000);
        </script>
        <?php
    } else {
        // API Request
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://test.axenapi.co.in/Dashboard/Verify_api/pan_advance/pan_api.php?api=$api_key&pan_no=$pan_no",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $json = json_decode($response, true);
        $status = $json['status'];
        $code = $json['code'];
        $error = $json['error'];
        $message = $json['message'];
        $name = $json['name'];
        $fathername = $json['fathername'];
        $gender = $json['gender'];
        $dob = $json['dob'];
        $formatted_dob = str_replace('-', '/', $dob);
        date_default_timezone_set("Asia/Kolkata");
        $time_hkb = date('d/m/Y g:i:s');
        if (isset($json['status']) && $json['status'] == 'success' && isset($json['code']) && $json['code'] == '200') {
            // Deduct fee from the wallet
            $debit_fee = $wallet_amount - $fee;
            $debit = mysqli_query($ahk_conn, "UPDATE users SET balance=balance-$fee WHERE phone='$username'");
            $updatehistory = mysqli_query($ahk_conn,"INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$username','$fee','$debit_fee','PAN Advance Print','1','Debit')");

        }else{
            
            echo '<script> alert("Failed '.$error.' | '.$message.'")</script>';
        }
    }
}?>	 

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Home </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">New APPLY </li>
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
						<h6 class="mb-0 text-uppercase">PAN MANUAL PDF </h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-id-card me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Enter Pan Card Details</h5>
								</div>
								<hr>
	<?php if($msg !='') { ?>
									<div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
								<?php } elseif($msgno !='') { ?>
									<div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>
								<?php  } ?>

								<form method="post" autocomplete="off"  onSubmit="return validation();"   enctype="multipart/form-data" action="" style="width:100%">
									<div class="row dgnform">
                                        <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                         <label>Select Pan Card Type</label>
                                                        <div class="form-group ">
                                                           <select name="ptype" autofocus id="ptype" class="form-control stylec" >
                                                               <option value="UTI-NONMINOR"> (18 साल  या उस  से ज्यादा  उम्र के लिए )  </option>
															   <!--<option value="NSDL-NONMINOR">NSDL NONMINOR (18 साल  या उस  से ज्यादा  उम्र के लिए ) </option>-->
                  <!--                                             <option value="UTI-MINOR">UTI MINOR (18 साल से कम उम्र के लिए )</option>-->
                  <!--                                             <option value="NSDL-MINOR">NSDL MINOR (18 साल से कम उम्र के लिए )</option>-->
                                                           </select>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label>Pan Card No.</label>
                                                        <div class="form-group">
                                                            <input class="form-control stylec" value="<?php echo $pan_no;?>"  id="pannumber" placeholder=""  autocomplete="off" name="pannumber" type="text" maxlength="10" required onkeyup="this.value = this.value.toUpperCase();" onblur='ValidatePAN(this)'>
                                                            <span id="erroraadharno" class="error"></span>
                                                        </div>
                                                    </div></br>
                                                    <div class="col-sm-12">
                                                        <label>Name</label>
                                                        <div class="form-group">
                                                            <input class="form-control stylec" value="<?php echo $json['name'];?>" id="name" placeholder="" name="name"    type="text" required onkeyup="this.value = this.value.toUpperCase();" >
															
															
															
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label>Father Name </label>
                                                        <div class="form-group">

                                                            <input class="form-control stylec" name="fathername" id="fathername" placeholder="" Value="<?php echo $json['fathername'];?>" type="text" onkeyup="this.value = this.value.toUpperCase();"  >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Date Of Birth</label>
                                                        <div class="form-group">
                                                            <input class="form-control stylec" name="dobadhar" data-field="date" type="text" value="<?php echo $formatted_dob;?>" required placeholder="D.O.B.(dd/MM/yyyy)">
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6">
                                                        <label>Gender </label>
                                                        <div class="form-group ">

                                                            <select name="gender" class="form-control stylec" required>
                                                            <option value="<?php echo $json['gender'];?>"><?php echo $json['gender'];?></option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Other">Other</option>
                                                            </select>   
                                                            </div>
                                                    </div>
											<div class="col-sm-6">
                                            <label id="stype">Select Image   </label>
                                            <div class="form-group">
											  <input type="file" name="imagefile" class="form-control stylec" id="imgInp" required/>
                                              <img src=""   id="blah" width="100px" height="100px" style="margin-top: 12px;
    box-shadow: 4px 4px 2px 1px;
    border-radius: 10px;"/>
                                              <input type="hidden" name="blahin" id="blahin" value="" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label id="simgs">Select  Sign Image  </label>
                                            <div class="form-group">
											  <input type="file" name="signfile" class="form-control stylec" id="signInp" required/>
                                              <img src=""   id="blahs" width="100px" height="100px" style="margin-top: 12px;
    box-shadow: 4px 4px 2px 1px;
    border-radius: 10px;" />
                                               <input type="hidden" name="blahsin" id="blahsin" value="" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="col-sm-3">
                                                <label>&nbsp;</label>
                                                <div class="form-group">              
                                                <button type="submit" name="savedata" class="btn btn-success btn-block" style="box-shadow: 0 0 0 3px rgba(40,167,69,.5);">Submit</button> 
                                                </div> 
                                            </div>
                                        </div>
									</div>
								</form>
							</div>
							<!-- /# row -->
						</section>
							<style>
								.stylec
								{
								    box-shadow: 2px 3px #000 !important;
    border-radius: 50px !important;
								}
								</style>
					</div>
				</div>
            </div>
        </div>

        <script type="text/javascript">
			function validation() {
				
				var aadharno = document.getElementById('pannumber').value;
				if ( aadharno.length < 10 ) {
					 document.getElementById('erroraadharno').innerHTML = " **Please Enter 10 Digit Pan Card Number !!!";
					 document.getElementById('pannumber').style.border = "1px solid red";
					 document.getElementById('pannumber').focus();
					 return false;
				}

               
                
                
				
			}
			
		
        </script>
	         
<script type="text/javascript">
//English to hindi translate code
    
//Words and Characters Count
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
            $('#blahin').val(e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$("#blah").hide();
$("#imgInp").change(function(){
    readURL(this);
	$("#blah").show();
});	


function readURLs(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blahs').attr('src', e.target.result);
            $('#blahsin').val(e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$("#blahs").hide();
$("#signInp").change(function(){
    readURLs(this);
	$("#blahs").show();
});	
									
</script>



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        <img src="<?php echo $slct['pafile'];?>" width="<?php echo $slct['iwidth'];?>" height="<?php echo $slct['iheight'];?>"/>
      </div>
     
    </div>
<button type="button" class="btn btn-default" data-dismiss="modal" style="    position: absolute;
    top: -20px;
    right: -422px;
    border-radius: 50%;
    background: red;
	border-color:red;
    color: white;">X</button>
  </div>
</div>

<div id="myModals" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" style="background-color: rgba(0, 0, 0, 0.7);">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="     height: 352px;
    width: 727px;
    margin-left: 165px;
">
      
      <div class="modal-body" style="height: 243px;">
	 <img src="abs.jpg" height="200px" width="100%">
	<form method="post" action="paytmv/index.php">
									<div class="">
									
									 <p style="    font-size: 18px;
    text-align: center;
    margin-top:20px;
    ">You Not Authorized For using This Pan Services Please Buy Services.</p>
									    <div class="row col-md-12 col-sm-12 col-xs-12">
											<div class="col-md-3 col-sm-3 col-xs-6">
											<?php
												error_reporting(0);
												include("config.php");

												
												//$slct = mysqli_fetch_assoc($r);
												//$slct['aadharpoint'];
                                       $c = "select * from user_data where phone=".$_SESSION['phone']."";
									   $updts = mysqli_query($ahk_conn,$c) ;
												$slcts = mysqli_fetch_array($updts);
												?>
												
												
												
                                    
													
												
												</div> 
											</div>
											
											<div class="col-md-12 col-sm-4 col-xs-6">
												
												<div class="form-group"> 
									
<input type="hidden" name="service[]" value="1"/> 


	
												<span id="erroruserid" class="error"></span>  
												</div> 
											</div>										
											
											<div class="col-md-12 col-sm-4 col-xs-6">
												
												<div class="form-group">              
												<input autocomplete="off" type="hidden" class="form-control"  id="Pay_Amt" value="500" name="Pay_Amt" placeholder="Website URL/ Link" readonly >
												<input type="hidden" value="<?php echo $_SESSION['phone'];?>" name="pay_uid"/>
												<span id="erroruserid" class="error"></span>  
												</div> 
											</div>										
											
															
													
																						
												
												
										
										
												
												
												
												
												
												
										</div> 
											</table>											
										</div>										
										<div class="col-md-12 col-sm-4 col-xs-6">
											<label>&nbsp;</label>
											<div class="form-group"> 
                                                   											
											   
											   <div class="col-md-6"><button type="submit" id="submit" name="submit" style="padding:17px;background:orange;border:1px solid orange;" class="btn btn-success btn-block"> &nbsp;&nbsp;&nbsp; Buy Now &nbsp;&nbsp;&nbsp;</button> </div><div class="col-md-6"><a href="panel.php" style="padding:17px;background:orange;border:1px solid orange;    margin-top: -65px;
    margin-left: 343px;" class="btn btn-success btn-block"> &nbsp;&nbsp;&nbsp; Dashboard &nbsp;&nbsp;&nbsp;</a></div>
											</div> 
										</div>
									</div>
								</form>
      </div>
      
        
      
    </div>
	
	
<style>
.modal-body
{
	flex:inherit !important;
	padding:inherit !important;
}
.modal-footer
{
	border:none !important;
}
.modal-dialog {
	margin: 30px 248px auto !important;
    max-width: auto !important;
	width : 100% !important;
}
</style>

  
 

<?php include('userFooter.php'); ?>

		<!--[if lt IE 9]>
			<link rel="stylesheet" type="text/css" href="DateTimePicker-ltie9.css" />
			<script type="text/javascript" src="DateTimePicker-ltie9.js"></script>
		<![endif]-->
<div id="dtBox"></div>
		<script>
					    $("#ptype").on('change',function()
					    {
					       if($(this).val() == 'UTI-MINOR' || $(this).val() == 'NSDL-MINOR') 
					       {
					           $("#signInp").hide();
					           
					           $("#simgs").hide();
					       }
					       else 
					       {
					           $("#signInp").show();
					           $("#imgInp").show();
					           $("#stype").show();
					           $("#simgs").show();
					       }
					    });
					</script>
					
					<script type="text/javascript">
function ValidatePAN()
{
	 var pan_no = document.getElementById("pannumber");
	
 if (pan_no.value != "") {
            PanNo = pan_no.value;
            var panPattern = /^([a-zA-Z]{5})(\d{4})([a-zA-Z]{1})$/;
            if (PanNo.search(panPattern) == -1) {
                alert("Invalid Pan No");
                pan_no.focus();
                pan_no.value='';
                return false;
                
            }
           
          
        }
}

</script>
								
								
								
								
		
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