<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/comments_manager.php'); ?>

       <?php
	$id=$_GET['id'];
	$comments=commentsManager::find_by_id($id);
	//del session
	if($comments->delete()){
		$session->message("Comment configuration format has been successfully deleted");
		redirect_to('result_comments.php');
		exit();
	
	}

								
	?>	