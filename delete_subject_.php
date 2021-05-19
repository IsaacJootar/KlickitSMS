<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/subject_manager.php'); ?>


 <?php 
global $database;
    $subject=$_GET['subject'];
	$delete=$database->query("DELETE FROM `subjects` WHERE `subject_name`='{$subject}'");
	$delete=$database->query("DELETE FROM `subject_class` WHERE `subject_name`='{$subject}'");
	$delete=$database->query("DELETE FROM `student_subjects` WHERE `subject_name`='{$subject}'");
	$delete=$database->query("DELETE FROM `subject_teacher`  WHERE `subject_name`='{$subject}'");


$session->message("Subject has been deleted successfully");
redirect_to('subject.php');
exit();
  
?>