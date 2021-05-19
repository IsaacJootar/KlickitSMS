<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/accountExpenseItems.php'); ?>

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
                  <?php echo $session->display_error(); ?>         
                     
                 <div class="alert alert-info" align="center">
               <h4>Update Expense Items</h4></div>
                                 
                 <a href="acc_expense_items.php" title="Click here to go back to main page " data-toggle="tooltip" class="btn btn-primary btn-sm">  << Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                          
               
        </div>
        
        
       
             <div class="box col-md-12">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Available Expense Items                  </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                   <table width="222%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr>
                         
                         <th> Items</th>
                         <th> Code</th>
                           <th>Created By</th>
                            <th>Created On</th>
                             <th>Edited On</th>
                           <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
        
      $category = accountExpenseItems::find_all($sess_id, $term_id);
foreach($category as $cat) { ?>
                       
         <td class="center"><?php echo  $cat->item_name ;  ?></td>
                       <td class="center"><?php echo  $cat->item_code ;  ?></td>
                        <td class="center"><?php echo   $cat->created_by ;  ?></td>
                         <td class="center"><?php echo  $cat->created_on ;  ?></td>
                        <td class="center"><?php echo   $cat->edited_on ;  ?></td>
                           
                           
                          
                     <td class="center">    <a  class="openModal" data-toggle="modal" data-target="#myModal" data-id="<?php echo $cat->id;?>">
                      <input type='button' class='btn btn-primary' value="Edit">
                       
                    </a>
                     </td>
                   
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
             </div>
             </p>
                      
           <?php
           
       ?>      <p>&nbsp;                        </p>
                     
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
    <script type="text/javascript">
        
  $('.openModal').click(function(){
      var id = $(this).attr('data-id');
      $.ajax({url:"acc_edit_item_dialog.php?id="+id,cache:false,success:function(result){
          $(".modal-content").html(result);
      }});
  });
          </script>
 <?php include('includes/footer.php'); ?>