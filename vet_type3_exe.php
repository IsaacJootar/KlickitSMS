<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>

<?php
 
 $class=$_SESSION['cat'];
  $subj=$_SESSION['subcat']; // 		
		$qst=$_POST['qst'];
 	for($i=0;$i<count($qst);$i++){
		$qid=$qst[$i];
		$ca1=$_POST["$qid". "ca1"]; 
		$ca2=$_POST["$qid". "ca2"];
		$ca3=$_POST["$qid". "ca3"];
		$exam=$_POST["$qid". "exam"]; 
		$ca_total=($ca1 + $ca2 + $ca3);
		$term_total=$ca_total+$exam;
		
		// insert for thos that missed from the formaster or teacher end
		 $query="SELECT  * FROM `score_entry` WHERE `subject_name`='{$subj}' AND `class_name`='{$class}' AND `student_id`='{$qid}'  AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'";
		 $query=mysql_query($query);
		  if(mysql_num_rows($query) < 1){
			$query="INSERT INTO `score_entry` 
				(`staff_id`, `class_name`, `subject_name`,`session_id`, `term_id`, `student_id`, `CA1`, `CA2`, `CA3`,`CA_total`) 
		VALUES ('{$id}', '$class', '$subj', '{$sess_id}', '{$term_id}' , '$qid', '$ca1', '$ca2', $ca3','{$ca_total}') ";
			$result=mysql_query($query);
						
		   			}

		   			// use all these guys from the database object


		   			 $session=mysql_fetch_array(mysql_query("SELECT * FROM `session_manager` WHERE `status`='Current Session'"));
	$sess_id=$session['id'];
	 $term=mysql_fetch_array(mysql_query("SELECT * FROM `term` WHERE `status`='Current Term'"));
	$term_id=$term['id'];
		$sql=mysql_fetch_array(mysql_query("SELECT * FROM `score_entry` WHERE `student_id` = '{$qid}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `subject_name` = '{$subj}' AND `class_name`= '{$class}' "));
		$term_total=$sql['CA_total'];
		$term_total=$term_total + $exam;
	if(!$check_sec=mysql_fetch_array(mysql_query("SELECT `section_id` FROM `class_section` WHERE `class_name`='{$class}'"))){
	echo 'error selecting section for grade formats'.mysql_error();
	}

   $sec_id=$check_sec['section_id'];

   // pick grading dynamically from the grading table//
$get_range=mysql_fetch_array(mysql_query("SELECT * FROM `grading` WHERE `section_id`='{$sec_id}'
 AND '{$term_total}' BETWEEN  `starts` AND `ends` "));
if(!$get_range){ echo "error selecting grading format".mysql_error(); exit();}
if($get_range){ 
 $grade=$get_range['grade'];
 $remark=$get_range['descp'];
  } 	 	
		
			$query="UPDATE `score_entry` 
					SET
				 		`CA1` = '$ca1',
				 		`CA2`= '$ca2',
				  		
				   		`CA3`= '{$ca3}',
				  		`CA_total` = '{$ca_total}',
				    	`exam`='{$exam}',
				  		`term_total`='{$term_total}', 
				  		`grade`='$grade', 
				  		 `remark`='{$remark}'
				    WHERE `student_id` =  '{$qid}' AND `subject_name`='{$_SESSION['subcat']}'
				    AND `class_name`='{$_SESSION['cat']}' AND `session_id`='{$sess_id}'
				    AND `term_id` = '{$term_id}'
				   "; 
				   $result=mysql_query($query);
		   }
	
	 					if(!$result){
						echo 'error in grading'. mysql_error();
						}
						
		//$session->message("Master score sheet has been successfully updated ");
		redirect_to('vet_type3.php');
		exit();
			


?>
