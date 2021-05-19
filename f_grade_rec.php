<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
  <?php 
  $_SESSION['cat'];
  $_SESSION['subcat']; ?>

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
               <h4>INPUT EXAMINATION SCORES</h4></div>
                                  
                  <p align="center">  <a href="f_exam.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Back </a>
                 
                
                 
                  <td><h4>Class</strong>: <i style="color:#000"> <?php echo @$_SESSION['cat'] . '  ';?></i> Subject:</strong> <i style="color:#000"> <?php echo @$_SESSION['subcat'];?></i></h4></td>
                      <span class="label-info label label-default"> The letters are the score grade for recpetion class for this subject!</span>
                   

            <div class="box col-md-11">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Available Students Offering <?php echo  @ $_SESSION['subcat']; ?>                 </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <?php 
	 $error_array=array();
	//initilize error flag//
	$error_flag=false;			 
				 ?>
                 <div class="box-content">
                 <form action="f_grade_rec2.php" method="post">
                  <table class="table">
                     <thead>
                       <tr bgcolor="#CCCCCC" align="center">
                        
                         <th align="center" width="321"><div align="center">Student's Full Name</div></th>
                         
                              <th align="center"><div align="center">Enter student's examination scores </div></th>
							 
							
							
                       </tr>
                     </thead>
                     <tbody>
                     
                     <?php
				    
      $sql=mysql_query("SELECT distinct `student_subjects`. `student_id`, `students`. `fullname` FROM `student_subjects` JOIN `students` ON `student_subjects`. `student_id`=`students`. `id` WHERE `subject_name`= '{$_SESSION['subcat']}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `class_name`='{$_SESSION['cat']}' order by trim(fullname) ASC");
	  while($values=mysql_fetch_array($sql)){	
	 
	  ?>
	  
                      <td class="center"><img src="images/avatar.png" width="31" height="31"/><?php echo $values['fullname']; ?></td>
                                      
                                      
                                    
							<td class="center">
									<label>
                                    
                                      
									<input name="qst[]" type="text" class="flat"  value="<?php echo $values['student_id'];?>" style="visibility:hidden" />
                                 <select name="<?php echo $values['student_id'].'rec_grade';?>" />
                                 <option value="A">A </option>
                                 <option value="B">B </option>
                                 <option value="C">C </option>
                                 <option value="D">D </option>
                                 <option value="E">E </option>
                                 <option value="F">F </option>
                                 
                                 </select> 
                                    
                                    
                                     
                             
									</label>
                        </td>
                              </tr>
                             
							
									<?php } // end whileloop ?>
                       </tbody>
                     
                   </table>
                   <p class="center col-md-5">
                        <button style="float:right" type="submit" name="submit" value="1"   title="clicking this button will submit scores" data-toggle="tooltip" class="btn btn-primary">Submit Grade</button>
                        
                        
                    </p>
                   </form>
                   
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