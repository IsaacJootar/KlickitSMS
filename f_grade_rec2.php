<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>

<?php
			  
 
 $class=$_SESSION['cat'];
  $subj=$_SESSION['subcat'];
  $qst=$_POST['qst'];
  
 	for($i=0;$i<count($qst);$i++){
		$qid=$qst[$i];
		$rec_grade=$_POST["$qid". "rec_grade"]; 
		
		if($rec_grade=="F"){$remark='Fail';}
		elseif($rec_grade=="E"){$remark='Pass';}
		elseif($rec_grade=="D"){$remark='Fair';}
		elseif($rec_grade=="C"){ $remark='Good';}
		elseif($rec_grade=="B"){ $remark='Very Good';}
		elseif($rec_grade=="A"){$remark='Excellent';}
		else{$grade=''; $remark=''; }

		
		
		
			
		$query="INSERT INTO `score_entry` 
				(`staff_id`, `class_name`, `subject_name`,`session_id`, `term_id`, `student_id`, `grade`, `remark`) 
				VALUES ('{$id}', '$class', '$subj', '{$sess_id}', '{$term_id}' , '$qid', '{$rec_grade}', '{$remark}')";
			$result=mysql_query($query);
						
	}
		   		
					
		   if(!$result){
			 echo mysql_error();
			}
						
		$session->message("Students have been successfully  graded");
		redirect_to('f_exam.php');
		exit();
			


?>

