<?php include('includes/f_header.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
            
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
                  
                    <a href="f_my_students.php">Back</a>
                    
                    </p> 
                     
            
             
            <div class="alert alert-info">
              ASSIGN SUBJECT(S) TO STUDENTS
            </div>
             <b><input type="checkbox" id="checkAll" /> Select all</b>
                <script type="text/javascript">
$("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>
            <form class="form-horizontal" action="f_subject_to_student_exe.php" method="post">
              <div align="left">
               <h5 align="center">  check appropriately to assign subject(s) to this student</h5><p>
              
             
               <h5 align="left">  DEFAULT CLASS: <?php echo $myclass; ?></h5><p>  
         
         <?php
			
                       $quer="SELECT student_id, `class_name`, fullname FROM `student_class` WHERE  `class_name`= '{$myclass}' AND `account_status` = 1  order by trim(fullname) asc"; 
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
	 $qry=$database->query("SELECT id, subject_name FROM `subject_class` WHERE `class_name`='{$myclass}'  ORDER BY  `id` desc " );
$qno=0;
while($values=$database->fetch_array($qry)){	
?>
               <div>
                <label>
                         <?php echo $values['subject_name']; ?>
                         <input name="qst[]" type="checkbox" id="checkAll" value="<?php echo $values['subject_name'];?>" type="checkbox"/> 
						 
                      
                       </label>
                         
            </div>
     
    <?php } // end whileloop ?>
                                  
                                                                                         
                 
                 
              <p>&nbsp;</p>
              </div>
                 
              <p class="center col-md-3">
    <button type="submit" class="btn btn-primary">Assign Subject(s)</button>
              </p> 
                 
              <p>&nbsp;</p>
              </div>
</form>
               	
                
                  
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