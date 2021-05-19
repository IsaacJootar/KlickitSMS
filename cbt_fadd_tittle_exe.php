<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>

<?php

 $class=$_POST['cat'];
 $subj=$_POST['subcat'];
 $tittle=$_POST['tittle'];
 $qry=$database->query("SELECT `tittle_text` FROM `cbt_question_tittle` WHERE `tittle_text`='{$tittle}'");

	
	if($qry){
		if($database->num_rows($qry) >= 1){
			$error_array[]='This exam tittle is already created, us anoder name';
			$error_flag=true;
		}
	}
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('cbt_fadd_tittle.php');
		exit();
	}


$query="INSERT INTO `cbt_question_tittle` 
(`staff_id`, `class_name`, `subject_name`,`sess_id`, `term`, `tittle_text`) 
VALUES ('{$id}', '{$class}', '{$subj}', '{$sess_id}', '{$term}' , '{$tittle}')";
$result=$database->query($query);
		
   
if(!$result){
	echo "string". mysqli_error($con);
	exit();
}
		
$session->message("Title has been successfully saved");
redirect_to('cbt_fadd_tittle.php');
exit();



?>
