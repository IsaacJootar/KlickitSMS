<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/student_class_manager.php'); ?>


            
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
                        <p align="center">  <a href="f_create_student.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-pencil"></i> Create student account</a>
                                 
                                
                                
                                  <a href="f_subject_to_student.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-search"></i>  Assign subjects to Students</a>
                                 
                                 
                 <a href="f_remove_subject_from_student.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-remove"></i> Remove subjects from students</a>
 <a  href="f_print_student_list.php"  target="_blank" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-print"></i>  Generate students List</a>
                                                    
                        <p align="center"></br>
                        
                 <div class="box-inner">
                   <div class="box col-md-12">
                     <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2 align="center">My Class List: <?php echo $myclass; ?></h2>
                   <div class="box-icon"> </div>
                 </div>
                 <div class="box-content">
                              
			 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Student's Full Name</th>
                         <th>Gender</th>
                        
                          
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					        
$classes = studentclassManager::find_by_sql("SELECT * FROM `student_class` WHERE `class_name`='{$myclass}'");
						
							
							
foreach($classes  as $class ) {  

// end if?>
                       
         <td class="center"><?php echo  $class->fullname ; ?></td>
                   
                       <td class="center"><?php echo  $class->gender;  ?></td>
                        
                            
                     </tr>
                     <?php }?>
                       </tbody>
                   </table>
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