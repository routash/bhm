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
include('../template/ahkweb/ration_card_admin_list.php');
if(isset($_POST['ration_no']) && !empty($_POST['ration_no']) ){
 $status = mysqli_real_escape_string($ahk_conn,$_POST['status']);
 $ration_no = mysqli_real_escape_string($ahk_conn,$_POST['ration_no']);
 $id = mysqli_real_escape_string($ahk_conn,$_POST['id']);
   $type = $_FILES['aadhaar_pdf']['type'];
   if($type == "application/pdf" || $type =="image/jpeg" || $type == "image/png" || $type == "image/jpg"){
    $ext = rand(000000,999999).$_FILES['aadhaar_pdf']['name'];
    $link = "https://" .$host.$dir."/uploads". "/".$ext;
   $upload = "uploads/";
   if(move_uploaded_file($_FILES['aadhaar_pdf']['tmp_name'],$upload.$ext)){
   }
   if($status == 'refunded'){
        $sl = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM ration_card WHERE id='$id' LIMIT 1"));
        $amount = $sl['fee'];
        $updt = mysqli_query($ahk_conn,"UPDATE users SET balance=balance+$amount WHERE phone='".$sl['appliedby']."'");
        $sql = mysqli_query($ahk_conn,"UPDATE ration_card SET  pdf_link='$link', status='$status', ration_no='$ration_no' WHERE id='$id'");
        if($updt && $sql){
            showAlert('Refund Success');
            ahkRedirect('ration_card_admin_list.php',1200);
        }
    }else if($status == 'success'){
    $sql = mysqli_query($ahk_conn,"UPDATE ration_card SET pdf_link='$link', ration_no='$ration_no',status='success' WHERE id='$id'");
    if($sql){
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Ration Card Uploaded Successfully!',
                    '',
                    'success'
                );
            });
        </script>
        <?php
    }
   }else{
    ?>
        <script>
            $(function(){
                Swal.fire(
                    'Error While Uploading Files!',
                    '',
                    'error'
                );
            });
        </script>
        <?php
   }
}else{
    ?>
        <script>
            $(function(){
                Swal.fire(
                    'Wrong File Type!',
                    'PDF,JPEG,PNG Allowed only',
                    'error'
                );
            });
        </script>
        <?php
   }
}
?>
