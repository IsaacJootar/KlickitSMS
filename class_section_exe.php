<?php include('includes/header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/section_manager.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config2.php'); ?>

 <?php 
 $qst=$_POST['qst'];
 // $class_id=$_POST['class_id'];
 $sec_name=$_POST['sec'];
 $sec_id = "SELECT id FROM `section` WHERE `sec_name` = '{$sec_name}' order by id";
		$sec_id = mysql_query($sec_id);
		$sec_id=mysql_fetch_array($sec_id);
		$sec_id=$sec_id['id'];
 $qst=$_POST['qst'];
 	for($i=0;$i<count($qst);$i++){
		 $class_name=$qst[$i];
		  $qry = "SELECT section_name, class_name FROM `class_section` WHERE `class_name` ='{$class_name}' AND `section_name` ='{$sec_name}'";
			$result = mysql_query($qry);
			if(mysql_num_rows($result)> 0){
			continue;
			}
		$query="INSERT INTO `class_section` (`section_name`, `class_name`, `section_id`) 
						VALUES ('{$sec_name}', '{$class_name}', '{$sec_id}')";
				$result=mysql_query($query);
				if(!$result){
					echo mysql_error();
				}
						
}

			
                
			
			$session->message("Classes been been  assigned to section successfully,  please note that multiple asssignments will be ignored ");
		redirect_to('section.php');
		exit();
			

?>
