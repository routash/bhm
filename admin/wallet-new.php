<?php
include('../includes/session.php');
include('../includes/config.php');
include('../template/ahkweb/header.php');
// echo $webdata['upi_key'];
$apikey = $webdata['upi_key'];
// paytmqr2810050501011nrnuhlb0ku5@paytm
// c38c9a34-0506-4abd-ad82-4b7069277382
// TNG-API-a99247-c48e00-610491-ebb2ec-449dea

$qrData = null;
$txnData = null;
$showAmountInput = true;

// Login simulation (replace with actual login logic)
$mobileno = $udata['phone']; // Logged-in user's mobile


// Step 1: Handle QR + UTR
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_POST['amount'];
    $utr = $_POST['utr'] ?? null;

    // Reject if amount < 5
    if ($amount < 5) {
        // Output SweetAlert for low amount
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Minimum ₹5 required!',
                    text: 'Please enter an amount of ₹5 or more.',
                    confirmButtonColor: '#d33'
                });
              </script>";
    } else {
        // QR Code
        $qrapiUrl = "https://secure.thenextgenapi.co.in/qr_verification?apikey=$apikey&amount=$amount";

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => $qrapiUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
]);

$response = curl_exec($curl);
curl_close($curl);

$qrData = json_decode($response, true);


        // Check if QR response was successful
        if ($qrData && $qrData['sampleCode'] == '200') {
            $showAmountInput = false;
        } else {
            $qrError = $qrData['error'] ?? 'Unknown error during QR generation.';
            // Output SweetAlert for QR generation error
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'QR Generation Failed',
                        text: '$qrError',
                        confirmButtonColor: '#d33'
                    });
                  </script>";
        }

        // UTR verification
        if (!empty($utr)) {
$apiUrl = "https://secure.thenextgenapi.co.in/bharatpaygateway_verification?apikey=$apikey&utr=$utr";

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => $apiUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
]);

$response = curl_exec($curl);
curl_close($curl);

$txnData = json_decode($response, true);



curl_close($curl);


            // Check if UTR response was successful
            if ($txnData && $txnData['sampleCode'] == '200') {
                // Prevent duplicate UTR
                $check = mysqli_query($ahk_conn, "SELECT * FROM tblutr WHERE utr='$utr'");
                if (mysqli_num_rows($check) > 0) {
                    $txnData['sampleCode'] = '409'; // Custom code for duplicate
                    $txnData['error'] = "This UTR has already been used.";
                } else {
                    // Insert txn
                    $payerName = $txnData['payerName'];
                    $payerHandle = $txnData['payerHandle'];
                    $status = $txnData['status'];
                    $txnAmount = $txnData['amount'];
                    $datetime = date("Y-m-d H:i:s");

                    // Insert UTR details to the database
                    mysqli_query($ahk_conn, "INSERT INTO wallet (phone, BANKTXNID, amount, RESPMSG, PAYMENTMODE, status, txn_date)
                        VALUES ('$mobileno', '$utr', '$txnAmount', '$payerName', '$payerHandle', '$status', '$datetime')");

                    // Add to wallet
                    mysqli_query($ahk_conn, "UPDATE users SET balance = balance + $txnAmount WHERE phone='$mobileno'");

                    // Output SweetAlert for successful recharge
                    echo "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Recharge Successful',
                                html: 'Amount: ₹$txnAmount<br>UTR: $utr<br>Payer: $payerName',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            });
                          </script>";
                }
            } else {
                $utrError = $txnData['error'] ?? 'Unknown error during UTR verification.';
                // Output SweetAlert for UTR verification error
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'UTR Verification Failed',
                            text: '$utrError',
                            confirmButtonColor: '#d33'
                        });
                      </script>";
            }
        }
    }
}
?>


<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Wallet</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Wallet Management</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> 
                        <a class="dropdown-item" href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div> 
                        <a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div>
            </div>
        </div>

          <form method="post" action="" style="width:100%">
                <div class="row dgnform">
                    <div style="text-align: center;">
         
                 
                    
                    
                  
                    
                            
                          

                            <?php if ($showAmountInput): ?>
                            
                      <div class="card shadow-lg mx-auto mt-4" style="max-width: 600px; border-radius: 16px; padding: 30px;">
    <div class="text-center">
        <h5 class="mb-3" style="font-size: 22px; font-weight: bold; color: #3c8dbc;">
            Wallet Top-Up via QR
        </h5>

        <label for="amount" class="form-label" style="font-size: 16px; font-weight: 600;">
            Enter Amount Minimum 5
        </label>

        <div class="d-inline-flex align-items-center justify-content-center gap-3 flex-wrap mt-2 mb-3">
            <!-- Amount Input -->
            <input type="number" class="form-control" name="amount" id="amount" required 
                   placeholder="Amount" 
                   style="border-radius: 12px; padding: 12px 20px; width: 260px; max-width: 100%;">

            <!-- Generate QR Button -->
            <button type="submit" class="btn btn-primary" 
                    style="border-radius: 12px; font-size: 16px; padding: 12px 24px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                Generate QR
            </button>
        </div>

        <!-- Info Note -->
        <small class="form-text text-muted d-block mt-2" style="font-size: 14px;">
            Note: क्यू आर पर पेमेन्ट करके साइड में दिए गए बॉक्स में यूटीआर (UTR) या रेफरेंस (REFERENCE) नंबर डालकर सबमिट पर क्लिक करें। <br>
            आपका पेमेन्ट ऑटोमेटिक आपके वालेट में एड हो जाएगा।
        </small>
    </div>
