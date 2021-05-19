<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/accountschoolFees.php'); ?>


 <?php 

global $database;
	$sec_id=$_POST['sec_id']; // section id
	$expected_to_pay=$_POST['amount']; // amount exp to pay
	
	 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	// check sec_id 
	$check_id=$database->query("SELECT `sec_id` FROM `acc_configure_school_fees` WHERE `sec_id`= '{$sec_id}' AND `sess_id`='{$sess_id}' AND `term_id`= '{$term_id}' AND `status`=1");
	if($check_id=$database->num_rows($check_id) > 0){
	$error_array[]='School Fees for this section has already been configured!';
		$error_flag=true;
	}
	
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('acc_school_fees.php');
		exit();
	}
	
	$sec_name=$database->query("SELECT `sec_name` FROM `section` WHERE `id`= '{$sec_id}'");
	$sec_name=$database->fetch_array($sec_name);
	$sec_name=$sec_name['sec_name'];
	
	$qry=$database->query("INSERT INTO `acc_configure_school_fees`(`expected_to_pay`, `sec_id`, `sec_name`, `sess_id`, `term_id`, `status`)
	VALUES ('{$expected_to_pay}', '{$sec_id}', '{$sec_name}', '{$sess_id}', '{$term_id}', '1')");
		
		$session->message("School fees for $sec_name has been successfully configured ");
		redirect_to('acc_school_fees.php');
		exit();
	
	?>