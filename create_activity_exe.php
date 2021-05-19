<?php include('includes/header.php'); ?>
<?php require_once('classes/section_manager.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config2.php'); ?>

  
 <?php $activity=ucfirst(strtolower($_POST['activity']));
 $activity_type=$_POST['activity_type'];
			
				if($activity_type=='affective'){
					$result=$database->query("INSERT INTO `activity_affective` (`activity_name`) 
						VALUES ('{$activity}')");

				}
			
					if($activity_type=='psychomotor'){
					$result=$database->query("INSERT INTO `activity_psychomotor` (`activity_name`) 
						VALUES ('{$activity}')");

				}
			
			$session->message("Activity has been successfully saved.");
		redirect_to('create_activity.php');
		
			
	
			
			
			 ?>