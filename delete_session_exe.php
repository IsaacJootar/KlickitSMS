<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/session_manager.php'); ?>


       <?php
	$id=$_GET['id'];
	$sess=sessionManager::find_by_id($id);
	//del session
	if($sess->delete()){
		$session->message("Session has been successfully deleted");
		redirect_to('delete_session.php');
		exit();
	
	}

								
	?>	