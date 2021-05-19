<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/staff_manager.php'); ?>


 <?php 
 $qst=$_POST['qst'];
 $staff_id=$_POST['fullname'];
 $qst=$_POST['qst'];
 	for($i=0;$i<count($qst);$i++){
		 $class_name=$qst[$i];
		  $qry = "SELECT staff_id, class_name FROM `staff_class` WHERE `staff_id` ='{$staff_id}' AND `class_name` ='{$class_name}'";
			$result = mysql_query($qry);
			if(mysql_num_rows($result)> 0){
			continue;
			}
		$query="INSERT INTO `staff_class` (`staff_id`, `class_name`) 
						VALUES ('{$staff_id}', '{$class_name}')";
				$result=mysql_query($query);
				if(!$result){
					echo mysql_error();
				}
						
}

			
                
			
			$session->message("Staff has been assigned to classes successfully, please note that multiple asssignments will be ignored ");
		redirect_to('manage_staff.php');
		exit();
			

?>
		?>