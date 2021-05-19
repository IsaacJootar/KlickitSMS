<?php include('includes/s_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
    <?php 
 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	  $class=$database->query("SELECT * FROM `student_class` WHERE `student_id`= '{$s_id}'"); $class=$database->fetch_array($class); $class=$class['class_name'];
					 
 $note=$_POST['note'];
$time=date('M j, Y h:i:s A', time());	
		$query="INSERT INTO `notification` (`student_id`, `class_name`, `type`, `note`, `created_on` ) 
						VALUES ( '$s_id', '{$class}', '0', '{$note}', '{$time}')";
				$result=mysql_query($query);
				if(!$result){
					
					echo mysql_error();
				}
						
			
			$session->message("Notification has been sent to teacher successfully ");
		redirect_to('s_notification.php');
		exit();
			

?>
		?>
?>