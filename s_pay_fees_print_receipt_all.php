<?php ob_start();?>
<?php session_start();
$s_id=$_SESSION['SESS_USER'];
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


    
            <!-- content starts -->
   


    <div class="box col-md-14">
       
       
            
<div class="box-content row">
                
                 
             
             
                
                 
				 		
  <?php


					  $s_id= @$_GET['s_id']; 
					  global $database;
					  
					 
     $sql=$database->query("SELECT * FROM `acc_student_fees` WHERE `student_id`= '{$s_id}'");
	 $sql=$database->fetch_array($sql);
	 $s_id=$sql['student_id'];
					  $session=$database->query("SELECT * FROM `session_manager` WHERE `status`='Current Session'");
	$session=$database->fetch_array($session);
	 $sess_id=$session['id'];
	$session=$session['session'];
	 $qry=$database->query("SELECT * FROM `term` WHERE `status`='Current Term'");
	$term=$database->fetch_array($qry);
	$term_id=$term['id'];
	$term=$term['term_def'];

					
					
					  
			 
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
 <div align="center"><a href="javascript:window.print()">[School Fees Receipt Print Out]</a></div>
 <hr>
      <tr class="transcriptheader hdsmall">
    <td>CURRENT SESSION:</td>
   
    <td width="206"> <?php echo  $session; ?></td>
    <td width="154">CURRENT TERM:</td>
    <td width="155"><?php echo $term;  ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>DOCUMENT TYPE:</td>
    <td><?php echo 'School Fees Payment History'?></td>
    <td>TRANSACTION STATUS:</td>
     <td><h4><?php echo "<span class='label-success label label-default'>Successful</span>";?></h4></td>
  </tr>
</table>
                 <table width="965"  border="1" align="center" style="line-height:1">
                    <tr class="transcriptheader hdsmall"  valign="top"; style="vertical-align:top" align="center">
                 
    <td width="370"><div align="center"><strong>Student Name</strong></div></td>
      <td width="274"><div align="center"><strong>Bank Name </strong></div></td>
        <td width="274"><div align="center"><strong>Actual Fee </strong></div></td>
    <td width="207"><div align="center"><strong>Amount Paid </strong></div></td>
  
       
          <td width="224"><div align="center"><strong>Discount</strong></div></td>
           <td width="224"><div align="center"><strong>Balance </strong></div></td>
   <td width="226"><div align="center"><strong>Teller N0. </strong></div></td>
<td width="240"><div align="center"><strong>Transaction ID</strong></div></td>
    <td width="274"><div align="center"><strong>Payment Date</strong></div></td>
    
    	<?php //echo $st['class_name']; ?>
  </tr>
	<tr>

    <td><div align="center">  <?php
      $all=$database->query("SELECT `fullname` FROM `student_class` WHERE `student_id`= '{$s_id}'");
$all=$database->fetch_array($all);
echo ucfirst($all=$all['fullname']); ?>
		</div></td>
         <td><div align="center">  <?php
	
	$bank_id=$sql['bank_id']; 
     $bank_name=$database->query("SELECT `bank_name` FROM `acc_bank` WHERE `id` = $bank_id");
$bank_name=$database->fetch_array($bank_name);?>
		
		<?php echo $bank_name['bank_name']; ?></div></td>
            
    <td><div align="center"> <?php echo'₦';
	 echo $result=$sql['expected_to_pay']; ?></div></td>
  
        
    <td><div align="center"> <?php echo'₦';
	 echo $result=$sql['have_paid']; ?></div></td>
  
        
        
        
         <td><div align="center"> <?php   echo '₦';
		 echo $result=$sql['discount']; ?></div></td>
          <td><div align="center">   <?php 
	  if($result=$sql['have_paid']  <  $result=$sql['expected_to_pay'] ){
		  echo '₦';
		  echo  $result=$sql['expected_to_pay'] - $result=$sql['have_paid'];
	  }
	  if($result=$sql['have_paid'] >= $result=$sql['expected_to_pay']){
		 
		  echo "none";
	  }
	   ?></div></td>
        
        
      
    <td><div align="center"> <?php  echo $result=$sql['teller_no']; ?></div></td>
  
  <td><div align="center"> <?php  echo $result=$sql['trans_id']; ?></div></td>
      <td><div align="center"><?php  echo $result=$sql['created_on']; ?></div></td>
    
  </tr>
  
    
   
     
 
</table><br><p><br><p>
                     
           
				                                                                                                                                    
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