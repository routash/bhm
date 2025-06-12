<?php
include('./includes/config.php');

include('./template/ahkweb/authentication-signup.php');

if(isset($_POST['phone']) && !empty($_POST['phone'])){
    $name = mysqli_real_escape_string($ahk_conn,$_POST['name']);
    $email = mysqli_real_escape_string($ahk_conn,$_POST['email']);
    $state = mysqli_real_escape_string($ahk_conn,$_POST['state']);
    $shop = mysqli_real_escape_string($ahk_conn,$_POST['shop']);
    $phone = mysqli_real_escape_string($ahk_conn,$_POST['phone']);
    $usertype = mysqli_real_escape_string($ahk_conn,$_POST['usertype']);
    $password = mysqli_real_escape_string($ahk_conn,$_POST['password']);
    $cpassword = mysqli_real_escape_string($ahk_conn,$_POST['cpassword']);
    $order_id = "DOS".rand(000000,999999);
    $amount =1;
    if($usertype == "retailer"){
        $amount = $webdata['ret_reg_fee'];
    }else if($usertype == "distributor"){
        $amount = $webdata['dist_reg_fee'];
    }else{
        $amount = 999;
    }
    if($_POST['usertype'] =="ADMIN" || $_POST['usertype'] =="admin" || $_POST['usertype'] =="Admin"){
        ?>
        <script>
            $(function(){ 
                Swal.fire(
                    'Wow!',
                    'You are A cheater WHY WHY WHY...!!!! WAH MOZ KARDI🖕🖕🖕🖕🖕 ',
                    'error'
                )
            })
        </script>
        <?php 
    }else{
        $fdata = mysqli_query($ahk_conn,"SELECT * FROM users WHERE phone='$phone' OR email='$email'");
        if(mysqli_num_rows($fdata) == 0){
            if($_POST['password'] == $_POST['cpassword']){
                $vpass= password_hash($_POST['password'], PASSWORD_DEFAULT);
                date_default_timezone_set("Asia/Kolkata");
                $date = date("d-m-Y");
                $res = mysqli_query($ahk_conn,"INSERT INTO `users`( `name`, `phone`, `shop`, `email`, `state`, `password`, `type`, `status`, `order_id`, `date`) VALUES ('$name','$phone','$shop','$email','$state','$vpass','$usertype','0','$order_id','$date')");
                if($res){
                    if($_POST['mode'] =="paytm"){
                         ?>
                    <form name="f2" method="post" action="paytm/registerRedirect.php">
                    <input hidden id="ORDER_ID" name="ORDER_ID" value="<?php echo  $order_id ;?>">
                    <input hidden type="hidden" name="new" value="1">
                    <input hidden id="CUST_ID" name="CUST_ID" value="<?php echo $phone; ?>">
                    <input hidden id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" value="Retail">
                    <input hidden id="CHANNEL_ID" name="CHANNEL_ID" value="WEB">
                    <input hidden type="text" name="TXN_AMOUNT" value="<?php echo $amount; ?>">
                </form>
                <script type="text/javascript">
                document.f2.submit();
                </script>
                <!--  -->
                    <?php 
                    }else if($_POST['mode'] == "payu"){
                         // Payu Code Start Here 
                        $ORDER_ID =  $phone . rand(1000,99999);
                            ?>
                    <form class="mt-2" method="post" name="f2" action="payu/register.php?pay_uid">
                    <input  type="hidden"  name="pay_uid"  value="<?php echo $phone ?>">
                    <input  type="hidden"  name="order_id"  value="<?php echo $ORDER_ID; ?>">
                    <input type="hidden" name="Pay_Amt" value="<?php echo $amount; ?>">
                    </form>
                    <script type="text/javascript">
                    document.f2.submit();
                    </script>
                        <?php 

                    
                        // Payu Code End Here 
                    }else if($_POST['mode'] == "upi"){
                        // UPI Code Start Here
                             ?>
                    <form class="mt-2" method="post" name="f2" action="upi/regRedirect.php">
                    <input  type="hidden"  name="order_id"  value="<?php echo $order_id; ?>">
                    <input type="hidden" class="form-control" name="email" value="<?php echo $email; ?>">
                    <input type="hidden" class="form-control" name="name" value="<?php echo $name; ?>">
                    <input type="hidden" class="form-control" name="phone" value="<?php echo $phone; ?>">
                    <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                    </form>
                    <script type="text/javascript">
                    document.f2.submit();
                    </script>
                        <?php 
                        
                        // UPI Code END Here 
                    }else if($_POST['mode'] == "qr"){
                        // QR Code Start Here 
                        date_default_timezone_set("Asia/Kolkata");
                        $date = date("d-m-Y");
                        $ins = mysqli_query($ahk_conn,"INSERT INTO `wallet`(`phone`,`amount`,`txn_id`,`email`,`status`,`date`,`PAYMENTMODE`) VALUES ('$phone','$amount','$order_id','$email','pending','$date','REGQR')");
                             ?>
                    <form class="mt-2" method="post" name="f2" action="qr/pay.php">
                        <input type="hidden" name="frompage" value="reg">
                    <input  type="hidden" name="order_id"  value="<?php echo $order_id; ?>">
                    <input type="hidden"  name="phone" value="<?php echo $phone; ?>">
                    <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                    </form>
                    <script type="text/javascript">
                    document.f2.submit();
                    </script>
                        <?php 
                        
                        // QR Code END Here 
                    }
                    
                   
                }
            }else{
                ?>
                <script>
                    $(function(){
                        Swal.fire(
                            'Opps!',
                            'Confirm password Not Match',
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
                        'Your Email or Phone Already Registered, Contact With Team 9631048513 !',
                        'error'
                    )
                })
            </script>
            <?php 
        }
        
    }
}
if(isset($_POST['successmsg']) && $_POST['successmsg'] == "true"){
    ?>
      <script>
                        $(function(){
                            Swal.fire(
                                'Success!',
                                'Your Account Created Successfully!',
                                'success'
                            )
                        })
                    </script>
    <?php
}
if(isset($_POST['failedmsg']) && $_POST['failedmsg'] == "true"){
    ?>
    <script>
        $(function(){
            Swal.fire(
                'Payment Added Failed',
                'if Payment Deduct Then Contact us!',
                'error'
            )
        })
    </script>
    <?php
}
// UPI message
// UPI Code Success 
if(isset($_POST['success']) && $_POST['success'] == "true"){
    ?>
    <script>
        $(function(){
            Swal.fire(
                'Great',
                'Your Account Created Successfully!',
                'success'
            )
        })
    </script>
    <?php
}
if(isset($_POST['failed']) && $_POST['failed'] == "true"){
    ?>
    <script>
        $(function(){
            Swal.fire(
                'Payment Added Failed',
                'if Payment Deduct Then Contact us!',
                'error'
            )
        })
    </script>
    <?php
}
?>
