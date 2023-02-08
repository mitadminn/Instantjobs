<?php 
$page = 'Profile';
include('inc/header.php'); 

$portfolio = $obj->GetPortfolioByUserId($user_id);

?>
<link rel="stylesheet" href="assets/css/invite-for-interview.css">
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
                                      <?php include('user-information.php'); ?>   
                             <div class="row">
								<div class="col-lg-12">
								<div class="interview_section">
								    <h3>Invite for job inteview</h3>
								    <p>Invite a potential candidate to learn about a job apportunity with your company. This is a one time opportunity 
								    to  pitch your job  offer ans start a conversation with the candidate.
								    </p>
								</div>
                <div class="dream interview_dream">
            <?php //p?>
           
                <?php if(!empty($_SESSION['user_image'])) { ?>
                         <img class="main-img" src="<?php echo $_SESSION['user_image'];?>" alt="">
                    <?php } elseif(!empty($user_information['ProfilePic'])) { ?>
                         <img  class="main-img profile-in_mid" src="admin/assets/img/profile/<?php echo $user_information['ProfilePic'];?>" alt="">
                    <?php } else { ?>
                    <img  class="main-img" src="assets/img/male-1.png" alt="">
                    <?php }?>
                <div class="dream-star">
                    <h6> <?php if(!empty($guser['ProfileName'])) { echo $guser['ProfileName']; } elseif(!empty($_SESSION['Userid'])) { echo $user_information['ProfileName']; } else {}?></h6>
 						<p> <img class="small-img-star " src="assets/img/star-svg.png" alt=""> New Member</p> 
                       
                        <!--<p>Member Since: <?php $datee = date_create($user_information['Created_at']); echo date_format($datee,"M Y"); ?></p>-->
                        <p>Level 3 Member </p>
                </div>
        </div>
        <div class="message_text_area">
            <img  class="main-img profile-in_mid" src="assets/img/male-1.png" alt="">
            <div>
              <textarea class="" name="topic" rows="6" cols="67" placeholder="Write message" id="textbox" onkeyup="charcount(this.value)" maxlength="1000"></textarea>
                <div class="count_msg">
                    <p>Note:You can only send this invite and message once </p>
                    <div>
                    <span style="color: #495057;" id=charcount>0</span>
                    <span style="color: #495057;" id=charcount>/ 1000</span>
                    </div>
                </div>
             </div>
            </div>
        </div>
					  </div>
		<div class="btn_snd_cancel">
           <a class="anc_cancel" href="">cancel</a>
           <a href=""><button class="send_btn">Send</button></a>
        </div>
					  </div>
                      </div>
                      </div>
                      </div>
                      </div>
                      </div>
                      <script>
    // topic script
function charcount(str) {
	var lng = str.length ;
	document.getElementById("charcount").innerHTML = lng;
}
</script>
                            <?php include('inc/footer.php'); ?> 
       