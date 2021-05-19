<?php include('includes/header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/staff_manager.php'); ?>


	<?php // post variables/
	$staff = new staffManager();
	$staff->gender=$_POST['gender'];
	$staff->fullname=$_POST['firstname'];
	$staff->firstname=$_POST['firstname'];
	$staff->role='staff';
	$staff->type=$_POST['type'];
	$staff->username=$_POST['user_id'];
	$staff->password=$_POST['user_id'];
	$staff->date_of_birth = ($_POST['DAY']) . - ($_POST['MONTH']) . -($_POST['YEAR']); 
	$staff->residential=$_POST['residential'];
	$staff->contact = 	$_POST['contact'];
	$staff->country = $_POST['country'];
	$staff->state = 	$_POST['state'];
	$staff->lga = 	$_POST['lga'];
	$staff->phone = 	$_POST['phone'];
	$staff->email = $_POST['email'];
	$staff->next_of_kin = 	$_POST['next_of_kin'];
	$staff->num_of_kin = 	$_POST['num_of_kin'];
	$staff->status =$_POST['status'];
	$full=$_POST['firstname'];

?>
<?php	
 $error_array=array();
$error_flag=false;
	if (isset($staff->fullname) && ($staff->fullname=='')){
		$error_array[]='Fill in your Fullname';
		$error_flag=true;
	}
			
				
				
//Check for duplicate user ID
	$qry=$database->query("SELECT `fullname` FROM `staff` WHERE `fullname`='{$_POST['fullname']}'");

	
	if($qry){
		if($database->num_rows($qry)== 1){
			$error_array[]='This staff is already created';
			$error_flag=true;
		}
	}



	$qry2=$database->query("SELECT `username` FROM `staff`
						 WHERE `username`='{$_POST['user_id']}'");

	
	if($qry2){
		if($database->num_rows($qry2)== 1){
			$error_array[]='This staff ID is already taken, please choose another one';
			$error_flag=true;
		}
	}
		// if errors are found store the error in a seesion//
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('create_staff.php');
		exit();
	}
  
?>
	
	
	
	<?php
	
	//query to create new user//
	if($staff->create()){
		$staff_id=$database->insert_id();
		$role="staff";
							$qry=$database->query("INSERT INTO `system_roles` 
							(`username`,`password`, `user_id`,  `role`)
							VALUES ('{$_POST['user_id']}', '{$_POST['user_id']}', '{$staff_id}', '$role')");
							$role='staff';
							//query for payroll//
							$qry=$database->query("INSERT INTO `acc_staff_payroll` 
							(`staff_id`, `fullname`, `gender`,`coo`, `status`)
							VALUES ('{$_POST['user_id']}','$full', '{$_POST['gender']}', '0', '1')");
							if(!$qry){
						echo 'error'. mysql_error();
						exit();
						}
		$session->message("Staff Account has been successfully created");
		redirect_to('create_staff.php');
		exit();
	
	}
	?>
  
    <?php ob_end_flush(); ?>