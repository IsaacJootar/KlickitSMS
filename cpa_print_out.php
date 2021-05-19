<?php ob_start();?>
<?php session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING &  ~E_STRICT & ~E_DEPRECATED);
include('includes/config2.php') ;
require_once('classes/schoolInformation.php'); ?>
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
   
     
   

                 
           
		<?php			
		$_SESSION['class_name'];
	    $_SESSION['sess'];
		$_SESSION['term'];
		
$session=mysql_query("SELECT * FROM `session_manager` WHERE `id`='{$_SESSION['sess']}'");
	$session=mysql_fetch_array($session);
	$session=$session['session'];
	 $qry=mysql_query("SELECT * FROM `term` WHERE `id`='{$_SESSION['term']}'");
	$term=mysql_fetch_array($qry);
	$term=$term['term_def'];
	
			
			?>
				
                                         
                    <table width="300" border="1" align="center">
                    <img src="images/jet.jpg" alt="" width="100" height="90" align="left"/>
                <h3 align="center" style="font-weight:bold"><?php echo $school_address=schoolInformation::find_school_name();?> </h3>
        <h5 align="center" style="font-weight:bold">Address:<?php echo $school_address=schoolInformation::find_school_address();?> </h5>
         <h5 align="center" style="font-weight:bold" style="color:#000">CPA Generated for <?php echo $_SESSION['class_name']; ?> </h5>
             <h5 align="center" style="font-weight:bold"  style="color:#000"> <?php          echo  $term .  ',' . ' ' .  $session . ' ' . ' Academic Session' ?> </h5>

 <h5 align="center"><a href="javascript:window.print()">[CPA Print Out]</a></h5>
                    
                      <tr bgcolor="#CCCCCC">
                             <td width="200"><div align="center"><strong>STUDENTS</strong> </div></td>
                            
                            <?php
    $sql=mysql_query("SELECT distinct `class_name`, `subject_name` FROM `subject_class`
	  WHERE `class_name`='{$_SESSION['class_name']}'");
	  while($sub=mysql_fetch_array($sql)){ ?> 
                            <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><font size="-2"> <?php echo $sub['subject_name'];?></font></span></div>
                            </div> </th> 
                             
                           
                            <?php } ?>
                            
                             <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><font size="-2"> subj no. </font></span></div>
                            </div> </th>
                        <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><font size="-2">Total</font></span>
                            </div> </th> 
                             <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><font size="-2">Average</font></span></div>
                            </div> </th> 
                             <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><font size="-2">Final Grade</font></span></div>
                            </div> </th> 
                             <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><font size="-2">  Position</font></span></div>
                            </div> </th>
                            
                      </tr>
                          
                          <?php
	  
	  ?>
                          <style type="text/css">
      th.rotate {
  /* Something you can count on */
  height:80px;

  padding:0px;

  
}

th.rotate {
 /* Safari */
-webkit-transform: rotate(-90deg);

/* Firefox */
-moz-transform: rotate(-90deg);

/* IE */
-ms-transform: rotate(-90deg);

/* Opera */
-o-transform: rotate(-90deg);
  border-collapse:collapse;
}
</style>
                          <?php
					
			$sql2=mysql_query("SELECT distinct `score_entry`. `student_id`, `score_entry`. `account_status`, `students`. `fullname` FROM `score_entry` JOIN `students` ON `score_entry`. `student_id`=`students`. `id` WHERE `class_name`= '{$_SESSION['class_name']}'
      AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'
	 AND `score_entry`. `account_status`=1 ORDER BY trim(fullname) ASC");
	  while($stu=mysql_fetch_array($sql2)){ ?>
                          <tr><td><div align="left"> <font size="-2">
                            <?php  echo $stu['fullname'];?></font>
                            </div></td>
                            <?php 	
					$student_id= $stu['student_id'];
					$sql3=mysql_query("SELECT distinct `class_name`, `subject_name` FROM `subject_class`
	  WHERE `class_name`='{$_SESSION['class_name']}'");
	  		while($sub=mysql_fetch_array($sql3)){
				
				$sub=$sub['subject_name'];
				
				 ?>
                            
                            <?php 
            $sql4=mysql_query("SELECT * FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_SESSION['class_name']}' AND `subject_name` = '{$sub}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'");
	  		     $scores=mysql_fetch_array($sql4);
		?>
        
        
                            <td style="font-size:2px"><div align="center"><font size="-2"><?php echo   $scores['term_total']; 
				
				
				?></font></div>
                
                
                </td>
                
                
               
                            
                            <?php  }?>
                            
                                                        <?php 
														
													
                //query table for num of subjs//
               
				$query1=mysql_fetch_array(mysql_query("SELECT SUM(term_total) AS total FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'"));
			$query2=mysql_num_rows(mysql_query("SELECT distinct `subject_name` FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'"));
                
														
														//query table for Total score 
														
											  
            $sql7=mysql_query("SELECT SUM(term_total) AS total FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'");
	  		     $total=mysql_fetch_array($sql7);?> 	
                 
                             <td style="font-size:2px"><div align="center"><font size="-2"><?php echo $query2;
				
				
				?></font></div>
                
                
                </td>
														
														
      
                            
                            <td style="font-size:2px"><div align="center"><font size="-2"><?php echo  $total['total']; 
				
				
				?></font></div>
                
                
                </td>
               
                            <td style="font-size:2px"><div align="center"><font size="-2"><?php if ($query2 < 0) {echo ' ';} 
							  if ($query2 > 0){echo $av=number_format((float)$query1['total']/$query2, 2, '.', '');}	
							  
			   if($av<40){$grade='F'; $remark='Fail';}
		elseif($av>=40 and $av<=44.9){ $grade='E'; $remark='Pass';}
		elseif($av>=45 and $av<=49.9){$grade='D'; $remark='Fair';}
		elseif($av>=50 and $av<=59.9){$grade='C'; $remark='Good';}
		elseif($av>=60 and $av<=69.9){$grade='B'; $remark='Very Good';}
		elseif($av>=70 and $av<=100){$grade='A'; $remark='Excellent';}
		else{$grade=''; $remark=''; }	
	

				
				
				?></font></div>
                
                
                </td>
            				   
				   <?php 		   
                $query3=mysql_query("SELECT distinct `class_name`, `term_id`, `session_id` 
				FROM `score_entry_average`
				 WHERE  `class_name`='{$_SESSION['class_name']}'
				  AND `session_id`='{$_SESSION['sess']}' AND 
				  `term_id`='{$_SESSION['term']}'");

 if($values=mysql_num_rows($query3) > 0){  
				
				// check if new students are available to be inserted first in the average table, bfor update can be carried out//
$query4="SELECT  * FROM `score_entry_average` WHERE `student_id`='{$student_id}'  AND `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'";
		 $query4=mysql_query($query4);
		  if(mysql_num_rows($query4) < 1){
			  
	

			$query4="INSERT INTO `score_entry_average` 
				(`student_id`, `class_name`,`session_id`, `term_id`, `average`, `grade`) 
		VALUES ('{$student_id}', '{$_SESSION['class_name']}', '{$_SESSION['sess']}', '{$_SESSION['term']}', '{$av}', '{$grade}')" ;
												$result=mysql_query($query4);  
		  }
												
			$query5="UPDATE `score_entry_average` 
				SET
				 `student_id` = '$student_id',
				 `class_name`= '{$_SESSION['class_name']}',
				  `term_id`= '{$_SESSION['term']}',
				  `session_id` = '{$_SESSION['sess']}', 
				  `grade`='{$grade}',
				  `average`='{$av}'
				  WHERE `student_id`='{$student_id}' AND `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'
				   "; 
				   $result=mysql_query($query5);
				
		  }
 
 // if students are not already given average then we insert.//
				   if($values=mysql_num_rows($query3) < 1){ 
		
			
		$query6="INSERT INTO `score_entry_average` 
				(`student_id`, `class_name`,`session_id`, `term_id`, `average`, `grade`) 
		VALUES ('{$student_id}', '{$_POST['class_name']}', '{$_SESSION['sess']}', '{$_SESSION['term']}', '{$av}', '{$grade}') ";
			$result=mysql_query($query6);	
		   			}
		   	
  
             ?>
             
             
              <td style="font-size:2px"><div align="center"><font size="-2"><?php  

$query7=mysql_fetch_array(mysql_query("

SELECT average FROM `score_entry_average` 
WHERE student_id ='$student_id' AND 
`session_id`='{$_SESSION['sess']}' AND 
`term_id`='{$_SESSION['term']}' AND 
`class_name`='{$_SESSION['class_name']}'"));	
 $av=$query7['average'];	 // I am feeling lazy. its actually averages, not term total//
 
 if($av<40){$grade='F'; $remark='Fail';}
		elseif($av>=40 and $av<=44.9){ $grade='E'; $remark='Pass';}
		elseif($av>=45 and $av<=49.9){$grade='D'; $remark='Fair';}
		elseif($av>=50 and $av<=59.9){$grade='C'; $remark='Good';}
		elseif($av>=60 and $av<=69.9){$grade='B'; $remark='Very Good';}
		elseif($av>=70 and $av<=100){$grade='A'; $remark='Excellent';}
		else{$grade=''; $remark=''; }
		echo $grade;
	

				
				
				?></font></div>
                
                </td>
             
             

                    <td style="font-size:2px"><div align="center"><font size="-2"><?php  
		   
$query7="SELECT t1.student_id, (SELECT COUNT(*) FROM score_entry_average t2 WHERE t2.average > t1.average AND  `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}') +1 AS rank FROM score_entry_average t1 WHERE  `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'

";
		 $query7=mysql_query($query7);
		 while ($pos=mysql_fetch_array($query7)){
		  $user_id=$pos['student_id'];
		    $pos=$pos['rank'];
		$query8="UPDATE `score_entry_average` 
				SET
				  `pos`='{$pos}'
				  WHERE `student_id`='{$user_id}' AND `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'
				   "; 
				   $result=mysql_query($query8);
		 }
		   ?>
				   
				   
				   
				   
				   
				   <?php

$query9=mysql_fetch_array(mysql_query("SELECT `pos` FROM  `score_entry_average` WHERE `student_id`='{$student_id}' AND  `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'"));	
echo $query9['pos'];	
	

				
				
				?></font></div>
                
                </td>
                          </tr>
                        
                        
                     
                          <?php }?>
                               
            
                        
</table>
                        
             
                 <?php

/* Include the `fusioncharts.php` file that contains functions	to embed the charts. */
include("fuse/php-wrapper/fusioncharts.php");
 
/* The following 4 code lines contain the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection. */



   // Establish a connection to the database
    $dbhandle = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
   /*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
   if ($dbhandle->connect_error) {
  	exit("There was an error with your connection: ".$dbhandle->connect_error);
   }
?>


  	<!-- You need to include the following JS file to render the chart.
  	When you make your own charts, make sure that the path to this JS file is correct.
  	Else, you will get JavaScript errors. -->

<script src="fuse/js/fusioncharts.js"></script>
 
  <?php
	
     	$strQuery = "SELECT count(DISTINCT student_id) AS count, grade FROM `score_entry_average` WHERE `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}' GROUP BY grade ORDER BY grade ";

     	// Execute the query, or else return the error message.
     	$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

     	// If the query returns a valid response, prepare the JSON string
     	if ($result) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData = array(
        	    "chart" => array(
                  "caption" => "Class Perfomanace Analysis (CPA) ",
                  
               "paletteColors" => "#0075c2,#1aaf5d,#f2cc00,#f45b00,#00c502,#1a0f50,#8e00c40,#8e02c0",
                    "bgColor" => "#ffffff",
                    "showBorder" => "0",
                    "use3DLighting" => "0",
                    "showShadow" => "0",
                    "enableSmartLabels" => "1",
                    "startingAngle" => "0",
                    "showPercentValues" => "0",
                    "showPercentInTooltip" => "1",
                    "decimals" => "0",
                    "captionFontSize" => "14",
                    "subcaptionFontSize" => "14",
                    "subcaptionFontBold" => "0",
                    "toolTipColor" => "#ffffff",
                    "toolTipBorderThickness" => "0",
                    "toolTipBgColor" => "#000000",
                    "toolTipBgAlpha" => "80",
                    "toolTipBorderRadius" => "0",
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
              	"label" => $row["grade"],
              	"value" => $row["count"]
              	)
           	);
        	}

        	/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        	$jsonEncodedData = json_encode($arrData);

	/*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

        	   $pieChart = new FusionCharts("pie2D", "pie" , 900, 600, "chart-1", "json", $jsonEncodedData);
// Render pie chart
 $pieChart->render();
 
			 
			$pareto2d = new FusionCharts("pareto2d", "col" , 900, 600, "chart-2", "json", $jsonEncodedData);

	 $pareto2d->render();
	 $scrollline2d = new FusionCharts("spline", "scr" , 900, 600, "chart-3", "json", $jsonEncodedData);

	 $scrollline2d->render();

        	// Close the database connection
        	$dbhandle->close();
			
     	}

  	?>

  </head>
  <body>
   <!-- topbar starts --><!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
      


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
                <h2 align="justify"><i class="glyphicon glyphicon-stats"></i> Class Performance Analysis in visuals</h2>
        </div>
            
            <div class="box-content row" align="center">
 
            
                   
                               
		</h2>
		 
                                 
             <p>  
                     
                 
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

  <!-- Ad, you can remove it -->
