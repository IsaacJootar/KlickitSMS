<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/class_manager.php'); ?>


  <?php
 $class_name=$_SESSION['class_name'];
 $qst=$_POST['qst'];
		  for($i=0;$i<count($qst);$i++){
		global $database;
		 $student_id=$qst[$i];
			
	$qry=$database->query("DELETE  FROM `students` WHERE `id` = $student_id");				
	$qry1=$database->query("DELETE  FROM `student_class` WHERE `student_id`=$student_id");
	$qry2=$database->query("DELETE  FROM `student_subjects` WHERE `student_id`=$student_id ");
    $qry3=$database->query("DELETE  FROM `system_roles` WHERE `user_id` =$student_id");
	$qry4=$database->query("DELETE  FROM `score_entry` WHERE `student_id` =$student_id");
	$qry5=$database->query("DELETE  FROM `activity_rate` WHERE `student_id` =$student_id");
	$qry6=$database->query("DELETE  FROM `acc_student_bus` WHERE `student_id` =$student_id");
	$qry7=$database->query("DELETE  FROM `acc_student_fees` WHERE `student_id` =$student_id");
	$qry8=$database->query("DELETE  FROM `notification` WHERE `student_id` =$student_id");
	
	

	
					 
				if(!$qry3){
					echo mysql_error();
				}
			
		  }
			
	

			
			$session->message("Selected  student(s) have been successfully deleted");
		redirect_to('delete_students.php');
		exit();
	?>	





