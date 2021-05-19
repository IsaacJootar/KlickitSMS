<?php include('includes/t_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>


<?php
$_SESSION['cat']= @$_POST['cat'];
 $_SESSION['subcat']= @$_POST['subcat'];
 // section selection  dynamic//
$check=mysql_fetch_array(mysql_query("SELECT * FROM `class_section` WHERE `class_name`='{$_SESSION['cat']}'"));
 $sec_id=$check['section_id'];
 $ca_num=mysql_fetch_array(mysql_query("SELECT `ca_num` FROM `assessment` WHERE `section_id`=$sec_id"));
 if(mysql_num_rows(mysql_query("SELECT `ca_num` FROM `assessment` WHERE `section_id`=$sec_id")) < 1){
	 echo '<br>';
	 echo "PLEASE CONFIGURE THE NUMBER OF CA FORMAT FOR THIS CLASS";
	 }
 $ca_num=$ca_num['ca_num'];


switch($ca_num)
{   	
    case 0: 
	header("location:t_exam0.php");
	break;
	case 2: 
	header("location:t_exam2.php");
	break;
	case 3:
	header("location:t_exam2.php");
	break;
    case 4: 
	header("location:t_exam2.php");
	break;
	case 6: 
	header("location:t_exam2.php");
	break;
}
	?>