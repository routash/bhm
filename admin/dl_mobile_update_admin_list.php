<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/dl_mobile_update_admin_list.php');

if(isset($_POST['status']) && !empty($_POST['status']) && $_POST['status']){
    $status = mysqli_real_escape_string($ahk_conn,$_POST['status']);
    $id = mysqli_real_escape_string($ahk_conn,$_POST['id']);
     
      if($status == 'refunded'){
           $sl = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM dl_mobile_update WHERE id='$id' LIMIT 1"));
           $amount = $sl['fee'];
           $updt = mysqli_query($ahk_conn,"UPDATE users SET balance=balance+$amount WHERE phone='".$sl['appliedby']."'");
           $sql = mysqli_query($ahk_conn,"UPDATE dl_mobile_update SET  status='$status' WHERE id='$id'");
           if($updt && $sql){
               showAlert('Refund Success');
               ahkRedirect('dl_mobile_update_admin_list.php',1200);
           }
       }else if($status == 'success'){
       $sql = mysqli_query($ahk_conn,"UPDATE dl_mobile_update SET  status='$status' WHERE id='$id'");
       if($sql){
           ?>
           <script>
               $(function(){
                   Swal.fire(
                       'DL Mobile Uploaded Successfully!',
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
    }
?>