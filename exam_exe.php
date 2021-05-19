<?php ob_start();?>
<?php session_start();?>
 <?php include('includes/header.php'); ?>
<?php include('includes/term_info.php'); ?>
<?php include('classes/session.php'); ?>
<?php include('classes/functions.php'); ?>
<?php include('classes/database.php'); ?>
<?php include('classes/result_manager.php'); ?>
<?php include('includes/config2.php'); ?>
 <?php 
 
 $class=$_SESSION['cat'];
  $subject_name=$_SESSION['subcat']; //initialize error array//			
		
  $qst=$_POST['qst'];
 	for($i=0;$i<count($qst);$i++){
		$qid=$qst[$i];
		$exam=$_POST["$qid". "exam"]; 
		$grading=resultManager::grading_student_by_id($exam, $qid, $subject_name,$class);						
		
	}
			
			
		$session->message(" Examination Scores have been successfully saved ");
		redirect_to('exam.php');
		exit();
		
			

?>
