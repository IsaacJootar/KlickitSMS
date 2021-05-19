<?php ob_start();?>
<?php session_start();
$id=$_SESSION['SESS_USER'];
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_STRICT & ~E_DEPRECATED);

    $role=$_SESSION['SESS_USER_ROLE'];
    
include('includes/config2.php') ;
require_once('classes/schoolInformation.php'); ?>
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

    $sess_id=$_GET['sess_id'];
    $term_id=$_GET['term_id'];
    $week= $_GET['week'];
    $class_name= $_GET['class_name'];
  global $database;
  ?>
   <?php 
  $dates=$result=$database->query("SELECT * FROM `student_attendance` WHERE `class_name`='{$class_name}' AND `sess_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `week`='{$week}'");
  $dates=$database->fetch_array($dates);

  
  ?>
<table class="table table-striped table-bordered" align="center" width="965">
                   
<tr>
 <td width="141" rowspan="1" ><img src="images/jet.jpg" alt="" width="125" height="119" align="left"/></td>
     
      <th colspan="5" style="color:#600"><h2 align="center" style="color:#600"><?php echo $school_address=schoolInformation::find_school_name();

?> </h2>
        <p align="left">
        <h5 align="center" style="color:#600">Address: <?php echo $school_address=schoolInformation::find_school_address();?> 

        </p>
        </h5></p>
 <div align="center"><a href="javascript:window.print()">[print or save]</a></div>
 <hr>
      <tr class="transcriptheader hdsmall">
    <td>DOCUMENT TYPE::</td>
   
    <td width="206"> <?php echo 'Weekly Attendance Sheet';?></td>
    <td width="154">RETRIEVAL STATUS :</td>
    <td width="155"><?php echo "<span class='label-success label label-default'>Successful</span>"; ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>CLASS NAME:</td>
    <td><?php echo $class_name; ?></td>
    <td>DURATION:</td>
    <td><?php 
      echo 'Week'. ' '. $week . ' '. '('. $dates['Mon_date']. '--'.$dates['Fri_date'].')';
   ?></td>
  </tr>
</table>
<p>
 
                 <table class="table table-striped table-bordered" width="965"  border="1" align="center" style="line-height:1">
                   <tr class="transcriptheader hdsmall"  valign="top"; style="vertical-align:top" align="center">
                     <td width="36"><div align="center"><strong>#</strong></div></td>
                       <td width="207"><div align="left"><strong>Student's Name</strong></div></td>
    <td width="207"><div align="left"><strong>Mon</strong></br>
      <?php echo $dates['Mon_date']; ?></div></td>
     <td width="207"><div align="left"><strong>Tue</strong></br><?php echo $dates['Tue_date']; ?></div></td>
  
   <td width="207"><div align="left"><strong>Wed</strong></br><?php echo $dates['Wed_date']; ?></div></td>
  
   <td width="207"><div align="left"><strong>Thu</strong></br><?php echo $dates['Thu_date']; ?></div></td>
  
   <td width="207"><div align="left"><strong>Fri</strong></br><?php echo $dates['Fri_date'];?></div></td>
    <td width="207"><div align="left"><strong>Weekly Total</strong></div></td>
  
  
  
    
  </tr>
   <?php  
 global $database;
   $no=1;
     $sql=$result=$database->query("SELECT * FROM `student_attendance` WHERE `class_name`='{$class_name}' AND `sess_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `week`='{$week}'");

  while ($values=$database->fetch_array($sql)) {
 
 $st=$database->fetch_array($database->query("SELECT `id`, `student_id`, `fullname` FROM `student_class` WHERE `student_id` = '{$values['student_id']}' AND `account_status` = 1 ORDER BY trim(fullname) ASC "))
?>
  <tr>
 <td><div align="center"><?php echo $no;?></div> </td>
 
  <?php $no++; ?>
<td><div align="left"><?php echo  $st['fullname']; ?></div></td>
<td><div align="left"><?php output_sign($values['Mon'])?></div> </td>
<td><div align="left"><?php output_sign($values['Tue'])?></div> </td>
<td><div align="left"><?php output_sign($values['Wed'])?></div> </td>
<td><div align="left"><?php output_sign($values['Thu'])?></div> </td>
<td><div align="left"><?php output_sign($values['Fri'])?></div> </td>
<td><div align="left"><?php output_total($st['student_id'], $term_id, $class_name, $week)?></div> </td>


  
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