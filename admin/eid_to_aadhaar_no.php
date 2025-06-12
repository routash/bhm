<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/eid_to_aadhaar_no.php');
if(isset($_POST['eid']) && !empty($_POST['name']) && !empty($_POST['date']) && !empty($_POST['time']) ){
    $name = mysqli_real_escape_string($ahk_conn,$_POST['name']);
    $eid = mysqli_real_escape_string($ahk_conn,$_POST['eid']);
    $date = mysqli_real_escape_string($ahk_conn,$_POST['date']);
    $time = mysqli_real_escape_string($ahk_conn,$_POST['time']);
    $fee = mysqli_real_escape_string($ahk_conn,$_POST['fee']);
    $application_no = "RK PRINT". rand(00000000,99999999);
    $appliedby = $udata['phone'];
    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='aadhaar_no' "));
    if($udata['balance']>=$price['price']){
        $fee = $price['price'];
        $nbal = $udata['balance']-$price['price'];
        $debit = mysqli_query($ahk_conn,"UPDATE users SET balance=balance-$fee WHERE phone='$appliedby'");
        $updatehistory = mysqli_query($ahk_conn,"INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$appliedby','$fee','$nbal','Aadhaar Number Find','1','Debit')");
        if($debit && $updatehistory ){
        $submit = mysqli_query($ahk_conn,"INSERT INTO `aadhaar_no` (`appliedby`, `name`, `eid`, `date`, `time`, `status`, `fee`, `purpose`) VALUES('$appliedby','$name','$eid','$date','$time','pending','$fee','Generated')");
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