<?php ob_start();?>
<?php session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING &  ~E_STRICT & ~E_DEPRECATED); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/schoolInformation.php'); ?>
<?php require_once('classes/accountschoolFees.php'); ?>
<?php require_once('classes/student_class_manager.php'); ?>
 <?php 

  $student_id=$_GET['student_id'];
  $sess=$_GET['sess_id'];
  $term=$_GET['term_id'];
 $query1=$database->query("SELECT * FROM  `acc_school_fees_payments`  
  WHERE `sess_id`='{$sess}' 
  AND  `term_id`= '{$term}'  
  AND `student_id`='{$student_id}' 
  AND `item_name`='tuition'"); 
    if (!$query1){
      die("database query failed getting tuition");
    }
    $fees= $database->fetch_array($query1);

 
$query2=$database->query("SELECT *  FROM  `acc_school_fees_payments`  
  WHERE `sess_id`='{$sess}' 
  AND  `term_id`= '{$term}'   
  AND `student_id`='{$student_id}' 
  AND `item_name`!='tuition'");
    if (!$query2){
      die("database query failed getting other items");
    }
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
    <!-- The fav icon -->
    <link rel="shortcut icon" href="favicon.ico">

</head>

<body>
   <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
       
  <head>
    <meta charset="utf-8">
   
    <link rel="stylesheet" href="style.css" media="all" />
     <link rel="shortcut icon" href="favicon.ico">
  </head>
  <body>
    <div>
    <header class="clearfix">

      <div id="logo">
        <img src="images/jet.jpg">
      </div>
      <h1 style="background: #2C3539"> School Fees Reciept</h1>
      <div id="company" class="clearfix">Student: 
 <?php echo $student_name=studentclassManager::find_student_name($student_id);?><p>Class:
  <?php echo  $student_class= studentclassManager::find_student_class($student_id);?>
  <p>Mode of Payment:
  <span class='label-alert label label-default'><?php echo ucwords($fees['mop']);?></span>
      </div>
      <div id="project">
       <?php echo $school_address=schoolInformation::find_school_name();?>  <p>
          <?php echo $school_address=schoolInformation::find_school_address();?> <p>
           <?php echo get_session_term($sess, $term)  ?> Academic Session
         
         
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service"># FEES ITEMS </th>
            <th class="desc">DESCRIPTION</th>
            <th>AMOUNT PAID</th>
            <th>BALANCE</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service"><?php  echo ucwords($fees['item_name']); ?> Fee</td>
            <td class="desc">-</td>
            <td class="unit"><?php echo format_currency($fees['have_paid']); ?></td>
            <td class="total">
             <?php 
                  if($fees['have_paid'] < $fees['expected_to_pay']){
                   
                    echo  format_currency($fees['expected_to_pay'] - $fees['have_paid']);
                  }
                  if($fees['have_paid'] >= $fees['expected_to_pay']){
                   
                    echo "none";
                  }
                   ?></td>
          </tr>
          <tr bgcolor="CCCDDC"> <th>Other school fees items</th></tr>
          
<?php 
      while($other_items=$database->fetch_array($query2)) { ?>
        <tr>     
           <td class="service"><?php  echo ucwords($other_items['item_name']); ?></td>
            <td class="desc">-</td>
            <td class="unit"><?php echo format_currency($other_items['have_paid']); ?></td>

            <td class="total"><?php 
                  if($other_items['have_paid'] < $other_items['expected_to_pay']){
                   
                    echo  format_currency($other_items['expected_to_pay'] - $other_items['have_paid']);
                  }
                  if($other_items['have_paid'] >= $other_items['expected_to_pay']){
                   
                    echo "none";
                  }
                   ?></td>

        </tr>

<?php } ?>

 <tr>     
           <td class="service">Discount </td>
            <td class="desc">-</td>
            <td class="unit"><?php echo format_currency($fees['discount']); ?></td>

            <td class="total">-</td>
            
        </tr>
          
           <tr> <th></th></tr>
           <td class="service">GRAND TOTAL </td>
            <td class="desc">P/B</td>
            <td class="unit"><?php echo format_currency(accountschoolFees::find_student_total_fees($sess, $term, $student_id)); ?></td>
            
            <td class="total"><?php echo format_currency(accountschoolFees::find_student_total_balance($sess, $term, $student_id)); ?></td>
            
        </tr>
          
        
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">This receipt is also available in the student / parent account on the portal, and can be generated or printed anytime. </div>
      </div>
    </main>
    <footer>
     receipt was created from the school portal and is valid without a signature and / or seal.
    </footer>

  </body>
</html>
<style type="text/css">
.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 15px; 
  font-family: Arial;

}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 108px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.0em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
</style>