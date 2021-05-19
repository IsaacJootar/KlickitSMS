<?php include('includes/header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
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
               <h4>Manage School Time Table</h4></div>
                                  
                       
                                  <a href="create_time_table.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-calendar"></i>  Create school time table</a>
                                 
                                 
                 <a href="monitor_time_table.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-time"></i> Monitor school time table</a>
                                 <a href="remove_time_table_activity.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-edit"></i> Update time table</a>
                     
                                         
                        <p align="center"></br>
             <div class="box col-md-6">
             
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Create A New Activity</h2>

                    <div class="box-icon">
                        
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                   <form class="form-horizontal" action="create_time_table_activity_exe.php" method="post">
                <fieldset>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil red"></i></span>
                        <input type="text" name="activity" required class="form-control" placeholder="E.g Break Time / Games">
                    </div><p>
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Save activity</button>
                    </p>
                </fieldset>
            </form><p> <p>&nbsp;</p> <p>&nbsp;</p>
            <form class="form-horizontal" action="import_time_table_activity.php" method="post">
                <fieldset>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn"><strong>import school subjects</strong></button>
                    </p>
                </fieldset>
            </form>
                    
                </div>
            </div>
        </div>
             <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Available Time table activities                  </h2>
                   <div class="box-icon"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                   <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Activity Name</th>
                            <th>Action</th>
                        
                       </tr>
                     </thead>
                     <tbody>
                       <?php
           global $database;
      $query=$database->query("SELECT * FROM `time_table_activity`");
    if (!$query){
      die("database query faild". mysql_error());
    }
    
    
    while($users =$database->fetch_array($query))
    
    { ?>
                       
         <td class="center"><?php echo $users['activity'];  ?></td>
                      
                <td class="center"><?php echo "<a href=\"delete_time_table_activity.php?id=".urlencode($users['id'])."\"> remove activity</a>" ?> </td>
                      
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                 
                  
                 </div>
               </div>
             </div>
             </p>
                      
                 <p>&nbsp;</p>
                     
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