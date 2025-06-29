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
                        <h5 class="mb-0">All 4 WHEELER PUC CERTIFICATE LIST</h5>
                    </div>
                   
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example2" class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">SL.</th>
                                <th class="text-center">Appliedby</th>
                                <th class="text-center">ApplyDate</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Vehicle No</th>
                                <th class="text-center">Attachments</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
<?php
$res = mysqli_query($ahk_conn,"SELECT * FROM 4wheelerpuc  ORDER BY id DESC");
if(mysqli_num_rows($res)>0){
    $x=0;
    while($data = mysqli_fetch_assoc($res)){
        $x ++;
        ?>
        <tr>
            <td class="text-center"><?= $x;?></td>
            <td class="text-center"><?= $data['appliedby'];?></td>
            <td class="text-center"><?php echo strtoupper($data['apply_date']); ?></td>
            <td class="text-center"><?php echo strtoupper($data['phone']); ?></td>
            <td class="text-center"><?php echo strtoupper($data['vehicle']); ?></td>
            <td class="text-center">
                <a  download="<?php echo $data['name'] ."_" .$data['vehicle'] ?>_front_side" href="<?php echo "uploads/". $data['front_side']; ?>" class="btn  px-6 btn-success ">Front Side<i class="bx bx-cloud-download"></i></a>
                <a  download="<?php echo $data['name'] ."_" .$data['vehicle'] ?>_back_side" href="<?php echo "uploads/". $data['back_side']; ?>" class="btn btn-danger ">Back Side <i class="bx bx-cloud-download"></i></a>
            </td>
            
            <td  class="text-center">
                <?php
                    if($data['status']=="pending"){
                        ?>
                      <div style="width:250px;">
                        <form method="POST" action="" enctype="multipart/form-data">
                             <select class="form-control mb-2" name="status" id="">
                                    <option value="" required>Select Status</option>
                                    <option value="success"  required>Success</option>
                                    <option value="refunded"  required>Refund</option>
                            </select>
                            
                            <input class="form-control mb-2" type="text"  name="remark" required  placeholder="Enter Remark">
                            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                            <input class="form-control mb-2" type="file" name="aadhaar_pdf" required>
                            <button class="btn  px-6 btn-success">Update</button>
                        </form>
                       </div>
                       <?php
                    }else if($data['status']=="success"){
                            ?>
                            <div class="text-center text-success">
                            <?php echo strtoupper($data['remark']); ?>    
                            <br>
                                Already Updated
                               <a target="_blank" href="<?php echo $data['pdf_link'] ?>" class="btn btn-sm btn-info">See</a>
                            </div>
                                    <?php
                    }else if($data['status']=="refunded"){
                        ?>
                        <div class="text-center text-info">
                        <?php echo $data['remark']; ?>
                            <br>
                                Already Refunded
                               
                            </div>
                            <?php
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
