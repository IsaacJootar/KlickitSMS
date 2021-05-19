<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/class_manager.php'); ?>
 
            
            
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
               <h4>MANAGE DEBIT ITEMS</h4></div>
                                  
                        <p align="center">  <a href="acc_payroll.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i>Back</a>
                                
                              
                        <p align="center"></br>
             <div class="box col-md-6">
             
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Create a new debit item</h2>

                    <div class="box-icon">
                        
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                   <form class="form-horizontal" action="acc_pr_create_debit_items_exe.php" method="post">
               <fieldset>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" name="item" required class="form-control" placeholder="Type debit item here">
                    </div><p>
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Save item</button>
                    </p>
                </fieldset>
            </form>
                    
                </div>
            </div>
        </div>
             <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Available debit items                   </h2>
                   <div class="box-icon"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Item  Name</th>
                      
                           <th>Created On</th>
                           <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					  if(!isset($_GET['id'])){$_GET['id']= "";};
       $items = $database->query("SELECT * FROM `acc_pr_debit_items` order by `id`");
foreach($items as $item) { ?>
                       
         <td class="center"><?php echo  $item['item'];  ?></td>
                       
                        <td class="center"><?php echo   $item['created_on'] ;  ?></td>
                           
                           
                            <td class="center">	<?php echo "<a href=\"acc_pr_remove_debit_item.php?id=".urlencode(($item['id']))."\"> Delete Item</a>" ?> </td>
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

     <script type="text/javascript">
				
  $('.openModal').click(function(){
      var id = $(this).attr('data-id');
      $.ajax({url:"edit_class_dialog.php?id="+id,cache:false,success:function(result){
          $(".modal-content").html(result);
      }});
  });
				  </script><!-- Ad, you can remove it -->
   
 <?php include('includes/footer.php'); ?>