<?php
require('database.php');
require('links.php');
// Fetch Website Settings Data
$host = $_SERVER['SERVER_NAME'];
$dir = dirname($_SERVER['SCRIPT_NAME']);
date_default_timezone_set("Asia/Kolkata");
$webres = mysqli_query($ahk_conn,"SELECT * FROM settings WHERE id=1 AND status=1");

$webdata = mysqli_fetch_assoc($webres);
// Check If User Is Logged In or Not
$api_key = $webdata['nsdl_api_key'];

$skylineapiurl ="skylineax.pro";
$skyline_key ="915917dbb254fc6852b189be2fb92bd23010f9c033a2cf64340dc8521b81cc2e";

$axen_api="skylineax.pro";
$axen_key="915917dbb254fc6852b189be2fb92bd23010f9c033a2cf64340dc8521b81cc2e";
$tng_url="https://secure.thenextgenapi.co.in/";
$tng_apikey="TNG-API-a99247-c48e00-610491-ebb2ec-449dea";

function checkSession(){
    if(!$_SESSION['phone']){
        header('Location: ../login.php');
        die();
    }
}


if(isset($_SESSION['phone'])){
    $udata = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM users WHERE phone='".$_SESSION['phone']."'"));

//  Check Admin Here 
    function checkAdmin($usertype){
        if($usertype == "admin"){
            return true;
        }else{
            return false;
        }
    }
    // 
    // Get API balance
    $api_key = $webdata['nsdl_api_key'];
    function getAPIBalance(){
        global $api_key;
        $url = "https://apizone.in/api/v1/fetch_balance.php?api_key=$api_key";
        // echo $url;
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
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
         $response;
        $data = json_decode($response,true);
        if($data['status'] == 1){
            return $data['balance'];
        }else{
            return $data['message'];
        }
    }
    // if Admin 
    $nutype =  $udata['type'];
    function ifAdmin(){
        global $nutype;
        if($nutype == 'admin'){
            return true;
        }else{
            return false;
        }
    }

    


    
  



}
// Session END
/*
=====================================================================================
=====================================================================================
=============================== ALL FUNCTIONS HERE ==================================
=====================================================================================
=====================================================================================
*/
// Query Execute
function ahkQuery($sql){
    global $ahk_conn ;
    $res = mysqli_query($ahk_conn,$sql);
    return $res;
}
// Count Row Number
function ahkRows($sql){
    global $ahk_conn ;
    $res = mysqli_num_rows(ahkQuery($sql));
    return $res;
}
// Fetch Row Data 
function fetchRow($sql){
    global $ahk_conn ;
    $res = mysqli_fetch_assoc(ahkQuery($sql));
    return $res;
}
// Get Website data 
function ahkweb($columnName){
    $res = fetchRow("SELECT * FROM settings WHERE id=1");
    echo $res[$columnName];
}
// Get Particular Column Name of table
function getColumn($tableName,$columnName,$Identity){
    $sql = "SELECT * FROM ". $tableName . " WHERE ".  $Identity ;
    if(ahkRows($sql)>0){
        $res = fetchRow($sql);
        echo $res[$columnName];
    }else{
        return "data not Found";
    }
}
// Get Safe Value 
function getSafe($value){
    global $ahk_conn;
    $safe = mysqli_real_escape_string($ahk_conn,$value);
    return $safe;
}
// print Array Function 
function printR($data){
    echo "<pre>";
    print_r($data);
}
function ahkRedirect($url='',$time){
    ?>
    <script>
         setTimeout(() => {
            window.location='<?php echo $url; ?>';
        }, <?php echo $time; ?>);
    </script>
    <?php 
}
function showAlert($fmsg = '',$smsg ='',$type='success'){
    ?>
    <script>
       $(function(){
                Swal.fire(
                '<?php echo $fmsg; ?>', 
                '<?php echo $smsg; ?>', 
                '<?php echo $type; ?>'
            )
        })
    </script>
    <?php 
}
function loginAsAdmin(){
    if(isset($_SESSION['adminasuser'])== true && $_SESSION['adminusername'] ){
        $_SESSION['phone'] = $_SESSION['adminusername'];
        unset($_SESSION['adminasuser']);
        unset($_SESSION['adminusername']);
        ahkRedirect('index.php',1200);
    }
}


?>