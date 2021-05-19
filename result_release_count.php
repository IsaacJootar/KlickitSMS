<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/s_monitor_scores.php'); ?>


       
            
            <div class="box-content row">
                
                 
               <div class="control-group">
                   
 <div align="center">
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
                     
              <div class="alert alert-info" align="center">
               <h4>View number of results released (Charts & Data)</h4></div>
                <a href="results_stat.php" style="float:left" title="Go back to  manage results"  data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                 
                              <a class="btn btn-default" title="click here to refreash page " data-toggle="tooltip" href="result_release_count.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Refresh page</a></br>
              <form class="form-horizontal" name="cat_form" action="" method="post">
                    <fieldset>
                
                 
                       
                  
                      <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='result_release_count.php?cat=' + val ;
}

</script>
<b>Select a session and corresponding term </b>
<p><p>
<?Php

@$cat=$_GET['cat']; //
///////// Getting the data from Mysql table for first list box//////////
 $quer2="SELECT id, session FROM `session_manager` WHERE `status`='Current Session' order by id"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
if(isset($cat)){
$quer="SELECT * FROM `term` where sess_id=$cat order by `sess_id`"; 
}else{$quer="SELECT DISTINCT id, term_code, term_def FROM term order by id"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////
?>
<strong>
                            <td>Session</td>
                    </strong>
<?php

echo "<select name='cat'  data-rel='chosen'  required='required' onchange=\"reload(this.form)\"><option value=''>Select A Session... </option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['id']==@$cat){echo "<option selected value='$noticia2[id]'>$noticia2[session]</option>"."<BR>";}
else{echo  "<option value='$noticia2[id]'>$noticia2[session]</option>";}
}
echo "</select>";
?>
<strong>
                            <td>Term</td>
                    </strong>
<?php
	
echo "<select name='subcat'  data-rel='chosen'  required='required'><option value=''>Select  a term </option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[term_code]</option>";
}
echo "</select>";
                    
      ?>                 
                       
                  <button style="float:!important" type="submit" name="submit" class="btn btn-primary btn-sm">View data</button>
                            <p>&nbsp;</p>
                    
               
                </fieldset>
            </form>
                                 
        <?php 


if(!isset($_POST['submit'])){
				
		$_SESSION['sess']=$sess_id;
		$_SESSION['term']=$term_id;
	   
	
	}?>
        <?php
    if (isset($_POST['submit'])){
					
		$_SESSION['sess']=$_POST['cat'];
		$_SESSION['term']=$_POST['subcat'];
	   
						   }
?>                        
             <div class="box col-md-12">
<div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Rlease Results with charts and data </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
<div class="box-content">
  <table  class="table table-striped" >
                   

  
  <tr class="transcriptheader hdsmall">
   <td>SESSION:</td>
    <td><?php echo $st=monitorScores::find_current_session($_SESSION['sess']);  ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>TERM:</td>
  <td><?php echo $term=monitorScores::find_current_term($_SESSION['sess'],  $_SESSION['term']);  ?></td>
   
  </tr>
 
  
</table>
                 <table  border="1"  class="Tborder"; style="line-height:1;">
                    <tr class="transcriptheader hdsmall" bgcolor="#CCCCCC" valign="top"; style="vertical-align:top" align="center">
    <td><div align="center"><strong>SN</strong></div></td>
    <td width="400"><div align="center"><strong>Class Name</strong></div></td>
    <td width="400"><div align="center"><strong>Number of results released</strong></div></td>
  
  </tr>
   <?php  
 
   $no=1;
   $sql=mysql_query("SELECT count(DISTINCT student_id) AS number_of_results, class_name FROM score_entry WHERE `status`=1 AND `session_id`= '{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}' GROUP BY class_name ORDER BY class_name ");
	while ($data=mysql_fetch_array($sql)){ ?>
	<tr bgcolor="#FFFFFF">
 <td><div align="center"><?php echo $no;?></div> </td>
    <td><div align="center"><?php echo $data['class_name'] . '</br>';$no++; ?></div></td>
    <td><div align="center"><?php echo $data['number_of_results'];?></div></td>
  
   </td>
  </tr>
	<?php } // while loop ?>
    
     
       <?php 

// get number of results released//
        $query=mysql_query("SELECT DISTINCT `student_id`,  `status` FROM `score_entry` 
         WHERE `status`=1 AND `session_id`= '{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}'");
        $count=mysql_num_rows($query);
        ?>
        
</table><br/>
      <td class="center"><strong><strong>
      </strong>
        <div align="right"><strong>Total number of results released for this term: <?php echo $count ?></strond>
      </strong>        </div></td>
           
  <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
  
  <?php

/* Include the `fusioncharts.php` file that contains functions	to embed the charts. */
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
  <body>
  <?php 
	
     	$strQuery = "SELECT count(DISTINCT student_id) AS number_of_results, class_name FROM score_entry WHERE `status`=1 AND `session_id`= '{$_SESSION['sess']}' AND `term_id`='{$_SESSION['term']}' GROUP BY class_name ORDER BY class_name";

     	// Execute the query, or else return the error message.
     	$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

     	// If the query returns a valid response, prepare the JSON string
     	if ($result) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData = array(
        	    "chart" => array(
                  "caption" => "Results Release  Analysis Chart",
                  
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
                    "useDataPlotColorForLabels" => "0"
              	)
           	);

        	$arrData["data"] = array();

	// Push the data into the array
        	while($row = mysqli_fetch_array($result)) {
           	array_push($arrData["data"], array(
              	"label" => $row["class_name"],
              	"value" => $row["number_of_results"]
              	)
           	);
        	}

        	/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        	$jsonEncodedData = json_encode($arrData);

	/*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

        	   $pieChart = new FusionCharts("pie2D", "pie" , 700, 400, "chart-1", "json", $jsonEncodedData);
// Render pie chart
 $pieChart->render();
 
			 
			$pareto2d = new FusionCharts("pareto2d", "col" , 700, 400, "chart-2", "json", $jsonEncodedData);

	 $pareto2d->render();
	 $scrollline2d = new FusionCharts("spline", "scr" , 700, 400, "chart-3", "json", $jsonEncodedData);

	 $scrollline2d->render();

        	// Close the database connection
        	$dbhandle->close();
			
     	}
  	?>
  <body>
  <!-- topbar starts -->
    
</div>
    
    
   
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
      

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
           
<div class=" row"></div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
                <h2 align="justify"><img src="images/fa.png" width="18" height="18"> Results release records in visuals</h2>
        </div>
            
            <div class="box-content row" align="center">
           <a href="100bfstudent_gpanel.php" title="Click here to go back " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron"></i> Back</a>
            
                    <a href="result_release_count.php" title="Click here to reveal charts " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron"></i> Blank page? Refresh to reveal charts</a>
                               
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


