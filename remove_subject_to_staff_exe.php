<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>
    
 <?php 
	$class_name=$_SESSION['class_name'];
  $staff_id=$_SESSION['staff_id'];
 $qst=$_POST['qst'];
 	for($i=0;$i<count($qst);$i++){
		 $subject_name=$qst[$i];
		 $qry = "DELETE  FROM `subject_teacher`
		  WHERE `subject_name` ='{$subject_name}'
		   AND `staff_id` = '{$staff_id}' 
		   AND `class_name` = '{$class_name}'";
				$result=mysql_query($qry);
				if(!$result){
					echo mysql_error();
				}
						
}
			
			$session->message("Subject(s) have successfully removed from teacher");
		redirect_to('remove_subject_to_staff.php');
		exit();
			

?>
		?>