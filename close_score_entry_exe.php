<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>  
 <?php 
global $database;
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	$qry=$database->query("SELECT `status` FROM `score_entry_status`
	 WHERE `session_id` ='{$sess_id}' AND `term_id`= '{$term_id}' ");

	
	if($qry){
		if($database->num_rows($qry)== 1){
			$error_array[]='Score entry for this term has been closed already';
			$error_flag=true;
		}
	}
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('close_score_entry.php');
		exit();
	}
	// creat session
	$qry="INSERT INTO `score_entry_status`( `status`, `session_id`, `term_id`) 
	VALUES ('1', '{$sess_id}', '{$term_id}' )";
	$qry=$database->query($qry);
		$session->message("Score entry has been successfully closed for the term.  ");
		redirect_to('close_score_entry.php');
		exit();

	?>