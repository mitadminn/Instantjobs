<?php
define('DbHost', 'localhost');
define('DbUser', 'vinikuma_instant');
define('DbPass', 'instant@123$'); 
define('DbName', 'vinikuma_instantjob');


class Instantjobs{

    function __construct() {

        $this->con = mysqli_connect(DbHost, DbUser, DbPass, DbName) or die('Could not connect: ' . mysqli_connect_error());
        date_default_timezone_set('Asia/Kolkata');
    }

    function num_rows($q) {
        $sqlquery = mysqli_num_rows($q);
        return $sqlquery;
    }

    function fetch_array($q) {
        $sqlquery = mysqli_fetch_array($q, MYSQLI_ASSOC);
        return $sqlquery;
    }

    function query($q) {
        $sqlquery = mysqli_query($this->con, $q);
        return $sqlquery;
    }

    function lastId($q) { 
        $sqlquery = mysqli_insert_id($this->con);
        return $sqlquery;
        // $last_id = $q->insert_id;
        //return $last_id;
    }
    
     public function UserLogin($emails, $password) {
        $password = md5($password);
          $t = "SELECT * FROM `users` WHERE `Email` = '$emails' AND `Password` = '$password' AND `Status`= 1";
        //checking if the username is available in the table
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
          $count_row = $sqlquery->num_rows;
        if ($count_row == 1) {
            // this login var will use for the session thing
            
             	$_SESSION['Userid'] = $user_data['id'];
             	$_SESSION['Name'] = $user_data['ProfileName'];
  			$_SESSION['Email'] = $user_data['Email'];
             return true;
        } else {
            return false;
        }	
    }
    
       
    
       public function AdminLogin($username, $password) {
        $password = md5($password);
          $t = "SELECT * FROM `admin` WHERE `Username` = '$username   ' AND `Password` = '$password'";
        //checking if the username is available in the table
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
          $count_row = $sqlquery->num_rows;
        if ($count_row == 1) {
            // this login var will use for the session thing
             $_SESSION['AdminID'] = $user_data['id'];
             	$_SESSION['Name'] = $user_data['Name'];
  			$_SESSION['Email'] = $user_data['Email'];
             return true;
        } else {
            return false;
        }	
    }
    
