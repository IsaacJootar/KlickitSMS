<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/class_manager.php'); ?>


  <?php
  $qry=$database->query("DELETE t1 FROM score_entry t1 INNER JOIN score_entry t2 WHERE t1.id < t2.id 
AND t1.student_id=        t2.student_id 
AND t1.subject_name= t2.subject_name AND 
t1.class_name= t2.class_name 
AND 
t1.term_id= t2.term_id
AND 
t1.term_id= $term_id");				
	
	
if(!$qry){
echo 'An error occured, try again'. mysql_error();
exit();
}else{
								
$session->message("Abnormalities in master score sheet has been successfully resolved");
redirect_to('resolve_scoresheet.php');
exit();
}
	?>