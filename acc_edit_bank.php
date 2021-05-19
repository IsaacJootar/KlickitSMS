<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/accountBank.php'); ?>


      
            
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
               <h4>UPDATE RECIEVING BANK</h4></div>
                                 
                 <a href="acc_manage_bank.php" title="Click here to go back to previous page " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-fast-backward"></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                          
                                <a class="btn btn-default" title="click here to refreash page " data-toggle="tooltip" href="acc_edit_bank.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Refresh page</a>                        
                        <p align="center"></br>
                        
               
        </div>
        
        
       
             <div class="box col-md-11">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Available Budget Categories                  </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                   <table width="222%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr>
                         
                         <th> Name</th>
                         <th> Code</th>
                           <th>Created By</th>
                            <th>Created On</th>
                             <th>Edited On</th>
                           <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					
      $banks=accountBank::find_all();
foreach($banks as $bank) { ?>
                       
         <td class="center"><?php echo  $bank->bank_name ;  ?></td>
                       <td class="center"><?php echo  $bank->bank_code ;  ?></td>
                        <td class="center"><?php echo   $bank->created_by ;  ?></td>
                         <td class="center"><?php echo  $bank->created_on ;  ?></td>
                        <td class="center"><?php echo   $bank->edited_on ;  ?></td>
                           
                           
                          
                     <td class="center">    <a  class="openModal" data-toggle="modal" data-target="#myModal" data-id="<?php echo $bank->id;?>">
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
      $.ajax({url:"acc_edit_bank_dialog.php?id="+id,cache:false,success:function(result){
          $(".modal-content").html(result);
      }});
  });
				  </script>
 <?php include('includes/footer.php'); ?>