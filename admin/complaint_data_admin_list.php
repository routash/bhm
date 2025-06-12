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
include('../template/ahkweb/complaint_data_admin_list.php');
if(isset($_POST['status']) && !empty($_POST['status']) && $_POST['status']  && $_POST['aadhaar_no']){
 $status = mysqli_real_escape_string($ahk_conn,$_POST['status']);
 $aadhaar_no = mysqli_real_escape_string($ahk_conn,$_POST['aadhaar_no']);
 $id = mysqli_real_escape_string($ahk_conn,$_POST['id']);
   $type = $_FILES['aadhaar_pdf']['type'];
   if($type == "application/pdf" || $type =="image/jpeg" || $type == "image/png" || $type == "image/jpg"){
    $ext = rand(000000,999999).$_FILES['aadhaar_pdf']['name'];
    $link = "https://" .$host.$dir."/uploads". "/".$ext;
   $upload = "uploads/";
   if(move_uploaded_file($_FILES['aadhaar_pdf']['tmp_name'],$upload.$ext)){
   }
   if($status == 'refunded'){
        $sl = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM complaint_data WHERE id='$id' LIMIT 1"));
        $amount = $sl['fee'];
        $updt = mysqli_query($ahk_conn,"UPDATE users SET balance=balance+$amount WHERE phone='".$sl['appliedby']."'");
        $sql = mysqli_query($ahk_conn,"UPDATE complaint_data SET  pdf_link='$link', status='$status', aadhaar_no='$aadhaar_no' WHERE id='$id'");
        if($updt && $sql){
            showAlert('Refund Success');
            ahkRedirect('complaint_data_admin_list.php',1200);
        }
    }else if($status == 'success'){
    $sql = mysqli_query($ahk_conn,"UPDATE complaint_data SET  pdf_link='$link', status='$status', aadhaar_no='$aadhaar_no' WHERE id='$id'");
    if($sql){
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Aadhaar Uploaded Successfully!',
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
