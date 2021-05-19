<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>


       <?php
       $section_id=$_POST['section_id'];
       $day=$_POST['day'];
       $starts=$_POST['starts'];
       $starts = date('h:i A', strtotime($starts));
       $ends=$_POST['ends'];
       $ends= date('h:i A', strtotime($ends));
       $activity=ucwords($_POST['activity']);

       $section_id=$_POST['section_id'];
	$result=$database->query("INSERT INTO `time_table` (`section_id`, `day`, `starts`, `ends`, `sess_id`, `term_id`, `activity`)
						   VALUES ('{$section_id}', '{$day}', '{$starts}', '{$ends}', '{$sess_id}', '{$term_id}', '{$activity}')");
			
			$session->message("Time table for $day  have been successfully created.");
		redirect_to('create_time_table.php');
		
			
	
			


								
	?>	