<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
 <?php  require_once('classes/class_manager.php'); ?>   
 <?php 
global $database;
    $class=new classManager();
	 $class->class_name=ucwords($_POST['class_name']);
	 $class->created_by='Administrator';
	 $class->created_on= date('M j, Y h:i:s A', time());
	 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	if (isset( $class->class_name) && ( $class->class_name=='')){
		$error_array[]='Type in  a class name!';
		$error_flag=true;
	
	}
	$qry=$database->query("SELECT `class_name` FROM `classes` WHERE `class_name`='{$_POST['class_name']}'");

	
	if($qry){
		if($database->num_rows($qry)== 1){
			$error_array[]='This class is already created';
			$error_flag=true;
		}
	}
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('class.php');
		exit();
	}
	// creat session
	if($class->create()){
		$session->message("Class has been created successfully ");
		redirect_to('class.php');
		exit();
	
	}
	?>