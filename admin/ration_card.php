<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/ration_card.php');

if(isset($_POST['name']) && !empty($_POST['ration_no']) && !empty($_POST['district']) && !empty($_POST['state']) ){
    $name = mysqli_real_escape_string($ahk_conn,$_POST['name']);
    $district = mysqli_real_escape_string($ahk_conn,$_POST['district']);
    $state = mysqli_real_escape_string($ahk_conn,$_POST['state']);
    $ration_no = mysqli_real_escape_string($ahk_conn,$_POST['ration_no']);
    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='ration_card' "));
    $application_no = "AHK". rand(00000000,99999999);
    $fee = $price['price'];
    $appliedby = $udata['phone'];
    if($udata['balance']>=$price['price']){
        $fee = $price['price'];
        $debit = mysqli_query($ahk_conn,"UPDATE users SET balance=balance-$fee WHERE phone='$appliedby'");
        $updatehistory = mysqli_query($ahk_conn,"INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$appliedby','$fee','$nbal','Driving Licence PDF','1','Debit')");
        if($debit && $updatehistory){
        $submit = mysqli_query($ahk_conn,"INSERT INTO `ration_card` (`appliedby`, `name`, `district`, `state`, `ration_no`, `status`, `fee`) VALUES('$appliedby','$name','$district','$state','$ration_no','pending','$fee')");
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