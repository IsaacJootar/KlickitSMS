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
$result=mysql_query("SELECT * FROM `staff` WHERE id= '{$id}' ");
if(!$result){echo "error". mysql_error();}
$dp=mysql_fetch_array($result);
$dp=$dp['fullname']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Klickit School Management Software</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Klickit School management software">
    <meta name="Klickit systems" content="School management softwares abuja.">


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
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                
            </button>
            <a class="navbar-brand" href="index.html"> 
                <span>Klickit sms</span></a>

           

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
               
                
            </div>
            <!-- theme selector ends -->

            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="#"> <?php include('includes/term_info.php');?></a></li>    
            </ul>

        </div>
    </div>
    
    
   
  
        <!-- left menu starts -->
                            
              
                   <div class="box-icon"> 
                                 <a style="float:right" target="_blank" href="s_result_print_out.php?term_id=<?php echo $term_id;?>&sess_id=<?php  echo $sess_id?>">[Print Preview]</a>
                 </div>
                
                 <div class="box-content">
               
                  <table>
                     <thead>
                       <tr bgcolor="#CCCCCC" align="center">
                        
                         <th align="center" width="321"><div align="center">Student's Full Name</div></th>
                         
                          <th align="center" width="157"><div align="center">Test 1 (10%)</div></th>
							 
                          <th align="center" width="157"><div align="center">Test 2 (10%)</div></th>
							 
                          <th align="center" width="200"><div align="center">Project (10%)</div></th>
                          <th align="center" width="200"><div align="center">Sub total (30%)</div></th>
                          <th align="center" width="157"><div align="center">Exam (70%)</div></th>
                          <th align="center" width="200"><div align="center">Term total (70%)</div></th>
							 
							
							
                       </tr>
                     </thead>
                     <tbody>
                       <?php
     $sql=mysql_query("SELECT  * FROM `score_entry` WHERE `subject_name`='{$subcat}' AND `class_name`='{$cat}' AND `staff_id`='{$id}'  AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'");
	  while($values=mysql_fetch_array($sql)){
			 ?>
	  <?php $st=mysql_fetch_array(mysql_query("SELECT `id`, `student_id`, `fullname` FROM `student_class` WHERE `student_id` = '{$values['student_id']}' AND `account_status` = 1 "))?>
                      <td class="center"><?php echo  $st['fullname']; ?></td>
                                      
                                      
                          
                                      
									
                                    <td><?php echo $values['CA1']?>
                                  <td>  <?php echo $values['CA2'];?></td>
                                   <td> <?php echo $values['CA3'];?></td>
                                     
                                      <td>  <?php echo $values['CA_total'];?></td>
                                   <td> <?php echo $values['exam'];?></td>
                                    <td>  <?php echo $values['term_total'];?></td>
                                   
                                     
                                     
                             
									</label>
                              </td>
                              </tr>
                             
							
									<?php } // end whileloop ?>
                       </tbody>
                     
                   </table>
                  
                   </form>
                   
                 </div>
               </div>
           </div>
             </p>
                      
                 <p>&nbsp;                        </p>
                     
              </div>
           
              </div>
  
                    
               

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