<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
 <?php 
 
 
	
  $staff_id=$_POST['staff_id']; 
		 $qry = "DELETE  FROM `system_accounts` WHERE `staff_id` = '{$staff_id}'";
		 $result=$database->query($qry);
				$qry=$database->query("UPDATE `system_roles` SET `role`='staff' WHERE `user_id`='{$staff_id}'");
				if(!$result){
					echo mysql_error();
			
						
}
			
			$session->message("User is successfully removed as account officer"); 
		redirect_to('manage_roles.php');
		exit();
			

?>
		