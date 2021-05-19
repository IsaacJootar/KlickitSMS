<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
 <?php 
 
 
	
  $staff=$_POST['staff_id']; 

		 $qry = "DELETE  FROM `account` WHERE `staff_id` = '{$staff}'";
				$result=mysql_query($qry);
				if(!$result){
					echo mysql_error();
				}
					
			
			$session->message("Staff has been successfully removed as account officer."); 
		redirect_to('manage_roles.php');
		exit();
			

?>
		