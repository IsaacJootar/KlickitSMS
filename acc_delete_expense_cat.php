<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/accountExpenseCategory.php'); ?>

       <?php
	$id=$_POST['cat_id'];
	$cat=accountExpenseCategory::find_by_id($id);
	//del session
	if($cat->delete()){
		$session->message("Expense Category has been successfully deleted");
		redirect_to('acc_expense_cat.php');
		exit();
	
	}

								
	?>	
