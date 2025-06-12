<?php
include('header.php');
?>
<?php

   if($_POST['aadhaar_no']){
                       
    $aadhaar = mysqli_real_escape_string($ahk_conn,$_POST['aadhaar_no']);
    $message= $result['message'];
    $application_no = "BAPL".rand(000000,999999);
  
    $username = $udata['phone'];
    $appliedby= $udata['phone'];
    $price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM pricing WHERE service_name='pan_no' "));
  
    $debit_fee =  $wallet_amount - $fee;
    if($udata['balance']>=$price['price']){
            // $url = "https://$skylineapiurl/serviceApi/V1/panFind.php?apiKey=$skyline_key&uidNumber=$aadhaar";
            $url = "https://secure.thenextgenapi.co.in/pan_find_verification.php?aadhar=$aadhaar&apikey=TNG-API-a99247-c48e00-610491-ebb2ec-449dea";

            $aadhar = $_POST['aadhar'];
            $apikey = "YOUR_API_KEY";

            $curl = curl_init();
            curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            ]);

            $response = curl_exec($curl);
            curl_close($curl);

            $resdata = json_decode($response,true); 
            $pan=$resdata['pan'];
            $clint=$resdata['application_no'];
            $message_code=$resdata['status'];
            $message=$resdata['message'];
        
        if($resdata['sampleCode']==="200"){
            $fee = $price['price'];
        $debit = mysqli_query($ahk_conn,"UPDATE users SET balance=balance-$fee WHERE phone='$appliedby'");
        $updatehistory = mysqli_query($ahk_conn,"INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$appliedby','$fee','$nbal','PAN Number Find','1','Debit')");
        if($debit){

            $insert = mysqli_query($ahk_conn, "INSERT INTO instantpan_find (application_no,username,aadhaar_no,pan_no,clint_id, status,status_code,fee,old_balance,new_balance,message) VALUES ('$application_no','$username','$aadhaar', '$pan', '$clint', '$message_code', '$response','" . $udata['pan_no_fee']. "','$wallet_amount','$debit_fee', '$message');");
            if($insert){
                ?>
                <script>
                    $(function () {
                        Swal.fire(
                            'Pan No for <?php echo $aadhaar;?> is <?php echo $pan;?>',
                            '<?php echo $application_no; ?> Message : <?php echo $message; ?>',
                            'success'
                        )
                    })
                    setTimeout(() => {
                        window.location = '';
                    }, 5000);
                </script>
                <?php
            }else{
                ?>
<script>
    $(function () {
        Swal.fire(
            'Balance Debited but data not insert',
            'DATA INSERT ERROR',
            'warning'
        )
    })
    setTimeout(() => {
        window.location = '';
    }, 1200);
</script>
<?php
            }
        }else{
            ?>
<script>
    $(function () {
        Swal.fire(
            'Balance Debit error',
            'something went wrong',
            'error'
        )
    })
    setTimeout(() => {
        window.location = '';
    }, 1200);
</script>

<?php
        }
            
        }else{
            ?>
<script>
    $(function () {
        Swal.fire(
            'Pan No for <?php echo $aadhaar;?> is <?php echo $pan;?>',
            '<?php echo $resdata['message'];?>',
            'success'
        )
    })

</script>

<?php
        }
        
    }else{
        ?>
<script>
    $(function () {
        Swal.fire(
            'Wallet Balance is Low!',
            'Please Recharge Now!',
            'error'
        )
    })
    setTimeout(() => {
        window.location = 'wallet.php';
    }, 1200);
</script>
<?php  
    }
                       
                       
                   
            }
            ?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

            <div class="ps-3">
                <nav aria-label="breadcrumb">

                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">INSTNAT PAN NO FIND SERVICE</h6>
                    <hr />
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-id-card me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Enter AADHAAR Details (FIND NSDL, UTI, E-FILLING PAN
                                    NUMBER)</h5>
                            </div>
                            <hr>
                            <form action="" method="POST" class="row g-3">

                                <div class="col-md-3">
                                    <label for="inputLastName" class="form-label">Aadhaar Number<span class="text-danger"> *</span></label>
                                    <input name="aadhaar_no" type="text" id="aadhaar_no"
                                        placeholder="Enter 12 Digit AADHAAR  no" class="form-control">
                                    <input type="hidden" name="check" value="aadhaar">
                                </div>

                                <div class="col-12 ml-2">
                                    <h5 class="text-warning ">Application Fee:
                                        <?php  
										$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT price FROM pricing WHERE service_name='pan_no'")); 
										echo "₹" .$price['price'];
										?>
                                    </h5>

                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-5">Verify Now</button>
                                </div>
                            </form>
                      </div>
                </div>

            </div>
        </div>
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">All PAN Search List </h5>
                    </div>

                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example2" class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">SL.</th>
                                <th class="text-center">Application No</th>
                                <th class="text-center">Apply Date</th>
                                <th class="text-center">Aadhaar Number</th>
                                <th class="text-center">Pan Number</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
$res = mysqli_query($ahk_conn,"SELECT * FROM instantpan_find WHERE username='".$udata['phone']."'  ORDER BY id DESC");
if(mysqli_num_rows($res)>0){
    $x=0;
    while($data = mysqli_fetch_assoc($res)){
        $x ++;
        ?>
                            <tr>
                                <td class="text-center">
                                    <?= $x;?>
                                </td>
                               <td class="text-center">
                                   
                                        <?php echo strtoupper($data['application_no']); ?>
                                </td>

                                <td class="text-center">
                                    <?php echo strtoupper($data['date']); ?>
                                </td>
                                <td class="text-center"><?php echo strtoupper($data['aadhaar_no']); ?></td>
     
                                <td class="text-center">
                                    <strong>
                                        <?php echo strtoupper($data['pan_no']); ?>
                                    </strong>

                                </td>
                                <td class="text-center">
                                    <div class="badge rounded-pill bg-light-success text-success w-100">Success
                                    </div>
                                </td>
                            </tr>
                            <?php
       
    }
}
?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<!--end page wrapper -->
<?php 
include('footer.php');
?>
<!-- Bootstrap JS -->
<script src="../template/ahkweb/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="../template/ahkweb/assets/js/jquery.min.js"></script>
<script src="../template/ahkweb/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="../template/ahkweb/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="../template/ahkweb/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="../template/ahkweb/assets/plugins/chartjs/chart.min.js"></script>
<script src="../template/ahkweb/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="../template/ahkweb/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../template/ahkweb/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="../template/ahkweb/assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
<script src="../template/ahkweb/assets/plugins/jquery-knob/excanvas.js"></script>
<script src="../template/ahkweb/assets/plugins/jquery-knob/jquery.knob.js"></script>
<script>
    $(function () {
        $(".knob").knob();
    });
</script>
<script src="../template/ahkweb/assets/js/index.js"></script>
<!--app JS-->
<script src="../template/ahkweb/assets/js/app.js"></script>
<!-- datatable -->
<script src="../template/ahkweb/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="../template/ahkweb/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

<script>
    $(document).ready(function () {
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>

</body>



</html>