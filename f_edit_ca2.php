<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>


  <?php 
$_SESSION['cat']=$_POST['cat'];
$_SESSION['subcat']=$_POST['subcat'];
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
               <h4>Edit Score For Subject</h4></div>
                                  
                  <p align="center">  <a href="f_ca.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Back </a>
                                 
                        
                  <td><h4>Class</strong>: <?php echo @$_SESSION['cat'];?></h4></td>
                    <td><h4>Subject:</strong> <?php echo @$_SESSION['subcat'];?></h4></td>
                  
                  <p align="center"><i style="color:#F00">Click on any active link to edit scores</i></br>
             <div class="box col-md-12">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Available Students That Took C A in <?php echo  @$_SESSION['subcat']; ?>                 </h2>
                   <div class="box-icon"> <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a> <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <?php 
				 
	 $error_array=array();
	//initilize error flag//
	$error_flag=false;
	/*
				 $sql=mysql_query("SELECT  * FROM `score_entry` WHERE `subject_name`='{$_SESSION['subcat']}' AND `class_name`='{$_SESSION['cat']}' AND `staff_id`='{$id}'  AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'");
	 if($sql){
		   if($values=mysql_num_rows($sql) > 0){
			$error_array[]='Scores have already been entered for this subject, select another subject or class!';
			$error_flag=true;
		  }
					
			if ($error_flag){	
			$_SESSION['sess_errors']=$error_array;
			session_write_close();
			redirect_to('f_ca.php');
			exit();
			}
	 }
	 */
				 
				 ?>
                 <div class="box-content">
                 <form action="f_edit_ca_exe.php" method="post">
                  <table class="table">
                     <thead>
                       <tr bgcolor="#CCCCCC" align="center">
                        
                         <th width="110"><div align="center">Student's Full Name</div></th>
                        
							 <th width="12">Action </th>
							
							
                       </tr>
                     </thead>
                     <tbody>
                       <?php
       $sql=mysql_query("SELECT distinct `student_subjects`. `student_id`, `students`. `fullname` FROM `student_subjects` JOIN `students` ON `student_subjects`. `student_id`=`students`. `id` WHERE `subject_name`= '{$_SESSION['subcat']}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `class_name`='{$_SESSION['cat']}' ORDER BY `fullname` ASC");
	  
	  while($values=mysql_fetch_array($sql)){	
	     $sql2=mysql_query("SELECT  * FROM `score_entry` WHERE `subject_name`='{$_SESSION['subcat']}' AND `class_name`='{$_SESSION['cat']}' AND `student_id`='{$values['student_id']}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'");
			$qry=mysql_fetch_array($sql2)
								    ?>   
	 
	  
                        <td class="center"><?php echo $values['fullname']; ?></td>
                                      
                                     
						
                             
                                    
							  <label>
                                    
                                      
									<div align="left">
									  
							  </label>
                             
                             
                          
                              <td class="center">
   <?php if($qry['ca_type'] > 0 or $qry['edit_status']==1){ 
   echo "<a href=\"f_edit_ca3.php?id=".urlencode(($values['student_id']))." &ca=".urlencode(($qry['ca_type'])). "\">Edit Score</a>" ; // collect the ca type and the student name here, and all the critaria subj, class, name, staff, id etc
   }
   else { echo "";}
   ?>
                          </td>
             
                              </tr>
                             
							
									<?php } // end whileloop ?>
                       </tbody>
                     
                   </table>
                   
                   </form>
                   
                 </div>
               </div>
           </div>
           
                      
               
                     
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