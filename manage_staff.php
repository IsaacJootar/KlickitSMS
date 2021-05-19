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
               <h4>Manage Teachers</h4>
            </div>                 
                        <p align="center">  <a href="create_staff.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Create staff account</a>
                                 
                                
                                
                                  <a href="staff_to_class.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i>  Assign Teacher to class</a>
                                
                                
<a href="staff_subject_assign.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> View Assigned Subjects</a>
                                <a href="view_staff_classes.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> View Assigned Classes</a>


                                 <a href="view_subjects_teacher.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> View Subjects Teacher</a>
                                 
                 <a href="remove_staff_class.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Remove Teacher from class</a>

<a href="delete_staff.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Delete Staff</a>
                                <a  href="print_staff_list_all.php"  target="_blank" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-print"></i>  Generate Staff List</a>
                                
                                                      
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
                         
                         <th>Fullname</th>
                              <th>Gender</th>
                           <th>Date Of Birth</th>
                           <th>Country</th>
                           <th>Action</th>
                             <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
                       global $database;
					  if(!isset($_GET['id'])){$_GET['id']= "";};
       $classes = staffManager::find_by_sql("SELECT * FROM `staff` order by `id` desc");
foreach($classes  as $class ) 
{ ?>
                       
     <?php



      ?>    <td class="center"><?php echo  $class->fullname ;  ?>
      </td>
                      
                           
                           <td class="center"><?php echo  $class->gender ;  ?></td>
                        <td class="center"><?php echo   $class->date_of_birth ;  ?></td>
                              <td class="center"><?php echo   $class->country;  ?></td>
                           
                            <td class="center">	<?php echo "<a href=\"update_staff.php?id=".urlencode(($class->id))."\"> Update account</a>" ?> </td>
                            <td class="center">	<?php echo "<a href=\"#id=".urlencode(($class->id))."\"> Delete account</a>" ?> </td>
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