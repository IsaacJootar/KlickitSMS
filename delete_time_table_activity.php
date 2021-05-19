<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>


       <?php
	$id=$_GET['id'];
	//del session
	global $database;
	if($database->query("DELETE FROM `time_table_activity` WHERE `id`='{$id}'")){
		$session->message("Time Table Activity has been successfully removed");
		redirect_to('time_table.php');
		exit();
	
	}


								
	?>	