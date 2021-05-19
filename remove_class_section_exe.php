<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
 <?php 
 
 $qst=$_POST['qst'];
 	for($i=0;$i<count($qst);$i++){
		 $class_name=$qst[$i];
		 $qry = "DELETE  FROM `class_section` WHERE `class_name` = '{$class_name}'";
				$result=mysql_query($qry);
				if(!$result){
					echo mysql_error();
				}
						
}
			
			$session->message("Class is/are successfully removed from section");
		redirect_to('section.php');
		exit();
			

?>