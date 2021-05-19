<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/asses_manager.php'); ?>



 <?php 
 global $database;
     $asses=new assesManager();
	 $asses->section_id=$_POST['sec'];
	 $asses->ca_num=$_POST['ca_num'];
	 $asses->ca_score=$_POST['ca_score'];
	 $asses->exam_score=$_POST['exam_score'];
	 
	
	 
	
	// creat session
	if($asses->create()){
		$session->message("Assesment Format has been saved successfully ");
		redirect_to('asses.php');
		exit();
	
	}
	?>