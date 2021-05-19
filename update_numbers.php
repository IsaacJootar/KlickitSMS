<?php include('includes/header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
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
                        
                
               <a href="manage_sms.php">back</a>
             <div class="box col-md-5">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Select class and display students</h2>

                    
                </div>
                <div class="box-content">
                  <form method="post" name="class" action="" >
                         
                            <p align="left">
                             <?php
                        $quer="SELECT distinct class_name FROM `classes`"; 
echo "<select name='class_name'  data-rel='chosen' required  ><option value=''>Select a class..........</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[class_name]'>$noticia[class_name]</option>";
}
echo "</select>";?>
                            <input type="submit" name="submit1" value="display students">
                    
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                         
                         
              
                    </form>
                    <form id="form1" name="form1" method="post" action="">
  <table width="230" border="0" align="center" class="Tborder">
    
      <td><div align="left"></div></td>
    </tr>
  </table>
</form>
                      
                </div>
            </div>
        </div>
         <?php      ?>
             <div class="box col-md-7">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="bulk sms">
                   <h2>Phone numbers of parents associated to <i style="color:#000">  <?php echo  @$_POST['class_name'];?> </i> students                   </h2>
                   <div class="box-icon"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                <?php 
                $_SESSION['class_name']=$_POST['class_name'];?>                           
                <form method="post" action="update_numbers_exe.php">
                 
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                      
                       <tr bgcolor="CCCCCC">
                         <b><input type="checkbox" id="checkAll" /> Select all</b>
                <script type="text/javascript">
$("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>
                         <th>Student's Full Name</th>
                       
                               <th>Enter Phone Number</th>
                   
                         
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					 
       $names =$database->query("SELECT * FROM `student_class` WHERE  `class_name`= '{$_POST['class_name']}' AND `account_status`=1 ORDER BY trim(fullname)");
while($students=$database->fetch_array($names)) {

   $phone_number=$database->query("SELECT `phone_number` FROM `bulk_sms` 
    WHERE  `student_id`= '{$students['student_id']}'");
$phone_number=$database->fetch_array($phone_number);
$phone_number=$phone_number['phone_number'];
  ?>
                       
       

                       
       
                    
                       
                 
               
                          <td class="center"><?php echo $students['fullname'];  ?></td>
                          
                         
                           
               <td class="center">          
                         <label>
                           <input name="qst[]" type="hidden"  value="<?php echo $students['student_id'];?>" style="visibility:hidden" />
                        <input type="text" placeholder="Phone number" title="Enter phone number" name="<?php echo $students['student_id'].'phone_number';?>" 
                        value="<?php echo $phone_number;
                ?>">
                  
                             
                             
                            
                       
                                
                                </label>
                   
                         </td> 
						 
                      
                       </label>
            
     
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                   <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Update Now</button>
                    </p>
                 
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