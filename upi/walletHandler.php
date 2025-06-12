<?php
include('../includes/config.php');
if(isset($_GET['client_txn_id'] )!=null && $_GET['txn_id']){
    $client_txn_id = $_GET['client_txn_id'];
    $res = mysqli_query($ahk_conn,"SELECT * FROM wallet WHERE txn_id='$client_txn_id'");
    $dbdata = mysqli_fetch_assoc($res);
    $_SESSION['phone'] = $dbdata['phone'];
    $dbtxn_id = $dbdata['txn_id'];
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
        print_r($response["data"]);
        echo "<br>";
        echo $response["data"]['status'];
	    if($response["data"]['status'] == "success"){	            
                // Select User 
                $ud = mysqli_query($ahk_conn,"SELECT * FROM users WHERE phone='".$dbdata['phone']."' ");
                $udata = mysqli_fetch_assoc($ud);
                // Update Balance if pending
                if($dbdata['status'] =="pending"){
                        $sql = "UPDATE `wallet` SET `status`='success' WHERE txn_id='$dbtxn_id'";
                		$q = mysqli_query($ahk_conn,$sql);
                		$addbal = $response["data"]['amount'];
                		$nbalance = $udata['balance'] + $addbal;
                		$updatewallet = mysqli_query($ahk_conn,"UPDATE `users` SET `balance`='$nbalance' WHERE `phone`='".$dbdata['phone']."'");
                		if($updatewallet){
                		    ?>
                		    <form method="post" action="../admin/wallet.php" name="f1">
                    			<input type="hidden" name="success" value="true">
                    			
                    		<script type="text/javascript">
                    			document.f1.submit();
                    		</script>
                		    <?php
                		}
                }else{
                    ?>
                    	<form method="post" action="../admin/wallet.php" name="f2">
            			<input type="hidden" name="success1" value="true">
            			
                		<script type="text/javascript">
                			document.f2.submit();
                		</script>
                    <?php
                }
	    }else{
	        ?>
	        <form method="post" action="../admin/wallet.php" name="f3">
            			<input type="hidden" name="failed" value="true">
            			
            		<script type="text/javascript">
            			document.f3.submit();
            		</script>
	        <?php
	    }
	 }else{
		?>
		<form method="post" action="../admin/wallet.php" name="f3">
					<input type="hidden" name="failed" value="true">
					
				<script type="text/javascript">
					document.f3.submit();
				</script>
		<?php
	 }

    
}


?>
