<?php session_start(); 
 include('function.php');
 $obj = new Instantjobs();
$msg = $_GET['msg'];
 

     
     if(!isset($_SESSION['AdminID']))
{
    $_SESSION['s_urlRedirectDir'] = $_SERVER['REQUEST_URI'];
    $_SESSION['s_activId'] = true;
     header("Location:index.php"); exit();

}

$adminid = $_SESSION['AdminID'];
$admininfo = $obj->GetAdminDetails($adminid);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Instajobs | Admin</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Datatables -->
    
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    
    
    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       <?php include('inc/sidebar.php'); ?>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav"> 
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="assets/images/img.jpg" alt=""><?=$admininfo['Name'];?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a> 
                    <a class="dropdown-item"  href="inc/process.php?action=AdminLogout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <!--<li role="presentation" class="nav-item dropdown open">-->
                <!--  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">-->
                <!--    <i class="fa fa-envelope-o"></i>-->
                <!--    <span class="badge bg-green">6</span>-->
                <!--  </a>-->
                <!--  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">-->
                <!--    <li class="nav-item">-->
                <!--      <a class="dropdown-item">-->
                <!--        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>-->
                <!--        <span>-->
                <!--          <span>John Smith</span>-->
                <!--          <span class="time">3 mins ago</span>-->
                <!--        </span>-->
                <!--        <span class="message">-->
                <!--          Film festivals used to be do-or-die moments for movie makers. They were where...-->
                <!--        </span>-->
                <!--      </a>-->
                <!--    </li>-->
                <!--    <li class="nav-item">-->
                <!--      <a class="dropdown-item">-->
                <!--        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>-->
                <!--        <span>-->
                <!--          <span>John Smith</span>-->
                <!--          <span class="time">3 mins ago</span>-->
                <!--        </span>-->
                <!--        <span class="message">-->
                <!--          Film festivals used to be do-or-die moments for movie makers. They were where...-->
                <!--        </span>-->
                <!--      </a>-->
                <!--    </li>-->
                <!--    <li class="nav-item">-->
                <!--      <a class="dropdown-item">-->
                <!--        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>-->
                <!--        <span>-->
                <!--          <span>John Smith</span>-->
                <!--          <span class="time">3 mins ago</span>-->
                <!--        </span>-->
                <!--        <span class="message">-->
                <!--          Film festivals used to be do-or-die moments for movie makers. They were where...-->
                <!--        </span>-->
                <!--      </a>-->
                <!--    </li>-->
                <!--    <li class="nav-item">-->
                <!--      <a class="dropdown-item">-->
                <!--        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>-->
                <!--        <span>-->
                <!--          <span>John Smith</span>-->
                <!--          <span class="time">3 mins ago</span>-->
                <!--        </span>-->
                <!--        <span class="message">-->
                <!--          Film festivals used to be do-or-die moments for movie makers. They were where...-->
                <!--        </span>-->
                <!--      </a>-->
                <!--    </li>-->
                <!--    <li class="nav-item">-->
                <!--      <div class="text-center">-->
                <!--        <a class="dropdown-item">-->
                <!--          <strong>See All Alerts</strong>-->
                <!--          <i class="fa fa-angle-right"></i>-->
                <!--        </a>-->
                <!--      </div>-->
                <!--    </li>-->
                <!--  </ul>-->
                <!--</li>-->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->