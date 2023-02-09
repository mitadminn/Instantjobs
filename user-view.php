<?php 
$page = 'Profile';
include('inc/header.php'); 
$viewuserid = $_GET['viewuserid'];
$portfolio = $obj->GetPortfolioByUserId($user_id);
$view_user_info = $obj->GetUSerByUserId($viewuserid);

?>
<link rel="stylesheet" href="assets/css/user-view.css">
<link rel="stylesheet" href="assets/css/stylesheet.css">

        <div class="container-fluid"> 
            <!-------- ASIDE SEC START -------->
                <?php include('inc/sidebar.php'); ?>     
                     <!--first tab row start-->
                   <div class="col-sm-12 instant-main">                
				   <div class="row">                    
				   <div class="col-lg-9 col-md-9 second-mid example">
                             <div class="head-mid">
                                <h2>Public Profile</h2>
                            </div>
                          <!-- ----------------------middle one---------------------- -->
                          <div class="bck-white ">
                                      <div class="row user-info_row">
    <div class="col-lg-8">
        <div class="dream">
            <?php ?>
           
                <?php if(!empty($_SESSION['user_image'])) { ?>
                                         <img class="main-img" src="<?php echo $_SESSION['user_image'];?>" alt="">
                                    <?php } elseif(!empty($view_user_info['ProfilePic'])) { ?>
                                         <img  class="main-img profile-in_mid" src="admin/assets/img/profile/<?php echo $view_user_info['ProfilePic'];?>" alt="">
                                    <?php } else { ?>
                                    <img  class="main-img" src="assets/img/male-1.png" alt="">
                                    <?php }?>
               <div class="dream-star">
                    <h6> <?php if(!empty($guser['ProfileName'])) { echo $guser['ProfileName']; } elseif(!empty($_SESSION['Userid'])) { echo $view_user_info['ProfileName']; } else {}?></h6>
 						<p> <img class="small-img-star " src="assets/img/star-svg.png" alt=""> New Member</p> 
                        <!--<p>From: <?=$view_user_info['Country'];?></p>-->
                        <!--<p>Member Since: <?php $datee = date_create($view_user_info['Created_at']); echo date_format($datee,"M Y"); ?></p>-->
                        <p>Level 3 Member </p>
                </div>
        </div>
        <div class="users_all_info">
            <div class="users_info_container">
                <div class="">
                    <table class="table_container">
                      <tr class="table-row_top">
                        <th>MY</th>
                        <th>Jan 2023</th>
                        <th>15min</th>
                        <th>230k+</th>
                      </tr>
                      <tr class="table-row_users">
                        <td>Country</td>
                        <td>Member since</td>
                        <td>Respomse time</td>
                        <td>Earning MYR</td>
                      </tr>
                      </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div  class="profile-mid_right_btns user_view">
        <div>
        <a href=""><button class="snd-msg" >Send a message</button></a>
        </div>
        <div>
        <a href="invite-for-interview"><button  class="invt-job-intrvw">Invite for job interview</button></a>
        </div>
        <div>
        <a href="invite-for-job-post"><button class="invite-jop-post">Invite to your job post</button></a>
        </div>
        </div>
    </div>
