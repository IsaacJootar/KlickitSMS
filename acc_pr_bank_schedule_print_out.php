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
					
					  
					
					  
			 
			  ?>
                  <table align="center" width="965">
                   
<tr>
 <td width="141" rowspan="1" ><img  src="images/jet.jpg" alt="" width="125" height="119" align="left"/></td>
      <th colspan="2" style="color:#600"><h1 align="center" style="color:#600"><?php echo $school_address=schoolInformation::find_school_name();

?> 

    </h1>
        <p align="left">
        <h5 align="center" style="color:#600">Address:<?php echo $school_address=schoolInformation::find_school_address();?> 


   
        
        
        </p>
        </h5></p>
 <div align="center"><a href="javascript:window.print()">[Bank Schedule]</a></div>
 <hr>
      <tr class="transcriptheader hdsmall">
    <td>DOCUMENT TYPE::</td>
   
    <td width="206"> <?php echo 'Bank Schedule';?></td>
    <td width="154">REPORT STATUS:</td>
    <td width="155"><?php echo "<span class='label-success label label-default'>Successful</span>"; ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>PAYING BANK</td>
    <td><?php echo 'Gurantee Trust Bank'; ?></td>
    <td>PAYING MONTH:</td>
    <td><?php 
			echo   $month. ', ' . $year;
	 ?></td>
  </tr>
</table>
<p>
                 <table width="1065"  border="1" align="center" style="line-height:1">
                   <tr class="transcriptheader hdsmall"  valign="top"; style="vertical-align:top" align="center">
                     <td width="36"><div align="center"><strong>SN</strong></div></td>
  
     <td width="207"><div align="left"><strong>Account N0.</strong></div></td>
     <td width="207"><div align="left"><strong>Staff Name</strong></div></td>
    <td width="207"><div align="center"><strong>Net Salary</strong></div></td>
    
  </tr>
   <?php
    
 global $database;
 $name=$database->query("SELECT * FROM `acc_staff_monthly_payroll` WHERE `payroll_month`='$month'  AND `payroll_year` ='$year' GROUP BY `staff_id`  order by trim(fullname) ASC");
 if (!$name) { // add this check.
    echo('Invalid query: ' . mysql_error());
}
$total_net=0;
   $no=1;
	while ($exp=$database->fetch_array($name)){ 
 $acc_num=$database->query("SELECT *  FROM `acc_staff_payroll` WHERE `staff_id`='{$exp['staff_id']}'");
 if (!$acc_num) { // add this check.
    echo('Invalid query: ' . mysql_error());
}
$acc_num=$database->fetch_array($acc_num);
$acc_num=$acc_num['account_number'];

?>
	<tr>
 <td><div align="center"><?php echo $no;?></div> </td>
 
  <?php $no++; ?>
      <td><div align="center"><?php echo $acc_num;?></div> </td>
        <td><div align="center"><?php echo $exp['fullname'];?></div> </td>

  <td><div align="center"> <?php
 
                   $net=accountsmonthlypayrollconfig::find_pr_net_salary($year, $month,$exp['staff_id']);
				    $SESSION['total_net']= $total_net+= $net;
				   echo $net=accountsmonthlypayrollconfig::format_currency($net);
				   ?></div></td>
     <?php
	
	 
	 
	
	  ?>
  </tr>
  
    
     <?php }?>
     
 
</table>
<div align="center">
  <p>&nbsp;</p>
  <p>A total of <strong>
    <?php  echo accountsmonthlypayrollconfig::format_currency($SESSION['total_net']);?>
    </strong> has been scheduled for<strong> <?php $staff_num=$database->query("SELECT * FROM `acc_staff_monthly_payroll` WHERE `payroll_month`='$month'  AND `payroll_year` ='$year' GROUP BY `staff_id`");
echo $staff_num=$database->num_rows($staff_num);
?>
    </strong> Staff as due salaries for the month<br>
  </p>
</div>
<p><br><p>
                     
           
				                                                                                                                                  

            
 
<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div>
<!--/row-->
    <!-- content ends --><!--/#content.col-md-0--><!--/fluid-row-->

    <!-- Ad, you can remove it -->