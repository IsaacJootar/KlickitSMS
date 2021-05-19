<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/student_manager.php'); ?>


       <?php
	   
	   $student =studentManager::find_by_id($_SESSION['id']);
	   
	$student->firstname = $_POST['firstname'];
	$student->othername = 	$_POST['othername'];
	$student->lastname = 	$_POST['lastname'];
	//$student->gender = 	$_POST['gender'];
	//$student->present_class = 	$_POST['subcat'];
	//$student->date_of_birth = ($_POST['DAY']) . - ($_POST['MONTH']) . -($_POST['YEAR']); 
	$student->residential = 	$_POST['residential'];
	$student->contact = 	$_POST['contact'];
	//$student->country = $_POST['country'];
	$student->state = 	$_POST['state'];
	$student->lga = 	$_POST['lga'];
	$student->phone = 	$_POST['phone'];
	$student->email = $_POST['email'];
	$student->father_name=$_POST['father_name'];
	$student->father_address = 	$_POST['father_address'];
	$student->father_number =$_POST['father_number'];
	$student->father_occupation = 	$_POST['father_occupation'];
	$student->mother_name =$_POST['mother_name'];
	$student->mother_number = 	$_POST['mother_number'];
	$student->mother_occupation = 	$_POST['mother_occupation'];
	//$student->religion = 	$_POST['religion'];
	$student->health = 	$_POST['health'];
	//del session
	if($student->update()){
		$session->message("Student record has been successfully updated");
		redirect_to('manage_student.php');
		exit();
	
	}

								
	?>	