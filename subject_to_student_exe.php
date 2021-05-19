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
			 $qry = "SELECT * FROM `student_subjects` WHERE `student_id` ='{$student_id}' AND `session_id` = '{$sess_id}' AND `term_id` = '{$term_id}' AND `subject_name`='{$subject_name}'";
			$result =$database->query($qry);
			if($database->num_rows($result)> 0){
			continue;
			}
		
				$query="INSERT INTO `student_subjects` 
							(`subject_name`, `class_name`, `session_id`, `term_id`, `student_id`)
					VALUES ('{$subject_name}','{$class_name}','{$sess_id}','{$term_id}','{$student_id}')";
				$result=$database->query($query);
		} // end first loop
}// end of for loop

                
			
			$session->message("subject(s) assigned to student(s)  successfully, please note that multiple asssignment will be ignored");
		redirect_to('subject_to_student2.php');
		exit();
			

?>
