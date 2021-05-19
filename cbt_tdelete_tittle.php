<?php include('includes/t_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>

       <?php
	$id=$_GET['id'];
	//del session
	global $database;
	if($database->query("DELETE FROM `cbt_question_tittle` WHERE `id`='{$id}'")){
		$session->message("`Question title  has been successfully deleted");
		redirect_to('cbt_tadd_tittle.php');
		exit();
	
	}

								
	?>	
