<?php include('includes/header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config2.php'); ?>

            
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
               <h4>Bulk Messaging</h4></div>
                                  <a href="bulk_by_class.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i>  Send to a class</a>
                                 
                 <a href="bulk_to_all.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Send to all parents </a>
                                                       
                        <p align="center"></br>
                        
               
             <div class="box col-md-6">
            <div class="box-inner">
                
                <div class="box-content">
                   
                </div>
            </div>
        </div>
             <div class="box col-md-6">
               <div class="box-inner">
                 
                 <div class="box-content"></div>
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