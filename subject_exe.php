<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/subject_manager.php'); ?>


 <?php 
global $database;
    $subj=new subjectManager();
	 $subj->subject_name=ucwords($_POST['subject_name']);
	 $subj->created_by='Administrator';
	 $subj->created_on= date('M j, Y h:i:s A', time());
	 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	if (isset( $subj->subject_name) && ( $subj->subject_name=='')){
		$error_array[]='Type in  a subject name!';
		$error_flag=true;
	
	}
	$qry=$database->query("SELECT `subject_name` FROM `subjects` WHERE `subject_name`='{$_POST['subject_name']}'");

	
	if($qry){
		if($database->num_rows($qry)== 1){
			$error_array[]='This subject is already created';
			$error_flag=true;
		}
	}
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('subject.php');
		exit();
	}
	// creat session
	if($subj->create()){
		$session->message("Subject has been created successfully ");
		redirect_to('subject.php');
		exit();
	
	}
	?>