<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/accountExpense.php'); ?>

       <?php
	echo $id=$_GET['id'];
	$item=accountExpense::find_by_id($id);
	//del session
	if($item->delete()){
		$session->message("Expense has been successfully deleted");
		redirect_to('acc_create_expense.php');
		exit();
	
	}

								
	?>	