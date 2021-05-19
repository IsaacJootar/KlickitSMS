<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/class_manager.php'); ?>


 <?php 
 $id=$_POST['class_id'];

global $database;
   $class=classManager::find_by_id($id);
   $former_name=$class->class_name;

   $class_name=ucwords($_POST['class_name']);
    $update=$database->query("UPDATE `class_section` SET `class_name`= '{$class_name}'
                 WHERE `class_name`='{$former_name}'");
    $update=$database->query("UPDATE `form_master` SET `class_name`= '{$class_name}'
                 WHERE `class_name`='{$former_name}'");
    $update=$database->query("UPDATE `notification` SET `class_name`= '{$class_name}'
                 WHERE `class_name`='{$former_name}'");
    /*$update=$database->query("UPDATE `score_entry` SET `class_name`= '{$class_name}'
                 //WHERE `class_name`='{$former_name}' AND `session_id`='{$sess_id}'
                 AND `term_id`='{$term_id}' ");

     $update=$database->query("UPDATE `score_entry_average` SET `class_name`= '{$class_name}'
                 WHERE  `class_name`='{$former_name}' AND `session_id`='{$sess_id}'
                  ");
                  

  $update=$database->query("UPDATE `score_entry_average_cumm` SET `class_name`= '{$class_name}'
                 WHERE `class_name`='{$former_name}' AND `session_id`='{$sess_id}'
                ");
     */
  $update=$database->query("UPDATE `staff_class` SET `class_name`= '{$class_name}'
                 WHERE `class_name`='{$former_name}'");

  $update=$database->query("UPDATE `students` SET `present_class`= '{$class_name}'
                 WHERE `present_class`='{$former_name}'");
  $update=$database->query("UPDATE `staff_class` SET `class_name`= '{$class_name}'
                 WHERE `class_name`='{$former_name}'");
  $update=$database->query("UPDATE `subject_class` SET `class_name`= '{$class_name}'
                 WHERE `class_name`='{$former_name}'");
  $update=$database->query("UPDATE `student_subjects` SET `class_name`= '{$class_name}'
                 WHERE `class_name`='{$former_name}' AND `session_id`='{$sess_id}'
                 AND `term_id`='{$term_id}' ");
  $update=$database->query("UPDATE `student_class` SET `class_name`= '{$class_name}'
                 WHERE `class_name`='{$former_name}' AND `session_id`='{$sess_id}'
                 AND `term_id`='{$term_id}' ");

  $update=$database->query("UPDATE `subject_teacher` SET `class_name`= '{$class_name}'
                 WHERE `class_name`='{$former_name}'");



  $class->class_name=ucwords($_POST['class_name']);
  
   
   //initialize error array//     
  $error_array=array();
  //initilize error flag//
  $error_flag=false;
  
  if ($error_flag)
  { 
    $_SESSION['sess_errors']=$error_array;
    session_write_close();
    redirect_to('class.php');
    exit();
  }
  // creat session
  if($class->update()){
    $session->message("Class Name has been updated successfully ");
    redirect_to('class.php');
    exit();
  
  }
  else {
    $session->message("No change has been made on class name ");
    redirect_to('class.php');
    exit();
  
  }
  ?>