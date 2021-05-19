<?php ob_start();?>
<?php session_start(); ?>
<?php error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING &  ~E_STRICT & ~E_DEPRECATED); ?>
<?php include('includes/config2.php'); ?>
<?php require('includes/session.php'); ?>
<?php require('classes/database.php'); ?>
 <?php include ('classes/director.php'); ?>
<?php // chech again to confirm if this user is logged in, store in a session afterwards//?>
<?php confirm_logged_in();
  $id=$_SESSION['SESS_USER'];
?>


<script src="jquery-ui-1.12.0/jquery-1.12.4.js"></script>
  <script src="jquery-ui-1.12.0/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker1" ).datepicker();
     $( "#datepicker2" ).datepicker();
  } );
  </script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Klickit School Management Software</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Klickit School management software">
    <meta name="Klickit SMS" content="School management softwares abuja.">

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
<meta charset="utf-8">
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
            <a class="navbar-brand" href=""> 
                <span>KLICKIT SMS</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> Director</span>
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
                                             <li><a class="ajax-link" href="900_dir_encode_qpde_md765ahd098265.php"><i class="glyphicon glyphicon-home"></i><span> Home</span></a>
                        </li>
                        <li><a class="ajax-link" href="dir_manage_staff.php"><i class="glyphicon glyphicon-search"></i><span> Monitor Staff</span></a></li>
                      <li><a class="ajax-link" href="dir_budget.php"><i class="glyphicon glyphicon-search"></i><span> Monitor Budget</span></a></li>
                         <li><a class="ajax-link" href="dir_budget_cat.php"><i class="glyphicon glyphicon-search"></i><span> Budget Category</span></a></li>
                          <li><a class="ajax-link" href="dir_budget_items.php"><i class="glyphicon glyphicon-search"></i><span> Budget Items</span></a>
                        </li>
                        <li><a class="ajax-link" href="dir_expense.php"><i class="glyphicon glyphicon-search"></i><span> Monitor Expenses</span></a>
                        </li>
   
                                          <li><a class="ajax-link" href="dir_manage_payments.php"><i class="glyphicon glyphicon-search"></i><span> Monitor  Payments  </span></a>
                        </li>
                        
                        <li><a class="ajax-link" href="dir_bus.php"><i class="glyphicon glyphicon-search"></i><span> Monitor Bus </span></a>
                        </li>
                    
                          <li><a class="ajax-link" href="dir_chart_class.php"><i class="glyphicon glyphicon-search"></i><span> Classes Analysis </span></a>
                        </li>
                        
                             
                        <li><a class="ajax-link" href="dir_chart_subject.php"><i class="glyphicon glyphicon-search"></i><span> Subjects Analysis </span></a>
                        </li>
                        
                       
                        
                       
                      
<li><a class="ajax-link" href="dir_budget_analysis.php"><i class="glyphicon glyphicon-stats"></i><span> Budget Analysis</span></a>
                        </li>
<li><a class="ajax-link" href="dir_expense_analysis.php"><i class="glyphicon glyphicon-stats"></i><span> Expenses Analysis</span></a>
                        </li>
<li><a class="ajax-link" href="#"><i class="glyphicon glyphicon-stats"></i><span> Income Analysis</span></a>
                        </li>
                       
<li><a class="ajax-link" href="dir_fees_analysis.php"><i class="glyphicon glyphicon-stats"></i><span> Fees Analysis</span></a>
             
             <li><a class="ajax-link" href="dir_transport_analysis.php"><i class="glyphicon glyphicon-stats"></i><span> Transport Analysis</span></a>
                        </li>
                       

                 </div>
            </div>
        </div>
               
        <!--/span-->
        <!-- left menu ends -->

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
   
</div>
<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="number of students." class="well top-block" href="#">
            <i class="glyphicon glyphicon-user blue"></i>

            <div>Total number of students</div>
            <div><?php echo $students=director::find_num_of_students(); ?></div>
            <span class="notification"><?php echo $students=director::find_num_of_students(); ?></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="Number of graduates" class="well top-block" href="#">
            <i class="glyphicon glyphicon-user green"></i>

            <div>Graduated students</div>
            <div><?php echo $grads=director:: find_num_of_graduates(); ?></div>
            <span class="notification green"><?php echo $grads=director:: find_num_of_graduates(); ?></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
         <a data-toggle="tooltip" title="Number of staff." class="well top-block" href="#">
            <i class="glyphicon glyphicon-user blue"></i>

            <div>Total number of Staff</div>
            <div><?php echo $staff=director::find_num_of_staff(); ?></div>
            <span class="notification"><?php echo $staff=director::find_num_of_staff(); ?></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="12 new messages." class="well top-block" href="#">
            <i class="glyphicon glyphicon-envelope red"></i>

            <div>Messages</div>
            <div>12</div>
            <span class="notification red">12</span>
        </a>
    </div>
</div>

<div class="row">

