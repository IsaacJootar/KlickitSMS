<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
 <?php 
 $class=$_SESSION['class'];
 $qst=$_POST['qst'];
 	for($i=0;$i<count($qst);$i++){
		 $subject_name=$qst[$i];
		 $qry = "DELETE FROM `subject_class` WHERE `subject_name` = '{$subject_name}' AND `class_name`= '{$class}'";
				$result=mysql_query($qry);
				if(!$result){
					die('error'. mysql_error());
				}
	}
			$session->message("Subject(s) successfully removed");
		redirect_to('remove_subj_from_class1.php');
		exit();
			

?>
		?>