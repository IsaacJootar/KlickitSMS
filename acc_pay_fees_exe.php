<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/accountschoolFees.php'); ?>


 <?php 

global $database;
$pay=new accountschoolFees();
$pay->class_name=$_POST['class_name']; //class name
     $pay->sess_id=$_POST['sess_id'];
     $pay->term_id=$_POST['term_id'];
	 $pay->student_id=$_POST['student_id'];// student_id
	 $pay->bank_id=$_POST['bank_id']; // bank
	 $pay->teller_no=$_POST['teller_no'];
	 $pay->date=$_POST['date'];
	 $pay->created_by='Account Officer';
	 $pay->created_on= date('M j, Y h:i:s A', time());
	 $payment_id= md5(uniqid()); 
	 $payment_id= substr($payment_id, -6);
	 $pay->trans_id=$payment_id;
	 $pay->pta=$_POST['pta'];
	 $pay->sports=$_POST['sports'];
	 $pay->first=$_POST['first'];
	 $pay->uniform=$_POST['uniform'];
	 $pay->bus=$_POST['bus'];
	 $pay->lab=$_POST['lab'];
	 $pay->toilet=$_POST['toilet'];
	 $pay->coll=$_POST['coll'];
	 $pay->tfee=$_POST['tfee'];
	 $pay->online=$_POST['online'];
     $pay->rfee=$_POST['rfee'];
	 $pay->idcard=$_POST['idcard'];
	
	 $pay->entrep=$_POST['entrep'];
	  $pay->french=$_POST['french'];
	 $pay->dev=$_POST['dev'];
	 $pay->exam=$_POST['exam'];
	 $pay->lesson=$_POST['lesson'];
	 $pay->comp=$_POST['comp'];
	 $pay->maint=$_POST['maint'];
	 $pay->sessional=$_POST['sessional'];
	 $pay->phonics=$_POST['phonics'];
	 $have_paid=$pay->pta+$pay->sports+$pay->first+$pay->uniform+$pay->bus+$pay->lab+$pay->toilet+$pay->coll+ $pay->tfee+$pay->online+$pay->rfee+
	 $pay->idcard+$pay->entrep+$pay->dev+$pay->french+$pay->exam+$pay->lesson+$pay->comp+$pay->maint+$pay->sessional+$pay->phonics;
	 
	 $pay->have_paid=$have_paid;
	

	
    
	
	
	
	// locate the section id for this student using his or her class
	$find_section=$database->query("SELECT `section_id` FROM `class_section` WHERE `class_name`='{$pay->class_name}'");
	$find_section=$database->fetch_array($find_section);
	$pay->section_id=$find_section['section_id'];
	$check_amount=$database->query("SELECT * FROM `acc_configure_school_fees` WHERE `sec_id`= '{$find_section['section_id']}' AND `sess_id`='{$pay->sess_id}' AND `term_id`='{$pay->term_id}' AND `status`=1");
	$check_amount=$database->fetch_array($check_amount);
	$check_amount=$check_amount['expected_to_pay']; // sch fees expected to be pay by this session
	$pay->expected_to_pay=$check_amount;
	$pay->student_type=1; // flag for old studens//
	
	
	
	$check_section=$database->query("SELECT * FROM `acc_configure_school_fees` WHERE `sec_id`= '{$pay->section_id}' AND `sess_id`='{$pay->sess_id}' AND `term_id`='{$pay->term_id}' AND `status`=1");
	if(	$check_section=$database->num_rows(	$check_section) < 1){
	$error_array[]='School Fees for this section has not yet been configured!';
		$error_flag=true;
	}
	
	
	$check_section=$database->query("SELECT * FROM `acc_student_fees_with_items` WHERE `student_id`= '{$pay->student_id}' AND  `sess_id`='{$pay->sess_id}' AND `term_id`='{$pay->term_id}' AND `student_type`=1");
	if(	$check_section=$database->num_rows(	$check_section) > 0){
	$error_array[]='This student fees has already been captured, edit to add or make changes';
		$error_flag=true;
	}
	
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('acc_pay_fees_old2.php');
		exit();
	}

	
	
	
	if($pay->create()){
		$last_id=$database->insert_id();
		$get_status=$database->query("SELECT `expected_to_pay`, `have_paid` FROM `acc_student_fees_with_items` WHERE `id`= '{$last_id}' AND `student_type`=1");
		$get_status=$database->fetch_array($get_status);
		$exp=$get_status['expected_to_pay'];
		$have_paid=$get_status['have_paid'];
		
		// status flag 1 means full payment, and 0 means balance left//
		
		
	if($exp > $have_paid){
		$status=0;
	}


	elseif($exp == $have_paid){
		$status=1;
	}


	else{
		$status=1;
	}

	
	$update_status=$database->query("UPDATE `acc_student_fees_with_items` SET `status`= '{$status}' WHERE `id`= $last_id");
		
		$session->message("Student fees has been successfully paid with payment id {$pay->trans_id} ");
		redirect_to('acc_pay_fees_old2.php');
		exit();
	
	}
		
	?>