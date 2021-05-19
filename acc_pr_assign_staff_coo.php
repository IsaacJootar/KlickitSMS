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
               <h4>SUBSCRIBE STAFF TO COOPERATIVE</h4></div>
                                 
                 <a href="acc_payroll.php" title="Click here to go back to main page " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                                  
             <div class="box col-md-12">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Available Staff List                </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                 <form method="post" action="acc_pr_assign_coo_exe.php">
                   <table width="222%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead style="font-weight:bold">
                       <tr bgcolor="#CCCCCC">
                         
                         <th> Staff ID</th>
                         
                            <th>Fullname</th>
                         
                            <th>Gender</th>
                               
                           <th>Payroll group</th>
                            <th>Status</th>
                           
                                 <th align="center"><div align="center">tick to subscribe staff</div></th>
                       </tr>
                     </thead>
                     <tbody>
                     
                       <?php
				global $database;	 
      $sql=$database->query("SELECT * FROM `acc_staff_payroll` ORDER BY `staff_id`");
while($sta=$database->fetch_array($sql)) {
	 ?>

                       
         <td class="center"><?php echo $sta['staff_id'] ?></td>
                      
                           <td class="center"> <?php echo $sta['fullname'] ;  ?></td>
                      
                       <td class="center"> <?php echo $sta['gender'] ;  ?></td>
                          <td class="center"> <?php echo $sta['payroll_group'] ;  ?></td>
                      
                        
            <td class="center"><?php
  if($sta['coo']!=0){
		 
		  echo "<span class='label-success label label-default'>suscribed</span>";
  }
	 
      if($sta['coo']==0 ){
		 
		  echo "<span class='label-alert label label-default'>not suscribed</span>";
  }
	  ?>
        </td>
                       
                        
                        
                          <td> 
                         <label>
                           <input <?php if (!(strcmp("$sta[coo]",1))) {echo "checked=\"checked\"";} ?> name="coo[]" type="checkbox"  value="<?php echo $sta['staff_id'];?>" />
									    
									     
                                
                                </label>
                   
                                </td>
                               
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