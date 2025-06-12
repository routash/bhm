<?php

// following files need to be included
include("./lib/config_paytm.php");
include("./lib/encdec_paytm.php"); 
// include("../includes/config.php");

$amount= mysqli_real_escape_string($ahk_conn,$_POST['TXN_AMOUNT']);
$order_id = mysqli_real_escape_string($ahk_conn,$_POST['ORDER_ID']);
//  echo $webdata['pgtype'];
//  echo $webdata['mkey'];




$checkSum = "";
$paramList = array();

 $ORDER_ID = mysqli_real_escape_string($ahk_conn,$_POST["ORDER_ID"]);
 $CUST_ID = mysqli_real_escape_string($ahk_conn,$_POST["CUST_ID"]);
 $INDUSTRY_TYPE_ID = mysqli_real_escape_string($ahk_conn,$_POST["INDUSTRY_TYPE_ID"]);
 $CHANNEL_ID = mysqli_real_escape_string($ahk_conn,$_POST["CHANNEL_ID"]);
 $TXN_AMOUNT = mysqli_real_escape_string($ahk_conn,$_POST["TXN_AMOUNT"]);

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
$paramList["CALLBACK_URL"] = $webdata['callback_url'];

/*
$paramList["CALLBACK_URL"] = "http://localhost/PaytmKit/pgResponse.php";
$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL; //Email ID of customer
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //

*/

//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>