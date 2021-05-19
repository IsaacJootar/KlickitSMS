<?php ob_start();?>
<?php session_start();
$id=$_SESSION['SESS_USER'];
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
 if(!isset($_SESSION['SESS_USER'])){
	  header('location:index.php');
	  exit();
	  }
    $role=$_SESSION['SESS_USER_ROLE'];
include('includes/config2.php') ;
	?>
  <?php require_once('classes/schoolInformation.php'); ?>
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
<?php require_once('classes/result_manager2.php'); ?>
<?php require_once('classes/schoolInformation.php'); ?>
<?php //require_once('includes/config.php'); ?>


      <div id="content" class="col-lg-10 col-sm-11">
            <!-- content starts -->
   


    <div class="box col-md-14">
       
       
            
            <div class="box-content row">
                
                 
               
             <div class="box col-md-11">
               <div class="box-inner">
                
                 <div class="box-content">
                 
				 		
            <?php


					  $sess_id=$_SESSION['sess_id'];
					  $term_id=$_SESSION['term_id'];
					 $s_id=$_SESSION['s_id'];
					$data=mysql_fetch_array(mysql_query("SELECT `fullname`, `class_name` FROM `student_class` WHERE `student_id`='{$s_id}'"));
				
					  
			 
			  ?>
                  <table  class="table table-striped" align="center">
                   
<tr class="transcriptheader hdsmall">
 <td rowspan="1" ><img src="images/jet.jpg" alt="" width="125" height="119" align="left"/></td>
      <th colspan="5" style="color:#600"><h2 align="center" style="color:#600"><?php echo $school_address=schoolInformation::find_school_name();

?> </h2>
        <p align="left">
        <h5 align="center" style="color:#600">Address: <?php echo $school_address=schoolInformation::find_school_address();?> 

        </p>
        </h5></p>
 <div align="center"><a href="javascript:window.print()">[Student Report Print Out]</a></div>
       <div align="right">NEXT TERM BEGINS ( <?php echo $info=resultManager2:: find_term_infor($sess_id, $term_id) ?> )</div></div></th>
    </tr>



  <tr class="transcriptheader hdsmall">
    <td width="141">Full Name:</td>
    <td width="206"><?php  echo $data['fullname']; ?></td>
    <td width="154">N0. in Class:</td>
    <td width="155"><?php echo $pos=resultManager2::find_num_in_class($s_id,  $data['class_name'], $sess_id, $term_id); ?> <font size="-4"></td>
   
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Gender:</td>
    <td><?php echo $gender=resultManager2::find_student_gender_by_id($s_id); ?></td>
    <td>Session:</td>
    <td><?php echo $st=resultManager2::find_current_session();  ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Average:</td>
    <?php  $class=resultManager2::find_student_class_by_id($s_id, $sess_id, $term_id); //find then student class first, then use it to find the average 
	 $class['class_name']; ?>
    <td><?php echo $av=resultManager2::find_student_average($s_id,  $class['class_name'], $sess_id, $term_id);  ?></td>
    <td>Term:</td>
    <td><?php echo $term=resultManager2::find_current_term();  ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Remark/Grade:</td>
    <td><?php  if($av > 40){ echo "Passed";} else {echo "Failed";}?></td>
    <td>Class:</td>
    <td><?php 
			echo $class['class_name']
	 ?></td>
  </tr>
   <tr class="transcriptheader hdsmall">
    <td>Class Highest Score</td>
    <td><?php echo resultManager2::find_class_highest_score($s_id,  $class['class_name'], $sess_id, $term_id);?></td>
    <td>Student's Total  Score</td>
   <td><?php echo resultManager2::find_student_total_score($s_id,  $class['class_name'], $sess_id, $term_id);?></td>
  </tr>
 
