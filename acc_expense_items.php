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
                     
                 <div class="alert alert-info" align="center">
               <h4>Create Expense Items</h4></div>
                                 
                 <a href="acc_expense.php" title="Click here to go back to main page " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon"></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                 <a href="acc_edit_expense_item.php" title="click here to edit Budget item " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i>Edit expense item</a>
                                 
                                        
                        <p align="center"></br>
                        
                <div class="box col-md-5">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Click on the button below to create item </h2>

                    
                </div>
                <div class="box-content" align="left">
                  <a href="#" class="btn btn-info btn-setting">Create Item</a>
                    
                </div>
            </div>
        </div>
        
        
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h4 align="center">Create Expense Item</h4>
                </div>
                <div class="modal-body">
                   <form class="form-horizontal" action="acc_create_expense_item_exe.php" method="post">
                <fieldset>
                  <div class="input-group col-md-4">
                    <div class="input-group col-md-4"> <span class="input-group-addon">Item Name</i></span>
                      <input type="text" name="item_name" required class="form-control" placeholder=" Item. Name: E.g diesel, bulbs, dstv, drinks etc  ">
                    </div></br>
                   
                   
                  </div><p>
                  <div class="input-group col-md-4">
                        <span class="input-group-addon">Add item to a category </span>
                         <select required ='required' name="cat_name" class="form-control" id="cat"><option value=''>-----</option>
                            <?php 
                            global $database; 
                            $query=$database->query("SELECT `id`, `cat_name` 
                              FROM `acc_expense_category` order by `id` asc");
                        while($activity=$database->fetch_array($query)) {

                        echo '<option>';
                             
                         ?>
                            
                             <?php 
                               echo $activity['cat_name'];
                             } ?></option>
                           
                            
                            </select>

                    </div><p>
                   
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </p>
                </fieldset>
            </form>
                </div>
                
            </div>
        </div>
    </div>
             <div class="box col-md-7">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Available Expense Items                 </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                   <table width="222%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr>
                         
                         <th> Item Name</th>
                          <th> Item Category</th>
                     
                           <th>Created By</th>
                            <th>Created On</th>
                             <th>Edited On</th>
                           <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					 
      $items = accountExpenseItems::find_all();
foreach($items as $item) { ?>
                       
         <td class="center"><?php echo  $item->item_name ;  ?></td>
         <td class="center"><?php echo  $item->cat_name ;  ?></td>
          <td class="center"><?php echo   $item->created_by ;  ?></td>
                    
                         <td class="center"><?php echo  $item->created_on ;  ?></td>
                        <td class="center"><?php echo   $item->edited_on ;  ?></td>
                        
                        
                           
                            <td class="center">    <a  class="openModal" data-toggle="modal" data-target="#myModal" data-id="<?php echo $item->id;?>"> Delete
                      
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
      $.ajax({url:"acc_delete_item_dialog.php?id="+id,cache:false,success:function(result){
          $(".modal-content").html(result);
      }});
  });
				  </script>
 <?php include('includes/footer.php'); ?>