<?php include('includes/s_header.php'); ?>
 <?php require_once('classes/session.php'); ?>
<?php  require_once('classes/functions.php'); ?>
<?php  require_once('classes/database.php'); ?>
<?php  require_once('includes/config2.php'); ?>
   
            
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
               <h4>Create a notification</h4></div>
                                  
                                      
                        <p align="center"></br>
             <div class="box col-md-3.2">
             
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Send a notification to the child's teacher</h2>

                  
                </div>
                <div class="box-content">
                   <form method="post" action="s_notification_exe.php">
                
                
                 
                  <p>
                    <select name="prio"  data-rel='chosen' required> 
                      <option value="">select priority'......</option>
                      <option value="high">High</option>
                      <option value="medium">Medium</option>
                      <option value="low">Low</option>
                    </select>
                  </p>
                 
                  <p>
                              <textarea name="note" rows="5" cols="17"  placeholder="type in your message here. Be brief and precise" required></textarea>
                              </p>
                           
                         
              </p>
               <button type="submit" class="btn btn-primary">Send notification</button>
                </form>
                </div>
            </div>
        </div>
             <div class="box col-md-12">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Sent  Notifications (Outbox)                 </h2>
                   <div class="box-icon"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Sent Notifications</th>
                           <th>Sent On</th>
                      
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					  global $database;
					  $sql=mysql_query("SELECT * FROM `notification` WHERE `student_id`= '{$s_id}' AND `type`=0 order by `id` desc");
					 while( $note=mysql_fetch_array($sql)){?>
                      
                       <td class="center"><?php echo  $note['note'] ;  ?></td>
                        <td class="center"><?php echo  $note['created_on'];  ?></td>
                         
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