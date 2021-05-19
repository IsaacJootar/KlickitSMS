<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>


 <?php 

global $database;
	$coo_amount=$_POST['coo_amount']; // amount for cooperative
	
	 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	// check sec_id 
	$check_id=$database->query("SELECT `id` FROM `acc_pr_coo`");
	if($check_id=$database->num_rows($check_id) > 0){
	$error_array[]='Cooperative fee has already been configured!';
		$error_flag=true;
	}
	
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('acc_pr_coo.php');
		exit();
	}
	
	
	$qry=$database->query("INSERT INTO `acc_pr_coo`(`coo_amount`) VALUES ('{$coo_amount}')");
		
		$session->message("Cooperative fee has been successfully configured ");
		redirect_to('acc_pr_coo.php');
		exit();
	
	?>