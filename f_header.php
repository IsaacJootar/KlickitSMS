<?php ob_start();?>
<?php session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
 if(!isset($_SESSION['SESS_USER'])){
	  header('location:index.php');
	  exit();
	  }
 include('includes/config2.php');
  $id=$_SESSION['SESS_USER'];
$result=mysql_query("SELECT * FROM `staff` WHERE id= '{$id}' ");
if(!$result){echo "error". mysql_error();}
$dp=mysql_fetch_array($result);
$dp=$dp['fullname'];
 
 $myclass=mysql_query("SELECT * FROM `form_master` WHERE staff_id= '{$id}' ");
if(!$result){echo "error". mysql_error();}
$myclass=mysql_fetch_array($myclass);
$myclass=$myclass['class_name'];
$_SESSION['myclass']=$myclass;
 
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
                <span>Klickit sms</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs">      <?php echo $dp; ?></span>
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
                    <li><a class="ajax-link" href="300pc419pxystaff.php"><i class="glyphicon glyphicon-home"></i><span> Home</span></a>
                        </li>
                       
              
                       
                       
                        
                        
                         
                         <li><a class="ajax-link" href="f_veiw_result.php"><i class="glyphicon glyphicon-search"></i><span> Result View</span></a>
                        </li>
                       
                        
                         <li><a class="ajax-link" href="f_activity.php"><i class="glyphicon glyphicon-ok"></i><span> Activity ratings</span></a>
                        </li>
                          
                        <li><a class="ajax-link" href="f_ca.php"><i class="glyphicon glyphicon-edit"></i><span> Enter CA scores</span></a>
                        </li>
                        <li><a class="ajax-link" href="f_my_scores.php"><i class="glyphicon glyphicon-search"></i><span> View students scores</span></a>
                        </li>
                        <li><a class="ajax-link" href="f_exam.php"><i class="glyphicon glyphicon-edit"></i><span> Enter exam scores</span></a>
                        </li>
                         <li><a class="ajax-link" href="f_my_students.php"><i class="glyphicon glyphicon-user"></i><span> My Students</span></a>
                        </li>
                       
                         <li><a class="ajax-link" href="f_pr_pay_slips1.php"><i class="glyphicon glyphicon-print"></i><span> Print Pay Slip</span></a>
                        </li>

                        <li><a class="ajax-link" href="f_change_pass.php"><i class="glyphicon glyphicon-lock"></i><span> Change Password</span></a>
                        </li>
                          <li><a class="ajax-link" href="update_staff2_.php"><i class="glyphicon glyphicon-user"></i><span> Update Account</span></a>
                        </li>
                        <li><a class="ajax-link" href="upload_assignment.php"><i class="glyphicon glyphicon-edit"></i><span> Upload Assignment/homework</span></a>
                        <li><a class="ajax-link" href="view_homework.php"><i class="glyphicon glyphicon-ok"></i><span> View/grade Assignment</span></a>
                        
                         <li><a class="ajax-link" href="f_notification.php"><i class="glyphicon glyphicon-comment"></i><span> Create notification</span></a>
                        </li>
                         <li><a class="ajax-link" href="f_view_note.php"><i class="glyphicon glyphicon-comment"></i><span> View notifications</span></a>
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
          <h2 align="justify"><img src="images/fa.png" width="18" height="18"> Klickit School Management Software.  [ Version 3.1.1 ]</h2>
        </div>