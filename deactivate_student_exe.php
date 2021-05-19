<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/class_manager.php'); ?>


  <?php
   $qst=$_POST['qst']; 
 	for($i=0;$i<count($qst);$i++){
		global $database;
		 $student_id=$qst[$i];
	$qry=$database->query("UPDATE `students` SET `account_status` = 0 
		WHERE `id`='{$student_id}'");
	$qry=$database->query("UPDATE `student_class` SET `account_status` = 0 
		WHERE `student_id`='{$student_id}'");
	$qry=$database->query("UPDATE `student_subjects` SET `account_status` = 0 
		WHERE `student_id`='{$student_id}'");
	$qry=$database->query("UPDATE `system_roles` SET `account_status` = 0 
		WHERE `user_id`='{$student_id}'");
					
				if(!$qry){
					echo mysql_error();
					exit();
				}
				
						
}
			
			$session->message("Student(s)  Account(s)  Successfully Deactivated");
		redirect_to('deactivate_student.php');
		exit();
	?>	