<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php       
        $qst=$_POST['qst'];
        for($i=0;$i<count($qst);$i++){
        $qid=$qst[$i];
        $ca_name=$_POST["$qid". "ca_nam"];
        $ca_score=$_POST["$qid". "ca_score"];
        
            $query="INSERT INTO `assessment` (`ca_name`, `ca_score`) VALUES ('{$ca_name}','{$ca_score}')" ; 
    $result=mysql_query($query);
           }
                if(!$result){
                        echo mysql_error();
                        exit();
                        }
      $session->message("Assessment configuration for $ass_name has been saved");
    redirect_to('create_asses2.php');
    exit();
      