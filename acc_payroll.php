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
               <h4>MANAGE SCHOOL PAYROLL</h4>
            </div>                 
                        <p align="center"> 
                         <a href="acc_pr_config_staff_sal.php" title="click here to configure staff salaries " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-search"></i>  Configure Salaries</a>
                                 
                               
                         <a href="acc_pr_monthly_config.php" title="click here to configure staff monthly payments  " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-wrench"></i>  Configure monthly payments</a>
                                 
                                
                                
                                  <a href="acc_pr_add_staff.php" title="click here to add staff to payroll" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-share-alt"></i> Add staff to payroll</a>
                                
                                  <a href="acc_pr_remove_staff.php" title="click here to remove staff from payroll " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-remove"></i> Remove staff from payroll</a>
                                
                                 <a href="acc_pr_config_staff_coo_fee.php" title="click here to configure cooperative staff fee " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-wrench"></i> Configure staff cooperative fee</a>
      </p>
                        <p align="center"><br>                          
                          <a href="acc_pr_assign_staff_coo.php" title="click here to subscribe staff to  cooperative" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-share-alt"></i> Subscribe staff to cooperative </a>
                          
                           <a href="acc_pr_remove_coo.php" title="click here to remove staff from  cooperative" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-remove"></i> Remove staff from cooperative </a>
                                 <a href="acc_pr_manage_staff_payments.php" title="click here to manage staff monthly payments" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-list-alt"></i> Manage staff payments </a>
                          
                           <a href="acc_pr_create_debit_items.php" title="click here to manage debit items" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-list-alt"></i> Manage debit items </a>
                                <a href="acc_pr_pay_slips1.php" title="click here to manage generate staff pay slips" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-print"></i> Generate Pay Slips </a>
                          <p>
                          
                          <a href="acc_pr_bank_schedule.php" title="click here to manage generate bank schedule" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-print"></i> Generate Bank Schedule </a>
                          
                          
                        </p>
                              
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