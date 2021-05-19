<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
    <?php 
 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
 $note=$_POST['note'];
  $student_id=$_POST['student_id'];

$time=date('M j, Y h:i:s A', time());	
		$query="INSERT INTO `notification` (`staff_id`,`student_id`, `type`, `note`, `created_on` ) 
						VALUES ( '{$id}', '{$student_id}', '1', '{$note}', '{$time}')";
				$result=mysql_query($query);
				if(!$result){
					
					echo mysql_error();
				}
						
			
			$session->message("Notification has been sent successfully ");
		redirect_to('f_notification.php');
		exit();
			

?>
		?>
?>