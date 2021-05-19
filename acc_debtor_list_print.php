<?php ob_start();?>
<?php session_start();
$id=$_SESSION['SESS_USER'];
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_STRICT & ~E_DEPRECATED);
    
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
<?php require_once('classes/accountschoolFees.php'); ?>

<!-- content starts -->

  <?php

    $sess_id=$_GET['sess_id'];
    $term_id=$_GET['term_id'];
    $class_name= $_GET['class_name'];
    $s_type=$_GET['s_type'];
 
  ?>
   
<table class="table table-striped table-bordered" align="center" width="965">
                   
<tr>
 <td width="141" rowspan="1" ><img src="images/jet.jpg" alt="" width="125" height="119" align="left"/></td>
     
      <th colspan="5" style="color:#600"><h2 align="center" style="color:#600"><?php echo $school_address=schoolInformation::find_school_name();

?> </h2>
        <p align="left">
        <h5 align="center" style="color:#600">Address: <?php echo $school_address=schoolInformation::find_school_address();?> 

        </p>
        </h5>
 <div align="center"><a href="javascript:window.print()">[print or save]</a></div>
 <hr>
      <tr class="transcriptheader hdsmall">
    <td>DOCUMENT TYPE::</td>
   
    <td width="206"> <?php echo 'Debtor List.(' . get_session_term($_GET['sess_id'], $_GET['term_id']) ?> Academic Session )</td>
    <td width="154">RETRIEVAL STATUS :</td>
    <td width="155"><?php echo "<span class='label-info label label-default'>Successful</span>"; ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>CLASS NAME:</td>
    <td><?php echo $class_name; ?></td>
    <td>STUDENT TYPE:</td>
    <td><?php 
      echo accountschoolFees::find_student_type($s_type);
   ?></td>
  </tr>
</table>
<p>
 <table class="table table-striped table-bordered" width="965"  border="1" align="center" style="line-height:1">
                   
<thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Student</th>
                         <th>Registration N0.</th>
                          <th> Amount Paid (Tuition Only) </th>
                          <th>Balance (current term)</th>
                          <th>Balance (cummulative)</th>
                          
                          <th>Payment Status</th>
                       </tr>
                     </thead>


<?php 
    global $database;
  $reports=accountschoolFees::find_by_sql("SELECT * FROM `acc_school_fees_payments` 
    WHERE  `status`  $s_type  
    AND  `item_name` = 'tuition'
    AND `sess_id`='{$sess_id}' 
    AND  `term_id`= '{$term_id}' 
    AND `class_name` ='{$class_name}'  
    GROUP BY `student_id`" );

 foreach ($reports as $report) {  
   $query1="SELECT `fullname`, `username` FROM `students` WHERE `id`='{$report->student_id}'"; 
     $result1=$database->query($query1);
$fullname = $database->fetch_array($result1);

  ?>


         <td class="center"><?php  echo  $fullname['fullname'];  ?></td>
          <td class="center"><?php  echo  $fullname['username'];  ?></td>
         <td class="center"><?php  echo  format_currency($report->have_paid);  ?></td>
        
         <td class="center">

            <?php  // balance
                  if($report->have_paid < $report->expected_to_pay){
                   
                    echo  format_currency($report->expected_to_pay - $report->have_paid);
                  }
                  if($report->have_paid >= $report->expected_to_pay){
                   
                    echo "none";
                  }
                   ?>

         </td>
          <td class="center">

            <?php  echo accountschoolFees::find_student_total_balance_cummulative($report->student_id)
                   ?>

         </td>


<td> <?php 
  if($report->have_paid >= $report->expected_to_pay){
     
      echo "<span class='label-success label label-default'>Full Payment</span>";
  }
   
      if($report->have_paid < $report->expected_to_pay){
     
      echo "<span class='label-alert label label-default'>Part Payment</span>";
  }
    ?>
                           
         </td>                  
                           
                 
                     </tr>
                     <?php } // foreah?>
 
</table><br><p><br>

                     
           
                                                                                                                                          

            
 
<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div>
<!--/row-->
    <!-- content ends --><!--/#content.col-md-0--><!--/fluid-row-->

    <!-- Ad, you can remove it -->