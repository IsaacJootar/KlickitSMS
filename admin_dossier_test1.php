<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php
  $_SESSION['term']= @$_GET['term_id'];
  $_SESSION['sess']= @$_GET['sess_id'];
  $_SESSION['class_name']= @$_GET['class_name'];
  $_SESSION['page_count']=@$_GET['page_count'];
 // pick this dossier dynamically-Izicc//
 
 $check_sec=mysql_fetch_array(mysql_query("SELECT `section_id` FROM `class_section` WHERE `class_name`='{$_GET['class_name']}'"));
  $sec_id=$check_sec['section_id'];
  $sec_id=$_SESSION['sec_id']=$sec_id;
  $ca_num=mysql_fetch_array(mysql_query("SELECT `ca_num` FROM `assessment` WHERE `section_id`=$sec_id"));
 if(mysql_num_rows(mysql_query("SELECT `ca_num` FROM `assessment` WHERE `section_id`=$sec_id")) < 1){
	 echo '<br>';
	 echo "PLEASE CONFIGURE THE NUMBER OF CA FORMAT FOR THIS CLASS";
	 }
 $ca_num=$ca_num['ca_num'];
 
  //$dossier_name=mysql_fetch_array(mysql_query("SELECT `dossier_name` FROM `dossier_types` ORDER BY `id` DESC"));
  
  $dossier_name=mysql_fetch_array(mysql_query("SELECT `dossier_name`
   FROM `dossier_assessment_usage` WHERE  `session_id`= '{$_SESSION['sess']}' AND `term_id`= '{$_SESSION['term']}' AND `section_id`=$sec_id "));
   $dossier_name= $dossier_name['dossier_name'];
  if(!$dossier_name){

  echo "DOSSIER TYPE HAS NOT YET BEEN STORED FOR THIS CLASS SECTION THIS TERM";
   exit();
	 }
  $_SESSION['dossier_name']=$dossier_name;




// later bring back the code for dossier

switch($ca_num)
{
	case 0:
	header("location:a_result_print0_$dossier_name.php");
	break;
	case 2:
	header("location:a_result_print2_$dossier_name.php");
	break;
    case 3:
	header("location:a_result_print3_$dossier_name.php");
	break;
	case 4:
	header("location:a_result_print4_$dossier_name.php");
	break;
	case 5:
	header("location:a_result_print5_$dossier_name.php");
	break;
	case 6:
	header("location:a_result_print6_$dossier_name.php");
	break;
}
	?>