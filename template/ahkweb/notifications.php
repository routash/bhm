<?php
include('header.php');
?>

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Notifications Settings</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Notifications</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
<?php 
if(isset($_GET['edit']) && $_GET['id']){
    $id = base64_decode(mysqli_real_escape_string($ahk_conn,$_GET['id']));
    $get = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT * FROM notification WHERE id='$id' LIMIT 1"));
}
?>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-10 mx-auto">
						<h6 class="mb-0 text-uppercase">Notifications Settings</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body p-5">
								<div class="card-title d-flex align-items-center">
									<div><i class="bx bxs-cog me-1 font-22 text-primary"></i>
									</div>
									<h5 class="mb-0 text-primary">Add Notifications</h5>
								</div>
								<hr>
								<form action="" method="POST" class="row g-3">
									<div class="col-md-12">
										<label for="inputFirstName" class="form-label">Notification</label>
										<textarea name="message" id="" cols="5" rows="5" class="form-control" placeholder="Notifications"   rows="10"><?php if(isset($get['message'])){echo $get['message'];} ?></textarea>
                                        <input type="hidden" name="new" value="<?php if(isset($_GET['edit'])){echo "0";}else{echo "1";} ?>">
                                        <?php
                                        if(isset($get['message'])){
                                            ?>
                                            <input type="hidden" name="id" value="<?php echo $get['id'] ?>">
                                            <input type="hidden" name="edit" value="1">
                                            <select required class="form-control mt-4" name="status" id="">
                                                <option value="">Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                            </select>
                                            <?php
                                        } 
                                        ?>
									</div>
									<div class="col-12">
										<button type="submit" class="btn btn-primary px-5">Save</button>
									</div>
								</form>
							</div>
						</div>
					
					</div>
				</div>
				
			</div>
            <div class="page-content">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">All Users List</h5>
                    </div>
                   
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example2" class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">SL.</th>
                                <th class="text-center">Message</th>
                                <th class="text-center">Status</th>

                               
                                
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
<?php
$res = mysqli_query($ahk_conn,"SELECT * FROM notification ORDER BY id DESC");
if(mysqli_num_rows($res)>0){
    $x=0;
    while($data = mysqli_fetch_assoc($res)){
       
        $x ++;
        ?>
        <tr>
            <td class="text-center"><?= $x;?></td>
            <td class="text-center"><?= $data['message'];?></td>
            <td class="text-center"><?= $data['status'];?></td>
            
            <td  class="text-center">
                <div class="mr-12 font-24 ">
                    <a class="text-success bg-light-success" href="?edit&id=<?php echo base64_encode($data['id']); ?>"><i class='bx bx-pencil'></i></a>
                    <a class="text-danger bg-light-danger" href="?delete&id=<?php echo base64_encode($data['id']); ?>"><i class='bx bx-trash'></i></a>
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
		$(document).ready(function() {
			$('#example').DataTable();
            $('#aadh').inputmask();
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
	// $(document).ready(function() {
	
	// $('#eid').inputmask();
	// $('#date').inputmask();
	// $('#timea').inputmask("hh:mm:ss", {
    //     placeholder: "00:00:00", 
    //     insertMode: false, 
    //     showMaskOnHover: false,
    //     hourFormat: 12
    //   });
	// });
</script>
</html>