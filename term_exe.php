<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/term_manager.php'); ?>
<?php require_once('includes/config.php'); ?>; ?>



 <?php 
global $database;
 $session=new Session();
    $term=new termManager();
	 $term->sess_id=$_POST['session'];
	 $term->term_def=$_POST['def'];
	 $term->term_code=$_POST['code'];
	 $term->status="Current Term";
	 $term->created_on= date('M j, Y h:i:s A', time());
	 //initialize error array//			
	$error_array=array();
	//initilize error flag//
	$error_flag=false;
	
	if (isset(  $term->sess_id) && (  $term->sess_id=='')){
		$error_array[]='Select A Current Session!';
		$error_flag=true;
	
	}
	if (isset(  $term->term_def) && (  $term->term_def=='')){
		$error_array[]='Select A Term Defination!';
		$error_flag=true;
	
	}
	if (isset(  $term->term_code) && (  $term->term_code=='')){
		$error_array[]='Select A Term Code!';
		$error_flag=true;
	
	}
	$qry=$database->query("SELECT * FROM `term`
						  WHERE `sess_id`='{$_POST['session']}' 
						  AND  `term_def`='{$_POST['def']}'");

	
	if($qry){
		if($database->num_rows($qry)== 1){
			$error_array[]='This session and term combination is set already';
			$error_flag=true;
		}
	}
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('create_term.php');
		exit();
	} 
	
	 global $database;		
	$qry=$database->query("SELECT id, status FROM `term` WHERE `status`='Current Term'");
	$qry=$database->fetch_array($qry);
	if($qry){
	 $id=$qry['id'];
	$database->query("UPDATE `term`
					SET `status` = 'Passed Term'
					WHERE `id`='{$id}'
					");
	}



	$query3="UPDATE `students` 
				SET
				  `status` = 1";
				   $result=mysql_query($query3);
				   

$query4="UPDATE `student_class` 
				SET
				  `status` = 1";
				   $result=mysql_query($query4);
				   
	// creat term
	if($term->create()){
		$session->message("Term  has been successfully created");
		redirect_to('create_term.php');
		exit();
	
	}


	?>