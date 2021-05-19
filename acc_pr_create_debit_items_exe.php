<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>


 <?php 

global $database;
	$item=$_POST['item']; // item for debit
	$time=date('M j, Y h:i:s A', time());
	
	 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	// check sec_id 
$check=$database->query("SELECT * FROM `acc_pr_debit_items` WHERE `item`='{$_POST['item']}'");
	if($check=$database->num_rows($check) > 0){
	$error_array[]='This debit item has already been created!';
		$error_flag=true;
	}
	
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('acc_pr_create_debit_items.php');
		exit();
	}
	
	
	$qry=$database->query("INSERT INTO `acc_pr_debit_items`(`item`, `created_on`) VALUES ('$item','{$time}')");
		
		$session->message("Debit item has been successfully created ");
		redirect_to('acc_pr_create_debit_items.php');
		exit();
	
	?>