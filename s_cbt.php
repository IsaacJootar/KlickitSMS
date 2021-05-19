<?php include('includes/s_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/class_manager.php'); ?>

            
          <div class="control-group" align="center">
                  
                  <?php
          if ((output_message($message))){
               echo   '<div class="alert alert-success">';
                   echo ' <button type="button" class="close" data-dismiss="alert">&times;</button>';
                   
                   echo output_message($message); 
               echo ' </div>';
         unset ($message);
         }
        ?><a href="200er_b6yx9_student.php">Back </a>
                  <?php echo $session->display_error(); ?>  
                   <div class="alert alert-info" align="center">
                <h4> COMPUTER BASED TEST (CBT) </h4>
            </div>                 
                       
                          
                          
                                
                                
                            
                                 <a href="cbt_sview_questions.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-search"></i>  View Available Tests</a>
                                      <a href="cbt_stest_questions.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-pencil"></i>  Take a Test </a>
                                 <a href="cbt_sview_results.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-search"></i>  Check test Results </a><p>

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