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
					  $from=$_GET['from'];
					  $to=$_GET['to'];
					  //$item_id=$_GET['item_id'];
					
					
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
 <div align="center"><a href="javascript:window.print()">[income report by duration ]</a></div>
 <hr>
      <tr class="transcriptheader hdsmall">
    <td>DOCUMENT TYPE::</td>
   
    <td width="206"> <?php echo 'Income Report [date range]';?></td>
    <td width="154">REPORT STATUS:</td>
    <td width="155"><?php echo "<span class='label-success label label-default'>Successful</span>"; ?></td>
    
  </tr>
   <tr class="transcriptheader hdsmall">
    <td>TOTAL STUDENTS::</td>
   
    <td width="206"> <?php echo '<strong>'.$sql=$database->num_rows($database->query("SELECT `id` FROM `acc_student_fees_with_items` WHERE  `date` BETWEEN '$from' AND '$to'")).'<strong>';?></td>
    <td width="154">TOTAL AMOUNT:</td>
    <td width="155"><?php $sql=$database->fetch_array($database->query("SELECT SUM(have_paid) AS have_paid FROM `acc_student_fees_with_items` WHERE  `date` BETWEEN '$from' AND '$to'"));  echo '<strong>'. $format_currency=accountschoolFees::format_currency($sql['have_paid']).'</strong>';?></td>
    
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
 $result=$database->query("SELECT *  FROM `acc_student_fees_with_items` WHERE  `date`  BETWEEN '{$from}' AND '{$to}'");
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
     
 <tr>
<td  style="width: 21px;">&nbsp;</td>
<td align="center" style="width: 43px;">&nbsp;<strong align="center">TOTAL ON EACH FEES ITEMS</strong></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'pta')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'sports')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'first')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'uniform')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'bus')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'lab')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'toilet')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'coll')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'tfee')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'online')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'rfee')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'idcard')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'entrep')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'dev')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'french')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'exam')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'lesson')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'comp')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'maint')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'sessional')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'phonics')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'expected_to_pay')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'discount')?></td>
<td style="width: 25px;">&nbsp;<?php echo accountschoolFees::find_total_fees_on_item_by_date_range( $_GET['from'], $_GET['to'], 'have_paid')?></td>
<td style="width: 60px;">&nbsp;</td>
<td style="width: 60px;">&nbsp;</td>
<td style="width: 60px;">&nbsp;</td>
</tr>
     
     
 
</table><br><p><br><p>
                     
      <br><p><div align="center"> A total of  <?php echo '<strong>'.$expense=accountschoolFees::find_student_count_by_date_range($_GET['sess_id'], $_GET['term_id'], $_GET['from'], $_GET['to']).'<strong>'; echo ' '; ?>Student(s)  Paid the sum of <?php echo $expense=accountschoolFees::find_total_fees_per_term_by_date_range($_GET['sess_id'], $_GET['term_id'], $_GET['from'], $_GET['to']) ;?> only.
      From duration of: <?php echo '<strong>'. '<i>'.  $from;?> - To <?php  echo '<strong>'. '<i>'. $to;?>
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