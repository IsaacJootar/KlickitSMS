<?php ob_start();?>
<?php session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING &  ~E_STRICT & ~E_DEPRECATED);

    $role=$_SESSION['SESS_USER_ROLE'];
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
         <h5 align="center" style="font-weight:bold" style="color:#000">Cummulative BroadSheet Generated for <?php echo $_SESSION['class_name']; ?> </h5>
             <h5 align="center" style="font-weight:bold"  style="color:#000"> <?php          echo  $term .  ',' . ' ' .  $session . ' ' . ' Academic Session' ?> </h5>
             <h5 align="center" style="font-weight:bold"  style="color:#000"> <?php          echo  $term .  ',' . ' ' .  $session . ' ' . ' Academic Session' ?> </h5>

 <h5 align="center"><a href="javascript:window.print()">[BroadSheet Print Out]</a></h5>
                    
                      <tr bgcolor="#CCCCCC">
                            <td width="200"><div align="center"><strong>STUDENTS</strong></td>
                            
                            <?php
                           
     $sql=mysql_query("SELECT distinct `class_name`, `subject_name` FROM `subject_class`
    WHERE `class_name`='{$_SESSION['class_name']}'");
    while($sub=mysql_fetch_array($sql)){ ?> 
                            <th class="rotate" style="font-weight:1"><div>
                              <div align="left"><span><font size="-1"> <?php echo $sub['subject_name'];?></font></span></div>
                            </div> </th> 
                             
                           
                            <?php } ?>
                            
                             <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><font size="-1">Total</font></span>
                            </div> </th> 
                             <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><font size="-1">Average</font></span></div>
                            </div> </th> 
                             <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><font size="-1">  Position</font></span></div>
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
          
      $sql2=mysql_query("SELECT distinct `score_entry`. `student_id`,  `score_entry`. `account_status`, `students`. `fullname` FROM `score_entry` JOIN `students` ON `score_entry`. `student_id`=`students`. `id` WHERE `class_name`= '{$_SESSION['class_name']}'
      AND `session_id`='{$_SESSION['sess']}' 
       AND `score_entry`. `account_status`=1 ORDER BY trim(fullname) ASC");
    while($stu=mysql_fetch_array($sql2)){ ?>
                          <tr><td><div align="left"> <font size="-1">
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
            $sql4=mysql_query("SELECT SUM(`term_total`) as `term_total` FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_SESSION['class_name']}' AND `subject_name` = '{$sub}' AND `session_id`='{$_SESSION['sess']}'");
             $scores=mysql_fetch_array($sql4);
              $num_terms=mysql_num_rows(mysql_query("SELECT distinct `term_id` FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}'"));

    ?>
                            <td style="font-size:2px"><div align="center"><font size="-2"><?php

                            if ($num_terms< 0) {echo ' ';} 
                            $term_total=$scores['term_total']/ $num_terms;
                if ($term_total <= 0){
                  echo "";
                }

                else {echo $term_total=number_format((float)$scores['term_total']/$num_terms, 2, '.', '');} 
        
        
        ?></font></div>
                
                
                </td>
                
                
               
                            
                            <?php  }?>
                            
                                                        <?php 
                            
                            //query table for Total score 
                            
                        
            $sql7=mysql_query("SELECT SUM(term_total) AS total FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}'");
             $total=mysql_fetch_array($sql7);?>   
                            
                            
      
                            
                             <td style="font-size:2px"><div align="center"><font size="-2"><?php echo number_format((float)$total['total'], 2, '.', '');
        
        
        ?></font></div>
                
                
                </td>
                <?php
                //query table for  average//
               
        $query1=mysql_fetch_array(mysql_query("SELECT SUM(term_total) AS total FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}'"));
      $query2=mysql_num_rows(mysql_query("SELECT `subject_name` FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}'"));
    ?>
                
                             <td style="font-size:2px"><div align="center"><font size="-2"><?php if ($query2 < 0) {echo ' ';} 
                if ($query2 > 0){
                    
                     $obtainabl_score=$query2*100;
        $av=$query1['total']/$obtainabl_score;
       $av=$av*100;
    echo $av=number_format((float)$av, 2, '.', '');}    
  

        
        
        ?></font></div>
                
                
                </td>
                       
           <?php       
                $query3=mysql_query("SELECT distinct `class_name` FROM `score_entry_average_cumm` WHERE `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' ");

 if($values=mysql_num_rows($query3) > 0){  
        
        // check if new students are available to be inserted first in the average table, bfor update can be carried out//
$query4="SELECT  * FROM `score_entry_average_cumm` WHERE `student_id`='{$student_id}' AND `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}'";
     $query4=mysql_query($query4);
      if(mysql_num_rows($query4) < 1){
      $query4="INSERT INTO `score_entry_average_cumm` 
        (`student_id`, `class_name`,`session_id`, `average`) 
    VALUES ('{$student_id}', '{$_SESSION['class_name']}', '{$_SESSION['sess']}', '{$av}')" ;
                        $result=mysql_query($query4);  
      }
                        
      $query5="UPDATE `score_entry_average_cumm` 
        SET
         `student_id` = '$student_id',
         `class_name`= '{$_SESSION['class_name']}',
          `session_id` = '{$_SESSION['sess']}', 
          `average`='{$av}'
  WHERE `student_id`='{$student_id}' AND `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}'
           "; 
           $result=mysql_query($query5);
        
      }
 
 // if students are not already given average then we insert.//
           if($values=mysql_num_rows($query3) < 1){ 
    
      
    $query6="INSERT INTO `score_entry_average_cumm` 
        (`student_id`, `class_name`,`session_id`, `average`) 
    VALUES ('{$student_id}', '{$_SESSION['class_name']}', '{$_SESSION['sess']}',  '{$av}') ";
      $result=mysql_query($query6); 
            }
          
          
       
       
  
             ?>

                   <td style="font-size:2px"><div align="center"><font size="-2"><?php  
       
$query7="SELECT t1.student_id, (SELECT COUNT(*) FROM score_entry_average_cumm t2 WHERE t2.average > t1.average AND  `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}') +1 AS rank FROM score_entry_average_cumm t1 WHERE  `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}' 

";
     $query7=mysql_query($query7);
     while ($pos=mysql_fetch_array($query7)){
      $user_id=$pos['student_id'];
        $pos=$pos['rank'];
    $query8="UPDATE `score_entry_average_cumm` 
        SET
          `pos`='{$pos}'
          WHERE `student_id`='{$user_id}' AND `class_name`='{$_SESSION['class_name']}' 
          AND `session_id`='{$_SESSION['sess']}'
           "; 
           $result=mysql_query($query8);
     }
       ?>
           
           
           
           
           
           <?php

$query9=mysql_fetch_array(mysql_query("SELECT `pos` FROM  `score_entry_average_cumm` WHERE `student_id`='{$student_id}' AND  `class_name`='{$_SESSION['class_name']}' AND `session_id`='{$_SESSION['sess']}'")); 
echo $query9['pos'];  
  

        
        
        ?></font></div>
                
                </td>
             
                          </tr>
                        
                        
                     
                          <?php }?>
                          
                        
                        </table>
                        