<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>

<?php


  $duration=$_POST['duration'];
  $days=$_POST['days'];
 $date=date('M j, Y h:i:s A', time());


$query="INSERT INTO `config_term_duration` 
(`duration`, `days`, `date`,`session`, `term`) 
VALUES ('{$duration}', '{$days}', '{$date}', '{$sess_id}', '{$term}')";
$result=$database->query($query);
		
   
if(!$result){
	echo "an error occured". mysql_error();
	exit();
}
		
$session->message("Term duration has been successfully set");
redirect_to('config_attendance.php');
exit();



?>
