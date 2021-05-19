<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/accountschoolBus.php'); ?>


 <?php 

global $database;
	 $trans_id=$_SESSION['trans_id'];
	$student_id=$_SESSION['student_id'];
	 $add_pay=$_POST['add_fees'];
	$created_on= date('M j, Y h:i:s A', time());	
	$check_payment=$database->query("SELECT * FROM `acc_student_bus` WHERE `student_id`= '{$student_id}' AND `trans_id`='{$trans_id}' AND `sess_id`='{$sess_id}' AND `term_id`= '{$term_id}'");
	
	$check_payment=$database->fetch_array($check_payment);
	 $have_paid=$check_payment['have_paid'];
	$exp=$check_payment['expected_to_pay'];
	if($have_paid >= $exp){
	$error_array[]='This student has already paid full bus fare for this term';
		$error_flag=true;
	}
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('acc_bus_fees2.php?fullname=' . $_SESSION['fullname'].'&&id='. $student_id);
		exit();
	}

	$total_pay=$add_pay+$have_paid;
	
	
	
	$update_fee=$database->query("UPDATE `acc_student_bus` SET `have_paid` ='{$total_pay}', `created_on`='$created_on' WHERE `sess_id`='{$sess_id}' AND `term_id`='{$term_id}'  AND `trans_id`='{$trans_id}' AND `student_id`='{$student_id}'");
		$get_status=$database->query("SELECT * FROM `acc_student_bus` WHERE `sess_id`='{$sess_id}' AND `term_id`='{$term_id}'  AND `trans_id`='{$trans_id}' AND `student_id`='{$student_id}'");
		$get_status=$database->fetch_array($get_status);
		$exp=$get_status['expected_to_pay'];
		$have_paid=$get_status['have_paid'];
		
	if($exp > $have_paid){
		$status=0;
	}


	elseif($exp == $have_paid){
		$status=1;
	}


	else{
		$status=1;
	}

	
	if($update_status=$database->query("UPDATE `acc_student_bus` SET `status`= $status WHERE `sess_id`='{$sess_id}' AND `term_id`='{$term_id}'  AND `trans_id`='{$trans_id}' AND `student_id`='{$student_id}'")){
		
		$session->message("Student bus fare has been successfully added");
	redirect_to('acc_bus_fees2.php?fullname=' . $_SESSION['fullname'].'&&id='. $student_id);
		exit();
	
	}
	?>