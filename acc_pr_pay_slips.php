<?php ob_start();?>
<?php session_start();
$id=$_SESSION['SESS_USER'];
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
 if(!isset($_SESSION['SESS_USER'])){
    header('location:index.php');
    exit();
    }
    $role=$_SESSION['SESS_USER_ROLE'];


include('includes/config2.php') ;
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
       <title>Klickit SMS:School Fees Payment print out reciept</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Klickit School management software">
    <meta name="Klickit systems" content="Klickit School management softwares abuja.">


    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="favicon.ico">

</head>

<body>
   
     
   
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
       

<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/schoolInformation.php'); ?>
<?php require_once('classes/accountmonthlypayrollconfig.php'); ?>


    
            <!-- content starts -->
   


    <div class="box col-md-14">
       
       
            
<div class="box-content row">
                			 		
  <?php
					   $month=@$_GET['month'];
					     $year=@$_GET['year'];
					global $database;
					 $rows=$database->query("SELECT * FROM `acc_staff_monthly_payroll` WHERE `payroll_month`='$month'  AND `payroll_year` ='$year' GROUP BY `staff_id`");
					 if(!$rows){
						 echo 'error'. mysql_query();
						 exit();
					 }
					 foreach($rows as $row){
			
					   $data=$database->query("SELECT * FROM `acc_staff_monthly_payroll` WHERE `staff_id`= '{$row['staff_id']}' AND `payroll_month`='$month'  AND `payroll_year` ='$year'");
					 if(!$data){
						 echo 'error'. mysql_query();
						 exit();
					 }
					 $data=$database->fetch_array($data);
					 
					  
			  ?>
<table align="center" width="1095" style="font-family:'Comic Sans MS', cursive">
                   
<tr>
 <td width="141" rowspan="1" ><img  src="images/jet.jpg" alt="" width="125" height="119" align="left"/></td>
      <th colspan="2" style="color:#600"><h1 align="center" style="color:#600"><?php echo $school_address=schoolInformation::find_school_name();

?> 

    </h1>
        <p align="left">
        <h5 align="center" style="color:#600">Address:<?php echo $school_address=schoolInformation::find_school_address();?> 


   
        
        
        </p>
        </h5></p>
 <div align="center"><a href="javascript:window.print()"><h4>[Staff PaySlip:
  <?php echo $data['payroll_month']. ' ' .$data['payroll_year']; ?>]</h4></a>
  </div></table>
<br>
<table width="1020" border="1" align="center" style="font-family:'Comic Sans MS', cursive">
  <tr>
    <td scope="col"><p>Employee ID:  <?php echo $data['staff_id']; ?>                        </p>
    <p>Bank Name: Gurantee Trust bank PLC</p>
    <p>Bank Account: <?php  $acc_num= $database->query("SELECT * FROM `acc_staff_payroll`  WHERE `staff_id`= '{$row['staff_id']}'"); 
		$acc_num=$database->fetch_array($acc_num);
		echo $acc_num=$acc_num['account_number']
		?>:</p></td>
     </td>
    <td scope="col"><p>Name: <?php echo $data['fullname']; ?> </p>
    <p>Designation:STAFF</p></td>
  </tr>
  <tr>
    <td><div align="center">EARNINGS</div></td>
    <td><div align="center">DEDUCTIONS</div></td>
  </tr>
  <tr>
    <td><p>Basic Salary <?php
                     echo '₦'. $data['salary_amount'];?>
			  
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>Additional Income : None</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    </td>
    <td><?php
    $items = $database->query("SELECT * FROM `acc_staff_monthly_payroll`  WHERE `staff_id`= '{$row['staff_id']}' AND `payroll_year`='{$year}' AND `payroll_month`= '{$month}'  AND `debit_item` !='none'");
foreach($items as $item) { ?>
                       
         <p><?php echo  $item['debit_item'];  ?>:
           <?php echo  $item['debit_amount'];  ?><br>
           
           
           
           
           
           
           <?php }?>
           
         </p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <p>Total Deductions: <?php
                    $deduct=accountsmonthlypayrollconfig::find_pr_deductions($year, $month,$row['staff_id']);
					 echo $deduct=accountsmonthlypayrollconfig::format_currency($deduct);
					?></p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
      <p>&nbsp;</p>
    </td>
  <tr>
    <td><div align="left"><strong>Gross Salary</strong>  
      <?php
                    $gross=accountsmonthlypayrollconfig::find_pr_gross_salary($year, $month, $row['staff_id']);
echo $gross=accountsmonthlypayrollconfig::format_currency($gross);?>
    </div></td>
    <td><div align="left"><strong>Net Salary:</strong>
      <?php
                   $net=accountsmonthlypayrollconfig::find_pr_net_salary($year, $month,$row['staff_id']);
				   echo $net=accountsmonthlypayrollconfig::format_currency($net);
				   ?>
    </div></td>
  </tr>                
 
</table>
<p>
                     
           
				                                                                                                                                    
  <tr>
    <td><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      
</tr>
              
               

   <?php } // end of 1st foreach loop?>         
 
<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
    <!-- content ends --><!--/#content.col-md-0--><!--/fluid-row-->

    <!-- Ad, you can remove it -->
   
