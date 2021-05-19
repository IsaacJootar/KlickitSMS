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
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
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
<?php require_once('classes/accountschoolFees.php'); ?>
    
            <!-- content starts -->
   


    <div class="box col-md-14">
       
       
            
<div class="box-content row">
                
                 
             
             
                
                 
				 		
  <?php


					  $sess_id=$_GET['sess_id'];
					  $term_id=$_GET['term_id'];
					  $class=$_GET['class'];
					  $type=$_GET['type'];
					  $date=date("Y-m-d");
					
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
 <div align="center"><a href="javascript:window.print()">[printout daily income report]</a></div>
 <hr>
      <tr class="transcriptheader hdsmall">
    <td>DOCUMENT TYPE::</td>
   
    <td width="206"> <?php echo 'Income Report [dialy]';?></td>
    <td width="154">REPORT STATUS:</td>
    <td width="155"><?php echo "<span class='label-success label label-default'>Successful</span>"; ?></td>
    
  </tr>
   <tr class="transcriptheader hdsmall">
    <td>TOTAL STUDENTS::</td>
   
    <td width="206"> <?php echo '<strong>'.$sql=$database->num_rows($database->query("SELECT `id` FROM `acc_student_fees_with_items` WHERE  `term_id`='{$term_id}' AND `sess_id`='{$sess_id}' AND `date`='{$date}' AND `student_type`=$type")).'<strong>';?></td>
    <td width="154">TOTAL AMOUNT:</td>
    <td width="155"><?php $sql=$database->fetch_array($database->query("SELECT SUM(have_paid) AS have_paid FROM `acc_student_fees_with_items` WHERE `term_id`='{$term_id}' AND `sess_id`='{$sess_id}' AND `date`='{$date}' AND `student_type`=$type"));  echo '<strong>'. $format_currency=accountschoolFees::format_currency($sql['have_paid']).'</strong>';?></td>
    
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>DATE:</td>
    <td><?php echo  $date;?></td>
    <td>STUDENT TYPE:</td>
    <td><?php 
		if($type===1){echo 'Old Students';} elseif($type===0){echo 'New Students';} else{echo 'All students';}
	 ?></td>
  </tr>
