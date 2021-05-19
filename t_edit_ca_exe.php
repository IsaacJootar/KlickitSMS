<?php include('includes/t_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>

 <?php 
 
//$admin='Administrator';	
		$query="UPDATE `score_entry`
					SET `{$_SESSION['ca']}` = '{$_POST['ca']}',
					`edit_status` = 0,
					`ca_type` = 0
					WHERE `class_name`= '{$_SESSION['cat']}'
					AND `subject_name`= '{$_SESSION['subcat']}'
					AND `staff_id`= '{$id}'
					AND `student_id`= '{$_SESSION['id']}'
					AND `session_id`='{$sess_id}' 
					AND `term_id`='{$term_id}'";				
				$result=mysql_query($query);
				if(!$result){
					echo "error" .mysql_error();
					exit();
				}
						// update the CA total and exam, and come back to update everything , grades and remarks- am feeling lazy for now. 
						global $database; 
			$sql=$database->query("SELECT  * FROM `score_entry`
			WHERE `class_name`= '{$_SESSION['cat']}'
					AND `subject_name`= '{$_SESSION['subcat']}'
					AND `staff_id`= '{$id}'
					AND `student_id`= '{$_SESSION['id']}'
					AND `session_id`='{$sess_id}' 
					AND `term_id`='{$term_id}'");
					$sql=$database->fetch_array($sql);
					$sub_total=$sql['CA1'] + $sql['CA2'] + $sql['CA3'] + $sql['CA4'];
					//$term_total=$ql['CA_total']+$sql['exam'];
					
					
					$database->query("UPDATE `score_entry`
					SET `CA_total` = '{$sub_total}'
					WHERE `class_name`= '{$_SESSION['cat']}'
					AND `subject_name`= '{$_SESSION['subcat']}'
					AND `staff_id`= '{$id}'
					AND `student_id`= '{$_SESSION['id']}'
					AND `session_id`='{$sess_id}' 
					AND `term_id`='{$term_id}'");
					$result=mysql_query($query);
				if(!$database){
					echo "error" .mysql_error();
					exit();
				}
$session->message("score for {$_SESSION['ca']} has been successfully updated ");
		redirect_to('t_edit_ca.php');
		exit();
			

?>
