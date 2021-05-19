<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>

       <?php
	$id=$_GET['id'];
	//del session
	global $database;
	if($database->query("DELETE FROM `maximum_attendance` WHERE `id`='{$id}'")){
		$session->message("Max. attendance has been successfully deleted");
		redirect_to('max_attendance.php');
		exit();
	
	}

								
	?>	