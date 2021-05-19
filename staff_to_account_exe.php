<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/staff_manager.php'); ?>


 <?php 
 global $database;
 $qst=$_POST['qst'];
 $staff_id=$_POST['fullname'];
 $qst=$_POST['qst'];
  //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
 	for($i=0;$i<count($qst);$i++){
				
      $qry=$database->query("SELECT staff_id FROM `account`");
	  if($qry){
		if($database->num_rows($qry)> 0){
			$error_array[]='Only one staff should be assigned an account officer per time';
			$error_flag=true;
		}
	}
	  
		  $qry = "SELECT staff_id FROM `account` WHERE `staff_id` ='{$staff_id}'";
			$result = mysql_query($qry);
			if(mysql_num_rows($result)> 0){
			continue;
			}
			
		$query="INSERT INTO `staff_class` (`staff_id`) 
						VALUES ('{$staff_id}')";
				$result=mysql_query($query);
				if(!$result){
					echo mysql_error();
				}
						
}

			
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('staff_to_account.php');
		exit();
	}          
			
			$session->message("Account Officer has been assigned to staff please note that multiple asssignments will be ignored ");
		redirect_to('manage_staff.php');
		exit();
			

?>
		?>