<?php ob_start();?>
<?php session_start(); ?>
<?php error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING &  ~E_STRICT & ~E_DEPRECATED); ?>
<?php include('includes/config2.php'); ?>
<?php require('includes/session.php'); ?>
<?php require('classes/database.php'); ?>
<?php // chech again to confirm if this user is logged in, store in a session afterwards//?>
<?php confirm_logged_in();


$s_id=$_SESSION['SESS_USER'];
$result=$database->query("SELECT * FROM `students` WHERE id= '{$s_id}' ");if(!$result){echo "error". mysqli_error();}$dp=mysqli_fetch_array($result);$dp=$dp['fullname'];
$my_class=$database->query("SELECT * FROM `students` WHERE id= '{$s_id}' ");
if(!$my_class){echo "error". mysql_error();}
$my_class=$database->fetch_array($my_class);
$my_class=$my_class['present_class'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
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
                    <li><a class="ajax-link" href="100bfstudent_gpanel.php"><i class="glyphicon glyphicon-home"></i><span> Home</span></a>
                        </li>
                       
              
                        <li><a class="ajax-link" href="s_result_check_.php"><i class="glyphicon glyphicon-list-alt"></i><span> Check Result</span></a>
                        </li>
                        
                        
                        <li><a class="ajax-link" href="s_view_fees.php"><i class="glyphicon glyphicon-list-alt"></i><span> School Fees</span></a>
                        </li>
                        
                          
                          
                        <li><a class="ajax-link" href="s_subjects.php"><i class="glyphicon glyphicon-list-alt"></i><span> Subjects</span></a>
                        </li>
                        
                           
                        <li><a class="ajax-link" href="s_scores.php"><i class="glyphicon glyphicon-search"></i><span> Monitor Performance</span></a>
                        </li>
                        
                        
                        
                         
                         <li><a class="ajax-link" href="s_change_pass.php"><i class="glyphicon glyphicon-lock"></i><span> Change Password</span></a>
                        </li>
                        <li><a class="ajax-link" href="s_update_profile.php"><i class="glyphicon glyphicon-user"></i><span> Update Profile</span></a>
                        <li><a class="ajax-link" href="s_cbt.php"><i class="glyphicon glyphicon-phone"></i><span> My CBT</span></a></li>
                        </li>
                        <li><a class="ajax-link" href="download_newsletter.php"><i class="glyphicon glyphicon-list-alt"></i><span> Newsletter</span></a>
                           <li><a class="ajax-link" href="download_assignment.php"><i class="glyphicon glyphicon-pencil"></i><span> Assignment/Homework</span></a>
                        </li>
                        </li>
                        <li><a class="ajax-link" href="s_attendance.php"><i class="glyphicon glyphicon-check"></i><span> Attendance</span></a>
                             <li><a class="ajax-link" href="s_notification.php"><i class="glyphicon glyphicon-pencil"></i><span> Create notification</span></a>
                        </li>
                        </li>
                       
                          <li><a class="ajax-link" href="s_view_note.php"><i class="glyphicon glyphicon-comment"></i><span> View  notification</span></a>
                        </li></ul>
                        
                        
                         
                        
                   <label id="for-is-ajax" for="is-ajax">
<input id="is-ajax" type="checkbox" checked> Loader Enabled</label>
                 </div>
            </div>
        </div>
               
       <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
           
<div class=" row"></div>

<div class="row">
    <div class="box col-md-10">
        <div class="box-inner">
        <div class="box-header well" data-original-title=""> <h2 align="justify"><img src="images/fa.png" width="18" height="18"> Klickit School Management Software.  [ Version 4.1.3 ]</h2>
        </div>