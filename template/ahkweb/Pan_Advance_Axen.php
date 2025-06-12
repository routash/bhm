<?php include('header.php'); ?>

<body>
<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
			
        <div class="main">
            <div class="col-md-12">
                <div class="main-content">
                    <div class="col-md-12">
                        <div class="card card-default">
                            <div class="card-header bg-warning">
                                <div class="card-title">
                                    <h3><strong>Enter PAN Details TO Get PDF </strong></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="card col-12">
                            <hr>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <form name="" action="pan_manual.php" method="POST" id="pan_verification">
                                                <div class="card-body">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="card-title" for="panNumber">PAN Number</label>
                                                            <input type="text" required="" class="form-control" name="panNumber" id="panNumber" placeholder="ENTER PAN NUMBER">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 ml-2">
								                	<h5 class="text-warning ">Application Fee: <?php  
								                		$price = mysqli_fetch_assoc(mysqli_query($ahk_conn,"SELECT price FROM pricing WHERE service_name='panauto'")); 
								                		echo "₹" .$price['price'];
								                		?></h5>
								                </div>
                                                <div class="row row-sm mg-t-20">
                                                    <div class="col-lg">
                                                        <button type="submit" name="verify_pan" class="btn btn-primary w-100"><i class="fa fa-check-circle"></i> GET PAN</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add your footer content here -->

    <script src="../template/ahkweb/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../template/ahkweb/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="../template/ahkweb/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="../template/ahkweb/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="../template/ahkweb/assets/js/app.js"></script>
</body>
</html>
