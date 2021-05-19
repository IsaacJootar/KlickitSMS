<?php include('includes/s_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>

<?php
 
	 $error_array=array();
	//initilize error flag//
	$error_flag=false;
 $sql=mysql_query("SELECT `password` FROM `system_roles` WHERE `password` = '{$_POST['old_pass']}' AND `role` ='student'");

		   if($values=mysql_num_rows($sql)< 1){
			$error_array[]='Your old password is incorrect!';
			$error_flag=true;
		  }
					
			if ($error_flag){	
			$_SESSION['sess_errors']=$error_array;
			session_write_close();
			redirect_to('s_change_pass.php');
			exit();
			}
	if (mysql_num_rows($sql) == 1){
			$query=mysql_query("UPDATE `system_roles` 
						SET password='{$_POST['new_pass']}'
					WHERE `role`= 'student' AND `user_id`='{$s_id}'");
						if(!$query) {echo 'error'. mysql_error();}
					
					$query=mysql_query("UPDATE `students` 
						SET password='{$_POST['new_pass']}'
					WHERE `id`='{$s_id}'");
					if(!$query) {echo 'error'. mysql_error();}
					
			$session->message("Password has been changed successfully ");
						redirect_to("s_change_pass.php");
						exit();
					
					
	} // end else
				
 
 ob_end_flush();
 ?>
						</strong></div>	
							</div>
                        </div>
                    </div>
                </div>
			</div>
        </div>
<?php include("includes/footer.php"); ?>
