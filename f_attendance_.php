<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('includes/config2.php'); ?>

<?php
 //initialize error array//     
$error_array=array();
//initilize error flag//
$error_flag=false;
  // shortcut for days, first 3 alpha...    
$qst=$_POST['qst'];
$date=$_POST['date'];
 $day=substr($_POST['date'], 0, 3);

switch ($day) {
	case 'Mon':
		$date =  'Mon';
		break;
	
	case 'Tue':
		$date =  'Tue';
		break;
	
	case 'Wed':
		$date =  'Wed';
		break;
	
	case 'Tue':
		$date =  'Tue';
		break;
	
	case 'Fri':
		$date = 'Fri';
		break;
	
	default:
		$date =  "date not a school day";
		break;
}



$week=$_POST['week'];

  $sql=$database->query("SELECT * FROM `student_attendance` WHERE `class_name`='{$myclass}' 
  	AND `sess_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `week`='{$week}' ");

	 
		   if($values=$database->num_rows($sql) > 0){
 	for($i=0;$i<count($qst);$i++){
		$s_id=$qst[$i];
		$date=$_POST['date'];
        $status=$_POST["$s_id"];
        $day_date= $day.'_date';
			$query="UPDATE `student_attendance` 
				SET
				  `$day` = '{$status}', 
				   `$day_date` = '{$date}' 
				WHERE `class_name`='{$myclass}' AND `sess_id`='{$sess_id}' 
				AND `term_id` = '{$term_id}' AND `student_id`='{$s_id}' AND `week`= '{$week}'"; 
				   $result=mysql_query($query);
		   }
	}
	
				   if($values=$database->num_rows($sql) < 1){
 	for($i=0;$i<count($qst);$i++){
		$s_id=$qst[$i];
		$date=$_POST['date'];
        $status=$_POST["$s_id"];
        $day_date= $day.'_date';
		$query="INSERT INTO `student_attendance` 
(`student_id`, `staff_id`,`class_name`, `sess_id`, `term_id`, `week`, `$day`, `$day_date`) 
 VALUES ('{$s_id}', '{$id}', '{$myclass}', '{$sess_id}',  '{$term_id}',  '{$week}',   '{$status}', '{$date}') ";
			$result=$database->query($query); // ids from f_header, feel lazy getti them seperatly
						
		   			}
	}
		   		
				
	 					if(!$result){
						echo mysql_error();
						}

		$session->message("student attendance for $date has been successfully saved");
        redirect_to('f_attendance.php');  
        exit();
			


?>
