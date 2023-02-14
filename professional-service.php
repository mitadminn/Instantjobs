<?php 
    $page = 'Service Provider';
    include('inc/header.php'); 
    // $service = str_replace('-','+', $_GET['service']);
    $val = $_GET['service'];
    $service =  $obj->myUrlEncode($val);
     
    $signle_service = $obj->GetServiceByName($service);
    $userid = $signle_service['user_id'];
    $postuser = $obj->GetUserById($userid);
     
    ?>
<?php include('inc/sidebar.php'); ?>     
<!--first tab row start-->
<div class="col-sm-12 instant-main">
<div class="row">
<div class="middle_container" id="myTabContent">
    <div class="p-3 tab-pane fade show active" id="one" role="tabpanel" aria-labelledby="one-tab">
        <div class="head-mid">
            <h2>Professional Services For Hire</h2>
        </div>
        <div>
            <!-- for image and content -->
        </div>
        <div class="mid-pro">
            <div class="profsnl-servc">
                <div class="big-img-pro">
                    <img class="pro-big-img" src="admin/assets/img/services/<?=$signle_service['photos'];?>" alt=""> 
                </div>
                <div class="scnd-bg-clr">
                    <div class="img-cir-prof">
                        <img class="sm-img-profsonal" src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($_SESSION['Userid'])) { echo 'admin/assets/img/profile/'.$postuser['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>" alt="">
                        <div class="dream-p-img">
                            <p class="pp mr-in title-name "><?php echo $postuser['ProfileName'];?></p>
                            <p class="dream-p-impro" ><img class="cir-img star-yllo" src="assets/img/star-svg.png" alt="">5.0 (32)</p>
                        </div>
                    </div>
                    <div class="myr">
                        <p class="jst-now"><?=$signle_service['price'];?> <?=$signle_service['price_type'];?></p>
                    </div>
                </div>
                <div class="third-sec-profsnl">
                    <div class="hd-para">
                        <div>
                            <h6><?=$signle_service['topic'];?> </h6>
                        </div>
                        <div>
                            <p> <?=$signle_service['description'];?></p>
                        </div>
                    </div>
                </div>
                <div>
                    <ul class="pro-ul">
                        <li>Delivery:<?=$signle_service['fast_complete'];?></li>
                        <li>Preferred Day:<?=$signle_service['prefer_day'];?></li>
                        <li>Preferred Time: </li>
                    </ul>
                </div>
                <div class="row user-info_row">
                    <div class="col-lg-8">
                        <div class="dream">
                            <?php //print_r($guser);?>
                            <?php if(!empty($postuser['ProfilePic'])) { ?>
                            <img  class="main-img profile-in_mid" src="admin/assets/img/profile/<?php echo $postuser['ProfilePic'];?>" alt="">
                            <?php } else { ?>
                            <img  class="main-img" src="assets/img/male-1.png" alt="">
                            <?php }?>
                            <div class="dream-star">
                                <h6> <?php   echo $postuser['ProfileName'];?></h6>
                                <h6><?php ?></h6>
                                <p> <img class="small-img-star " src="assets/img/star-svg.png" alt=""> New Member</p>
                                <?=$postuser['Country'];?></p>
                                <?php $datee = date_create($postuser['Created_at']); echo date_format($datee,"M Y"); ?></p>
                                <p>Level 3 Member </p>
                            </div>
                        </div>
                        <div class="users_all_info">
                            <div class="users_info_container">
                                <div class="">
                                    <table class="table_container">
                                        <tr class="table-row_top">
                                            <th><?=$postuser['Country'];?></th>
                                            <th><?php $datee = date_create($postuser['Created_at']); echo date_format($datee,"M Y"); ?></th>
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
                        <div  class="profile-mid_right_btns">
                            <div>
                                <a href="message"><button class="snd-msg">Send a message</button></a>
                            </div>
                            <div>
                                <a href="invite-for-interview"><button class="invt-job-intrvw">Invite for job interview</button></a>
                            </div>
                            <div>
                                <a href="invite-for-job-post"><button class="invite-jop-post">Invite to your job post</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!---->
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
                                    </div>
                                </div>
                                <p><?=$postuser['ProfileBio'];?></p>
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
                                        <!--<p><a href="profile-edit">Edit</a></p>-->
                                    </div>
                                </div>
                                <div class="row skill_hobbies_">
                                    <?php if(!empty($postuser['Skills'])) { ?>
                                    <p class="skills"> <?php echo str_replace(",","<p class='skills'>",$postuser['Skills']); ?> </p>
                                    <?php } else {echo 'Nothing added';}?>
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
                                    </div>
                                </div>
                                <div class="row skill_hobbies_">
                                    <?php if(!empty($postuser['Hobbies'])) { ?>
                                    <p class="skills"> <?php echo str_replace(",","<p class='skills'>",$postuser['Hobbies']); ?> </p>
                                    <?php } else { echo 'Nothing added';}?>
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
                                    </div>
                                </div>
                                <div class="bio-quali">
                                    <p><?=$postuser['Qualifications'];?>  <?=$postuser['Year'];?></p>
                                </div>
                            </div>
                        </div>
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
        <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
            <!--second job recruiter-->
        </div>
    </div>
    <div class="plus-sign">
        <a href="http://instantjobs.bluepearltech.com/create-service"><i class="fa-solid fa-plus"></i></a>  
    </div>
</div>
<?php include('inc/footer.php'); ?> 
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