</table>
                 <table width="860"  border="1" align="center" style="line-height:1">
                    <tr class="transcriptheader hdsmall" bgcolor="#CCCCCC" valign="top"; style="vertical-align:top" align="center">
    <td><div align="center"><strong>SN</strong></div></td>
    <td width="800"><div align="center"><strong>Subjects</strong></div></td>
    <td width="350"><div align="center"><strong>Test 1<br>10</strong></div></td>
   <td width="350"><div align="center"><strong>Test 2<br>10</strong></div></td>
    <td><div align="center"><strong>Exam<br>60</strong></div></td>
    <td width="190"><div align="center"><strong>Term total<br>100 </strong></div></td>
    <td><strong>Grade</strong></td>
    <td><div align="center"><strong>Position <br>in <br>subject</strong></div></td>
    <td><div align="center"><strong>Highest <br>in<br>class</strong></div></td>
   <td><div align="center"><strong>Lowest <br>in<br>class</strong></div></td>
    <td width="180"><div align="center"><strong>Subject teacher's remark</strong></div></td>
    	<?php //echo $st['class_name']; ?>
  </tr>
   <?php  
 
   $no=1;
   $all=resultManager2::find_student_all_by_id($s_id, $class['class_name'], $sess_id, $term_id);
	while ($student=mysql_fetch_array($all)){ ?>
	<tr bgcolor="#99CCCC">
 <td><div align="center"><?php echo $no;?></div> </td>
    <td><div align="center"><?php echo $student['subject_name'] . '</br>';$no++; ?></div></td>
    <td><div align="center"><?php echo $subj=$student['CA1'];?></div></td>
   <td><div align="center"><?php echo $subj=$student['CA2'];?></div></td>
   
  
    <td><div align="center"><?php echo $subj=$student['exam']; ?></div></td>
    <td><div align="center"><?php  echo $subj=$student['term_total'];?></div></td>
    <td><div align="center"><?php echo $subj=$student['grade']; ?></div></td>

   
	<td><div align="center"><?php echo resultManager2::find_position_in_subject($s_id,$class['class_name'], $student['subject_name'], $student['term_total'], $sess_id, $term_id);?></div></td>
    <td><div align="center"><?php
		$rank=mysql_fetch_array(mysql_query("SELECT * FROM `score_entry` WHERE `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `subject_name` = '{$student['subject_name']}' ORDER BY `term_total` DESC LIMIT 1  "));
		if(!$rank){echo "error". mysql_error();}
		echo $rank['term_total']; // highest in class

	
	?></div></td>
    <td><div align="center"><?php $rank=mysql_fetch_array(mysql_query("SELECT * FROM `score_entry` WHERE `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `subject_name` = '{$student['subject_name']}' AND `class_name`= '{$class['class_name']}' ORDER BY `term_total` ASC LIMIT 1  "));
		if(!$rank){echo "error". mysql_error();}
		echo $rank['term_total']; // lowest in class//
	 ?></div></td>
    <td><div align="center"><?php echo ucfirst(strtolower($subj=$student['remark'])); } // end while loop?></div></td>
  </tr>
	<?php ?>
    
     
     
 
</table>
                     
                      
                 <?php $sql=mysql_query("SELECT `activity_rate`.`activity_id`, `activity`. `activity_name`, `activity_rate`.`rate` FROM `activity_rate` JOIN `activity` ON `activity_rate`.`activity_id` = `activity`. `id` WHERE `activity_rate`. `student_id`='$s_id' LIMIT 25");  if(!$sql){ echo mysql_error();};
				 
				 
			
	$rows =mysql_num_rows($sql);    // Find total rows returned by database
	if($rows > 0) {
		$cols = 5;    // Define number of columns
		$counter = 1;     // Counter used to identify if we need to start or end a row
		$nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns
		?>
 
  <style type="text/css">
	 
	 tablee {
    border-collapse: collapse;
	
}
th, td {
    padding: 0;
	
}

</style>
 
                 <table width="860" class="tablee" align="center"   border="1" style="line-height:0.2">
                 <br>
                 <?php
		while ($row =mysql_fetch_array($sql)) {
			if(($counter % $cols) == 8) {    // Check if it's new row
				echo '<tr>';	
			}
                  
			echo '<td>'. $row['activity_name'].'</td>';
				echo '<td>'. $row['rate'].'</td>';
			if(($counter % $cols) == 0) { // If it's last column in each row then counter remainder will be zero
				
				echo '</tr>';
			
			}
			$counter++;    // Increase the counter
		}
		
                echo '</table>';
	}
?>
				
                  
                   </table>

<br>
                        
                    
                    <p>Class Teacher's Remark: <i><b><?php echo $comment=resultManager2::find_result_comment_by_id($s_id, $sess_id, $term_id); ?></b></i></p>
                    <p>Principal's Remark: <i><b><?php echo $av=resultManager2::find_principal_remark_by_id($s_id,  $class['class_name'], $sess_id, $term_id);  ?></b></i></p>
                   <p align="right"><strong>Principal's signature<?php
				   $sign=mysql_fetch_array(mysql_query("SELECT * FROM `images`"));
	  $sign=$sign['file_name'];
      if(!empty($sign)){
	  ?>
	 <img src="images/<?php echo $sign;?>" width="200" height="30">
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
           
               

            
          
          
        </div>
    </div>
</div>

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
    <!-- content ends --><!--/#content.col-md-0--><!--/fluid-row-->

    <!-- Ad, you can remove it -->
   
 <?php include('includes/footer.php'); ?>>