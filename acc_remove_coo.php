<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/accountschoolFees.php'); ?>

       <?php
	  global $database;
	$del=$database->query("DELETE FROM `acc_pr_coo`");
	
		$session->message("Cooperative configuration has been successfully removed");
		redirect_to('acc_pr_coo.php');
		exit();

								
	?>	