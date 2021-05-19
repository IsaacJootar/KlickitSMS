<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/section_manager.php'); ?>
<?php require_once('classes/grading_manager.php'); ?>
            
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
               <h4>Grading Formats</h4></div>
                 <p align="center">  <a href="create_grading.php" title="Click here to create a new grading format." data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> New Grade Format</a>
                                 
                
               
             <div class="box col-md-6">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Section View: Click on name to display format</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Section Name</th>
                            <th>Section Code</th>
                            <th>Section Range</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                         <?php
    $section = sectionManager::find_by_sql("SELECT id, code, rangee, sec_name FROM `section`");
foreach($section as $sec) { ?>
        
        <td class="center"> <a href="grading.php?<?php echo "id=".urlencode(($sec->id))."\">"?> <?php echo $sec->sec_name ;?></a> </td>
         <td class="center"><?php echo $sec->code ;  ?> </td>
             <td class="center"><?php echo $sec->rangee ;  ?> </td>  
        
        
    </tr>
    <?php }?>
                        </tbody>
                    </table>
                    <ul class="pagination pagination-centered">
                        <li><a href="#">Prev</a></li>
                        <li class="active">
                           
                        
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
             <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Grade Format Details</h2>
                   <div class="box-icon"> <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a> <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                   <table class="table table-striped">
                     <thead>
                       <tr>
                         <th>Grade</th>
                         <th>Start Range(%)</th>
                         <th>End Range(%)</th>
                           <th>Description</th>
                           <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
            if(!isset($_GET['id'])){$_GET['id']= "";};
       $gradingg = gradingManager::find_by_sql("SELECT * FROM `grading` WHERE `section_id` = '{$_GET['id']}' order by `id` desc");
foreach($gradingg  as $grading ) { ?>
                       
         <td class="center"><?php echo  $grading->grade ;  ?></td>
                       <td class="center"><?php echo  $grading->starts ;  ?></td>
                        <td class="center"><?php echo  $grading->ends ;  ?></td>
                            <td class="center"><?php echo  $grading->descp ;  ?></td>
                            <td class="center"> <?php echo "<a href=\"delete_grading_exe.php?id=".urlencode(($grading->id))."\"> Delete</a>" ?> </td>
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                   <ul class="pagination pagination-centered">
                     <li><a href="#">Prev</a></li>
                    
                     <li><a href="#">Next</a></li>
                   </ul>
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