</table>
                 <table width="1065"  border="1" align="center" style="line-height:1">
                   <tr class="transcriptheader hdsmall"  valign="top"; style="vertical-align:top" align="center">
                     <td width="36"><div align="center"><strong>SN</strong></div></td>
    <td width="280"><div align="center"><strong>Name</strong></div></td>
     <td width="224"><div align="center"><strong>Pta </strong></div></td>
    <td width="224"><div align="center"><strong>Sports </strong></div></td>
      <td width="224"><div align="center"><strong>First Aid </strong></div></td>
          <td width="224"><div align="center"><strong>Uniform </strong></div></td>
          <td width="224"><div align="center"><strong>Bus</strong></div></td>
    <td width="224"><div align="center"><strong>Lab</strong></div></td>
      <td width="224"><div align="center"><strong>toilet</strong></div></td>
          <td width="224"><div align="center"><strong>Roll coll </strong></div></td>
          <td width="224"><div align="center"><strong>T.fee</strong></div></td>
    
    <td width="224"><div align="center"><strong>Online </strong></div></td>
   <td width="226"><div align="center"><strong>R. fee </strong></div></td>
          <td width="224"><div align="center"><strong>ID card</strong></div></td>
    <td width="224"><div align="center"><strong>Entrep.</strong></div></td>
      <td width="224"><div align="center"><strong>Dev.</strong></div></td>
          <td width="224"><div align="center"><strong>French  </strong></div></td>
          <td width="224"><div align="center"><strong>Exams.</strong></div></td>
    
    <td width="224"><div align="center"><strong>Lesson  </strong></div></td>
   <td width="226"><div align="center"><strong>Comp </strong></div></td>
      <td width="224"><div align="center"><strong>Maintenance   </strong></div></td>
          <td width="224"><div align="center"><strong>Sessional </strong></div></td>
    
    <td width="224"><div align="center"><strong>Phonics  </strong></div></td>
   <td width="226"><div align="center"><strong>Actual Fees </strong></div></td>
   <td width="226"><div align="center"><strong>Discount</strong></div></td>
   <td width="226"><div align="center"><strong>Total amount paid </strong></div></td>
      <td width="226"><div align="center"><strong>Balance</strong></div></td>
        <td width="226"><div align="center"><strong>Trans. ID</strong></div></td>
    <td width="211"><div align="center"><strong>Date of last payment</strong></div></td>
    
    	<?php //echo $st['class_name']; ?>
  </tr>
   <?php  
 global $database;
 $result=$database->query("SELECT *  FROM `acc_student_fees_with_items` WHERE `term_id`='{$term_id}' AND `date`='{$date}'  AND `sess_id`='{$sess_id}'  AND `student_type`='{$type}'");
 if (!$result) { // add this check.
    echo('Invalid query: ' . mysql_error());
}

   $no=1;
	while ($exp=$database->fetch_array($result)){ 
	
	$name=$database->query("SELECT `fullname` FROM `students` WHERE `id`='{$exp['student_id']}'");
  $name=$database->fetch_array($name);
  $name=$name['fullname'];
	?>
	<tr>
 <td><div align="center"><?php echo $no;?></div> </td>
 <td><div align="center"><?php echo  ucfirst(strtolower($name));?></div> </td>
 <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['pta']); ?></div></td>
 <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['sports']); ?></div></td>
  <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['first']); ?></div></td>
   <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['uniform']); ?></div></td>
    <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['bus']); ?></div></td>
     <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['lab']); ?></div></td>
      <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['toilet']); ?></div></td>
       <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['coll']); ?></div></td>
        <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['tfee']); ?></div></td>
         <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['online']); ?></div></td>
          <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['rfee']); ?></div></td>
         <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['idcard']); ?></div></td>
          <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['entrep']); ?></div></td>
           <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['dev']); ?></div></td>
            <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['french']); ?></div></td>
             <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['exam']); ?></div></td>
              <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['lesson']); ?></div></td>
               <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['comp']); ?></div></td>
                <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['maint']); ?></div></td>
                 <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['sessional']); ?></div></td>
                  <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['phonics']); ?></div></td>
                   <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['expected_to_pay']); ?></div></td>
                 
           <td><div align="center"> <?php echo  $format_currency=accountschoolFees::format_currency($exp['discount']); ?></div></td>
    <td><div align="center"><?php echo accountschoolFees::format_currency($exp['have_paid']). '</br>';$no++; ?></div></td>


		  
		   <td><div align="center"> <?php 
	  if($exp['have_paid']  <  $exp['expected_to_pay'] ){
		  echo  $format_currency=accountschoolFees::format_currency($exp['expected_to_pay'] - $exp['have_paid']);
	  }
	  if($exp['have_paid'] >=$exp['expected_to_pay']){
		 
		  echo "none";
      
	  }
	   ?></div></td>
		  
    <td><div align="center"><?php  echo $exp['trans_id'];?></div></td>
      <td><div align="center"><?php echo $exp['date']; ?></div></td>
        </tr>
  
    
     <?php }?>
     
 
</table><br><p><br><p>
                     
      <br><p><div align="center"> A total of  <?php echo '<strong>'.$sql=$database->num_rows($database->query("SELECT `id` FROM `acc_student_fees_with_items` 
      WHERE  `term_id`='{$term_id}' 
      AND `sess_id`='{$sess_id}' AND `date`='{$date}'`student_type`='{$type}' ")).'<strong>'; echo ' '; ?>Students  Paid the sum of <?php $sql=$database->fetch_array($database->query("SELECT SUM(have_paid) AS have_paid FROM `acc_student_fees_with_items`
      WHERE `term_id`='{$term_id}' AND `sess_id`='{$sess_id}' AND `date`='{$date}' AND  `student_type`='{$type}'"));  echo '<strong>'. $format_currency=accountschoolFees::format_currency($sql['have_paid']).'</strong>';?> only
     </div>
				                                                                                                                                
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
       <p align="center" >Principal's Signature
             ---------------------------------------------------------------------------------------------Account's Signature
             -------------------------------------------------------------------          </p>
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