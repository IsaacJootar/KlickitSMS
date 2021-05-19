<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/class_manager.php'); ?>


  <?php
	$id=$_POST['id'];
	 $expected_to_pay=$_POST['expected_to_pay'];
	$qry=$database->query("UPDATE `acc_configure_tuition_fees`
					SET `expected_to_pay` = '{$expected_to_pay}'
					WHERE `id`='{$id}' 
					AND `term_id`='{$term_id}'
					AND `sess_id`='{$sess_id}'");
					 
				if(!$qry){
					echo 'Could not update fees, try again'.mysql_error();
				}
				
					
			
			$session->message("Fees amount for old students is successfully updated");
		redirect_to('acc_config_fees_new.php');
		exit();
	?>	