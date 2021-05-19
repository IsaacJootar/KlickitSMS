<?php include('includes/t_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
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
                  
               
            
               
                   <h3>Welcome, you are logged in as a teacher!</h3>
                       </h1>
                    <p> Klickit SMS is a dynamic, responsive, multi tasking school management software.
Klickit Systems has created this software to ease the tasking work of managing students, session, term, classes, results, inventory, accounting and many other processes in schools and colleges. Everything is just a Klick away!</p>               
                  
                                    
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <div class="box col-md-9">
      
            
            
                <!--/row -->

               
             

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
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <!--/span-->
    <!--/span-->
    <!--/span-->


</div><!--/row-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

 <?php include('includes/footer.php'); ?>