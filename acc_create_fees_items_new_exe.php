<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/section_manager.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config2.php'); ?>

 <?php
 $item_name=trim($_POST['item_name']);

 //Check for duplicate item name
	$qry=$database->query("SELECT `item_name` FROM `acc_school_fees_items` 
		WHERE `item_name`='{$_POST['item_name']}' AND `status`=0 ");

	
	if($qry){
		if($database->num_rows($qry)== 1){
			$error_array[]='This item name has been previously created';
			$error_flag=true;
		}
	}

 // if errors are found store the error in a seesion//
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('acc_config_other_fee_items_new.php');
		exit();
	}
  

		$query="INSERT INTO `acc_school_fees_items` (`sess_id`,  `term_id`, `item_name`,  `status`) 
						VALUES ('{$sess_id}', '{$term_id}', '{$item_name}', '0')";  // 0 is new student
				$result=$database->query($query);
				if(!$result){
					echo mysql_error();
				}

			
                
			
			$session->message("$item_name, as fees item is successfully created. ");
		redirect_to('acc_config_other_fee_items_new.php');
		exit();
			

?>
