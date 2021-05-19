<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/accountschoolBus.php'); ?>


 <?php 

global $database;
$pay=new accountschoolBus();
$pay->route_id=$_POST['route_id']; //route name
$pay->class_name=$_POST['cat']; //class name
	$pay->student_id=$_POST['subcat'];// student_id
	$pay->bank_id=$_POST['bank_id']; // bank
	$pay->teller_no=$_POST['teller_no']; 
	$pay->have_paid=$_POST['have_paid']; 
	$pay->created_by='Account Officer';
	$pay->created_on= date('M j, Y h:i:s A', time());
	$payment_id= md5(uniqid()); 
	$payment_id= substr($payment_id, -11);
	$pay->trans_id=$payment_id;
	$check_amount=$database->query("SELECT * FROM `acc_configure_bus_routes` WHERE `route_id`= '{$pay->route_id}' AND `sess_id`='{$sess_id}' AND `term_id`= '{$term_id}'");
	$check_amount=$database->fetch_array($check_amount);
	$check_amount=$check_amount['expected_to_pay']; // sch bus fare expected to be pay by this student
	$pay->expected_to_pay=$check_amount;
	$pay->sess_id=$sess_id; 
	$pay->term_id=$term_id; 
	
	
	
	$check_section=$database->query("SELECT * FROM `acc_configure_bus_routes` WHERE `route_id`= '{$pay->route_id}' AND `sess_id`='{$sess_id}' AND `term_id`= '{$term_id}'");
	if(	$check_section=$database->num_rows(	$check_section) < 1){
	$error_array[]='Bus fare for this destination has not yet been configured!';
		$error_flag=true;
	}
	
	
	$check_section=$database->query("SELECT * FROM `acc_student_bus` WHERE `student_id`= '{$pay->student_id}' AND `sess_id`='{$sess_id}' AND `term_id`= '{$term_id}'");
	if(	$check_section=$database->num_rows(	$check_section) > 0){
	$error_array[]='This student bus fare has already be captured';
		$error_flag=true;
	}
	
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('acc_pay_bus.php');
		exit();
	}

	
	
	
	if($pay->create()){
		$last_id=$database->insert_id();
		$get_status=$database->query("SELECT `expected_to_pay`, `have_paid` FROM `acc_student_bus` WHERE `id`= '{$last_id}'");
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

	
	$update_status=$database->query("UPDATE `acc_student_bus` SET `status`= $status WHERE `id`= $last_id");
		
		$session->message("Student bus fare has been successfully paid with payment id {$pay->trans_id} ");
		redirect_to('acc_pay_bus.php');
		exit();
	
	}
		
	?>