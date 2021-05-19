<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>


<?php
 $_SESSION['cat']= @$_POST['cat'];
 $_SESSION['subcat']= @$_POST['subcat'];
 // try and make this section selection  dynamic-izicc//
$check=mysql_fetch_array(mysql_query("SELECT * FROM `class_section` WHERE `class_name`='{$_SESSION['cat']}'"));
 $sec_id=$check['section_id'];
 $ca_num=mysql_fetch_array(mysql_query("SELECT `ca_num` FROM `assessment` WHERE `section_id`='{$sec_id}'"));
 if(mysql_num_rows(mysql_query("SELECT `ca_num` FROM `assessment` WHERE `section_id`='{$sec_id}'")) < 1){
	 echo '<br>';
	 echo "PLEASE CONFIGURE THE NUMBER OF CA FORMAT FOR THIS CLASS";
	 }
 $ca_num=$ca_num['ca_num'];
  $_SESSION['section_id']= $sec_id;


switch($ca_num)
{
	case 2: 
	header("location:vet_type2.php");
	break;
	case 3: 
	header("location:vet_type3.php");
	break;
	case 4: 
	header("location:vet_type4.php");
	break;
	
	 
        }
	?>