<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/staff_manager.php'); ?>


       <?php
	   
	   $staff=staffManager::find_by_id($_SESSION['id']);
	   
	$staff->fullname= $_POST['firstname'];
	$staff->firstname =$_POST['firstname'];
	$staff->residential = 	$_POST['residential'];
	$staff->contact = 	$_POST['contact'];
	//$staff->country = $_POST['country'];
	$staff->state = 	$_POST['state'];
	$staff->lga = 	$_POST['lga'];
	$staff->phone = 	$_POST['phone'];
	$staff->email = $_POST['email'];
	$staff->next_of_kin=$_POST['next_of_kin'];
	$staff->num_of_kin = 	$_POST['num_of_kin'];
	$staff->status = 	$_POST['status'];
	
	//update staff
	if($staff->update()){
		$session->message("Staff record has been successfully updated");
		redirect_to('manage_staff.php');
		exit();
	
	}

								
	?>	