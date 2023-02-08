<?php 

//   ini_set('display_errors', 1);
//   ini_set('display_startup_errors', 1);
//   error_reporting(E_ALL);
ob_start();
session_start();
include('function.php');
$users = new Instantjobs();
$con = mysqli_connect(DbHost, DbUser, DbPass, DbName) or die('Could not connect:' . mysqli_connect_error());
/* Login */ 

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'Signin') { 
    extract($_REQUEST);
     
    $data = $users->UserLogin($email, $password);
 	$userinfo = $users->CheckUserByEmail($email);
   
 	if($data): 
         header('location:../../service-provider');
    elseif($userinfo['Status'] == 0):
        header('location:../../signin?msg=notactive');
     else:
        header('location:../../signin?msg=fail');
    endif;
    
} 
   
//   Admin Login
   if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'AdminSignin') {
    extract($_REQUEST);
     
    $data = $users->AdminLogin($username, $password);
   
 	if($data): 
         header('location:../dashboard?msg=suc');
     else:
        header('location:../index');
    endif;
    
} 
   
 elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'SignUpUser') {
    extract($_REQUEST);
      $EmailValidation = $users->CheckUserByEmail($email);
     if($EmailValidation['Email'] == $email) {
         
         header('location:../../signin?msg=already');
         
        // echo 'This Email already Used, Please try to login';
        } else {
     function generateRandomString($length = 6) {
    $characters = '0123456789';
    $charactersLength = strlen($characters); 
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
     
 $activationcode = generateRandomString();
 $data = $users->Signup($email, $password,$activationcode,$refertokken);
   
  if ($data):
        
       $subject = "Please verify your email address";
$to = $email;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From:info@instantjobs.com'. "\r\n";
$message .= 'Welcome  <b>'. $firstname. ' '.$lastname.'</b><br>'. "\r\n";
$message .= 'Thanking you for joining us. '. "\r\n\r\n\r\n";
$message .= 'Your 6 digit OTP is '.$activationcode."\r\n";
$mailto = mail($to,$subject,$message,$headers);
$val = $email;
$emails = $users->myUrlEncode($val);
         header('location:../../email-confirm?email='.$emails);
     else:
         header('location:../../signin?msg=fail');
    endif; 
    
    
  }  
     
     
 }
 
 elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'EditProfile') {
    extract($_REQUEST);
       if (isset($_FILES['profilepic'])) {
        $file_name = $_FILES['profilepic']['name'];
        $file_size = $_FILES['profilepic']['size'];
        $file_tmp = $_FILES['profilepic']['tmp_name'];
        $file_type = $_FILES['profilepic']['type'];
           $desired_dir1 = "../assets/img/profile";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $profilepic= $_FILES['profilepic']['name'];
		     $profilepic = $_FILES['profilepic']['name'];
		   if (!empty($profilepic)) {
             $profilepic = $_FILES['profilepic']['name'];
        } else {
              $profilepic = $profilepic2;
        }	
 }
 
 
 
 

   
 
   $data = $users->EditProfiles($id,$bio,$qualification,$firstname,$email,$year,$profilepic, $phone, $skills, $hobbies);
 
 
 if($data): 
         header('location:../../profile');
     else:
        header('location:../../service-provider');
    endif;
    
} 

elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'Skills') {
     extract($_REQUEST);
  $skil = explode(",",$skills[0]);
  $intrst = explode(",",$intrest[0]);
  
    $users->DeleteSkills($userid);
    $users->DeleteInterest($userid);
  foreach($skil as $skillsval) {
      $sk= $users->AddSkills($userid, $skillsval);
  }
  
  foreach($intrst as $intrests) {
      $intrst = $users->AddIntrest($userid, $intrests);
  }
  
  
  
//   $hb = $users->AddSkills($userid,$intrest);
if($data): 
         header('location:../../profile');
     else:
        header('location:../../profile');
    endif;
 }


elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'MoreSkills') {
    extract($_REQUEST);
    $data = $users->SearchMoreSkills($searchskils, $addskils);
    if($data): 
         header('location:../../search-result?Skills='.$searchskils.'&&addskil='.$addskils);
     else:
        header('location:../../search-result');
    endif;
 
}

 elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'EditPortfolio') {
    extract($_REQUEST);
    
      
   
   foreach($_FILES['portfolio']['name'] as $key=>$val){
   
     if (isset($_FILES['portfolio'])) {
         
        $file_name = $_FILES['portfolio']['name'][$key];
        $file_size = $_FILES['portfolio']['size'][$key];
        $file_tmp = $_FILES['portfolio']['tmp_name'][$key];
        $file_type = $_FILES['portfolio']['type'][$key];
           $desired_dir1 = "../assets/img/portfolio";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
            $portfolio = $_FILES['portfolio']['name'][$key];
		    $data = $users->Portfolio($id, $portfolio);
 }
  
 }
  
 	if($data): 
         header('location:../../profile');
     else:
        header('location:../../service-provider');
    endif;
    
} 


 elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'ConfirmEmail') {
    extract($_REQUEST);
    $val = $email;
    $emails = $users->myUrlEncode($val);
     $data = $users->ConfirmEmail($emailotp, $emails); 
  	$userinfo = $users->CheckUserByEmail($emails);

  	if($userinfo['Status'] == 1): 
  	    $_SESSION['Userid'] = $userinfo['id'];
  	      $_SESSION['Email'] = $userinfo['Email'];
  	      $password = $userinfo['Password'];
  	      $users->UserLogin($emails, $password);
        // echo 'OTP confirmed Successfully';
         header('location:../../profile-info');
     else:
        // echo 'Something wrong Please check OTP';
        header('location:../../email-confirm?email='.$emails.'&msg=error');
    endif;
    
} 
 
/* Logout */ 
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'Userlogout') {
     session_start(); 
    session_unset();
    session_destroy();
    header("location:../../service-provider.php");
}

/* Admin Logout */ 
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'AdminLogout') {
    session_start(); 
    session_unset();
    session_destroy();
    header("location:../index.php");
}

elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'ProfileInfo') {
    extract($_REQUEST);
     if (isset($_FILES['govtid'])) {
        $file_name = $_FILES['govtid']['name'];
        $file_size = $_FILES['govtid']['size'];
        $file_tmp = $_FILES['govtid']['tmp_name'];
        $file_type = $_FILES['govtid']['type'];
           $desired_dir1 = "../assets/img/govtid";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $govtid = $_FILES['govtid']['name'];
		    
 }
    $skillss = implode(',',$skills);
    // $hobbie = implode(',',$hobbies);
  
    $data = $users->ProfileInfo($id,$name,$country, $skillss, $langauge);
    $data = $users->VerifyDetails($id, $govtid, $fullname, $icnumber, $date, $countrry);
  
 	if($data): 
         header('location:../../profile');
     else:
        header('location:../../signin');
    endif;
    
} 

elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'CreateService') {
    extract($_REQUEST);
    
      if (isset($_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
           $desired_dir1 = "../assets/img/services";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $image = $_FILES['image']['name'];
		    
 }
 
 foreach($field_name as $index => $value) {
      $val = $field_name[$index];
       $vals = $field_price[$index];
     $adonss = $users->Addons($id, $val, $vals, $topic);
}

    
    $data = $users->CreateService($id, $topic, $description, $price, $currency, $area, $how_fast, $preferedday, $image, $ads);
    // $data = $users->ProfileInfo($id, $name, $country, $skills,$govtid, $fullname, $icnumber, $date, $countrry);
 
 	if($data): 
         header('location:../../service-provider');
     else:
        header('location:../../service-provider');
    endif;
    
}


elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'CreateJob') {
    extract($_REQUEST);
    
      if (isset($_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
           $desired_dir1 = "../assets/img/services";
         move_uploaded_file($file_tmp, "$desired_dir1/" . $file_name);
          $image = $_FILES['image']['name'];
		    
 }
  
     
    $data = $users->CreateJob($id, $topic, $description, $price, $currency, $area, $how_fast, $image, $location, $ads);
    // $data = $users->ProfileInfo($id, $name, $country, $skills,$govtid, $fullname, $icnumber, $date, $countrry);
 
 	if($data): 
         header('location:../../service-provider');
     else:
        header('location:../../service-provider');
    endif;
    
} 

 


elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'BankDetails') {
    extract($_REQUEST);
  
    $data = $users->BankDetails($id, $bankname, $account_no, $country);
     
 	if($data): 
         header('location:../../profile');
     else:
        header('location:../../profile');
    endif;
    
} 

