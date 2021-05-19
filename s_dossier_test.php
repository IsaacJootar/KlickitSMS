<?php include('includes/s_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php
 $_SESSION['term']= @$_GET['term'];
 $_SESSION['sess']= @$_GET['sess'];
 // pick this dossier dynamically-Izicc//
$check=mysql_fetch_array(mysql_query("SELECT `class_name` FROM `score_entry` WHERE `student_id`='{$s_id}' AND `term_id`='{$_SESSION['term']}' AND session_id='{$_SESSION['sess']}'"));
 $class_name=$check['class_name'];
 
 $check_sec=mysql_fetch_array(mysql_query("SELECT `section_id` FROM `class_section` WHERE `class_name`='{$class_name}'"));
  $sec_id=$check_sec['section_id'];
 $ca_num=mysql_fetch_array(mysql_query("SELECT `ca_num` FROM `assessment` WHERE `section_id`=$sec_id"));
 if(mysql_num_rows(mysql_query("SELECT `ca_num` FROM `assessment` WHERE `section_id`=$sec_id")) < 1){
	 echo '<br>';
	 echo "PLEASE CONFIGURE THE NUMBER OF CA FORMAT FOR THIS CLASS";
	 }
 $ca_num=$ca_num['ca_num'];
  $dossier_name=mysql_fetch_array(mysql_query("SELECT `dossier_name`
   FROM `dossier_assessment_usage` WHERE  `session_id`= '{$_SESSION['sess']}' AND `term_id`= '{$_SESSION['term']}'"));
   $dossier_name= $dossier_name['dossier_name'];
  if(!$dossier_name){

   echo "PLEASE CONFIGURE A DOSSIER TO BE USED FOR THIS TERM";
   exit();
	 }
  $_SESSION['dossier_name']=$dossier_name;



switch($ca_num)
{
	case 0:
	header("location:s_result_print_out0_$dossier_name.php");
	break;
	case 2:
	header("location:s_result_print_out2_$dossier_name.php");
	break;
    case 3:
	header("location:s_result_print_out3_$dossier_name.php");
	break;
	case 4:
	header("location:s_result_print_out4_$dossier_name.php");
	case 5:
	header("location:s_result_print_out6_$dossier_name.php");
	break;
	break;
	case 6:
	header("location:s_result_print_out6_$dossier_name.php");
	break;
}
	?>