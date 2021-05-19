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
               <h4>Manage Staff Roles</h4>
            </div>                 
                       
                                
                                  <a href="assign_form_master.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i>  Assign form master role</a>
                                 
                 <a href="remove_form_master.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Remove  form master role</a>
                                
                                  <a href="assign_account.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i>  Assign Account Officer </a>
                                 <a href="remove_account.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i>  Remove Account Officer role</a>
                                 
                                 <a href="assign_inventory_role.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i>  Assign inventory / store officer  role</a><p align="center"></br>

                             <a href="remove_inventory.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i>  Remove inventory / store officer role</a>
                               
                                 
                             
                                                     
                        <p align="center"></br>
                        
                 <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>List of other system roles                </h2>
                   <div class="box-icon"> <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a> <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr>
                         
                         <th>STAFF NAME</th>
                         <th>STAFF ID</th>
                             <th>ROLE</th>
                          
                       </tr>
                     </thead>
                     <tbody>
                       <?php
            
       $classes = $forms=$database->query("SELECT * FROM  `system_accounts`");
foreach($forms  as $form ) { 
$name=$database->query("SELECT * FROM  `staff` WHERE  `id` ='{$form['staff_id']}'");
$name=$database->fetch_array($name);
$name=$name['fullname'];
$user=$database->query("SELECT * FROM  `staff` WHERE  `id` ='{$form['staff_id']}'");
$user=$database->fetch_array($user);
$user=$user['username'];
?>
                       
         <td class="center"><?php echo $name; ?></td>
                <td class="center"><?php echo $user; ?></td>

                     
                        <td class="center"><?php echo  $form['role'];  ?></td>
                          
                            

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