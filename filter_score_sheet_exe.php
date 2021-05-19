<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/class_manager.php'); ?>

  <?php
      
$qry1=$database->query("SELECT `id`,  `student_id`, `subject_name` FROM `score_entry` WHERE `session_id` = $sess_id AND `term_id`= $term_id AND  `CA_total` = 0  AND (`exam` IS NULL OR `exam` =0)");  

foreach ($qry1 as $value):
    $qry1=$database->query("DELETE 
    FROM `score_entry` 
    WHERE `id` = '{$value['id']}' 

    ");

    $qry2=$database->query("DELETE 
    FROM `student_subjects` 
    WHERE `student_id` = '{$value['student_id']}'  AND `subject_name`= '{$value['subject_name']}'

    ");
endforeach;
// chill for thios deletion for now// 
//$qry2=$database->query("DELETE  FROM `score_entry` WHERE `staff_id` = 0");

if(!$qry2){
echo 'An error occured, try again, score sheet could not be filtered'. mysql_error();
}





$session->message("Masterscore sheet have been successfully filtered.");
redirect_to('filter_score_sheet.php');
exit();
?>  








