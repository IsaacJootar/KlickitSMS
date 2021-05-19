<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/session_manager.php'); ?>
 <?php 
 global $database;
 $session=new Session();
    $sess=new sessionManager();
	 $sess->session=$_POST['session'];
	 $sess->created_on= date('M j, Y h:i:s A', time());
	 $sess->status='Old Session';
	 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	if (isset( $sess->session) && ( $sess->session=='')){
		$error_array[]='Select A Session!';
		$error_flag=true;
	
	}
	$qry=$database->query("SELECT `session` FROM `session_manager` WHERE `session`='{$_POST['session']}'");

	
	if($qry){
		if($database->num_rows($qry)== 1){
			$error_array[]='This same session is already created';
			$error_flag=true;
		}
	}
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('create_session.php');
		exit();
	}
	// creat session
	if($sess->create()){
		$session->message("{$_POST['session']} Session has been successfully created");
		redirect_to('create_session.php');
		exit();
	
	}
	?>