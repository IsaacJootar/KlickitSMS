<?php include('includes/t_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/result_manager2.php'); ?>
<?php require_once('includes/config2.php'); ?> <?php 
 
 $class=$_SESSION['cat'];
  $subject_name=$_SESSION['subcat']; //initialize error array//			
		
  $qst=$_POST['qst'];
 	for($i=0;$i<count($qst);$i++){
		$qid=$qst[$i];
		$exam=$_POST["$qid". "exam"]; 
		$grading=resultManager2::grading_student_by_id($exam, $qid, $subject_name,$class);						
		
	}	
		$session->message("Examination Scores have been successfully saved ");
		redirect_to('t_exam.php');
		exit();
		
			

?>
