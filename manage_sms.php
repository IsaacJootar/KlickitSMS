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
               <h4>MANAGE BULK MESSAGING</h4></div>
                                  <a href="update_numbers.php" title="Click here to update numbers for bulk sms" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Update Phone Numbers</a>
                                 
                 <a href="bulk_message.php"  title="Click here to Send bulk messages" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Send Bulk Messages (By class) </a>

                 <a href="bulk_message_all.php"  title="Click here to Send bulk messages" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Send Bulk Messages (To all) </a>
                                                       
                        <p align="center"></br>
                        
               
             <div class="box col-md-6">
            <div class="box-inner">
               
            </div>
        </div>
             <div class="box col-md-6">
               <div class="box-inner">
                 
            
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