<?php include('includes/header.php'); ?>  
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/subject_manager.php'); ?>
<?php require_once('includes/config2.php'); ?>

<?php
$admin='Administrator';
 $qst=$_POST['qst'];
 $class=$_POST['class'];
 $qst=$_POST['qst'];
 	for($i=0;$i<count($qst);$i++){
		 $subject_name=$qst[$i];
		 $qry = "SELECT subject_name FROM `subject_class` WHERE `subject_name` ='{$subject_name}' AND `class_name`= '{$class}'";
			$result = mysql_query($qry);
			if(mysql_num_rows($result)> 0){
			continue;
			}
		$query="INSERT INTO `subject_class` (`class_name`, `subject_name`, `assigned_by`) 
						VALUES ('{$class}', '{$subject_name}', '$admin')";
				$result=mysql_query($query);
				if(!$result){
					echo mysql_error();
				}
						
}

			
                
			
			$session->message("Subjects have been  assigned to class successfully, please note that multiple assignment will be ignored ");
		redirect_to('subject_classes.php');
		exit();
			

?>
	