<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php		
		$id=$_POST['staff_id'];
		$query="UPDATE `acc_staff_payroll` 
				SET `status` = 0
				   WHERE `staff_id` = '{$id}'"; 
				   $result=mysql_query($query);
			
	 					if(!$result){
						echo mysql_error();
						exit();
						}
		$session->message("Staff has been removed successfully from payroll ");
		redirect_to('acc_pr_remove_staff.php');
		exit();
			