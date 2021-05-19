<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/storeInventoryCategory.php'); ?>


 <?php 
global $database;
    $cat=new storeInventoryCategory();
	 $cat->cat_name=ucfirst(strtolower(($_POST['cat_name'])));
	$cat->created_by='Inventory Officer';
	 $cat->created_on= date('M j, Y h:i:s A', time());
	 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	if (isset( $cat->cat_name) && ( $cat->cat_name=='')){
		$error_array[]='Type in  a name!';
		$error_flag=true;
	
	}
	
	
	$qry=$database->query("SELECT `cat_name` FROM `store_inventory_category` WHERE `cat_name`='{$_POST['cat_name']}'");
	if($qry){
		if($database->num_rows($qry)== 1){
			$error_array[]='This category has already been created!';
			$error_flag=true;
		}
	}
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('sto_invent_asset_cat.php');
		exit();
	}
	// creat session
	if($cat->create()){
		$session->message("category category has been created successfully ");
		redirect_to('sto_invent_asset_cat.php');
		exit();
	
	}
	?>