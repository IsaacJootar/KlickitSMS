<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>


       <?php
	$id=$_GET['id'];
	//del session
	global $database;
	if($database->query("DELETE FROM `activity_affective` WHERE `id`='{$id}'")){
		$session->message(" Affective Activity has been successfully removed");
		redirect_to('create_activity.php');
		exit();
	
	}


								
	?>	