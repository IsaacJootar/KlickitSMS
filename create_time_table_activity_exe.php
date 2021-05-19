<?php include('includes/header.php'); ?>
<?php require_once('classes/section_manager.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config2.php'); ?>

  
 <?php 

  $activity=ucfirst(strtolower($_POST['activity']));
 $activity=ucwords($_POST['activity']);
					$result=$database->query("INSERT INTO `time_table_activity` (`activity`) 
						VALUES ('{$activity}')");
			
			$session->message("Activity has been successfully saved.");
		redirect_to('time_table.php');
		
			
	
			
			
			 ?>