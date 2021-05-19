<?php ob_start();?>
<?php session_start();
$id=$_SESSION['SESS_USER'];
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
 if(!isset($_SESSION['SESS_USER'])){
    header('location:index.php');
    exit();
    }
    $role=$_SESSION['SESS_USER_ROLE'];

include('includes/config2.php');
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Klickit School Management Software</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Klickit School management software">
    <meta name="Klickit systems-Abuja" content="Klickit School management softwares abuja.">

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
  
  <?php

/* Include the `fusioncharts.php` file that contains functions  to embed the charts. */
include("fuse/php-wrapper/fusioncharts.php");
 require_once('classes/database.php'); 
 
 $dbhandle = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

   /*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
   if ($dbhandle->connect_error) {
  	exit("There was an error with your connection: ".$dbhandle->connect_error);
   }
?>

<html>
   <head>
    <link  rel="stylesheet" type="text/css" href="css/style.css" />

  	<!-- You need to include the following JS file to render the chart.
  	When you make your own charts, make sure that the path to this JS file is correct.
  	Else, you will get JavaScript errors. -->

  	<script src="fuse/js/fusioncharts.js"></script>
  </head>
   <body>
  	<?php
	global $database;
$session=$database->query("SELECT * FROM `session_manager` WHERE `status`='Current Session'");
	$session=$database->fetch_array($session);
	 $sess_id=$session['id'];
	$session=$session['session'];
	 $qry=$database->query("SELECT * FROM `term` WHERE `status`='Current Term'");
	$term=$database->fetch_array($qry);
	$term_id=$term['id'];

     	$strQuery = "SELECT class_name, sum(have_paid) as amount FROM acc_student_fees WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}' group by class_name  ";

     	// Execute the query, or else return the error message.
     	$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

     	// If the query returns a valid response, prepare the JSON string
     	if ($result) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData = array(
        	    "chart" => array(
                  "caption" => "Student/Class School fees  analysis chart",
                  
               "paletteColors" => "#0075c2,#1aaf5d,#f2cc00,#f45b00,#00c502,#1a0f50,#8e00c40,#8e02c0",
                    "bgColor" => "#ffffff",
                    "showBorder" => "1",
                    "use3DLighting" => "0",
                    "showShadow" => "0",
                    "enableSmartLabels" => "1",
                    "startingAngle" => "1",
                    "showPercentValues" => "1",
                    "showPercentInTooltip" => "0",
                    "decimals" => "1",
                    "captionFontSize" => "14",
                    "subcaptionFontSize" => "14",
                    "subcaptionFontBold" => "0",
                    "toolTipColor" => "#ffffff",
                    "toolTipBorderThickness" => "0",
                    "toolTipBgColor" => "#000000",
                    "toolTipBgAlpha" => "80",
                    "toolTipBorderRadius" => "2",
                    "toolTipPadding" => "5",
                    "showHoverEffect" => "1",
                    "showLegend" => "1",
                    "legendBgColor" => "#ffffff",
                    "legendBorderAlpha" => "0",
                    "legendShadow" => "0",
                    "legendItemFontSize" => "10",
                    "legendItemFontColor" => "#666666",
                    "useDataPlotColorForLabels" => "1"
              	)
           	);

        	$arrData["data"] = array();

	// Push the data into the array
        	while($row = mysqli_fetch_array($result)) {
           	array_push($arrData["data"], array(
              	"label" => $row["class_name"],
              	"value" => $row["amount"]
              	)
           	);
        	}

        	/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        	$jsonEncodedData = json_encode($arrData);

	/*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

        	   $pieChart = new FusionCharts("pie2D", "pie" , 800, 500, "chart-1", "json", $jsonEncodedData);
// Render pie chart
 $pieChart->render();
			 
			$pareto2d = new FusionCharts("pareto2d", "col" , 800, 500, "chart-2", "json", $jsonEncodedData);

	 $pareto2d->render();
	 $scrollline2d = new FusionCharts("spline", "scr" , 700, 400, "chart-3", "json", $jsonEncodedData);

	 $scrollline2d->render();

        	// Close the database connection
        	$dbhandle->close();
			
     	}

  	?>
  	

  </head>
  <body>
   <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="400js419pxysadmin.php.php"> 
                <span>Klickit sms</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs">  <?php echo $role; ?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
               
                
            </div>
            <!-- theme selector ends -->

            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="#"> <?php include('includes/term_info.php');?></a></li>    
            </ul>

        </div>
    </div>
    
    
   
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
    <?php include('includes/dir_side.php');?>
        

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
           
<div class=" row"></div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
                 <h2 align="justify"><img src="images/fa.png" width="18" height="18"> Klickit School Management Software.  Version 1.4.1</h2>
        </div>
            
            <div class="box-content row">
            <p class="center col-md-1" align="right">
                    <a href="dir_fees_analysis.php" title="Click here to reveal charts " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron"></i> Blank page? Refresh to reveal charts</a> 
                 
                     
                                             <?php
								$sql =$database->query("SELECT SUM(have_paid) as amount FROM acc_student_fees WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}'");
		$sql=$database->fetch_array($sql);
		$count =$database->query("SELECT  `student_id` FROM acc_student_fees WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}' ");
		$count=$database->num_rows($count);
	 
								 function format_currency($val,$symbol='₦',$r=2)
{


    $n = $val; 
    $c = is_float($n) ? 1 : number_format($n,$r);
    $d = '.';
    $t = ',';
    $sign = ($n < 0) ? '-' : '';
    $i = $n=number_format(abs($n),$r); 
    $j = (($j = strlen($i)) > 3) ? $j % 2 : 0; 

   return  $symbol.$sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j)) ;

}
?>
 <h3 align=center style="color:#000">A total of  <?php echo  format_currency($sql['amount'])?> has been paid by <?php echo  $count ?> student(s)</h3>;
       
		</h2>
                 
                <div class="col-lg-7 col-md-12">
                   
                   
    	<div id="chart-2"><!-- Fusion Charts will render here--></div>
        
              </div>
                
                 <div class="col-lg-7 col-md-12">
                   
                   
    	<div id="chart-1"><!-- Fusion Charts will render here--></div>
              </div>
              
                 <div class="col-lg-7 col-md-12">
                   
                   
    	<div id="chart-3"><!-- Fusion Charts will render here--></div>
              </div>
                

            </div>
        </div>
    </div>
</div>

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
   
 <?php include('includes/footer.php'); ?>
        <!--/span-->
        <!-- left menu ends -->
   

  </body>
</html>
<!-- This  script is developed by www.voidtricks.com -->