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
	$_SESSION['s_id'];
 
   $check=mysql_num_rows(mysql_query("SELECT * FROM `activity_rate` WHERE `student_id`='{$_SESSION['s_id']}' AND `sess_id`='{$sess_id}' AND `term_id` = '{$term_id}'"));
				 		
		   if($check > 0){
			$error_array[]='you have already rated this student';
			$error_flag=true;
		  }
				
  
  if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('f_activity.php');
		exit();
	}
	
  $qst=$_POST['qst'];
 
	for($i=0;$i<count($qst);$i++){
	 $qid=$qst[$i];
		 $rate=$_POST["$qid"];
  $query="INSERT INTO `activity_rate` (`student_id`, `activity_id`,`rate`, `sess_id`, `term_id`) 
						VALUES ('{$_SESSION['s_id']}','{$qid}', '{$rate}', '{$sess_id}',  '{$term_id}') ";
				if (!$result=mysql_query($query)){
					echo 'error'. mysql_error();
					}		
	}
	
	$session->message("Activity traits have been successfully rated ");
		redirect_to('f_activity.php');	
					
			 ?>
			 
             