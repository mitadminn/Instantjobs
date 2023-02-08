<?php 
session_start();
include('admin/inc/function.php');
$obj = new Instantjobs(); 
//Include Google Configuration File
include('gconfig.php');
  

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
//It will Attempt to exchange a code for an valid authentication token. 
$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
//This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
if(!isset($token['error']))
{
//Set the access token used for requests
$google_client->setAccessToken($token['access_token']);
//Store "access_token" value in $_SESSION variable for future use.
$_SESSION['access_token'] = $token['access_token'];
//Create Object of Google Service OAuth 2 class
$google_service = new Google_Service_Oauth2($google_client); 
//Get user profile data from google
$data = $google_service->userinfo->get();
//Below you can find Get profile data and store into $_SESSION variable
if(!empty($data['given_name']))
{
  $_SESSION['user_first_name'] = $data['given_name'];
}
if(!empty($data['family_name']))
{
  $_SESSION['user_last_name'] = $data['family_name'];
}
if(!empty($data['email']))
{
  $_SESSION['user_email_address'] = $data['email'];
}
if(!empty($data['gender']))
{
  $_SESSION['user_gender'] = $data['gender'];
}
if(!empty($data['picture']))
{
   $_SESSION['user_image'] = $data['picture'];
}


$emails = $_SESSION['user_email_address'];
$guser = $obj->CheckUserByEmail($emails);
if($guser){
// print_r($result);
$_SESSION['Userid'] = $guser['id'];
} else {
      $googlemail = $_SESSION['user_email_address'];
      $gogoletoken = $_SESSION['access_token'];
      $ProfileName = $_SESSION['user_first_name'].' '.$_SESSION['user_last_name'];
      $ProfilePic =$_SESSION['user_image'];
      $user_reg = $obj->GoogleUserSignup($googlemail, $gogoletoken, $ProfileName, $ProfilePic);
      if ($user_reg) {
           $goog_user = $obj->GetUsersByGoogle($googlemail);
           $_SESSION['Userid'] = $goog_user['id'];
    //   echo 'Google User Register Successfully';
    header('location:profile-info');
      $token = $user_reg['Token'];
    } else {
      echo "User is not created";
      die();
    }
      
 }   
 $_SESSION['user_token'] = $token;
} else {
     if (!isset($_SESSION['user_token'])) {
    header("Location: index.php");
    die();
  }
$gtoken = $_SESSION['user_token'];
  // checking if user is already exists in database
  $tokenresult = $obj->GetUsersByToken($gtoken);
  if ($tokenresult) {
      $user_id = $tokenresult['id'];
    $user_information = $obj->GetUsersById($user_id);
  } 
} 
} 
 
$_SESSION['referid'] = $_GET['uid'];

$user_id = $_SESSION['Userid'];
$user_information = $obj->GetUsersById($user_id);

$useridd = $obj->GetUserrById($user_id);
$services = $obj->GetAllServices();
$jobs = $obj->GetAllJobs();

$ip = $obj->getIpAddress();
$isValidIpAddress = $obj->isValidIpAddress($ip);
$geoLocationData = $obj->getLocation($ip);
$_SESSION['Country'] = $geoLocationData['country'];
$skills = $obj->GetSkillsByUserId($user_id);
$intrest = $obj->GetIntrestByUserId($user_id);

