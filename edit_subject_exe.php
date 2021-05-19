<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/subject_manager.php'); ?>


 <?php 
 $id=$_POST['subj_id'];

global $database;
   $subj=subjectManager::find_by_id($id);


   $former_name=$subj->subject_name;

   $subject_name=ucwords($_POST['subj_name']);
	$update=$database->query("UPDATE `subject_class` SET `subject_name`= '{$subject_name}'
   							 WHERE `subject_name`='{$former_name}'");
	$update=$database->query("UPDATE `student_subjects` SET `subject_name`= '{$subject_name}'
   							 WHERE `subject_name`='{$former_name}' AND `session_id`='{$sess_id}'
   							 AND `term_id`='{$term_id}' ");

	$update=$database->query("UPDATE `subject_teacher` SET `subject_name`= '{$subject_name}'
   							 WHERE `subject_name`='{$former_name}'");


	$subj->subject_name=ucwords($_POST['subj_name']);
	 
	 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('subject.php');
		exit();
	}
	// creat session
	if($subj->update()){
		$session->message("Subject Name has been updated successfully ");
		redirect_to('subject.php');
		exit();
	
	}
	else {
		$session->message("No change has been made on subject Name ");
		redirect_to('subject.php');
		exit();
	
	}
	?>