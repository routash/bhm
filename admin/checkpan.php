<?php 
if(isset($_POST['aadhaar'])){
    $curl = curl_init();
// Required Aadhaar Number Only 
$aadhar_no = $_POST['aadhaar'];
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://apizone.in/instantpan.php?aadhaar=$aadhar_no",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

 $response = curl_exec($curl);

curl_close($curl);
 $json76=json_decode($response,true);

}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Check Your PAN if it Is Made of Not</title>
  </head>
  <body>
<div  class="card md-12 row md-6 col-3 m-auto mt-10">
  <h5 class="card-header">Check Pan if You Pan Is Made or not</h5>
  <div class="card-body">
    <h5 class="card-title">Enter AADHAAR No</h5>
    
    <?php
    if(isset($response) !=''){
        ?>
        <hr>
    <h5 class="card-title">Status: <?php echo $json76['status']; ?> </h5>
    <h4 class="card-title">Pan no: <?php echo $json76['Pan']; ?> </h4>
  
    <h4 class="card-title">Name: <?php echo $json76['Name2']; ?> </h4>
    <h4 class="card-title">Mobile No: <?php echo $json76['Mobile_no']; ?> </h4>
        <?php
    }
    ?>
    <form action="" method="POST">
   <div class="input-group md-6 mb-3">
  <input type="text" name="aadhaar" class="form-control" placeholder="Enter Aadhaar No" >
 
</div>
   <div class="input-group md-6 mb-3">
  <input type="submit" name="submit" class="form-control btn btn-success" value="Submit" >
 
</div>
   
</form>
   
  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
