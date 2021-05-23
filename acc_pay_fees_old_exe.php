<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/accountschoolFees.php'); ?>


 <?php 
global $database;
$class_name=$_POST['class_name'];
$student_id=$_POST['student_id'];
$tuition_exp=$_POST['tuition_exp'];
$tuition_fee=$_POST['tuition_fee'];
$check_config=$database->query("SELECT * FROM `acc_configure_tuition_fees` WHERE `class_name`= '{$class_name}' AND `sess_id`='{$sess_id}' AND `term_id`= '{$term_id}' AND `status`=1");
	if(	$check_config=$database->num_rows($check_config) < 1){
	$error_array[]='Tuition Fees for this class has not yet been configured for this term!';
		$error_flag=true;
	}
	
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('acc_pay_fees_old2.php');
		exit();
	}

	// other items should come first, in this order//

 foreach($_POST['other_items'] as $id => $value):
	$pay=new accountschoolFees();
	$pay->item_name=$id;
	$sql1=$database->query("SELECT * FROM  `acc_configure_school_fees_items` WHERE `sess_id`='{$sess_id}' AND  `term_id`= '{$term_id}' AND `status`=1  AND `class_name`='{$class_name}' AND `item_name` = '{$pay->item_name}' ");
	$expected_to_pay=$database->fetch_array($sql1); 
	$expected_to_pay=$expected_to_pay['expected_to_pay'];
	$pay->expected_to_pay=$expected_to_pay;
	$pay->have_paid=$value;
	$balance=$expected_to_pay - $pay->have_paid;
    $pay->balance=$balance;
	$pay->student_id=$_POST['student_id'];
	$pay->bank_name=$_POST['bank_name'];
	$pay->class_name=$_POST['class_name'];
	$pay->teller_no=$_POST['teller_no']; 
	$pay->discount=$_POST['discount']; 
	$pay->recieved_by='Account Officer';
	$pay->status=1;
	$pay->paid_on=$_POST['date'];
	$pay->sess_id=$sess_id; 
	$pay->term_id=$term_id;

	$pay->create();
	
endforeach;
// tuition fee/ let it fall in this order for now
	$pay=new accountschoolFees();
    $pay->item_name='tuition';
	$pay->have_paid=$_POST['tuition_fee']; 
	$pay->expected_to_pay=$_POST['tuition_exp']; 
    $pay->balance=$_POST['tuition_exp']-$_POST['tuition_fee'];
	$pay->student_id=$_POST['student_id'];// student_id
	$pay->bank_name=$_POST['bank_name']; // bank
    $pay->mop=$_POST['mop'];
    $payment_id= md5(uniqid()); 
	$payment_id= substr($payment_id, -5);
	$pay->trans_id=$payment_id;
	$pay->outstand=$_POST['outstand'];

	
	$pay->class_name=$_POST['class_name'];
	$pay->teller_no=$_POST['teller_no']; 
	$pay->recieved_by='Account Officer';
	$pay->discount=$_POST['discount'];
	$pay->status=1;
	$pay->paid_on=$_POST['date'];
	$pay->sess_id=$sess_id; 
	$pay->term_id=$term_id;

	$pay->create();
	


	$session->message("student fees has been successfully paid");
		redirect_to('acc_pay_fees_old2.php');
		exit();
	
?>