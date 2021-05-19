<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>


 <?php 
global $database;

	// routes name//
 	$route_name=$_POST['route_name']; // route_name
	$date=date('M j, Y h:i:s A', time());
	 //initialize error array//			
	
	$qry1=$database->query("SELECT `route_name` FROM `acc_bus_routes` WHERE `route_name`='{$_POST['route_name']}'");
	if($qry1){
		if($database->num_rows($qry1) > 0){
			$error_array[]='This bus destination has already been added!';
			$error_flag=true;
			
		}
	}
	
	
	
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('acc_bus.php');
		exit();
	}
	$sql=$database->query("INSERT INTO `acc_bus_routes`(`route_name`, `created_on`) VALUES ('$route_name', '$date')");
	// creat session
	if($sql){
		$session->message("Destination has been created successfully");
		redirect_to('acc_bus.php');
		exit();
	
	}
	?>