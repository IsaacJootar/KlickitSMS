<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>


       <?php
	$result=$database->query("INSERT INTO `time_table_activity` (`activity`)
						      SELECT `subject_name` FROM `subjects`");
			
			$session->message("Activities have been successfully imported from school subjects.");
		redirect_to('time_table.php');
		
			
	
			


								
	?>	