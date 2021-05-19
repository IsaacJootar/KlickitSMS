<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/accountschoolFees.php'); ?>
<?php require_once('classes/result_manager.php'); ?>


       
            
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
              <h4>GENERATE CLASS PERFORMANCE ANALYSIS (CPA)</h4></div>
                <a href="broadsheet.php" style="float:left" title="Go back to previous page"  data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                 
                            <button style="float:right" title="refresh  cache to display the correct data "  data-toggle="tooltip" onclick="myFunction()">Reload cached data</button>

<script>
function myFunction() {
    location.reload();
}
</script>

</br>
              <form class="form-horizontal" name="cat_form" action="" method="post">
                    <fieldset>
                
                 
                       
                  
                    <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='cpa.php?cat=' + val ;
}

</script>
<b><h5>Select a session and the corresponding term and class to generate CPA</h5></b><p><p>
<?Php

@$cat=$_GET['cat']; //
///////// Getting the data from Mysql table for first list box//////////
 $quer2="SELECT id, session FROM `session_manager` order by id"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
if(isset($cat)){
$quer="SELECT * FROM `term` where sess_id=$cat order by `sess_id`"; 
}else{$quer="SELECT DISTINCT id, term_code, term_def FROM term order by id"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////
?>
                  <td><strong>Session</strong>
<?php

echo "<select name='cat'  data-rel='chosen'  required='required' onchange=\"reload(this.form)\"><option value=''>Select A Session... </option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['id']==@$cat){echo "<option selected value='$noticia2[id]'>$noticia2[session]</option>"."<BR>";}
else{echo  "<option value='$noticia2[id]'>$noticia2[session]</option>";}
}
echo "</select>";
?>
    <strong>Term</strong>
<?php
	
echo "<select name='subcat'  data-rel='chosen'  required='required'><option value=''>Select  a term </option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[term_def]</option>";
}
echo "</select>";
                    
      ?>   
           <strong>Class</strong>
                             <?php
                        $quer="SELECT class_name FROM `classes`"; 
echo "<select name='class_name'  data-rel='chosen' required  ><option value=''>Select a class.......</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[class_name]'>$noticia[class_name]</option>";
}
echo "</select>";
                       
		?>    
                             
                       
                  <button style="float:!important" type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
                            
                    
                 
                    
                    
                       
                    
                    
                </fieldset>
            </form>
              <?php 


