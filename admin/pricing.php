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
include('../template/ahkweb/pricing.php');
if(isset($_POST['aadhaarpdf'])){
    $aadhaarpdf = mysqli_real_escape_string($ahk_conn,$_POST['aadhaarpdf']);
    $aadhaar_no = mysqli_real_escape_string($ahk_conn,$_POST['aadhaar_no']);
    $pan_pdf = mysqli_real_escape_string($ahk_conn,$_POST['pan_pdf']);
    $pan_no = mysqli_real_escape_string($ahk_conn,$_POST['pan_no']);
    $limitcross_fee = mysqli_real_escape_string($ahk_conn,$_POST['limitcross_fee']);
    $uti_pdf = mysqli_real_escape_string($ahk_conn,$_POST['uti_pdf']);                              
    $vaccine = mysqli_real_escape_string($ahk_conn,$_POST['vaccine']);
    $mobile_no_to_pdf = mysqli_real_escape_string($ahk_conn,$_POST['mobile_no_to_pdf']);
    $aadhaar = mysqli_real_escape_string($ahk_conn,$_POST['aadhaar']);
    $complaint_data = mysqli_real_escape_string($ahk_conn,$_POST['complaint_data']);
    $instant_dl = mysqli_real_escape_string($ahk_conn,$_POST['instant_dl']);
    $ration_card = mysqli_real_escape_string($ahk_conn,$_POST['ration_card']);
    $voter = mysqli_real_escape_string($ahk_conn,$_POST['voter']);
    $ration_to_aadhaar = mysqli_real_escape_string($ahk_conn,$_POST['ration_to_aadhaar']);
    $pan_details = mysqli_real_escape_string($ahk_conn,$_POST['pan_details']);
    $aadhaarprint = mysqli_real_escape_string($ahk_conn,$_POST['aadhaarprint']);
    $rc_print = mysqli_real_escape_string($ahk_conn,$_POST['rc_print']);
    $lltext = mysqli_real_escape_string($ahk_conn,$_POST['lltext']);
    $ayushman_find_fee = mysqli_real_escape_string($ahk_conn,$_POST['ayushman_find_fee']);

    $dl_mobile_update_fee = mysqli_real_escape_string($ahk_conn,$_POST['dl_mobile_update_fee']);

    $Twowheelerpuc = mysqli_real_escape_string($ahk_conn,$_POST['2wheelerpuc']);
    $Fourwheelerpuc = mysqli_real_escape_string($ahk_conn,$_POST['4wheelerpuc']);

    $update = mysqli_query($ahk_conn,"UPDATE pricing SET price='$aadhaarpdf' WHERE service_name='aadhaarpdf'");
    $update1 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$aadhaar_no' WHERE service_name='aadhaar_no'");
    $update2 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$pan_pdf' WHERE service_name='pan_pdf'");
    $update3 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$pan_no' WHERE service_name='pan_no'");
    $update4 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$limitcross_fee' WHERE service_name='limitcross_fee'");
    $update5 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$uti_pdf' WHERE service_name='uti_pdf'");
    $update6 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$vaccine' WHERE service_name='vaccine'");
    $update7 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$mobile_no_to_pdf' WHERE service_name='mobile_no_to_pdf'");
    $update8 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$aadhaar' WHERE service_name='aadhaar'");
    $update9 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$complaint_data' WHERE service_name='complaint_data'");
    $update10 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$instant_dl' WHERE service_name='instant_dl'");
    $update11 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$ration_card' WHERE service_name='ration_card'");
    $update12 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$voter' WHERE service_name='voter'");
    $update13 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$ration_to_aadhaar' WHERE service_name='ration_to_aadhaar'");
    $update14 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$pan_details' WHERE service_name='pan_details'");
    $update15 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$aadhaarprint' WHERE service_name='aadhaarprint'");
    $update16 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$rc_print' WHERE service_name='rc_print'");
    $update17 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$lltext' WHERE service_name='lltext'");
    $update17 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$ayushman_find_fee' WHERE service_name='ayushman_find_fee'");

    $update17 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$dl_mobile_update_fee' WHERE service_name='dl_mobile_update_fee'");
    $update18 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$Twowheelerpuc' WHERE service_name='2wheelerpuc'");
    $update19 = mysqli_query($ahk_conn,"UPDATE pricing SET price='$Fourwheelerpuc' WHERE service_name='4wheelerpuc'");
    if( $update && $update1 && $update2 && $update3 && $update4 && $update5 && $update6 && $update7 && $update8 && $update9 && $update10 && $update11 && $update12 && $update13 && $update14 && $update15 && $update16 && $update17 && $update18 && $update19 ){
        ?>
        <script>
        $(function(){
            Swal.fire(
                'Price Updated Successfully',
                '',
                'success'
            )
        })
        setTimeout(() => {
            window.location='';
        }, 1200);
    </script>
    <?php
    }else{
        ?>
        <script>
        $(function(){
            Swal.fire(
                'Price Not Updated',
                '',
                'error'
            )
        })
    </script>
    <?php
    }
}
?>