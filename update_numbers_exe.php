<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>

<?php
  $qst=$_POST['qst'];
  //$class_name=$_SESSION['class_name'];
  $sql=$database->query("SELECT  `student_id` FROM `bulk_sms`");
   
if($values=$database->num_rows($sql) > 0){
  for($i=0;$i<count($qst);$i++){
    $qid=$qst[$i];
    $phone_number=$_POST["$qid". "phone_number"]; 
    
    // check if any new numbers are available in this class that came after numbers has already been updated so that u can insert for such student(s) bfor updating for others// 
    
     $query="SELECT  * FROM `bulk_sms` WHERE  `student_id`='{$qid}'";
      if($database->num_rows($query) < 1){ // if, then insert//
     $query="INSERT INTO `bulk_sms` 
            (`student_id`, `phone_number`) 
              VALUES ('{$qid}', '$phone_number')";
      $result=$database->query($query);
            
            }
    //afterwards update//
      $query="UPDATE `bulk_sms`
              SET `phone_number` = '{$phone_number}' 
              WHERE `student_id` =  '{$qid}'"; 
           $result=$database->query($query);
        
      } // end if//
  } // end for//
  
  // but if the table is clean then go ahead and insert//
if($values=$database->num_rows($sql) < 1){
  for($i=0;$i<count($qst);$i++){
    $qid=$qst[$i];
    $phone_number=$_POST["$qid". "phone_number"];
    $query="INSERT INTO `bulk_sms` 
        (`student_id`, `phone_number`) 
            VALUES ('{$qid}', '$phone_number')";
      $result=$database->query($query);
            
  } //end insert foreach loop// 
} //end insert  
          
  if(!$result){
    echo  mysql_error();
  }
            
   $session->message("phone numbers have been sucessfully updated");
    redirect_to('update_numbers.php');
    exit();
      
      


?>
