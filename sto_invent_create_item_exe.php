<?php include('includes/store_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/storeInventoryItems.php'); ?>


 <?php 
global $database;
    $item=new storeInventoryItems();
	 $item->item_name=ucfirst(strtolower(($_POST['item_name'])));
	 $item->cat_name=ucfirst(strtolower(($_POST['cat_name'])));
	 $item->created_by='Inventory/Stores Officer';
	 $item->created_on= date('M j, Y h:i:s A', time());
	 $item->status= $_POST['status'];
	 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	if (isset( $item->item_name) && ( $item->item_name=='')){
		$error_array[]='Type in  a item name!';
		$error_flag=true;
	
	}
	
	
	$qry=$database->query("SELECT `item_name` FROM `store_inventory_items` WHERE `item_name`='{$_POST['item_name']}'");
	if($qry){
		if($database->num_rows($qry)== 1){
			$error_array[]='This  item has already been created!';
			$error_flag=true;
		}
	}
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('sto_invent_items.php');
		exit();
	}
	// creat session
	if($item->create()){
		$session->message("Item has been created successfully ");
		redirect_to('sto_invent_items.php');
		exit();
	
	}
	?>