?>
<link rel="stylesheet" href="assets/css/header.css">
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="tuf19atYlsS6V7nJtxjvVoz5HGzZXzDCqiVLpSmI">
        <title>Instantjob | Home</title>
        <meta name="description" content="Instant Jobs">
 		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0">

        <link rel="stylesheet" href="assets/css/stylesheet-onboarding.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="assets/css/stylesheet.css">
        <link rel="stylesheet" href="assets/css/custom.css">
    </head>
    <body class="background-container">
        
        
		
    <main role="main" class="container-fluid">
        <header class="header">
           
            <div class="row align-items-center head_wrap_row">
                <div class="col-md-3 p-0">
                    <div class="logo_header">
                        <a href="service-provider">
                            <img src="assets/img/new-instant-logo.png" alt="Instant Jobs">
                        </a>
                    </div>
                </div>
            <div class="col-md-6 p-0 section">
                <div class="top-search">
                    <form action="#" method="post" novalidate="novalidate">
                        <div class="row">
                            <div class="col-lg-10 col-md-3 col-sm-12 p-0 " >
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <input type="text"name="user" id="user" class="form-control search-slt section" placeholder="Search" />
                                <div id="userList"></div> 
                            </div>
                             <div class="col-lg-2 col-md-3 col-sm-6 p-0">
                                <svg class="chvron_svg" viewBox="0 0 24 24"> <path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>
                                <select class="ddl-select" id="list" name="list" value="^">
                                  <option value="1" class="lang_optn">Skills</option>
                                  <option value="2" class="lang_optn">Interest</option>
                                  <option value="3" class="lang_optn">Jobs</option>
                                  <option value="4" class="lang_optn">Service</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                <div class="col-md-3 p-0">
                <div class="right-btns dropdownn">
            <!--<div class="icon-menu">-->
            <!--       <svg class="dropbtn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>message-processing-outline</title>-->
            <!--       <path fill="currentColor" d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2M20 16H5.2L4 17.2V4H20V16M17 11H15V9H17M13 11H11V9H13M9 11H7V9H9" /></svg>-->
            <!--</div>-->
            <div class="icon-menu">
                      <svg  class="dropbtn notification_pop_up"   viewBox="0 0 24 24">
                    <path fill="currentColor" d="M10 21H14C14 22.1 13.1 23 12 23S10 22.1 10 21M21 19V20H3V19L5 17V11C5 7.9 7 5.2 10 4.3V4C10 2.9 10.9 2 12 2S14 2.9 14 4V4.3C17 5.2 19 7.9 19 11V17L21 19M17 11C17 8.2 14.8 6 12 6S7 8.2 7 11V18H17V11Z" />
                </svg>
            </div>
            <div class="icon-menu" onclick="myDropFunction()">
                <svg class="dropbtn"  viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12,16A2,2 0 0,1 14,18A2,2 0 0,1 12,20A2,2 0 0,1 10,18A2,2 0 0,1 12,16M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4Z" />   
                </svg>
                <div id="myDropdown" class="dropdown-contentt">
                    <a class="dropdown_menu" href="#home">Home</a>
                    <a class="dropdown_menu" href="#about">About</a>
                    <a class="dropdown_menu" href="#contact">Contact</a>
                </div>
            </div>
            <div class="create-btn">
                <?php if($page == 'Job Marketplace') { ?>
                                    <a href="<?php if(!empty($_SESSION['user_first_name'])) { echo 'create-post'; } elseif(!empty($_SESSION['Userid'])) { echo 'create-post'; } else { echo 'signin';}?>" class="service-create btn btn-primary">
                                        <button type="button" class="custom-btn bnt-fill-green post_wrap"> Create Post</button>
                                    </a>
                                 <?php } elseif($page == 'Service Provider') { ?>
                                    <a href="<?php if(!empty($_SESSION['user_first_name'])) { echo 'create-service'; } elseif(!empty($_SESSION['Userid'])) { echo 'create-service'; } else { echo 'signin';}?>" class="service-create btn btn-primary">
                                        <button type="button" class="custom-btn bnt-fill-green"> Create Service</button>
                                    </a>
                                  <?php } else {} ?>
                                  </div>
        </div>
                </div>
            </div>
            
         </header>
        <div class="row main_row_wrapper">
 <!-------------------------------------------search bar content---------------------------------------->

 <!-------------------------------------------search bar content END---------------------------------------->
  <script>
$(".custom-select").each(function() {
  var classes = $(this).attr("class"),
      id      = $(this).attr("id"),
      name    = $(this).attr("name");
  var template =  '<div class="' + classes + '">';
      template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
      template += '<div class="custom-options">';
      $(this).find("option").each(function() {
        template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
      });
  template += '</div></div>';
  
  $(this).wrap('<div class="custom-select-wrapper"></div>');
  $(this).hide();
  $(this).after(template);
});
$(".custom-option:first-of-type").hover(function() {
  $(this).parents(".custom-options").addClass("option-hover");
}, function() {
  $(this).parents(".custom-options").removeClass("option-hover");
});
$(".custom-select-trigger").on("click", function() {
  $('html').one('click',function() {
    $(".custom-select").removeClass("opened");
  });
  $(this).parents(".custom-select").toggleClass("opened");
  event.stopPropagation();
});
$(".custom-option").on("click", function() {
  $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
  $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
  $(this).addClass("selection");
  $(this).parents(".custom-select").removeClass("opened");
  $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
});
                </script>       
                         
