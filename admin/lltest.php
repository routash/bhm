<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/lltest.php');
if(isset($_POST['application_no']) && !empty($_POST['dob']) && !empty($_POST['state']) ){
    $application_no = mysqli_real_escape_string($ahk_conn,$_POST['application_no']);
    $dob = mysqli_real_escape_string($ahk_conn,$_POST['dob']);
    $password = mysqli_real_escape_string($ahk_conn,$_POST['password']);
    $state = mysqli_real_escape_string($ahk_conn,$_POST['state']);
    $fee = mysqli_real_escape_string($ahk_conn,$_POST['fee']);
    $appliedby = $udata['phone'];
    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='lltext' "));
    if($udata['balance']>=$price['price']){
        $fee = $price['price'];
        $nbal = $udata['balance']-$price['price'];
        $debit = mysqli_query($ahk_conn,"UPDATE users SET balance=balance-$fee WHERE phone='$appliedby'");
        $updatehistory = mysqli_query($ahk_conn,"INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$appliedby','$fee','$nbal','L.L Test Pass','1','Debit')");
        if($debit && $updatehistory){
        $submit = mysqli_query($ahk_conn,"INSERT INTO `lltext` (`appliedby`, `application_no`, `dob`, `password`, `state`, `status`, `fee`) VALUES('$appliedby','$application_no','$dob','$password','$state','pending','$fee')");
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