<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>


  <?php
 $qst=$_POST['qst'];
		  for($i=0;$i<count($qst);$i++){
		global $database;
		 $staff_id=$qst[$i];
			
	$qry=$database->query("DELETE  FROM `staff` WHERE `id` = '{$staff_id}'");				
	$qry1=$database->query("DELETE  FROM `staff_class` WHERE `staff_id`='{$staff_id}'");
	$qry2=$database->query("DELETE  FROM `subject_teacher` WHERE `staff_id`='{$staff_id}' ");
    $qry3=$database->query("DELETE  FROM `system_roles` WHERE `user_id` ='{$staff_id}' AND `role`='staff'");
	$qry5=$database->query("DELETE  FROM `form_master` WHERE `staff_id` ='{$staff_id}'");
	$qry6=$database->query("DELETE  FROM `acc_staff_payroll` WHERE `staff_id` ='{$staff_id}'");
	$qry7=$database->query("DELETE  FROM `acc_staff_monthly_payroll` WHERE `staff_id` ='{$staff_id}'");
	$qry8=$database->query("DELETE  FROM `notification` WHERE `staff_id` ='{$staff_id}'");
			
		  }
			
	

			
			$session->message("Selected  staff(s) have been successfully deleted");
		redirect_to('delete_staff.php');
		exit();
	?>	





