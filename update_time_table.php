<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/class_manager.php'); ?>


  <?php
	$id=$_POST['id'];
	 $starts=$_POST['starts'];
       $starts = date('h:i A', strtotime($starts));
       $ends=$_POST['ends'];
       $ends= date('h:i A', strtotime($ends));	
	$qry=$database->query("UPDATE `time_table`
					SET `starts` = '{$starts}', 
				         `ends` = '{$ends}'
					WHERE `id`='{$id}' 
					AND `term_id`='{$term_id}'
					AND `sess_id`='{$sess_id}'");
					 
				if(!$qry){
					echo 'Could not update time table, try again'.mysql_error();
				}
				
					
			
			$session->message("Time Table is successfully updated");
		redirect_to('remove_time_table_activity.php');
		exit();
	?>	