<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>


       <?php
	$id=$_GET['id'];
	//del tuition fee
	global $database;
	if($database->query("DELETE FROM `acc_configure_school_fees_items` WHERE `id`='{$id}'")){
		$session->message("item has been successfully deleted");
		redirect_to('acc_config_other_fee_items_new.php');
		exit();
	
	}


								
	?>	