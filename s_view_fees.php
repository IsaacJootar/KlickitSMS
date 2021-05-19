<?php include('includes/s_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/accountschoolFees.php'); ?>
<?php require_once('classes/schoolInformation.php'); ?>


       
            
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
               <h4>SCHOOL FEES PAYMENT DETAILS</h4></div>
                <a href="100bfstudent_gpanel.php" style="float:left" title="Go back to  home page"  data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                 
                                     
             <div class="box col-md-12">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Current Payment Records           </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                   <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr>
                       
                         
                            <th>Class Name</th>
                            <th>Session / Term</th>
                            <th>Default Tuition Fee</th>
                         
                            <th>Amount Paid</th>
                            <th>Discount</th>
                          <th>Balance</th>
                        
                           <th>Last Payment Date</th>
                            <th>Payment Status</th>
                             <th>Status</th>
                         

                       </tr>
                     </thead>
                     <tbody>
                     
                       <?php
            global $database;
      $payment=accountschoolFees::find_student_fees_details($s_id);
foreach($payment as  $pay) { ?>
                            
        
         <?php
 $fullname=$database->query("SELECT `fullname` FROM `student_class` WHERE `student_id`= '{$pay->student_id}' ");
$fullname=$database->fetch_array($fullname);?>
    
         <td class="center"><?php echo   $pay->class_name;  ?></td>
          <td class="center"><?php echo get_session_term($sess_id, $term_id)  ?></td>
        
          <td class="center"><?php echo   format_currency($pay->expected_to_pay);  ?></td>
           <td class="center"><?php echo   format_currency($pay->have_paid);  ?></td>
                     
                          
                         
                        <td class="center"><?php 
					
		 echo format_currency($pay->discount);  ?></td>
                        <td class="center"><?php 
	  if($pay->have_paid < $pay->expected_to_pay){
		  
		  echo  format_currency($pay->expected_to_pay - $pay->have_paid);
	  }
	  if($pay->have_paid >=  $pay->expected_to_pay){
		 
		  echo "none";
	  }
	   ?></td>
       
      
       <td class="center"><?php echo $pay->paid_on;  ?></td>
                              <td class="center"><?php
  if($pay->have_paid >= $pay->expected_to_pay){
		 
		  echo "<span class='label-success label label-default'>Full Payment</span>";
  }
	 
      if($pay->have_paid < $pay->expected_to_pay){
		 
		  echo "<span class='label-alert label label-default'>Part Payment</span>";
  }
	  ?></td>
               <td> 

                <?php  echo "<a target='_blank'  href=\"acc_student_fees_print_receipt.php?student_id=".urlencode($s_id)."&&sess_id=".urlencode($pay->sess_id)."&&term_id=".urlencode($pay->term_id)."\"><i class='glyphicon glyphicon-print'
                                ></i>  save / print receipt </a>"; echo '   ';  ?> </td>               
                       
                     
                     </tr>
                     <?php }?>
                  
                      
                       </tbody>
                     
                   </table>
                 <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
               
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                  
                </div>
                
            </div>
        </div>
    </div>
                 
                 </div>
               </div>
             <p>&nbsp;</p>
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