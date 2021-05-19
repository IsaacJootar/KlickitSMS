 <?php ob_start();?>
<?php session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING &  ~E_STRICT & ~E_DEPRECATED);
 include('includes/session.php');
 
  confirm_logged_in();
  $role=$_SESSION['SESS_USER_ROLE'];
   $staff_id=$_SESSION['SESS_USER'];
include('includes/config2.php');
 
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
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Klickit School Management Software</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="klickit School management software">
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
     <link rel="stylesheet" href="jquery-ui-1.12.0/jquery-ui.css">
  

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
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs">      <?php echo $role; ?></span>
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
                    <li><a class="ajax-link" href="800_inven_stor11904_version_on.php"><i class="glyphicon glyphicon-home"></i><span> Home</span></a>
                        </li>
                         
                                       
                         
                         <li><a class="ajax-link" href="sto_invent_asset_cat.php"><i class="glyphicon glyphicon-list-alt"></i><span>  Inventory Category</span></a></li>
                        
                         
                        <li><a class="ajax-link" href="sto_invent_items.php"><i class="glyphicon glyphicon-share-alt"></i><span>  Add Items to Inventory</span></a>
                        </li>
                        </li>
                        </li>
                        <li><a class="ajax-link" href="s"><i class="glyphicon glyphicon-stats"></i><span>   Inventory Reports</span></a>
                        </li>
                        
                        <li><a class="ajax-link" href="store_items.php"><i class="glyphicon glyphicon-list-alt"></i><span>  Store Items </span></a>
                        </li>
                        
                        <li><a class="ajax-link" href="store_items_add.php"><i class="glyphicon glyphicon-share-alt"></i><span> Add Items to Store</span></a>
                        
                        </li>
                        <li><a class="ajax-link" href="acc_manage_bank.php"><i class="glyphicon glyphicon-remove"></i><span>Remove Items from Store</span></a>
                        
                        </li>


<li><a class="ajax-link" href="store_items_update.php"><i class="glyphicon glyphicon-edit"></i><span> Update Store Items</span></a>
                        
                        </li> 

</li>   
                         <li><a class="ajax-link" href="acc_daily_reportss.php"><i class="glyphicon glyphicon-search"></i><span> Sales Reports</span></a>

<li><a class="ajax-link" href="acc_fees_analysis.php"><i class="glyphicon glyphicon-stats"></i><span> Sales Analysis</span></a>
             
          
                      
<li><a class="ajax-link" href="stores_change_pass.php"><i class="glyphicon glyphicon-lock"></i><span> Change Password</span></a>
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
    <div class="box col-md-10">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
                 <h2 align="justify"><img src="images/fa.png" width="18" height="18"> Klickit School Management Software. [ Version 4.1.3 ]</h2>
        </div>