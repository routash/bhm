<?php
include('../template/ahkweb/header.php');
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
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                            href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                            link</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <!--end row-->
        <form action="" method="POST">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h6 class="mb-0 text-uppercase">Add Wallet Balance</h6>
                    <hr />
                    <div class="card border-top border-0 border-4 border-info">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-wallet me-1 font-22 text-info"></i>
                                    </div>
                                    <h5 class="mb-0 text-info">Add Balance VIA card UPI</h5>
                                </div>
                                <hr />

                                <div class="row mb-3">
                                    <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email
                                        Address  <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input name="email" readonly  type="email" class="form-control"
                                            id="inputEmailAddress2" value="<?php echo $udata['email']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Enter
                                        Amount <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                        <input required name="amount" type="number" min="100" class="form-control" id="inputChoosePassword2"
                                            placeholder="Amount">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Select Payment Mode <span style="color:red;">*</span></label>
                                    <div class="col-sm-3">
                                       <select required class="form-control"  name="mode" id="">
                                        <option value="">Select Payment Mode</option>
                                        <?php 
                                        if($webdata['paytm'] ==1){
                                            ?>
                                            <option value="paytm">Paytm</option>
                                            <?php 
                                        }
                                        if($webdata['payu'] ==1){
                                            ?>
                                            <option value="payu">PayU</option>
                                            <?php 
                                        }
                                        if($webdata['upi'] ==1){
                                            ?>
                                            <option value="upi">UPI</option>
                                            <?php 
                                        }
                                        if($webdata['qr'] ==1){
                                            ?>
                                            <option value="qr">QR</option>
                                            <?php 
                                        }
                                        ?>
                                        
                                        
                                       </select>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-info px-5">Add Balance</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end row-->
        <h6 class="mb-0 text-uppercase">Payment List</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">

<?php
$res = mysqli_query($ahk_conn,"SELECT * FROM wallet WHERE phone='".$_SESSION['phone']."' ORDER BY id DESC");

?>
								<thead>
									<tr>
                                        <th>Sl.</th>
										<th>TXN ID</th>
										<th>Amount</th>
										<th>TXN date</th>
										<th>Email</th>
										<th>Method</th>
										<th>Status</th>
										
									</tr>
								</thead>

								<tbody>
                                    <?php
                                    if(mysqli_num_rows($res)>0){
                                        while($data = mysqli_fetch_assoc($res)){
                                            $x = 1;
                                            ?>
                                            <tr>
										<td><?php echo $x; ?></td>
										<td><?php echo strtoupper($data['txn_id']); ?></td>
										<td><?php echo strtoupper($data['amount']); ?></td>
										<td><?php echo strtoupper($data['txn_date']); ?></td>
										<td><?php echo strtoupper($data['email']); ?></td>
										<td><?php echo strtoupper($data['PAYMENTMODE']); ?></td>

										<td <?php 
                                        if($data['status']=="pending"){
                                            echo "style='background-color:red;color:white;'";
                                        }else if($data['status']=="success"){
                                            echo "style='background-color:green;color:white;'";
                                        }
                                        ?> class="badge badge-bg-primary"><?php echo strtoupper($data['status']); ?></td>
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