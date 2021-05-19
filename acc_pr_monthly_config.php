<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/accountschoolFees.php'); ?>


       
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
               <h4>CONFIGURE  STAFF MONTHLY PAYROLL</h4></div>
                                 
                 <div align="left"><a href="acc_payroll.php" title="Click here to go back " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' '.  ' '. ' ' ;   ?>
                 </div>
                 <form method="post" action="acc_pr_monthly_config_exe.php">                      
                  <strong><td><h3>Select Payroll Month</h3> </td>
                  </strong>
                  <p></br>
                 
                    <?php
					// get system current month//
					  $date=  date("F");
				
                    
echo "<select name='month' requir data-rel='chosen' required title='please select a month' ><option value=''></option>";

echo  "<option value='$date'>$date</option>";
echo "</select>";

                       
		?>  
                  </p>
                  <p>
                    <input disabled  checked type="checkbox" name="checkbox" id="checkbox">
                    <label for="checkbox"> Income & deductions included</label><p>
                    <input disabled type="checkbox" name="checkbox" id="checkbox">
                    <label for="checkbox">payroll group configuration disabled</label>
                  </p>
                  <p>&nbsp;</p>
                  <p class="center col-md-5">
                    <button type="submit" class="btn btn-primary">Configure Now</button>
                        
                   </p>
</form>                                    
                        
    
            
                 
      
                 
                
                 
        
                
           
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
</div>

    <!-- Ad, you can remove it -->
   
 <?php include('includes/footer.php'); ?>