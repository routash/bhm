<?php 
	include('header.php');
   ?>
   <!--start page wrapper -->
   <style>
    .pointer{
        cursor: pointer;
    }
   </style>
   <div class="page-wrapper">
       <div class="page-content">

           
               
        
           <!--end row-->
           
           <div class="row row-cols-1 row-cols-md-2 row-cols-xl-10">
           <div class="col pointer">
						<div class="card radius-10 bg-gradient-cosmic">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Referral Link </p>
										<a id="ref" class="my-1 text-white"><?php echo "https://".$host.str_replace("admin","",$dir)."register.php?ref=".base64_encode($udata['phone']); ?></a>
                                        <a onclick="handleCopyTextFromParagraph()" class="text-white font-20" style="margin-left:20px;"><i class='bx bx-copy'></i></a>
                                        <div id="copied" class="text-white font-20"></div>
                                    </div>
                                   
									<div class="text-white ms-auto font-35"><i class='bx bx-rupee'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <script>
                function handleCopyTextFromParagraph() {
                const body = document.querySelector('body');
                const copied = document.querySelector('#copied');
                const paragraph = document.querySelector('#ref');
                const area = document.createElement('textarea');
                body.appendChild(area);
                area.value = paragraph.innerText;
                area.select();
                
                if(document.execCommand('copy')){
                    copied.innerHTML = "Copied";
                    setTimeout(() => {
                        copied.innerHTML ="";
                    }, 1200);
                }
                body.removeChild(area);
                }
                </script>
                <?php
                $all = mysqli_query($ahk_conn,"SELECT * FROM referal WHERE referred_by='".$_SESSION['phone']."' ORDER BY id DESC");
                $count = 0;
                function CountEarning($all){
                    $count = 0;
                     if(mysqli_num_rows($all)>0){
                        while($earning = mysqli_fetch_assoc($all)){
                       $count += $earning['referral_balance'];
                    }
                    echo $count;
                }
                }
               
                ?>
					<div class="col pointer">
						<div class="card radius-10 bg-gradient-burning">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Total Income</p>
										<h4 class="my-1 text-white"><?php CountEarning($all); ?></h4>
									</div>
									<div class="text-white ms-auto font-35"><i class='bx bx-rupee'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col pointer">
						<div class="card radius-10 bg-gradient-kyoto">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-dark">Total Users</p>
										<h4 class="text-dark my-1"><?php echo mysqli_num_rows($all); ?></h4>
									</div>
									<div class="text-dark ms-auto font-35"><i class='bx bx-user-pin'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					
        </div>
            


           


           
 <!--end row-->
 <h6 class="mb-0 text-uppercase">All Referral List</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">

                    <?php
                    $res = mysqli_query($ahk_conn,"SELECT * FROM referal WHERE referred_by='".$_SESSION['phone']."' ORDER BY id DESC");

                    ?>
								<thead>
									<tr>
                                        <th>Sl.</th>
										<th>TXN ID</th>
										<th>Amount</th>
										<th>Refer date</th>
										<th>Phone</th>
										<th>Total Earning</th>
										
										<th>Status</th>
										
									</tr>
								</thead>

								<tbody>
                                    <?php
                                    $total = 0;
                                    $x = 0;
                                    if(mysqli_num_rows($res)>0){
                                        while($data = mysqli_fetch_assoc($res)){
                                            $x  ++;
                                            $total += $data['referral_balance'];
                                            ?>
                                            <tr>
										<td><?php echo $x; ?></td>
										<td><?php echo strtoupper($data['txn_no']); ?></td>
										<td><?php echo strtoupper($data['referral_balance']); ?></td>
										<td><?php echo strtoupper($data['refer_date']); ?></td>
										<td><?php echo strtoupper($data['phone']); ?></td>
										<td>-</td>
										

										<td class="badge badge-bg-primary"><?php echo strtoupper($data['status']); ?></td>
									</tr>
                                    <?php
                                        }
                                       
                                    }
                                    
                                    ?>
									
									
									
								</tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><?php echo $total;?></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
								
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
	<!--app JS-->
	<script src="../template/ahkweb/assets/js/app.js"></script>
   </body>



   </html>