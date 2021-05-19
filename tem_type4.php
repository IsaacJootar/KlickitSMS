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
 $class_name=$_SESSION['subcat'];
 $section_id=$_SESSION['section'];


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


       
          
            
       
        ?>
                  <table align="center" width="905">
                   
<tr>
 <td width="141" rowspan="0" ><img src="images/jet.jpg" alt="" width="125" height="119" align="left"/></td>
     
      <th colspan="5" style="color:#600"><h2 align="center" style="color:#600"><?php echo $school_address=schoolInformation::find_school_name();

?></h2>
        <p align="left">
        <h5 align="center" style="color:#600">Address: <?php echo $school_address=schoolInformation::find_school_address();

?>
        </p>
        </h5></p>
 <div align="center"><a href="javascript:window.print()">[Assessment  Template]</a></div>
 <hr>
 <div align="center">Assessment Template   Generated for  <?php echo  $class_name; ?></div></br>
 <div align="center">Subject Name-----------------------------</div></br>

</table>
<p>
  
           <table width="900" border="1" align="center">
                          <tr bgcolor="#CCCCCC">
                          <td width="20"><div align="center"><strong>NO.</strong> </div></td>
                            <td width="200"><div align="center"><strong>STUDENTS</strong> </div></td>
                            
                            <?php
$ca_num=mysql_fetch_array(mysql_query("SELECT * FROM `assessment` WHERE `section_id`='{$section_id}'"));
                             ?>
                             <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><font size="-2"><?php echo $ca_num['CA1'];?><br> <?php echo $ca_num['score1'] . ' ' .'marks';?> </font></span>
                            </div> </th> 
                             
                           
                            
                            
                             <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><font size="-2"><?php echo $ca_num['CA2'];?><br> <?php echo $ca_num['score2'] . ' ' .'marks';?> </font></span>
                            </div> </th> 
                              <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><font size="-2"><?php echo $ca_num['CA3'];?><br> <?php echo $ca_num['score3'] . ' ' .'marks';?> </font></span>
                            </div> </th> 
                             <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><font size="-2"><?php echo $ca_num['CA4'];?><br> <?php echo $ca_num['score4'] . ' ' .'marks';?> </font></span>
                            </div> </th> 
                            
                            <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><font size="-2">  Exams</font></span></div>
                            </div> </th>
                            
                          </tr>
                          
                          <?php
    
    ?>
                         <?php
                          $no=1;

          
      $sql2=mysql_query("SELECT * FROM `student_class` WHERE `class_name`='{$class_name}' AND `account_status` = 1 order by trim(fullname)");
    while($stu=mysql_fetch_array($sql2)){ ?>

                          <tr>
                          <td> <?php echo $no++;?><td><div align="left"> <font size="-2"><strong>
                            <?php  echo $stu['fullname'];?></strong></font>
                            </div></td>
                          

         
                
                
                             <td style="font-size:2px"><div align="center"><font size="-2"></font></div>
                
                
                </td>
                <td style="font-size:2px"><div align="center"><font size="-2"></font></div>
                
                
                </td>
                       
                        <td style="font-size:2px"><div align="center"><font size="-2"></font></div>
                
                
                </td>
                       
           
                   <td style="font-size:2px"><div align="center"><font size="-2">
           
             
           
           
           
           
           
          </font></div>
                
                </td>
                 
                 <td style="font-size:2px"><div align="center"><font size="-2">
           
             
           
           
           
           
           
          </font></div>
                
                </td>
             
                          </tr>
                        
                        
                     
                          <?php }?>
                          
                        
                        </table>
                        
<p><br><p>
                     
           
                                                                                                                                          

            
 
<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div>
<!--/row-->
    <!-- content ends --><!--/#content.col-md-0--><!--/fluid-row-->

    <!-- Ad, you can remove it -->