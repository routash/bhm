<?php
include('header.php');
?>
     <!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				
					<div class="ps-3">
					
					
						</nav>
					</div>
				
				</div>
				<!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">Aadhar Advance Print</h6>
                <hr />
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            </h5>
                        </div>
                        <hr>





                        <div class="d-flex justify-content-center">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                                        role="alert">
                                        Advance Aadhar Successfully Working On All Devices.

           
        <input id="piddata" name="piddata" type="hidden" value="">
          
              </div>
            <div class="card-body">
            <br>

              <div class="col-md-12">
                <div class="form-check form-check-inline">  
                    <input class="form-check-input" type="radio" name="id_type" id="eid_value" value="eid_value" checked>
                    
                    <b class="form-check-label" for="normal" style="color:black;">Enrollment No</b>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="id_type" id="uid_value" value="uid_value" checked>
                    <b class="form-check-label" for="complaint" style="color:black;">Aadhaar No</b>
                </div>
                </div<>
                    <input class="form-control valid" id="txtUID" maxlength="28" name="EnterAadhaarNumber" type="text" placeholder="12341234512345YYYYMMDDHHMMSS" />
                   
                				 <div class="text-center" style="margin-top: 20px;">
                				     
<?php if($adstastus['code'] == 1){?>  
<?php echo $adscode['code'] ;?>
<?php }else{}
?>
    <button type="submit"  class="btn btn-primary"name="capture" id="capture">Capture Fingure</button>
     <div class="col-12 ml-2">
									<h5 class="text-warning ">Application Fee: <?php  
										$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT price FROM pricing WHERE service_name='aadhaarprint'")); 
										echo "₹" .$price['price'];
										?></h5>
										
									</div>
</div>
</form>
</div>
</div>
</div>
</form>
</section>
</div>
<form action="apnabackrk.php" method="post" name="f1" style="display:none;">
  <input type="hidden" name="aadhar" id="aadhar"/>
  <textarea name="bioenc" id="biodata"></textarea>
</form>
<script>
  setTimeout(function(){ $('#myModal').modal('show'); }, 3000);
  </script> 
<script>
$(document).ready(function()
{
$("#capture").on('click',function()
{
	var alen = $("#txtUID").val().length;
	if( $("#txtUID").val() == '')
	{
		alert('please enter Proper aadhar number');
	}
// 	else if(alen != 12)
// 	{
// 		alert('please enter Proper 12 digit aadhar number');
// 	}
	else 
	{
	var hdnPIDData = $("#hdnPIDData");
	//var cape = $("#cap").val();
var ssoauth_ver = $.now();
			
				var data = { p: 'http', type:'AUTH', device: 'bio', isHttpsService: 'false' };
				initCapture(data);
			
	

			function initCapture(d) {
			$.getScript("https://<?php echo $skylineapiurl; ?>/serviceApi/V1/printcapture.js?v=" + ssoauth_ver).done(function (script, textStatus) {
					if (textStatus == "success") { startCaptureRD({ authType: d.type, fpDevice: d.device, env: "P", isHttpsService: d.isHttpsService }, function (data) { if (d.p === "http") hdnPIDData.val(data.data); else  hdnPIDData.val(data.data);
 $("#biodata").val(data.data);
 $("#aadhar").val(txtUID.val());
 //$("#captch").val($("#cap").val());
				document.f1.submit();
				alert("Finger Captured Successfully");
			       // alert(data.data);
				//console.log(data.data);
                //window.location.href="http://data.edreamkart.com/testc.php?aadhar="+txtUID.val()+"&bioenc="+hdnPIDData.val();
					}); }
				});
				
					 
                   
			}
	} 
});

});
</script>
<script type="text/javascript">
        var txtUID, txtConfirmUID;
        var btnProceed;
        var lblMessage;
        var oData;
        var btnSentOTP;
        var txtVerifyOTP;
        var btnVerifyOTP;
        var oLocalProfile;
        var btnSave;
        var hdnFinalData;
        var IsFreshUID;
        var txtMobile;
        var sValue, cValue;

        var hdnServerMessage, hdnShowServerMessage;
        var txtDOB, txtConfirmDOB;
        var txtSamagraID;
        $(document).ready(function () {
            txtSamagraID = $('#txtSamagraID');
            txtDOB = $('#txtDOB');
            txtConfirmDOB = $('#txtConfirmDOB');

            btnSentOTP = $('#btnSentOTP');
            btnProceed = $('#btnProceed');
            lblMessage = $('#lblMessage');
            btnVerifyOTP = $("#btnVerifyOTP");

            txtMobile = $('#txtMobile');
            btnSave = $('#btnSave');
            hdnFinalData = $('#hdnFinalData');

            hdnServerMessage = $('#hdnServerMessage');
            hdnShowServerMessage = $('#hdnShowServerMessage');


            txtUID = $('#txtUID');
            txtConfirmUID = $('#txtConfirmUID');
            txtVerifyOTP = $('#txtVerifyOTP');

           

            txtDOB.mask('99-99-9999');
            txtConfirmDOB.mask('99-99-9999');


            

            txtConfirmUID.blur(function () {
                
            });

            
            
            

            txtSamagraID.blur(function () {
                if (txtSamagraID.val().length == 9) {
                    Get_Samagra_Details(txtSamagraID.val());
                }
                else {
                    $("#dvSamagraDetails").html('');
                    $("#dvSamagraDetails").fadeOut(100);
                }
            });

            


            
           

            
            


        });
        
        
        

        

    </script> 
<script src="jquery.maskedinput.js" type="text/javascript"></script> 
<script src="jqueryold.js" type="text/javascript"></script> 

<script>
$(".Announcement_Banners").hide();
$(".Announcement_Bannerss").hide();

$(".btnReadThumbs").click(function () {
                
               var dp = $('#Port').val();

            var pidoptions = "<PidOptions> <Opts fCount=\"1\" fType=\"0\" iCount=\"0\" pCount=\"0\" format=\"0\" pidVer=\"2.0\" timeout=\"20000\" otp=\"\" posh=\"LEFT_INDEX\" env=\"P\" wadh=\'E0jzJ/P8UopUHAieZn8CKqS4WPMi5ZSYXgfnlfkWjrc=\' /> <Demo></Demo>  </PidOptions>";
            if (!dp) {
                alert('RD Service Unavailable');
                return;
            }

            var rdsURL = "http://127.0.0.1:" + dp + "/rd/capture";
            
            $.support.cors = true;

            $.ajax({
                type: "CAPTURE", async: false, crossDomain: true, url: rdsURL, data: pidoptions, contentType: "text/xml; charset=utf-8", processData: false, dataType: "text",
                success: function (data) {
                    var errCode = $(data).find('Resp').attr('errCode');

                    if (errCode == "0") {
                        $('#bioData').val(data);
                        
                       $(".Announcement_Banner").hide();
                         $(".Announcement_Banners").hide();
                         $(".Announcement_Bannerss").show();
                       
                       $('#hdnPIDData').val(data);
                       
                       
                        
                    }
                    else if(errCode != "0"){
                       
                       
                         $('#hdnPIDData').val("Device not connected");
                         $(".Announcement_Banner").hide();
                         $(".Announcement_Banners").show();
                    }
                },
                error: function (xhr, ajaxOptions, error) {
                    alert(rdsURL);
                }
            });
});


     	
</script> 
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
	$('#pan_no').inputmask();
	$('#timea').inputmask("hh:mm:ss", {
        placeholder: "00:00:00", 
        insertMode: false, 
        showMaskOnHover: false,
        hourFormat: 12
      });
	});
</script>
</html>