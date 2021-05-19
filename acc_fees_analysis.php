       <?php include('includes/acc_header.php'); ?>
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
        $strQuery = "SELECT class_name, sum(have_paid) as amount FROM `acc_school_fees_payments` WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}' group by `class_name`  ";

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

             $pieChart = new FusionCharts("pie2D", "pie" , 350, 400, "chart-1", "json", $jsonEncodedData);
// Render pie chart
 $pieChart->render();
       
      $pareto2d = new FusionCharts("pareto2d", "col" , 350, 400, "chart-2", "json", $jsonEncodedData);

   $pareto2d->render();
   $scrollline2d = new FusionCharts("spline", "scr" , 350, 400, "chart-3", "json", $jsonEncodedData);

   $scrollline2d->render();

          // Close the database connection
          $dbhandle->close();
      
      }

    ?>
    

  </head>
  <body>

            
            <div class="box-content row">
            <p class="center col-md-1" align="right">
                    <a href="acc_fees_analysis.php" title="Click here to reveal charts " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron"></i> Blank page? Refresh to reveal charts</a> 
                 
                     
                                             <?php
                $sql =$database->query("SELECT SUM(have_paid) as amount FROM `acc_school_fees_payments` WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}'");
    $sql=$database->fetch_array($sql);
    $count =$database->query("SELECT  `student_id` FROM `acc_school_fees_payments` WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}' group by `student_id` ");
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
 <h3 align=center style="color:#000">A total of  <?php echo  format_currency($sql['amount'])?> has been paid by <?php echo  $count ?> students</h3>;
       
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