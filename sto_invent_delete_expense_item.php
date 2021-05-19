<?php include('includes/store_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/storeInventoryItems.php'); ?>

       <?php
	$id=$_POST['item_id'];
	$item=storeInventoryItems::find_by_id($id);
	//del session
	if($item->delete()){
		$session->message("Inventory  item has been successfully deleted");
		redirect_to('sto_invent_items.php');
		exit();
	
	}

								
	?>	