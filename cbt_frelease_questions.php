<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>


  <?php
$tittle_text=$_POST['tittle_text']; 
$duration=$_POST['duration'];

$qry=$database->query("UPDATE `cbt_question_tittle`
					SET `status` = 1,  
					 `duration`='{$duration}'
					WHERE `tittle_text`='{$tittle_text}'");
					 
				if(!$qry){
					echo 'Test could not release test to students, try again'.mysqli_error();
				}
				
				
	    $session->message("Test successfully released to students");
		redirect_to('cbt_fview_questions.php');
		exit();
	?>	