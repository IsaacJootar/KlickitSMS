<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>

                  <?php
					if ((output_message($message))){
               echo   '<div class="alert alert-success">';
                   echo ' <button type="button" class="close" data-dismiss="alert">&times;</button>';
                   
                   echo output_message($message); 
               echo ' </div>';
				 unset ($message);
				 }
			  ?>
                  <?php echo $session->display_error(); ?>         
                     
             
    
           
                       <?php
				global $database;
				$payroll_month=$_POST['month']; 
				$error_array=array();
	//initilize error flag//
	$error_flag=false;
	 $check=$database->query("SELECT * FROM `acc_staff_monthly_payroll` WHERE `sess_id`='{$sess_id}' AND `term_id`='{$term_id}' AND `payroll_month`= '{$payroll_month}'");
			
if($check){
		if($database->num_rows($check) > 0){
			$error_array[]='Payroll for this month has already been configured!';
			$error_flag=true;
		}
	}
	
	if ($error_flag)
	{	
		$_SESSION['sess_errors']=$error_array;
		session_write_close();
		redirect_to('acc_pr_monthly_config.php');
		exit();
	}
	
	
      $sql=$database->query("SELECT * FROM `acc_staff_payroll` WHERE `status`= 1 ORDER BY `id`");
	   //query to generate the monthly payroll//
while($sta=$database->fetch_array($sql)) { 
// check to see if staff is in cooperative or not//
				// assign payroll variables for the month//
$configured_on=date('M j, Y h:i:s A', time()); 
$payroll_group=$sta['payroll_group']; 
$salary_amount=$sta['salary_amount']; 
$staff_id=$sta['staff_id'];
$coo_status=$sta['coo']; 

if($sta['coo']==0){
	$debit_item='none';
} else { 
	$debit_item='cooperative fee';
}
$debit_amount=$sta['coo_fee'];
$fullname=$sta['fullname'];
$gender=$sta['gender'];  
$payroll_month=$_POST['month']; 
$payroll_year=date('Y');             
   
	$full=$sta['fullname'];
	$q=$database->query("INSERT INTO `acc_staff_monthly_payroll`(`staff_id`, `sess_id`, `term_id`,`fullname`, `gender`, `payroll_group`, `salary_amount`, `coo_status`, `payroll_month`, `payroll_year`, `configured_on`, `debit_item`, `debit_amount`) VALUES ('{$staff_id}', '{$sess_id}', '{$term_id}','{$fullname}', '{$gender}', '{$payroll_group}', '{$salary_amount}', '{$coo_status}', '{$payroll_month}', '{$payroll_year}', '{$configured_on}', '{$debit_item}', '{$debit_amount}' )");	
		
	
} //end of while loop//
$session->message("Payroll for the month of $payroll_month has been successfully configured ");
		redirect_to('acc_pr_monthly_config.php');
		exit();
	

	
	
	 ?>
                             
                   
           
        
      
                 
                
      