<?php include('includes/t_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/result_manager2.php'); ?>
<?php

 
 $class=$_SESSION['cat'];
  $subj=$_SESSION['subcat']; 		
		
  $qst=$_POST['qst'];
 	for($i=0;$i<count($qst);$i++){
		$qid=$qst[$i];
		$exam=$_POST["$qid". "exam"]; 
		$grading=resultManager2::grading_student_with_zero_ca_by_id($exam, $qid, $id, $subj,$class);	// $id (staff) comes from t_header					
		
	}	
	
		// store the dossier config used for the term, for each section here, dossier type, score, and ca name//
	$get_section=mysql_fetch_array(mysql_query("SELECT `section_id` FROM `class_section` WHERE `class_name`= '{$class}'"));
	$section_id=$get_section['section_id'];

	$get_dossier=mysql_fetch_array(mysql_query("SELECT dossier_name FROM `dossier_types` ORDER BY id DESC")); // last set dossier wil come first//
	$dossier_name=$get_dossier['dossier_name'];

	// GET CONFIG//
	$get_config=mysql_fetch_array(mysql_query("SELECT * FROM `assessment` WHERE `section_id`='{$section_id}' ")); 
	$CA1=$get_config['CA1']; 
	$CA2=$get_config['CA2']; 
	$CA3=$get_config['CA3']; 
	$CA4=$get_config['CA4'];
	$CA5=$get_config['CA5']; 
	$CA6=$get_config['CA6'];
    $score1=$get_config['score1']; 
	$score2=$get_config['score2']; 
	$score3=$get_config['score3']; 
	$score4=$get_config['score4'];
	$score5=$get_config['score5']; 
	$score6=$get_config['score6'];
	$exam=$get_config['total_exam'];
    
    // store this config for a section just one time, any one that submits exams first will trigger it for that section//
	$check_config=mysql_query("SELECT `section_id`, `session_id`, `term_id` FROM `dossier_assessment_usage` WHERE `term_id` ='{$term_id}' AND `session_id`= '{$sess_id}' AND `section_id`= $section_id");
	$get_rows=mysql_num_rows($check_config);
	if($get_rows <  1 ){
	   $store_config=mysql_query("INSERT INTO `dossier_assessment_usage`(`dossier_name`, `session_id`,`term_id`, `section_id`, `CA1`,`CA2`,`CA3`,`CA4`,`CA5`,`CA6`,  `score1`, `score2`, `score3`, `score4`, `score5`, `score6`, `exam`) VALUES ('{$dossier_name}', '{$sess_id}', '{$term_id}', '{$section_id}', '{$CA1}', '{$CA2}', '{$CA3}', '{$CA4}', '{$CA5}', '{$CA6}', '{$score1}', '{$score2}', '{$score3}', '{$score4}', '{$score5}', '{$score6}', '{$exam}')");
	}
	

	 
		$session->message("Examination Scores have been successfully submitted for grading ");
		redirect_to('t_exam.php');
		exit();
		

?>
