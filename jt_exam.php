<?php include('includes/t_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
  <?php 
 
        $_SESSION['cat'];
		 $_SESSION['subcat']
                 ?>

            
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
               <h4>Input Scores For exams</h4></div>
                                  
                  <p align="center">  <a href="t_exam.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Back </a>
                                 
                          <a href="t_ca.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Input Scores For All CA's</a>
                                 
                                 <a href="class_section.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Make Subject Comments</a>
                                 
                
                  <td><h4>Class</strong>: <?php echo @$_SESSION['cat'];?></h4></td>
                    <td><h4>Subject:</strong> <?php echo @$_SESSION['subcat'];?></h4></td>
                  
                  <p align="center"></br>
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
				 $sql=mysql_query("SELECT  * FROM `score_entry` WHERE `subject_name` = '{$_SESSION['subcat']}' AND `class_name` ='{$_SESSION['cat']}' AND `staff_id`='{$id}'  AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'");
		   $values=mysql_fetch_array($sql);
		   $grade=$values['grade'];
		  
		   
		 
		   if($values=mysql_num_rows($sql) < 1){
			$error_array[]=' Enter scores for CA first before entering examination scores!';
			$error_flag=true;
		  }
		  
		  if(($values=mysql_num_rows($sql) > 1) and $grade != ''){
			$error_array[]=' Scores have already been entered for this subject, select another subject or class!';
			$error_flag=true;
		  }
		  
			if($error_flag){	
			$_SESSION['sess_errors']=$error_array;
			session_write_close();
			redirect_to('t_exam.php');
			exit();
			}
	 
	 
				 
				 ?>
                 <div class="box-content">
                 <form action="tj_exam_exe.php" method="post">
                  <table class="table">
                     <thead>
                       <tr bgcolor="#CCCCCC" align="center">
                        
                         <th align="center" width="321"><div align="center">Student's Full Name</div></th>
                         
                              <th align="center"><div align="center">Enter student's examination scores (60%)</div></th>
							 
							
							
                       </tr>
                     </thead>
                     <tbody>
                     
                     <?php
				    
      $sql=mysql_query("SELECT distinct `student_subjects`. `student_id`, `students`. `fullname` FROM `student_subjects` JOIN `students` ON `student_subjects`. `student_id`=`students`. `id` WHERE `subject_name`= '{$_SESSION['subcat']}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `class_name`='{$_SESSION['cat']}' order by trim(fullname) ASC");
	  while($values=mysql_fetch_array($sql)){	
	  ?>
	  
                                     <td class="center"><?php echo $values['fullname']; ?></td>
                                      
                                      
                                    
							<td class="center">
									<label>
                                    
                                      
									<input name="qst[]" type="text" class="flat"  value="<?php echo $values['student_id'];?>" style="visibility:hidden" />
                                    <input size="8" type="number" min="0" max="60" name="<?php echo $values['student_id'].'exam';?>"  required   placeholder="<?php echo ' Exam' ?>"> 
                                    
                                     
                             
									</label>
                              </td>
                              </tr>
                             
							
									<?php } // end whileloop ?>
                       </tbody>
                     
                   </table>
                   <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Submit Scores</button>
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