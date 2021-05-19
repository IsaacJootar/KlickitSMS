<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/student_manager.php'); ?>


 <?php 
 
//$admin='Administrator';
 $qst=$_POST['qst'];
 $student_id=$_POST['student'];
 $name=$database->query("SELECT `fullname` FROM `student_class` WHERE `student_id`= '$student_id'");
 $name=$database->fetch_array($name);
 $name=$name['fullname'];
 $name=strtoupper($name);
$class_name=$_SESSION['class_name'];

 $qst=$_POST['qst'];
 for($i=0;$i<count($qst);$i++){
		 $subject_name=$qst[$i]; // validate with session and term ids//
		 $qry = "SELECT * FROM `student_subjects` WHERE `student_id` ='{$student_id}' AND `session_id` = '{$sess_id}' AND `term_id` = '{$term_id}' AND `subject_name`='{$subject_name}'";
			$result = mysql_query($qry);
			if(mysql_num_rows($result)> 0){
			continue;
			}
		$query="INSERT INTO `student_subjects` 
							(`subject_name`, `class_name`, `session_id`, `term_id`, `student_id`)
					VALUES ('{$subject_name}','{$class_name}','{$sess_id}','{$term_id}','{$student_id}')";
				$result=mysql_query($query);
				if(!$result){
					echo "error" .mysql_error();
					exit();
				}
						
}

		$_SESSION['class_name']=$class_name;
			
                
			
			$session->message("Subjects have been  assigned to $name  successfully, please note that multiple asssignment will be ignored ");
		redirect_to('subject_to_student2_.php?class_name=' . $_SESSION['class_name']);
		exit();
			

?>
