<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php
 $_SESSION['term_id']= @$_GET['term_id'];
 $_SESSION['sess_id']= @$_GET['sess_id'];
  $_SESSION['s_id']= @$_GET['s_id'];
$check=mysql_fetch_array(mysql_query("SELECT `class_name` FROM `score_entry` WHERE `student_id`='{$_SESSION['s_id']}' AND `term_id`='{$_SESSION['term_id']}' AND session_id='{$_SESSION['sess_id']}'"));
 $class_name=$check['class_name'];
 
 $check_sec=mysql_fetch_array(mysql_query("SELECT `section_id` FROM `class_section` WHERE `class_name`='{$class_name}'"));
   $sec_id=$check_sec['section_id'];
 $ca_num=mysql_fetch_array(mysql_query("SELECT `ca_num` FROM `assesment` WHERE `section_id`=$sec_id"));
 if(mysql_num_rows(mysql_query("SELECT `ca_num` FROM `assesment` WHERE `section_id`=$sec_id")) < 1){
	 echo '<br>';
	 echo "PLEASE CONFIGURE THE NUMBER OF CA FORMAT FOR THIS CLASS";
	 }
 $ca_num=$ca_num['ca_num'];


switch($ca_num)
{
	case 2: 
	header("location:f_result_print_out2.php");
	break;
	case 3:
	header("location:f_result_print_out3.php");
	break;
    case 4:
	header("location:f_result_print_out4.php");
	break; 
}
	?>