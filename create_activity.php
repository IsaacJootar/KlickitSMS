<?php include('includes/header.php'); ?>
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
			  ?>
                  <?php echo $session->display_error(); ?>         
                     
                 <div class="alert alert-info" align="center";>
               <h4>Create Activity Rating</h4></div>
                                  
                        
                        <p align="center"></br>
                        
                        
             <div class="box col-md-6">
             
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Create new activity </h2>

                    <div class="box-icon">
                        
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                    
                </div><p></p>
                
                 <div class="box-content">

                   <form class="form-horizontal" action="create_activity_exe.php" method="post">
                <fieldset>
                  <strong><td>SELECT ACTIVITY TYPE </td> 
                    </strong>
                        <?php
                        
echo "<select name='activity_type' required  data-rel='chosen' ><option value=''></option>";

echo  "<option value='affective'>AFFECTIVE</option>";
echo  "<option value='psychomotor'>PSYCHOMOTOR</option>";
echo "</select>";
                       
    ?>  <br/><br/>  
                    <div class="input-group col-md-4">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil red"></i></span>
                        <input type="text" name="activity" required class="form-control" placeholder="Type activity name here">
                    </div><br/>
                    
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Save Now</button>
                    </p>
                </fieldset>
            </form>
           
                    
                </div>
                
                <div class="box-content">
                 <div class="clearfix"></div>
                  <div class="clearfix"></div>
                   
                </div>
                
                
            </div>
                         <div class="box col-md-12">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>PSYCHOMOTOR RECORDS                   </h2>
                   <div class="box-icon"> <i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Activity Name</th>
                           <th>Activity Range</th>
                           <th>Action</th>
                        
                       </tr>
                     </thead>
                     <tbody>
                       <?php
           global $database;
      $query=$database->query("SELECT * FROM `activity_psychomotor`");
    if (!$query)
    {
      die("database query faild". mysql_error());
    }
    
    
    while($users =$database->fetch_array($query))
    
    { ?>
                       
         <td class="center"><?php echo $users['activity_name'];  ?></td>
                      
               
               
               <td class="center"><?php echo $users['created_by'];  ?></td>
                <td class="center"><?php echo "<a href=\"delete_psycho_exe.php?id=".urlencode($users['id'])."\"> remove</a>" ?> </td>
                      
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                 </div>
               </div>
             </div>
             </p>

        </div>
        
        
                     <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>AFFECTIVE RECORDS                  </h2>
                   <div class="box-icon"> <i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Activity Name</th>
                           <th>Activity Range</th>
                            <th>Action</th>
                        
                       </tr>
                     </thead>
                     <tbody>
                       <?php
           global $database;
      $query=$database->query("SELECT * FROM `activity_affective`");
    if (!$query){
      die("database query faild". mysql_error());
    }
    
    
    while($users =$database->fetch_array($query))
    
    { ?>
                       
         <td class="center"><?php echo $users['activity_name'];  ?></td>
                      
               
               <td class="center"><?php echo $users['created_by'];  ?></td>
                <td class="center"><?php echo "<a href=\"delete_affective_exe.php?id=".urlencode($users['id'])."\"> remove</a>" ?> </td>
                      
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
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

    <!-- Ad, you can remove it -->
   
 <?php include('includes/footer.php'); ?>