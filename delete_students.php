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
             <a href="manage_student.php" class="btn btn-primary btn-sm"> Back</a>                     
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Select a class and submit to display students</h2>

                    
                </div>
                <div class="box-content">
                  <form method="post" action="delete_students.php" >
                         
                            <p align="left">
                             <?php
                        $quer="SELECT distinct class_name FROM `classes`"; 
echo "<select name='class_name'  data-rel='chosen' required  ><option value=''>Select a class..........</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[class_name]'>$noticia[class_name]</option>";
}
echo "</select>";
                       
		?>    
                      </p>
                           
                      <p align="left">&nbsp;</p>
                      <p align="left"><span class="center col-md-2">
                        <input type="submit" name="submit" value="Submit">
                      </span></p>
                      <p>&nbsp;</p>
                    
                         
                         
              
                    </form>
                      
                </div>
            </div>
        </div>
         <?php       if(!isset($_POST['submit'])){ exit();}
			 if(isset($_POST['submit'])){
				 $_SESSION['class_name']=$_POST['class_name'];
			  } ?>
             <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Registered students available for <?php echo  $_SESSION['class_name']; ?>                   </h2>
                   <div class="box-icon"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                           
                <form method="post" action="delete_students_exe.php">
                 
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                      
                       <tr bgcolor="CCCCCC">
                         <b><input  type="checkbox" id="checkAll" /> Select all</b>
                <script type="text/javascript">
$("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>
                         <th>Student's Full Name</th>
                          <th>Gender</th>
                               <th>Tick to delete</th>
                   
                         
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					 
       $names = mysql_query("SELECT * FROM `student_class` WHERE  `class_name`= '{$_POST['class_name']}'");
while($students=mysql_fetch_array($names)) { ?>
                       
       
                    
                       
                 
               
                          <td class="center"><?php echo $students['fullname'];  ?></td>
                          
                          <td class="center"><?php echo $students['gender'];  ?></td>
               <td class="center">          
                         <input name="qst[]"  id="checkAll" type="checkbox"   value="<?php echo  $students['student_id'];?>" type="checkbox" />
                         </td> 
						 
                      
                    
            
     
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                         
                          <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                     Be aware that any deletion will remove every data on such student(s) from the system completely! 
                </div>
                   
                   <p align="center">
                   
                      </p>
                            <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                          
            
                   <input type="submit" name="submit" value="Delete Students"/>
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