<!--search bar js-->
<script>
    $(function () {
  $('[data-tooltip="tooltip"]').tooltip()
	});
</script>
  <!--search bar js-->
  
  <!--drop down menu of vertical dots-->
  <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myDropFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-contentt");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script>
$(function() {
    $("#skill_input").autocomplete({
        source: "admin/inc/process.php?autosearch",
        select: function( event, ui ) {
            event.preventDefault();
            $("#skill_input").val(ui.item.id);
        }
    });
});


 /* Keyword Search for Service Provider */
// function showResult(str) {
//   if (str.length==0) {
//     document.getElementById("livesearch").innerHTML="";
//     document.getElementById("livesearch").style.border="0px";
//      return;
//   }
//   $('#myselect').on('change', function (e) {
//      var valueSelected = this.value;
//     alert(valueSelected);
// });
  
  
//   var xmlhttp=new XMLHttpRequest();
//   xmlhttp.onreadystatechange=function() {
//     if (this.readyState==4 && this.status==200) {
//       document.getElementById("livesearch").innerHTML=this.responseText; 
//       document.getElementById("livesearch").style.border="1px solid red;";
//      $("#servicedata").hide(); 
//     }else {
//           $("#servicedata").show();
//     }
//   }
//   xmlhttp.open("GET","admin/inc/process.php?searchservice="+str,true);
//   xmlhttp.send();
// }


/*  Job Search for Job mArket place */

function showJobResult(str) {
  if (str.length==0) {
     document.getElementById("livejobsearch").innerHTML=""; 
    return;
  }
    $('#myselect').on('change', function (e) {
     var valueSelected = this.value;
    alert(valueSelected);
});
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livejobsearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid red";
      $("#jobdata").hide(); 
    } else {
        
         $("#jobdata").show();
    }
  }
  xmlhttp.open("GET","admin/inc/process.php?searchjob="+str,true);
  xmlhttp.send();
}


/*  Job Search for Job mArket place */

function showSkillsResult(str) {
    
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("skillsearch").innerHTML=this.responseText;
      $("#servicedata").hide(); 
    }else {
          $("#servicedata").show();
    }
  }
  xmlhttp.open("GET","admin/inc/process.php?searchskill="+str,true);
  xmlhttp.send();
}




  $(function () {
  $(".ddl-select").each(function () {
    $(this).hide();
    var $select = $(this);
    var _id = $(this).attr("id");
    var wrapper = document.createElement("div");
    wrapper.setAttribute("class", "ddl ddl_" + _id);

    var input = document.createElement("input");
    input.setAttribute("type", "text");
    input.setAttribute("class", "input");
    input.setAttribute("id", "ddl_" + _id);
    input.setAttribute("readonly", "readonly");
    input.setAttribute(
      "placeholder",
      $(this)[0].options[$(this)[0].selectedIndex].innerText
    );

    $(this).before(wrapper);
    var $ddl = $(".ddl_" + _id);
    $ddl.append(input);
    $ddl.append("<div id='mySelect' class='ddl-options ddl-options-" + _id + "'></div>");
    var $ddl_input = $("#ddl_" + _id);
    var $ops_list = $(".ddl-options-" + _id);
    var $ops = $(this)[0].options;
    for (var i = 0; i < $ops.length; i++) {
      $ops_list.append(
        "<div  data-value='" +
          $ops[i].value +
          "'>" +
          $ops[i].innerText +
          "</div>"
      );
    }

    $ddl_input.click(function () {
      $ddl.toggleClass("active");
    });
    $ddl_input.blur(function () {
      $ddl.removeClass("active");
    });
    $ops_list.find("div").click(function () {
      $select.val($(this).data("value")).trigger("change");
      $ddl_input.val($(this).text());
      $ddl.removeClass("active");
    });
  });
});
</script>
 <!--drop down menu of vertical dots-->
