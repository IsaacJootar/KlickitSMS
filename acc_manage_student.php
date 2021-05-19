<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/student_class_manager.php'); ?>


           
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
               <h4>MANAGE STUDENTS</h4>
            </div>                 
                        <p align="center">  <a href="acc_create_student.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-pencil"></i> Create student account</a>
                                 
                                
                                
                                 
                                 
               
 <a  href="print_student_list_all.php" target="_blank" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-print"></i>  Generate students List</a>
                                <a class="btn btn-default" href="acc_manage_student.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Refresh page</a>                        
                        <p align="center"></br>
                        
                 <div class="box-inner">
                 
                    
             <div class="box col-md-3">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Select a class name</h2>

                    
                </div>
                <div class="box-content">
                  <form method="post" action="acc_manage_student.php" >
                         
                            <p align="left">
                             <?php
                        $quer="SELECT class_name FROM `classes`"; 
echo "<select name='class_name'  data-rel='chosen' required  ><option value=''>Select a class..........</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[class_name]'>$noticia[class_name]</option>";
}
echo "</select>";
                       
		?>    
                      </p>
                           
                      <p align="left">&nbsp;</p>
                      <p align="left"><span class="center col-md-2">
                        <input type="submit" name="submit" required value="Display student list">
                      </span></p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                         
                         
              
                    </form>
                      
                </div>
            </div>
        </div>
             <div class="box col-md-9">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2 align="center">List of Students: <?php echo @$_POST['class_name'] ?></h2>
                   <div class="box-icon"> </div>
                 </div>
                 <div class="box-content">
                              
                               <?php       if(isset($_POST['submit'])){
								    $_SESSION['class_name']=$_POST['class_name'];
									}?>
			 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Student's Full Name</th>
 <th>Present Class</th>
                         <th>Gender</th>
                        
                           <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					        if(!isset($_POST['submit'])){ 
							  $classes = studentclassManager::find_by_sql("SELECT * FROM `student_class`");
							}
							
							if(isset($_POST['submit'])){
								    $_SESSION['class_name']=$_POST['class_name'];
									 $classes = studentclassManager::find_by_sql("SELECT * FROM `student_class` WHERE `class_name`='{$_SESSION['class_name']}'");}
foreach($classes  as $class ) {  

// end if?>
                       
         <td class="center"><?php echo  $class->fullname ; ?></td>
                    <td class="center"><?php echo $class->class_name;  ?></td>
                       <td class="center"><?php echo  $class->gender;  ?></td>
                        
                            <td class="center">	<?php echo "<a href=\"acc_update_student.php?id=".urlencode(($class->student_id))."\"> Update Account</a>" ?> </td>
                     </tr>
                     <?php }?>
                       </tbody>
                   </table>
                 </div>
               </div>
<td class="center">	<?php echo "<a target='_blank' class='btn btn-primary btn-sm' href=\"print_student_list.php?class_name='{$_SESSION['class_name']}'\"> <i class='glyphicon glyphicon-print'
                                ></i>  Print class list</a>" ?> </td>
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