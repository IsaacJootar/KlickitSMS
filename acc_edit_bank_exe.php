<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/accountBank.php'); ?>


 <?php 
 $id=$_POST['id'];

global $database;
    $bank=accountBank::find_by_id($id);
	$bank->bank_name=ucfirst(strtolower(($_POST['bank_name'])));
	 $bank->bank_code=ucfirst(strtolower(($_POST['bank_code'])));
	  $bank->edited_on= date('M j, Y h:i:s A', time());
	 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	if (isset($bank->bank_name) && ( $bank->bank_name=='')){
		$error_array[]='Type in  a bank name!';
		$error_flag=true;
	
	}
	if (isset($bank->bank_code) && ( $bank->bank_code=='')){
		$error_array[]='Type in  a bank code!';
		$error_flag=true;
	
	}
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('acc_edit_bank.php');
		exit();
	}
	// creat session
	if($bank->update()){
		$session->message("Bank has been updated successfully ");
		redirect_to('acc_edit_bank.php');
		exit();
	
	}
	?>?>