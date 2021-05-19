<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/student_manager.php'); ?>


 <?php 
 global $database;
 $students=$_POST['get_st'];
 $subjects=$_POST['subject_name'];
 $class_name=$_SESSION['subcat'];
 	for($i=0;$i<count($students);$i++){
		$student_id=$students[$i];
		for($j=0;$j<count($subjects);$j++){
			$subject_name=$subjects[$j];
			$query="DELETE FROM `student_subjects` WHERE `subject_name`='{$subject_name}'
				 AND `term_id`= '{$term_id}' AND `session_id`='{$sess_id}' AND `class_name`='{$class_name}' AND `student_id` = '{$student_id}' ";
				$result=$database->query($query);
					$query="DELETE FROM `score_entry` WHERE `subject_name`='{$subject_name}'
				 AND `term_id`= '{$term_id}' AND `session_id`='{$sess_id}' AND `class_name`='{$class_name}' AND `student_id` = '{$student_id}' ";
				$result=$database->query($query);
		}
}// end of for loop

                
			
			$session->message("subject(s) romoved from student(s)  successfully.");
		redirect_to('remove_subject_from_student2.php');
		exit();
			

?>
>