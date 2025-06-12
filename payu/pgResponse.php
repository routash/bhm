<?php 
include('../includes/session.php');
include('../includes/config.php');

?>
<?php
$_SESSION['phone'] = $_POST['udf1'];
if(!isset($_SESSION)){
    $_SESSION['phone'] = $_POST['udf1'];
}
if(isset($_POST['status'])){
    if($_POST['status']=="success"){
        
        $userid =$_POST['udf1'];
        $txnid = $_POST['txnid'];
        $sql = "UPDATE wallet SET status='success' WHERE phone='$userid'" ;
        $sl = mysqli_query($ahk_conn,"SELECT * FROM users WHERE phone='$userid'");
        $udata =mysqli_fetch_assoc($sl);
        $check = mysqli_query($ahk_conn,"SELECT * FROM wallet WHERE phone='$userid' AND txn_id='$txnid' AND status='pending'");
        if(mysqli_num_rows($check)==1){
            if($_POST['amount']!=NULL){
                $newbal= $udata['balance'];
            }
            $newbal = $udata['balance'] +$_POST['amount'];
        $walletadd = mysqli_query($ahk_conn,"UPDATE users SET balance='$newbal' WHERE phone='$userid' ");
        mysqli_query($ahk_conn,$sql);
            
        }
        
        echo "Success";
        ?> 
<form method="post" action="../admin/wallet.php" name="f3">
			<input type="hidden" name="successmsg" value="true">
			
		<script type="text/javascript">
			document.f3.submit();
		</script>
    
<?php 
       
    
    
    }else{
        
        ?>
        <form method="post" action="../admin/wallet.php" name="f4">
			<input type="hidden" name="failedmsg" value="true">
			
		<script type="text/javascript">
			document.f4.submit();
		</script>
        <?php 
    }
}
else { 
    echo "failed";
?>
<form method="post" action="../admin/wallet.php" name="f4">
			<input type="hidden" name="failedmsg" value="true">
			
		<script type="text/javascript">
			// document.f4.submit();
		</script>
    
<?php }




?>
