<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php		
		$qst=$_POST['qst'];
 		for($i=0;$i<count($qst);$i++){
		$qid=$qst[$i];
		$salary_amount=$_POST["$qid". "salary_amount"];
		$account_number=$_POST["$qid". "account_number"];
		
			$query="UPDATE `acc_staff_payroll` 
				SET `salary_amount` = '{$salary_amount}',
				`account_number` = '{$account_number}'
				   WHERE `staff_id` = '{$qid}'"; 
				   $result=mysql_query($query);
		   }
				if(!$result){
						echo mysql_error();
						exit();
						}
		$session->message("Staff salaries have been updated successfully");
		redirect_to('acc_pr_config_staff_sal.php');
		exit();
			