</div>  
                             <div class="row">
								<div class="col-lg-12">
								<!--title & summary 1-->
                            <div class="profile-mid-content">
                                <div class="title-and-para">
                                    <div class="bio-title title_bio">
                                        <div class="pro-bio-contain">
                                       <h3>Profile Bio</h3> 
                                        </div>
                                        <div class="edit-container">
                                            <p><a href="profile-edit">Edit</a></p>
                                        </div>
                                    </div>
                                    <p><?=$view_user_info['ProfileBio'];?></p>
                                </div>
                            </div>
                            <!--title & summary 1-->
                            <div class="profile-mid-content">
                                <div class="title-and-para">
                                    <div class="bio-title title_bio">
                                        <div class="pro-bio-contain">
                                       <h3>Skills</h3> 
                                       </div>
                                        <div  class="edit-container">
                                            <p><a href="profile-edit">Edit</a></p>
                                        </div>
                                    </div>
                                    <div class="row skill_bobbies_">
                                      
                                    
                                     <?php if(!empty($view_user_info['Skills'])) { ?>
                                    <p class="skills"> <?php echo str_replace(",","<p class='skills'>",$view_user_info['Skills']); ?> </p>
                                    <?php } else {echo 'Nothing added yet';}?>
                                    </div>
                                </div>
                            </div>
                            <!--title & summary 1-->
                            <div class="profile-mid-content">
                                <div class="title-and-para">
                                    <div class="bio-title title_bio">
                                        <div class="pro-bio-contain">
                                       <h3>Hobbies</h3> 
                                       </div>
                                        <div  class="edit-container">
                                            <p><a href="profile-edit">Edit</a></p>
                                        </div>
                                    </div>
                                    <div class="row skill_bobbies_">
                                        <?php if(!empty($view_user_info['Hobbies'])) { ?>
                                  <p class="skills"> <?php echo str_replace(",","<p class='skills'>",$view_user_info['Hobbies']); ?> </p>
                                  <?php } else {echo 'Nothing added yet';}?>
                                    </div>

                                </div>
                            </div>
                            <!--title & summary 1-->
                            
                            <!--title & summary 2-->
                            <div class="profile-mid-content">
                                <div class="title-and-para">
                                    <div class="bio-title title_bio">
                                        <div class="pro-bio-contain">
                                       <h3>Qualification / Awards</h3> 
                                       </div>
                                        <div  class="edit-container">
                                            <p><a href="profile-edit">Edit</a></p>
                                        </div>
                                    </div>
                                    <div class="bio-quali">
                                        <p><?=$view_user_info['Qualifications'];?>  <?=$view_user_info['Year'];?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-mid-content">
                                <div class="title-and-para">
                                    <div class="bio-title title_bio">
                                        <div class="pro-bio-contain">
                                       <h3>Portfolio</h3> 
                                       </div>
                                        <div  class="edit-container">
                                            <p><a href="portfolio">Edit</a></p>
                                        </div>
                                    </div>
                                    <div class="bio-img">
                                     <?php while($row=mysqli_fetch_array($portfolio)){ ?>
                                        <div class="add-img-container">
                                            <img class="add-img" src="admin/assets/img/portfolio/<?=$row['Photos'];?>" alt="">
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!--title & summary 3-->
                            
                            <!--title & summary 4-->
                             <div class="profile-mid-cont hidn-aftr-fotr">
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
                                                <img class="" src="admin/assets/img/services/photo-1472457897821-70d3819a0e24.avif" alt="">
                                            </div>
                                            <div class="para-profile">
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr...</p>
                                            </div>
                                        </div>
                                        <div class="img-p-content">
                                            <div class="img-pro-fl">
                                                <img class="" src="	admin/assets/img/services/R0010382.JPG" alt="">
                                            </div>
                                            <div class="para-profile">
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr...</p>
                                            </div>
                                        </div>
                                        <div class="img-p-content">
                                            <div class="img-pro-fl">
                                                <img class="" src="	admin/assets/img/services/Chrysanthemum.jpg" alt="">
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
                            <div class="review-section hidn-aftr-fotr">
                                <div class="review-sec-profile">
                                   <div class="bio-title fl-sm">
                                       <h3>Reviews</h3> 
                                       <div class="show-all">
                                           <a href="review-only">Show All</a>
                                       </div>
                                    </div> 
                                    <div class="review-content">
                                       <div class="star-rating-img">
                                        <img class="review-img" src="admin/assets/img/services/photo-1472457897821-70d3819a0e24.avif" alt="">
                                       </div> 
                                       <div class="star-rating">
                                           <h3>Clinton</h3>
                                         <i class="fa-solid fa-star"></i>
                                           <i class="fa-solid fa-star"></i>
                                           <i class="fa-solid fa-star"></i>
                                           <i class="fa-solid fa-star"></i>
                                       </div>
                                    </div>
                                    <p>Lorem ipsum Pellentesque efficitur leo a laoreet. Quis neque fringilla, in imperdiet sapien euismod.</p>
                                    <div class="review-content">
                                       <div class="star-rating-img">
                                        <img class="review-img" src="admin/assets/img/services/R0010382.JPG" alt="">
                                       </div> 
                                       <div class="star-rating">
                                           <h3>Abdullah</h3>
                                            <i class="fa-solid fa-star"></i>
                                           <i class="fa-solid fa-star"></i>
                                           <i class="fa-solid fa-star"></i>
                                           <i class="fa-solid fa-star"></i>
                                       </div>
                                    </div>
                                    <p>Lorem ipsum Pellentesque efficitur leo a laoreet. Quis neque fringilla, in imperdiet sapien euismod.</p>
                                    <div class="review-content">
                                       <div class="star-rating-img">
                                        <img class="review-img" src="admin/assets/img/services/Chrysanthemum.jpg" alt="">
                                       </div> 
                                       <div class="star-rating">
                                           <h3>Man Kaya</h3>
                                           <i class="fa-solid fa-star"></i>
                                           <i class="fa-solid fa-star"></i>
                                           <i class="fa-solid fa-star"></i>
                                           <i class="fa-solid fa-star"></i>
                                       </div>
                                    </div>
                                    <p>Lorem ipsum Pellentesque efficitur leo a laoreet. Quis neque fringilla, in imperdiet sapien euismod.</p>
                                </div>
                            </div>
                            <!--reviews-->
                          </div>
								</div>
							</div>
							</div>
                      
                            <?php include('inc/footer.php'); ?> 
