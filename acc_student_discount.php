<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/accountschoolFees.php'); ?>


 <?php 

global $database;
$discount=$_POST['discount'];
$student_id=$_SESSION['student_id'];
$sess=$sess_id;
$term=$term_id;

 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	

	$discount=$database->query("UPDATE `acc_student_fees` SET `discount`= $discount  WHERE `sess_id`='{$sess}' AND `term_id`= '{$term}' AND `student_id`='{$student_id}'");
		
		$session->message("₦{$_POST['discount']} discount has been successfully made for this student ");
		redirect_to('acc_students_fees2.php?fullname=' . $_SESSION['fullname'].'&&id='. $student_id);
		exit();
	
		
	?>