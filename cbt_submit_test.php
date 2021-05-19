<?php include('includes/s_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php
 $user_id=$s_id;//
 $tittle_text=$_POST['tittle_text'];
 $question=$_POST['question'];
 
	for($i=0;$i<count($question);$i++){
		$qid=$question[$i];
		$optionid=$_POST["$qid"]; // your value was my name, so  for each question value, give me the value of that question as a  post array name 
		
		$time=date('M j, Y h:i:s A', time());
		$single_question=$database->fetch_array($database->query("SELECT * FROM `cbt_questions` WHERE id='$qid'"));
		
		if (empty($optionid)){ // any option left empty or not attended to is asumed wrong, the id will go as zero & wil discard
		}
		else{
		$is_correct=($single_question['ans']==$optionid)?'1':'0'; //if option is  same as answer alrealdy stored then its correct, else wrong
		}
		$query="INSERT INTO `cbt_answeres` (`user_id`, `ques_id`,`optionid`,`is_correct`, `tittle_text`, `time`) 
						VALUES ('{$user_id}','$qid', '$optionid', '$is_correct', '$tittle_text', '$time') ";
				$result=$database->query($query);
				if($result){
				  $_SESSION['tittle_text']=$tittle_text;
				}
				
		
}

	  $session->message("Test has been successfully submitted and graded");
	  redirect_to("cbt_stest_questions.php");
	  session_write_close();
?>