    /* Get Admin info  By ID */
     public function GetAdminDetails($adminid) {
        $t = "SELECT * FROM `admin` WHERE `id` = '$adminid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
    
    
     /* Get USers By Email */
     public function CheckUserByEmail($emails) {
        $t = "SELECT * FROM `users` WHERE `Email` = '$emails'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      
      
     /* Get USers By Google Email */
     public function GetUsersByGoogle($googlemail) {
        $t = "SELECT * FROM `users` WHERE `Email` = '$googlemail'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
     
     
     /* Get USers */
     public function GetUsers() {
        $t = "SELECT * FROM `users`";
        $sqlquery = $this->query($t);
         return $sqlquery;
      }
      
        /* Get Reffeals */
     public function Refers() {
        $t = "SELECT * FROM `users` WHERE `ReferToken` != ''";
        $sqlquery = $this->query($t);
        //$user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
     
     /* Get USers By ID */
     public function GetUserById($userid) {
        $t = "SELECT * FROM `users` WHERE `id` = '$userid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      
      
      /* Get USers By User ID */
     public function GetUSerByUserId($viewuserid) {
        $t = "SELECT * FROM `users` WHERE `id` = '$viewuserid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      
      
      
      /* Get USers By Session ID */
     public function GetUsersById($user_id) {
        $t = "SELECT * FROM `users` WHERE `id` = '$user_id'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      
      
      /* Get USers By Token */
     public function GetUsersByToken($gtoken) {
         $t = "SELECT * FROM `users` WHERE `Token` = '$gtoken'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      
      
      
      /* Get USerid ID */
     public function GetUserrById($user_id) {
        $t = "SELECT * FROM `sell_your_service` WHERE `user_id` = '$user_id'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery); 
        return $user_data;
      }
      
     
      
     
     
     
        /*Add User */
    public function Signup($email, $password, $activationcode, $refertokken) {
        $password = md5($password);
          $t = "INSERT INTO `users` SET `Email` = '$email', `Password` = '$password', `OTP` = '$activationcode', `ReferToken` = '$refertokken'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
     public function EditProfiles($id, $bio, $qualification,$firstname,$email,$year,$profilepic, $phone, $skillss, $hobbie) {
          $t = "UPDATE `users` SET `ProfileBio` = '$bio',`Qualifications`='$qualification',`ProfileName`='$firstname', `Phone` = '$phone', `Email`='$email',`Year`='$year',`ProfilePic`='$profilepic', `Skills`='$skillss', `Hobbies`='$hobbie'  WHERE `id`='$id'";
         $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
         /*Add User */
    public function Portfolio($id, $portfolio) {
          $t = "INSERT INTO `UserPortfolio` SET `UserId` = '$id', `Photos` = '$portfolio'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
     /* Get USers Portfolio By Session ID */
     public function  GetPortfolioByUserId($user_id) {
        $t = "SELECT * FROM `UserPortfolio` WHERE `UserId` = '$user_id'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
        
      
    
    
    
    public function ConfirmEmail($emailotp, $emails) {
         $t = "UPDATE `users` SET `Status` = 1 WHERE `Email` = '$emails' AND `OTP`='$emailotp'";
         $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
      
       public function ProfileInfo($id, $name, $country, $skillss, $ProfileInfo) {
          $t = "UPDATE `users` SET `ProfileName` = '$name',`Country` = '$country',`Skills` = '$skillss', `Langauge` = '$ProfileInfo'  WHERE `id` = '$id'";
         $sqlquery = $this->query($t);
        return $sqlquery;
      }
    
    
         /*Add - Create Service */
    public function CreateService($id, $topic, $description, $price, $currency, $area, $how_fast, $preferedday, $image, $ads) {
        $password = md5($password);
         $t = "INSERT INTO `sell_your_service` SET `user_id` = '$id', `topic` = '$topic', `description` = '$description', `price`= '$price', `price_type`='$currency',`area`='$area', `fast_complete`='$how_fast', `prefer_day`='$preferedday', `photos`='$image',`ads`=', $ads'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
     /* Get Services */
     public function GetAllServices() {
        $t = "SELECT * FROM `sell_your_service` WHERE `status` = 1";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
	  
	  
	   /* Get Services By User */
     public function GetServiceByUserId($user_id) {
          $t = "SELECT * FROM `sell_your_service` WHERE `status` = 1 AND `user_id` = '$user_id'";
         $sqlquery = $this->query($t);
        return $sqlquery;
      } 
       
        /* Get Active Jobs By User */
     public function GetActiveJobByUserId($user_id) {
          $t = "SELECT * FROM `CreateJob` WHERE `status` = 1 AND `user_id` = '$user_id'";
         $sqlquery = $this->query($t);
        return $sqlquery;
      } 
      
 	  /* Get Pending Services By User */
     public function GetPendingServiceByUserId($user_id) {
        $t = "SELECT * FROM `sell_your_service` WHERE `status` = '' AND `user_id` = '$user_id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
      } 
	  
	  /* Get Inactive Services By User */
     public function GetInactiveServiceByUserId($user_id) {
        $t = "SELECT * FROM `sell_your_service` WHERE `status` = 2 AND `user_id` = '$user_id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
      } 
	  
	   /* Get Services */
     public function GetAllServicesInadmin() {
        $t = "SELECT * FROM `sell_your_service`";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
       /* Get USers By Session ID */
     public function  GetServiceById($serviceid) {
        $t = "SELECT * FROM `sell_your_service` WHERE `id` = '$serviceid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
        /* Get Service By Name */
     public function  GetServiceByName($service) {
         $t = "SELECT * FROM `sell_your_service` WHERE `topic` = '$service'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      
      
      
      /* Get Data by Area */
     public function  GetServiceDataByArea($area) {
        $t = "SELECT * FROM `sell_your_service` WHERE `area` = '$area'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
       /* Get Latest Services */
     public function  GetLatestService() {
        $t = "SELECT * FROM `sell_your_service` WHERE `Status` = 1 ORDER BY `id` DESC";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
       /* Get Search Services */
     public function  GetServiceSearch($searchservice) {
        $t = "SELECT * FROM `sell_your_service`  WHERE topic LIKE '%$searchservice%' OR description LIKE '%$searchservice%' AND `status` = 1";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
         /* Get Search Services */
     public function SearchDataValues($searchvalue) {
        $t = "SELECT * FROM `sell_your_service`  WHERE topic = '$searchvalue'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
              /* Get Search Jobs */
     public function SearchJobs($searchjobs) {
        $t = "SELECT * FROM `CreateJob`  WHERE topic = '$searchjobs'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
             /* Get Search Skills */
     public function SearchSkills($searchSkills) {
        $t = "SELECT * FROM `Skills` WHERE `Skills` LIKE '%$searchSkills%'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
             /* Get Search Hobbies */
     public function SearchIntrest($searchIntrest) {
        $t = "SELECT * FROM `Interest`  WHERE Interest LIKE '%$searchIntrest%'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
    //   DISTINCT(`Skills`)
       public function SearchMoreSkills($searchskils, $addskils) {
        $t = "SELECT  FROM `Skills`  WHERE Skills LIKE '%$searchskils%' OR Skills LIKE '%$addskils%' ";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
      
      
      
     
 
        /* Delete Skills */
	 public function DeleteSkills($userid) {
        $t = "DELETE FROM `Skills` WHERE `Post_id`='$userid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }  
      
       /* Delete Interest */
	 public function DeleteInterest($userid) {
        $t = "DELETE FROM `Interest` WHERE `user_id`='$userid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }  
      
      
      

         /* VerifyDetails */
    public function VerifyDetails($id,$govtid, $fullname, $icnumber, $date, $countrry)
     {
          $t = "INSERT INTO `VerifyAccount` SET `UserId` = '$id', `Govt_IC` = '$govtid', `FullName` = '$fullname', `IC_number`= '$icnumber', `DOB`='$date', `Country`='$countrry'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    } 

    public function BankDetails($id, $bankname, $account_no, $country)
     {
          $t = "INSERT INTO `BankDetails` SET `UserId` = '$id', `BankName` = '$bankname', `AccountNumber` = '$account_no', `Country`= '$country'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
     public function  GetBankDetails() {
        $t = "SELECT * FROM `BankDetails` ";
        $sqlquery = $this->query($t);
         return $sqlquery;
      }
      
      public function  GetBankDetailsByUserId($user_id) {
        $t = "SELECT * FROM `BankDetails` WHERE `UserId`='$user_id'";
        $sqlquery = $this->query($t);
         return $sqlquery;
      }
    
     /* Delete Bank */
	 public function DeleteBankDetail($id) {
        $t = "DELETE FROM `BankDetails` WHERE `id`='$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }  
    
	 /* Approved */
    
      public function Approve($id) {
        $t = "UPDATE `sell_your_service` SET `status` = '2' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    }
	
	/* Reject */
    
      public function Reject($id) {
        $t = "UPDATE `sell_your_service` SET `status` = '1' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
    
    /* Ads Approved */
    
      public function AdsApprove($id) {
        $t = "UPDATE `sell_your_service` SET `ads` = 'No' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    }
	
	/* Ads Reject */
    
      public function AdsReject($id) {
        $t = "UPDATE `sell_your_service` SET `ads` = 'Yes' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
	
	
	public function GetServiceByAds() {
        $t = "SELECT * FROM `sell_your_service` WHERE `ads`='Yes' AND `status` = 1";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    }
    
    
    
    
	    /*Add - Create Job */
    public function CreateJob($id, $topic, $description, $price, $currency, $area, $how_fast, $image, $location, $ads) {
        $password = md5($password);
        $t = "INSERT INTO `CreateJob` SET `user_id` = '$id', `topic` = '$topic', `description` = '$description', `price`= '$price', `price_type`='$currency',`area`='$area', `fast_complete`='$how_fast',   `photos`='$image', `location`='$location',`ads`='$ads'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    /* Get Search Job */
     public function GetJobSearch($searchjob) { 
        $t = "SELECT * FROM `CreateJob` WHERE topic LIKE '%$searchjob%' OR description LIKE '%$searchjob%' AND `status` = 1";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
      /* Get Search Job */
     public function GetSkillsSearch($searchskill) {
         $t = "SELECT * FROM `users` WHERE Skills LIKE '%$searchskill%' AND `Status` = 1";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
      
    /* Get Services */
     public function GetAllJobs() {
        $t = "SELECT * FROM `CreateJob` WHERE `status` = 1";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
    
     /* Get Inactive Services By User */
     public function GetInactiveJobByUserId($user_id) {
        $t = "SELECT * FROM `CreateJob` WHERE `status` = 2 AND `user_id` = '$user_id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
      } 
	  
	   /* Get Services */
     public function GetAllJobadmin() {
        $t = "SELECT * FROM `CreateJob`";
        $sqlquery = $this->query($t);
        return $sqlquery;
      }
      
         /* Ads Job Approved */
    
      public function JobAdsApprove($id) {
        $t = "UPDATE `CreateJob` SET `ads` = 'No' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    }
	
	/* Ads Job Reject */
    
      public function JobadsRejected($id) {
        $t = "UPDATE `CreateJob` SET `ads` = 'Yes' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
      
       /* Get USers By Session ID */
     public function  GetJobById($jobid) {
        $t = "SELECT * FROM `CreateJob` WHERE `id` = '$jobid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
      
        /* Get Job By Topic */
     public function   GetJobByTopic($job) {
        $t = "SELECT * FROM `CreateJob` WHERE `topic` = '$job'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
	  
	 
	  
	  
	  public function GetJobsByAds() {
        $t = "SELECT * FROM `CreateJob` WHERE `ads`='Yes' AND `Status` = 1";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    }
    
    
    
	/* Approved */
    
      public function ApprovedJob($id) {
         $t = "UPDATE `CreateJob` SET `Status` = '2' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery; 
    }  
	
	/* Reject */ 
    
      public function RejectedJob($id) {
         $t = "UPDATE `CreateJob` SET `Status` = '1' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
	
	
	 /* Get Data by Area */
     public function  GetJobDataByArea($area) {
        $t = "SELECT * FROM `CreateJob` WHERE `area` = '$area'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
      /* Get Latest JObs */
     public function  GetLatestJobs() {
        $t = "SELECT * FROM `CreateJob` WHERE `Status` = 1 ORDER BY `id` DESC";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      
      
	
	/* Addons */
    
      public function Addons($id, $val, $vals, $topic) {
        $t = "INSERT INTO `ServiceAddons` SET `UserId` = '$id', `AddonName` = '$val', `AddonPrice` = '$vals', `Topic` = '$topic'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
	
   /* all User Block */
    
      public function UserBlock($id) {
          $t = "UPDATE `users` SET `Status` = '0' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    /* all User Un- Block */
    
      public function UserUnblock($id) {
        $t = "UPDATE `users` SET `Status` = '1' WHERE `id` = '$id'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
     
    /* Get Like / Dislike by user */
     public function GetLikeDislikeByUser($user_id, $postid) {
      $t = "SELECT * FROM `likedislike` WHERE `userid` = '$user_id' AND `postid` = '$postid'";
        $sqlquery = $this->query($t);
        $user_data = $this->fetch_array($sqlquery);
        return $user_data;
      }
    
    /* Like Post */
     public function LikePost($status, $userid, $postid) {
         $t = "INSERT INTO `likedislike` SET `status` = '$status',`userid` = '$userid',`postid` = '$postid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    /* Like Post */
     public function DislikePost($status, $userid, $postid) { 
         $t = "UPDATE `likedislike` SET `status` = '$status' WHERE `postid` = '$postid' AND `userid` = '$userid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
     /* Update DisLike Post */
     public function UpdatelikePost($status, $userid, $postid) { 
         $t = "UPDATE `likedislike` SET `status` = '$status' WHERE `postid` = '$postid' AND `userid` = '$userid'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
    function myUrlEncode($val) {
    $entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D','-');
    $replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]"," ");
    return str_replace($entities, $replacements, urlencode($val));
    }
    /* Search result */
    public function Search($keyword, $location, $area, $level, $jobcompletion, $rating, $minprice, $maxprice) {
         $t = "SELECT * FROM `sell_your_service` WHERE 
        `topic` LIKE '%$keyword%' OR 
        `description` LIKE '%$keyword%' OR
         `area` LIKE '%$area%' OR
        `topic` LIKE '%$jobcompletion%' OR
        `price` LIKE '%$minprice%' OR
        `price` LIKE '%$maxprice%'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }

// get user current location 

public function getIpAddress()
    {
        $ipAddress = '';
        if (! empty($_SERVER['HTTP_CLIENT_IP']) && $this->isValidIpAddress($_SERVER['HTTP_CLIENT_IP'])) {
            // check for shared ISP IP
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        } else if (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // check for IPs passing through proxy servers
            // check if multiple IP addresses are set and take the first one
            $ipAddressList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($ipAddressList as $ip) {
                if ($this->isValidIpAddress($ip)) {
                    $ipAddress = $ip;
                    break;
                }
            }
        } else if (! empty($_SERVER['HTTP_X_FORWARDED']) && $this->isValidIpAddress($_SERVER['HTTP_X_FORWARDED'])) {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
        } else if (! empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && $this->isValidIpAddress($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
            $ipAddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        } else if (! empty($_SERVER['HTTP_FORWARDED_FOR']) && $this->isValidIpAddress($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (! empty($_SERVER['HTTP_FORWARDED']) && $this->isValidIpAddress($_SERVER['HTTP_FORWARDED'])) {
            $ipAddress = $_SERVER['HTTP_FORWARDED'];
        } else if (! empty($_SERVER['REMOTE_ADDR']) && $this->isValidIpAddress($_SERVER['REMOTE_ADDR'])) {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        }
        return $ipAddress;
    }

    public function isValidIpAddress($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
            return false;
        }
        return true;
    }

    public function getLocation($ip)
    {
        $ch = curl_init('http://ipwhois.app/json/' . $ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        // Decode JSON response
        $ipWhoIsResponse = json_decode($json, true);
        // Country code output, field "country_code"
        return $ipWhoIsResponse;
    }
    
     /* Google Sign up */
     public function GoogleUserSignup($googlemail, $gogoletoken, $ProfileName, $ProfilePic) {
        $t = "INSERT INTO `users` SET `Email` = '$googlemail',`Token` = '$gogoletoken',`ProfileName` = '$ProfileName',`ProfilePic` = '$ProfilePic'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    /* Add Skills */
     public function AddSkills($userid, $skillsval) {
        $t = "INSERT INTO `Skills` SET `Post_id`='$userid', `Skills` = '$skillsval'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
     /* Add Intrest */
     public function AddIntrest($userid, $intrests) {
        $t = "INSERT INTO `Interest` SET `user_id`='$userid', `Interest` = '$intrests'";
        $sqlquery = $this->query($t);
        return $sqlquery;
    }
    
    
    
    /* Get Skills by User ID */
     public function GetSkillsByUserId($user_id) {
      $t = "SELECT DISTINCT(`Skills`) FROM `Skills` WHERE `Post_id` = '$user_id'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
      
      /* Get Interest By User ID */
     public function GetIntrestByUserId($user_id) {
      $t = "SELECT DISTINCT(`Interest`) FROM `Interest` WHERE `user_id` = '$user_id'";
        $sqlquery = $this->query($t);
        // $user_data = $this->fetch_array($sqlquery);
        return $sqlquery;
      }
    
    
    
    
    public static function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}


    
	 
}

?>