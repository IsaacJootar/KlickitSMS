<?php ob_start();?>
<?php session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

    $role=$_SESSION['SESS_USER_ROLE'];
include('includes/config2.php') ;
  ?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
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

 $_SESSION['sess'];
             $_SESSION['term'];
             $_SESSION['class_name'];
              $_SESSION['student_id'];
              
              $check_sec=mysql_fetch_array(mysql_query("SELECT `section_id` FROM `class_section` WHERE `class_name`='{$_SESSION['class_name']}'"));
 $sec_id=$check_sec['section_id'];
             global $database;
             
$rows=$database->query("SELECT * FROM `score_entry`
 WHERE `session_id`='{$_SESSION['sess']}'
 AND `term_id` ='{$_SESSION['term']}' 
 AND `class_name`='{$_SESSION['class_name']}' 
 AND `student_id`='{$_SESSION['student_id']}'");
$row=$database->fetch_array($rows);
           if(!$rows){
             echo 'error generating result, please check and confirm if the student took exams for the term, or try later.'. mysql_query();
             exit();
           }
          $s_id= $row['student_id'];
      
  $data=mysql_fetch_array(mysql_query("SELECT `fullname`,`id` FROM `students` WHERE `id`='$s_id'"));
 $student_class=$_SESSION['class_name'];
    
       
        ?>

           <?php
					
			$sql2=mysql_query("SELECT distinct `score_entry`. `student_id`, `score_entry`. `account_status`, `students`. `fullname` FROM `score_entry` JOIN `students` ON `score_entry`. `student_id`=`students`. `id` WHERE `class_name`= '{$_SESSION['class_name']}'
       AND `session_id`='{$_SESSION['sess']}' 
       AND `term_id`='{$_SESSION['term']}'
       AND `score_entry`. `account_status`=1 ORDER BY trim(fullname) ASC");

	  while($stu=mysql_fetch_array($sql2)){ ?>
                         
                            <?php 	
					$student_id= $stu['student_id'];
					$sql3=mysql_query("SELECT `subject_name` FROM `subject_class` WHERE  `class_name`='{$_SESSION['class_name']}' ");
	  		while($sub=mysql_fetch_array($sql3)){
				
				$sub=$sub['subject_name'];
				
				 ?>
                            
                            <?php 
            $sql4=mysql_query("SELECT * FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_SESSION['class_name']}' AND `subject_name` = '{$sub}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'");
	  		     $scores=mysql_fetch_array($sql4);
		?>
                
                
                
               
                            
                            <?php  }?>
                            
                                                        <?php 
														
					//query table for Total score z
														
											  
            $sql7=mysql_query("SELECT SUM(term_total) AS total FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'");
	  		     $total=mysql_fetch_array($sql7);?> 	
														
														
      
                <?php
                //query table for  average//
               
				$query1=mysql_fetch_array(mysql_query("SELECT SUM(term_total) AS total FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'"));
				
			$query2=mysql_num_rows(mysql_query("SELECT distinct `subject_name` FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'"));
		?>
                
                            <?php  if ($query2 < 0){$av=0.00;} 
							  if ($query2 > 0){$av=number_format((float)$query1['total']/$query2, 2, '.', '');}		
	

				
				
				?>
                
                
         
            				   
				   <?php 		   
                $query3=mysql_query("SELECT distinct `class_name`, `term_id`, `session_id` FROM `score_entry_average` WHERE `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'");

 if($values=mysql_num_rows($query3) > 0){  
				
				// check if new students are available to be inserted first in the average table, bfor update can be carried out//
$query4="SELECT  * FROM `score_entry_average` WHERE `student_id`='{$student_id}' AND `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'";
		 $query4=mysql_query($query4);
		  if(mysql_num_rows($query4) < 1){
			$query4="INSERT INTO `score_entry_average` 
				(`student_id`, `class_name`,`session_id`, `term_id`, `average`) 
		VALUES ('{$student_id}', '{$_SESSION['class_name']}',       '{$_SESSION['sess']}', '{$_SESSION['term']}', '{$av}')" ;
												$result=mysql_query($query4);  
		  }
												
			$query5="UPDATE `score_entry_average` 
				SET
				 `student_id` = '$student_id',
				 `class_name`= '{$_SESSION['class_name']}',
				  `term_id`= '{$_SESSION['term']}',
				  `session_id` = '{$_SESSION['sess']}', 
				  `average`='{$av}'
				  WHERE `student_id`='{$student_id}' AND `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'
				   "; 
				   $result=mysql_query($query5);
				
		  }
 
 // if students are not already given average then we insert.//
				   if($values=mysql_num_rows($query3) < 1){ 
		
			
		$query6="INSERT INTO `score_entry_average` 
				(`student_id`, `class_name`,`session_id`, `term_id`, `average`) 
		VALUES ('{$student_id}', '{$_SESSION['class_name']}', '{$_SESSION['sess']}', '{$_SESSION['term']}', '{$av}') ";
			$result=mysql_query($query6);	
		   			}
		   		
					
		   
		   
	   
 
             ?><?php  
       
$query7="SELECT t1.student_id, (SELECT COUNT(*) FROM score_entry_average t2 WHERE t2.average > t1.average AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}' AND `class_name`= '{$_SESSION['class_name']}') +1 AS rank FROM score_entry_average t1 WHERE `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}' AND `class_name`= '{$_SESSION['class_name']}'

";
     $query7=mysql_query($query7);
     while ($pos=mysql_fetch_array($query7)){
      $user_id=$pos['student_id'];
        $pos=$pos['rank'];
    $query8="UPDATE `score_entry_average` 
        SET
          `pos`='{$pos}'
          WHERE `student_id`='{$user_id}' AND `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'
           "; 
           $result=mysql_query($query8);
     }
       ?>
           
           
     
                        
                     
                          <?php }?>
                          
            
               
         <style type="text/css">
        .print{
          height:320mm;
          width:210mm;
        
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
      echo' ';
  }
        if(!empty($file_name)){
       echo " <img src='images/$file_name' style='float:right' width='110' height='102' alt='student passport'>"; }
       
        ?>
      <h3 align="center"><?php echo $school_address=schoolInformation::find_school_name();

?> </h3>
        <h5 align="center">Address:<?php echo $school_address=schoolInformation::find_school_address();?> 

         </h5>
         
        
<?php require_once('classes/result_manager.php'); ?>
<?php require_once('classes/result_manager2.php'); ?>  

        <p align="center" style="color:#F00">ASSESSMENT /RESULT SHEET</p>
        <p align="center">
    TERMLY ACADEMIC REPORT ( <?php echo $info=resultManager::find_current_term($_SESSION['sess'],  $_SESSION['term']);?> )
       NEXT TERM BEGINS ( <?php echo $info=resultManager:: find_term_infor($_SESSION['sess'],  $_SESSION['term']); ?> )
</p>
 <p align="center"><a href="javascript:window.print()">[Print Out]</a></p>


  <tr class="transcriptheader hdsmall">
    <td width="141">Full Name:</td>
    <td width="206"><?php  echo $data['fullname']; ?></td>
    <td width="154">No. in Class:</td>
    <td width="155"><?php echo $pos=resultManager::find_num_in_class($s_id, $student_class,  $_SESSION['sess'],  $_SESSION['term']); ?> <font size="-4"></td>
   
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Gender:</td>
    <td><?php echo $gender=resultManager::find_student_gender_by_id($s_id); ?></td>
    <td>Session/Term:</td>
    <td><?php echo $st=resultManager::find_current_session($_SESSION['sess']);  ?>/<?php echo $term=resultManager::find_current_term($_SESSION['sess'],  $_SESSION['term']);  ?></td>
  </tr>
 <tr class="transcriptheader hdsmall">
    <td>Average:</td>
    <?php  $class=resultManager::find_student_class_by_id($s_id,  $_SESSION['sess'],  $_SESSION['term']); //find the student class first, then use it to find the average 
   $class['class_name']; ?>
   <td><?php echo $av=resultManager::find_student_average($s_id,  $class['class_name'],  $_SESSION['sess'],  $_SESSION['term']);  ?></td>
    <td>Total Score:</td>
<td><?php echo $term=resultManager::find_student_total_score($s_id,  $class['class_name'],  $_SESSION['sess'],  $_SESSION['term']);  ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Remark/Grade:</td>
    <td><?php  if($av > 40){ echo "Passed";} else {echo "Failed";}?></td>
    <td>Position:</td>
    <td><?php 
      
      
        $query9=mysql_fetch_array(mysql_query("SELECT `pos` FROM  `score_entry_average` WHERE `student_id`='{$s_id}' AND `class_name`='{$class['class_name']}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'"));  
$position= $query9['pos'];  
  
if (substr($position, -1) == 1 && $position != 11){
     		echo $position.'st';
			} elseif(substr($position, -1) == 2 && $position != 12){
    		 echo  $position.'nd';
			} elseif(substr($position, -1) == 3 && $position != 13){
     		echo $position.'rd';
			}else {
     		echo $position.'th';
			}
    
    ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Class Highest Average</td>
    <td><?php echo resultManager::find_class_highest_average($s_id,  $class['class_name'],  $_SESSION['sess'],  $_SESSION['term']);?></td>
     <td>Class Lowest Average</td>
   <td><?php echo resultManager::find_class_lowest_average($s_id,  $class['class_name'],  $_SESSION['sess'],  $_SESSION['term']);?></td>
  </tr>
</table>
                 <table  border="1"  class="Tborder"; style="line-height:1;">
                    <tr class="transcriptheader hdsmall" bgcolor="#CCCCCC" valign="top"; style="vertical-align:top" align="center">
    <td><div align="center"><strong>SN</strong></div></td>
    <td width="900"><div align="center"><strong>Subjects</strong></div></td>

    <?php $ca_name= mysql_fetch_array(mysql_query("SELECT * FROM `dossier_assessment_usage` WHERE 
    `section_id`= '{$sec_id}' 
    AND `term_id`= '{$_SESSION['term']}' 
    AND `dossier_name`= '{$_SESSION['dossier_name']}' AND `session_id`=  '{$_SESSION['sess']}' "));?>
    <td width="350"><div align="center"><strong><?php echo $ca_name['CA1'];?><br></strong></div></td>
   <td width="350"><div align="center"><strong><?php echo $ca_name['CA2'];?><br></strong></div></td>
<td width="350"><div align="center"><strong><?php echo $ca_name['CA3'];?><br></strong></div></td>

   
    <td><div align="center"><strong>Exam<br></strong></div></td>
    <td width="100"><div align="center"><strong>Term total<br>100 </strong></div></td>
    <td><strong>Grade</strong></td>
    <td><div align="center"><strong>Position <br>in <br>subject</strong></div></td>
    <td><div align="center"><strong>Highest <br>in<br>class</strong></div></td>
   <td><div align="center"><strong>Lowest <br>in<br>class</strong></div></td>
    <td width="180"><div align="center"><strong>Subject teacher's remark</strong></div></td>
      <?php //echo $st['class_name']; ?>
  </tr>
   <?php  
 
   $no=1;
   $all=resultManager::find_student_all_by_id($s_id, $class['class_name'],  $_SESSION['sess'],  $_SESSION['term']);
  while ($student=mysql_fetch_array($all)){ ?>
  <tr bgcolor="#99CCCC">
 <td><div align="center"><?php echo $no;?></div> </td>
    <td><div align="left"><?php echo $student['subject_name'] . '</br>';$no++; ?></div></td>
    <td><div align="center"><?php echo $subj=$student['CA1'];?></div></td>
   <td><div align="center"><?php echo $subj=$student['CA2'];?></div></td>
    <td><div align="center"><?php echo $subj=$student['CA3'];?></div></td>

   
   
    <td><div align="center"><?php echo $subj=$student['exam']; ?></div></td>
    <td><div align="center"><?php  echo $subj=$student['term_total'];?></div></td>
    <td><div align="center"><?php echo $subj=$student['grade']; ?></div></td>
   
  <td><div align="center"><?php echo resultManager::find_position_in_subject($s_id,$class['class_name'], $student['subject_name'], $student['term_total'], $_SESSION['sess'],  $_SESSION['term']);?></div></td>
    <td><div align="center">
<?php $rank=mysql_fetch_array(mysql_query("SELECT * FROM `score_entry` WHERE `session_id`='{$_SESSION['sess']}' AND `term_id` = '{$_SESSION['term']}' AND `subject_name` = '{$student['subject_name']}' AND `class_name` = '{$student_class}' ORDER BY `term_total` DESC LIMIT 1  "));
    if(!$rank){echo "error". mysql_error();}
    echo $rank['term_total']; // highest in class

  
  ?></div></td>
    <td><div align="center">
<?php $rank=mysql_fetch_array(mysql_query("SELECT * FROM `score_entry` WHERE `session_id`='{$_SESSION['sess']}' AND `term_id` = '{$_SESSION['term']}' AND `subject_name` = '{$student['subject_name']}'  AND `class_name` = '{$student_class}' ORDER BY `term_total` ASC LIMIT 1  "));
    if(!$rank){echo "error". mysql_error();}
    echo $rank['term_total']; // lowest in class
   ?></div></td>
    <td><div align="left"><?php echo ucfirst(strtolower($subj=$student['remark'])); } // end while loop?></div></td>
  </tr>
  <?php ?>
    
     
     
 
</table>
                   
                       
                    
                    
                        
                        
                        
                        
                                        
   
                  
                 <p>
                   <?php $sql=mysql_query("SELECT `activity_rate`.`activity_id`, `activity`. `activity_name`, `activity_rate`.`rate` FROM `activity_rate` JOIN `activity` ON `activity_rate`.`activity_id` = `activity`. `id` WHERE `activity_rate`. `student_id`='$s_id'  AND `term_id`=  '{$_SESSION['term']}' AND `sess_id`=  '{$_SESSION['sess']}' LIMIT 25");  if(!$sql){ echo mysql_error();};
         
         
      
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
                 </p>
                
                 <table width="790" class="tablee" align="center"   border="1" style="line-height:0.2">
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
                        
                     <p>Class Teacher's Remark: <i><b><?php echo $av=resultManager::find_formaster_remark($s_id,  $class['class_name'],  $_SESSION['sess'],  $_SESSION['term']);  ?></b></i></p>
                    <p>Head Teacher's Remark:: <i><b><?php echo $av=resultManager::find_principal_remark($s_id,  $class['class_name'],  $_SESSION['sess'],  $_SESSION['term']);  ?></b></i></p>
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