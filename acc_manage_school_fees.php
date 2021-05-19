<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>



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
               <h4>Manage Students Fees Payments</h4>
            </div>                 
                        <p align="center"> 
                          
                         <a href="acc_config_fees_old.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-wrench"></i>  Configure tuition fee [old students]</a>
                                 
                               
                         <a href="acc_config_fees_new.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-wrench"></i> Configure tuition fee [new students]</a><p>

                                 <a href="acc_config_other_fee_items_old.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-wrench"></i>  Configure other fees items [old students]</a>
                                 
                               
                         <a href="acc_config_other_fee_items_new.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-wrench"></i> Configure other fees items [new students]</a><p>
                          <a href="acc_pay_fees_old1.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-qrcode"></i>  Pay / update school fees [old students]</a>
                                 
                               
                         <a href="acc_pay_fees_new1.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-qrcode"></i>  Pay / update school fees  [ new students]</a>

                                   <a href="acc_school_fees_reports.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-stats"></i>  Generate Tuition fees reports </a><p>
                                 <a href="acc_debtor_list.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-list"></i>  Generate Debtor list </a><p>


                               
                                       
                                           
                        <p align="center"></br>
                        
                
                 <div class="box-content">
                 
                     
                  
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