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
include('../template/ahkweb/LogoUpdate.php');
if(isset($_POST['lg'])  ){
   // Upload Files
   $type = $_FILES['logo']['type'];
//    printR($_FILES);
   if($type == "image/jpg"  || $type == "image/png" || $type == "image/jpeg"  || $type == "image/gif" ){
    $ext = rand(000000,999999).$_FILES['logo']['name'];
    $link = "https://" .$host.$dir."/uploads". "/".$ext;
   $upload = "uploads/";
   if(move_uploaded_file($_FILES['logo']['tmp_name'],$upload.$ext) ){
       if(ahkQuery("UPDATE settings SET logo='$link' WHERE id=1")){
        showAlert('Logo Updated Successfully!');
        ahkRedirect('',0);
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
   // Upload End

}
?>