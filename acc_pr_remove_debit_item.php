<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>

       <?php
	  global $database;
	  $id=$_GET['id'];
	$del=$database->query("DELETE FROM `acc_pr_debit_items` WHERE `id`= $id ");
	
		$session->message("Debit item has been successfully deleted");
		redirect_to('acc_pr_create_debit_items.php');
		exit();

								
	?>	