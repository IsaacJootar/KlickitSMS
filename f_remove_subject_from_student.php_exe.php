<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
    

 <?php 
 $s_id=$_POST['student'];
 $qst=$_POST['qst'];
 	for($i=0;$i<count($qst);$i++){
		 $subject_name=$qst[$i];
		
		 $qry = "DELETE FROM `student_subjects` WHERE `subject_name` = '{$subject_name}' AND `student_id` = '{$s_id}'";
				$result=mysql_query($qry);
				if(!$result){
					echo mysql_error();
				}
				
				$qry2 = "DELETE FROM `score_entry` WHERE `subject_name` = '{$subject_name}'
				 AND `student_id` = '{$s_id}' AND `session_id`= $sess_id AND `term_id` = $term_id";
				$result2=mysql_query($qry2);
				if(!$result2){
					echo mysql_error();
				}
	}
			$session->message("Subject(s) are  successfully removed");
		redirect_to('f_remove_subject_from_student.php');
		exit();
			

?>
		?>