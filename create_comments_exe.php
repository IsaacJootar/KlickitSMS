<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/comments_manager.php'); ?>



<?php
 global $database;
     $comments=new commentsManager();
	 $comments->section_id=$_POST['sec'];
	 $comments->f_comment=$_POST['f_comment'];
	 $comments->p_comment=$_POST['p_comment'];
	 $comments->starts=$_POST['starts'];
	 $comments->ends=$_POST['ends'];
	 $comments->descp=$_POST['desc'];
	
	 
	
	// creat session
	if($comments->create()){
		$session->message("commenting Format has been created successfully ");
		redirect_to('result_comments.php');
		exit();
	
	}
	?>