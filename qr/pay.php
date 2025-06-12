<?php
require('../includes/session.php');
require('../includes/config.php');
if(isset($_POST['order_id']) && $_POST['amount'] && $_POST['phone'] && !empty($_POST['order_id']) && !empty($_POST['amount']) && !empty($_POST['phone'])){
    $amount = mysqli_real_escape_string($ahk_conn,$_POST['amount']);
    $order_id = mysqli_real_escape_string($ahk_conn,$_POST['order_id']);
    $phone = mysqli_real_escape_string($ahk_conn,$_POST['phone']);
    $pname = str_replace(" ","-",$webdata['webname']);
     $upi_id = $webdata['upi_id'];
     $path = "https://chart.googleapis.com/chart?chs=400x400&cht=qr&chco=474747&chl=upi%3A%2F%2Fpay%3Fpa%3D$upi_id%26pn%3D$pname%26am%3D$amount%26tn%3D$order_id%26cu%3D&choe=UTF-8";
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
}else{
    header('Location: ../admin/');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>QR Payment Gateway</title>
    <meta name="description" content="UPI Gateway Payment">
    <link rel="shortcut icon" href="https://srv1128-files.hstgr.io/e23946a35e50ca08/files/public_html/admin/uploads/qr_code_img.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600">
    <link href="css/gateway.css?v=49274" rel="stylesheet" type="text/css">
    <style>
    .card-size {
        max-width: 320px;
    }
    </style>
</head>

<body class="header-fixed header-mobile-fixed subheader-enabled page-loading flex-mobile-top" id="kt_body">
    <div class="d-flex flex-column flex-center" style="margin: 0 auto;">
        <div class="d-flex flex-row flex-center" id="kt_login" style="margin: 0 auto;">
            <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row flex-column">
                <div class="text-center p-7 position-relative">
                    <div class="card card-size border">
                        <div class="card-body">
                            <div class="login-signin">
                                <div class="mb-0"
                                    style="padding: 2.25rem 2.25rem 0 2.25rem; border-bottom: 1px solid #f2f4f9;">
                                    <h3><?php ahkweb('webname');  ?></h3>
                                    <p class="opacity-60 font-weight-bold">Transfer to</p>
                                </div>
                                <div class="d-flex flex-row"
                                    style="width: 100%; height: 100%;border-bottom: 1px solid #f2f4f9;">
                                    <div class="flex-center"
                                        style="width: 50% !important;height: 100% !important; margin: auto;">
                                        <h4>Total Amount</h4>
                                    </div>
                                    <div class="flex-center"
                                        style="width: 50% !important;height: 100% !important; padding: 1.25rem 0;border-left: 1px solid #f2f4f9;">
                                        <h2 class="rupee_symbol" style="margin: 0"><?php echo $amount; ?></h2>
                                    </div>
                                </div>
                                <div class="" id="done">
                                </div>
                                <form action="" method="POST">
                                <img class="qr_code_img.svg" src="<?php echo $base64; ?>" alt="Scan and Pay" srcset="" style="padding: 2rem 2.25rem 2rem 2.25rem;">
                                <div class="col-md-4">
                                <input class="form-control" id="BANKTXNID" type="text" minlength="21" maxlength="21" name="BANKTXNID" Placeholder="Enter UTR No" value="">
                                </div>
                                    <span class="d-flex flex-row opacity-75 timeout-text" style="border-top: 1px solid #f2f4f9">
                                    <div class="flex-center"
                                        style="width: 50% !important;height: 100% !important; margin: auto; padding: 0 2.25rem">
                                        <a href="../admin/wallet.php" type="button" class="btn btn-xs btn-light-danger font-weight-bold"
                                            id="">Cancel</a></div>
                                    <div id="b-success" class="flex-center"
                                        style="width: 50% !important;height: 100% !important; padding: 1.25rem 0;border-left: 1px solid #f2f4f9;">
                                    </div>
                                    </form>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="d-new">
                </div>
            </div>
        </div><!-- end::Login-->
    </div><!-- end::Main-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://apizone.in/api/js/mainfunction.js"></script>
    <script src="js/sweetalert2.js?v=49274"></script>
    <script src="js/payment_page.js?v=49274"></script>
    <script>
	function submitReq() {
  var phone ='<?php echo $phone ?>';
  var order_id ='<?php echo $order_id ?>';
  var banktxnid = $("#BANKTXNID").val();
      $.ajax({
        url: "success.php",
        type: "POST",
        data: { phone: phone, order_id: order_id, banktxnid: banktxnid },
        success: function (result) {
            console.log(result);
        var obj = JSON.parse(result);
          if (obj.status === 1) {
            var banktxnid = $("#BANKTXNID").prop('disabled', true);
            document.getElementById("done").innerHTML =
        '<div class="alert alert-custom alert-light-success fade show mb-5" role="alert" style="margin: 2rem 2rem 0 2rem;"> <div class="alert-icon">✅</div><div class="alert-text">Your transaction Successfully Submitted...</div></div>';
        setTimeout(() => {
            window.location='../admin/wallet.php';
        }, 1000);
          }else{
            document.getElementById("done").innerHTML =
        '<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert" style="margin: 2rem 2rem 0 2rem;"> <div class="alert-icon">🛑</div><div class="alert-text">Something Went Wrong!</div></div>';
           
          }
          
        },
      });
}

</script>
</body>

</html>