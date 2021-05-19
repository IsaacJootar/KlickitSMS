<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>


 <?php 

global $database;
$debit_item=$_POST['debit_item'];
$debit_amount=$_POST['debit_amount'];
$staff_id=$_SESSION['staff_id'];
$sess_id=$sess_id;
$term_id=$term_id;
$gender=$_SESSION['gender'];
         $salary_amount=$_SESSION['salary_amount'];
		 $coo_status=$_SESSION['coo_status'];
		  $payroll_month=$_SESSION['payroll_month'];
		  	  $payroll_year=$_SESSION['payroll_year'];
		$configured_on=$_SESSION['configured_on'];
		$fullname=$_SESSION['fullname'];
		

	$q=$database->query("INSERT INTO `acc_staff_monthly_payroll`(`staff_id`, `sess_id`, `term_id`,`fullname`, `gender`, `payroll_group`, `salary_amount`, `coo_status`, `payroll_month`, `payroll_year`, `configured_on`, `debit_item`, `debit_amount`) VALUES ('{$staff_id}', '{$sess_id}', '{$term_id}','{$fullname}', '{$gender}', '{$payroll_group}', '{$salary_amount}', '{$coo_status}', '{$payroll_month}', '$payroll_year', '{$configured_on}', '{$debit_item}', '{$debit_amount}')");	
		
		$session->message("deductions have been successfully made ");
		redirect_to('acc_pr_manage_staff_payments.php?fullname=' . $_SESSION['fullname'].'&&id='. $staff_id);
		exit();
	
		
	?>