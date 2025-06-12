<?php 
	include('header.php');
   ?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">All TRANSACTION LIST</h5>
                    </div>
                   
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example2" class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                        <th>Sl.</th>
										<th>TXN ID</th>
										<th>Amount</th>
										<th>TXN date</th>
										<th>Phone</th>
										<th>Status</th>
										<th>Action</th>
										
									</tr>
                        </thead>
                        <tbody>
                           
<?php
$res = mysqli_query($ahk_conn,"SELECT * FROM wallet ORDER BY id DESC");
if(mysqli_num_rows($res)>0){
    $x=0;
    while($data = mysqli_fetch_assoc($res)){
        $x ++;
        ?>
       <tr>
										<td><?php echo $x; ?></td>
										<td><?php echo strtoupper($data['txn_id']); ?></td>
										<td><?php echo strtoupper($data['amount']); ?></td>
										<td><?php echo strtoupper($data['txn_date']); ?></td>
										<td><?php echo strtoupper($data['phone']); ?></td>
										<td <?php 
                                        if($data['status']=="pending"){
                                            echo "style='background-color:red;color:white;'";
                                        }else if($data['status']=="success"){
                                            echo "style='background-color:green;color:white;'";
                                        }
                                        ?> class="badge badge-bg-primary"><?php echo strtoupper($data['status']); ?></td>
                                        <td> <a class="text-success bg-light-success" href="edit_tranction_status.php?id=<?php echo  base64_encode($data['id']); ?>"><i class='bx bx-pencil'></i></a></td>
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
$(function() {
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
	
</body>



</html>
