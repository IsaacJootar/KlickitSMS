<?php include('includes/store_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/storeItems.php'); ?>

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
               <h4> store Items</h4></div>
                                 
                 <a href="800_inven_stor11904_version_on.php" title="Click here to go back to main page " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon"></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                
                                        
                        <p align="center"></br>
                        
                <div class="box col-md-3">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Click to create item </h2>

                    
                </div>
                <div class="box-content" align="left">
                  <a href="#" class="btn btn-info btn-setting">Add Item</a>
                    
                </div>
            </div>
        </div>
        
        
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h4 align="center">Add Item to store</h4>
                </div>
                <div class="modal-body">
                   <form class="form-horizontal" action="store_create_item_exe.php" method="post">
                <fieldset>
                  <div class="input-group col-md-4">
                    <div class="input-group col-md-4"> <span class="input-group-addon">Item Name</i></span>
                      <input type="text" name="item_name" required class="form-control" placeholder=" Item. Name: E.g diesel, bulbs, dstv, drinks etc  ">
                    </div></br>
                   <div class="input-group col-md-4">
                    <div class="input-group col-md-4"> <span class="input-group-addon">Unit Price</i></span>
                      <input type="number" name="unit_price" required class="form-control" placeholder=" E.g 2500  ">
                    </div></br>
                   
                  </div><p>
                  <div class="input-group col-md-4">
                    <div class="input-group col-md-4"> <span class="input-group-addon">Quantity</i></span>
                      <input type="number" name="quantity" required class="form-control" placeholder=" E.g 47 ">
                    </div></br>
                   
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
             <div class="box col-md-9">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Available items in the  store                 </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                   <table width="222%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr>
                         
                         <th> Item Name</th>
            
                            <th>Created On</th>
                            <th>Unit Price</th>
                           <th>Quantity</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					 
      $items = storeItems::find_all();
foreach($items as $item) { ?>
                       
         <td class="center"><?php echo  $item->item_name ;  ?></td>
      <td class="center"><?php echo  $item->created_on ;  ?></td>
      <td class="center"><?php echo format_currency($item->unit_price);  ?></td>

<td class="center"><?php echo "<span class='label-infor label label-default'>$item->quantity</span>"; ?></td>







                        
                        
                           
                            
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

   
 <?php include('includes/footer.php'); ?>