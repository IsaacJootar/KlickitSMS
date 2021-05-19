<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/section_manager.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config2.php'); ?>

 <?php 
 $qst=$_POST['qst'];
$expected_to_pay=$_POST['expected_to_pay'];

 	for($i=0;$i<count($qst);$i++){
		 $class_name=$qst[$i];
		  $qry = "SELECT * FROM `acc_configure_tuition_fees` WHERE `class_name` ='{$class_name}' AND `status` =1";
			$result = $database->query($qry);
			if($database->num_rows($result)> 0){
			continue; // skip double assignmet
			}
		$query="INSERT INTO `acc_configure_tuition_fees` (`sess_id`,  `term_id`, `class_name`, `expected_to_pay`, `status`) 
						VALUES ('{$sess_id}', '{$term_id}', '{$class_name}', '{$expected_to_pay}', '1')";
				$result=$database->query($query);
				if(!$result){
					echo mysql_error();
				}
						
   }

			
                
			
			$session->message("fees configuration for old students successfully saved,  please note that multiple configuration for same class will be ignored ");
		redirect_to('acc_config_fees_old.php');
		exit();
			

?>
