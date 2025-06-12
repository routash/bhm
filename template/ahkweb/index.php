   <?php 
	include('header.php');
   ?>
   <!--start page wrapper -->
   <style>
.pointer {
    cursor: pointer;
}
   </style>
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
               <a href="eid_toaadhaar_pdf_admin_list.php">
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-ohhappiness">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?= $eidtoaadhaar;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">AADHAAR PDF LIST</p>
                                   <p class="mb-0 ms-auto">+1.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a>

               <?php
                }else{
                    ?>
               <a href="eid_to_aadhaar_pdf.php">
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-ohhappiness">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?= $eidtoaadhaarfuser;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">FOUND MATCHING DUPLICATE LIST</p>
                                   <p class="mb-0 ms-auto"><span><i class='bx bx-up-arrow-alt'></i></span></p>
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
               <a href="eid_toaadhaar_no_admin_list.php">
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-ibiza">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?=$eidtoaadhaarNoforadmin;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-group fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">AADHAAR NO List</p>
                                   <p class="mb-0 ms-auto">+5.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a>
               <?php 
               }else{
                ?>
               <a href="eid_to_aadhaar_no.php">
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-ibiza">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?php echo $eidtoaadhaarNoforuser; ?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-group fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">GENERATED EID TO AADHAAR NO</p>
                                   <p class="mb-0 ms-auto">+5.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a>
               <?php 
               }
               ?>
               <?php 
                if(checkAdmin($udata['type']) ==true){
                    ?>
               <a href="instant_pan_admin_list.php">
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?=$pan_noforadmin;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">Search PAN LIST</p>
                                   <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a>
               <?php 
                }else{
                    ?>
               <a href="instant_pan.php">
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                    <h5 class="mb-0 text-white"><?=$pan_noforuser;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">Search PAN LIST</p>
                                   <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a>
               <?php 
                }
               ?>
                 <?php 
                if(checkAdmin($udata['type']) ==true){
                    ?>
               <a href="ration_card_admin_list.php">
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
               </a>
               <?php 
                }else{
                    ?>
               <a href="ration_card.php">
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?=$ration_card_foruser;?></h5>
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
               </a>
               
               <?php 
                }
               ?>
               
                   <?php 
                if(checkAdmin($udata['type']) ==true){
                    ?>
               <a href="vaccine_admin_list.php">
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
               </a>
               <?php 
                }else{
                    ?>
               <a href="vaccine.php">
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?=$vacineuser;?></h5>
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
               </a>
               
               <?php 
                }
               ?>
               
                   <?php 
                if(checkAdmin($udata['type']) ==true){
                    ?>
               <a href="voter_admin_list.php">
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
               </a>
               <?php 
                }else{
                    ?>
               <a href="voter.php">
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?=$voteruser;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">VOTER CARD PDF LIST<</p>
                                   <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a>
               
               <?php 
                }
               ?>
               
                 <?php 
                if(checkAdmin($udata['type']) ==true){
                    ?>
               <a href="instant_dl_admin_list.php">
                   <div class="col pointer">
                     <div class="card radius-10 bg-gradient-ibiza">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?=$instant_dladmin;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">DRIVING LICENCE PDF LIST</p>
                                   <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a>
               <?php 
                }else{
                    ?>
               <a href="instant_dl.php">
                   <div class="col pointer">
                       <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?=$instant_dluser;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">DRIVING LICENCE PDF LIST</p>
                                   <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a>
               
               <?php 
                }
               ?>
                
                  <?php 
                if(checkAdmin($udata['type']) ==true){
                    ?>
               <a href="aadhaar_no_to_pdf_admin_list.php">
                   <div class="col pointer">
                      <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?=$aadhaaradmin;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">AAHDAAR NO TO PDF LIST</p>
                                   <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a>
               <?php 
                }else{
                    ?>
               <a href="aadhaar_no_to_pdf.php">
                   <div class="col pointer">
                        <div class="card radius-10 bg-gradient-moonlit">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <h5 class="mb-0 text-white"><?=$aadhaaruser;?></h5>
                                   <div class="ms-auto">
                                       <i class='bx bx-id-card fs-3 text-white'></i>
                                   </div>
                               </div>
                               <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 55%"
                                       aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               <div class="d-flex align-items-center text-white">
                                   <p class="mb-0">AAHDAAR NO TO PDF LIST</p>
                                   <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </a>
               
               <?php 
                }
               ?>
               
                 <?php 
                if(checkAdmin($udata['type']) ==true){
                    ?>
               <a href="complaint_data_admin_list.php">
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
               </a>
               <?php 
                }else{
                    ?>
               <a href="complaint_data.php">
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
               </a>
               
               <?php 
                }
               ?>
               
                 <?php 
                if(checkAdmin($udata['type']) ==true){
                    ?>
               <a href="rcdetsils_admin_list.php">
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
               </a>
               <?php 
                }else{
                    ?>
               <a href="rcdetails.php">
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
               </a>
               
               <?php 
                }
               ?>
               
                 <?php 
                if(checkAdmin($udata['type']) ==true){
                    ?>
               <a href="nsdl_admin_list.php">
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
               </a>
               <?php 
                }else{
                    ?>
               <a href="nsdl.php">
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
               </a>
               
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