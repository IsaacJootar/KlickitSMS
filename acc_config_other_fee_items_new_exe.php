<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/section_manager.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config2.php'); ?>

 <?php 
 $item_name=ucwords($_POST['item_name']);
 $qst=$_POST['qst'];
$expected_to_pay=$_POST['expected_to_pay'];

 	for($i=0;$i<count($qst);$i++){
		 $class_name=$qst[$i];
		  $qry = "SELECT * FROM `acc_configure_school_fees_items` WHERE `class_name` ='{$class_name}' AND  `item_name` = '{$item_name}' AND `status` =0";
			$result = $database->query($qry);
			if($database->num_rows($result)> 0){
			continue;
			}
		$query="INSERT INTO `acc_configure_school_fees_items` (`sess_id`,  `term_id`, `class_name`, `item_name`, `expected_to_pay`, `status`) 
						VALUES ('{$sess_id}', '{$term_id}', '{$class_name}', '{$item_name}', '{$expected_to_pay}', '0')";
				$result=$database->query($query);
				if(!$result){
					echo mysql_error();
				}
						
}

			
                
			
			$session->message("fees item configuration for new students is successfully saved. ");
		redirect_to('acc_config_other_fee_items_new.php');
		exit();
			

?>
