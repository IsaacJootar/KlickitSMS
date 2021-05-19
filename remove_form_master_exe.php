<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
 <?php 
 
 $_SESSION['staff_id'];
	
  $qst=$_POST['qst']; // this shudnt be a loop as only class shud be assigned to a teacher as formaster per time//
 	for($i=0;$i<count($qst);$i++){
		 $class_name=$qst[$i];
		 $qry = "DELETE  FROM `form_master` WHERE `class_name` = '{$class_name}' AND `staff_id`='{$_SESSION['staff_id']}'";
				$result=mysql_query($qry);
				if(!$result){
					echo mysql_error();
				}
						
}
		$qry=mysql_query("UPDATE `system_roles` SET `role`='staff' WHERE `user_id`='{$_SESSION['staff_id']}'");
			
			$session->message("Teacher is successfully removed as form master"); 
		redirect_to('manage_roles.php');
		exit();
			

?>
		