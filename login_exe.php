<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php

	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) 
	{
		$str = @trim($str);
		if(get_magic_quotes_gpc()) 
		{
			$str = stripslashes($str);
		}
		return $str;
	}
	
	//Sanitize the POST values
	$username = clean($_POST['username']);
	$password = clean($_POST['password']);
	
	$errflag=array();
	//Input Validations
	if($username == '') {
		$errmsg_arr[] = 'user name missing';
		$errflag = true;
			
	}
	if($password == '') {
		$errmsg_arr[] = 'password is missing';
		$errflag = true;
	}
	
	
	$qry="SELECT  username, password, role FROM `system_roles` WHERE username='$username' AND password='$password' ";
	$result=$database->query($qry);
	
	
	if(!empty($username) && isset($password) ){
		if ($database->num_rows($result) < 1) {
				$errmsg_arr[] = 'User name / Password is not correct!';
				$errflag  = true;
				
		}
			@mysql_free_result($result);
	
	}
	

	
	//If there are input validations, redirect back to the login form
	if($errflag) 
	{
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr; // store the found errors in a session
		session_write_close();					// put the session to a close
		header("location:index.php");		//redirect the user, correct the found errors and to login again
		exit();
	}
	
	
	
	
	$qry="SELECT * FROM `system_roles` WHERE username='$username' AND password='$password' AND `role`='form_master' ";
	$result= $database->query($qry);	
	//Check whether the query was successful or not
	if($result)  
	{
		if( $database->num_rows($result) == 1) 
		{
			//$_SESSION['SESS_NAME'] = $user['firstname'];
			session_regenerate_id();
			$user = $database->fetch_assoc($result);
				$_SESSION['SESS_USER'] = $user['user_id'];
			$_SESSION['SESS_USER_ROLE'] = $user['role'];
			$_SESSION['SESS_USER_NAME'] = $user['username'];
			header("location:300pc419pxystaff.php");
			exit();
			} 
	}
	$qry="SELECT * FROM `system_roles` WHERE username='$username' AND password='$password' AND `role`='admin' ";
	$result= $database->query($qry);	
	//Check whether the query was successful or not
	if($result)  
	{
		if($database->num_rows($result) == 1) 
		{
			//$_SESSION['SESS_NAME'] = $user['firstname'];
			session_regenerate_id();
			$user = $database->fetch_assoc($result);
			$_SESSION['SESS_USER'] = $user['user_id'];
			$_SESSION['SESS_USER_ROLE'] = $user['role'];
			header("location:http:400js419pxysadmin.php.php");
			exit();
			} 
	}
	
	

	$result=$database->query("SELECT  * FROM `system_roles` WHERE username='$username' AND password='$password' AND `role`='student' ");	
	if($result)  
	{
		if($database->num_rows($result) == 1) 
		{
			session_regenerate_id();
			$user = $database->fetch_assoc($result);
			$_SESSION['SESS_USER'] = $user['user_id'];
			$_SESSION['SESS_USER_ROLE'] = $user['role'];
			header('location:100bfstudent_gpanel.php');
			exit();
			}
	}
		$qry="SELECT * FROM `system_roles` WHERE username='$username' AND password='$password' AND `role`='staff' ";
	$result= $database->query($qry);
	//Check whether the query was successful or not
	if($result)  
	{
		if( $database->num_rows($result) == 1) 
		{
			$user = $database->fetch_assoc($result);
			//$_SESSION['SESS_NAME'] = $user['firstname'];
			$_SESSION['SESS_USER'] = $user['user_id'];
			$_SESSION['SESS_USER_ROLE'] = $user['role'];
			$_SESSION['SESS_USER_NAME'] = $user['username'];
			session_write_close();
			header("location:200er_b6yx9_student.php");
			exit();
			} 
	}
		
		
		
		$qry="SELECT * FROM `system_roles` WHERE username='$username' AND password='$password' AND `role`='director' ";
	$result= $database->query($qry);
	//Check whether the query was successful or not
	if($result)  
	{
		if($database->num_rows($result) == 1) 
		{
			$user = $database->fetch_assoc($result);
			//$_SESSION['SESS_NAME'] = $user['firstname'];
			$_SESSION['SESS_USER'] = $user['user_id'];
			$_SESSION['SESS_USER_ROLE'] = $user['role'];
			session_write_close();
			header("location:900_dir_encode_qpde_md765ahd098265.php");
			exit();
			} 
	}
		


		$qry="SELECT * FROM `system_roles` WHERE username='$username' AND password='$password' AND `role`='Inventory/Stores' ";
	$result= $database->query($qry);
	//Check whether the query was successful or not
	if($result)  
	{
		if($database->num_rows($result) == 1) 
		{
			$user = $database->fetch_assoc($result);
			//$_SESSION['SESS_NAME'] = $user['firstname'];
			$_SESSION['SESS_USER'] = $user['user_id'];
			$_SESSION['SESS_USER_ROLE'] = $user['role'];
			session_write_close();
			header("location:800_inven_stor11904_version_on.php");
			exit();
			} 
	}	
		
		
		$qry="SELECT * FROM `system_roles` WHERE username='$username' AND password='$password' AND `role`='Account Officer' ";
	$result= $database->query($qry);	
	//Check whether the query was successful or not
	if($result)  
	{
		if($database->num_rows($result) == 1) 
		{
			//$_SESSION['SESS_NAME'] = $user['firstname'];
			session_regenerate_id();
			$user = $database->fetch_assoc($result);
			$_SESSION['SESS_USER'] = $user['user_id'];
			$_SESSION['SESS_USER_ROLE'] = $user['role'];
			header("location:700jstpxvzpdo_accts.php");
			exit();
			} 
	}
		
		
		
		
	else 
	{
		die("Query failed" . mysql_error());
	}
?>

<?php ob_end_flush();?>