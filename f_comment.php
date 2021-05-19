<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
    <?php 
 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
 $f_comment=$_POST['comment'];
 $student_id=$_SESSION['id'];
  $class_name=$_SESSION['class_name'];
  
  
  $check=mysql_num_rows(mysql_query("SELECT * FROM `result_comments` WHERE `student_id`='{$student_id}' AND `sess_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `class_name`='{$class_name}' AND `f_id`= '{$id}'"));
				 		
		   if($check > 0){
			$error_array[]='you have already commented on this result';
			$error_flag=true;
		  }
				 
  
  if ($error_flag){	
			$_SESSION['sess_errors']=$error_array;
			session_write_close();
			redirect_to('f_veiw_result.php');
			exit();
			}
 	
		$query="INSERT INTO `result_comments` (`f_id`, `f_comment`,  `student_id`, `class_name`, `sess_id`, `term_id` ) 
						VALUES ( '{$id}','{$f_comment}', '{$student_id}', '{$class_name}', '{$sess_id}', '{$term_id}')";
				$result=mysql_query($query);
				if(!$result){
					
					echo mysql_error();
				}
				
				
				
				
				
				
				
				
						
			
			$session->message("Comment has been made successfully ");
		redirect_to('f_veiw_result.php');
		exit();
			

?>
		?>
?>