<?php 
include('../includes/session.php');
include('../includes/config.php');

?>
<?php

if(isset($_POST['status'])){
    if($_POST['status']=="success"){
        
        $userid =$_POST['udf1'];
        $txnid = $_POST['txnid'];
       
        $update = mysqli_query($ahk_conn,"UPDATE users SET status='1' WHERE phone='$userid'");
        
       
        echo "Success";
        ?>
       <form method="post" action="../register.php" name="f3">
			<input type="hidden" name="successmsg" value="true">
			
		<script type="text/javascript">
			document.f3.submit();
		</script>
        <?php 
    
    
    }else{
        ?>
<form method="post" action="../register.php" name="f4">
			<input type="hidden" name="failedmsg" value="true">
			
		<script type="text/javascript">
			document.f4.submit();
		</script>
    
<?php 
    }
}else {
    echo "failed";
?>
<form method="post" action="../register.php" name="f4">
			<input type="hidden" name="failedmsg" value="true">
			
		<script type="text/javascript">
			document.f4.submit();
		</script>
    
<?php 
}




?>
