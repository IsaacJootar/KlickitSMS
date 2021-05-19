<?php include('includes/f_header.php'); ?>
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
        ?><a href="300pc419pxystaff.php">Back </a>
                  <?php echo $session->display_error(); ?>  
                   <div class="alert alert-info" align="center">
               <h4> INPUT ASSESSMENT SCORES </h4>
            </div>                 
                       
                          <a href="f_activity_affective.php" title="Rate student affective records." data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> AFFECTIVE RECORDS</a>
                                 
                                
                 <a href="f_activity_psychomotor.php" title="Rate student psychomotor records." data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> PSYCHOMOTOR RECORDS</a>   
                                 
                     
    
    <!--/span-->

   
  </p>
  </p><BR><BR><BR><BR><BR>
 
  </div>
  </div>
  </div>
  </div>
  
 <?php include('includes/footer.php'); ?>