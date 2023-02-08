<?php 
$page = 'Discussion';
include('inc/header.php'); 
$serviceid = $_GET['id'];
$signle_service = $obj->GetServiceById($serviceid);
$userid = $signle_service['user_id'];
$postuser = $obj->GetUserById($userid);

?>
<link rel="stylesheet" href="assets/css/discussion.css">

       
               <?php include('inc/sidebar.php'); ?>     
                     <!--first tab row start-->
                   <div class="col-sm-12 instant-main">
                <div class="row">
                    <div class="col-lg-9 col-md-9" id="myTabContent">
                           <div class="d-flex hidn-objct sticky msg-header">
							<div class="backbtn"> 
									<a href="professional-service?id=<?=$signle_service['id'];?>"><i class="fa-solid fa-arrow-left"></i></a>
								</div>
								
								<div class="prof-heigh-wid">
								     <div class="manage-as-lo"><?=$signle_service['topic'];?></div>
							    </div> 								
								<div class="rightsidemenu">
  								    <button class="btn-content-hide" ><i onclick="myFun()"class="fa-solid fa-ellipsis-vertical dropbtn"></i></button>
 								</div>
								
 							</div>
 							 <!----------------three dot menu mobila view START--------------------->
                                    <div class="dropdown">
                                       <div id="myDropdown" class="dropdown-content">
                                         <a href="discussion-budget?id=<?=$signle_service['id'];?>">start job</a>
                                         <a href="#">propose budget </a>
                                         <a href="#">Attach files</a>
                                         <a href="#">Send location</a>
                                         <a href="#">Report job</a>
                                         <a href="#">Block user</a>
                                       </div>
                                     </div>
                          <!--------------------------three dot menu mobila view----------------------------------->
 							<div class="main_contain_discuss">
 							    <div class="active_content">
 							        
 								    <h3 class="discussion_title">Discussion<b style="color: #ff0000;">(WIP M2)</b></h3>
 								<div class="img-p third-pge-contnt" style="align-items:unset;  margin:0;">
                           <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                       <div class="all-cntnt">
                           <div class="align-items-center"  style="padding:0;">
                               <div class="items-title">
                                   <div><h5 class="pp mr-in title-name"  style="margin:0; font-size: 18px;">michael-ho</h5></div>
                                  
                                  <div>
                                 <a><i class="fa-regular fa-thumbs-up"></i></a>
                                  </div>
                               </div>
                           </div>
                            <div class="time_discuss">
                                      <span style="font-size: 12px;">3 hours ago</span>
                                  </div>
                            <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit  amet adipiscing elit amet </p>
                     </div>  
                    </div>
 								<div class="img-p third-pge-contnt" style="align-items:unset;">
                           <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                       <div class="all-cntnt">
                           <div class=" align-items-center"  style="padding:0;">
                                  <div class="items-title">
                                   <div><h5 class="pp mr-in title-name"  style="margin:0; font-size: 18px;">billyjeans88</h5></div>
                                  
                                  <div>
                                 <a><i class="fa-regular fa-thumbs-up"></i></a>
                                  </div>
                               </div>
                                <div class="">
                                </div> 
                           </div>
                            <div class="time_discuss">
                                      <span style="font-size: 12px;">3 hours ago</span>
                                  </div>
                            <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit  amet adipiscing elit amet </p>
                     </div>  
                    </div>
                          
            <div class="search_inp">
                <input placeholder="Say something...." style="width: 100%;border-radius: 25px;">
            </div>
 							    </div>
            <!--------------------- hidden content of discussion--------------------->
            
 							<div class="hidden_content" style="margin-top: 100px;">
 								<div class="img-p third-pge-contnt" style="align-items:unset;  margin:0; border-top: 1px solid #F1F3F4;">
                           <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                       <div class="all-cntnt">
                           <div class="align-items-center"  style="padding:0;">
                               <div class="items-title">
                                   <div><h5 class="pp mr-in title-name"  style="margin:0; font-size: 18px;">michael-ho</h5></div>                                                                   <div>
                                 <a><i class="fa-regular fa-thumbs-up"></i></a>
                                  </div>
                               </div>
                           </div>
                            <div class="time_discuss">
                                      <span style="font-size: 12px;">3 hours ago</span>
                                  </div>
                            <p class="content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit  amet adipiscing elit amet </p>
                     </div>  
                    </div>
 								<div class="img-p third-pge-contnt  img_p " style="align-items:unset;">
                           <div class="hh-1"><img class="cir-img" src="assets/img/photo-1472457897821-70d3819a0e24.avif" alt=""></div>
                       <div class="all-cntnt" style="width:100%;">
                           <div class=" align-items-center"  style="padding:0;">
                                  <div class="items-title">
                                   <div><h5 class="pp mr-in title-name"  style="margin:0; font-size: 18px;">billyjeans88</h5></div>
                                  
                                  <div>
                                 <a><i class="fa-regular fa-thumbs-up"></i></a>
                                  </div>
                               </div>
                           </div>
                            <div class="time_discuss">
                                      <span style="font-size: 12px;">3 hours ago</span>
                                  </div>
                     </div>  
                    </div>
                    <div style="margin-top: 23px;">
                        <h6 style="    font-size: 11px;padding: 0 20px;color: #007510;font-weight: 700;">RE-PROPOSED AN OFFER</h6>
                    </div>
                     	<div class="img-p" style=" padding:0 20px;">
                                    <div class="hh-1"><img class="hhh" src="admin/assets/img/services/how-often-feed-dog-900x600.jpg" alt="">
                                             </div>
                                     <div class="all-cnt">
                                        <div class="d-flex two-lb align-items-center job-listing-fl  ">
                                            <div class="title_img">
                                                <img class="sm-img" src="admin/assets/img/profile/247929946_1473706362988509_5649812827670982879_n.jpg" alt="">
                                                    <p class="pp mr-in ">Jaspreet Singh</p> 
                                            </div>
                                         <div>
                                            <div class="clock-time">
                                                <i class="fa-regular fa-clock"></i>
                                                <p>72h 42s left</p>
                                            </div>
                                            </div>
                                        </div>
                                        <p class="pp2">Need help feeding my dog over this weekend 2 days. </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                             <img class="cash-img" src="assets/img/cash.svg">   
                                             <b style="color: #108110;">500 MYR</b>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                                <div style="margin: 0 20px;">
                                    
                                <a  href="discussion-budget-summary?id=<?=$signle_service['id'];?>"><button type="button" class="btn-wallet" >Start Work</button> </a>
                                </div>
 							</div>
 							    
 							</div>
            <!-- -------------------hidden content of discussion------------------->
            
			 </div>
           </div>
            </div>    
                 <script>
                     $(document).ready(function(){
                         
                         $('#two-tab').click(function(){
                             $('.service-create').css('display', 'none')
                             $('.post-create').css('display', 'block')
                         });
                         
                          $('#one-tab').click(function(){
                             $('.service-create').css('display', 'block')
                             $('.post-create').css('display', 'none')
                         });
                         
                     });
                 </script>
        