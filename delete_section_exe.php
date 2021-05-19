<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/section_manager.php'); ?>



       <?php
	$id=$_GET['id'];
	$sec=sectionManager::find_by_id($id);
	//del session
	if($sec->delete()){
		$session->message("Section has been successfully deleted");
		redirect_to('delete_section.php');
		exit();
	
	}


								
	?>	