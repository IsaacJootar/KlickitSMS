<?php include('includes/t_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/staff_manager.php'); ?>


       <?php
	   
	   $staff=staffManager::find_by_id($id);
	   
	$staff->firstname = $_POST['firstname'];
	$staff->othername = 	$_POST['othername'];
	$staff->lastname = 	$_POST['lastname']; 
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
	
	//del staff
	if($staff->update()){
		$session->message("Staff record has been successfully updated");
		redirect_to('update_staff_.php');
		exit();
	
	}

								
	?>	