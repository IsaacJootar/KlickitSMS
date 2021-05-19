<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php		
		if(isset($_POST['coo'])){
			foreach($_POST['coo'] as $id){
		$query="UPDATE `acc_staff_payroll` 
				SET `coo` = 1
				   WHERE `staff_id` = '{$id}'"; 
				   $result=mysql_query($query);
			}
		   }
	
	 					if(!$result){
						echo mysql_error();
						exit();
						}
		$session->message("Staff suscription for cooperative has been updated successfully");
		redirect_to('acc_pr_assign_staff_coo.php');
		exit();
			