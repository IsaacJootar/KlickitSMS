<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php
 
 $class_name=trim($_GET['class_name']);
 $ass_id=$_GET['ass_id'];
 $query1="SELECT * FROM `submitted_homework` WHERE `assignment_id`=$ass_id";
   $result=mysql_query($query1);
 while ($documents=mysql_fetch_array($result)) {
     $file_name=$documents['file_name'];
	$path="homework/$file_name";
	if(!unlink($path)){
	    echo "deletion was not successful, please try again later";
	}
 }
   $file_name=trim($_GET['file_name']);
 	$path="homework/$file_name";
	if(!unlink($path)){
	    echo "deletion was not successful, please try again later";
	}  
   $query1="DELETE FROM `submitted_homework` WHERE `assignment_id`=$ass_id";
     $result=mysql_query($query1);
     
   $query2="DELETE FROM `assignment` WHERE `file_name`= '{$file_name}' AND `class_name`='{$class_name}'";
   $result=mysql_query($query2);
   
    $session->message("Assignment / homework has been deleted successfully ");
    redirect_to('upload_assignment.php');
    exit();
    ?>


    

</body>
</html>
                                                        