elseif (isset($_REQUEST['deleteaccount'])) {
    extract($_REQUEST);
  $id = $deleteaccount;
    $data = $users->DeleteBankDetail($id);
     
 	if($data): 
         header('location:../../profile');
     else:
        header('location:../../profile');
    endif;
    
} 


	/* Un active  */
 elseif (isset($_REQUEST['Approved'])) { 
    extract($_REQUEST);
	 $id = $Approved;
	  $data = $users->Approve($id);

    if ($data):
        header('location:../professional-service.php?msg=reject');
    else:
        header('location:../professional-service.php?msg=fail');
    endif;
}
	
	/* Active  */
 elseif (isset($_REQUEST['Rejected'])) {
    extract($_REQUEST);
	 $id = $Rejected;
	  $data = $users->Reject($id);

    if ($data):
        header('location:../professional-service.php?msg=approve');
    else:
        header('location:../professional-service.php?msg=fail');
    endif;
}

 /* Un active Job */
 elseif (isset($_REQUEST['jobactive'])) { 
    extract($_REQUEST);
	 $id = $jobactive;
	  $data = $users->ApprovedJob($id);

    if ($data):
        header('location:../job-posting.php?msg=reject');
    else:
        header('location:../job-posting.php?msg=fail');
    endif;
}
	
	/* Active JOb */
 elseif (isset($_REQUEST['jobreject'])) {
    extract($_REQUEST);
	 $id = $jobreject;
	  $data = $users->RejectedJob($id);

    if ($data):
        header('location:../job-posting.php?msg=approve');
    else:
        header('location:../job-posting.php?msg=fail');
    endif;
}

	/*  Block all Users  */
 elseif (isset($_REQUEST['UserBlock'])) {
    extract($_REQUEST);
	 $id = $UserBlock;
	  $data = $users->UserBlock($id);

    if ($data):
        header('location:../allusers.php?msg=suc');
    else:
        header('location:../index.php?msg=fail');
    endif;
	}
	
	/* UnBlock all Users  */
 elseif (isset($_REQUEST['UserUnblock'])) {
    extract($_REQUEST);
	 $id = $UserUnblock;
	  $data = $users->UserUnblock($id);

    if ($data):
        header('location:../allusers.php?msg=suc');
    else:
        header('location:../index.php?msg=fail');
    endif;
	}
	
 
 elseif (isset($_REQUEST['filter1'])) {
    extract($_REQUEST);
	  $area = $filter1;
	  $areadata = $users->GetServiceDataByArea($area);
      foreach($areadata as $dataarea){ 
       $userid = $dataarea['user_id'];
       $postid = $dataarea['id'];
       $userinfo = $users->GetUserById($userid);
       $likedislike = $users->GetLikeDislikeByUser($userid, $postid);
       $val = $dataarea['topic'];
    //   $topic = $users->myUrlEncode($val);
    $topic = $users->slugify($val);
        ?>
       <div class="outer">
            <a href="professional-service?service=<?=$topic;?>"></a>
                                    <div class="img-p">
                                        <div class="hh-1">
                                            <img class="hhh" src="admin/assets/img/services/<?=$dataarea['photos'];?>" alt="">
                                        </div>
                                    <div class="all-cnt">
                                         <div class="inner">
                                         <a href="user-view.php?viewuserid=<?=$userinfo['id'];?>">
                                        <div class="d-flex two-lb align-items-center heart-img-head">
                                            <div class="img-heart-nm">
                                               <img class="sm-img" src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($userinfo['ProfilePic'])) { echo 'admin/assets/img/profile/'.$userinfo['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>" alt="">
                                               <p class="pp mr-in "> <?=$userinfo['ProfileName'];?></p>   
                                            </div>
                                             
                                        </div>
                                        </a>
                                        </div>
                                             
                                             <p class="pp2" alt="<?=$dataarea['topic'];?>"><?php echo substr($dataarea['topic'], 0, 80);?> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="star">
                                                <!--<img src="assets/img/star.svg" alt="">-->
                                               <i class="fa-solid fa-star"></i>
                                                <small>4.9 (108)</small>
                                            </div>
                                             <p><small>From </small> <b><?=$dataarea['price'];?> <?=$dataarea['price_type'];?></b> </p>
                                        </div>
                                    </div>
                                   
                                    
                                </div>
                                
                                </div>
            
            
        <?php }
 
	}
		/* Job Filter  */
 elseif (isset($_REQUEST['jobfilter'])) {
    extract($_REQUEST);
	  $area = $jobfilter;
	  $areadata = $users->GetJobDataByArea($area);
      foreach($areadata as $dataarea){ 
      $userid = $dataarea['user_id'];
      $userinfo = $users->GetUserById($userid);
      $val = $dataarea['topic'];
    //   $topic = $users->myUrlEncode($val);
    $topic = $users->slugify($val);
        ?>
        <div class="outer">
            <a href="job-details?job=<?=$topic;?>">
                                            <div class="img-p">
                                    <div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$dataarea['photos'];?>" alt="">
                                             </div>
                                     <div class="all-cnt">
                                          <div class="inner">
                                         <a href="user-view.php?viewuserid=<?=$userinfo['id'];?>">
                                        <div class="d-flex two-lb align-items-center  job-listing-fl  ">
                                            <div class="title_img">
                                                <img class="sm-img" src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($userinfo['ProfilePic'])) { echo 'admin/assets/img/profile/'.$userinfo['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>" alt="">
                                                    <p class="pp mr-in "><?=$userinfo['ProfileName'];?></p> 
                                            </div>
                                         
                                            </div>
                                            </a>
                                        </div>
                                        <p class="pp2"><?=$dataarea['topic'];?> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="star">
                                               <i class="fa-solid fa-star"></i>
                                                <small>New Member</small>
                                            </div>
                                            <div>
                                             <img class="cash-img" src="assets/img/cash.svg" >   
                                             <b><?=$dataarea['price'];?> <?=$dataarea['price_type'];?></b>
                                            </div>
                                         </div>
                                    </div>
                                </div>
								        </div>
            
        <?php }
 
	}
	/* Lastes Service Filter */
	elseif (isset($_REQUEST['filter2'])) {
    extract($_REQUEST); 
	  $filter2val = $filter2;
	  $areadata = $users->GetLatestService();
      foreach($areadata as $dataarea){ 
      $userid = $dataarea['user_id'];
       $postid = $dataarea['id'];
      $userinfo = $users->GetUserById($userid);
       
      $likedislike = $users->GetLikeDislikeByUser($userid, $postid);
      $val = $dataarea['topic'];
    //   $topic = $users->myUrlEncode($val);
    $topic = $users->slugify($val);
        ?>
            <div class="outer">
            <a href="professional-service?service=<?=$topic;?>">
                                    <div class="img-p">
                                        <div class="hh-1">
                                            <img class="hhh" src="admin/assets/img/services/<?=$dataarea['photos'];?>" alt="">
                                        </div>
                                    <div class="all-cnt">
                                         <div class="inner">
                                         <a href="user-view.php?viewuserid=<?=$userinfo['id'];?>">
                                        <div class="d-flex two-lb align-items-center heart-img-head">
                                            <div class="img-heart-nm">
                                               <img class="sm-img" src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($userinfo['ProfilePic'])) { echo 'admin/assets/img/profile/'.$userinfo['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>" alt="">
                                               <p class="pp mr-in "> <?=$userinfo['ProfileName'];?></p>   
                                            </div>
                                           
                                        </div>
                                        </a>
                                        </div>
                                            <p class="pp2" alt="<?=$dataarea['topic'];?>"><?php echo substr($dataarea['topic'], 0, 80);?> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="star">
                                                <!--<img src="assets/img/star.svg" alt="">-->
                                               <i class="fa-solid fa-star"></i>
                                                <small>4.9 (108)</small>
                                            </div>
                                             <p><small>From </small> <b><?=$dataarea['price'];?> <?=$dataarea['price_type'];?></b> </p>
                                        </div>
                                    </div>
                                   
                                    
                                </div>
                                
                                </div>
            
            
        <?php }
 
	}
 
 
 /* Lastes Job Filter */
	elseif (isset($_REQUEST['filter3'])) {
    extract($_REQUEST);
	  $filter2val = $filter3;
	  $areadata = $users->GetLatestJobs();
      foreach($areadata as $dataarea){ 
      $userid = $dataarea['user_id'];
      $userinfo = $users->GetUserById($userid);
      $val = $dataarea['topic'];
      $topic = $users->slugify($val);
    //   $topic = $users->myUrlEncode($val);
        ?>
        <div class="outer">
           <a href="job-details?job=<?=$topic;?>"></a>
                                            <div class="img-p">
                                    <div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$dataarea['photos'];?>" alt="">
                                             </div>
                                     <div class="all-cnt">
                                          <div class="inner">
                                         <a href="user-view.php?viewuserid=<?=$userinfo['id'];?>">
                                        <div class="d-flex two-lb align-items-center  job-listing-fl  ">
                                            <div class="title_img">
                                                <img class="sm-img" src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($userinfo['ProfilePic'])) { echo 'admin/assets/img/profile/'.$userinfo['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>" alt="">
                                                    <p class="pp mr-in "><?=$userinfo['ProfileName'];?></p> 
                                            </div>
                                         
                                        </div>
                                        </a>
                                        </div>
                                        <p class="pp2"><?=$dataarea['topic'];?> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="star">
                                               <i class="fa-solid fa-star"></i>
                                                <small>New Member</small>
                                            </div>
                                            <div>
                                             <img class="cash-img" src="assets/img/cash.svg" >   
                                             <b><?=$dataarea['price'];?> <?=$dataarea['price_type'];?></b>
                                            </div>
                                         </div>
                                    </div>
                                </div>
								        </div>
            
            
        <?php }
 
	}
	
	
	elseif (isset($_REQUEST['autosearch'])) {
            extract($_REQUEST);
    
    $SearchData = array();
    $areadata = $users->SearchData($searchservice);
    $SearchData = $areadata['Topic'];
     
    
    echo json_encode($SearchData);
    
// if($query->num_rows > 0){ 
//     while($row = $query->fetch_assoc()){ 
//         $data['id'] = $row['id']; 
//         $data['value'] = $row['name']; 
//         array_push($skillData, $data); 
//     } 
// } 
 
// Return results as json encoded array 
 


	}
		/*   Service Search  */
	elseif (isset($_REQUEST['searchservice'])) {
    extract($_REQUEST);
	  $searchservice = $searchservice;
	  $areadata = $users->GetServiceSearch($searchservice);
      foreach($areadata as $dataarea){ 
      $userid = $dataarea['user_id'];
      $postid = $dataarea['id'];
      $userinfo = $users->GetUserById($userid);
      $likedislike = $users->GetLikeDislikeByUser($userid, $postid);
      $val = $dataarea['topic'];
    //   $topic = $users->myUrlEncode($val);
    $topic = $users->slugify($val);
        ?>
        <div class="outer">
            <a href="professional-service?service=<?=$topic;?>"></a>
                                    <div class="img-p">
                                        <div class="hh-1">
                                            <img class="hhh" src="admin/assets/img/services/<?=$dataarea['photos'];?>" alt="">
                                        </div>
                                    <div class="all-cnt">
                                        <div class="inner">
                                         <a href="user-view.php?viewuserid=<?=$userinfo['id'];?>">
                                        <div class="d-flex two-lb align-items-center heart-img-head">
                                            <div class="img-heart-nm">
                                               <img class="sm-img" src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($userinfo['ProfilePic'])) { echo 'admin/assets/img/profile/'.$userinfo['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>" alt="">
                                               <p class="pp mr-in "> <?=$userinfo['ProfileName'];?></p>   
                                            </div>
                                            
                                        </div>
                                         </a>
                                        </div>
                                              <p class="pp2" alt="<?=$dataarea['topic'];?>"><?php echo substr($dataarea['topic'], 0, 80);?> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="star">
                                                <!--<img src="assets/img/star.svg" alt="">-->
                                               <i class="fa-solid fa-star"></i>
                                                <small>4.9 (108)</small>
                                            </div>
                                             <p><small>From </small> <b><?=$dataarea['price'];?> <?=$dataarea['price_type'];?></b> </p>
                                        </div>
                                    </div>
                                  </div>
                                  </div>
            
            
        <?php }
 
	}
 
 	/*   Job Search  */
	elseif (isset($_REQUEST['searchjob'])) {
    extract($_REQUEST);
	  $searchjob = $searchjob;
	  $areadata = $users->GetJobSearch($searchjob);
      foreach($areadata as $dataarea){ 
      $userid = $dataarea['user_id'];
      $userinfo = $users->GetUserById($userid);
      $val = $dataarea['topic'];
    //   $topic = $users->myUrlEncode($val);
    $topic = $users->slugify($val);
        ?>
         <div class="outer">
            <a href="job-details?job=<?=$topic;?>"></a>
                                            <div class="img-p">
                                    <div class="hh-1"><img class="hhh" src="admin/assets/img/services/<?=$dataarea['photos'];?>" alt="">
                                             </div>
                                     <div class="all-cnt">
                                         <div class="inner">
                                         <a href="user-view.php?viewuserid=<?=$userinfo['id'];?>">
                                        <div class="d-flex two-lb align-items-center  job-listing-fl  ">
                                            <div class="title_img">
                                                <img class="sm-img" src="<?php if(!empty($data['picture'])) { echo $_SESSION['user_image']; } elseif(!empty($userinfo['ProfilePic'])) { echo 'admin/assets/img/profile/'.$userinfo['ProfilePic']; }  else { echo 'assets/img/dcc2ccd9.avif'; } ?>" alt="">
                                                    <p class="pp mr-in "><?=$userinfo['ProfileName'];?></p> 
                                            </div>
                                         <div>
                                         
                                            </div>
                                        </div>
                                        </a>
                                        </div>
                                        <p class="pp2"><?=$dataarea['topic'];?> </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="star">
                                               <i class="fa-solid fa-star"></i>
                                                <small>New Member</small>
                                            </div>
                                            <div>
                                             <img class="cash-img" src="assets/img/cash.svg" >   
                                             <b><?=$dataarea['price'];?> <?=$dataarea['price_type'];?></b>
                                            </div>
                                         </div>
                                    </div>
                                </div>
				 </div>
            
        <?php }
 
	}
 
 
 
 	/*   Job Search  */
	elseif (isset($_REQUEST['searchskill'])) {
    extract($_REQUEST);
	  $searchskill = $searchskill;
	  $areadata = $users->GetSkillsSearch($searchskill);
	  
	  ?>
	  
	   <!-------------------------------------search bar new------------------------------------------->
                            <div class="result_check_search search_bar_new">
                                <div class="">
                                    <h2>Search results:</h2>
                                </div>
                                <div class="result_check_search">
                                    <p><?=$searchskill;?><svg class="cross_svg" style="width:18px;height:18px" viewBox="0 0 24 24">
                                  <path fill="currentColor" d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" />
                                  </svg></p>
                                     
                                </div>
                                <a href="#" class="add_in_search">Add</a>
                            </div>
	  <?php
      foreach($areadata as $dataarea){
        //   print_r($dataarea);
      $userid = $dataarea['user_id'];
    //   $userinfo = $users->GetUserById($userid);
       
        ?>
        
            <a href="user-view.php?viewuserid=<?=$dataarea['id'];?>">
                
                   
                            
                            <div class="dream new_one_dream">
                        <!--<img  class="main-img" src="" alt="">-->
                              <img class="main-img profile-in_mid" src="admin/assets/img/profile/<?php echo $dataarea['ProfilePic'];?>" alt="">
                       <div class="dream-star">
                    <h6> <?=$dataarea['ProfileName'];?></h6>
                    <h6></h6>
 						<p> <img class="small-img-star " src="assets/img/star-svg.png" alt=""> New Member</p> 
                        <!--<p>From: IN</p>-->
                        <!--<p>Member Since: Oct 2022</p>-->
                        <p>Level 3 Member </p>
                        <!--<p>Total Earning: </p> -->
                </div>
                <div class="dream-star_skills">
                    <h5>Skills</h5>
                    <div class="list_of_search">
                   <?php if(!empty($dataarea['Skills'])) { ?>
                                    <p class="skills"> <?php echo str_replace(",","<p class='skills'>",$dataarea['Skills']); ?> </p>
                                    <?php } else {echo 'Nothing added yet';}?>
                    </div>
                </div>
        </div>
                
                
                
                
                
                
                                <!--            <div class="img-p"> -->
                                <!--    <div class="hh-1"><img class="hhh" src="admin/assets/img/profile/<?php// echo $dataarea['ProfilePic'];?>" alt="">-->
                                <!--             </div>-->
                                <!--     <div class="all-cnt">-->
                                <!--        <div class="d-flex two-lb align-items-center  job-listing-fl  ">-->
                                <!--            <div class="title_img">-->
                                <!--                     <p class="pp mr-in "><?//=$dataarea['ProfileName'];?></p> -->
                                <!--            </div>-->
                                <!--         <div>-->
                                            <!--<div class="clock-time">-->
                                            <!--    <i class="fa-regular fa-clock"></i>-->
                                            <!--    <p>72h 42s left</p>-->
                                            <!--</div>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--         <div class="d-flex justify-content-between align-items-center">-->
                                           
                                <!--         </div>-->
                                <!--    </div>-->
                                <!--</div>-->
				</a>
            
        <?php }
 
	}
	
	
 
 	/* Un  Service Ads active  */
 elseif (isset($_REQUEST['adsApproved'])) { 
    extract($_REQUEST);
	 $id = $adsApproved;
	  $data = $users->AdsApprove($id);

    if ($data):
        header('location:../professional-service.php?msg=reject');
    else:
        header('location:../professional-service.php?msg=fail');
    endif;
}
	
	/* Service Ads Active  */
 elseif (isset($_REQUEST['adsRejected'])) {
    extract($_REQUEST);
	 $id = $adsRejected;
	  $data = $users->AdsReject($id);

    if ($data):
        header('location:../professional-service.php?msg=approve');
    else:
        header('location:../professional-service.php?msg=fail');
    endif;
}


/*   Job Ads UnActive  */
 elseif (isset($_REQUEST['JobadsApproved'])) { 
    extract($_REQUEST);
	 $id = $JobadsApproved;
	  $data = $users->JobAdsApprove($id);

    if ($data):
        header('location:../job-posting.php?msg=reject');
    else:
        header('location:../job-posting.php?msg=fail');
    endif;
}
	
	/* JObs Ads Active  */
 elseif (isset($_REQUEST['JobadsRejected'])) {
    extract($_REQUEST);
	 $id = $JobadsRejected;
	  $data = $users->JobadsRejected($id);

    if ($data):
        header('location:../job-posting.php?msg=approve');
    else:
        header('location:../job-posting.php?msg=fail');
    endif;
}


/* Like POst  */
 elseif (isset($_REQUEST['like'])) {
    extract($_REQUEST);
	  $status = $like;
	  $userid;
	  $postid;
	   //$data = $users->LikePost($status, $userid, $postid);
	  $likedata = $users->GetLikeDislikeByUser($userid, $postid);
 	  print_r($likedata);
	  if(!empty($likedata['postid']) == $postid && $status == 2) {
	       $data = $users->DislikePost($status, $userid, $postid);
 	        // echo '<img class="heart-img" src="assets/img/white-heart-1" alt="" id="like" style="cursor:pointer;" data-id="1" post-id="'.$postid.'">';

      } elseif($status == 1) {
     $data = $users->LikePost($status, $userid, $postid);
        // '<img class="heart-img" src="assets/img/hearts.png" alt="" id="like" style="cursor:pointer;" data-id="2" post-id="'.$postid.'">';
      } else {}
     
}

/* DisLike POst  */
 elseif (isset($_REQUEST['dislike'])) {
    extract($_REQUEST);
	  $status = $dislike;
	  $userid; 
	  $postid;
// 	  $likedata = $users->GetLikeDislikeByUser($userid, $postid);
      $data = $users->DislikePost($status, $userid, $postid);
     
}


/* Like POst  */
 elseif (isset($_REQUEST['updatelike'])) {
    extract($_REQUEST);
	  $status = $updatelike;
	  $userid;
	  $postid;
	  $data = $users->UpdatelikePost($status, $userid, $postid);
     
}



/* JObs Ads Active  */
 elseif (isset($_REQUEST['lat'])) {
    extract($_REQUEST);
	  $lat;
	  $userid;
	  $long;
	  
	  $latlng = $lat.','.$long;
        $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?latlng=".$latlng."&sensor=true";
        $xml = simplexml_load_file($request_url);

        if($xml->status == "OK") {
        $address = $xml->result->formatted_address;
          foreach ($xml->result->address_component as $address) {
            
              echo $country = $address->short_name;
             
          }
        }
        
        
	  $location = $users->GetLikeDislikeByUser($userid, $lat, $lat);
  	   
     
}
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'Search') {
     extract($_REQUEST);
    $data = $users->Search($keyword, $location, $area, $level, $jobcompletion, $rating, $minprice, $maxprice);
   
   if ($data):
        header('location:../../search-result.php?topic='.$keyword.'&location='.$location.'&area='.$area.'&level='.$level.'&jobcompletion='.$jobcompletion.'&rating='.$rating.'&minprice='.$minprice.'&maxprice='.$maxprice);
    else:
        header('location:../../search-result.php?msg=fail');
    endif;
}



