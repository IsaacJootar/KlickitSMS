<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
    

 <?php 
 $s_id=$_POST['student'];
 $qst=$_POST['qst'];
 	for($i=0;$i<count($qst);$i++){
		 $subject_name=$qst[$i];
		
		 $qry = "DELETE FROM `student_subjects` WHERE `subject_name` = '{$subject_name}' AND `student_id` = '{$s_id}'";
				$result=mysql_query($qry);

				if(isset($_POST['score_sheet'])){
		$qry=$database->query("DELETE  FROM `score_entry` WHERE `subject_name` = '{$subject_name}' AND `student_id`='{$s_id}' AND `session_id` = $sess_id AND `term_id`= $term_id");

	}
				if(!$result){
					echo 'error removing subjects'.mysql_error();
				}
	}
	
			$session->message("Subject(s) successfully removed");
		redirect_to('remove_subject_from_student_s.php');
		exit();
			

?>
		?>