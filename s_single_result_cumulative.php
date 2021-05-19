<?php ob_start();?>
<?php session_start();
$s_id=$_SESSION['SESS_USER'];
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

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
   
   
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
  <?php require_once('classes/schoolInformation.php'); ?>
<?php
global $database;

                 $_SESSION['term']=$_GET['term_id'];
                 $_SESSION['sess']= @$_GET['sess_id'];
                $_SESSION['student_id']=$_GET['student_id'];
        // get student class as at that time//
$class=mysql_fetch_array(mysql_query("SELECT `class_name` FROM `student_class` WHERE `student_id`='{$_SESSION['student_id']}'"));
 $class=$class['class_name'];

             global $database;
$rows=$database->query("SELECT * FROM `score_entry` WHERE `session_id`='{$_SESSION['sess']}' AND `term_id` ='{$_SESSION['term']}' AND `class_name`='{$class}' AND `student_id`='{$_SESSION['student_id']}' ");
           if(!$rows){
             echo 'error'. mysql_query();
             exit();
           }
          
      
            
          $s_id= $_SESSION['student_id'];
      
  $data=mysql_fetch_array(mysql_query("SELECT `fullname`,`id` FROM `students` WHERE `id`='$s_id'"));

    
        
            
       
        ?>


         <style type="text/css">
        .print{
          height:320mm;
          width:210mm;
          page-break-after: always;
        
        }
        
         </style>
         <div class="print">
           <table  class="table table-striped" align="center" style="font-weight: 1" >
                   

      <img src="images/jet.jpg" alt="" width="110" height="102" align="left"/>
      
      
        <?php
        global $database;         
    $query=mysql_query("SELECT id, student_id, file_name FROM `student_passports` WHERE `student_id`=$s_id  ORDER BY id DESC");
    $file_name=mysql_fetch_array(($query));
    $file_name=$file_name['file_name'];
      if(empty($file_name)){
      echo'';
  }
        if(!empty($file_name)){
       echo " <img src='images/$file_name' style='float:right' width='110' height='102' alt='student passport'>"; }
       
        ?>
     <?php
     echo  '<h3 align="center">';
     echo $school_address=schoolInformation::find_school_name();
     echo '</h3>';
    ?>
        <h5 align="center">Address:<?php echo $school_address=schoolInformation::find_school_address();?> 

         </h5>
         
        
<?php require_once('classes/result_manager.php'); ?>
<?php require_once('classes/result_manager2.php'); ?>  
<?php require_once('classes/result_manager_cumulative.php'); ?> 

        <p align="center" style="color:#F00">CUMULATIVE ASSESSMENT/RESULT SHEET</p>
        <p align="center">
</p>
 <p align="center"><a href="javascript:window.print()">[Print Out]</a></p>


  <tr class="transcriptheader hdsmall">
    <td width="141">Full Name:</td>
    <td width="206"><?php  echo $data['fullname']; ?></td>
    <td width="154">No. in Class:</td>
    <td width="155"><?php echo $pos=resultManagerCumulative::find_num_in_class($s_id, $class,  $_SESSION['sess']); ?> <font size="-4"></td>
   
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Gender:</td>
    <td><?php echo $gender=resultManagerCumulative::find_student_gender_by_id($s_id); ?></td>
    <td>Session:</td>
    <td><?php echo $st=resultManagerCumulative::find_current_session($_SESSION['sess']);  ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Cum.Average:</td>
    <?php  $class=resultManagerCumulative::find_student_class_by_id($s_id,  $_SESSION['sess']); //find the student class first, then use it to find the average 
   $class['class_name']; ?>
   <td><?php echo $cum_av=resultManagerCumulative::find_student_average($s_id,  $class['class_name'],  $_SESSION['sess']);  ?></td>
    <td>Result Type:</td>
    <td>Cumulative</td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Cum. Remark:</td>
    <td><?php  if($cum_av >= 50){ echo "Passed";} else {echo "Failed";}?></td>
    <td>Class:</td>
    <td><?php 
      echo $class['class_name']
   ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Class Highest Average</td>
    <td><?php echo resultManagerCumulative::find_class_highest_average($s_id,  $class['class_name'],  $_SESSION['sess']);?></td>
     <td>Class Lowest Average</td>
   <td><?php echo resultManagerCumulative::find_class_lowest_average($s_id,  $class['class_name'],  $_SESSION['sess']);?></td>
  </tr>
