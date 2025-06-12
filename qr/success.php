<?php
require('../includes/session.php');
require('../includes/database.php');

if(isset($_POST['phone']) && $_POST['order_id'] && $_POST['banktxnid']){
    $phone = mysqli_real_escape_string($ahk_conn,$_POST['phone']);
    $order_id = mysqli_real_escape_string($ahk_conn,$_POST['order_id']);
    $banktxnid = mysqli_real_escape_string($ahk_conn,$_POST['banktxnid']);
    $update = mysqli_query($ahk_conn,"UPDATE wallet SET BANKTXNID='$banktxnid' WHERE txn_id='$order_id'  AND phone='$phone' ");
    if($update){
        echo json_encode(array('status' => 1, 'msg' => "Success"));
    }else{

        echo json_encode(array('status' => 2, 'msg' => "Wrong"));
    }
}else{
    echo json_encode(array('status' => 0, 'msg' => "Provide All Data"));
}
?>