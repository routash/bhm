<?php
include('header.php');
?>
     
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

   
<?php
// Get captcha details from the API
$details = file_get_contents("https://test.axenapi.co.in/Dashboard/Verify_api/vo_t_mobi_link/capt.php");
$json = json_decode($details, TRUE);
$captcha_img = $json['captcha'];
$captchaTxnId = $json['id'];

$api_key="915917dbb254fc6852b189be2fb92bd23010f9c033a2cf64340dc8521b81cc2e"; // api key change from here 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['find']) && !empty($_POST['epic_no'])) {
        $epic_no = $_POST['epic_no'];

        // Make API Request
        $url = file_get_contents("https://test.axenapi.co.in/Dashboard/Verify_api/vo_t_mobi_link/v_l_ink.php?epicno=$epic_no&api=$api_key");
        $result = json_decode($url, true);
        if ($result) {
            $applicantFullName = $result['name'];
            $epicNumber = $result['epicno'];
            $mobileNumber = $result['mobileNumber'];
            $stateName = $result['state'];
            $statuss = $result['status'];
            $messages = $result['message'];
            $errors = $result['error'];
        if ($statuss == 'Success') {
           echo '<div id="success-alert" class="alert alert-success" role="alert">
                  Status:  ' . $statuss . '
                 </div>';
        } else if ($errors) {
            echo '<div class="alert alert-danger" role="alert">
                   .' . $errors . ' - ' . $messages . '
                 </div>';
            echo '<script>
                    setTimeout(function () {
                        window.location = "' . $redirectUrl . '";
                    }, 5000);
                  </script>';
           }
        }
    }
}
?>

 <?php
  $price = mysqli_fetch_assoc(mysqli_query($ahk_conn, "SELECT * FROM pricing WHERE service_name='v_mobile_link' "));
  $fee = $price['price'];
  $balance=$udata['balance'];
  $mobile = $udata['phone'];
  $debit_fee =  $balance - $fee;
  if($balance>$fee){
      
        if (isset($_POST['submit_mobile']) && !empty($_POST['new_mobile'])) {
            $newMobileNumber = $_POST['new_mobile'];
            $epic = $_POST['epic'];
            $place = $_POST['place'];
            $ptp = $_POST['otp'];

            $captchap = $_POST['captcha'];
            $captchaid = $_POST['captchaTxnId'];

            $apiUrl = file_get_contents("https://test.axenapi.co.in/Dashboard/Verify_api/vo_t_mobi_link/form_8.php?api=".urlencode($api_key)."&epic=".urlencode($epic)."&otp=".urlencode($ptp)."&nmobile=".urlencode($newMobileNumber)."&state=".urlencode($place)."&captcha=".urlencode($captchap)."&captcha_id=".urlencode($captchaid));

            $ch = curl_init($apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);

            if ($apiUrl === false) {
                echo '<div class="alert alert-danger" role="alert">
                        cURL request failed
                      </div>';
            } else {
                $data = json_decode($apiUrl, true);
                $status = $data['status'];
                $message = $data['message'];
                $refId = $data['refId'];
                $rerror = $data['error'];

                $alertType = $status == "Success" ? 'success' : 'error';
                $redirectUrl = $status == "Success" ? "" : "' . $redirectUrl . '";
                
                // debited code and save card summary 
                if($refId !=''){
                  mysqli_query($ahk_conn, "UPDATE users SET balance = balance - $fee WHERE phone='$mobile'");
                  $new_balance = $balance - $fee;
                  date_default_timezone_set("Asia/Kolkata");
                  $timestamp = date('d/m/Y g:i:s');
                  $cardinst = "INSERT INTO m_link(epic_no, mobile_no, response, userid, date) VALUES ('$epic','$newMobileNumber','$message','$mobile','$timestamp')";
                  $updatehistory = mysqli_query($ahk_conn,"INSERT INTO wallethistory(userid, amount, balance, purpose, status, type) VALUES ('$mobile','$fee','$debit_fee','$epic Voter Mobile Link','1','Debit')");
                  $res = mysqli_query($ahk_conn, $cardinst);   
    
                }
   
     
               echo "<script>
        Swal.fire({
          title: '$rerror!',
          text: 'Mobile Number Link $status Your Reference No: $refId - $message',
          icon: '$alertType',
          confirmButtonText: 'OK'
        });
      </script>";

                echo '<script>
                        setTimeout(function () {
                            window.location = "";
                        }, 5000);
                      </script>';
            }

            curl_close($ch);
        }
  }else{
     $msg="<script>
        Swal.fire({
          title:'Balance Low ! Recharge Now',
          text:  'Warning!',
          icon: 'warning',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = 'wallet.php';
          }
        });
      </script>";
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
                <h6 class="mb-0 text-uppercase">INSTNAT VOTER CARD MOBILE NUMBER LINK
                    <hr />
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-id-card me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Enter Voter Card Details</h5>
                            </div>
                            <hr>
                            <h6 > <?php echo $msg; ?></h6>
            <!-- Form 1: Enter EPIC number -->
          
             <form id="epic_form" class="row g-3" <?php echo ($epicNumber) ? 'hidden' : ''; ?>" method="POST">
             
                   <div class="col-md-4">
                     <label for="inputLastName" class="form-label">EPIC NO<span class="text-danger">*</span></label>
                    
                     <input id="epic_no" name="epic_no" class="form-control border-success" type="text" value="<?php echo $epicNumber; ?>" required <?php echo ($epicNumber) ? 'disabled' : ''; ?>>
                 </div>
                 
                  <div class="col-12 ml-2">
				   	<h5 class="text-warning ">Application Fee: <?php  
				   		$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT price FROM pricing WHERE service_name='v_mobile_link'")); 
				   		echo "₹" .$price['price'];
				   		?></h5>
				   </div>
				   
                 <div class="col-12">
                 <button type="submit" name="find" class="btn btn-primary px-5" <?php echo ($epicNumber) ? 'disabled' : ''; ?>>
                     <i class="fa fa-check-circle"></i>Verify
                 </button>
                   </div>
                  
             </form>


            <!-- Form 2: Displayed upon successful first API response -->
            
            <form id="additional_fields_form" class="row g-3" <?php echo ($epicNumber) ? '' : 'hidden'; ?>" method="POST">
            
                  <div class="col-md-3">
                   <label for="inputLastName" class="form-label">FULL NAME<span class="text-danger">*</span></label>
                    <input id="" name="" class="form-control" type="" readonly value="<?php echo $applicantFullName; ?>" required>
                </div> 
                
                 <div class="col-md-3">
                    <label for="inputLastName" class="form-label">NEW MOBILE NUMBER<span class="text-danger">*</span></label>
                    <input id="epic" name="epic" class="form-control" type="hidden" value="<?php echo $epicNumber; ?>" required>
                    <input id="new_mobile" name="new_mobile" class="form-control border-primary" type="number" placeholder="ENTER NEW MOBILE NUMBER" value="<?php echo $mobileNumber; ?>" required>
                </div>
                   
                 <div class="col-md-3">
                    <label for="inputLastName" class="form-label">OTP<span class="text-danger">*</span></label>
                    <input id="otp" name="otp" class="form-control border-primary" type="number" placeholder="ENTER 6 DIGIT OTP" value="" required>
                </div>
                
                  <div class="col-md-3">
                    <label for="inputLastName" class="form-label"><span class="text-danger">*</span></label>
                    <button type="button" id="getOTPButton" class="btn btn-primary w-100"><i class="fa fa-check-circle"></i>Get OTP</button>
                   </div>
                   
                 <div class="col-md-3">
                    <!--<label for="place">Ca<span class="text-danger">*</span></label>-->
                    <img src="data:application/image;base64,<?php echo $captcha_img; ?>"  class="border-primary mt-2" alt="captchaa" />
                </div>
                <div class="col-md-3">
                    <label for="inputLastName" class="form-label">Enter Captcha<span class="text-danger">*</span></label>
                    <input id="captcha" name="captcha" class="form-control border-primary" type="text" placeholder="Enter Captcha Code" value="" required>
                    <input id="captchaTxnId" name="captchaTxnId" class="form-control border-primary" readonly type="hidden" value="<?php echo $captchaTxnId; ?>" required>
                    <input id="place" name="place" class="form-control border-primary" readonly type="hidden" value="<?php echo $stateName; ?>" required>
                </div>
            <br>
              <div class="col-md-3">
                  <br>
               <button type="submit" name="submit_mobile" class="btn btn-primary w-100"><i class="fa fa-check-circle"></i>Submit</button>
                  </div>
            </form>
        </div>
    </div>
