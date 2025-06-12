<?php
checkSession();
?>
<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor8 color-header headercolor1">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?php  ahkweb('logo');  ?>" type="image/png" />
    <!--plugins-->
    <link href="../template/ahkweb/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="../template/ahkweb/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="../template/ahkweb/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="../template/ahkweb/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="../template/ahkweb/assets/css/pace.min.css" rel="stylesheet" />
    <script src="../template/ahkweb/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="../template/ahkweb/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="../template/ahkweb/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../template/ahkweb/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="../template/ahkweb/assets/css/app.css" rel="stylesheet">
    <link href="../template/ahkweb/assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->

    <link rel="stylesheet" href="../template/ahkweb/assets/css/dark-theme.css" />
    <link rel="stylesheet" href="../template/ahkweb/assets/css/semi-dark.css" />
    <link rel="stylesheet" href="../template/ahkweb/assets/css/header-colors.css" />
    <title><?php ahkweb('webname'); ?></title>
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
   
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="<?php echo ahkweb('logo');  ?>" height='31px' width='31px' ">
                </div>
                <div>
                    <h4 class="logo-text"><?php ahkweb('webname'); ?></h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="index.php">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                    <!-- <ul>
						<li> <a href="index.php"><i class="bx bx-right-arrow-alt"></i>Default</a>
						</li>
						<li> <a href="dashboard-eCommerce.html"><i class="bx bx-right-arrow-alt"></i>eCommerce</a>
						</li>
						<li> <a href="dashboard-analytics.html"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
						</li>
						<li> <a href="dashboard-digital-marketing.html"><i class="bx bx-right-arrow-alt"></i>Digital Marketing</a>
						</li>
						<li> <a href="dashboard-human-resources.html"><i class="bx bx-right-arrow-alt"></i>Human Resources</a>
						</li>
					</ul> -->
                </li>
                
                <!-- User management -->
                 <?php if(checkAdmin($udata['type']) == true){ ?>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-user"></i>
                        </div>
                        <div class="menu-title">User Management</div>
                    </a>
                    <ul>
                        <li> <a href="users.php"><i class="bx bx-right-arrow-alt"></i>All Users</a>
                        </li>
                        <li> <a href="adduser.php"><i class="bx bx-right-arrow-alt"></i>Add New</a>
                        <li> <a href="wallet_admin_list.php"><i class="bx bx-right-arrow-alt"></i>Paymet Pending </a>
                        <li> <a href="PendingManualUsers.php"><i class="bx bx-right-arrow-alt"></i>Manual User Pending</a>
                        <li> <a href="BalanceTransfer.php"><i class="bx bx-right-arrow-alt"></i>Balance Transfer <sup style="color:red;">Added</sup></a>
                        </li>
                       

                    </ul>
                </li>
                 <?php } ?>
                <!-- User Management END -->
                <!-- User management -->
                 <?php if($udata['type'] == "distributor" || $udata['type'] == "super_dist" ){ ?>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-user"></i>
                        </div>
                        <div class="menu-title">User Management</div>
                    </a>
                    <ul>
                        <li> <a href="adduser.php"><i class="bx bx-right-arrow-alt"></i>Add New</a></li>
                        <li> <a href="myusers.php"><i class="bx bx-right-arrow-alt"></i>My User List</a></li>
                    </ul>
                </li>
                 <?php } ?>
               
                <!--Aadhar Verification START -->
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-id-card"></i>
                        </div>
                        <div class="menu-title">AADHAAR PRINT</div>
                    </a>
                    <ul>
                        <li> <a href="aadhaarprint.php"><i class="bx bx-right-arrow-alt"></i>New Aadhaar Print</a> </li>
                       
                        <li> <a href="aadhaarprintlist.php"><i class="bx bx-right-arrow-alt"></i>Aadhaar Print List</a>
                        </li>
                        <?php
						if(checkAdmin($udata['type']) == true){
							?>
                        <li> <a href="aadhaarprint_admin_list.php"><i class="bx bx-right-arrow-alt"></i>List For
                                Admin</a>
                        </li>
                        <?php
						}
						?>

                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-id-card"></i>
                        </div>
                        <div class="menu-title">Ayushman Print</div>
                    </a>
                    <ul>
                        <li> <a href="ayushman_print.php"><i class="bx bx-right-arrow-alt"></i>Ayushman Print</a> </li>
                    </ul>
                </li>
                 <!--All Pan Card Services Start-->
                 <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-id-card"></i>
                        </div>
                        <div class="menu-title">All Pan Card Services</div>
                    </a>
                    <ul>
                        <li> <a href="instant_pan.php"><i class="bx bx-right-arrow-alt"></i>Instant Pan No</a></li>
                        <li> <a href="pan_no_to_details.php"><i class="bx bx-right-arrow-alt"></i>Pan No To Details</a></li>
                        <li> <a href="pan_manual.php"><i class="bx bx-right-arrow-alt"></i>Manul Pan PDF</a></li>
                        <li> <a href="utipdf.php"><i class="bx bx-right-arrow-alt"></i>Pan Card Update</a></li>
                    </ul>
                </li>
                  <!--All Pan Card Services Start-->
                 <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-id-card"></i>
                        </div>
                        <div class="menu-title">All Voter Card Services</div>
                    </a>
                    <ul>
                        <li> <a href="voter_mobile_link_a_TNG_API_DCEB60.php"><i class="bx bx-right-arrow-alt"></i>Instant mobile link Voter No</a></li>
                        <li> <a href="voter_otp_pdf_a_TNG_API_DCD9DC.php"><i class="bx bx-right-arrow-alt"></i>Voter otp  pdf</a></li>
                       
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-id-card"></i>
                        </div>
                        <div class="menu-title">All Ration Card Services</div>
                    </a>
                    <ul>
                        <li> <a href="ration_to_pdf_a_TNG_API_A1A5B7.php"><i class="bx bx-right-arrow-alt"></i>Instant Ration to pdf</a></li>
                        <li> <a href="rationt_to_aadhar_up_a_TNG_API_0163A5.php"><i class="bx bx-right-arrow-alt"></i>Instant Ration to aadhar up </a></li>
                       
                    </ul>
                </li>
                
                 <?php
						if(checkAdmin($udata['type']) == true){
							?>
                         <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-id-card"></i>
                        </div>
                        <div class="menu-title">Pan Card Admin List</div>
                    </a>
                    <ul>
                         <li> <a href="instant_pan_admin_list.php"><i class="bx bx-right-arrow-alt"></i>Instant Pan No List</a> </li>
                         <li> <a href="pan_no_to_details_admin_list.php"><i class="bx bx-right-arrow-alt"></i>Pan Details List</a> 
                         <li> <a href="utipdf_admin_list.php"><i class="bx bx-right-arrow-alt"></i>Pan Card Update List</a></li>
                         <li> <a href="panpdf_admin_list.php"><i class="bx bx-right-arrow-alt"></i> Manul Pan PDF List</a> </li>
                    </ul>
                </li>
                        <?php
						}
						?>

                 

                 <!--All Voter Card Services And-->
                 
                 <!--All Vahan Services Start-->
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-id-card"></i>
                        </div>
                        <div class="menu-title">All Vahan Services</div>
                    </a>
                    <ul>
                         <li> <a href="rcdetails.php"><i class="bx bx-right-arrow-alt"></i>Rc Number To PDF</a></li>
                         <li> <a href="lltest.php"><i class="bx bx-right-arrow-alt"></i>Learning Licence Test</a></li>
                         <li> <a href="2wheelerpuc.php"><i class="bx bx-right-arrow-alt"></i>2 Wheeler PUC Cert</a></li>
                         <li> <a href="4wheelerpuc.php"><i class="bx bx-right-arrow-alt"></i>4 Wheeler PUC Cert</a></li>
                         <li> <a href="instant_dl.php"><i class="bx bx-right-arrow-alt"></i>Driving Licence PDF</a></li>
                         <li> <a href="dl_mobile_update.php"><i class="bx bx-right-arrow-alt"></i>DL Mobile Number Update</a></li>
                    </ul>
                </li>
                
                
                 <?php
						if(checkAdmin($udata['type']) == true){
							?>
                         <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-id-card"></i>
                        </div>
                        <div class="menu-title">Vahan Admin List</div>
                    </a>
                    <ul>
                         <li> <a href="rcdetsils_admin_list.php"><i class="bx bx-right-arrow-alt"></i>RC PDF List</a>
                         <li> <a href="lltest_admin_list.php"><i class="bx bx-right-arrow-alt"></i>L.L Test List</a> </li>
                         <li> <a href="2wheelerpuc_admin_list.php"><i class="bx bx-right-arrow-alt"></i>2 Wheeler PUC Cert List</a></li>
                         <li> <a href="4wheelerpuc_admin_list.php"><i class="bx bx-right-arrow-alt"></i>4 Wheeler PUC Cert List</a></li>
                         <li> <a href="instant_dl_admin_list.php"><i class="bx bx-right-arrow-alt"></i>Driving Licence List</a>
                         <li> <a href="dl_mobile_update_admin_list.php"><i class="bx bx-right-arrow-alt"></i>DL Mobile Number Update</a>
                    </ul>
                </li>
                        <?php
						}
						?>
             
               <!--All Vahan Services And-->
                <!-- VOTER CARD PDF -->
                
                <!-- Wallet management START -->
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-wallet"></i>
                        </div>
                        <div class="menu-title">Wallet Management</div>
                    </a>
                    <ul>
                        <li> <a href="wallet.php"><i class="bx bx-right-arrow-alt"></i>Add balance</a>
                        </li>
                        <li> <a href="wallet_history.php"><i class="bx bx-right-arrow-alt"></i>Wallet History</a>
                        </li>
                        <li> <a href="change_password.php"><i class="bx bx-right-arrow-alt"></i>Chamge Password</a>
                        </li>
                        
                    </ul>
                </li>
                <!-- Wallet Management END -->
                <!-- Settings -->
                <?php if(checkAdmin($udata['type']) == true){
				    ?>
				    
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-cog"></i>
                        </div>
                        <div class="menu-title">Website Settings</div>
                    </a>
                    <ul>
                        <li> <a href="settings.php"><i class="bx bx-right-arrow-alt"></i>Website Details</a>
                        </li>
                        <li> <a href="pricing.php"><i class="bx bx-right-arrow-alt"></i>Pricing</a>
                        </li>
                        <li> <a href="notifications.php"><i class="bx bx-right-arrow-alt"></i>Notifications</a></li>
                        <li> <a href="LogoUpdate.php"><i class="bx bx-right-arrow-alt"></i>Update Logo</a></li>
                        
                    
                       

                    </ul>
                </li>
                 <?php } ?>
                <!-- Settings -->

               <!-- Content Shifted to sidebarextra.php -->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                   <?php
                   if(isset($_GET['gettoAdmin']) && $_GET['session'] == 'true'){
                    loginAsAdmin();
                   }
                   
                        if(isset($_SESSION['adminasuser'])== true && $_SESSION['adminusername']!=NULL){
                                ?>
                                <!-- <form action="" method="POST"> -->
                                    <div class="search-bar flex-grow-1">
                                        <div class="position-relative search-bar-box">
                                            <a href="?gettoAdmin=1&session=true" type="submit" class="btn btn-success">Go Back to Admin Panel</a>
                                        </div>
                                    </div>
                                <!-- </form> -->
                               
                           
                                <?php 
                            }else{
                                ?>
                                <div class="search-bar flex-grow-1">
                         <!-- <a class="btn btn-success" href="https://www.whatsapp.com/channel/0029Va8K7D7EquiOzfwZI90X" role="button">WhatsApp Channel Follow</a> -->
                            <div class="position-relative search-bar-box">
                                
                                
                                       

                                <span class="position-absolute top-50 search-close translate-middle-y"><i
                                        class='bx bx-x'></i></span>

                            </div>

                            </div>
                                <?php
                            }
                   ?>
                    <div style="margin-right:12px;" class="text-success">
                        <style>
                        #time {
                            color: white;
                            font-size: 18px;
                            font-family: "Times New Roman", Times, serif;
                        }
                        </style>
                        <a id="time"></a>
                        <script>
                        var timeDisplay = document.getElementById("time");

                        function refreshTime() {
                            var dateString = new Date().toLocaleString("en-IN", {
                                timeZone: "Asia/Kolkata"
                            });
                            var formattedString = dateString.replace(", ", " - ");
                            timeDisplay.innerHTML = formattedString;
                        }

                        setInterval(refreshTime, 1000);
                        </script>
                    </div>
                    <a class="btn btn-warning" href="wallet.php">Wallet: <?php 
                    if($udata['balance']==NULL){
                        echo "₹". "0";
                    }else{
                        echo "₹". $udata['balance'];

                    }
                    ?></a>
                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <!-- <li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li> -->
                            <!-- <li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="row row-cols-3 g-3 p-3">
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
											</div>
											<div class="app-title">Teams</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-atom'></i>
											</div>
											<div class="app-title">Projects</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i>
											</div>
											<div class="app-title">Tasks</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-notification'></i>
											</div>
											<div class="app-title">Feeds</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-file'></i>
											</div>
											<div class="app-title">Files</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-moonlit text-white"><i class='bx bx-filter-alt'></i>
											</div>
											<div class="app-title">Alerts</div>
										</div>
									</div>
								</div>
							</li> -->
                             <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
                                        class="alert-count">7</span>
                                    <i class='bx bx-bell'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Notifications</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a>
                                    <div class="header-notifications-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i
                                                        class="bx bx-group"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Customers<span
                                                            class="msg-time float-end">14 Sec
                                                            ago</span></h6>
                                                    <p class="msg-info">5 new user registered</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-danger text-danger"><i
                                                        class="bx bx-cart-alt"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Orders <span class="msg-time float-end">2
                                                            min
                                                            ago</span></h6>
                                                    <p class="msg-info">You have recived new orders</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-success text-success"><i
                                                        class="bx bx-file"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19
                                                            min
                                                            ago</span></h6>
                                                    <p class="msg-info">The pdf files generated</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-warning text-warning"><i
                                                        class="bx bx-send"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Time Response <span
                                                            class="msg-time float-end">28 min
                                                            ago</span></h6>
                                                    <p class="msg-info">5.1 min avarage time response</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-info text-info"><i
                                                        class="bx bx-home-circle"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Product Approved <span
                                                            class="msg-time float-end">2 hrs ago</span></h6>
                                                    <p class="msg-info">Your new product has approved</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-danger text-danger"><i
                                                        class="bx bx-message-detail"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Comments <span class="msg-time float-end">4
                                                            hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">New customer comments recived</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-success text-success"><i
                                                        class='bx bx-check-square'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Your item is shipped <span
                                                            class="msg-time float-end">5 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">Successfully shipped your item</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i
                                                        class='bx bx-user-pin'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New 24 authors<span
                                                            class="msg-time float-end">1 day
                                                            ago</span></h6>
                                                    <p class="msg-info">24 new authors joined last week</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-warning text-warning"><i
                                                        class='bx bx-door-open'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Defense Alerts <span
                                                            class="msg-time float-end">2 weeks
                                                            ago</span></h6>
                                                    <p class="msg-info">45% less alerts last 4 weeks</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Notifications</div>
                                    </a>
                                </div>
                            </li> 
                            <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
                                        class="alert-count">8</span>
                                    <i class='bx bx-comment'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Messages</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a>
                                    <div class="header-message-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../template/ahkweb/assets/images/avatars/avatar-1.png"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Daisy Anderson <span
                                                            class="msg-time float-end">5 sec
                                                            ago</span></h6>
                                                    <p class="msg-info">The standard chunk of lorem</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../template/ahkweb/assets/images/avatars/avatar-2.png"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Althea Cabardo <span
                                                            class="msg-time float-end">14
                                                            sec ago</span></h6>
                                                    <p class="msg-info">Many desktop publishing packages</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../template/ahkweb/assets/images/avatars/avatar-3.png"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8
                                                            min
                                                            ago</span></h6>
                                                    <p class="msg-info">Various versions have evolved over</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../template/ahkweb/assets/images/avatars/avatar-4.png"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Katherine Pechon <span
                                                            class="msg-time float-end">15
                                                            min ago</span></h6>
                                                    <p class="msg-info">Making this the first true generator</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../template/ahkweb/assets/images/avatars/avatar-5.png"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22
                                                            min
                                                            ago</span></h6>
                                                    <p class="msg-info">Duis aute irure dolor in reprehenderit</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../template/ahkweb/assets/images/avatars/avatar-6.png"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Cristina Jhons <span
                                                            class="msg-time float-end">2 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">The passage is attributed to an unknown</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../template/ahkweb/assets/images/avatars/avatar-7.png"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">James Caviness <span
                                                            class="msg-time float-end">4 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">The point of using Lorem</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../template/ahkweb/assets/images/avatars/avatar-8.png"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Peter Costanzo <span
                                                            class="msg-time float-end">6 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">It was popularised in the 1960s</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../template/ahkweb/assets/images/avatars/avatar-9.png"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">David Buckley <span
                                                            class="msg-time float-end">2 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">Various versions have evolved over</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../template/ahkweb/assets/images/avatars/avatar-10.png"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Thomas Wheeler <span
                                                            class="msg-time float-end">2 days
                                                            ago</span></h6>
                                                    <p class="msg-info">If you are going to use a passage</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../template/ahkweb/assets/images/avatars/avatar-11.png"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5
                                                            days
                                                            ago</span></h6>
                                                    <p class="msg-info">All the Lorem Ipsum generators</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Messages</div>
                                    </a>
                                </div>
                            </li> 
                        </ul>
                    </div>
                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../template/ahkweb/assets/images/avatars/avatar-2.png" class="user-img"
                                alt="user avatar">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0"><?php  echo $udata['name'];  ?></p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="profile.php"><i
                                        class="bx bx-user"></i><span>Profile</span></a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i
                                        class="bx bx-cog"></i><span>Settings</span></a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i
                                        class='bx bx-home-circle'></i><span>Dashboard</span></a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i
                                        class='bx bx-dollar-circle'></i><span>Earnings</span></a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i
                                        class='bx bx-download'></i><span>Downloads</span></a>
                            </li>
                            <li>
                                <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li><a class="dropdown-item" href="../includes/logout.php"><i
                                        class='bx bx-log-out-circle'></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header --> 