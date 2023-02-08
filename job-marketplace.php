<?php $page = 'Job Marketplace';
include('inc/header.php'); 

$ads = $obj->GetServiceByAds();
$jobads = $obj->GetJobsByAds();
?>
<link rel="stylesheet" href="assets/css/job-marketplace.css">

            <!-------- ASIDE SEC START -------->
               <?php include('inc/sidebar.php'); ?>     
                    <!--first tab row start-->

      <div class="col-sm-12 instant-main">
                <div class="row" id="row_job">
                    <div class="middle_container">
                        <div id="myTabContent"> 

                             <div class="tab-pane fade show active" id="two" role="tabpanel" aria-labelledby="two-tab">
           
							<div class="head-mid ">
                                <h2>Job Marketplace</h2>
                            </div>
                            <div class="content_sec_service">
                            <div class=" mid-i-p">
                              <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                    <?php
                                    $i = 1;
                                    while($row = mysqli_fetch_array($jobads)){ 
                                    $userid = $row['user_id'];
                                    $userinfo = $obj->GetUserById($userid);
                                    
                                    ?>
                                    <div class="carousel-item <?php if($i == 1) { echo 'active';} else {} ?> p-20" style="background-image:url(admin/assets/img/services/<?=$row['photos'];?>);">
                                        <div class="d-flex first-profl">
                                            <div class="small-imgg">
                                               <img class="sm-img" src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($userinfo['ProfilePic'])) { echo 'admin/assets/img/profile/'.$userinfo['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>" alt="">
                                            <p class="pp cl-w2 mr-in"><?=$userinfo['ProfileName'];?></p> 
                                            </div>
                                              <div class="Sponsor">
                                           <?php  $user_id = $_SESSION['Userid']; 
                            					if($user_idd == $_SESSION['Userid']){	
                            				?>
                            				    <a class="spnsr-serv-pro" href="manage-post.php">Sponsored</a>  
                            					<?php } else {	?>
                            					<a href="create-service.php">Sponsored</a> 
                            	                <?php } ?>
                                            
                                        </div>
                                        </div>
                                      
                                         <p class="pp2 cl-w2 w-75"><?= substr($row['topic'], 0, 80);?></p>
                                    </div>
                                    <?php $i++; } ?>
                                     
  </div>                             
  </div> 
                            </div>
                            
                         <div id="livejobsearch"></div>
								<div id="searchjobdata"> </div>
                                <div id="jobdata">
								<?php while($row=mysqli_fetch_array($jobs)){ 
                                         $userid = $row['user_id'];
                                         $userinfo = $obj->GetUserById($userid);
                                          $text = $row['topic'];
                                         $topic = $obj->slugify($text);
                                         ?> 
                                          <div class="outer">
                                         <a href="job-details?job=<?=$topic;?>"></a>
                                            <div class="img-p">
                                    <div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$row['photos'];?>" alt="">
                                             </div>
                                     <div class="all-cnt">
                                         <div class="inner">
                                         <a href="user-view.php?viewuserid=<?=$userinfo['id'];?>">
                                        <div class="d-flex two-lb align-items-center job-listing-fl  ">
                                            <div class="title_img">
                                                <img class="sm-img" src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($userinfo['ProfilePic'])) { echo 'admin/assets/img/profile/'.$userinfo['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>" alt="">
                                                    <p class="pp mr-in"><?=$userinfo['ProfileName'];?></p> 
                                            </div>
                                         
                                        
                                            </div>
                                            </a>
                                        </div>
                                        <p class="pp2" alt="<?=$row['topic'];?>"><?php echo substr($row['topic'], 0, 80);?> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="star">
                                               <i class="fa-solid fa-star"></i>
                                                <small>New Member</small>
                                            </div>
                                            <div>
                                             <img class="cash-img" src="assets/img/cash.svg" >   
                                             <b style="color: #0dbd0d;"><?=$row['price'];?> <?=$row['price_type'];?></b>
                                            </div>
                                         </div>
                                    </div>
                                </div>
								        </div>
								<?php } ?>
								</div>
                             </div>
                             </div>
                        </div>
                        </div>
                        
                    <div class="plus-sign">
                      <a href="create-post"><i class="fa-solid fa-plus"></i></a>  
                    </div>
                 <?php include('inc/footer.php'); ?>
  <script>
  
      $(document).ready(function(){
        //   $(".dislike").hide();
        //   $(".dislike").css('display','none'); 
      });
      $(document).on('click','#like',function(e){
           
        var like = $(this).attr('data-id');
        var postid = $(this).attr('post-id');
        var userid = <?=$user_id;?>;
       $.ajax({    
        type: "GET",
        url: "admin/inc/process.php?like="+like+"&postid="+postid+"&userid="+userid,             
        dataType: "html",                  
        success: function(data){                    
              $(".dislike").html(data); 
         }
    });  
    
 
      
});
  
  
$(document).ready(function(){
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showLocation);
    }else{ 
        $('#location').html('Geolocation is not supported by this browser.');
    }
});

function showLocation(position){
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    $.ajax({
        type:'POST',
        url:'getLocation.php',
        data:'latitude='+latitude+'&longitude='+longitude,
        success:function(msg){
            if(msg){
               $("#location").html(msg);
            }else{
                $("#location").html('Not Available');
            }
        }
    });
}
</script>