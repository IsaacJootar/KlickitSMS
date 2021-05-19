<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>

<?php

$dossier_name=$_SESSION['dossier_name'];
$query="INSERT INTO `dossier_types` 
            (`dossier_name`) 
              VALUES ('$dossier_name')";
      $result=$database->query($query);
if(!$result){
    echo  mysql_error();
}
            
   $session->message("dossier type has been sucessfully set, please note that all results this term will use this dossier type. You can change anytime you wish before exams starts ");
    redirect_to('set_dossier.php');
    exit();
      
      


?>
