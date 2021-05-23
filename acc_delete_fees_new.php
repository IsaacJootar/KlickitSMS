<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>


       <?php
	$student_id=$_GET['id'];
	//del session
	global $database;
	 $sess_id = $_GET['sess'];
	 $term_id = $_GET['term'];
	if($database->query("DELETE FROM `acc_school_fees_payments` 
		WHERE `sess_id`='{$sess_id}' 
 		AND  `term_id`= '{$term_id}' 
 		AND `status`=0 
 		AND `student_id` = '{$student_id}'")){
		$session->message("school fees payment record has been deleted successfully ");
		redirect_to('acc_pay_fees_new2.php');
		exit();
	
	}


								
	?>	