<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/class_manager.php'); ?>

 <?php 
 
//$admin='Administrator';
 $qst=$_POST['qst'];
 	
		$query="UPDATE `score_entry`
					SET `p_remark` = '0' 
					WHERE `class_name`= '{$_POST['subcat']}'
					 AND `session_id`='{$sess_id}' 
					 AND `term_id`='{$term_id}'";
				$result=mysql_query($query);
				if(!$result){
					echo "error" .mysql_error();
					exit();
				
						
}
$session->message("Remarks have been successfully made for '{$_POST['subcat']}', please note that multiple remarks will be ignored ");
		redirect_to('p_remark.php');
		exit();
			

?>
