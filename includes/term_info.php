<?php
require_once('classes/database.php');
$session=$database->query("SELECT * FROM `session_manager` WHERE `status`='Current Session'");
	$session=$database->fetch_array($session);
	 $sess_id=$session['id'];
	$session=$session['session'];
	 $qry=$database->query("SELECT * FROM `term` WHERE `status`='Current Term'");
	$term=$database->fetch_array($qry);
	$term_id=$term['id'];
	$term=$term['term_def'];
	
	$query="UPDATE `student_subjects` 
				SET
				   `session_id`= '{$sess_id}',
				  `term_id` = '{$term_id}' ";
				   $result=$database->query($query);
				   
	$query1="UPDATE `student_class` 
				SET
				   `session_id`= '{$sess_id}',
				  `term_id` = '{$term_id}' ";
				   $result=$database->query($query1);
				   
	$query2="UPDATE `student_class` 
				SET
				   `session_id`= '{$sess_id}',
				  `term_id` = '{$term_id}' ";
				   $result=$database->query($query2);
				   




	if(isset($term)){ echo  $term .  ',' . ' ' .  $session . ' ' . ' Academic Session';} else echo "Please set term and session first before you continue";
			?>