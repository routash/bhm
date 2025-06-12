<?php
include('../includes/session.php');
include('../includes/config.php');

if(isset($_POST['phone']) && !empty($_POST['phone']) && !empty($_POST['vehicle']) ){
    
    $phone = trim($_POST['phone']);
    $vehicle = mysqli_real_escape_string($ahk_conn,$_POST['vehicle']);
    $appliedby = $udata['phone'];
    $date = date("jS \of F Y h:i:s A");
    
    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='2wheelerpuc' "));
    if($udata['balance']>=$price['price']){
       
        // Upload Files
        $type = $_FILES['front_side']['type'];
        // $type2 = $_FILES['back_side']['type'];
        // printR($_FILES);
        if($type == "image/jpeg"){
         $ext = rand(000000,999999).$_FILES['front_side']['name'];
         
        //  $ext2 = rand(000000,999999).$_FILES['back_side']['name'];
         $link = "https://" .$host.$dir."/uploads". "/".$ext;
        //  $link2 = "https://" .$host.$dir."/uploads". "/".$ext2;
        $upload = "uploads/";
      
        if(move_uploaded_file($_FILES['front_side']['tmp_name'],$upload.$ext)){
            $fee = $price['price'];
            $nbal = $udata['balance']-$price['price'];
            $debit = mysqli_query($ahk_conn,"UPDATE users SET balance=balance-$fee WHERE phone='$appliedby'");
            
            $updatehistory = mysqli_query($ahk_conn,"INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$appliedby','$fee','$nbal','2 Wheeler Fee','1','Debit')");
            if($debit && $updatehistory ){
            $submit = mysqli_query($ahk_conn,"INSERT INTO `2wheelerpuc` (`appliedby`, `phone`, `vehicle`, `status`, `fee`,`date`,`front_side`) VALUES('$appliedby', '$phone','$vehicle','pending','$fee','$date','$ext')");
            if($submit == true){
               showAlert('Applied Successfully','You Will Get it Soon');
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
include('../template/ahkweb/2wheelerpuc.php');

?>