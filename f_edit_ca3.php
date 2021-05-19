<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>


  <?php 
$_SESSION['cat']; // class
$_SESSION['subcat']; // subj

 $_SESSION['id']=$_GET['id'];
  $_SESSION['ca']=$_GET['ca'];
	?>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
           
<div class=" row"></div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
                <h2 align="justify"><i class="glyphicon glyphicon-check"></i> Klickit School Management Software.  Version 1.2.0</h2>
        </div>
            
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
               <h4>Edit Score For Student</h4></div>
                                  
                  <p align="center">  <a href="f_edit_ca.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Back </a>
                                 
                        
                  <td><h4>Class</strong>: <?php echo @$_SESSION['cat'];?></h4></td>
                    <td><h4>Subject:</strong> <?php echo @$_SESSION['subcat'];?></h4></td>
                  
                  <p align="center"><i style="color:#F00">Click on any active link to edit scores</i></br>
             <div class="box col-md-12">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                  <?php 	
	     $sql2=mysql_query("SELECT `fullname` FROM `student_class` WHERE `student_id`= '{$_GET['id']}'");
			$qry=mysql_fetch_array($sql2)
								    ?>   
	 
                   <h2>Editing <?php  echo $_SESSION['ca']?>  Score  For <?php echo  $qry['fullname']; ?>                 </h2>
                   <div class="box-icon"> <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a> <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <?php 
				 
	 $error_array=array();
	//initilize error flag//
	$error_flag=false;
				 ?>
                 <div class="box-content">
                 <form action="f_edit_ca_exe.php" method="post">
                  <table class="table">
                     <thead>
                       <tr bgcolor="#CCCCCC" align="center">
                        
                         <th width="310"><div align="left">Student's Full Name</div></th>
                         
                              <th width="550"><div align="left">Enter continous asessement scores (30%)</div></th>
							
							
							
                       </tr>
                     </thead>
                     <tbody>
                     
	  
                        <td class="center"><?php echo $qry['fullname']; ?></td>
                                      
                                     
							<td class="center">
                             
                                    
							  <label>
                                    
                                      
									<div align="left">
									 
									  
									 <t>
			 <input type="text"  pattern="[0-9]|10"  title="CA score cannot be more than 10 " name="ca" required placeholder="input new score" />  
							    </div>
							  </label>
                             
                          </td>
                              </tr>
                             
							
								
                       </tbody>
                     
                   </table>
                   <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Update Score</button>
                    </p>
                   </form>
                   
                 </div>
               </div>
           </div>
           
                      
               
                     
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