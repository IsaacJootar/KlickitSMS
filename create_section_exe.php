<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/section_manager.php'); ?>
<?php require_once('includes/config.php'); ?>

 <?php 
 global $database;
    $sec=new sectionManager();
  $sec->rangee=$_POST['start']. -  ($_POST['end']);
   $sec->code=$_POST['code'];
     $sec->sec_name=$_POST['name'];
   //initialize error array//     
  $error_array=array();
  //initilize error flag//
  $error_flag=false;
  $qry=$database->query("SELECT `sec_name` FROM `section` WHERE `sec_name`='{$_POST['name']}'");

  
  if($qry){
    if($database->num_rows($qry)== 1){
      $error_array[]='This same section is already created';
      $error_flag=true;
    }
  }
  
  if ($error_flag)
  { 
    $_SESSION['sess_errors']=$error_array;
    session_write_close();
    redirect_to('create_section.php');
    exit();
  }
  // creat session
  if($sec->create()){
    $session->message("Section has been successfully created");
    redirect_to('create_section.php');
    exit();
  
  }
  ?>