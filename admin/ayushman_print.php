<?php
include('../includes/session.php');
include('../includes/config.php');

include('../template/ahkweb/header.php');

// fetch fee from database 
$price = mysqli_fetch_assoc(mysqli_query($ahk_conn, "SELECT * FROM pricing WHERE service_name='ayushman_find_fee' "));
$fee = $price['price'];

if ($_POST['aadhar']) {
    $aadhar = $_POST['aadhar'];
    $stateCode = $_POST['stateCode'];
    $appliedby = $udata['phone'];
    $debit_fee = $udata['balance'] - $fee;

    if ($udata['balance'] >= $fee) {

        // $apikey = "Enter Your APIKEY";

        $url = "https://secure.thenextgenapi.co.in/ayushman_verification?aadhar=$aadhar&stateCode=$stateCode&apikey=$tng_apikey";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 30,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $resdata = json_decode($response, true) ?? '';

        $card_no = $resdata['card_no'] ?? '';
        $image = $resdata['image'] ?? '';
        $sampleCode = $resdata['sampleCode'] ?? '';
        $errore = $resdata['error'] ?? '';

        if ($errore) {
            echo "<script>$(function(){ Swal.fire('$errore', 'Something went wrong.', 'error') }); setTimeout(() => { window.location=''; }, 5000);</script>";
        } elseif ($resdata['sampleCode'] === "200") {
            $debit = mysqli_query($ahk_conn, "UPDATE users SET balance=balance-$fee WHERE phone='$appliedby'");
            $updatehistory = mysqli_query($ahk_conn, "INSERT INTO `wallethistory`(`userid`, `amount`, `balance`, `purpose`, `status`, `type`) VALUES ('$appliedby','$fee','$debit_fee','Ayushman Print','1','Debit')");
            
        }
    } else {
        echo "<script>$(function(){ Swal.fire('Wallet Balance is Low!', 'Please Recharge Now!', 'error') }); setTimeout(() => { window.location='wallet.php'; }, 1200);</script>";
    }
}
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="mobile-menu-overlay"></div>
        <div class="main-container">
            <div class="col-lg-12">
                <div class="card" style="margin-left: 10px; padding-left: 30px; padding-top: 12px; box-shadow: 1px 5px 5px 5px;">
                    <div class="stat-widget-two">
                        <div class="stat-content">
                            <div class="stat-text">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="alert alert-danger" role="alert">
                                                        ALL STATE
                                                        <a href="" class="alert-link">AYUSHMAN FIND........</a>
                                                    </div>
                                                    <form action="" method="POST" class="row g-3">
                                                        <div class="card-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="stateCode" class="form-label">Select State:</label>
                                                                    <select name="stateCode" id="stateCode" class="form-control" required>
                                                                        <option value="">Select State</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="aadhar">Enter Aadhar Number</label>
                                                                    <input name="aadhar" type="text" id="aadhar" maxlength="12" minlength="12" placeholder="ENTER AADHAR NUMBER" class="form-control" required>
                                                                </div>
                                                                <hr>
                                                                <div class="row mt-3">
                                                                    <div class="col-md-6">
                                                                        <input class="form-control" value="Fee ₹ <?php echo $price['price']; ?>" readonly>
                                                                    </div>
                                                                    <div class="col-md-6 text-end">
                                                                        <button class="btn btn-success" name="submit" id="submit"><i class="fa fa-check-circle"></i> Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if ($resdata['sampleCode'] === "200") { ?>
                                            <div class="col-lg-8 col-md-6 col-sm-6">
                                                <div class="card" style="background-color: #FCF3CF;" id="printSection">
                                                    <div class="card-body">
                                                        <h5 class="mb-3">Applicant Details</h5>
                                                        <table class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Application Number</th>
                                                                    <td><?php echo htmlspecialchars($aadhar); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Pmjay ID</th>
                                                                    <td><?php echo htmlspecialchars($card_no); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Card Image</th>
                                                                    <td>
                                                                        <?php if (!empty($image)) { ?>
                                                                            <img id="cardImage" src="<?php echo $image; ?>" alt="Ayushman Card" style="max-width: 100%; height: auto; border: 1px solid #ccc;" />
                                                                            <br><br>
                                                                            <button class="btn btn-primary btn-sm" onclick="printImage()">Print Image</button>
                                                                        <?php } else {
                                                                            echo "<span>No image available</span>";
                                                                        } ?>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br><br>
            </div>
        </div>
    </div>
</div>

	<?php 
		include('../template/ahkweb/footer.php');
		?>

<!-- Populate State Options -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const states = [
        { code: "35", name: "ANDAMAN AND NICOBAR ISLANDS" },
        { code: "28", name: "ANDHRA PRADESH" },
        { code: "12", name: "ARUNACHAL PRADESH" },
        { code: "18", name: "ASSAM" },
        { code: "10", name: "BIHAR" },
        { code: "4", name: "CHANDIGARH" },
        { code: "22", name: "CHHATTISGARH" },
        { code: "26", name: "DADRA AND NAGAR HAVELI AND DAMAN AND DIU" },
        { code: "7", name: "DELHI" },
        { code: "30", name: "GOA" },
        { code: "24", name: "GUJARAT" },
        { code: "6", name: "HARYANA" },
        { code: "2", name: "HIMACHAL PRADESH" },
        { code: "1", name: "JAMMU AND KASHMIR" },
        { code: "20", name: "JHARKHAND" },
        { code: "29", name: "KARNATAKA" },
        { code: "32", name: "KERALA" },
        { code: "37", name: "LADAKH" },
        { code: "31", name: "LAKSHADWEEP" },
        { code: "23", name: "MADHYA PRADESH" },
        { code: "27", name: "MAHARASHTRA" },
        { code: "14", name: "MANIPUR" },
        { code: "17", name: "MEGHALAYA" },
        { code: "15", name: "MIZORAM" },
        { code: "13", name: "NAGALAND" },
        { code: "21", name: "ODISHA" },
        { code: "34", name: "PUDUCHERRY" },
        { code: "3", name: "PUNJAB" },
        { code: "8", name: "RAJASTHAN" },
        { code: "11", name: "SIKKIM" },
        { code: "33", name: "TAMIL NADU" },
        { code: "36", name: "TELANGANA" },
        { code: "16", name: "TRIPURA" },
        { code: "9", name: "UTTAR PRADESH" },
        { code: "5", name: "UTTARAKHAND" },
        { code: "19", name: "WEST BENGAL" }
    ];
    const stateSelect = document.getElementById("stateCode");
    states.forEach(function(state) {
        const option = document.createElement("option");
        option.value = state.code;
        option.textContent = state.name;
        stateSelect.appendChild(option);
    });
});
</script>

<!-- Print Image Script -->
<script>
function printImage() {
    const image = document.getElementById("cardImage").src;
    const win = window.open('', '_blank');
    win.document.write('<html><head><title>Print Card</title></head><body style="text-align:center;">');
    win.document.write('<img src="' + image + '" style="max-width:100%;"/>');
    win.document.write('</body></html>');
    win.document.close();
    win.focus();
    win.print();
}
</script>

<!-- Bootstrap + JS Assets -->
<script src="../template/ahkweb/assets/js/bootstrap.bundle.min.js"></script>
<script src="../template/ahkweb/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="../template/ahkweb/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="../template/ahkweb/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="../template/ahkweb/assets/js/app.js"></script>
</html>
