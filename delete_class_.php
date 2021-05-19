<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php // require_once('classes/class_manager.php'); ?>


 <?php 

global $database;

 $class_name=$_GET['class_name'];
  $delete=$database->query("DELETE FROM `class_section` WHERE `class_name`= '{$class_name}'");
  $delete=$database->query("DELETE FROM `classes` WHERE `class_name`= '{$class_name}'");
  $delete=$database->query("DELETE FROM `form_master` WHERE `class_name`='{$class_name}'");
  $delete=$database->query("DELETE FROM `notification` WHERE `class_name`='{$class_name}'");
  $delete=$database->query("DELETE FROM `staff_class` WHERE `class_name`='{$class_name}'");
  $delete=$database->query("DELETE FROM `students` WHERE `present_class`='{$class_name}'");
  $delete=$database->query("DELETE FROM `staff_class` WHERE `class_name`='{$class_name}'");
  $delete=$database->query("DELETE FROM `subject_class` WHERE `class_name`='{$class_name}'");
  $delete=$database->query("DELETE FROM `student_subjects` WHERE `class_name`='{$class_name}' ");
  $delete=$database->query("DELETE FROM `student_class` WHERE `class_name`='{$class_name}'");
  $delete=$database->query("DELETE FROM `subject_teacher` WHERE `class_name`='{$class_name}'");

$session->message("class has been deleted successfully  ");
redirect_to('class.php');
exit();
  
  ?>