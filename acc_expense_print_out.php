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
<?php require_once('classes/accountExpense.php'); ?>
<?php require_once('classes/schoolInformation.php'); ?>
    
            <!-- content starts -->
   


    <div class="box col-md-14">
       
       
            
<div class="box-content row">
                
  <?php
            $from=$_GET['from'];
					  $to=$_GET['to'];
					  $item_name=$_GET['item_name'];
					
					
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
 <div align="center"><a href="javascript:window.print()">[Expense Report]</a></div>
 <hr>
      <tr class="transcriptheader hdsmall">
    <td>DOCUMENT TYPE::</td>
   
    <td width="206"> <?php echo 'Expense Report';?></td>
    <td width="154">REPORT STATUS:</td>
    <td width="155"><?php echo "<span class='label-success label label-default'>Successful</span>"; ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>FROM:</td>
    <td><?php echo  $from;?></td>
    <td>TO:</td>
    <td><?php 
			echo $to;
	 ?></td>
  </tr>
</table>
                 <table width="1065"  border="1" align="center" style="line-height:1">
                   <tr class="transcriptheader hdsmall"  valign="top"; style="vertical-align:top" align="center">
                     <td width="36"><div align="center"><strong>SN</strong></div></td>
    <td width="207"><div align="center"><strong>Expense Item</strong></div></td>
    <td width="224"><div align="center"><strong>Received By </strong></div></td>
    <td width="224"><div align="center"><strong>Amount </strong></div></td>
   <td width="226"><div align="center"><strong>Created  By</strong></div></td>
<td width="240"><div align="center"><strong>Expense ID</strong></div></td>
    <td width="211"><div align="center"><strong>Date</strong></div></td>
    
    	<?php //echo $st['class_name']; ?>
  </tr>
   <?php  
 global $database;
 $result=$database->query("SELECT *  FROM `acc_expense` WHERE  created_on BETWEEN '{$from}' AND '{$to}' AND  `item_name`='{$item_name}'");
   $no=1;
	while ($exp=$database->fetch_array($result)){ ?>
	<tr>
 <td><div align="center"><?php echo $no;?></div> </td>

  
 



    <td><div align="center"><?php 
	
	

echo $exp['item_name']. '</br>';$no++; ?></div></td>
  <td><div align="center"><?php echo $exp['received_by'];?></div></td>

   <td><div align="center"> <?php 
		  echo '₦';
		  echo  $exp['expense_amount']; ?></div></td>
  <td><div align="center"><?php echo 'Account officer';?></div></td>
    <td><div align="center"><?php  echo $exp['expense_id'];?></div></td>
      <td><div align="center"><?php echo $exp['created_on']; ?></div></td>
       
    
  </tr>
  
    
     <?php }?>
     
 
</table><br><p><div align="center">
<strong style="color:#F00" style="float:inherit">Total Expense: </strong>
                     <?php
                     $total=accountExpense::find_total_expense_by_item_name($from, $to, $item_name);
         echo '<b>'.$format_currency=accountExpense::format_currency($total). '<b>';
          ?>
  </div>
<br><p>
                     
           
				                                                                                                                                    
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
      <p>Principal's Signature
             ------------------------------------------------------------------------------------             </p></br>
      <p>Director's Signature
             ------------------------------------------------------------------------------------             </p>
      <p>&nbsp;</p>
    <td>&nbsp;</td>
</tr>
              
               

            
 
<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div>
<!--/row-->
    <!-- content ends --><!--/#content.col-md-0--><!--/fluid-row-->

    <!-- Ad, you can remove it -->