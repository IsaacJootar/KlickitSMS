<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/accountExpense.php'); ?>

 
            
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
        ?> <a href="acc_expense.php"> << back</a>
                  <?php echo $session->display_error(); ?>         
                    
                 <div class="alert alert-info" align="center">

               <h4>create Expense</h4></div>
                                   
                          <a href="acc_expense_items.php" class="btn btn-primary"><i
                                class="glyphicon glyphicon-chevron glyphicon-pencil"></i> Create expense item</a>
                                
        </div>
    </div>
    
                                                     
                        <p align="center"></br>
             <div class="box col-md-12">
             
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Create expense  here</h2>

                    <div class="box-icon">
                        
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                   <form class="form-horizontal" action="acc_create_expense_exe.php" method="post">
                <fieldset>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon">Select item </span>
                         <select required ='required' name="item_name" class="form-control" id="cat"><option value=''>-----</option>
                            <?php 
                            global $database; 
                            $query=$database->query("SELECT `id`, `item_name` 
                              FROM `acc_expense_items` order by `id` asc");
                        while($activity=$database->fetch_array($query)) {

                        echo '<option>';
                             
                         ?>
                            
                             <?php 
                               echo $activity['item_name'];
                             } ?></option>
                           
                            
                            </select>

                    </div><p>
                     <div class="input-group col-md-4">
                       <span class="input-group-addon">Enter expense amount  [₦]</span>
                        <input type="number" name="expense_amount" required class="form-control" placeholder="Type Here">
                    </div><p>

                      <div class="input-group col-md-4">
                       <span class="input-group-addon">Enter receiver's Name</span>
                        <input type="text" name="received_by" required class="form-control" placeholder="Type Here">
                    </div><p>
                  
                    <div class="clearfix"></div></br>
                    <p class="center col-md-5">
                       <button type="submit" class="btn btn-primary">create</button>
              </p> 
                 
                    </p>
                </fieldset>
                
                </div>
            </div><p>
             
             
</form>
                
                
        </div>
             <div class="box col-md-12">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Records of Expenses </h2>
                   <div class="box-icon">
 <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                     </div>
                 </div>
                 <div class="box-content">
                  <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr  bgcolor="CCCCCC">
                              <th>Receiver's Name</th>
                         <th>Item</th>
                           <th>category</th>
                         
                         <th>Amount </th>
                           <th>Date/time</th>
                           <th>Action</th>
                             <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                             
  <?php
  global $database;
   $qry=$database->query("SELECT * FROM `acc_expense` order by `id` desc " );
 while($expense=$database->fetch_array($qry)){  
?>            <td class="center"><?php  echo  $expense['received_by']; ?></td>
         <td class="center"><?php  echo  $expense['item_name'];  ?></td>
           <td class="center"><?php  echo  $expense['cat_name'];  ?></td>
         <td class="center"><?php  echo  $expense['expense_amount']; ?></td>
           <td class="center"><?php  echo  $expense['created_on']; ?></td>
            

                           
                           
                            <td class="center"><?php echo "<a href=\"acc_delete_expense.php?id=".urlencode($expense['id'])."\"> delete</a>" ?> </td>
                      <td>
                  <?php  echo "<a target='_blank'  href=\"acc_expense_print_receipt.php?expense_id=".urlencode($expense['id'])."\"><i class='glyphicon glyphicon-search'
                                ></i> details </a>"; echo '   ';  ?> </td>               
                
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

   
          </script><!-- Ad, you can remove it -->
   
 <?php include('includes/footer.php'); ?>