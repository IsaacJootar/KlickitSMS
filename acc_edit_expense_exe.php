<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/accountExpense.php'); ?>


 <?php 
 $id=$_POST['cat_id'];

global $database;
    $exp=accountExpense::find_by_id($id);
	$exp->amount=$_POST['amount'];
	  $exp->edited_on= date('M j, Y h:i:s A', time());
	 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	
	if ($error_flag){	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('acc_edit_expense.php');
		exit();
	}
	// creat session
	if($exp->update()){
		$session->message("Expense has been updated successfully ");
		redirect_to('acc_edit_expense.php');
		exit();
	
	}
	?>