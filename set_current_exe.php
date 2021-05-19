<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/session_manager.php'); ?>
<?php require_once('classes/database.php'); ?>


    



       <?php
	   global $database;
	$id=$_GET['id'];		
	$qry=$database->query("SELECT id, status FROM `session_manager` WHERE `status`='Current Session'");
	$qry=$database->fetch_array($qry);
	$qry=$qry['id'];
	$qry=$database->query("UPDATE `session_manager`
					SET `status` = 'Old Session'
					WHERE `id`='{$qry}'
					");
	
	$qry=$database->query("UPDATE `session_manager`
					SET `status` = 'Current Session'
					WHERE `id`='{$id}';
	");

// go to the account section and change every student to a 
	
	$qry=$database->query("UPDATE `students` SET `status` = 1");


$qry=$database->query("UPDATE `student_class` SET `status` = 1");

				  
		$session->message(" Current Session has been successfully set");
		redirect_to('set_current.php');
		exit();
	


								
	?>	