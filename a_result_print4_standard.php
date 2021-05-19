<?php ob_start();?>
<?php session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING &  ~E_STRICT & ~E_DEPRECATED);

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
<style>
.myTableBg4 { 
   background-image: url("faded.jpg") !important;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
  background-size: 900px 450px;
  }
  </style>
</head>

<body>


<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
  <?php require_once('classes/schoolInformation.php'); ?>
<?php


            $_SESSION['sess'];
            $_SESSION['term'];
            $_SESSION['class_name'];
            $_SESSION['dossier_name'];
            $check_sec=$database->fetch_array($database->query("SELECT `section_id` FROM `class_section` WHERE `class_name`='{$_SESSION['class_name']}'"));
            $sec_id=$check_sec['section_id'];
           
             global $database;
$rows=$database->query("SELECT `student_id` FROM `score_entry` WHERE `session_id`='{$_SESSION['sess']}'
             AND `term_id` ='{$_SESSION['term']}' AND `class_name`='{$_SESSION['class_name']}' 
             GROUP BY `student_id`");
             if(!$rows){echo 'error'. mysql_query(); }
           if(!$rows){
             echo 'error'. mysql_query();
             exit();
           }
           
           
           
           
           
					
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
           
           
     
                        
                     
                          <?php } // end of the first while loop ?>
           
           
         <?php  
           
           foreach($rows as $row){
      
            
          $s_id= $row['student_id'];
      
  $data=mysql_fetch_array(mysql_query("SELECT `fullname`,`id` FROM `students` WHERE `id`='$s_id'"));
 $student_class=$_SESSION['class_name'];
    
        
         
       
        ?>
      

<table class="myTableBg4"  border="1"  background=""style="line-height:1.1" align="center" style="background-repeat:no-repeat; background-position: center center;">
  <tr>
    <td width="915" height="477"><table width="1050" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
 
      <img src="images/jet.jpg" alt="" width="110" height="102" align="left"/>
      
      
        <?php
        global $database;         
    $query=mysql_query("SELECT id, student_id, file_name FROM `student_passports` WHERE `student_id`=$s_id  ORDER BY id DESC");
    $file_name=mysql_fetch_array($query);
    $file_name=$file_name['file_name'];
      if(empty($file_name)){
      echo'';
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
    <td>Class:</td>
    <td><?php 
      echo $class['class_name']
   ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Remark/Grade:</td>
    <td><?php  if($av > 40){ echo "Passed";} else {echo "Failed";}?></td>
    <td>Report Type:</td>
<td><?php echo "Termly"  ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Class Highest Average</td>
    <td><?php echo resultManager::find_class_highest_average($s_id,  $class['class_name'],  $_SESSION['sess'],  $_SESSION['term']);?></td>
     <td>Class Lowest Average</td>
   <td><?php echo resultManager::find_class_lowest_average($s_id,  $class['class_name'],  $_SESSION['sess'],  $_SESSION['term']);?></td>
  </tr>
</table><p>
<div align="center">ASSESSMENT OF COGNITIVE DOMAIN</div>
                 <table width="1050" align="center" border="1">
                    <tr>
    <td><div align="center">SN</div></td>
    <td width="900"><div align="center">Subjects</div></td>
    
   <?php 
$ca_name=mysql_fetch_array(mysql_query("SELECT * FROM `dossier_assessment_usage` 
WHERE `section_id`= '{$sec_id}' 
AND `term_id`= '{$_SESSION['term']}' 
AND `dossier_name`='{$_SESSION['dossier_name']}' 
AND `session_id`='{$_SESSION['sess']}' "));
?>
<td width="350"><div align="center"><?php echo $ca_name['CA1'];?><br>(<?php echo $ca_name['score1'];?> marks)</div></td>
<td width="350"><div align="center"><?php echo $ca_name['CA2'];?><br>(<?php echo $ca_name['score2'];?> marks)</div></td>
<td width="350"><div align="center"><?php echo $ca_name['CA3'];?><br>(<?php echo $ca_name['score3'];?> marks)</div></td>
<td width="350"><div align="center"><?php echo $ca_name['CA4'];?><br>(<?php echo $ca_name['score4'];?> marks)</div></td>
<td width="350"><div align="center">Exam<br>(<?php echo $ca_name['exam'];?> marks)</div></td>
    <td width="100"><div align="center">Term total<br>(100)</div></td>
     <td><div align="center">Highest <br>in<br>class</div></td>
   <td><div align="center">Lowest <br>in<br>class</div></td>
    <td><div align="center">Position <br>in <br>subject</div></td>
    <td>Grade</td>
   
   
    <td width="180"><div align="center">Subject teacher's remark</div></td>
      <?php //echo $st['class_name']; ?>
  </tr>
   <?php  
 
   $no=1;
   $all=resultManager::find_student_all_by_id($s_id, $class['class_name'],  $_SESSION['sess'],  $_SESSION['term']);
  while ($student=mysql_fetch_array($all)){ ?>
  <tr>
 <td><div align="left"><?php echo $no;?></div> </td>
    <td><div align="left"><?php echo $student['subject_name'] . '</br>';$no++; ?></div></td>
    <td><div align="center"><?php echo $subj=$student['CA1'];?></div></td>
   <td><div align="center"><?php echo $subj=$student['CA2'];?></div></td>
    <td><div align="center"><?php echo $subj=$student['CA3'];?></div></td>
    <td><div align="center"><?php echo $subj=$student['CA4'];?></div></td>
  
    
   
   
    <td><div align="center"><?php echo $subj=$student['exam']; ?></div></td>
    <td><div align="center"><?php  echo $subj=$student['term_total'];?></div></td>
  
   
  
  <td><div align="center">
<?php $rank=mysql_fetch_array(mysql_query("SELECT * FROM `score_entry` WHERE `session_id`='{$_SESSION['sess']}' AND `term_id` = '{$_SESSION['term']}' AND `subject_name` = '{$student['subject_name']}' AND `class_name` = '{$student_class}' ORDER BY `term_total` DESC LIMIT 1  "));
    if(!$rank){echo "error". mysqli_error($con);}
    echo $rank['term_total']; // highest in class

  
  ?></div></td>
    <td><div align="center">
<?php $rank=mysql_fetch_array(mysql_query("SELECT * FROM `score_entry` 
  WHERE `session_id`='{$_SESSION['sess']}' AND `term_id` = '{$_SESSION['term']}' 
  AND `subject_name` = '{$student['subject_name']}'  AND `class_name` = '{$student_class}' ORDER BY `term_total` ASC LIMIT 1"));
    if(!$rank){echo "error". mysql_error();}
    echo $rank['term_total']; // lowest in class
   ?></div></td>
   <td><div align="center"><?php echo resultManager::find_position_in_subject($s_id,$class['class_name'], $student['subject_name'], $student['term_total'], $_SESSION['sess'],  $_SESSION['term']);?></div></td>
     <td><div align="left"><?php echo $subj=$student['grade']; ?></div></td>

    
    <td><div align="center"><?php echo ucfirst(strtolower($subj=$student['remark'])); } // end while loop?></div></td>
  </tr>
  <?php ?>
      </tr>
    </table>
      <p>&nbsp;</p>
      <?php
// display activity ratings table when rating is done, use rate on psychomotor table to determine, if a student is not rated on it, dont display the table
$check_psycho=mysql_num_rows(mysql_query("SELECT * FROM `activity_rate_psychomotor` WHERE `student_id`='{$s_id}' AND `sess_id`='{$_SESSION['sess']}' AND `term_id` = '{$_SESSION['term']}'"));

if($check_psycho < 2){ 
echo "";
}else {  ?>
      <table width="910" border="0">
        <tr>
          <td width="195" height="250"><table width="195" border="1">
            <caption style="color:#0000FF">
              AFFECTIVE RECORDS
              </caption>
            <tr>
              <td style="font-size: 10px"><strong>SKILL/BEHAVIOUR</strong></td>
              <td  width="10">1</td>
              <td width="10">2</td>
              <td width="10">3</td>
              <td width="9">4</td>
              <td width="12">5</td>
            </tr>

            <?php $sql=mysql_query("SELECT `activity_rate_affective`.`activity_id`, `activity_affective`. `activity_name`, `activity_rate_affective`.`rate` FROM `activity_rate_affective` JOIN `activity_affective` ON `activity_rate_affective`.`activity_id` = `activity_affective`. `id` WHERE `sess_id`='{$_SESSION['sess']}' AND `term_id` = '{$_SESSION['term']}' AND `student_id`='{$s_id}' LIMIT 5 OFFSET 0");  if(!$sql){ echo mysql_error();};
         
       $check='<img src="images/check.png" alt="" width="13" height="13"/>';
        echo '</tr>';
          while ($row =mysql_fetch_array($sql)) {
            echo '<tr>';
              echo '<td style="font-size: 11px">'. $row['activity_name'].'</td>';
            if($row['rate']==1){echo '<td>'.$check.'</td>';
               }else{echo '<td>'. ''.'</td>';}
             if($row['rate']==2){echo '<td>'. $check.'</td>';
               }else{echo '<td>'. ''.'</td>';}
             if($row['rate']==3){echo '<td>'. $check.'</td>';
               }else{echo '<td>'. ''.'</td>';}
             if($row['rate']==4){echo '<td>'. $check.'</td>';
               }else{echo '<td>'. ''.'</td>';}
             if($row['rate']==5){echo '<td>'. $check.'</td>';
               }else{echo '<td>'. ''.'</td>';}
             
           echo '</tr>'; 
         }?>

          </table></td>
          <?php $sql=mysql_query("SELECT `activity_rate_affective`.`activity_id`, `activity_affective`. `activity_name`, `activity_rate_affective`.`rate` FROM `activity_rate_affective` JOIN `activity_affective` ON `activity_rate_affective`.`activity_id` = `activity_affective`. `id` WHERE `sess_id`='{$_SESSION['sess']}' AND `term_id` = '{$_SESSION['term']}' AND `student_id`='{$s_id}' LIMIT 10 OFFSET 5");  if(!$sql){ echo mysql_error();} ?>
          
          <td width="206"><table width="206" border="1">
              <caption style="color:#0000FF">
              AFFECTIVE RECORDS
              </caption>
             <tr>
              <td style="font-size: 10px"><strong>SKILL/BEHAVIOUR</strong></td>
              <td width="10">1</td>
              <td width="10">2</td>
              <td width="10">3</td>
              <td width="9">4</td>
              <td width="12">5</td>
            </tr>
              <?php
             echo '</tr>';
          while ($row =mysql_fetch_array($sql)) {
            echo '<tr>';
              echo '<td style="font-size: 11px">'. $row['activity_name'].'</td>';
            if($row['rate']==1){echo '<td>'.$check.'</td>';
               }else{echo '<td>'. ''.'</td>';}
             if($row['rate']==2){echo '<td>'. $check.'</td>';
               }else{echo '<td>'. ''.'</td>';}
             if($row['rate']==3){echo '<td>'. $check.'</td>';
               }else{echo '<td>'. ''.'</td>';}
             if($row['rate']==4){echo '<td>'. $check.'</td>';
               }else{echo '<td>'. ''.'</td>';}
             if($row['rate']==5){echo '<td>'. $check.'</td>';
               }else{echo '<td>'. ''.'</td>';}
             
           echo '</tr>'; 
         }?>

          </table></td>
          <td width="210"><table width="210" border="1">
               <caption style="color:#0000FF">
              PSYCHOMOTOR RECORDS
              </caption>
             <tr>
         
              <td style="font-size: 11px"><strong>SKILL/BEHAVIOUR</strong></td>
              <td width="10">1</td>
              <td width="10">2</td>
              <td width="10">3</td>
              <td width="9">4</td>
              <td width="12">5</td>
            </tr>
             <?php $sql2=mysql_query("SELECT `activity_rate_psychomotor`.`activity_id`, `activity_psychomotor`. `activity_name`, `activity_rate_psychomotor`.`rate` FROM `activity_rate_psychomotor` JOIN `activity_psychomotor` ON `activity_rate_psychomotor`.`activity_id` = `activity_psychomotor`. `id` WHERE `sess_id`='{$_SESSION['sess']}' AND `term_id` = '{$_SESSION['term']}' AND `student_id`='{$s_id}'");  if(!$sql2){ echo mysql_error();}
         
       $check='<img src="images/check.png" alt="" width="13" height="13"/>';
        echo '</tr>';
          while ($row =mysql_fetch_array($sql2)) {
            echo '<tr>';
              echo '<td style="font-size: 10px">'. $row['activity_name'].'</td>';
            if($row['rate']==1){echo '<td>'.$check.'</td>';
               }else{echo '<td>'. ''.'</td>';}
             if($row['rate']==2){echo '<td>'. $check.'</td>';
               }else{echo '<td>'. ''.'</td>';}
             if($row['rate']==3){echo '<td>'. $check.'</td>';
               }else{echo '<td>'. ''.'</td>';}
             if($row['rate']==4){echo '<td>'. $check.'</td>';
               }else{echo '<td>'. ''.'</td>';}
             if($row['rate']==5){echo '<td>'. $check.'</td>';
               }else{echo '<td>'. ''.'</td>';}
             
           echo '</tr>'; 
         }?>

          </table></td>
          <td width="200"><table width="210" height="229" border="1">
               <caption style="color:#0000FF">
              KEY GRADES
              </caption>
            <tr>
              <td width="98">Score</td>
              <td width="71">Grade</td>
              <td width="71">Category</td>
            </tr>
             <?php $grading=mysql_query("SELECT * FROM `grading` WHERE `section_id`='{$sec_id}'");  if(!$grading){ echo mysql_error();};
        echo '</tr>';
          while ($row =mysql_fetch_array($grading)) {
            echo '<tr>';
              echo '<td style="font-size: 10px">'. $row['starts'].'-'.''.$row['ends'].'</td>';
           
            echo '<td style="font-size: 10px">'. $row['grade'].'</td>';
            echo '<td style="font-size: 10px">'. $row['descp'].'</td>';
           
             
           echo '</tr>'; 
         }?>
            
          </table></td>
        </tr>
      </table>
      <?php } // end of rate display  ?>
      <p>&nbsp;</p>
      <table width="908" border="0">
        <tr>
          <td width="238" height="31">CLASS TEACHER'S COMMENT:</td>
          <td width="660"><?php echo $av=resultManager::find_formaster_remark($s_id,  $class['class_name'],  $_SESSION['sess'],  $_SESSION['term']);  ?></td>
        </tr>
        <tr>
          <td height="35">HEAD TEACHER'S COMMENT:</td>
          <td><?php echo $av=resultManager::find_principal_remark($s_id,  $class['class_name'],  $_SESSION['sess'],  $_SESSION['term']);  ?></td>
        </tr>
         <tr align="right">
          <td height="35">PRINCIPAL'S SIGNATURE:</td>
          <td><?php $sign=mysql_fetch_array(mysql_query("SELECT * FROM `images`"));
    $sign=$sign['file_name'];
      if(!empty($sign)){
    ?>
   <img src="images/<?php echo $sign;?>" width="200" height="40">
     <?php }
     else{
     echo '';
     }?></td>
        </tr>
       
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
</table>

<p>&nbsp;</p>
<?php } ?>
</body>
</html>

            
          
          
 