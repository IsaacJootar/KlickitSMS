<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>

       <?php
	$id=$_GET['id'];
	//del duration
	global $database;
	if($database->query("DELETE FROM `config_term_duration` WHERE `id`='{$id}'")){
		$session->message("Term duration has been successfully deleted");
		redirect_to('config_attendance.php');
		exit();
	
	}

								
	?>	