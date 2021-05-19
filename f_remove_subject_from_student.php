<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config2.php'); ?>
            
            <div class="box-content row">
                 <div align="center"><?php
					if ((output_message($message))){
               echo   '<div class="alert alert-success">';
                   echo ' <button type="button" class="close" data-dismiss="alert">&times;</button>';
                   
                   echo output_message($message); 
               echo ' </div>';
				 unset ($message);
				 }
			  ?>
                  <?php echo $session->display_error(); ?>  
                         
                     
                  <p class="center col-md-1" align="right">
                  
                    <a href="f_subject_to_student.php">Back</a>
                   </p>
             
            <div class="alert alert-info">
           REMOVE STUDENTS FROM SUBJECTS
            </div>           
    <div class="box col-md-11">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Available Classes                   </h2>
                   <div class="box-icon"> <a href="#" class="#"><i
                                class="glyphicon glyphicon"></i></a> <a href="#" class="#"><i
                                class="glyphicon glyphicon-chevron"></i></a> <a href="#" class="#"><i
                                class="glyphicon glyphicon"></i></a> </div>
                 </div>
                 <div class="box-content">
                  <table width="722%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <form class="form-horizontal" action="f_remove_subject_from_student.php_exe.php" method="post">
              <div align="left">
               <h5 align="center">  check appropriately to remove subject(s) from this student</h5><p>
              
            
               <h5 align="left">  Selected Class: <?php echo strtoupper($myclass); ?></h5><p>  
         
         <?php
			
                       $quer="SELECT student_id, `fullname`, `class_name` FROM `student_class` WHERE  `class_name`= '{$myclass}' AND `account_status` = 1 order by trim(fullname)"; 
echo "<select name='student'  data-rel='chosen' required ='required'><option value=''>Select a student/search for name of student......</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[student_id]'>$noticia[fullname]</option>";
}
echo "</select>";
       ?>
         <p><br/>
                 <span class="label-info label label-default">  If no subject(s) appear here, assign the subject(s) to the class first, so also for students.!</span>
       <?php
	global $database;
	 $qry=mysql_query("SELECT id, subject_name FROM `subject_class` WHERE `class_name`='{$myclass}'   " );
$qno=0;
while($values=mysql_fetch_array($qry)){	
?>
			<div>
                <label>
                         <?php echo $values['subject_name']; ?>
                         <input name="qst[]" type="checkbox" value="<?php echo $values['subject_name'];?>" type="checkbox"/> 
						 
                      
                       </label>
                         
            </div>
     
    <?php } // end whileloop ?>
                                  
                                                                                         
                 
                 
              <p>&nbsp;</p>
              </div>
                 
              <p class="center col-md-3">
    <button type="submit" class="btn btn-primary">Remove Subject(s)</button>
              </p> 
                 
              <p>&nbsp;</p>
              </div>
</form>
               	
                     
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

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
   
 <?php include('includes/footer.php'); ?>