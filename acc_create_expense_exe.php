<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/accountExpense.php'); ?>


 <?php 
global $database;
    $item=new accountExpense();
	 $item->item_name=ucfirst(strtolower(($_POST['item_name'])));

	 $query=$database->query("SELECT `cat_name` FROM `acc_expense_items` WHERE `item_name`= '{$item->item_name}'");
     $cat_name=$database->fetch_array($query);
      $item->cat_name= $cat_name['cat_name'];

	 $item->expense_amount= $_POST['expense_amount'];
	 $item->received_by= $_POST['received_by'];
	
	 $item->staff_id=$staff_id;
	 $item->sess_id=$sess_id;
	 $item->term_id=$term_id;

	 $item->created_on=date("Y-m-d");
	 $form_token= md5(uniqid());
	 $trans_id=md5($form_token); 
	 $trans_id = substr($trans_id, -5);
	 $item->expense_id=$trans_id;
	 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	if (isset( $item->item_name) && ($item->item_name=='')){
		$error_array[]='Type in  a item name!';
		$error_flag=true;
	
	}
	
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('acc_create_expense.php');
		exit();
	}
	// creat session
	if($item->create()){
		$session->message("Expense been created successfully with expense ID $item->expense_id ");
		redirect_to('acc_create_expense.php');
		exit();
	
	}
	?>