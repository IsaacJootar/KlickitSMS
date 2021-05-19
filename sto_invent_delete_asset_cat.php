<?php include('includes/sto_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/storeInventoryCategory.php'); ?>

       <?php
	$id=$_POST['cat_id'];
	$cat=storeInventoryCategory::find_by_id($id);
	//del session
	if($cat->delete()){
		$session->message("inventory (asset) Category has been successfully deleted");
		redirect_to('sto_invent_asset_cat.php');
		exit();
	
	}

								
	?>	