</div>




                            <?php endif; ?>

                            <?php if ($qrData && $qrData['sampleCode'] == '200'): ?>
                                <input type="hidden" name="amount" value="<?= $qrData['amount'] ?>">
                                
                               <div class="card shadow mt-4" style="border-radius: 15px; padding: 20px; background: #f7f9fc;">
    <div class="text-center">
        <!-- Company Name -->
        <h5 style="font-family: 'Poppins', sans-serif; font-size: 22px; font-weight: 600; color: #3c8dbc;">
            <?= $qrData['companyName'] ?>
        </h5>

        <!-- QR Code Box -->
        <div class="mb-3 mt-3" style="display: inline-block; padding: 15px; background: #fff; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
            <img src="<?= $qrData['qr'] ?>" alt="QR Code" style="max-width: 180px; border-radius: 10px;">
        </div>

        <!-- Amount & UPI -->
        <p style="margin: 10px 0 5px; font-weight: 600; font-size: 16px;">Amount: ₹<?= $qrData['amount'] ?></p>
       

        <!-- UTR Input + Button side by side -->
        <div class="row mt-4 justify-content-center align-items-center">
            <div class="col-md-6 col-12 mb-2">
                <input type="text" class="form-control" name="utr" id="utr" placeholder="Enter UTR / Ref No" required
                    style="border-radius: 10px; padding: 10px; font-size: 15px;">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success" style="border-radius: 10px; font-size: 15px; padding: 10px 18px;">
                    ✅ Verify & Add
                </button>
            </div>
        </div>

        <!-- Note Section -->
        <div class="mt-3 text-start" style="font-size: 14px; color: #444; background: #fff7e6; padding: 12px; border-radius: 10px; box-shadow: inset 0 0 8px rgba(0,0,0,0.05);">
            <strong>Note:</strong> GPay, PhonePe, Paytm से पेमेंट करने के बाद <b>UPI Transaction ID / UTR / Ref No</b> यहाँ डालना अनिवार्य है।<br>
            ➤ <b>GPay:</b> UPI Transaction ID (जैसे UPI1234567890)<br>
            ➤ <b>PhonePe:</b> UTR No (जैसे 321456789876)<br>
            ➤ <b>Paytm:</b>Upi Ref No (जैसे 202504131234)<br>
            सही ID डालते ही आपका पेमेंट ऑटोमेटिक वॉलेट में जुड़ जाएगा ✅
        </div>
   

                            <?php endif; ?>
                        </div>
              
        <h6 class="mb-0 text-uppercase">Payment List</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>UTR</th>
                        <th>Amount</th>
                        <th>Payer</th>
                        <th>Method</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $hist = mysqli_query($ahk_conn, "SELECT * FROM wallet WHERE phone='$mobileno' ORDER BY id DESC");
                $i = 1;
                while ($row = mysqli_fetch_assoc($hist)) {
                    echo "<tr>
                        <td>{$i}</td>
                        <td>{$row['BANKTXNID']}</td>
                        <td>₹{$row['amount']}</td>
                        <td>{$row['RESPMSG']}</td>
                        <td>{$row['PAYMENTMODE']}</td>
                        <td>{$row['status']}</td>
                        <td>{$row['txn_date']}</td>
                    </tr>";
                    $i++;
                }
                ?>
                </tbody>
            </table>
		</tbody>
								
							</table>
						</div>
					</div>
				</div>
			
    </div>
</div>
<!--end page wrapper -->
<?php
        include('../template/ahkweb/footer.php');
        ?>
<!-- Bootstrap JS -->
<script src="../template/ahkweb/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="../template/ahkweb/assets/js/jquery.min.js"></script>
<script src="../template/ahkweb/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="../template/ahkweb/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="../template/ahkweb/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--app JS-->
<script src="../template/ahkweb/assets/js/app.js"></script>
<!-- datatable -->
<script src="../template/ahkweb/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="../template/ahkweb/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
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
	<!--app JS-->
	<script src="../template/ahkweb/assets/js/app.js"></script>
</body>



</html>