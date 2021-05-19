<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/accountBank.php'); ?>

       <?php
	$id=$_POST['id'];
	$bank=accountBank::find_by_id($id);
	//del bank
	if($bank->delete()){
		$session->message("Bank has been successfully deleted");
		redirect_to('acc_manage_bank.php');
		exit();
	
	}

								
	?>	