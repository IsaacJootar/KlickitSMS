<?php include('includes/dir_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/staff_manager.php'); ?>



            <!-- content starts -->
           
<div class=" row"></div>

<div class="row">
    <div class="box col-md-11">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
               <h2 align="justify"><img src="images/fa.png" width="18" height="18"> Klickit School Management Software.  [ Version 1.4.1 ]</h2>
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
               <h4>Monitor Teachers</h4>
            </div>                 
                        <p align="center">  
                                
                                 
<a href="dir_staff_subject_assign.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-search"></i> View Teacher's Assigned Subjects</a>
                                <a href="dir_staff_class_assign.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-search"></i> View Teacher's Assigned Classes</a>
                                 
                 
                                <a class="btn btn-default" href="dir_manage_staff.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Refresh page</a>                        
                        <p align="center"></br>
                        
                 <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>List Of Teachers                   </h2>
                   <div class="box-icon"> <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a> <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr>
                         
                         <th>First Name</th>
                         <th>Other Name</th>
                           <th>Last Name</th>
                              <th>Gender</th>
                           <th>Date Of Birth</th>
                           <th>Country</th>
                          
                           
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					  if(!isset($_GET['id'])){$_GET['id']= "";};
       $classes = staffManager::find_by_sql("SELECT * FROM `staff` order by `id` desc");
foreach($classes  as $class ) { ?>
                       
         <td class="center"><?php echo  $class->firstname ;  ?></td>
                       <td class="center"><?php echo  $class->othername ;  ?></td>
                        <td class="center"><?php echo   $class->lastname ;  ?></td>
                           
                           <td class="center"><?php echo  $class->gender ;  ?></td>
                        <td class="center"><?php echo   $class->date_of_birth ;  ?></td>
                              <td class="center"><?php echo   $class->country;  ?></td>
                           
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