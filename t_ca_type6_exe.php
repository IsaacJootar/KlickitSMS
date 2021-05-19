<?php include('includes/t_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>

<?php
 
 $class=$_SESSION['cat'];
  $subj=$_SESSION['subcat'];
  $qst=$_POST['qst'];

// begin code for the submit button//
		$qst=$_POST['qst'];
 // $fullname=$_POST['fullname'];
  $sql=mysql_query("SELECT  * FROM `score_entry` WHERE `subject_name`='{$_SESSION['subcat']}' AND `class_name`='{$_SESSION['cat']}' AND `staff_id`='{$id}'  AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'");
	 
		   if($values=mysql_num_rows($sql) > 0){  // begin update of scores in score sheet, but first check new students who are been administered for the first time.
 	for($i=0;$i<count($qst);$i++){
		$qid=$qst[$i];
		$ca1=$_POST["$qid". "ca1"]; 
		$ca2=$_POST["$qid". "ca2"];
		$ca3=$_POST["$qid". "ca3"]; 
		$ca4=$_POST["$qid". "ca4"]; 
		$ca5=$_POST["$qid". "ca5"];
		$ca6=$_POST["$qid". "ca6"];
		$ca_total=($ca1 + $ca2 + $ca3 + $ca4 + $ca5 + $ca6);
		
		
		// check if any new students are available in this class that came after CA has already been administred so that u can insert for such student(s) bfor updating for others// 
		
		 $query="SELECT  * FROM `score_entry` WHERE `subject_name`='{$subj}' AND `class_name`='{$class}' AND `student_id`='{$qid}'  AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'";
		 $query=mysql_query($query);
		  if(mysql_num_rows($query) < 1){ //if this stufdent instance is not found, then insert his scores first, then update odas. 
			$query="INSERT INTO `score_entry` 
				(`staff_id`, `class_name`, `subject_name`,`session_id`, `term_id`, `student_id`, `CA1`, `CA2`,  `CA3`) 
		VALUES ('{$id}', '$class', '$subj', '{$sess_id}', '{$term_id}' , '$qid', '$ca1', '$ca2', '$ca3') ";
			$result=mysql_query($query);
			// get the id of the last query nd update the remaining  CA colons
 $last_id=mysql_insert_id();
		
			
			$query="UPDATE `score_entry` 
				SET
				 `CA4` = '$ca4',
				 `CA5`= '$ca5',
				 `CA6` = '$ca6',
				  `CA_total` = '{$ca_total}' 
				   WHERE `id` =  '{$last_id}'"; 
				   $result=mysql_query($query);
			 
						
		   			}
		// now update others
			$query="UPDATE `score_entry` 
				SET
				 `CA1` = '$ca1',
				 `CA2`= '$ca2',
				 `CA3` = '$ca3',
				 `CA4` = '$ca4',
				 `CA5`= '$ca5',
				 `CA6` = '$ca6',
				  `CA_total` = '{$ca_total}' 
				   WHERE `student_id` =  '{$qid}' AND `subject_name`='{$_SESSION['subcat']}' AND `class_name`='{$_SESSION['cat']}' AND `staff_id`='{$id}'  AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'
				   "; 
				   $result=mysql_query($query);
		   }
	}
	
				   if($values=mysql_num_rows($sql) < 1){
 	for($i=0;$i<count($qst);$i++){
		$qid=$qst[$i];
		$ca1=$_POST["$qid". "ca1"]; 
		$ca2=$_POST["$qid". "ca2"];
		$ca3=$_POST["$qid". "ca3"]; 
		$ca4=$_POST["$qid". "ca4"]; 
		$ca5=$_POST["$qid". "ca5"];
		$ca6=$_POST["$qid". "ca6"];
		$ca_total=($ca1 + $ca2 + $ca3 + $ca4 + $ca5 + $ca6);
		
			
		$query="INSERT INTO `score_entry` 
				(`staff_id`, `class_name`, `subject_name`,`session_id`, `term_id`, `student_id`, `CA1`, `CA2`,  `CA3`) 
		VALUES ('{$id}', '$class', '$subj', '{$sess_id}', '{$term_id}' , '$qid', '$ca1', '$ca2', '$ca3') ";
			$result=mysql_query($query);
			// get the id of the last query nd update the remaining  CA colons
			 $last_id=mysql_insert_id();
			
			
			$query="UPDATE `score_entry` 
				SET
				 `CA4` = '$ca4',
				 `CA5`= '$ca5',
				 `CA6` = '$ca6',
				  `CA_total` = '{$ca_total}' 
				   WHERE `id` =  '{$last_id}'"; 
				   $result=mysql_query($query);
			 
						
		   			}
	}
		   		
					
		   
		   
	 
	 					if(!$result){
						echo mysql_error();
						}
						
		$session->message("Scores have been successfully submitted for grading");
		redirect_to('t_ca.php');
		exit();
			


?>
