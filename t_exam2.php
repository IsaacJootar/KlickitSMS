<?php include('includes/t_header.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
  <?php 
  $_SESSION['cat'];
		 $_SESSION['subcat']; 

 global $database;

$section_id=$database->query("SELECT * FROM `class_section` WHERE `class_name`='{$_SESSION['cat']}'");
 $section_id=$database->fetch_array($section_id);
$section_id= $section_id['section_id'];

  // check score entry status//
  $check_status=$database->query("SELECT `status` FROM `score_entry_status`
   WHERE `session_id` ='{$sess_id}' AND `term_id`= '{$term_id}' ");


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
               <h4>INPUT EXAMINATION SCORES</h4></div>
                                  
                  <p align="center">  <a href="t_exam.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Back </a>
                                 
                          <a href="t_ca.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Input Scores For All CA's</a>
                                 
                                
                 
                
                 
                  <td><h4>Class</strong>: <i style="color:#000"> <?php echo @$_SESSION['cat'] . '  ';?></i> Subject:</strong> <i style="color:#000"> <?php echo @$_SESSION['subcat'];?></i></h4></td>
                      <span class="label-info label label-default"> Please make sure you have  imputed CA scores for this subject before entering the exams scores!</span>
                   

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
				 $sql=mysql_query("SELECT * FROM `score_entry` WHERE `subject_name` = '{$_SESSION['subcat']}' AND `staff_id`='{$id}'  AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'");
       $values=mysql_fetch_array($sql);
       $grade=$values['grade'];
		  
		   
		 
		   if($values=mysql_num_rows($sql) < 1){
			$error_array[]=' Submit your CA scores for this subject first before entering examination scores!';
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
                 <form action="t_exam_exe.php" method="post">
                  <table class="table">
                     <thead>
                       <tr bgcolor="#CCCCCC" align="center">
                        
                         <th align="center" width="321"><div align="center">Student's Full Name</div></th>
                         
                              <th align="center"><div align="center">Enter student's examination scores [<i style="color:#F00"><?php if($database->num_rows($check_status)== 1){echo 'closed';
    }?></i>]</div></th>
               
              
							 
							
							
                       </tr>
                     </thead>
                     <tbody>
                     
                     <?php
				     // get dossier config//
             $config=$database->query("SELECT * FROM `assessment` WHERE `section_id`='{$section_id}'");
             $config=$database->fetch_array($config);
      $sql=mysql_query("SELECT distinct `student_subjects`. `student_id`, `student_subjects`. `account_status`, `students`. `fullname`,
       `students`. `account_status` FROM `student_subjects` JOIN `students` ON `student_subjects`. `student_id`=`students`. `id` WHERE `subject_name`= '{$_SESSION['subcat']}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `class_name`='{$_SESSION['cat']}' AND `student_subjects`. `account_status`=1 ORDER BY trim(fullname) ASC");
	  while($values=mysql_fetch_array($sql)){	
	 

    $sql2=mysql_query("SELECT  * FROM `score_entry` WHERE `subject_name`='{$_SESSION['subcat']}' AND `class_name`='{$_SESSION['cat']}' AND `student_id`='{$values['student_id']}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'");
      $qry=mysql_fetch_array($sql2);
      $exam_score=$qry['exam'];
            
	  ?>
	  
                      <td class="center"><img src="images/avatar.png" width="31" height="31"/><?php echo $values['fullname']; ?></td>
                                      
                                      
                                    
							<td class="center">
									<label>
                                    
                                      
<input name="qst[]" type="text" class="flat"  value="<?php echo $values['student_id'];?>" style="visibility:hidden" /> <input type="number" <?php if($database->num_rows($check_status)== 1){echo 'disabled';
    }?> size="8" min="0" max="<?php echo $config['total_exam'] ?>" step=0.01 title="<?php echo 'Exam score cannot be more than'. ' '. $config['total_exam']; ?> " name="<?php echo $values['student_id'].'exam';?>" placeholder="<?php echo  'Exams'; ?>" value="<?php echo $qry['exam'];?>" />  
                                   
                                     
                             
									</label>
                        </td>
                              </tr>
                             
							
									<?php } // end whileloop ?>
                       </tbody>
                     
                   </table>
                   <p class="center col-md-5">
                        <button style="float:right" type="submit" name="submit" value="1"   title="clicking this button will submit scores" data-toggle="tooltip" class="btn btn-primary">Submit Scores</button>
                        
                        
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