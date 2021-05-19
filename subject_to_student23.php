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
                  
                    <a href="subject_to_student.php">Back</a>
                    
                    </p> 
                     
                 
             <div class="well col-md-12 center login-box">
             
            <div class="alert alert-info">
               Assign Subject(s) to Student
            </div>
             <b><input type="checkbox" id="checkAll" /> Select all</b>
                <script type="text/javascript">
$("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>
            <form class="form-horizontal" action="subject_to_student_exe.php" method="post">
              <div align="left">
               <h5 align="center">  check appropriately to assign subject to student(s)</h5><p>
              
             <?php
               global $database;
			   if(isset($_POST['subcat'])){
				   $_SESSION['class_name']=$_POST['subcat'];
				   }
				  
				 if(isset($_GET['class_name'])){
				   $_SESSION['class_name']=$_GET['class_name'];
				   }
			   ?> 
               <h5 align="left">  Selected Class: <?php echo $_SESSION['class_name']); ?></h5><p>  
         
         <?php
			
                       $quer="SELECT `subject_name` FROM `subject_class`
                        WHERE  `class_name`= '{$_SESSION['class_name']}'
                        order by `subject_name` asc"; 
echo "<select name='subject_name'  data-rel='chosen' required ='required'><option value=''>select a subject</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[subject_name]'>$noticia[subject_name]</option>";



}
echo "</select>";
       ?>
         <h5 align="left"> If a student does not appear below assign the student to this class first</h5><p>
       <?php
	global $database;
	 $qry=$database->query("SELECT `id`, `student_id`,  fullname FROM `student_class` WHERE `class_name`='{$_SESSION['class_name']}'  ORDER BY trim(fullname) ASC" );
$qno=0;
while($values=$database->fetch_array($qry)){	
?>
			<div>
                <label>
                         <?php echo $values['fullname']; ?>
                         <input name="qst[]" type="checkbox" id="checkAll" value="<?php echo $values['student_id'];?>" type="checkbox"/> 
						 
                      
                       </label>
                         
            </div>
     
    <?php } // end whileloop ?>
                                  
                                                                                         
                 
                 
              <p>&nbsp;</p>
              </div>
                 
              <p class="center col-md-3">
    <button type="submit" class="btn btn-primary">Assign Subject</button>
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