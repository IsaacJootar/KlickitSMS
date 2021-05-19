<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php		
		$qst=$_POST['qst'];
 		for($i=0;$i<count($qst);$i++){
		$qid=$qst[$i];
		$coo_fee=$_POST["$qid". "coo_fee"];
		
			$query="UPDATE `acc_staff_payroll` 
				SET `coo_fee` = '{$coo_fee}'
				   WHERE `staff_id` = '{$qid}'"; 
				   $result=mysql_query($query);
		   }
	
	
	
	 					if(!$result){
						echo mysql_error();
						exit();
						}
		$session->message("Staff cooperative fee have been updated successfully");
		redirect_to('acc_pr_config_staff_coo_fee.php');
		exit();
			