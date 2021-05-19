<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config.php'); ?>

 
            
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
        ?> <a href="acc_manage_school_fees.php"> << back</a>
                  <?php echo $session->display_error(); ?>         
                    
                 <div class="alert alert-info" align="center">

               <h4>Configure Tuition fee for new students</h4></div>
                                   
                         <a href="acc_config_fees_old.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-wrench"></i> Configure school fees for old students</a>
                                                     
                        <p align="center"></br>
             <div class="box col-md-6">
             
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Configure Tuition  fee Amount</h2>

                    <div class="box-icon">
                        
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                   <form class="form-horizontal" action="acc_config_fees_new_exe.php" method="post">
                <fieldset>
                    <div class="input-group col-md-4">
                       <span class="input-group-addon">Enter Amount [₦]</span>
                        <input type="number" name="expected_to_pay" required class="form-control" placeholder="Enter Amount Here">
                    </div><p>
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                       
                    </p>
                </fieldset>
                
                </div>
            </div><p>
             
              <div align="left">
               <i>Tick appropriately, the classes that will be paying this amount of school fees above</i>
              <p>
        
  <?php
  global $database;
   $qry=$database->query("SELECT *  FROM `classes`" );
$qno=0;


while($values=$database->fetch_array($qry)){  
?>
      <div>
                <label>
                         <?php echo $values['class_name']; ?>
                         <input name="qst[]" type="checkbox" value="<?php echo $values['class_name'];?>" type="checkbox"/> 
          
                    <input name="class_id" value="<?php echo $values['id'] ?>" style="visibility:hidden"/>   
                      
                       </label>
                         
            </div>
     
    <?php } // end whileloop ?>
                                                                                         
                 
                 
              <p>&nbsp;</p>
              </div>
                 
              <p class="left col-md-3">
    <button type="submit" class="btn btn-primary">Save Configuration</button>
              </p> 
                 
              <p>&nbsp;</p>
              </div>
</form>
                
                
        </div>
             <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2> Classes / Configurations [new students]                 </h2>
                  <div class="box-icon">
 <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                     </div>
                 </div>
                 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Class</th>
                           <th> Amount</th>
                           <th>Action</th>
                              <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                             
  <?php
  global $database;
   $qry=$database->query("SELECT * FROM `acc_configure_tuition_fees` WHERE `status`=0 order by `id` desc " );
 while($fees=$database->fetch_array($qry)){  
?>
         <td class="center"><?php  echo  $fees['class_name'];  ?></td>
                       <td class="center"><?php  echo  $fees['expected_to_pay'];  ?></td>
                           
                           
                            <td class="center">    <a  class="openModal" data-toggle="modal" data-target="#myModal" data-id="<?php echo $fees['id'];?>">
                     change amount
                       
                    </a>
                     </td>
                     <td class="center"><?php echo "<a href=\"acc_delete_tuition_fee_new.php?id=".urlencode($fees['id'])."\"> delete fee</a>" ?> </td>
                      
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
      $.ajax({url:"edit_fees_config_new_dialog.php?id="+id,cache:false,success:function(result){
          $(".modal-content").html(result);
      }});
  });
          </script><!-- Ad, you can remove it -->
   
 <?php include('includes/footer.php'); ?>