<?php

// following files need to be included
include("./lib/config_paytm.php");
include("./lib/encdec_paytm.php");
// include("../includes/config.php");


//  From PG
$order = $_POST['ORDERID'];
$addbal = $_POST['TXNAMOUNT'];
$PAYMENTMODE  = $_POST['PAYMENTMODE'];
$RESPMSG  = $_POST['RESPMSG'];
$BANKTXNID  = $_POST['BANKTXNID'];


$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;


$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		$updateuser = mysqli_query($ahk_conn,"UPDATE `users` SET `status`='1' WHERE `order_id`='$order'");
		?>
			<form method="post" action="../register.php" name="f3">
			<input type="hidden" name="successmsg" value="true">
			
		<script type="text/javascript">
			document.f3.submit();
		</script>
	</form>
		<?php
		
		// echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
		?>
			<form method="post" action="../register.php" name="f4">
			<input type="hidden" name="failedmsg" value="true">
			
		<script type="text/javascript">
			document.f4.submit();
		</script>
	</form>
		<?php
	}

	// if (isset($_POST) && count($_POST)>0 )
	// { 
	// 	foreach($_POST as $paramName => $paramValue) {
	// 			echo "<br/>" . $paramName . " = " . $paramValue;
	// 	}
	// }
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>