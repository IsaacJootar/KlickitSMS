<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/subject_manager.php'); ?>


 <?php 
 $staff_id=$_POST['staff_id'];
 $role='Account Officer';
global $database;
	$qry=$database->query("SELECT * FROM `system_accounts` WHERE `staff_id`='{$_POST['staff_id']}'");

	
	if($qry){
		if($database->num_rows($qry)== 1){
			$error_array[]='This User has already been assign another system core role';
			$error_flag=true;
		}
	}
	
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('manage_roles.php');
		exit();
	}
	$query="INSERT INTO `system_accounts` (`staff_id`, `role`) 
						VALUES ('{$staff_id}', '{$role}')";
				$result=$database->query($query);
				if(!$result){
					echo mysql_error();
				}
				
				
$qry=$database->query("UPDATE `system_roles` SET `role`='Account Officer' WHERE `user_id`= '{$staff_id}'");
	
			
                
			
			$session->message("Staff has been assigned Account Officer role successfully, please note that multiple asssignments will be ignored ");
		redirect_to('manage_roles.php');
		exit();
			

	?>