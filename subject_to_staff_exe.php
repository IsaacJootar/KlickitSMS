<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/staff_manager.php'); ?>


 <?php 
 
$admin='Administrator';
 $qst=$_POST['qst'];
 $class_name=$_SESSION['class_name'];
  $staff_id=$_SESSION['staff_id'];
 $qst=$_POST['qst'];
 $error_array=array();
	//initilize error flag//
	$error_flag=false;
 	for($i=0;$i<count($qst);$i++){
		 $subject_name=$qst[$i];
		 $qry = "SELECT subject_name, class_name, staff_id FROM `subject_teacher` WHERE `subject_name` ='{$subject_name}' AND `staff_id` = '{$staff_id}' AND `class_name` = '{$class_name}'";
			$result = mysql_query($qry);
			if(mysql_num_rows($result)> 0){
			continue;
			}
			$qry = "SELECT subject_name, class_name, staff_id FROM `subject_teacher` WHERE `subject_name` ='{$subject_name}' AND `staff_id` !='{$staff_id}' AND `class_name` = '{$class_name}'";
			$result = mysql_query($qry);
			if(mysql_num_rows($result)> 0){
			$error_array[]=' Subject(s) is/are already assigned to other teacher(s) in the same class';
			$error_flag=true;
			}
			
			
			
			if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('subject_to_staff.php');
		exit();
	}
		$query="INSERT INTO `subject_teacher` (`staff_id`,`class_name`, `subject_name`, `assigned_by`) 
						VALUES ( '{$staff_id}','{$class_name}', '{$subject_name}', '$admin')";
				$result=mysql_query($query);
				if(!$result){
					echo mysql_error();
				}
						
}

			
                
			
			$session->message("Subjects have been  assigned to teacher successfully, please note that multiple asssignment will be ignored ");
		redirect_to('subject_to_staff.php');
		exit();
			

?>
