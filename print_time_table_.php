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
    $class_name= $_GET['class_name'];
  global $database;
  ?>
   <?php 
  $sections=$result=$database->query("SELECT `section_id`, `section_name` FROM `class_section` WHERE `class_name`='{$class_name}'");
  $section_id=$database->fetch_array($sections);
  $section_id=$section_id['section_id'];
 


  
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
   
    <td width="206"> <?php echo 'Student Time Table';?></td>
    <td width="154">RETRIEVAL STATUS :</td>
    <td width="155"><?php echo "<span class='label-success label label-default'>Successful</span>"; ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>CLASS NAME:</td>
    <td><?php echo $class_name; ?></td>
    <td>DURATION:</td>
    <td><?php 
      echo "Termly";
   ?></td>
  </tr>
</table>
<p>
 <table class="table table-striped table-bordered" width="965"  border="1" align="center" style="line-height:1">
                   
<?php  
$days=$database->query("SELECT * FROM  `time_table` WHERE `section_id`='{$section_id}'  GROUP BY `day` ORDER BY `id` ASC ");
while($day=$database->fetch_array($days)) { ?>
<tr>


<td><div align="left"><?php echo  $day['day']; ?></div></td>


<?php

$sql=$result=$database->query("SELECT * FROM  `time_table` WHERE `day`='{$day['day']}' AND `section_id`='{$section_id}'");
      while($time_table=$database->fetch_array($sql)){ ?> 
      
        <?php if ($time_table['activity']=='Break' || $time_table['activity']=='Break Time' || $time_table['activity']== 'Recess Time' || $time_table['activity']== 'Recess' || $time_table['activity']== 'Games Time' || $time_table['activity']== 'Games'){ echo '<td style="background-color:#F0E68C">';}else{ echo '<td>';} ?>


          <div align="left"><strong><?php echo $time_table['starts']; ?> - <?php echo $time_table['ends']; ?></strong><p><?php echo $time_table['activity']; ?></br>
      </div></td>
<?php } ?>





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