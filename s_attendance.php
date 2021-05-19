<?php include('includes/s_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/class_manager.php'); ?>
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
               <h4>My School Attendance</h4>
            </div>                 
                  
                                 
                 <a href="s_view_attendance_sheet.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-search"></i> Monitor daily / weekly attendance</a>
                    <a href="s_view_attendance_sheet_termly.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-search"></i> Monitor termly attendance</a>
                                                 
                        

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <!--/span-->
    <!--/span-->
    <!--/span-->


</div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <!--/row-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p><!--/fluid-row--></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp; </p>
    <?php include('includes/footer.php'); ?>