<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/term_manager.php'); ?>
       <?php
	$id=$_GET['id'];
	$term=termManager::find_by_id($id);
	//del session
	if($term->delete()){
		$session->message("Term has been successfully deleted");
		redirect_to('delete_term.php');
		exit();
	
	}

								
	?>	