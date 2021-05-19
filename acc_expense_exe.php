<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/accountExpense.php'); ?>


 <?php 
global $database;
    $expense=new accountExpense();
	
	$expense->cat_id=ucfirst(strtolower(($_POST['cat'])));
	$expense->item_id=ucfirst(strtolower(($_POST['subcat']))); // budget item //
	$expense->staff_id=ucfirst(strtolower(($_POST['staff_id']))); // staff_id//
	$expense->term_id=$term_id;
	$expense->sess_id=$sess_id;

	$expense->areceived_by=$_POST['received_by'];
	$expense->created_on=date("Y-m-d");	
 	$form_token= md5(uniqid());
	$trans_id=md5($form_token); 
	$trans_id = substr($trans_id, -11);
	$expense->expense_id=$trans_id;

	// expense generate token here//
 	$expense->amount=ucfirst(strtolower(($_POST['amount']))); // budget amount
	
	$sql=$database->query("SELECT `item_name` FROM `acc_budget_items` WHERE `id` ='{$_POST['subcat']}'");
	$result=$database->fetch_array($sql);
	$result=$result['item_name'];
	$expense->item_name=$result;
	
	$sql=$database->query("SELECT `cat_name` FROM `acc_budget_cat` WHERE `cat_id` ='{$_POST['cat']}'");
	$result=$database->fetch_array($sql);
	$result=$result['cat_name'];
	$expense->cat_name=$result;
	
	
	
	 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	
	$qry1=$database->query("SELECT `item_name` FROM `acc_budget` WHERE `item_id`='{$_POST['subcat']}'");
	if($qry1){
		if($database->num_rows($qry1)== 0){
			$error_array[]='There is no budget yet for this item, please create a budget!';
			$error_flag=true;
		}
	}
	$qry2=$database->query("SELECT `item_id`, amount  FROM `acc_budget` WHERE `item_id`='{$_POST['subcat']}'");
	$sql2=$database->fetch_array($qry2);
	$amount=$sql2['amount']; // amount budgeted for an item//
	$qry3=$database->query("SELECT sum(`amount`) as amount  FROM `acc_expense` WHERE `item_id`='{$_POST['subcat']}'");
	if($qry3){
		$sql3=$database->fetch_array($qry3);
		$add_amounts=($sql3['amount'] + $expense->amount);
		if($add_amounts > $amount){
			$error_array[]='This expense will exceed the budget amount for this item!';
			$error_flag=true;
		}
	}
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('acc_expense.php');
		exit();
	}
	// creat session
	if($expense->create()){
		$session->message("Expense has been created successfully with transaction id $trans_id");
		redirect_to('acc_expense.php');
		exit();
	
	}
	?>