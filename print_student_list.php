<?php ob_start();?>
<?php session_start();
$id=$_SESSION['SESS_USER'];
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING &  ~E_STRICT & ~E_DEPRECATED);

    $role=$_SESSION['SESS_USER_ROLE'];
    
include('includes/config2.php') ;
	?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Klickit School management software">
    <meta name="Klickit systems" content="Klickit School management softwares abuja.">


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
   
     
   
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
       

<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
   <?php require_once('classes/schoolInformation.php'); ?>


    
            <!-- content starts -->
   


    <div class="box col-md-14">
       
       
            
<div class="box-content row">
                
                 
             
             
                
                 
				 		
  <?php


					  $class_name=$_GET['class_name'];
					  
					
					global $database;
					
					  
					
					  
			 
			  ?><table align="center" width="1065">
                   
<tr>
 <td width="141" rowspan="1" ><img src="images/jet.jpg" alt="" width="125" height="119" align="left"/></td>
     
      <th colspan="5" style="color:#600"><h2 align="center" style="color:#600"><?php echo $school_address=schoolInformation::find_school_name();

?></h2>
        <p align="left">
        <h5 align="center" style="color:#600">Address: <?php echo $school_address=schoolInformation::find_school_address();?> 

        </p>
        </h5></p>
 <div align="center"><a href="javascript:window.print()">[Student list]</a></div>
 <hr>
      <tr class="transcriptheader hdsmall">
    <td>DOCUMENT TYPE::</td>
   
    <td width="206"> <?php echo 'Student List';?></td>
    <td width="154">REPORT STATUS:</td>
    <td width="155"><?php echo "<span class='label-success label label-default'>Successful</span>"; ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>CLASS NAME:</td>
    <td><?php echo $class_name; ?></td>
    <td>DATE/TIME:</td>
    <td><?php 
			echo  date('M j, Y h:i:s A', time());;
	 ?></td>
  </tr>
</table>
<p>
                 <table width="1065"  border="1" align="center" style="line-height:1">
                   <tr class="transcriptheader hdsmall"  valign="top"; style="vertical-align:top" align="center">
                     <td width="36">
                      <div align="center"><strong>SN</strong></div></td>
                          <td width="207"><div align="left"><strong>Student's Name</strong></div></td>
                        <td width="207"><div align="left"><strong>Registration No.</strong></div></td>

    
  </tr>
   <?php  
 global $database;
 $name=$database->query("SELECT *  FROM `student_class` WHERE  `class_name`=$class_name AND `account_status` = 1 ORDER BY trim(fullname) ASC");
 if (!$name) { // add this check.
    echo('Invalid query: ' . mysql_error());
}

   $no=1;
	while ($exp=$database->fetch_array($name)){ 
 $user=$database->query("SELECT *  FROM `students` WHERE `id`='{$exp['student_id']}' AND `account_status` = 1"); // use the student_id in student_Clas to get the details of student in students tables//
 if (!$name) { // add this check.
    echo('Invalid query: ' . mysql_error());
}
$user=$database->fetch_array($user);
$user=$user['username'];

?>
	<tr>
 <td><div align="center"><?php echo $no;?></div> </td>
 
  <?php $no++; ?>
    <td><div align="left"><?php echo $exp['fullname'];?></div></td>
   <td><div align="left"><?php echo $user;?></div> </td>

    
  </tr>
  
    
     <?php }?>
     
 
</table><br><p><br><p>
                     
           
				                                                                                                                                  

            
 
<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div>
<!--/row-->
    <!-- content ends --><!--/#content.col-md-0--><!--/fluid-row-->

    <!-- Ad, you can remove it -->