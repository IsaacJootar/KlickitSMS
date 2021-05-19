
<?php include('includes/header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php  require_once('includes/config.php'); ?>
<?php  require_once('classes/student_manager.php'); ?>

            
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
                        
                
               
             <div class="box col-md-5">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Click to reveal staff login details</h2>

                    
                </div>
                <div class="box-content">
                  <form method="post" action="recover_staff.php" >
                         
                            <p align="left">
                      </p>
                           
                      <p align="left">&nbsp;</p>
                      <p align="left"><span class="center col-md-2">
                        <input type="submit" name="submit" value="View plain password">
                      </span></p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                         
                         
              
                    </form>
                      
                </div>
            </div>
        </div>
         <?php       if(!isset($_POST['submit'])){ exit();}
			 if(isset($_POST['submit'])){
			  } ?>
             <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2> Staff login details                   </h2>
                   <div class="box-icon"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                           
                <form method="post" action="release_exe.php">
                 
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                      
                       <tr bgcolor="CCCCCC">
                         
                         <th>Staff Full Name</th>
                          <th>username</th>
                               <th>passwsord</th>
                   
                         
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					 
       $names = mysql_query("SELECT fullname, username, password FROM `staff` ");
while($students=mysql_fetch_array($names)) { ?>
                       
       
                    
                       
                 
               
                          <td class="center"><?php echo $students['fullname'];  ?></td>
                          
                          <td class="center"><?php echo $students['username'];  ?></td>
                 <td class="center"><?php echo $students['password'];  ?></td>       
                         
                         </td> 
						 
                      
                       </label>
            </div>
     
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                   
                   </form>
                 </div>
               </div>
             </div>
             </p>
                      
                 <p>&nbsp; 
                 
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