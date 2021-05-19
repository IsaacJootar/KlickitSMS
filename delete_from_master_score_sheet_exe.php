<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/class_manager.php'); ?>


  <?php
 $class_name=$_POST['cat'];
  $subject_name=$_POST['subcat'];
	$qry=$database->query("DELETE  FROM `score_entry` WHERE `subject_name` = '{$subject_name}' AND `class_name` = '{$class_name}' AND `session_id` = $sess_id AND `term_id`= $term_id");				
	
	
		if(!$qry){
			echo 'An error occured, try again'. mysql_error();
				}
			
		
			
	

			
			$session->message("Scores have been successfully deleted from the master score sheet");
		redirect_to('delete_from_master_score_sheet.php');
		exit();
	?>	





