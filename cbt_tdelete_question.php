<?php include('includes/t_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>

       <?php
  $id=$_GET['id'];
  $tittle_text=$_GET['tittle_text'];
  //del session
  global $database;

 $database->query("DELETE FROM `cbt_questions` WHERE `id`='{$id}'");
 $database->query("DELETE FROM `cbt_options` WHERE `ques_id`='{$id}'");
 $database->query("DELETE FROM `cbt_answeres` WHERE `ques_id`='{$id}'");
 $_SESSION['tittle_text']=$tittle_text; 
    $session->message("Question  has been successfully deleted");
    redirect_to('cbt_tedit_questions2.php');
    exit();
  


                
  ?>  
