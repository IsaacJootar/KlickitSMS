<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require('classes/smsAPI.php'); ?>
<?php require_once('includes/config.php'); ?>


<?php
 //initialize error array//     
  $error_array=array();
  //initilize error flag//
  $error_flag=false;
$username='klickitsms';
$password='zxcvbnm,.';
$sender='klickit';
$qst=$_POST['qst'];
if (!isset($_POST['qst'])){
    $error_array[]='Please select and display number(s) you wish to send bulk message to!';
    $error_flag=true;
  
  }
$msg=$_POST['message'];;
 for($i=0;$i<count($qst);$i++){
     $student_id=$qst[$i];
    $query=$database->query("SELECT  * FROM `bulk_sms` WHERE  `student_id`='{$student_id}'");
    $number=$database->fetch_array($query);
       $number= $number['phone_number'];
       if(empty($number) || strlen($number) < 11){ // check and see if number is empty or has less than 11 characters, then skip the iteration, dont send the message, move to the next number//
        continue;

       }
    echo $result = file_get_contents("https://api.loftysms.com/simple/sendsms?username=$username&password=$password&sender=$sender&recipient=$number&message=$msg");
}
  // check for arror and report//
  if ($error_flag)
  { 
    $_SESSION['sess_errors']=$error_array;
    session_write_close();
    redirect_to('bulk_message.php');
    exit();
  }  
 $session->message("Bulk message have been send sucessfully");
    redirect_to('bulk_message.php');
    exit();
      
?>
