<?php
$page = 'Manage Post';
include('inc/header.php'); 
$userservices = $obj->GetServiceByUserId($user_id);
$pending_services = $obj->GetPendingServiceByUserId($user_id);
$inactive_services = $obj->GetInactiveServiceByUserId($user_id);
$activejobs = $obj->GetActiveJobByUserId($user_id);
 

?>
<link rel="stylesheet" href="assets/css/manage-post.css">

        
                <?php include('inc/sidebar.php'); ?>     
                     <!--first tab row start-->
                  <div class="col-sm-12 instant-main">
                <div class="row">
                    <div class="middle_container">
                             <div class="head-mid">
                                <h2>Manage Post <b style="color: #ff0000;">(WIP M3)</b></h2>
                            </div>
                          <!-- ----------------------middle one---------------------- -->
                          <div class="manage-section">
						  
						  <?php 
						  if(!empty($pending_services->num_rows)) {echo '<div class="app-act"> <h2>Waiting Approval</h2> </div>';}else{}
						  
						  while($rows = mysqli_fetch_array($pending_services)) {
									$userid = $rows['user_id'];
                                         $userinfo = $obj->GetUserById($userid);
								  ?>
								 <!--<div class="app-act"><h2>Waiting Approval</h2></div>-->
 								   <div class="img-p">
										<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$rows['photos'];?>" alt=""> </div>
											<div class="all-cnt">
												<div class="d-flex two-lb align-items-center">
													<div class="img-plus-nm">
													  <img class="sm-img" src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($userinfo['ProfilePic'])) { echo 'admin/assets/img/profile/'.$userinfo['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>" alt="">
															<p class="pp mr-in "> <?=$userinfo['ProfileName'];?></p>  
													</div> 
													<div class="jst-nw">
															<!--<img class="hhh" src="assets/img/hearts.png"style="height:25px;width:25px;"alt=""> -->
														<p class="">24hr 00s left</p>
													</div>
															 
												</div>
												<p class="pp2"><?=$rows['topic'];?> </p>
												<div class="d-flex justify-content-between align-items-center">
													 <div class="csh-img-div">
													 <img class="cash-img img-cash-gr" src="assets/img/cash.svg" >   
													 <b><?=$rows['price'];?> <?=$rows['price_type'];?></b>
													</div>
												</div>
											</div>
										</div>
							<?php } ?>
							 
								
								
								
                                 
							  
							  <?php 
							  if(!empty($userservices->num_rows)) {echo '<div class="app-act"> <h2>Active</h2> </div>';}else{}
							  while($row = mysqli_fetch_array($userservices)) {
							     // echo '<pre>';
							     // print_r($row);
							     // echo '</pre>';
									$userid = $row['user_id'];
                                         $userinfo = $obj->GetUserById($userid);
								  ?>
								  
								   
								   <a href="professional-service?id=<?=$row['id'];?>">
								   <div class="img-p">
										<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$row['photos'];?>" alt=""> </div>
											<div class="all-cnt">
												<div class="d-flex two-lb align-items-center">
													<div class="img-plus-nm">
													  <img class="sm-img" src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($userinfo['ProfilePic'])) { echo 'admin/assets/img/profile/'.$userinfo['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>" alt="">
															<p class="pp mr-in "> <?=$userinfo['ProfileName'];?></p>  
													</div> 
													<div class="jst-nw">
															<!--<img class="hhh" src="assets/img/hearts.png"style="height:25px;width:25px;"alt=""> -->
														<p class="">24hr 00s left</p>
													</div>
															 
												</div>
												<p class="pp2"><?=$row['topic'];?> </p>
												<div class="d-flex justify-content-between align-items-center">
													 <div class="csh-img-div">
													 <img class="cash-img img-cash-gr" src="assets/img/cash.svg" >   
													 <b><?=$row['price'];?> <?=$row['price_type'];?></b>
													</div>
												</div>
											</div>
										</div>
										</a>
							<?php } ?>	
								<?php while($row=mysqli_fetch_array($activejobs)){ 
                                         $userid = $row['user_id'];
                                         $userinfo = $obj->GetUserById($userid);
                                         
                                         ?> 
                                         <a href="job-details?id=<?=$row['id'];?>">
                                            <div class="img-p">
                                    <div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$row['photos'];?>" alt="">
                                             </div>
                                     <div class="all-cnt">
                                        <div class="d-flex two-lb align-items-center  job-listing-fl  ">
                                            <div class="title_img">
                                                <img class="sm-img" src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($userinfo['ProfilePic'])) { echo 'admin/assets/img/profile/'.$userinfo['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>" alt="">
                                                    <p class="pp mr-in "><?=$userinfo['ProfileName'];?></p> 
                                            </div>
                                         <div>
                                            <div class="clock-time">
                                                <i class="fa-regular fa-clock"></i>
                                                <p>72h 42s left</p>
                                            </div>
                                            </div>
                                        </div>
                                        <p class="pp2"><?=$row['topic'];?> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="star">
                                               <i class="fa-solid fa-star"></i>
                                                <small>New Member</small>
                                            </div>
                                            <div>
                                             <img class="cash-img" src="assets/img/cash.svg" >   
                                             <b><?=$row['price'];?> <?=$row['price_type'];?></b>
                                            </div>
                                         </div>
                                    </div>
                                </div>
								        </a>
								<?php }?>
								 <?php
								 
								  if(!empty($inactive_services->num_rows)) {echo '<div class="app-act"> <h2>Inactive</h2> </div>';}else{}
								 while($rowss = mysqli_fetch_array($inactive_services)) {
									$userid = $rowss['user_id'];
                                         $userinfo = $obj->GetUserById($userid);
								  ?>
								 <!--<div class="app-act"><h2>Inactive</h2></div>-->
 								   <div class="img-p">
										<div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$rowss['photos'];?>" alt=""> </div>
											<div class="all-cnt">
												<div class="d-flex two-lb align-items-center">
													<div class="img-plus-nm">
													  <img class="sm-img" src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($userinfo['ProfilePic'])) { echo 'admin/assets/img/profile/'.$userinfo['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>" alt="">
															<p class="pp mr-in "> <?=$userinfo['ProfileName'];?></p>  
													</div> 
													<div class="jst-nw">
															<!--<img class="hhh" src="assets/img/hearts.png"style="height:25px;width:25px;"alt=""> -->
														<p class="">24hr 00s left</p>
													</div>
															 
												</div>
												<p class="pp2"><?=$rowss['topic'];?> </p>
												<div class="d-flex justify-content-between align-items-center">
													 <div class="csh-img-div">
													 <img class="cash-img img-cash-gr" src="assets/img/cash.svg" >   
													 <b><?=$rowss['price'];?> <?=$rowss['price_type'];?></b>
													</div>
												</div>
											</div>
										</div>
							<?php } ?>
                          </div>
                         
                          <!---------------------- middle one end -------------------------->
                          </div>
                         
                        
						<?php include('inc/footer.php'); ?> 
                        
                        
                        <!--title & summary 4-->
                         <div class="profile-mid-cont desk-hidn">
                                <div class="title-and-para forth-sm">
                                    <div class="bio-title fl-sm">
                                       <h3>Job Completed</h3> 
                                       <div class="show-all">
                                           <a href="#">Show All</a>
                                       </div>
                                    </div>
                                    <div class="">
                                        <div class="img-p-content">
                                            <div class="img-pro-fl">
                                                <img class="" src="http://instantjobs.bluepearltech.com/assets/img/dcc2ccd9.avif" alt="">
                                            </div>
                                            <div class="para-profile">
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr...</p>
                                            </div>
                                        </div>
                                        <div class="img-p-content">
                                            <div class="img-pro-fl">
                                                <img class="" src="http://instantjobs.bluepearltech.com/assets/img/dcc2ccd9.avif" alt="">
                                            </div>
                                            <div class="para-profile">
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr...</p>
                                            </div>
                                        </div>
                                        <div class="img-p-content">
                                            <div class="img-pro-fl">
                                                <img class="" src="http://instantjobs.bluepearltech.com/assets/img/dcc2ccd9.avif" alt="">
                                            </div>
                                            <div class="para-profile">
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--title & summary 4-->
                            
                            <!--reviews-->
                            <div class="review-section desk-hidn">
                                <div class="review-sec-profile">
                                   <div class="bio-title fl-sm">
                                       <h3>Reviews</h3> 
                                       <div class="show-all">
                                           <a href="#">Show All</a>
                                       </div>
                                    </div> 
                                    <div class="review-content">
                                       <div class="star-rating-img">
                                        <img class="review-img" src="http://instantjobs.bluepearltech.com/assets/img/dcc2ccd9.avif" alt="">
                                       </div> 
                                       <div class="star-rating">
                                           <h3>Clinton</h3>
                                           <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="">
                                           <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="">
                                           <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="">
                                           <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="">
                                       </div>
                                    </div>
                                    <p>Lorem ipsum Pellentesque efficitur leo a laoreet. Quis neque fringilla, in imperdiet sapien euismod.</p>
                                    <div class="review-content">
                                       <div class="star-rating-img">
                                        <img class="review-img" src="http://instantjobs.bluepearltech.com/assets/img/dcc2ccd9.avif" alt="">
                                       </div> 
                                       <div class="star-rating">
                                           <h3>Abdullah</h3>
                                           <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="">
                                           <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="">
                                           <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="">
                                           <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="">
                                       </div>
                                    </div>
                                    <p>Lorem ipsum Pellentesque efficitur leo a laoreet. Quis neque fringilla, in imperdiet sapien euismod.</p>
                                    <div class="review-content">
                                       <div class="star-rating-img">
                                        <img class="review-img" src="http://instantjobs.bluepearltech.com/assets/img/dcc2ccd9.avif" alt="">
                                       </div> 
                                       <div class="star-rating">
                                           <h3>Man Kaya</h3>
                                           <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="">
                                           <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="">
                                           <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="">
                                           <img src="http://instantjobs.bluepearltech.com/assets/img/star.svg" alt="">
                                       </div>
                                    </div>
                                    <p>Lorem ipsum Pellentesque efficitur leo a laoreet. Quis neque fringilla, in imperdiet sapien euismod.</p>
                                </div>
                            </div>
                            <!--reviews-->
                     
                 