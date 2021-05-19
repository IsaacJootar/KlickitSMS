<?php include('includes/store_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/storeInventoryItems.php'); ?>


 <?php 
 $id=$_POST['item_id'];

global $database;
    $item=storeInventoryItems::find_by_id($id);
	$item->item_name=ucfirst(strtolower(($_POST['item_name'])));

	//$database->query("UPDATE `store_inventory_items` SET  `item_name`= '{$_POST['item_name']}' WHERE `id` = '{$_POST['item_id']}'");
	
	// creat session
	if($item->update()){
		
		$session->message("Item has been updated successfully ");
		redirect_to('sto_invent_items.php');
		exit();
	
	}
	?>