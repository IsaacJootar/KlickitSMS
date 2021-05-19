<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>


       <?php
	echo $id=$_GET['id'];
	//del tui
	global $database;
	if($database->query("DELETE FROM `acc_configure_tuition_fees` WHERE `id`='{$id}'")){
		$session->message("Tuition fee has been successfully deleted");
		redirect_to('acc_config_fees_new.php');
		exit();
	
	}


								
	?>	