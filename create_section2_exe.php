<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/section_manager.php'); ?>
<?php require_once('includes/config2.php'); ?>

 <?php 
 $qst=$_POST['qst'];
  $rangee=$_POST['start']. - $_POST['end'];
   $code=$_POST['code'];
 $sec_name=$_POST['name'];
 	for($i=0;$i<count($qst);$i++){
		 $class_name=$qst[$i];
		$query="INSERT INTO `section` (`sec_name`, `class_name`, `code`, `rangee`) 
						VALUES ('{$sec_name}', '{$class_name}', '$code', '$rangee')";
				$result=mysql_query($query);
				if(!$result){
					echo mysql_error();
				}
						
}

			
                
			
			echo  '<b>' . "SUBJECT(S)  HAVE BEEN SUCCESSFULLY ASSIGNED TO" . ' '.  $sec_name . '</b>';
			

?>
