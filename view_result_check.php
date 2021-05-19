<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>


<?php
 $_SESSION['cat']= @$_POST['cat'];
 $_SESSION['subcat']= @$_POST['subcat'];
 
$check=mysql_fetch_array(mysql_query("SELECT * FROM `class_section` WHERE `class_name`='{$_SESSION['cat']}'"));
echo $sec_name=$check['section_id'];
switch($sec_name)
{
	case 3: 
	header("location:t_exam2.php");
	break;
	case 4:
	header("location:tj_exam.php");
	break;
}
	
// seems this file is useless, yes useless.//
	?>