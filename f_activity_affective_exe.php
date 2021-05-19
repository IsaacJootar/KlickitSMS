<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/result_manager.php'); ?>
  <?php
   //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	$_SESSION['s_id']; // student_id//
 
   $check=mysql_num_rows(mysql_query("SELECT * FROM `activity_rate_affective` WHERE `student_id`='{$_SESSION['s_id']}' AND `sess_id`='{$sess_id}' AND `term_id` = '{$term_id}'"));
				 		
		   if($check > 0){ // if u find out this student has been rated bfor in  this term, delete the records and store the current rating
		   	$delete=mysql_query("DELETE FROM `activity_rate_affective` WHERE `student_id`='{$_SESSION['s_id']}' AND `sess_id`='{$sess_id}' AND `term_id` = '{$term_id}'");
		  }
				
  $qst=$_POST['qst'];
 
	for($i=0;$i<count($qst);$i++){
	 $qid=$qst[$i];
		 $rate=$_POST["$qid"];
  $query="INSERT INTO `activity_rate_affective` (`student_id`, `activity_id`,`rate`, `sess_id`, `term_id`) 
						VALUES ('{$_SESSION['s_id']}','{$qid}', '{$rate}', '{$sess_id}',  '{$term_id}') ";
				if (!$result=mysql_query($query)){
					echo 'error'. mysql_error();
					}		
	}
	
	$session->message("Affective records for this student has been successfully rated ");
		redirect_to('f_activity_affective.php');	
					
			 ?>
			 
             