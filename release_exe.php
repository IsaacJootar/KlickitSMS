<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/class_manager.php'); ?>


  <?php
   $qst=$_POST['qst'];
     $term=$_SESSION['term_id'];
    //  $class=$_SESSION['class']; i dont need this guy, issues came up from releasig result after promotio has tables place 
    $sess=$_SESSION['sess_id'];
 	for($i=0;$i<count($qst);$i++){
		global $database;
		 $student_id=$qst[$i];
			
	$qry=$database->query("UPDATE `score_entry`
					SET `status` = 1 
					WHERE `session_id`='{$sess}' 
					AND `term_id`='{$term}'
					AND `student_id`='{$student_id}'");
					 
				if(!$qry){
					echo 'Could not release results, try again'.mysql_error();
				}
				
						
}
			
			$session->message("Results  are successfully released");
		redirect_to('release.php');
		exit();
	?>	