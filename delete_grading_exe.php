<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/grading_manager.php'); ?>

       <?php
	$id=$_GET['id'];
	$grading=gradingManager::find_by_id($id);
	//del session
	if($grading->delete()){
		$session->message("Grade Format has been successfully deleted");
		redirect_to('grading.php');
		exit();
	
	}

								
	?>	