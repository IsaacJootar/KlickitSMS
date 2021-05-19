<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/term_info_manager.php'); ?>
 <?php 
  $starts=$_POST['DAY']. -($_POST['MONTH']).- ($_POST['YEAR']). '</br>';
  $ends=$_POST['DAY1']. -($_POST['MONTH1']).- ($_POST['YEAR1']); 
global $database;
    $term_info=new termInforManager();
	 echo $term_info->sess_id=$_POST['session'];
	  $term_info->term_id=$_POST['term'];
	 $term_info->next_term_starts=$_POST['DAY']. -($_POST['MONTH']).- ($_POST['YEAR']);
	 
	
	// creat session
	if($term_info->create()){
		$session->message("Term Information  has been successfully set");
		redirect_to('create_term_info.php');
		exit();
	
	}
	?>