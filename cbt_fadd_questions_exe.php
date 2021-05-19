<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php include("includes/clean.php"); ?>
<?php
$tittle_id=$_SESSION['tittle_id'];
$tittle_text=$_SESSION['tittle_text'];
$class=$_SESSION['class'];
$subject=$_SESSION['subject'];
$staff_id=$_SESSION['staff_id'];

$o1=clean($_POST['o1']);	
$o2=clean($_POST['o2']);	
$o3=clean($_POST['o3']);	
$o4=clean($_POST['o4']);
$o5=clean($_POST['o5']);
// radio bottons
$oa= $_POST['oa'];
$ob= $_POST['ob'];	
$oc= $_POST['oc'];
$od= $_POST['od'];
$oe= $_POST['oe'];
 
 // a function to count array values
function count_array_values($array, $match) 
{ 
    $count = 0; 
    
    foreach ($array as $key => $value) 
    { 
        if ($value == $match) 
        { 
            $count++; 
        } 
    } 
    
    return $count; 
} 

// get the options, ssen inan array and check to make sure not more than one option is chosen as an answer//
$array = array("$oa", "$ob","$oc", "$od", "$oe");
if(count_array_values($array, "yes") > 1){
	echo "You cannot choose more than one option as the correct answer";
	echo '</br>'; echo '</br>'; echo '</br>';
	echo '<a href="cbt_tadd_questions2.php"> << Back</a>';
	exit();
}

	
// make sure atleast  one option is chosen as an answer//
if(count_array_values($array, "yes") < 1){
	echo "You must choose one option as the correct answer";
	echo '</br>'; echo '</br>'; echo '</br>';
	echo '<a href="cbt_tadd_questions2.php"> << Back</a>';
	exit();
}
 
$score=$_POST['score'];
$ques_text=trim($_POST['ques_text']);

$qry=$database->query("SELECT `id` FROM `cbt_question_tittle` WHERE tittle_text= '{$tittle_text}'");
$quest_tittle_id=$database->fetch_array($qry);
$quest_tittle_id=$quest_tittle_id['id'];

			//  save the question and hold the ID//

$sql=$database->query("INSERT INTO `cbt_questions`(`ques_text`, `tittle_text`, `score`, `staff_id`, `class`, `subject`) VALUES ('{$ques_text}', '{$tittle_text}', '{$score}', '$staff_id', '{$class}', '{$subject}')");	
	if ($sql){ 
		 $ques_id=$database->insert_id();
		 
		 // //insert each option, then check if  the option was (yes-correct  answer), then get the ID of that option from the database and save it as the correct answer for the question. we are storing the IDS of the answers, and not the answers themselves. repeat for each option till you fid the correct answer //  	
			$sql=$database->query("INSERT INTO `cbt_options`(`ques_id`, `option`, `quest_tittle_id`) VALUES ('$ques_id', '$o1', '$quest_tittle_id')");
			 $opt_id=$database->insert_id();
		 if (isset($_POST['oa']) &&  $_POST['oa'] === 'yes'){

			$update=mysql_query("UPDATE `cbt_questions`SET `ans` = '{$opt_id}' WHERE id='{$ques_id}' ");
			if(!$sql){echo "error". mysql_error();}
		}
			
				if(!$sql){echo "error1". mysql_error();}
					
					$sql=$database->query("INSERT INTO `cbt_options`(`ques_id`, `option`, `quest_tittle_id`) VALUES ('$ques_id', '$o2', '$quest_tittle_id')");
					 $opt_id2=$database->insert_id();
				
					 if (isset($_POST['ob']) &&  $_POST['ob'] === 'yes'){
			
				$update=mysql_query("UPDATE `cbt_questions` SET `ans` = '{$opt_id2}' WHERE id='{$ques_id}' ");
					}
						if(!$sql) {echo "error2". mysql_error();}	
					$sql=$database->query("INSERT INTO `cbt_options`(`ques_id`, `option`, `quest_tittle_id`) VALUES ('$ques_id', '$o3', '$quest_tittle_id')");
					 $opt_id3=$database->insert_id();
				
							 if (isset($_POST['oc']) &&  $_POST['oc'] === 'yes'){
					
						$update=mysql_query("UPDATE `cbt_questions` SET `ans` = '{$opt_id3}' WHERE id='{$ques_id}' ");
							}
								if(!$sql) {echo "erro3". mysql_error();}	

						$sql=$database->query("INSERT INTO `cbt_options`(`ques_id`,`option`, `quest_tittle_id`) VALUES ('$ques_id', '$o4', '$quest_tittle_id')");
							 $opt_id4=$database->insert_id();
							
						 if (isset($_POST['od']) &&  $_POST['od'] === 'yes'){

					$update=mysql_query("UPDATE `cbt_questions` SET `ans` = '{$opt_id4}' WHERE id='{$ques_id}' ");
						}
					if(!$sql) {echo "error4". mysql_error();}	


					$sql=$database->query("INSERT INTO `cbt_options`(`ques_id`,`option`,  `quest_tittle_id`) VALUES ('$ques_id', '$o5', '$quest_tittle_id')");
					 $opt_id5=$database->insert_id();
			 if (isset($_POST['oe']) &&  $_POST['oe'] === 'yes'){
	
			$update=mysql_query("UPDATE `cbt_questions` SET `ans` = '{$opt_id5}' WHERE id='{$ques_id}' ");
			}
	if(!$sql){echo "error5". mysql_error();}
		$_SESSION['$tittle_id']=$tittle_id; 
		$session->message("Question  has been added successfully");
		header("location:cbt_fadd_questions2.php");
	exit();
					

	} // end of first sql// 
	else{
			
			 echo mysql_error();
	}
	