</table>
                 <table  border="1"  class="Tborder"; style="line-height:1;">
                    <tr class="transcriptheader hdsmall" bgcolor="#CCCCCC" valign="top"; style="vertical-align:top" align="center">
    <td><div align="center"><strong>SN</strong></div></td>
    <td width="900"><div align="center"><strong>Subjects</strong></div></td>
    
  
    <td width="350"><div align="center"><strong>1st Term<br></strong></div></td>
   <td width="350"><div align="center"><strong>2nd Term<br></strong></div></td>

   
   <td width="350"><div align="center"><strong>3rd Term<br></strong></div></td>

    <td width="100"><div align="center"><strong>Cum. total<br> </strong></div></td>
     
    <td><div align="center"><strong>Position <br>in <br>subject</strong></div></td>
    <td><div align="center"><strong>Highest <br>in<br>class</strong></div></td>
   <td><div align="center"><strong>Lowest <br>in<br>class</strong></div></td>
   <td><strong>Grade</strong></td>
    <td width="180"><div align="center"><strong>Subject teacher's remark</strong></div></td>
      <?php //echo $st['class_name']; ?>
  </tr>
   <?php  
 
   $no=1;
   $all=resultManagerCumulative::find_student_all_by_id($s_id, $class['class_name'],  $_SESSION['sess'],  $_SESSION['term']);
  while ($student=mysql_fetch_array($all)){ ?>
  <tr bgcolor="#99CCCC">
 <td><div align="left"><?php echo $no;?></div> </td>
    <td><div align="left"><?php echo $student['subject_name'] . '</br>';$no++; ?></div></td>
    <td><div align="center"><?php echo $third=resultManagerCumulative::find_first_term_total_score($s_id, $class['class_name'], $student['subject_name'], $_SESSION['sess']);?></div></td>
   <td><div align="center"><?php echo $third=resultManagerCumulative::find_second_term_total_score($s_id, $class['class_name'], $student['subject_name'], $_SESSION['sess']);?></div></td>
    <td><div align="center"><?php echo $third=resultManagerCumulative::find_third_term_total_score($s_id, $class['class_name'], $student['subject_name'], $_SESSION['sess']);?></div></td>
   
   
    <td><div align="center">
     <?php echo $total=resultManagerCumulative::find_cum_total_score($s_id, $class['class_name'], $student['subject_name'], $_SESSION['sess']);?>
    </div></td>
   
   
  <td><div align="center"><?php echo resultManagerCumulative::find_position_in_subject($s_id, $class['class_name'], $student['subject_name'], $total, $_SESSION['sess']);?></div></td>
    <td><div align="center">
        <?php echo resultManagerCumulative::find_class_highest_in_subject($s_id, $class['class_name'], $student['subject_name'], $_SESSION['sess']);?>
</div></td>
    <td><div align="center">
  <?php echo resultManagerCumulative::find_class_lowest_in_subject($s_id, $class['class_name'], $student['subject_name'], $_SESSION['sess']);?></div></td>
    <td><div align="left"><?php echo resultManagerCumulative::find_grade_by_student_id($s_id, $class['class_name'], $student['subject_name'], $total);?></div></td>
    <td><div align="center"><?php echo resultManagerCumulative::find_remark_by_student_id($s_id, $class['class_name'], $student['subject_name'], $total); } // end while loop?></div></td>
  </tr>
  
    
     
     
 
</table>
                   
                       
                    
                    
                        
                        
                        
                        
                                        
   
                  
                
                  
                   </table>
                 <br>
                        
<p>Class Teacher's Remark: <i><b><?php echo resultManagerCumulative::find_formaster_remark($s_id,  $class['class_name'], $cum_av);  ?></b></i></p>
<p>Head Teacher's Remark: <i><b><?php echo resultManagerCumulative::find_principal_remark($s_id,  $class['class_name'], $cum_av);  ?></b></i></p>
                   <p align="right"><strong>Head Teacher's signature<?php
           $sign=mysql_fetch_array(mysql_query("SELECT * FROM `images`"));
    $sign=$sign['file_name'];
      if(!empty($sign)){
    ?>
   <img src="images/<?php echo $sign;?>" width="200" height="40">
     <?php }
     else{
     echo '';
     }
     ?>
    </strong></p>
                   
                   
   
</div>
                 
              
                 <p>&nbsp;</p>
               </div>
             </div>
           
         </font>
         </td></tr>
         </table>
         </div>      

            
          
          
        </div>
    </div>
</div>

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
    <!-- content ends --><!--/#content.col-md-0--><!--/fluid-row-->
