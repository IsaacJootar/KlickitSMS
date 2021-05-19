<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
 <?php 
 
 $qst=$_POST['qst'];
 $staff_id=$_POST['staff'];
 
 	for($i=0;$i<count($qst);$i++){
		 $class_name=$qst[$i];
		 $qry = "DELETE  FROM `staff_class` 
		 WHERE `class_name` = '{$class_name}'
		 AND `staff_id`=$staff_id";
		 $result=mysql_query($qry);
		 
		 $qry = "DELETE  FROM `subject_teacher`
		 WHERE `class_name` = '{$class_name}'
		 AND `staff_id`=$staff_id";
		 $result=mysql_query($qry);
				$result=mysql_query($qry);
				if(!$result){
					echo mysql_error();
				}
						
}
			
			$session->message("Class is successfully removed from staff");
		redirect_to('remove_staff_class.php');
		exit();
			

?>
		?>