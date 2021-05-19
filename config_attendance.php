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
               <h4>SET TERM DURATION </h4></div>
                                  
                        <p align="center"></br>
             <div class="box col-md-6">
             
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Enter number of weeks </h2>

                    <div class="box-icon">
                        
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                   <form class="form-horizontal" action="config_attendance_.php" method="post">
                <fieldset>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil red"></i></span>
                        <input type="number" name="duration" required class="form-control" placeholder="type duration here, example 12">
                    </div><p>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil red"></i></span>
                        <input type="number" name="days" required class="form-control" placeholder="type number of days school opened">
                    </div><p>
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Set duration</button>
                    </p>
                </fieldset>
            </form>
                    
                </div>
            </div>
        </div>
             <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Available term configurations </h2>
                   <div class="box-icon"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Session</th>
                         <th>Term</th>
                         <th>Duration</th>
                         <th>Days school opened</th>
                          <th>Created On</th>
                           <th>Created By</th>
                           <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					  if(!isset($_GET['id'])){$_GET['id']= "";};
       $durations = $database->query("SELECT * FROM `config_term_duration` order by `id` desc");
foreach($durations  as $duration ) { 
        $session = $database->query("SELECT * FROM `session_manager` WHERE `id`='{$duration['session']}'");
        $session =$database->fetch_array($session);
        
        ?>
                      
         <td class="center"><?php echo  $session['session'] ;  ?></td>
                   <td class="center"><?php echo  $duration['term'] ;  ?></td>
                         <td class="center"><?php echo  $duration['duration'] . '' ;  ?> Weeks</td>
                             <td class="center"><?php echo  $duration['days'] ;  ?></td>
                         
                          <td class="center"><?php echo  $duration['date'] ;  ?></td>

                            <td class="center"><?php echo  'Admin.' ;  ?></td>
                           
                           
                            <td class="center">    <a href="delete_term_duration.php?id=<?php echo $duration['id'];?> ">
                    delete
                       
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