<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php
 $error_array=array();
 $error_flag=false;
 $_SESSION['term']= @$_GET['term_id'];
 $_SESSION['sess']= @$_GET['sess_id'];
  $_SESSION['student_id']= @$_GET['student_id'];
// check if this student took exams for this term and session//
  $check_result=mysql_query("SELECT `class_name` FROM `score_entry` 
  	WHERE `student_id`='{$_SESSION['student_id']}' AND `term_id`='{$_SESSION['term']}' AND `session_id`= '{$_SESSION['sess']}'");

   if(mysql_num_rows($check_result) < 1){
			$error_array[]=' No result was found for this student in this term! ';
			$error_flag=true;
	}
		 
			if($error_flag){	
			$_SESSION['sess_errors']=$error_array;
			session_write_close();
			redirect_to('generate_single_result.php');
			exit();
			}
	 
// get student class as at that time//
   $get_class=mysql_fetch_array(mysql_query("SELECT `class_name` FROM `score_entry` 
  	WHERE `student_id`='{$_SESSION['student_id']}' AND `term_id`='{$_SESSION['term']}' AND `session_id`= '{$_SESSION['sess']}'"));
  echo $class_name=$get_class['class_name'];
   $_SESSION['class_name']= $class_name;
  // use che class to get a secion/-izicc come and sTore his section also for each term, in case the school changes the sections where classes belongs /
 $check_sec=mysql_fetch_array(mysql_query("SELECT `section_id` FROM `class_section` WHERE `class_name`='{$_SESSION['class_name']}'"));
 $sec_id=$check_sec['section_id'];
 $ca_num=mysql_fetch_array(mysql_query("SELECT `ca_num` FROM `assessment` WHERE `section_id`=$sec_id"));
 $ca_num=$ca_num['ca_num'];
 $count_ca_num=mysql_num_rows(mysql_query("SELECT `ca_num` FROM `assessment` WHERE `section_id`=$sec_id"));
 
 if(mysql_num_rows(mysql_query("SELECT `ca_num` FROM `assessment` WHERE `section_id`=$sec_id")) < 1){
	 echo '<br>';
	 echo "PLEASE CONFIGURE THE NUMBER OF CA FORMAT FOR THE CLASS THIS STUDENT BELONGS";
	 }
  $dossier_name=mysql_fetch_array(mysql_query("SELECT `dossier_name`
   FROM `dossier_assessment_usage` WHERE  `session_id`= '{$_SESSION['sess']}' AND `term_id`= '{$_SESSION['term']}' AND `section_id`=$sec_id "));
   $dossier_name= $dossier_name['dossier_name'];
  if(!$dossier_name){

  echo "DOSSIER TYPE HAS NOT YET BEEN STORED FOR THIS CLASS SECTION THIS TERM";
   exit();
	 }
  $_SESSION['dossier_name']=$dossier_name;



switch($ca_num)
{
	case 0:
	header("location:single_result_print0_$dossier_name.php");
	break;
	case 2:
	header("location:single_result_print2_$dossier_name.php");
	break;
    case 3:
	header("location:single_result_print3_$dossier_name.php");
	break;
	case 4:
	header("location:single_result_print4_$dossier_name.php");
	break;
	case 5:
	header("location:single_result_print5_$dossier_name.php");
	break;
	case 6:
	header("location:single_result_print6_$dossier_name.php");
	break;
}
	?>