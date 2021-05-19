<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>

 <?php 
 
//$admin='Administrator';
 $student_id=$_GET['id'];
 
 	
		$query="UPDATE `score_entry`
					SET `edit_status` = '1',
					`ca_type`='{$_SESSION['ca_type']}'
					WHERE `class_name`= '{$_SESSION['class_name']}'
					AND `subject_name`= '{$_SESSION['subject_name']}'
					AND `staff_id`= '{$_SESSION['staff_id']}'
					AND `student_id`= '{$student_id}'
					AND `session_id`='{$sess_id}' 
					AND `term_id`='{$term_id}'";				
				$result=mysql_query($query);
				if(!$result){
					echo "error" .mysql_error();
					exit();
				
						
}
$session->message("permission to edit {$_SESSION['ca_type']} has been successfully granted ");
		redirect_to('edit_scores.php');
		exit();
			

?>
