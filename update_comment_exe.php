<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>


 <?php 
 $c_id=$_POST['c_id'];
 $comment=$_POST['comment'];
$query="UPDATE `result_comments` 
				SET
				   `f_comment`= '{$comment}'
				  WHERE `id`=$c_id
				   ";
				   if($result=mysql_query($query)){
		$session->message("Comment has been updated successfully ");
		redirect_to('f_veiw_result.php');
		exit();
	
	}
	?>