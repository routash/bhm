<?php
include('header.php');
include('../../includes/config.php');
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="col-xl-10 mx-auto">
            <h6 class="mb-0 text-uppercase">Aadhar Advance Print</h6>
            <hr />

            <form method="post" id="aadharForm">
                <label>Aadhaar Number:</label><br>
                <input type="text" name="aadhar" required><br><br>

                <label>Biometric Data:</label><br>
                <button type="button" onclick="captureFingerprint()">Capture Fingerprint</button><br><br>

                <textarea name="bioenc" id="bioenc" rows="6" cols="50" readonly required></textarea><br><br>

                <input type="submit" value="Verify Aadhaar">
            </form>

            <?php
            $price = mysqli_fetch_assoc(mysqli_query($ahk_conn, "SELECT * FROM pricing WHERE service_name='aadhaarprint'"));
            $fee = $price['price'];
            $username = $udata['phone'];
            $wallet_amount = $udata['balance'];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $bio = $_POST['bioenc'];
                $aadhar = $_POST['aadhar'];
                $apikey = $tng_apikey;

                if ($wallet_amount > $fee) {
                    $curl = curl_init();
                    curl_setopt_array($curl, [
                        CURLOPT_URL => "https://secure.thenextgenapi.co.in/aadhar_verification",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_POST => true,
                        CURLOPT_POSTFIELDS => [
                            'bioenc' => $bio,
                            'aadhar' => $aadhar,
                            'apikey' => $apikey
                        ],
                    ]);

                    $response = curl_exec($curl);
                    curl_close($curl);
                    $json = json_decode($response, true);
                    $status = $json['Message'] ?? '';
                    $error_api = $json['error'] ?? '';

                    if ($status === 'Success') {
                        $appliedby = $udata['phone'];
                        $nbal = $wallet_amount - $fee;
                        mysqli_query($ahk_conn, "UPDATE users SET balance = balance - $fee WHERE phone = '$appliedby'");
                        mysqli_query($ahk_conn, "
                            INSERT INTO wallethistory (userid, amount, balance, purpose, status, type)
                            VALUES ('$appliedby', '$fee', '$nbal', 'Aadhar Advance', '1', 'Debit')
                        ");

                        $aadharno = $json['aadhar'];
                        $name = $json['name'];
                        $dob = $json['dob'];
                        $gender = $json['gender'];
                        $fulladdress = $json['address'];
                        $imagepathoriginal = $json['image'];
                        $timestamp = date("Y-m-d H:i:s");

                        mysqli_query($ahk_conn, "INSERT INTO aadharauto
                            (aadharno, originalaadharno, aadharname, dob, gender, fulladdress, imagepathoriginal, createdatetime, userid)
                            VALUES ('".trim($aadharno)."','".trim($aadharno)."','$name','$dob','$gender','$fulladdress','$imagepathoriginal','$timestamp','".$_SESSION['phone']."')");

                        echo "<script>
                            Swal.fire('Application Submitted Success', '', 'success');
                            setTimeout(() => { window.location='aadhar_advance_list.php'; }, 1500);
                        </script>";
                    } else {
                        echo "<script>
                            Swal.fire('Failed', 'Verification failed: $error_api', 'error');
                        </script>";
                    }
                } else {
                    echo "<script>
                        Swal.fire('Insufficient Balance', 'Your wallet balance is too low.', 'error');
                        setTimeout(() => { window.location.href = 'wallet.php'; }, 2000);
                    </script>";
                }
            }
            ?>
        </div>
    </div>
</div>

<script>
function captureFingerprint() {
    // const pidoptions = `<PidOptions>
    //     <Opts fCount="1" fType="0" iCount="0" pCount="0" format="0" pidVer="2.0" timeout="20000" otp="" posh="UNKNOWN" env="P" wadh=""/>
    //     <Demo></Demo>
    // </PidOptions>`;
    const pidoptions = `<PidOptions>
    <Opts fCount="1" fType="0" iCount="0" pCount="0" format="0"
          pidVer="2.0" timeout="20000" otp="" posh="UNKNOWN" env="P" wadh="E0jzJ/P8UopUHAieZn8CKqS4WPMi5ZSYXgfnlfkWjrc="/>
    <Demo></Demo>
</PidOptions>`;

    const rdsURL = "http://127.0.0.1:11100/rd/capture";

    $.support.cors = true;

    $.ajax({
        type: "CAPTURE", // For Mantra RD Service, CAPTURE is expected, but some require POST, you can try changing it if needed
        async: true,
        crossDomain: true,
        url: rdsURL,
        data: pidoptions,
        contentType: "text/xml; charset=utf-8",
        processData: false,
        dataType: "text",
        success: function (data) {
            const errCode = $(data).find('Resp').attr('errCode');
            const errInfo = $(data).find('Resp').attr('errInfo');

            if (errCode === "0") {
                $('#bioenc').val(data);
                Swal.fire('Fingerprint Captured', '', 'success');
            } else {
                Swal.fire('Capture Failed', errInfo || 'Unknown error', 'error');
            }
        },
        error: function () {
            Swal.fire('RD Service Error', 'Make sure RD Service is running and device is connected.', 'error');
        }
    });
}
</script>


<?php
   // const pidOptions = `
                // <PidOptions ver="1.0">
                //     <Opts fCount="1" fType="0" format="0" pidVer="2.0" timeout="20000" posh="LEFT_INDEX" env="P" wadh="" />
                // </PidOptions>`;

                // fetch("http://127.0.0.1:11100/rd/capture", {
                //     method: "CAPTURE",
                //     headers: {
                //         "Content-Type": "text/xml"
                //     },
                //     body: pidOptions
                // })
                // .then(response => response.text())
                // .then(text => {
                //     const parser = new DOMParser();
                //     const xml = parser.parseFromString(text, "text/xml");
                //     const resp = xml.getElementsByTagName("Resp")[0];
                //     const errCode = resp?.getAttribute("errCode");
                //     const errInfo = resp?.getAttribute("errInfo");

                //     if (errCode !== "0") {
                //         alert("Fingerprint capture error: " + errInfo);
                //         return;
                //     }

                //     const pidData = xml.getElementsByTagName("PidData")[0];
                //     if (!pidData) {
                //         alert("No PidData found in response.");
                //         return;
                //     }

                //     const pidDataXML = new XMLSerializer().serializeToString(pidData);
                //     const base64PidData = btoa(pidDataXML);
                //     document.getElementById("bioenc").value = base64PidData;
                // })
                // .catch(err => {
                //     alert("RD Service not found or device not connected. Please check.");
                //     console.error(err);
                // });
?>