<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>


            
            <div class="box-content row">
                
                 
               <div class="control-group">
                   
 <div align="center">
                  <p>
                    <?php
					if ((output_message($message))){
               echo   '<div class="alert alert-success">';
                   echo ' <button type="button" class="close" data-dismiss="alert">&times;</button>';
                   
                   echo output_message($message); 
               echo ' </div>';
				 unset ($message);
				 }
			  ?>
                    
                    
                  <?php echo $session->display_error(); ?>         </p>
              
                  <div class="alert alert-info" align="center">
                    <h4>Manage Sessions</h4>
          </div>                 
                        <p align="center">  <a href="create_session.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Create session</a>
                                 
                                
                                
                                  <a href="view_session.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i>  View Session</a>
                                 
                 <a href="delete_session.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Delete Session</a>
                                <a class="btn btn-default" href="manage_session.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Refresh page</a>                        
                        <p align="center"></br>
                        
                 
                              
                     
                  
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