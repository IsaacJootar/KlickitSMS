<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>


<?php
 $_SESSION['section']= @$_GET['section'];
 $_SESSION['class_name']= @$_GET['class_name'];
 $ca_num=mysql_fetch_array(mysql_query("SELECT `ca_num` FROM `assessment` WHERE `section_id`='{$_SESSION['section']}'"));
 if(mysql_num_rows(mysql_query("SELECT `ca_num` FROM `assessment` WHERE `section_id`='{$_SESSION['section']}'")) < 1){
	 echo '<br>';
	 echo "PLEASE CONFIGURE THE NUMBER OF CA FORMAT FOR THIS CLASS";
	 }
 $ca_num=$ca_num['ca_num'];


switch($ca_num)
{
	case 2: 
	header("location:tem_type2.php");
	break;
	case 3: 
	header("location:tem_type3.php");
	break;
	case 4: 
	header("location:tem_type4.php");
	break;
	 
}
	?>