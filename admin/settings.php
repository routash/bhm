<?php
include('../includes/session.php');
include('../includes/config.php');
if(checkAdmin($udata['type']) == false){
    ?>
    <script>
        window.location='index.php';
    </script>
    <?php
    die();
}
include('../template/ahkweb/settings.php');
if(isset($_POST['webname'])){
    $name = mysqli_real_escape_string($ahk_conn,$_POST['webname']);
    $phone = mysqli_real_escape_string($ahk_conn,$_POST['phone']);
    $email = mysqli_real_escape_string($ahk_conn,$_POST['email']);
    $address = mysqli_real_escape_string($ahk_conn,$_POST['address']);
    $pgtype = mysqli_real_escape_string($ahk_conn,$_POST['pgtype']);
    $mid = mysqli_real_escape_string($ahk_conn,$_POST['mid']);
    $mkey = mysqli_real_escape_string($ahk_conn,$_POST['mkey']); 
    $api_key = mysqli_real_escape_string($ahk_conn,$_POST['api_key']); 
    $upi_id = mysqli_real_escape_string($ahk_conn,$_POST['upi_id']); 
    $HomeTemplatename = mysqli_real_escape_string($ahk_conn,$_POST['HomeTemplatename']); 
    $ret_reg_fee = mysqli_real_escape_string($ahk_conn,$_POST['ret_reg_fee']); 
    $dist_reg_fee = mysqli_real_escape_string($ahk_conn,$_POST['dist_reg_fee']); 
    $super_dist_reg_fee = mysqli_real_escape_string($ahk_conn,$_POST['super_dist_reg_fee']); 
    // Payment PAYU
    $payu_mkey = mysqli_real_escape_string($ahk_conn,$_POST['payu_mkey']); 
    $salt = mysqli_real_escape_string($ahk_conn,$_POST['salt']); 
    // Payment Mode
    $paytm = mysqli_real_escape_string($ahk_conn,$_POST['paytm']);
    $payu = mysqli_real_escape_string($ahk_conn,$_POST['payu']);
    $upi = mysqli_real_escape_string($ahk_conn,$_POST['upi']);
    $qr = mysqli_real_escape_string($ahk_conn,$_POST['qr']);
    
    $callback_url = mysqli_real_escape_string($ahk_conn,$_POST['callback_url']);
    // UPI 
    $upi_key = mysqli_real_escape_string($ahk_conn,$_POST['upi_key']);
    $update = mysqli_query($ahk_conn,"UPDATE settings SET webname='$name', phone='$phone', email='$email', address='$address', pgtype='$pgtype', mid='$mid',mkey='$mkey', callback_url='$callback_url',paytm='$paytm',payu='$payu',upi='$upi', payu_mkey='$payu_mkey', salt='$salt', upi_key='$upi_key', qr='$qr',upi_id='$upi_id', nsdl_api_key='$api_key',HomeTemplatename='$HomeTemplatename', ret_reg_fee='$ret_reg_fee', dist_reg_fee='$dist_reg_fee', super_dist_reg_fee='$super_dist_reg_fee' WHERE id=1");
    if($update){
        ?>
        <script>
        $(function(){
            Swal.fire(
                'Settings Updated Successfully',
                '',
                'success'
            )
        })
        setTimeout(() => {
            window.location='';
        }, 1200);
    </script>
    <?php 
    }else{
        ?>
        <script>
        $(function(){
            Swal.fire(
                'Settings Not Updated',
                '',
                'error'
            )
        })
    </script>
    <?php
    }
}
?>