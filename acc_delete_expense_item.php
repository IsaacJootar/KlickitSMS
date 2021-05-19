<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/accountExpenseItems.php'); ?>

       <?php
	$id=$_POST['item_id'];
	$item=accountExpenseItems::find_by_id($id);
	//del session
	if($item->delete()){
		$session->message("Expense item has been successfully deleted");
		redirect_to('acc_expense_items.php');
		exit();
	
	}

								
	?>	