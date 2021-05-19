<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/accountBudget.php'); ?>
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
               <h4>MANAGE BUDGET</h4></div>
                                 
                 <a href="700jstpxvzpdo_accts.php" title="Click here to go back to main page " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon"></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                 <a href="acc_edit_budget.php" title="click here to edit Budget " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i>Edit Budget</a>
                                 
                               
                        
                <div class="box col-md-3">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Click to create budget</h2>

                    
                </div>
                <div class="box-content" align="left">
                  <a href="#" class="btn btn-info btn-setting">Create Budget</a>
                    
                </div>
            </div>
        </div>
        
        
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h4 align="center">Create Budget </h4>
                </div>
                <div class="modal-body">
                
                 <form name="$" method='POST' action='#'>
                 <tr>
                 <td>
<?Php

echo "<br><b> SELECT  BUDGET CATEGORY </b> </br><p>

<select  name=cat id='s1'  required onchange=AjaxFunction();>
<option value=''>Select Category</option>";

$sql="select * from `acc_budget_cat` "; // Query to collect data from table 

foreach ($dbo->query($sql) as $row) {
echo "<option value=$row[cat_id]>$row[cat_name]</option>";
}
?>
</select></br>
</td>
</tr>
<br>
<tr>
<td>
<strong>
ENTER AMOUNT</strong></br><p>
<input type="number" name="amount"  required />
</p>
</td>
</tr>
 <p class="center col-md-5">

                   <button type="submit" class="btn btn-primary">Save</button>
                    </p>
                   
                    
</form>
                </div>
                
            </div>
        </div>
    </div>
    
             <div class="box col-md-9">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Available Budgets                  </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                   <table width="222%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr>
                         
                         <th> Item</th>
                         <th>Category</th>
                         
                            <th width="123">Amount (₦)</th>
                              <th width="123">Created By</th>
                            <th>Created On</th>
                             <th>Edited On</th>
                           <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                     
                       <?php
					 
      $budget=accountBudget::find_all($sess_id, $term_id);
foreach($budget as $budg) { ?>
                       
         <td class="center"><?php echo  $budg->item_name;  ?></td>
                       <td class="center"><?php echo strtoupper($budg->cat_name);  ?></td>
                           <td class="center"><strong>(₦) <?php echo  $budg->amount ;  ?></strong></td>
                        <td class="center"><?php echo   $budg->created_by ;  ?></td>
                         <td class="center"><?php echo  $budg->created_on ;  ?></td>
                        <td class="center"><?php echo   $budg->edited_on ;  ?></td>
                        
                        
                           
                            <td class="center">    <a  class="openModal" data-toggle="modal" data-target="#myModal" data-id="<?php echo $budg->id;?>"> Delete
                      
                    </a>
                     </td>
                     </tr>
                     <?php }?>
                      <strong style="color:#F00";> Total Budget: </strong>
                <?php
				
				 $total=accountBudget::find_total_budget($sess_id, $term_id);
				 echo '<b>'.$format_currency=accountBudget::format_currency($total). '<b>';
				  ?>
                  on <?php 
				 echo $total=accountBudget::find_total_number_of_items($sess_id, $term_id);?>
                 item(s)
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