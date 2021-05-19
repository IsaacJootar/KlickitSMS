<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/grading_manager.php'); ?>



<?php
 global $database;
     $grading=new gradingManager();
	 $grading->section_id=$_POST['sec'];
	 $grading->grade=$_POST['grade'];
	 $grading->starts=$_POST['starts'];
	 $grading->ends=$_POST['ends'];
	 $grading->descp=$_POST['desc'];
	
	 
	
	// creat session
	if($grading->create()){
		$session->message("Grading Format has been created successfully ");
		redirect_to('grading.php');
		exit();
	
	}
	?>