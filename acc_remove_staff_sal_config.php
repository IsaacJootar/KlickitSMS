<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/accountschoolFees.php'); ?>

       <?php
	  global $database;
	$staff_id=$_GET['id'];
	$del=$database->query("UPDATE `acc_staff_payroll` SET `salary_amount` =0.00,  `account_number`='' WHERE  `staff_id`='{$staff_id}'");
	
		$session->message("Staff salary configuration has been successfully removed");
		redirect_to('acc_pr_config_staff_sal.php');
		exit();

								
	?>	