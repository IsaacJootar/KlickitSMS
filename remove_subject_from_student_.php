<?php include('includes/header.php'); ?>
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
                  
                    <a href="subject_to_student_.php">Back</a>
                    
                    </p> 
                     
                 
             <div class="well col-md-12 center login-box">
             
            <div class="alert alert-info">
               Remove Subject(s) from Student
            </div>
             <b><input type="checkbox" id="checkAll" /> Select all</b>
                <script type="text/javascript">
$("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>
            <form class="form-horizontal" 
            action="remove_subject_from_student_s_exe.php" method="post">
              <div align="left">
               <h5 align="center">  check appropriately to remove subject(s) from this student</h5><p>
              
             <?php
               global $database;
			   if(isset($_POST['subcat'])){
				   $_SESSION['class_name']=$_POST['subcat'];
				   }
				  
				 if(isset($_GET['class_name'])){
				   $_SESSION['class_name']=$_GET['class_name'];
				   }
			   ?> 
               <h5 align="left">  Selected Class: <?php echo strtoupper($_SESSION['class_name']); ?></h5><p>  
         
         <?php
			
                       $quer="SELECT student_id, `class_name`, fullname FROM `student_class` WHERE  `class_name`= '{$_SESSION['class_name']}' 
                       AND `account_status`=1  order by trim(fullname) asc"; 
echo "<select name='student'  data-rel='chosen' required ='required'><option value=''>Select a student/search for name of student......</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[student_id]'>$noticia[fullname]</option>";

}
echo "</select>";
       ?>
         <h5 align="center"; style="color:#000"> If no subjects are available, assign the subjects to the class first, so also for students.</h5><p>
       <?php
	global $database;
	 $qry=$database->query("SELECT id, subject_name FROM `subject_class` WHERE `class_name`='{$_SESSION['class_name']}'  ORDER BY  `id` desc " );
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
                <input type="checkbox" name="score_sheet"><i> Remove from master score sheet</i>
    <button type="submit" class="btn btn-primary">Remove Subject(s)</button>
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