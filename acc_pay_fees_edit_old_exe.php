<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/accountschoolFees.php'); ?>


 <?php 
global $database;

 foreach($_POST['other_items'] as $id => $value):

 $query="SELECT `expected_to_pay` FROM `acc_school_fees_payments` WHERE `item_name`='{$id}' AND `status`= 1"; 
 $result=$database->query($query);
    if (!$result){
      die("database query faild");
    }
	$data = $database->fetch_array($result);
	$expected_to_pay=$data['expected_to_pay'];

	$item_name=$id;
	$have_paid=$value;
	$balance=$expected_to_pay - $have_paid;
	$student_id=$_POST['student_id'];
	$bank_name=$_POST['bank_name'];
	$teller_no=$_POST['teller_no']; 
	$discount=$_POST['discount'];
	$query="UPDATE `acc_school_fees_payments`
	 		SET `have_paid` = '{$have_paid}',
	 			`bank_name`= '$bank_name',
	 			`teller_no` = '$teller_no', 
	 			`balance` = '$balance', 
	 			`discount` = '$discount' 
	 		WHERE `item_name` = '{$item_name}' 
	 		AND `sess_id`='{$sess_id}' 
	 		AND  `term_id`= '{$term_id}' 
	 		AND `status`=1 
	 		AND `student_id` = '{$student_id}'
	 		";
	$result=$database->query($query);
endforeach;
// tuition fee/ let it fall in this order for now
    $item_name='tuition';
	$tuition_fee=$_POST['tuition_fee'];
    $query="SELECT `expected_to_pay` FROM `acc_school_fees_payments` WHERE `item_name`='{$item_name}' AND `status`= 1"; 
    $result=$database->query($query);
    if (!$result){
      die("database query faild");
    }
	$data = $database->fetch_array($result);
	$expected_to_pay=$data['expected_to_pay'];
    $balance=$expected_to_pay - $tuition_fee;


	$query="UPDATE `acc_school_fees_payments`
 		SET `have_paid` = '{$tuition_fee}', 
 		 `teller_no` = '{$teller_no}',
 	     `bank_name` = '{$bank_name}', 
 	      `balance` = '{$balance}',
 	     `discount` = '{$discount}' 
 		WHERE `item_name` = '{$item_name}' 
 		AND `sess_id`='{$sess_id}' 
 		AND  `term_id`= '{$term_id}' 
 		AND `status`=1 
 		AND `student_id` = '{$student_id}'
 		";
	$result=$database->query($query);
	


	$session->message("student fees has been successfully updated ");
		redirect_to('acc_pay_fees_old2.php');
		exit();
	
?>