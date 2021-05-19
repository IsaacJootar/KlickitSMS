<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/staff_manager.php'); ?>


            
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
               <h4>Manage Students</h4>
            </div>                 
                       
                                
                                  <a href="assign_form_master.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i>  Assign form master to a teacher</a>
                                 
                 <a href="remove_form_master.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Remove teacher as form master</a>
                                <a class="btn btn-default" href="notification.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Refresh page</a>                        
                        <p align="center"></br>
                        
                 <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>List Of Teachers                 </h2>
                   <div class="box-icon"> <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a> <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="#CCCCCC">
                         
                         <th align="center">Notification</th>
                         <th align="center">Form Master</th>
                           <th align="center">Notification was Send On</th>
                            
                           
                       </tr>
                     </thead>
                     <tbody>
                       <?php
       $sql=mysql_query("SELECT `system_roles`.`staff_id`, `notification`.`note`, `notification`.`created_on`, `form_master`.`class_name`, `form_master`.`staff_id` FROM `notification` JOIN `form_master` ON `notification`. `staff_id` = `form_master`.`staff_id`
");
while($values=mysql_fetch_array($sql)) { ?>
                       
         <td class="center"><?php echo  $values['note']; ?></td>
                       <td class="center"><?php echo   $values['class_name'];?></td>
                        <td class="center"><?php echo   $values['created_on'];  ?></td>
                                    

                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                              
                     
                  
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