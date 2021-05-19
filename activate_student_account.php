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
                        
                <a href="manage_student.php">Back</a>
               
             <div class="box col-md-5">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>ACTIVATE STUDENT ACCOUNT</h2>

                    
                </div>
                <div class="box-content">
                  <form method="post" action="" >
                         
                            <p align="left">
                    </p>
                    <p> <p> <p> <p>
<b><h5>Select a Class</h5></b>
                             <?php
                        $quer="SELECT distinct class_name FROM `classes`"; 
echo "<select name='class'  data-rel='chosen' required  ><option value=''>Select a class..........</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[class_name]'>$noticia[class_name]</option>";
}
echo "</select>";
                       
		?>    
                              
                      <p align="center">&nbsp;</p>
                      <p align="center"><span class="center col-md-2">
                        <input type="submit" name="submit" value="submit">
                      </span></p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                         
                         
              
                    </form>
                      
                </div>
            </div>
        </div>
         <?php       if(!isset($_POST['submit'])){ exit();}
			 if(isset($_POST['submit'])){
				 $_SESSION['class']=$_POST['class'];
			  } ?>
             <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Selected Class  <?php echo  $_SESSION['class']; ?>                   </h2>
                   <div class="box-icon"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                           
                <form method="post" action="activate_student_account_exe.php">
                 
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
                          <th>Gender</th>
                            <th>Account status</th>
                               <th>Tick to activate</th>
                   
                         
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					 
       $names = mysql_query("SELECT * FROM `student_class` WHERE  `class_name`= '{$_POST['class']}' AND `account_status`=0");
while($students=mysql_fetch_array($names)) {                
                 ?>
               
                          <td class="center"><?php echo $students['fullname'];  ?></td>
                          
                          <td class="center"><?php echo $students['gender'];  ?></td>

                             <td class="center"><?php
  if($students['account_status']==1){
     
      echo "<span class='label-success label label-default'>Active</span>";
  }
   
      if($students['account_status']==0 ){
     
      echo "<span class='label-alert label label-default'>Deactivated</span>";
  }
    ?>
        </td>
               <td class="center">          
                         <input name="qst[]" type="checkbox"  value="<?php echo  $students['student_id'];?>" type="checkbox"/>
                         </td> 
						 
                      
                       </label>
            </div>
     
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                   <input type="submit" name="submit" value="activate Account "/>
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