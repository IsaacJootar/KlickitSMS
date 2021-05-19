<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/accountExpenseItems.php'); ?>


 <?php 
 $id=$_POST['item_id'];

global $database;
    $item=accountExpenseItems::find_by_id($id);
	$item->item_name=ucfirst(strtolower(($_POST['item_name'])));
	
	  $item->edited_on= date('M j, Y h:i:s A', time());
	 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('acc_expense_items.php');
		exit();
	}
	$database->query("UPDATE `acc_expense_items` SET  `item_name`= '{$_POST['item_name']}' WHERE `id` = '{$_POST['item_id']}'");
	
	// creat session
	if($item->update()){
		
		$session->message("Expense item has been updated successfully ");
		redirect_to('acc_edit_expense_item.php');
		exit();
	
	}
	?>?>