<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/dl_mobile_update.php');
if(isset($_POST['licence_number']) && !empty($_POST['dob']) && !empty($_POST['state']) ){
    $licence_number = mysqli_real_escape_string($ahk_conn,$_POST['licence_number']);
    $dob = mysqli_real_escape_string($ahk_conn,$_POST['dob']);
    $mobile_number = mysqli_real_escape_string($ahk_conn,$_POST['mobile_number']);
    $name = mysqli_real_escape_string($ahk_conn,$_POST['name']);
    $state = mysqli_real_escape_string($ahk_conn,$_POST['state']);
    $fee = mysqli_real_escape_string($ahk_conn,$_POST['fee']);
    $appliedby = $udata['phone'];
    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='dl_mobile_update_fee' "));
    if($udata['balance']>=$price['price']){
        $fee = $price['price'];
        $nbal = $udata['balance']-$price['price'];
        $debit = mysqli_query($ahk_conn,"UPDATE users SET balance=balance-$fee WHERE phone='$appliedby'");
        $updatehistory = mysqli_query($ahk_conn,"INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$appliedby','$fee','$nbal','L.L Test Pass','1','Debit')");
        if($debit && $updatehistory){
        $submit = mysqli_query($ahk_conn,"INSERT INTO `dl_mobile_update` (`appliedby`, `licence_number`, `dob`, `mobile_number`, `name`, `state`, `status`, `fee`) VALUES('$appliedby','$licence_number','$dob','$mobile_number','$name','$state','pending','$fee')");
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