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
include('../template/ahkweb/LimitCrossAdminList.php');
if(isset($_GET['deleteid']) && $_GET['deleteid']!=NULL){
    $deleteid = base64_decode(mysqli_real_escape_string($ahk_conn,$_GET['deleteid']));
    if(mysqli_query($ahk_conn,"DELETE from limitcross WHERE id='$deleteid'")){
        showAlert('Data Deleted Success');
        ahkRedirect('LimitCrossAdminList.php',1200);
    }
}
if(isset($_POST['status']) && !empty($_POST['status']) && $_POST['status']  && $_POST['remark']){
 $status = mysqli_real_escape_string($ahk_conn,$_POST['status']);
 $remark = mysqli_real_escape_string($ahk_conn,$_POST['remark']);
 $id = mysqli_real_escape_string($ahk_conn,$_POST['id']);
    if($status == 'refunded'){
        $sl = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM limitcross WHERE id='$id' LIMIT 1"));
        $amount = $sl['fee'];
        $updt = mysqli_query($ahk_conn,"UPDATE users SET balance=balance+$amount WHERE phone='".$sl['appliedby']."'");
        $sql = mysqli_query($ahk_conn,"UPDATE limitcross SET  status='$status', remark='$remark' WHERE id='$id'");
        if($updt && $sql){
            showAlert('Refund Success');
            ahkRedirect('LimitCrossAdminList.php',1200);
        }
    }else if($status == 'success'){
        $sql = mysqli_query($ahk_conn,"UPDATE limitcross SET  status='$status', remark='$remark' WHERE id='$id'");
        if($sql){
            showAlert('Aadhaar Number Updated Successfully!');
            ahkRedirect('LimitCrossAdminList.php',1200);
        }
    }
    
   

}
?>
