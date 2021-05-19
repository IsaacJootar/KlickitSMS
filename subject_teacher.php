<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/class_manager.php'); ?>

            
          <div class="control-group">
                  
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
               <h4>Manage Your Classes</h4>
            </div>                 
            <p align="center">  <a href="ca.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Input scores for all CA's </a>
                                 
                          <a href="exam.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Input scores for exams</a>
                                 
                                 <a href="class_section.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Make subject comments</a>
                                 
                 <a href="delete_section.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Update students scores</a>   
                                    
    <div class="box col-md-9">
        <div class="box-inner">
            
            
                <!--/row -->

                <div class="row"></div>
                <div class="row"></div>

            </div>
        </div>
    </div>
    <!--/span-->

    <div class="box col-md-3">
        <div class="box-inner">
            <div class="box-header well">
                <h2>My Classes</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
              <table class="table table-striped">
                     <tbody>
                       <?php
					  if(!isset($_GET['id'])){$_GET['id']= "";};
       $classes = classManager::find_by_sql("SELECT * FROM `staff_class` WHERE `staff_id` = '{$id}' order by `id` desc");
foreach($classes  as $class ) {?>
                <td>
                        <a href="#" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> <?php echo $class->class_name ;  ?></a>
       
                  </td>
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
            </div>
        </div>
    </div>
    <!--/span-->
    <!--/span-->
    <!--/span-->


</div><!--/row-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <?php include('includes/footer.php'); ?>