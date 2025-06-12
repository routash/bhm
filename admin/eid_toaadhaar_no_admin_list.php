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
include('../template/ahkweb/eid_toaadhaar_no_admin_list.php');
if(isset($_POST['status']) && !empty($_POST['status']) && $_POST['status']  && $_POST['aadhaar_no']){
 $status = mysqli_real_escape_string($ahk_conn,$_POST['status']);
 $aadhaar_no = mysqli_real_escape_string($ahk_conn,$_POST['aadhaar_no']);
 $id = mysqli_real_escape_string($ahk_conn,$_POST['id']);
    if($status == 'refunded'){
        $sl = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM aadhaar_no WHERE id='$id' LIMIT 1"));
        $amount = $sl['fee'];
        $updt = mysqli_query($ahk_conn,"UPDATE users SET balance=balance+$amount WHERE phone='".$sl['appliedby']."'");
        $sql = mysqli_query($ahk_conn,"UPDATE aadhaar_no SET  status='$status', aadhaar_no='$aadhaar_no' WHERE id='$id'");
        if($updt && $sql){
            showAlert('Refund Success');
            ahkRedirect('eid_toaadhaar_no_admin_list.php',1200);
        }
    }else if($status == 'success'){
        $sql = mysqli_query($ahk_conn,"UPDATE aadhaar_no SET  status='$status', aadhaar_no='$aadhaar_no' WHERE id='$id'");
        if($sql){
            showAlert('Aadhaar Number Updated Successfully!');
            ahkRedirect('eid_toaadhaar_no_admin_list.php',1200);
        }
    }
    
   

}
?>
