<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>

       <?php
	    $error_array=array();
	//initilize error flag//
	$error_flag=false;
	    $month=date('F'); // Always the current month//
		$year=date('Y');
	  global $database;
	  $debit_item=$_GET['debit_item'];
	  $_SESSION['fullname'];
	  $staff_id=$_SESSION['staff_id'];
	  
	  if($_GET['debit_item']=='cooperative fee'){
		  $error_array[]='cooperative fee cannot be removed from here and should be done before a new payroll opens!';
			$error_flag=true;
	   }
		
		if($error_flag){	
			$_SESSION['sess_errors']=$error_array;
			redirect_to('acc_pr_manage_staff_payments.php?fullname=' . $_SESSION['fullname'].'&&id='. $staff_id);
		session_write_close();
		exit();
			}	
		
	$del=$database->query("DELETE FROM `acc_staff_monthly_payroll` WHERE `debit_item`='{$debit_item}' AND `staff_id`= '{$staff_id}'  AND `payroll_month`='{$month}' AND `payroll_year`='{$year}'");
	if(!$del){echo 'there was an error deleting the item, please try again later'.mysql_error();}
	
	
		
		$session->message("Deduction has has been successfully removed");
		redirect_to('acc_pr_manage_staff_payments.php?fullname=' . $_SESSION['fullname'].'&&id='. $staff_id);
		session_write_close();
		exit();
								
	?>	