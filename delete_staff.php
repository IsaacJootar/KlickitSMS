<?php include('includes/header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/student_manager.php'); ?>



            
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
                        
                
               
             <div class="box col-md-5">
             <a href="manage_staff.php" class="btn btn-primary btn-sm"> Back</a>                     
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                 

                    
                </div>
                <div class="box-content">
                 
                          <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                     Be aware that any deletion will remove every data on such staff(s) from the system completely! 
                </div>
                   
                     
                      <p>&nbsp;</p>
                    
              
                </div>
            </div>
        </div>
        
             <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Staff List</h2>
                   <div class="box-icon"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                           
                <form method="post" action="delete_staff_exe.php">
                 
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                      
                       <tr bgcolor="CCCCCC">
                         <b><input  type="checkbox" id="checkAll" /> Select all</b>
                <script type="text/javascript">
$("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>
                         <th>Staff Full Name</th>
                          <th>Staff ID</th>
                               <th>Tick to delete</th>
                   
                         
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					 
       $names = mysql_query("SELECT * FROM `staff`");
while($staff=mysql_fetch_array($names)) { ?>
                       
       
                    
                       
                 
               
                          <td class="center"><?php echo $staff['fullname'];  ?></td>
                          
                          <td class="center"><?php echo $staff['username'];  ?></td>
               <td class="center">          
                         <input name="qst[]"  id="checkAll" type="checkbox"   value="<?php echo  $staff['id'];?>" type="checkbox" />
                         </td> 
						 
                      
                    
            
     
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                         
                          <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                     Be aware that any deletion will remove every data on such staff(s) from the system completely! 
                </div>
                   
                   <p align="center">
                   
                      </p>
                            <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                          
            
                   <input type="submit" name="submit" value="Delete Now"/>
                   </form>
                 </div>
               </div>
             </div>
             </p>
                      
                 <p>&nbsp; 
                 
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