if(!isset($_POST['submit'])){}?>
        <?php
    if (isset($_POST['submit'])){
					
		$_SESSION['class_name']=$_POST['class_name'];
	    $_SESSION['sess']=$_POST['cat'];
		$_SESSION['term']=$_POST['subcat'];
		
					 ?>                       
             <div class="box col-md-81">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                  <a  class='btn btn-primary btn-sm'  style="float:right" target="_blank" href="cpa_print_out.php?term=<?php echo $_SESSION['term'];?>&sess=<?php  echo   $_SESSION['sess'];?>&class_name=<?php  echo $_SESSION['class_name'];?>"><i class='glyphicon glyphicon-print' ></i> Print with visuals</a>

                   <h2>CPA Generated for  <?php echo $_SESSION['class_name']; ?>          </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>  </div>
                 </div>
                 <div class="box-content">
                    <table width="300" border="1" align="center">
                          <tr bgcolor="#CCCCCC">
                            <td width="200"><div align="center"><strong>STUDENTS</strong> </div></td>
                            
                            <?php
     $sql=mysql_query("SELECT distinct `class_name`, `subject_name` FROM `subject_class`
	  WHERE `class_name`='{$_POST['class_name']}'");
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
					
			$sql2=mysql_query("SELECT distinct `score_entry`. `student_id`, `score_entry`. `account_status`, `students`. `fullname` FROM `score_entry` JOIN `students` ON `score_entry`. `student_id`=`students`. `id` WHERE `class_name`= '{$_POST['class_name']}'
       AND `session_id`='{$_POST['cat']}' 
       AND `term_id`='{$_POST['subcat']}'
        AND `score_entry`. `account_status`=1 ORDER BY trim(fullname) ASC");

	  while($stu=mysql_fetch_array($sql2)){ ?>
                          <tr><td><div align="left"> <font size="-2">
                            <?php  echo $stu['fullname'];?></font>
                            </div></td>
                            <?php 	
					$student_id= $stu['student_id'];
					$sql3=mysql_query("SELECT `subject_name` FROM `subject_class` WHERE  `class_name`='{$_POST['class_name']}' ");
	  		while($sub=mysql_fetch_array($sql3)){
				
				$sub=$sub['subject_name'];
				
				 ?>
                            
                            <?php 
            $sql4=mysql_query("SELECT * FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_POST['class_name']}' AND `subject_name` = '{$sub}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'");
	  		     $scores=mysql_fetch_array($sql4);
		?>
                            <td style="font-size:2px"><div align="center"><font size="-2"><?php echo   $scores['term_total']; 
				
				
				?></font></div>
                
                
                </td>
                
                
               
                            
                            <?php  }?>
                            
                                                        <?php 
													
                //query table for  num of subjects//
               
				$query1=mysql_fetch_array(mysql_query("SELECT SUM(term_total) AS total FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'"));
			$query2=mysql_num_rows(mysql_query("SELECT distinct `subject_name` FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'"));
														
														//query table for Total score 
														
											  
            $sql7=mysql_query("SELECT SUM(term_total) AS total FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'");
	  		     $total=mysql_fetch_array($sql7);?> 	
														
													  
                             <td style="font-size:2px"><div align="center"><font size="-2"><?php echo  $query2;
				
				
				?></font></div>
                
                
                </td>	
      
                            
                             <td style="font-size:2px"><div align="center"><font size="-2"><?php echo  $total['total']; 
				
				
				?></font></div>
                
                
                </td>
                <?php
                //query table for  average//
               
				$query1=mysql_fetch_array(mysql_query("SELECT SUM(term_total) AS total FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'"));
			$query2=mysql_num_rows(mysql_query("SELECT distinct `subject_name` FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'"));
		?>
                
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
                $query3=mysql_query("SELECT distinct `class_name`, `term_id`, `session_id` FROM `score_entry_average` WHERE `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'");

 if($values=mysql_num_rows($query3) > 0){  
				
				// check if new students are available to be inserted first in the average table, bfor update can be carried out//
$query4="SELECT  * FROM `score_entry_average` WHERE `student_id`='{$student_id}' AND `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'";
		 $query4=mysql_query($query4);
		  if(mysql_num_rows($query4) < 1){
			  
	

			$query4="INSERT INTO `score_entry_average` 
				(`student_id`, `class_name`,`session_id`, `term_id`, `average`, `grade`) 
		VALUES ('{$student_id}', '{$_POST['class_name']}', '{$_POST['cat']}', '{$_POST['subcat']}', '{$av}', '{$grade}')" ;
												$result=mysql_query($query4);  
		  }
												
			$query5="UPDATE `score_entry_average` 
				SET
				 `student_id` = '$student_id',
				 `class_name`= '{$_POST['class_name']}',
				  `term_id`= '{$_POST['subcat']}',
				  `session_id` = '{$_POST['cat']}', 
				  `grade`='{$grade}',
				  `average`='{$av}'
				  WHERE `student_id`='{$student_id}' AND `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'
				   "; 
				   $result=mysql_query($query5);
				
		  }
 
 // if students are not already given average then we insert.//
				   if($values=mysql_num_rows($query3) < 1){ 
		
			
		$query6="INSERT INTO `score_entry_average` 
				(`student_id`, `class_name`,`session_id`, `term_id`, `average`, `grade`) 
		VALUES ('{$student_id}', '{$_POST['class_name']}', '{$_POST['cat']}', '{$_POST['subcat']}', '{$av}', '{$grade}') ";
			$result=mysql_query($query6);	
		   			}
		   	
  
             ?>
             
             
              <td style="font-size:2px"><div align="center"><font size="-2"><?php  

$query7=mysql_fetch_array(mysql_query("

SELECT average FROM `score_entry_average` 
WHERE student_id ='$student_id' AND 
`session_id`='{$_POST['cat']}' AND 
`term_id`='{$_POST['subcat']}' AND 
`class_name`='{$_POST['class_name']}'"));	
 $av=$query7['average'];	 // I am feeling lazy. its actually average//
 
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
		   
$query7="SELECT t1.student_id, (SELECT COUNT(*) FROM score_entry_average t2 WHERE t2.average > t1.average AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}' AND `class_name`= '{$_POST['class_name']}') +1 AS rank FROM score_entry_average t1 WHERE `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}' AND `class_name`= '{$_POST['class_name']}'

";
		 $query7=mysql_query($query7);
		 while ($pos=mysql_fetch_array($query7)){
		  $user_id=$pos['student_id'];
		    $pos=$pos['rank'];
		$query8="UPDATE `score_entry_average` 
				SET
				  `pos`='{$pos}'
				  WHERE `student_id`='{$user_id}' AND `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'
				   "; 
				   $result=mysql_query($query8);
		 }
		   ?>
				   
				   
				   
				   
				   
				   <?php

$query9=mysql_fetch_array(mysql_query("SELECT `pos` FROM  `score_entry_average` WHERE `student_id`='{$student_id}' AND `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'"));	
echo $query9['pos'];	
	

				
				
				?></font></div>
                
                </td>
             
                          </tr>
                        
                        
                     
                          <?php }?>
                               
            
                        
                        </table>
                        
             
                 <?php

/* Include the `fusioncharts.php` file that contains functions	to embed the charts. */
include("fuse/php-wrapper/fusioncharts.php");
 require_once('classes/database.php'); 
 
require_once('includes/config2.php');
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
	
     	$strQuery = "SELECT count(DISTINCT student_id) AS count, grade FROM `score_entry_average` WHERE `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}' GROUP BY grade ORDER BY grade ";

     	// Execute the query, or else return the error message.
     	$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

     	// If the query returns a valid response, prepare the JSON string
     	if ($result) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData = array(
        	    "chart" => array(
                  "caption" => "Class Perfomanace Analysis ",
                  
               "paletteColors" => "#0075c2,#1aaf5d,#f2cc00,#f45b00,#00c502,#1a0f50,#8e00c40,#8e02c0",
                    "bgColor" => "#ffffff",
                    "showBorder" => "0",
                    "use3DLighting" => "0",
                    "showShadow" => "0",
                    "enableSmartLabels" => "1",
                    "startingAngle" => "0",
                    "showPercentValues" => "0",
                    "showPercentInTooltip" => "0",
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
	}
  	?>

  </head>
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
                <h2 align="justify"><i class="glyphicon glyphicon-stats"></i> Class Performance Analysis in visuals</h2>
        </div>
            
            <div class="box-content row" align="center">
           <a href="broadsheet.php" title="Click here to go back " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron"></i> Back</a>
            
                    <a href="cpa.php" title="Click here to reveal charts " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
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

  <!-- Ad, you can remove it -->
   
 <?php include('includes/footer.php'); ?>