<?php include('includes/dir_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/accountExpense.php'); ?>


    
            <!-- content starts -->
           
<div class=" row"></div>

<div class="row">
    <div class="box col-md-11">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
                <h2 align="justify"><img src="images/fa.png" width="18" height="18"> Klickit School Management Software.  [ Version 1.4.1 ]</h2>
        </div>
            
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
               <h4>View Budget Item</h4></div>
                                 
                 <a href="900_dir_encode_qpde_md765ahd098265.php" title="Click here to go back to main page " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon"></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                 
                                <a class="btn btn-default" title="click here to refreash page " data-toggle="tooltip" href="dir_expense.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Refresh page</a>                        
                        <p align="center"></br>
                        
                <div class="box col-md-11">
           
        
       
             <div class="box col-md-11">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Available Resent Expense                 </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                   <table width="222%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr>
                         
                         <th> Name</th>
                         <th>Code</th>
                           <th>Created By</th>
                            <th>Created On</th>
                             <th>Edited On</th>
                          
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					  
      $expense=accountExpense::find_all($sess_id, $term_id);
foreach($expense as $exp) { ?>
                             <td class="center"><?php echo strtoupper($exp->cat_name);  ?></td>
         <td class="center"><?php echo  $exp->item_name;  ?></td>
                     
                           <td class="center"><strong> <?php echo  $exp->amount ;  ?></strong></td>
                       
                         
                        <td class="center"><?php echo   $exp->trans_id ;  ?></td>
                          <td class="center"><?php echo  $exp->created_on;  ?></td>
                              <td class="center">	<?php echo "<a target='_blank'
							   class='btn btn-primary btn-sm' href=\"acc_expense_print_receipt.php?staff_id=".urlencode(($exp->staff_id))."&&transaction_id=".urlencode(($exp->trans_id))."\"> <i class='glyphicon glyphicon-print'
                                ></i>  Print</a>" ?> </td>
                        
                           
                           
                     
                     </tr>
                     <?php }?>
                  
                      <strong style="color:#F00"; style="float:right"> Total Expense: </strong>
                     <?php
                     $total=accountExpense::find_total_expense($sess_id, $term_id);
				 echo '<b>'.$format_currency=accountExpense::format_currency($total). '<b>';
				  ?>
                  on <?php 
				 echo $total=accountExpense::find_total_number_of_items($sess_id, $term_id);?>
                 items
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