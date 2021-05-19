<?php include('includes/header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('includes/config.php'); ?>

            
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
                        
                
               <a href="manage_sms.php">back</a>
             <div class="box col-md-5">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Select dossier type to set</h2>

                    
                </div>
                <div class="box-content">
                  <form method="post" name="class" action="" >
                         
                            <p align="left">
                         
<select name='dossier_name'  data-rel='chosen' required>
                      <option value=''>--------------</option>
                      <option value="default">default</option>
                      <option value="basic">basic </option>
                      <option value="standard">standard </option>
                    </select>
                            <input type="submit" name="submit" value="display dossier">
                    
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                         
                         
              
                    </form>
                    <form id="form1" name="form1" method="post" action="">
  <table width="230" border="0" align="center" class="Tborder">
    
      <td><div align="left"></div></td>
    </tr>
  </table>
</form>
                      
                </div>
            </div>
        </div>
         <?php      ?>
             <div class="box col-md-7">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="bulk sms">
                     <?php 
                     $dossier_name=mysql_query("SELECT `dossier_name`
                     FROM `dossier_assessment_usage` WHERE  `session_id`= '$sess_id' AND `term_id`= $term_id");
                     $dossier_name=mysql_fetch_array($dossier_name);
                     
                     ?>
                   <h2>Dossier Type Associated with the current term [<i style="color:#000">  <?php echo  $dossier_name['dossier_name'];?> </i>]               </h2>
                   <div class="box-icon"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                <?php 
                $_SESSION['dossier_name']=$_POST['dossier_name'];?>                           
                <form method="post" action="set_dossier_exe.php">
                 
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                      
                       <tr bgcolor="CCCCCC">
                         <th>Dossier Name</th>
                         <th>Dossier View</th>
                       
                             
                   
                         
                       </tr>
                     </thead>
                     <tbody>
                      <td class="center"><?php echo $_SESSION['dossier_name'];  ?></td>
                          
                         
                           
               <td class="center">  
                   
                          <img src="images/boy-writing.jpg" width="174" height="314"></td> 
						 
                      
                       </label>
            
     
                     </tr>
                    
                       </tbody>
                     
                   </table>
                   <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Update Now</button>
                    </p>
                 
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