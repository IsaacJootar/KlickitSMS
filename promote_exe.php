<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/class_manager.php'); ?>


  <?php
 $_SESSION['from_class'];
 $qst=$_POST['qst'];
 $to_class=$_POST['to_class'];
	 
	 $qry = "SELECT class_name FROM `graduating_classes` WHERE `class_name` ='{$_SESSION['from_class']}'";
      $result = mysql_query($qry);
      if(mysql_num_rows($result) == 1){
 // if students are in any of the classes, then graduate them//
		  
		  for($i=0;$i<count($qst);$i++){
		global $database;
		 $student_id=$qst[$i];
			
	$qry=$database->query("UPDATE `students`
					SET `present_class` = 'graduated' 
					WHERE `present_class`= '{$_SESSION['from_class']}' 
					AND `id`='{$student_id}'");
					 
				if(!$qry){
					echo mysql_error();
				}
				
				$qry2=$database->query("INSERT INTO `student_graduates`(`session_id`, `student_id`) VALUES('{$sess_id}', '{$student_id}')");
					
					$qry2=$database->query("DELETE FROM `student_class` WHERE `student_id`='{$student_id}'");
					 
				if(!$qry2){
					echo mysql_error();
				}
				
						
} // end for loop//
			
			$session->message("Selected  students have been successfully graduated");
		redirect_to('promote.php');
		exit();
	  }
	  
	   else{  // if students are NOT IN graduating classes then promote them//
 	for($i=0;$i<count($qst);$i++){
		global $database;
		 $student_id=$qst[$i];
			
	$qry=$database->query("UPDATE `students`
					SET `present_class` = '{$to_class}' 
					WHERE `present_class`= '{$_SESSION['from_class']}' 
					AND `id`='{$student_id}'");
					 
				if(!$qry){
					echo mysql_error();
				}
				
				$qry2=$database->query("UPDATE `student_class`
					SET `class_name` = '{$to_class}' 
					WHERE `class_name`= '{$_SESSION['from_class']}' 
					AND `student_id`='{$student_id}'");
					 
				if(!$qry2){
					echo mysql_error();
				}
				
				
				$qry3=$database->query("DELETE FROM `student_subjects`
					WHERE `class_name`= '{$_SESSION['from_class']}' 
					AND `student_id`='{$student_id}'");
					 
				if(!$qry3){
					echo mysql_error();
				}
				
						
}
			
			$session->message("Selected  student(s) have been successfully promoted from {$_SESSION['from_class']} to $to_class");
		redirect_to('promote.php');
		exit();
		}
	?>	