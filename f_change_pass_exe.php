<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>

<?php
 
	 $error_array=array();
	//initilize error flag//
	$error_flag=false;
 $sql=mysql_query("SELECT * FROM `system_roles` WHERE `password` = '{$_POST['old_pass']}' AND `role` ='form_master' AND `user_id`= '{$id}'");

		   if($values=mysql_num_rows($sql)< 1){
			$error_array[]='Your old password is incorrect!';
			$error_flag=true;
		  }
					
			if ($error_flag){	
			$_SESSION['sess_errors']=$error_array;
			session_write_close();
			redirect_to('f_change_pass.php');
			exit();
			}
	if (mysql_num_rows($sql) == 1){
			$query1=mysql_query("UPDATE `system_roles` 
						SET password='{$_POST['new_pass']}'
					WHERE `user_id`= '{$id}'");
					// update staff table too//
					
					$query=mysql_query("UPDATE `staff` 
						SET password='{$_POST['new_pass']}'
					WHERE `id`= '{$id}'");
			
			$session->message("Password has been changed successfully ");
						redirect_to("f_change_pass.php");
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