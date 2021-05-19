<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>


       <?php
	$id=$_GET['id'];
	//del session
	global $database;
	if($database->query("DELETE FROM `time_table` WHERE `id`='{$id}'")){
		$session->message("Time Table setup has been successfully removed");
		redirect_to('remove_time_table_activity.php');
		exit();
	
	}


								
	?>	