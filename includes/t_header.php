<?php ob_start();?>
<?php session_start(); ?>
<?php error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING &  ~E_STRICT & ~E_DEPRECATED);?>
<?php include('includes/config2.php'); ?>
<?php require('includes/session.php'); ?>
<?php require('classes/database.php'); ?>
<?php // chech again to confirm if this user is logged in, store in a session afterwards//?>
<?php confirm_logged_in();
    $id=$_SESSION['SESS_USER'];
    $result=$database->query("SELECT * FROM `staff` WHERE id= '{$id}' ");
    if(!$result){echo "error". mysqli_error();}
    $dp=$database->fetch_array($result);
    $dp=$dp['fullname'];
     
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Klickit School Management Software</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Klickit School management software">
    <meta name="Klickit systems" content="School management softwares abuja.">


    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="favicon.ico">

</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=""> 
                 <span>KLICKIT SMS</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs">  <?php echo $dp; ?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

             <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
               
                
            </div>
            <!-- theme selector ends -->

            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="#"> <?php include('includes/term_info.php');?></a></li>    
            </ul>

        </div>
    </div>
    
    
     
   
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                  <ul class="nav nav-pills nav-stacked main-menu">
                    <li><a class="ajax-link" href="200er_b6yx9_student.php"><i class="glyphicon glyphicon-home"></i><span> Home</span></a>
                        </li>
                       
              
                        <li><a class="ajax-link" href="t_ca.php"><i class="glyphicon glyphicon-list-alt"></i><span> Input CA Scores</span></a>
                        </li>
                        <li><a class="ajax-link" href="t_exam.php"><i class="glyphicon glyphicon-list-alt"></i><span> Input exams Scores</span></a>
                        </li>
                         <li><a class="ajax-link" href="t_my_scores.php"><i class="glyphicon glyphicon-list-alt"></i><span> My Scores</span></a>
                         <li> <a href="t_cbt.php"><i class="glyphicon glyphicon-phone"></i><span>  Computer Based Test</span></a>
                        </li>
                         </li>
                         <li><a class="ajax-link" href="t_pr_pay_slips1.php"><i class="glyphicon glyphicon-list-alt"></i><span> Generate Pay Slip</span></a>
                        </li>
                          <li><a class="ajax-link" href="update_staff_.php"><i class="glyphicon glyphicon-user"></i><span> Update Account</span></a>
                        </li>
                        
                         
                         <li><a class="ajax-link" href="t_change_pass.php"><i class="glyphicon glyphicon-lock"></i><span> Change Password</span></a>
                        </li>
                        
                  
                 </div>
            </div>
        </div>
                
     
 <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
           
<div class=" row"></div>

<div class="row">
    <div class="box col-md-10">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
          <h2 align="justify"><img src="images/fa.png" width="18" height="18"> Klickit School Management Software. [ Version 4.1.3 ]</h2>
        </div>