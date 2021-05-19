<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/asses_manager.php'); ?>


       <?php
	$id=$_GET['id'];
	$asses=assesManager::find_by_id($id);
	//del session
	if($asses->delete()){
		$session->message("Assesments Format has been successfully deleted");
		redirect_to('asses.php');
		exit();
	
	}

								
	?>	