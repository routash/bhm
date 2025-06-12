<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/vaccine.php');
if(isset($_POST['name']) && !empty($_POST['aadhaar']) && !empty($_POST['date']) && !empty($_POST['gender']) && !empty($_POST['phone']) && !empty($_POST['dose'])){
    $name = mysqli_real_escape_string($ahk_conn,$_POST['name']);
    $aadhaar = mysqli_real_escape_string($ahk_conn,$_POST['aadhaar']);
    $date = mysqli_real_escape_string($ahk_conn,$_POST['date']);
    $gender = mysqli_real_escape_string($ahk_conn,$_POST['gender']);
    $phone = mysqli_real_escape_string($ahk_conn,$_POST['phone']);
    $dose = mysqli_real_escape_string($ahk_conn,$_POST['dose']);
    $fee = mysqli_real_escape_string($ahk_conn,$_POST['fee']);
    $application_no = "AHK". rand(00000000,99999999);
    $appliedby = $udata['phone'];
    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='vaccine' "));
    if($udata['balance']>=$price['price']){
        $fee = $price['price'];
        $nbal = $udata['balance']-$price['price'];
        $debit = mysqli_query($ahk_conn,"UPDATE users SET balance=balance-$fee WHERE phone='$appliedby'");
        $updatehistory = mysqli_query($ahk_conn,"INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$appliedby','$fee','$nbal','Vaccine','1','Debit')");
        if($debit && $updatehistory){
        $submit = mysqli_query($ahk_conn,"INSERT INTO `vaccine` (`appliedby`, `name`, `aadhaar`, `date`, `gender`, `dose`, `status`, `phone`,`fee`) VALUES('$appliedby','$name','$aadhaar','$date','$gender','$dose','pending','$phone','$fee')");
       if($submit){
            ?>
            <script>
                $(function(){
                    Swal.fire(
                        'Applied Successfully',
                        'You Will Get it Soon',
                        'success'
                    )
                })
                setTimeout(function() {
                    window.location.href='';
                }, 1500);
            </script>
            <?php
        }else{
            ?>
            <script>
                $(function(){
                    Swal.fire(
                        'Opps',
                        'Something Went Wrong',
                        'error'
                    )
                })
            </script>
            <?php
        }

        }else{
            ?>
            <script>
                $(function(){
                    Swal.fire(
                        'Opps',
                        'Something Went Wrong',
                        'error'
                    )
                })
            </script>
            <?php
        }

        
    }else{
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Insuficient Wallet Balance',
                    'Please Add Money to wallet',
                    'error'
                )
            })
        </script>
        <?php

    }
    
    
}