</div>

			  <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">All Voter Card Mobile Number Link List</h5>
                    </div>

                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example2" class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">SL.</th>
                                <th class="text-center">Apply Date</th>
                                <th class="text-center">Epic No</th>
                                <th class="text-center">Link Mobile No</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
$res = mysqli_query($ahk_conn,"SELECT * FROM m_link WHERE username='".$udata['phone']."'  ORDER BY id DESC");
if(mysqli_num_rows($res)>0){
    $x=0;
    while($data = mysqli_fetch_assoc($res)){
        $x ++;
        ?>
                            <tr>
                                <td class="text-center">
                                    <?= $x;?>
                                </td>
                              
                                <td class="text-center">
                                    <?php echo strtoupper($data['date']); ?>
                                </td>
                                <td class="text-center"><?php echo strtoupper($data['epic_no']); ?></td>
     
                                <td class="text-center">
                                    <strong>
                                        <?php echo strtoupper($data['mobile_no']); ?>
                                    </strong>

                                </td>
                                <td class="text-center">
                                    <div class="badge rounded-pill bg-light-success text-success w-100">Success
                                    </div>
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
		

<script>
document.getElementById('getOTPButton').addEventListener('click', function() {
    var newMobile = document.getElementById('new_mobile').value;
    // Make API call with API key
    fetch(`https://test.axenapi.co.in/Dashboard/Verify_api/vo_t_mobi_link/send_ttp.php?nmobile=${newMobile}`)
    .then(response => {
        return response.json();
    })
    .then(data => {
        console.log('API response:', data);
        if (data.error) {
            // Display error message in alert
            alert(data.error);
        } else if (data.message) {
            // Display message from API in alert
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while sending OTP. Please try again later.');
    });
});
</script>
    <!-- Add your footer content here -->

    <script src="../template/ahkweb/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../template/ahkweb/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="../template/ahkweb/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="../template/ahkweb/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="../template/ahkweb/assets/js/app.js"></script>
<script>
    // Hide the success and error alerts after 3 seconds
    setTimeout(function () {
        document.getElementById('success-alert').style.display = 'none';
        // document.getElementById('error-alert').style.display = 'none';
    }, 3000);
</script>

</body>
</html>
<?php
include('userFooter.php');
?>
