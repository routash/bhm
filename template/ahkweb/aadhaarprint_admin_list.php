<?php 
	include('header.php');
	include('../../includes/config.php');
   ?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">All AADHAAR ADVANCE LIST</h5>
                    </div>
                   
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example2" class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">SL.</th>
                                <th class="text-center">Appliedby</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">AADHAAR NUMBER</th>
                                <th class="text-center">DATE</th>
                                <th class="text-center">PRINT</th>
                                <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                           
        <?php
$res = mysqli_query($ahk_conn,"SELECT * FROM aadharauto  ORDER BY aadharautoid DESC");
if(mysqli_num_rows($res)>0){
    $x=0;
    while($data = mysqli_fetch_assoc($res)){
        $x ++;
        ?>
        <tr>
            <td class="text-center"><?= $x;?></td>
            <td class="text-center"><?php echo strtoupper($data['userid']); ?></td>
            <td class="text-center">
                <div class="d-flex align-items-center">
                    
                    <div class="ms-2">
                        <h6 class="mb-1 font-14"><?php echo strtoupper($data['aadharname']); ?></h6>
                    </div>
                </div>
            </td>
            <td class="text-center"><?php echo strtoupper($data['aadharno']); ?></td>
            <td class="text-center"><?php echo strtoupper($data['createdatetime']); ?></td>
            <td class="text-center">
            <a  style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;"  class="btn btn-success" href="aadharpvc/aadhar.php?searchid=<?php echo $data['aadharautoid']?>" target="_blank"> Print </a> 
			</td>
            <td class="text-center">
             <form action="action_advance.php" method="post" enctype="multipart/form-data" >
				<input name="id" type="hidden" value="<?=$data['aadharautoid']?>" />
				<input style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;" class="btn btn-danger" type="submit" value="Remove" />
				</form> 

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