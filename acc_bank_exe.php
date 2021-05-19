<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/accountBank.php'); ?>


 <?php 
global $database;
    $bank=new accountBank();
	 $bank->bank_name=ucfirst(strtolower(($_POST['bank_name'])));
	 $bank->bank_code=ucfirst(strtolower(($_POST['bank_code'])));
	$bank->created_by='Account Officer';
	 $bank->created_on= date('M j, Y h:i:s A', time());
	 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	if (isset( $bank->bank_name) && ( $bank->bank_name=='')){
		$error_array[]='Type in  a bank name!';
		$error_flag=true;
	
	}
	if (isset( $bank->bank_code) && ( $bank->bank_code=='')){
		$error_array[]='Type in  a bank code!';
		$error_flag=true;
	
	}
	$qry=$database->query("SELECT `bank_name` FROM `acc_bank` WHERE `bank_name`='{$_POST['bank_name']}'");
	if($qry){
		if($database->num_rows($qry)== 1){
			$error_array[]='This bank has already been added, use another name';
			$error_flag=true;
		}
	}
	$qry=$database->query("SELECT `bank_code` FROM `acc_bank` WHERE `bank_code`='{$_POST['bank_code']}'");
	if($qry){
		if($database->num_rows($qry)== 1){
			$error_array[]='This budget bank code has already been used, use another name';
			$error_flag=true;
		}
	}
	
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('acc_manage_bank.php');
		exit();
	}
	// creat session
	if($bank->create()){
		$session->message("Bank has been added successfully ");
		redirect_to('acc_manage_bank.php');
		exit();
	
	}
	?>