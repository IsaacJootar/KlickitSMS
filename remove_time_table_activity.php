<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/section_manager.php'); ?>
<?php require_once('classes/grading_manager.php'); ?>
            
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
               <h4>Remove Time Table Activity</h4></div>
                  <p class="center col-md-1" align="right">
                    <a href="time_table.php">back</a>
                    </p> 
               
             <div class="box col-md-6">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Section View: Click on name to display activities</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Section Name</th>
                            <th>Section Code</th>
                            <th>Section Range</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                         <?php
    $section = sectionManager::find_by_sql("SELECT id, code, rangee, sec_name FROM `section`");
foreach($section as $sec) { ?>
        
        <td class="center"> 

          <a href="remove_time_table_activity.php?id=<?php echo $sec->id;?>"> <?php echo $sec->sec_name;?></a> </td>
         <td class="center"><?php echo $sec->code ;  ?> </td>
             <td class="center"><?php echo $sec->rangee ;  ?> </td>  
             
        
        
    </tr>
    <?php }?>
                        </tbody>
                    </table>
                    <ul class="pagination pagination-centered">
                        <li><a href="#">Prev</a></li>
                        <li class="active">
                           
                        
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
             <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Time table setup for  </h2>
                   <div class="box-icon"> <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a> <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                    <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                            <th>Day</th>
                            <th>Starts</th>
                            <th>Ends</th>
                         <th>Activity Name</th>
                            <th>Action</th>
                            <th>Action</th>
                        
                       </tr>
                     </thead>
                     <tbody>
                       <?php
           global $database;
      $query=$database->query("SELECT * FROM `time_table` WHERE `section_id` = '{$_GET['id']}' order by `id` desc");
    if (!$query){
      die("database query faild". mysql_error());
    }
    
    
    while($users =$database->fetch_array($query))
    
    { ?>
           <td class="center"><?php echo $users['day'];  ?></td>
           <td class="center"><?php echo $users['starts'];  ?></td>
            <td class="center"><?php echo $users['ends'];  ?></td>
           <td class="center"><?php echo $users['activity'];  ?></td>            
                      
                <td class="center"><?php echo "<a href=\"delete_time_table.php?id=".urlencode($users['id'])."\"> remove setup</a>" ?> </td>
                       <td class="center">    <a  class="openModal" data-toggle="modal" data-target="#myModal" data-id="<?php echo $users['id'];?>">
                     Edit
                       
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
                   <ul class="pagination pagination-centered">
                     <li><a href="#">Prev</a></li>
                    
                     <li><a href="#">Next</a></li>
                   </ul>
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
      $.ajax({url:"edit_time_table.php?id="+id,cache:false,success:function(result){
          $(".modal-content").html(result);
      }});
  });
          </script>
   
 <?php include('includes/footer.php'); ?>