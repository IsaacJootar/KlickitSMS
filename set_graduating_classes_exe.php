<?php include('includes/header.php'); ?>  
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/class_manager.php'); ?>
<?php require_once('includes/config2.php'); ?>

<?php
$admin='Administrator';
 $qst=$_POST['qst'];
 	for($i=0;$i<count($qst);$i++){
		 $class_name=$qst[$i];
		 $qry = "SELECT class_name FROM `graduating_classes` WHERE `class_name` ='{$class_name}'";
			$result = mysql_query($qry);
			if(mysql_num_rows($result) > 0){
			continue;
			}
		$query="INSERT INTO `graduating_classes` (`class_name`, `assigned_by`) 
						VALUES ('{$class_name}', '$admin')";
				$result=mysql_query($query);
				if(!$result){
					echo mysql_error();
				}
						
}

			
                
			
			$session->message("Classes have been set successfully, multiple assignment will be ignored ");
		redirect_to('set_graduating_class.php');
		exit();
			

?>
	