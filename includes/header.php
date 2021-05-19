<?php ob_start();?>
<?php session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING &  ~E_STRICT & ~E_DEPRECATED);
  include('includes/session.php');
  confirm_logged_in();
  $id=$_SESSION['SESS_USER'];
include('includes/config2.php');

?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Klickit School Management Software</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Klickit School management software">
    <meta name="Klickit systems-Abuja" content="Klickit School management softwares abuja.">

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

  <meta name="viewport" content="width=device-width, initial-scale=1">
  
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
            <a class="navbar-brand" href="400js419pxysadmin.php.php"> 
                <span>KLICKIT SMS</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
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
                    <li><a class="ajax-link" href="400js419pxysadmin.php.php"><i class="glyphicon glyphicon-home"></i><span> Home</span></a>
                        </li>
                       <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-search"></i><span> Manage Session</span></a>
                            <ul class="nav nav-pills nav-stacked">
                            <li><a href="create_session.php">Create Sessions</a>
                                <li><a href="set_current.php"><i class="glyphicon glyphicon">View Sessions</i></a></li>
                                
                                   <li><a href="delete_session.php"><i class="glyphicon glyphicon">Delete  Session</i></a></li>
                            </ul>
                        </li>
                        
                      <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-search"></i><span>  Manage Term Infor</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="create_term_info.php">Create Term Infor </a></li>
                                <li><a href="view_term_info.php"><i class="glyphicon glyphicon">View Term Infor </i></a></li>
                                   <li><a href="delete_term_info.php"><i class="glyphicon glyphicon">Delete Term Infor</i></a></li>
                                   <li><a href="max_attendance.php">Maximum Attendance </a></li>
                            </ul>
                        </li>
                         <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-search"></i><span>  Manage Term</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                  <li><a href="create_term.php">Create Term  </a></li>
                                <li><a href="view_term.php"><i class="glyphicon glyphicon">View Term </i> </a></li>
                              
                                
                                <?php //   <li><a href="delete_term.php"><i class="glyphicon glyphicon">Delete Term</i></a></li> // ?>
                                   
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-wrench"></i><span>  Configurations</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                  <li><a href="section.php"><i class="glyphicon glyphicon">  School Sections </i> </a></li>
                                <li><a href="asses.php"><i class="glyphicon glyphicon"> Assessment Format </i> </a></li>
                              
                                
                                   <li><a href="grading.php"><i class="glyphicon glyphicon">Grading Formats</i></a></li>
                                    <li><a href="set_dossier.php"><i class="glyphicon glyphicon">Dossier type</i></a></li>
                                     <li><a href="result_comments.php"><i class="glyphicon glyphicon">Result Comments</i></a></li>
                                        <li><a href="config_attendance.php"><i class="glyphicon glyphicon">Term Duration</i></a></li>
                                         <li><a href="time_table.php"><i class="glyphicon glyphicon">Time Table</i></a></li>
                                   
                            </ul>
                        </li>
                             <li><a class="ajax-link" href="manage_staff.php"><i class="glyphicon glyphicon-user"></i><span> Manage Teachers</span></a>
                        <li><a class="ajax-link" href="manage_student.php"><i class="glyphicon glyphicon-user"></i><span> Manage Student</span></a>
                        
                        <li><a class="ajax-link" href="class.php"><i class="glyphicon glyphicon-search"></i><span> Manage Classes</span></a>
                        </li>
                        <li><a class="ajax-link" href="subject.php"><i class="glyphicon glyphicon-search"></i><span> Manage Subjects</span></a>
                        </li>
                        <li><a class="ajax-link" href="create_activity.php"><i class="glyphicon glyphicon-search"></i><span> Create Activity Rating</span></a>
                        </li>
                        <li><a class="ajax-link" href="manage_roles.php"><i class="glyphicon glyphicon-lock"></i><span> Manage/Assign Roles</span></a>
                        </li>
                         <li><a class="ajax-link" href="notification.php"><i class="glyphicon glyphicon-comment"></i><span> Notification</span></a>
                        </li>
                     
                        
                       <li><a class="ajax-link" href="manage_sms.php"><i class="glyphicon glyphicon-comment"></i><span> Manage Bulk Messaging</span></a>
                        </li>
                         
                         <li><a class="ajax-link" href="chat_analysis.php"><i class="glyphicon glyphicon-stats"></i><span> Chart Analysis</span></a>
                        </li>
                         
                         <li><a class="ajax-link" href="promote.php"><i class="glyphicon glyphicon-search"></i><span> Manage Promotions</span></a>
                        </li>
                         
                         <li><a class="ajax-link" href="graduates.php"><i class="glyphicon glyphicon-edit"></i><span>  Graduates</span></a>
                        </li>
                         
                         <li><a class="ajax-link" href="recover.php"><i class="glyphicon glyphicon-lock"></i><span>Recover passwords</span></a>
                        </li>
                         
                         <li><a class="ajax-link" href="change_pass.php"><i class="glyphicon glyphicon-lock"></i><span> Change password</span></a>
                        </li>
                         
                        <li><a class="ajax-link" href="results_stat.php"><i class="glyphicon glyphicon-calendar"></i><span> Manage Results</span></a>
                        </li>
                         <li><a class="ajax-link" href="broadsheet.php"><i class="glyphicon glyphicon-calendar"></i><span> Broad Sheets</span></a>
                        </li>
                         <li><a class="ajax-link" href="newsletter.php"><i class="glyphicon glyphicon-calendar"></i><span> Newsletter</span></a>
                        </li>
                      <?php //   <li><a class="ajax-link" href="#"><i class="glyphicon glyphicon-calendar"></i><span> Broad sheets</span></a> //?>
                        </li>
                         <li><a class="ajax-link" href="sign.php"><i class="glyphicon glyphicon-edit"></i><span> Signature</span></a></li>
                         <li><a class="ajax-link" href="back_up1.php"><i class="glyphicon glyphicon-download-alt"></i><span> Back up</span></a>
                        </li>
                        <li><a class="ajax-link" href="configure_school_infor.php"><i class="glyphicon glyphicon-search"></i><span> School Infor</span></a>
                        </li>
                       
                    </ul>
        <label id="for-is-ajax" for="is-ajax">
<input id="is-ajax" type="checkbox" checked> Loader Enabled</label>
                 </div>
            </div>
        </div>
               

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
           
<div class=" row"></div>

<div class="row">
    <div class="box col-md-11">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
                <h2 align="justify"><img src="images/fa.png" width="18" height="18"> Klickit School Management Software. [ Version 4.1.3 ]</h2>
        </div>