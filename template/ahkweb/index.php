   <?php 
	include('header.php');
   ?>
   <!--start page wrapper -->
   <style>
.pointer {
    cursor: pointer;
}
   </style>
   <?php
$allusersforadmin = 0;
$query = mysqli_query($ahk_conn, "SELECT COUNT(*) as total FROM users");
if($row = mysqli_fetch_assoc($query)) {
    $allusersforadmin = $row['total'];
}
?>
   <div class="page-wrapper">
       <div class="page-content">

           <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
               <?php
			if(checkAdmin($udata['type'])== true){
				?>
               <a href="users.php">
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-deepblue">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?php echo $allusersforadmin; ?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-user fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar"
                                       style="width: <?php echo   $allusersforadmin/100; ?>%" aria-valuenow="90"
                                       aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">Total Users</p>
                                   <p class="mb-0 ms-auto"><?php echo "+ ".  $allusersforadmin/100; ?><span><i
                                               class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a>

               <?php
			}
			
			?>
               <?php
                if(checkAdmin($udata['type']) == true){
                    ?>
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-ohhappiness">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white">AADHAAR PRINT</h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                 <ul class="list-unstyled">
                                    <a href="aadhaarprint_admin_list.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>List For Admin</li></a>
                                 </ul>
                               </div>
                           </div>
                       </div>
                   </div>

               <?php
                }else{
                    ?>
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-ohhappiness">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white">AADHAAR PRINT</h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                <ul class="list-unstyled">
                                    <a href="aadhaarprint.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>New Aadhaar Print</li></a>
                                    <a href="aadhaarprintlist.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Aadhaar Print List</li></a>
                                </ul>
                               </div>
                           </div>
                       </div>
                   </div>

               <?php
                }
               ?>
               <?php 
               if(checkAdmin($udata['type']) == true){
                ?>
               
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-ibiza">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white">Pan Card Admin List</h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-group fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                <ul class="list-unstyled">
                                    <a href="instant_pan_admin_list.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Instant Pan No List</li></a>
                                    <a href="pan_no_to_details_admin_list.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Pan Details List</li></a>
                                    <a href="utipdf_admin_list.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Pan Card Update List</li></a>
                                    <a href="panpdf_admin_list.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i> Manul Pan PDF List</li></a>
                                </ul>
                                  
                               </div>
                           </div>
                       </div>
                   </div>

               <?php 
               }else{
                ?>
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-ibiza">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white">Ayushman Print</h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-group fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                <ul class="list-unstyled">
                                    <a href="ayushman_print.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>New Ayushman Print</li></a>
                                </ul>
                               </div>
                           </div>
                       </div>
                   </div>
               <?php 
               }
               ?>
               <?php 
                if(checkAdmin($udata['type']) ==true){
                    ?>
             
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white">Vahan Admin List</h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                <ul class="list-unstyled">
                                    <a href="rcdetsils_admin_list.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>RC PDF List</li></a>
                                    <a href="lltest_admin_list.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>L.L Test List</li></a>
                                    <a href="instant_dl_admin_list.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Driving Licence List</li></a>
                                    <a href="dl_mobile_update_admin_list.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Driving Licence List</li></a>
                                </ul>
                                  
                               </div>
                           </div>
                       </div>
                   </div>
             
               <?php 
                }else{
                    ?>

                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                    <h5 class="mb-0 text-white">All Pan Card Services</h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                               <ul class="list-unstyled">
                                    <a href="instant_pan.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Instant Pan No</li></a>
                                    <a href="pan_no_to_details.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Pan No To Details</li></a>
                                    <a href="pan_manual.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Manul Pan PDF</li></a>
                                    <a href="utipdf.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Pan Card Update</li></a>
                                </ul>
                               </div>
                           </div>
                       </div>
                   </div>
              
               <?php 
                }
               ?>
                 <?php 
                if(checkAdmin($udata['type']) ==true){
                    ?>
               <!-- <a href="ration_card_admin_list.php">
                   <div class="col pointer">
                        <div class="card radius-10 bg-gradient-ohhappiness">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?=$ration_cardforadmin;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">RATION CARD PDF LIST</p>
                                   <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a> -->
               <?php 
                }else{
                    ?>
               
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white">All Voter Card Services</h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                <ul class="list-unstyled">
                                    <a href="voter_mobile_link_a_TNG_API_DCEB60.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Instant mobile link Voter No</li></a>
                                    <a href="voter_otp_pdf_a_TNG_API_DCD9DC.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Voter otp  pdf</li></a>
                                </ul>
                                  
                               </div>
                           </div>
                       </div>
                   </div>
              
               
               <?php 
                }
               ?>
               
                   <?php 
                if(checkAdmin($udata['type']) ==true){
                    ?>
               <!-- <a href="vaccine_admin_list.php">
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?=$vacineadmin;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">VACCINE CERTIFICATE PDF LIST</p>
                                   <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a> -->
               <?php 
                }else{
                    ?>
               
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white">All Ration Card Services</h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                <ul class="list-unstyled">
                                    <a href="rationt_to_aadhar_up_a_TNG_API_0163A5.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Instant Ration to aadhar up </li></a>
                                    <a href="ration_to_pdf_a_TNG_API_A1A5B7.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Instant Ration to pdf</li></a>
                                </ul>
                                  
                               </div>
                           </div>
                       </div>
                   </div>
              
               
               <?php 
                }
               ?>
               
                   <?php 
                if(checkAdmin($udata['type']) ==true){
                    ?>
               <!-- <a href="voter_admin_list.php">
                   <div class="col pointer">
                     <div class="card radius-10 bg-gradient-ohhappiness">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?=$voteradmin;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">VOTER CARD PDF LIST</p>
                                   <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a> -->
               <?php 
                }else{
                    ?>
               
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white">All Vahan Services</h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                <ul class="list-unstyled">
                                    <a href="rcdetails.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Rc Number To PDF</li></a>
                                    <a href="lltest.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Learning Licence Test</li></a>
                                    <a href="instant_dl.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Driving Licence PDF</li></a>
                                    <a href="dl_mobile_update.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>DL Mobile Number Update</li></a>
                                </ul>
                               </div>
                           </div>
                       </div>
                   </div>
             
               
               <?php 
                }
               ?>
               
                 <?php 
                if(checkAdmin($udata['type']) ==true){
                    ?>

                   <div class="col pointer">
                     <div class="card radius-10 bg-gradient-ibiza">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white">All Vahan Pollution</h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                <ul class="list-unstyled">
                               <a href="2wheelerpuc_admin_list.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>2 Wheeler PUC Cert List   </li></a>
                               <a href="4wheelerpuc_admin_list.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i> 4 Wheeler PUC Cert List</li></a>
                               </ul>
                               </div>
                           </div>
                       </div>
                   </div>
              
               <?php 
                }else{
                    ?>
               
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white">All Vahan Pollution Services</h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                              <ul class="list-unstyled">
                              <a href="2wheelerpuc.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>2 Wheeler PUC Cert</li></a>
                              <a href="4wheelerpuc.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>4 Wheeler PUC Cert</li></a>
                              </ul>
                               </div>
                           </div>
                       </div>
                   </div>
             
               
               <?php 
                }
               ?>
                
                  <?php 
                if(checkAdmin($udata['type']) ==true){
                    ?>
            
                   <div class="col pointer">
                      <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white">All Vahan Insurance</h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                               <ul class="list-unstyled">
                                    <a href="four_wheeler_insurance.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Four Wheeler Insurance</li></a>
                                    <a href="two_wheeler_insurance.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Two Wheeler Insurance</li></a>
                                    </ul>
                               </div>
                           </div>
                       </div>
                   </div>
              
               <?php 
                }else{
                    ?>
              
                   <div class="col pointer">
                        <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white">All Vahan Insurance</h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                 <ul class="list-unstyled">
                                    <a href="four_wheeler_insurance.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Four Wheeler Insurance</li></a>
                                    <a href="two_wheeler_insurance.php"><li class="text-white mb-1"> <i class='bx bx-right-arrow-alt'></i>Two Wheeler Insurance</li></a>
                                    </ul>
                               </div>
                           </div>
                       </div>
                   </div>
              
               
               <?php 
                }
               ?>
               
                 <?php 
                if(checkAdmin($udata['type']) ==true){
                    ?>
               <!-- <a href="complaint_data_admin_list.php">
                   <div class="col pointer">
                     <div class="card radius-10 bg-gradient-ibiza">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?=$complaintadmin;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">COMPLAINT OR BIOMETRIC ISSUE</p>
                                   <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a> -->
               <?php 
                }else{
                    ?>
               <!-- <a href="complaint_data.php">
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?=$complaintuser;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">BIOMETRIC ISSUE AADHAAR LIST</p>
                                   <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a> -->
               
               <?php 
                }
               ?>
               
                 <?php 
                if(checkAdmin($udata['type']) ==true){
                    ?>
               <!-- <a href="rcdetsils_admin_list.php">
                   <div class="col pointer">
                     <div class="card radius-10 bg-gradient-ibiza">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?=$uti_pdfadmin;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">All RC PDF LIST</p>
                                   <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a> -->
               <?php 
                }else{
                    ?>
               <!-- <a href="rcdetails.php">
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?=$uti_pdfuser;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">All RC PDF LIST</p>
                                   <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a> -->
               
               <?php 
                }
               ?>
               
                 <?php 
                if(checkAdmin($udata['type']) ==true){
                    ?>
               <!-- <a href="nsdl_admin_list.php">
                   <div class="col pointer">
                        <div class="card radius-10 bg-gradient-deepblue">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?=$nsdladmin;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                  <p class="mb-0">NSDL-Paperless Branch List</p>
                                   <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a> -->
               <?php 
                }else{
                    ?>
               <!-- <a href="nsdl.php">
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-deepblue">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?=$nsdluser;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">NSDL-Paperless Branch List</p>
                                   <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a> -->
               
               <?php 
                }
               ?>
               
                
           </div>
           <!--end row-->
       
  
        <!-- start::Row -->
           <!-- <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">

              
           </div> -->
           <!-- end::Row -->
                 <!-- start::Row -->
           <div class="row row-cols-15 mb-10">
               <h5><div class="col pointer "><b>Notifications:</b></h5>
<?php 
$notification = mysqli_query($ahk_conn,"SELECT * FROM notification WHERE status='1' order by id DESC");
if(mysqli_num_rows($notification)>0){
    while($ndata = mysqli_fetch_assoc($notification)){
        ?>
<h4 class="text-white bg-primary m-4 mb-0 radius-10" style="padding:10px;"><?php echo $ndata['message']; ?></h4>
        <?php
    }
}
?>

                 
               </div>
           </div>
           <br>
           <!-- end::Row -->
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
   </body>



   </html>