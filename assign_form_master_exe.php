<?php include('includes/header.php'); ?>
<?php  require_once('classes/session.php'); ?>
<?php  require_once('classes/functions.php'); ?>
<?php  require_once('includes/config.php'); ?>
<?php  require_once('includes/config2.php'); ?>
 <?php  require_once('classes/staff_manager.php'); ?>
<?php
 $staff_id=$_POST['staff_id'];
 $qst=$_POST['qst'];
 $error_array=array();
	//initilize error flag//
	$error_flag=false;
 	for($i=0;$i<count($qst);$i++){
		 $class_name=$qst[$i];
		  $qry = "SELECT staff_id, class_name FROM `form_master` WHERE `staff_id` ='{$staff_id}'";
			$result = mysql_query($qry);
			if(mysql_num_rows($result)> 0){
			$error_array[]=' Teacher cannot be assigned  multiple form master role';
			$error_flag=true;
			}
			
			 $qry2 = "SELECT  class_name FROM `form_master` WHERE `class_name` ='{$class_name}'";
			$result2 = mysql_query($qry2);
			if(mysql_num_rows($result2)> 0){
			$error_array[]=' This class already has a  form master';
			$error_flag=true;
			}
			
		
			
			if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('manage_roles.php');
		exit();
	}
		$query="INSERT INTO `form_master` (`staff_id`, `class_name`) 
						VALUES ('{$staff_id}', '{$class_name}')";
				$result=mysql_query($query);
				if(!$result){
					echo mysql_error();
				}
						
}

$qry=mysql_query("UPDATE `system_roles` SET `role`='form_master' WHERE `user_id`= '{$staff_id}' AND `role`='staff'");
	
			
                
			
			$session->message("Staff has been assigned form master role successfully, please note that multiple asssignments will be ignored ");
		redirect_to('manage_roles.php');
		exit();
			

?>
