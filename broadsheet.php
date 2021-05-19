<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>
    
            
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
               <h4>GENERATE  BROADSHEETS</h4>
            </div>                 
                        <p align="center">  
                                 <a href="broad_sheet_cummulative.php" title=" Allows you to generate cumulative broadsheets" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-list-alt"></i>  Cumulative Broadsheets</a>
                                
                                <a href="broad_sheet_term.php" title="Allows you to generate termly broadsheets " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-list-alt"></i> Termly BroadSheet</a>
                                 
                                 
                                 
                                 <a href="cpa.php" title="Allows you to generate termly class perfomance analysis " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-list-alt"></i> Generate CPA</a>
                                 
                                  <a href="#" title="Allows you to generate termly subject perfomance analysis " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-list-alt"></i> Generate SPA </a>
                                 

                                  <a href="tem.php" title="Allows you to generate assessment templates analysis " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-print"></i> Generate assessment templates  </a>
                                 
                                 
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