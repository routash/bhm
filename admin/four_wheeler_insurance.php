<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/header.php');

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

            $updatehistory = mysqli_query($ahk_conn,"INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$appliedby','$fee','$nbal','Four Wheeler Insurance','$fee','Debit')");

            if($debit && $updatehistory){
                $submit = mysqli_query($ahk_conn, "INSERT INTO `four_wheeler_insurance` (`appliedby`, `rc_photo`, `adhar_photo`, `mobile_number`, `wheeler_cc`, `status`, `fee`) VALUES ('$appliedby', '$rc_link', '$adhar_link', '$mobile_number', '$wheeler_cc', 'pending', '$fee')");

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

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    
                    
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    
                
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h4> <marquee class="mb-0 text-uppercase">Insurance IN 10 MINT ME.</marquee></h4>
                <hr/>
            

                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-id-card me-1 font-22 text-primary"></i>
                            </div>
                            
                            <h5 class="mb-0 text-primary">Enter Wheller Details For Insurance</h5>
                        </div>
                        <hr>
                        <form action="" method="POST" enctype="multipart/form-data" class="row g-3">
                            <div class="col-md-4">
                                <label for="inputFirstName" class="form-label">RC Photo</label>
                                <input type="file" name="rc_photo" accept="image/jpeg" required class="form-control" >
                            </div>

                            <div id="maindate" class="col-md-4">
                                <label for="inputEmail" class="form-label">Adhar card Photo</label>
                                <input type="file" name="adhar_photo" accept="image/jpeg" required class="form-control" >
                            </div>
                            <div id="maineid" class="col-md-4">
                                <label for="inputLastName" class="form-label">Mobile Number</label>
                                <input name="mobile_number" type="text" placeholder="Enter Your Mobile Number" class="form-control" >
                            </div>
                            <div id="maineid" class="col-md-6">
                        <label for="inputLastName" class="form-label">Wheeler CC</label>
                        <select name="wheeler_cc" id="cc" class="form-select" onchange="updateFee()">
                            <option value="">Select CC</option>
                            <option value="four_wheeler_insurance_one">0 - 999 CC</option>
                            <option value="four_wheeler_insurance_two">1000 - 1499 CC</option>
                            <option value="four_wheeler_insurance_three">1500 - 2500 CC</option>
                        </select>
                        </div>

                        <div class="col-12 ml-2">
                                    <?php  
                                    $prices = [];
                                    $query = mysqli_query($ahk_conn, "
                                        SELECT service_name, price FROM pricing 
                                        WHERE service_name IN ('four_wheeler_insurance_one', 'four_wheeler_insurance_two', 'four_wheeler_insurance_three')
                                    ");
                                    
                                    while($row = mysqli_fetch_assoc($query)) {
                                        $prices[$row['service_name']] = $row['price'];
                                    }
                                    ?>
                                    
                                    <h5 class="text-warning">Application Fee: <span id="fee_text">₹0</span></h5>
                                    <input type="hidden" name="fee" id="fee_input" value="0">
                                </div>

                                <script>
                                    const pricing = {
                                        "four_wheeler_insurance_one": <?= $prices['four_wheeler_insurance_one'] ?? 0 ?>,
                                        "four_wheeler_insurance_two": <?= $prices['four_wheeler_insurance_two'] ?? 0 ?>,
                                        "four_wheeler_insurance_three": <?= $prices['four_wheeler_insurance_three'] ?? 0 ?>
                                    };

                                    function updateFee() {
                                        const selected = document.getElementById("cc").value;
                                        const fee = pricing[selected] || 0;
                                        document.getElementById("fee_text").innerText = "₹" + fee;
                                        document.getElementById("fee_input").value = fee;
                                    }
                                </script>


                            <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary px-5">Apply</button>
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
                <h5 class="mb-0">ALL Learning Licence Test LIST</h5>
            </div>
           
        </div>
        <hr>
        <div class="table-responsive">
            <table id="example2" class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">SL.</th>
                        <th class="text-center">Appliedby</th>
                        <th class="text-center">Rc Photo</th>
                        <th class="text-center">Adhar Photo</th>
                        <th class="text-center">Mobile Number</th>
                        <th class="text-center">CC</th>
                        <th class="text-center">Fee</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
        
                   
                <?php
$res = mysqli_query($ahk_conn,"SELECT * FROM four_wheeler_insurance WHERE appliedby='".$udata['phone']."' ORDER BY id DESC");
if(mysqli_num_rows($res) > 0){
    $x = 0;
    while($data = mysqli_fetch_assoc($res)){
        $x++;
?>
<tr>
    <td class="text-center"><?= $x; ?></td>
    <td class="text-center"><?= strtoupper($data['appliedby']); ?></td>
    <td class="text-center">
        <a href="<?= $data['rc_photo']; ?>" target="_blank">RC Photo</a>
    </td>
    <td class="text-center">
        <a href="<?= $data['adhar_photo']; ?>" target="_blank">Aadhar Photo</a>
    </td>
    <td class="text-center"><?= strtoupper($data['mobile_number']); ?></td>
    <td class="text-center"><?= strtoupper($data['wheeler_cc']); ?></td>
    <td class="text-center">₹<?= $data['fee']; ?></td>
    <td class="text-center"><?= date('d-m-Y h:i A', strtotime($data['apply_date'])); ?></td>
    <td class="text-center">
        <?php
        if($data['status'] == "pending"){
            echo '<div class="badge rounded-pill bg-light-warning text-warning w-100">Pending...</div>';
        } else if($data['status'] == "success"){
            echo '<div class="badge rounded-pill bg-light-success text-success w-100">Success</div>';
        } else if($data['status'] == "refunded"){
            echo '<div class="badge rounded-pill bg-light-info text-info w-100">Refunded</div>';
        }
        ?>
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
<!-- <script src="../template/ahkweb/assets/js/jquery.min.js"></script> -->
<script src="../template/ahkweb/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="../template/ahkweb/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="../template/ahkweb/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--app JS-->
<script src="../template/ahkweb/assets/js/app.js"></script>
</body>
<!-- datatable -->
<script src="../template/ahkweb/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="../template/ahkweb/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
function TypeSelection(){
var type = $("input[name=type]:checked").val();
// console.log(type);
if(type =='uid'){
    document.getElementById('maineid').innerHTML ='<label for="inputLastName" class="form-label">UID No</label><input name="uid" type="text" id="maskuid"    placeholder="Enter 12 Digit UID no" class="form-control" >';
    document.getElementById('maindate').innerHTML='';
    document.getElementById('maintime').innerHTML='';
}else if(type == 'eid'){
    document.getElementById('maineid').innerHTML ='<label for="inputLastName" class="form-label">EID No</label><input name="eid" type="text" id="eid"   placeholder="Enter 14 Digit EID no" class="form-control" >';
    document.getElementById('maindate').innerHTML='<label for="inputEmail" class="form-label">Date</label><input name="date" type="text"  placeholder="DD/MM/YYYY" class="form-control" id="">';
    document.getElementById('maintime').innerHTML='<label for="inputPassword" class="form-label">Time</label><input name="time" type="text"  placeholder="00:00:00" class="form-control" id="timea">';
}else if(type =='mobile'){
    document.getElementById('maineid').innerHTML ='<label for="inputLastName" class="form-label">Enter Registered Mobile Number</label><input name="mobile" type="text" id="mobile"   placeholder="Enter 10 Digit Mobile no" class="form-control" >';
    document.getElementById('maindate').innerHTML='';
    document.getElementById('maintime').innerHTML='';
}
}
$(document).ready(function() {
    $('#example').DataTable();
  } );
</script>

<script>
$(document).ready(function() {
    var table = $('#example2').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print']
    } );
 
    table.buttons().container()
        .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
} );
</script>

<script>
$(document).ready(function() {

$('#eid').inputmask();
$('#date').inputmask();
$('#maskuid').inputmask({"mask": "9999 9999 9999"});
$('#timea').inputmask("hh:mm:ss", {
placeholder: "00:00:00", 
insertMode: false, 
showMaskOnHover: false,
// hourFormat: 24
});
});
</script>
</html>
