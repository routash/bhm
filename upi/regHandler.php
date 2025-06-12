<?php
include('../includes/config.php');
if(isset($_GET['client_txn_id'] )!=null && $_GET['txn_id']){
    $client_txn_id = $_GET['client_txn_id'];
    $res = mysqli_query($ahk_conn,"SELECT * FROM users WHERE order_id='$client_txn_id'");
    $dbdata = mysqli_fetch_assoc($res);
    $dbtxn_id = $dbdata['order_id'];
    $date = $dbdata['date'];
    $key = $webdata['upi_key'];    // you can get your key from https://merchant.upigateway.com/user/api_credentials
	
     $content = json_encode(array(
	 	"key"=> $key,
	 	"client_txn_id"=> "$dbtxn_id",
        "txn_date"=> "$date", 
	 ));
	 $url = "https://merchant.upigateway.com/api/check_order_status";
	 $curl = curl_init($url);
	 curl_setopt($curl, CURLOPT_HEADER, false);
	 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	 curl_setopt($curl, CURLOPT_HTTPHEADER,
	 		array("Content-type: application/json"));
	 curl_setopt($curl, CURLOPT_POST, true);
	 curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
	 $json_response = curl_exec($curl);
	 $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	 if ( $status != 200 ) {
	 	// You can handle Error yourself.
	 	die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
	 }
	 curl_close($curl);
	 $response = json_decode($json_response, true);
	 if($response["status"] == true){
        // print_r($response["data"]);
        // echo "<br>";
        // echo $response["data"]['status'];
	    if($response["data"]['status'] == "success"){	            
                // Select User 
                		$updateuser = mysqli_query($ahk_conn,"UPDATE `users` SET `status`='1' WHERE `phone`='".$dbdata['phone']."'");
                		if($updateuser){
                		    ?>
                		    <form method="post" action="../register.php" name="f1">
                    			<input type="hidden" name="success" value="true">
                    			
                    		<script type="text/javascript">
                    			document.f1.submit();
                    		</script>
                		    <?php
                		}
            
	    }else{
	        ?>
	        <form method="post" action="../register.php" name="f3">
            			<input type="hidden" name="failed" value="true">
            			
            		<script type="text/javascript">
            			document.f3.submit();
            		</script>
	        <?php
	    }
	 }else{
        ?>
        <form method="post" action="../register.php" name="f3">
                    <input type="hidden" name="failed" value="true">
                    
                <script type="text/javascript">
                    document.f3.submit();
                </script>
        <?php
	 }

    
}


?>
