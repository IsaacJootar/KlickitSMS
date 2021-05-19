<?php include('includes/header.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/student_manager.php'); ?>


	<?php // post variables/
 
	function clean($str)
  {
    $str=@trim($str);
    if (get_magic_quotes_gpc())
    {
      $str=stripslashes($str);
    }
    return mysql_real_escape_string($str);
  }
	$student = new studentManager();
	$fullname = clean($_POST['firstname']);
	$student->firstname = ucwords(strtolower($fullname));
	$student->gender = 	$_POST['gender'];
	$student->account_status = 1;
	$student->status =$_POST['status']; //default active
	$student->type=$_POST['type']; //Day or Boarding
	$student->present_class = 	$_POST['subcat'];
	//$student->date_of_birth = ($_POST['DAY']) . - ($_POST['MONTH']) . -($_POST['YEAR']); 
	$student->fullname=$student->firstname;
	//$student->residential = 	$_POST['residential'];
	//$student->contact = 	$_POST['contact'];
	$student->role='student';
	$student->student_id=trim($_POST['user_id']);
	//$student->country = $_POST['country'];
	$student->username = trim(ucwords($_POST['user_id']));
	$student->password = trim(ucwords($_POST['user_id']));
	//$student->state = 	$_POST['state'];
	//$student->lga = 	$_POST['lga'];
	//$student->phone = 	$_POST['phone'];
	//$student->email = $_POST['email'];
	//$student->father_name=$_POST['father_name'];
	//$student->father_address = 	$_POST['father_address'];
	//$student->father_number =$_POST['father_number'];
	//$student->father_occupation = 	$_POST['father_occupation'];
	//$student->mother_name =$_POST['mother_name'];
	//$student->mother_number = 	$_POST['mother_number'];
	////$student->mother_occupation = 	$_POST['mother_occupation'];
	//$student->religion = 	$_POST['religion'];
	//$student->health = 	$_POST['health'];

$sec_id =$_POST['cat']; // section is used in the school fees config section of account module 
?>
<?php	
 $error_array=array();
$error_flag=false;
	if (isset($student->user_id) && ($student->user_id=='')){
		$error_array[]='Yor student ID is missing';
		$error_flag=true;
	}
			
	
//Check for duplicate user ID



	//  duplicate user ID check//
	
	$qry2=$database->query("SELECT `username` FROM `students`
						 WHERE `username`='{$_POST['user_id']}'");

	
	if($qry2){
		if($database->num_rows($qry2)== 1){
			$error_array[]='This student ID is already taken, please choose another one!';
			$error_flag=true;
		}
	}
 

		// if errors are found store the error in a seesion//
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('create_student.php');
		exit();
	}
  
?>
	
	
	
	<?php
	//querry to create new user//
	if($student->create()){
		$student_id=$database->insert_id();
		$fullname=clean($_POST['firstname']);
		$fullname=ucwords(strtolower($fullname));

		$class_name=$_POST['subcat'];
		$status=$_POST['status']; //1 is old student, 0 is new student
		$type=$_POST['type'];
		$account_status=1; //system status 1 for active, 0 for inactive students. 1 is default
		
		
		$qry=$database->query("INSERT INTO `student_class` 
							(`class_name`, `session_id`,`term_id`, `student_id`, `gender`, `fullname`,  `status`, `account_status`, `type`)
							VALUES ('{$class_name}', '{$sess_id}', '{$term_id}', '{$student_id}', '{$_POST['gender']}', '{$fullname}', '{$status}', '{$account_status}', '{$type}')");
							
							
							
							$role="student";
							$qry=$database->query("INSERT INTO `system_roles` 
							(`username`,`password`, `user_id`,  `role`)
							VALUES ('{$_POST['user_id']}', '{$_POST['user_id']}', '{$student_id}', '$role')");
							
							
							
							
		$session->message("Student account has been successfully created with registration no. 
			'{$_POST['user_id']}'");
		redirect_to('create_student.php');
		exit();
	
	}
	?>
  
  <?php ob_end_flush();?>
  
    