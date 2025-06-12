<?php
include('userHeader.php');

$fee = 20;

if (!empty($_POST['aadhar']) && !empty($_POST['stateCode'])) {
    $aadhar = $_POST['aadhar'];
    $stateCode = $_POST['stateCode'];
    $appliedby = $rw['mobileno']; 
    $walletBalance = $rw['wallet'];
    $debit_fee = $walletBalance - $fee;

    if ($walletBalance >= $fee) {
        $apikey = "Enter Your APIKEY"; // Replace with actual API key

        $url = "https://secure.thenextgenapi.co.in/ayushman_verification?aadhar=$aadhar&stateCode=$stateCode&apikey=$apikey";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $curlError = curl_error($curl);
        curl_close($curl);

        if ($curlError) {
            echo '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(function() {
    Swal.fire({
        title: "cURL Error",
        text: "' . addslashes($curlError) . '",
        icon: "error"
    });
    setTimeout(() => { window.location = ""; }, 5000);
});
</script>';
            exit;
        }

        $resdata = json_decode($response, true) ?? [];

        $sampleCode = $resdata['sampleCode'] ?? '';
        $errore = $resdata['error'] ?? '';
        $card_no = $resdata['card_no'] ?? '';
        $image = $resdata['image'] ?? '';

        if ($errore) {
            echo '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(function() {
    Swal.fire({
        title: "Error",
        text: "' . addslashes($errore) . '",
        icon: "error"
    });
    setTimeout(() => { window.location = ""; }, 5000);
});
</script>';
        } elseif ($sampleCode === "200") {
            $debit = mysqli_query($connection, "UPDATE tbluser SET wallet = wallet - $fee WHERE mobileno = '$appliedby'");
            
        } else {
            echo '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(function() {
    Swal.fire({
        title: "Unexpected Response",
        text: "Something went wrong with the API response.",
        icon: "error"
    });
    setTimeout(() => { window.location = ""; }, 5000);
});
</script>';
        }
    } else {
        echo '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(function() {
    Swal.fire("Wallet Balance is Low!", "Please Recharge Now!", "error");
    setTimeout(() => { window.location = "wallet.php"; }, 1200);
});
</script>';
    }
}
?>


<div class="content-wrap">
 <div class="main">
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
                                                                        <input class="form-control" value="Fee ₹ <?php echo $fee; ?>" readonly>
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

<?php include('userFooter.php'); ?>

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

</html>
