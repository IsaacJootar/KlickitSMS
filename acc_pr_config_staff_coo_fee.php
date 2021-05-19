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
               <h4>Configure Staff Cooperative Fee</h4></div>
                                 
                 <a href="acc_payroll.php" title="Click here to go back to main page " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                        
                
                                 
                                <a class="btn btn-default" title="click here to refreash page " data-toggle="tooltip" href="acc_pr_config_staff_coo_fee.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Refresh page</a>                        
                        <p align="center"></br>
                        
    
             <div class="box col-md-15">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Available Staff List                </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                 <form method="post" action="acc_pr_config_staff_coo_fee_exe.php">
                   <table width="322%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th> Staff ID</th>
                         
                            <th>Fullname</th>
                         
                          
                               
                          
                            <th>Status</th>
                              <th align="center">Enter Amount</th>
                              
                            
                       </tr>
                     </thead>
                     <tbody>
                     
                       <?php
				global $database;	 
      $sql=$database->query("SELECT * FROM `acc_staff_payroll` WHERE `status`= 1 AND `coo`= 1 ORDER BY `staff_id`");
while($sta=$database->fetch_array($sql)) {
	 ?>

                       
         <td class="center"><?php echo $sta['staff_id'] ?></td>
                      
                           <td class="center"> <?php echo $sta['fullname'] ;  ?></td>
                      
                    
                         
                      
                        
            <td class="center"><?php
  if($sta['coo_fee'] > 0){
		 
		  echo "<span class='label-success label label-default'>configured</span>";
  }
	 
      if($sta['coo_fee']<=0 ){
		 
		  echo "<span class='label-alert label label-default'>Pending</span>";
  }
	  ?>
        </td>
                       
                        
                        
                          <td> 
                         <label>
                           ₦<input name="qst[]" type="hidden"  value="<?php echo $sta['staff_id'];?>" style="visibility:hidden" />
									      <input type="number" title="enter cooperative fee amount for this staff" name="<?php echo $sta['staff_id']. 'coo_fee';?>" value="<?php echo $sta['coo_fee']; 
								?>">
                             
                             
                              
                            
									     
                                
                                </label>
                   
                               
                               
                     </tr>
                     <?php }?>
                   
                       </tbody>
                     
                   </table>
             
        
      
                 
                
                 
         <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Apply Changes</button>
                    </p>
                 
                
           
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