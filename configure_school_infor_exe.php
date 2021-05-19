<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/schoolInformation.php'); ?>


 <?php 

global $database;
$infor=new schoolInformation();
$infor->school_name=$_POST['sch_name']; 
$infor->school_address=$_POST['sch_address']; 

if($infor->save()){
		}
	$session->message("school Information has been updated");
		redirect_to('configure_school_infor.php');
		exit();
	
		
	?>