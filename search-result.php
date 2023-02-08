<?php $page = 'Service Provider';
include('inc/header.php'); 

$ads = $obj->GetServiceByAds();
$jobads = $obj->GetJobsByAds();
$searchvalue = $_GET['Service'];
$searchjobs = $_GET['Jobs'];
// $searchIntrest = $_GET['Intrest'];
$searchSkills = $_GET['Skills'];
$searchInterest = $_GET['Interest'];
if(!empty($searchvalue)) {
$searchresult = $obj->SearchDataValues($searchvalue);
} elseif(!empty($searchjobs)) {
    $searchresult = $obj->SearchJobs($searchjobs);
}
$jobresult = $obj->SearchJobs($searchjobs);

$Intrestresult = $obj->SearchIntrest($searchInterest);
$Skillsresult = $obj->SearchSkills($searchSkills);

?>
<style>
    
    span.tag {
    background: #fff !important;
    border-radius: 5px;
    padding: 0 5px;
    font-size: 12px;
}
</style>
<link rel="stylesheet" href="assets/css/service-provider.css">
<!-------- ASIDE SEC START -------->
<?php include('inc/sidebar.php'); ?>
<!--first tab row start-->
<div class="col-sm-12 instant-main">
    <div class="row" id="row_main">
        <div class="middle_container">

            
            
            
             <div id="servicedata">
                    <?php 
                                while($row=mysqli_fetch_array($searchresult)){ 
                                    $userid = $row['user_id'];
                                    $postid = $row['id'];
                                    $userinfo = $obj->GetUserById($userid);
                                    $likedislike = $obj->GetLikeDislikeByUser($user_id, $postid);
                                     $text = $row['topic'];
                                         $topic = $obj->slugify($text);
                                 ?>
                                 <div class="head-mid people-paid d-flex align-items-center search_result_row">
                <h2>Search results:</h2>
                 
            <div class="row skill_hobbies_ search_results_topic">
                 <p class=""><?=$searchvalue;?><svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>close-circle</title><path fill="currentColor" d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" /></svg> </p>
                   </div>
            
            </div>
                    <div class="service_provider_contain" style="position:relative;">
                        <div class="likedislike">
                            <?php if($likedislike['status'] == 1) { ?>
                            <img class="heart-img " src="assets/img/hearts.png" id="dislike" alt="" data-id="2"
                                post-id="<?=$row['id'];?>" style="cursor:pointer;">

                            <?php } elseif($likedislike['status'] == 2) {   ?>
                            <img class="heart-img white_img_heart_wrap" src="assets/img/white-heart-1.png" alt="" id="updatelike"
                              data-id="1" post-id="<?=$row['id'];?>">
                            <?php } else { ?>
                            <img class="heart-img white_img_heart_wrap likehide" src="assets/img/white-heart-1.png" alt="" id="like"
                              data-id="1" post-id="<?=$row['id'];?>">
                            <?php }   ?>
                        </div>
                        <div class="outer">
                            <a class="name_topic" href="professional-service?service=<?=$topic;?>"></a>
                            <div class="img-p">
                                <div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$row['photos'];?>"
                                        alt=""></div>
                                <div class="all-cnt">
                                    <div class="inner">
                                        <a href="user-view.php?viewuserid=<?=$userinfo['id'];?>">
                                            <div class="d-flex two-lb align-items-center heart-img-head">
                                                <div class="img-heart-nm">
                                                    <img class="sm-img"
                                                        src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($userinfo['ProfilePic'])) { echo 'admin/assets/img/profile/'.$userinfo['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>"
                                                        alt="">
                                                    <p class="pp mr-in">
                                                        <?=$userinfo['ProfileName'];?>
                                                    </p>
                                                </div>
                                            </div>

                                        </a>
                                    </div>
                                    <p class="pp2" alt="<?=$row['topic'];?>">
                                        <?php echo substr($row['topic'], 0, 80);?>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                            <small>4.9 (108)</small>
                                        </div>

                                        <p><small>From </small> <b>
                                                <?=$row['price'];?>
                                                <?=$row['price_type'];?>
                                            </b> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
                </div>
                
                <?php if(!empty($searchSkills)){ ?>
                <div class="head-mid people-paid d-flex align-items-center search_result_row">
                <h2>Search results:</h2>
                <!--<form  method="post" style="display: contents;">-->
            <div class="row skill_hobbies_ search_results_topic">
                 <!--<p class=""><?//=$searchSkills;?><svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>close-circle</title><path fill="currentColor" d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" /></svg> </p>-->
                 <?php if(!empty($_GET['addskil'])) {?><p class=""><?=$_GET['addskil'];?><svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>close-circle</title><path fill="currentColor" d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" /></svg> </p><?php } ?>
                  <input type="hidden" name="searchskils" value="<?=$searchSkills;?>">
                  <input type="text" id="tag-input3" name="skills[]" placeholder="Enter more skills">
                    </div>
          
        <!--<button  onclick="showBar()"  id="edit_profile_wrap" type="button" class="btn profile-edit btn_profile_edit" data-toggle="modal" data-target="#exampleModalCenter" >Add</button>-->
           <!--<input id="search-input" name="addskils" id="tag-input1"/>-->
            <button type="submit" id="submitbtn">add</button>
            <!--</form>-->
            </div>
            
                <?php
                // echo $addskils = $_GET['addskil'];
                // if(!empty($addskils)) {
                    
                //     echo $searchskils = $_GET['Skills'];
                //     $Skillsresults =  $obj->SearchMoreSkills($searchskils, $addskils);
                //       foreach($Skillsresults as $skillss){ 
                //           $user_id = $skillss['Post_id'];
                //           $userdata = $obj->GetUsersById($user_id);
                //       print_r($userdata);  
                       
                //      }
                // } 
                
                foreach($Skillsresult as $skills){ 
                      $user_id = $skills['Post_id'];
                      $skills = $obj->GetSkillsByUserId($user_id);
                      $userdata = $obj->GetUsersById($user_id);
                 ?>
                      <div class="bg-white container_search">
                       <div class="d-flex search_detail_container">
                    <div class="dream">
                                   
                         <img class="img_search_container" src="admin/assets/img/profile/<?php echo $userdata['ProfilePic'];?>" alt="">
                   <div class="dream-star">
                    <h6> <?=$userdata['ProfileName'];?></h6>
             			<p> <svg class="star_wrap_svg" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>star</title><path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>4.9</p> 
                        <p><img class="batch_small_green" src="assets/img/rewardsmallimg.png" alt="">Level 1 Member </p>
                  </div>
                    </div>
                        <div class="users_all_info">
                            <div class="users_info_container">
                                <div class="">
                                    <table class="table_container">
                                      <tbody><tr class="table-row_top">
                                        <th><?=$userdata['Country'];?></th>
                                        <th>2k+</th>
                                      </tr>
                                      <tr class="table-row_users">
                                        <td>Country</td>
                                     <td>Earning USD</td>
                                      </tr>
                                      </tbody></table>
                                </div>
                            </div>
                        </div>
                        <div class="profile-mid_right_btns">
                            <div>
                            <a href="invite-for-interview"><button class="invt-job-intrvw">Invite for job interview</button></a>
                            </div>
                            <div>
                            <a href="invite-for-job-post"><button class="invite-jop-post">Invite to your job post</button></a>
                            </div>
                            </div>
                    </div>
                    <div class="topic_search_result">
                        <p><?=$userdata['ProfileBio'];?></p>
                    </div>
                    <div class="row skill_hobbies_">
                         <?php  foreach($skills as $skils){
                                    //print_r($skils['Skills']);?>
                                     
                                    <p class="skills"> <?php echo str_replace(",","<p class='skills'>",$skils['Skills']); ?> </p>
                                    <?php } ?>
                                    
                     <!--<p class="skills"> Engineer</p>-->
                     <!--<p class="skills">Add-Maths</p>-->
                     <!--<p class="skills">Loremipsum</p>-->
                     <!--<p class="skills">Professor</p>-->
                     <!--<p class="skills"> Engineer</p>-->
                     <!--<p class="skills">Add-Maths</p>-->
                     <!--<p class="skills">Loremipsum</p>-->
                    </div>
                      </div>
                <?php  } } else {}
                  ?>
                
                <?php if(!empty($searchInterest)){ ?>
                 <?php foreach($Intrestresult as $intrst){ 
                      $user_id = $intrst['user_id'];
                      $intrest = $obj->GetIntrestByUserId($user_id);
                      $userdata = $obj->GetUsersById($user_id);
                 ?>
                        <div class="bg-white container_search">
                       <div class="d-flex search_detail_container">
                    <div class="dream">
                                   
                         <img class="img_search_container" src="admin/assets/img/profile/<?php echo $userdata['ProfilePic'];?>" alt="">
                   <div class="dream-star">
                    <h6> <?=$userdata['ProfileName'];?></h6>
             			<p> <svg class="star_wrap_svg" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>star</title><path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>4.9</p> 
                        <p><img class="batch_small_green" src="assets/img/rewardsmallimg.png" alt="">Level 1 Member </p>
                  </div>
                    </div>
                        <div class="users_all_info">
                            <div class="users_info_container">
                                <div class="">
                                    <table class="table_container">
                                      <tbody><tr class="table-row_top">
                                        <th><?=$userdata['Country'];?></th>
                                        <th>2k+</th>
                                      </tr>
                                      <tr class="table-row_users">
                                        <td>Country</td>
                                     <td>Earning USD</td>
                                      </tr>
                                      </tbody></table>
                                </div>
                            </div>
                        </div>
                        <div class="profile-mid_right_btns">
                            <div>
                            <a href="invite-for-interview"><button class="invt-job-intrvw">Invite for job interview</button></a>
                            </div>
                            <div>
                            <a href="invite-for-job-post"><button class="invite-jop-post">Invite to your job post</button></a>
                            </div>
                            </div>
                    </div>
                    <div class="topic_search_result">
                        <p><?=$userdata['ProfileBio'];?></p>
                    </div>
                    <div class="row skill_hobbies_">
                        <?php foreach( $intrest as $intrests){ ?>
                             <p class="skills"> <?php echo str_replace(",","<p class='skills'>",$intrests['Interest']); ?> </p>
                        <?php } ?>
                       
                    </div>
                      </div>
                <?php  } } else {}
                  ?>
       
        </div>

        <?php include('inc/footer.php'); ?>


        <script>
  (function(){

    "use strict"

    
    // Plugin Constructor
    var TagsInputs = function(opts){
        this.options = Object.assign(TagsInputs.defaults , opts);
        this.init();
    }

    // Initialize the plugin
    TagsInputs.prototype.init = function(opts){
        this.options = opts ? Object.assign(this.options, opts) : this.options;

        if(this.initialized)
            this.destroy();
            
        if(!(this.orignal_input = document.getElementById(this.options.selector)) ){
            console.error("tags-input couldn't find an element with the specified ID");
            return this;
        }

        this.arr = [];
        this.wrapper = document.createElement('div');
        this.input = document.createElement('input');
        init(this);
        initEvents(this);

        this.initialized =  true;
        return this;
    }

    // Add Tags
    TagsInputs.prototype.addTag = function(string){

        if(this.anyErrors(string))
            return ;

        this.arr.push(string);
        var tagInput = this;

        var tag = document.createElement('span');
        tag.className = this.options.tagClass;
        tag.innerText = string;

        var closeIcon = document.createElement('a');
        closeIcon.innerHTML = '&times;';
        
        // delete the tag when icon is clicked
        closeIcon.addEventListener('click' , function(e){
            e.preventDefault();
            var tag = this.parentNode;

            for(var i =0 ;i < tagInput.wrapper.childNodes.length ; i++){
                if(tagInput.wrapper.childNodes[i] == tag)
                    tagInput.deleteTag(tag , i);
            }
        })


        tag.appendChild(closeIcon);
        this.wrapper.insertBefore(tag , this.input);
        this.orignal_input.value = this.arr.join(',');

        return this;
    }

    // Delete Tags
    TagsInputs.prototype.deleteTag = function(tag , i){
        tag.remove();
        this.arr.splice( i , 1);
        this.orignal_input.value =  this.arr.join(',');
        return this;
    }

    // Make sure input string have no error with the plugin
    TagsInputs.prototype.anyErrors = function(string){
        if( this.options.max != null && this.arr.length >= this.options.max ){
            console.log('max tags limit reached');
            return true;
        }
        
        if(!this.options.duplicate && this.arr.indexOf(string) != -1 ){
            console.log('duplicate found " '+string+' " ')
            return true;
        }

        return false;
    }

    // Add tags programmatically 
    TagsInputs.prototype.addData = function(array){
        var plugin = this;
        
        array.forEach(function(string){
            plugin.addTag(string);
        })
        return this;
    }

    // Get the Input String
    TagsInputs.prototype.getInputString = function(){
        return this.arr.join(',');
    }


    // destroy the plugin
    TagsInputs.prototype.destroy = function(){
        this.orignal_input.removeAttribute('hidden');

        delete this.orignal_input;
        var self = this;
        
        Object.keys(this).forEach(function(key){
            if(self[key] instanceof HTMLElement)
                self[key].remove();
            
            if(key != 'options')
                delete self[key];
        });

        this.initialized = false;
    }

    // Private function to initialize the tag input plugin
    function init(tags){
        tags.wrapper.append(tags.input);
        tags.wrapper.classList.add(tags.options.wrapperClass);
        tags.orignal_input.setAttribute('hidden' , 'true');
        tags.orignal_input.parentNode.insertBefore(tags.wrapper , tags.orignal_input);
    }

    // initialize the Events
    function initEvents(tags){
        tags.wrapper.addEventListener('click' ,function(){
            tags.input.focus();           
        });
        

        tags.input.addEventListener('keydown' , function(e){
            var str = tags.input.value.trim(); 

            if( !!(~[9 , 13 , 188].indexOf( e.keyCode ))  )
            {
                e.preventDefault();
                tags.input.value = "";
                if(str != "")
                    tags.addTag(str);
            }

        });
    }


    // Set All the Default Values
    TagsInputs.defaults = {
        selector : '',
        wrapperClass : 'tags-input-wrapper',
        tagClass : 'tag',
        max : null,
        duplicate: false
    }

    window.TagsInputs = TagsInputs;

})();

        var TagsInputs3 = new TagsInputs({ 
            selector: 'tag-input3',
            duplicate : false,
            max : 10
        });
        
        TagsInputs3.addData(['<?=$_GET['Skills'];?>'])
         
         
    
       
                    
             
            $(document).on('click', '#like', function (e) {
                var like = $(this).attr('data-id');
                var postid = $(this).attr('post-id');
                var userid = <?= $user_id;?>;
                $.ajax({
                    type: "GET",
                    url: "admin/inc/process.php?like=" + like + "&postid=" + postid + "&userid=" + userid,
                    dataType: "html",
                    success: function (data) {
                        location.reload();
                    }
                });



            });

             
            $(document).on('click', '#dislike', function (e) {
                var dislike = $(this).attr('data-id');
                var postid = $(this).attr('post-id');
                var userid = <?= $user_id;?>;
                $.ajax({
                    type: "GET",
                    url: "admin/inc/process.php?dislike=" + dislike + "&postid=" + postid + "&userid=" + userid,
                    dataType: "html",
                    success: function (data) {
                        location.reload();
                    }
                });
            });

             
            $(document).on('click', '#updatelike', function (e) {
                var updatelike = $(this).attr('data-id');
                var postid = $(this).attr('post-id');
                var userid = <?= $user_id;?>;
                $.ajax({
                    type: "GET",
                    url: "admin/inc/process.php?updatelike=" + updatelike + "&postid=" + postid + "&userid=" + userid,
                    dataType: "html",
                    success: function (data) {
                        location.reload();
                    }
                });
            });




            $(document).ready(function () {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showLocation);
                } else {
                    $('#location').html('Geolocation is not supported by this browser.');
                }
            }); 

            function showLocation(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                $.ajax({
                    type: 'POST',
                    url: 'getLocation.php',
                    data: 'latitude=' + latitude + '&longitude=' + longitude,
                    success: function (msg) {
                        if (msg) {
                            $("#location").html(msg);
                        } else {
                            $("#location").html('Not Available');
                        }
                    }
                });
            }
        

 
function showBar() {
    let slideSearch = document.getElementById("search-input");
  slideSearch.style.display = "block";
  document.getElementById("edit_profile_wrap").style.display = "none";
  document.getElementById("submitbtn").style.display = "block";

}
            
        </script>
        
        