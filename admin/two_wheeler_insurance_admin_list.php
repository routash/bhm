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
include('../template/ahkweb/two_wheeler_insurance_admin_list.php');

if(isset($_POST['submit'])){

    $mobile_number = mysqli_real_escape_string($ahk_conn, $_POST['mobile_number']);
    $wheeler_cc = mysqli_real_escape_string($ahk_conn, $_POST['wheeler_cc']);
    $appliedby = $udata['phone'];

    $rc_link = "";
    if(isset($_FILES['rc_photo']) && $_FILES['rc_photo']['error'] == 0){
        $rc_type = $_FILES['rc_photo']['type'];
        $allowed_types = ['image/jpeg', 'image/jpg', 'image/png'];
        if(in_array($rc_type, $allowed_types)){
            $rc_filename = rand(100000,999999).'_'.basename($_FILES['rc_photo']['name']);
            $upload_path = "uploads/" . $rc_filename;
            if(move_uploaded_file($_FILES['rc_photo']['tmp_name'], $upload_path)){
                $rc_link = $upload_path;
            }
        }
    }

    $adhar_link = "";
    if(isset($_FILES['adhar_photo']) && $_FILES['adhar_photo']['error'] == 0){
        $adhar_type = $_FILES['adhar_photo']['type'];
        $allowed_types = ['image/jpeg', 'image/jpg', 'image/png'];
        if(in_array($adhar_type, $allowed_types)){
            $adhar_filename = rand(100000,999999).'_'.basename($_FILES['adhar_photo']['name']);
            $upload_path = "uploads/" . $adhar_filename;
            if(move_uploaded_file($_FILES['adhar_photo']['tmp_name'], $upload_path)){
                $adhar_link = $upload_path;
            }
        }
    }

    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn, "SELECT * FROM pricing WHERE service_name='$wheeler_cc'"));
    if($price){
        $fee = $price['price'];
        if($udata['balance'] >= $fee){
            $nbal = $udata['balance'] - $fee;

            $debit = mysqli_query($ahk_conn,"UPDATE users SET balance=balance-$fee WHERE phone='$appliedby'");

            $updatehistory = mysqli_query($ahk_conn,"INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$appliedby','$fee','$nbal','Two Wheeler Insurance','$fee','Debit')");

            if($debit && $updatehistory){
                $submit = mysqli_query($ahk_conn, "INSERT INTO `two_wheeler_insurance` (`appliedby`, `rc_photo`, `adhar_photo`, `mobile_number`, `wheeler_cc`, `status`, `fee`) VALUES ('$appliedby', '$rc_link', '$adhar_link', '$mobile_number', '$wheeler_cc', 'pending', '$fee')");

                if($submit){
                    ?>
                    <script>
                        Swal.fire('Applied Successfully', 'You Will Get it Soon', 'success');
                        setTimeout(() => { window.location.href=''; }, 1500);
                    </script>
                    <?php
                } else {
                    ?>
                    <script>Swal.fire('Oops!', 'Database Insert Failed', 'error');</script>
                    <?php
                }
            } else {
                ?>
                <script>Swal.fire('Oops!', 'Wallet update failed', 'error');</script>
                <?php
            }
        } else {
            ?>
            <script>Swal.fire('Insufficient Wallet Balance', 'Please add money to wallet', 'error');</script>
            <?php
        }
    } else {
        ?>
        <script>Swal.fire('Error', 'Pricing not found', 'error');</script>
        <?php
    }
}
?>