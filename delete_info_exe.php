<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/term_info_manager.php'); ?>

       <?php
	$id=$_GET['id'];
	$info=termInforManager::find_by_id($id);
	//del session
	if($info->delete()){
		$session->message("Term Information has been successfully deleted");
		redirect_to('delete_term_info.php');
		exit();
	
	}

								
	?>	