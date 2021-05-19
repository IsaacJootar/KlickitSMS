<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/accountschoolFees.php'); ?>

       <?php
	  global $database;
	$id=$_GET['id'];
	$del=$database->query("DELETE  FROM `acc_configure_school_fees`  WHERE  `id`='{$id}' AND `sess_id`='{$sess_id}' AND `term_id`= '{$term_id}'");
	
		$session->message("School fees configuration has been successfully removed");
		redirect_to('acc_school_fees.php');
		exit();

								
	?>	