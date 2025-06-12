<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/LimitCross.php');
if(isset($_POST['name']) && !empty($_POST['name']) && !empty($_POST['mobile']) ){
    $name = mysqli_real_escape_string($ahk_conn,$_POST['name']);
    $mobile = mysqli_real_escape_string($ahk_conn,$_POST['mobile']);
    $application_no = "AHK". rand(00000000,99999999);
    $appliedby = $udata['phone'];
    $date = date("jS \of F Y h:i:s A");
    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='limitcross_fee' "));
    if($udata['balance']>=$price['price']){
        // Upload Files
        $type = $_FILES['aadhaar']['type'];
        $type2 = $_FILES['declaration']['type'];
        // printR($_FILES);
        if($type == "application/pdf"  && $type2 == "application/pdf"){
         $ext = rand(000000,999999).$_FILES['aadhaar']['name'];
         $ext2 = rand(000000,999999).$_FILES['declaration']['name'];
         $link = "https://" .$host.$dir."/uploads". "/".$ext;
         $link2 = "https://" .$host.$dir."/uploads". "/".$ext2;
        $upload = "uploads/";
        if(move_uploaded_file($_FILES['aadhaar']['tmp_name'],$upload.$ext) && move_uploaded_file($_FILES['declaration']['tmp_name'],$upload.$ext2)){
            $fee = $price['price'];
            $nbal = $udata['balance']-$price['price'];
            $debit = mysqli_query($ahk_conn,"UPDATE users SET balance=balance-$fee WHERE phone='$appliedby'");
            $updatehistory = mysqli_query($ahk_conn,"INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$appliedby','$fee','$nbal','AADHAAR Limit Cross Application','1','Debit')");
            if($debit && $updatehistory ){
            $submit = mysqli_query($ahk_conn,"INSERT INTO `limitcross` (`appliedby`, `application_no`, `name`, `mobile`, `status`, `fee`,`date`,`aadhaar_pdf`,`declaration_form`) VALUES('$appliedby','$application_no','$name','$mobile','pending','$fee','$date','$ext','$ext2')");
            if($submit == true){
               showAlert('Application Submitted','We Will Contact Soon');
            }else{
                showAlert('Opps','Something Went Wrong','error');
            }
                }else{
                    showAlert('Opps','Something Went Wrong2','error');
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
    }else{
        showAlert('Wallet Balance is Low!','Please Recharge Now!','error');
       }
    


}
?>