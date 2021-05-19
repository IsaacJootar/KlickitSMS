<?php include('includes/header.php'); ?>
<?php require_once('classes/session.php'); ?> 
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/subject_manager.php'); ?>

            
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
                    <a href="class.php">Back</a>
                    </p> 
                 
             <div class="well col-md-12 center login-box">
             
            <div class="alert alert-info">
               Assign Subjects To Classes
            
               
                    
                </div>
                <b><input type="checkbox" id="checkAll" /> Select all</b>
                <script type="text/javascript">
$("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>
            <form class="form-horizontal" action="subject_classes_exe.php" method="post">
             
              <div align="left">
               <h5> Selct a class and Tick appropriately to assign subjects to the class class</h5>
              <p>
                <p><strong> Select A Class 
                  </strong>
                  
                  <?php
                       $quer="SELECT id, class_name FROM `classes` order by id"; 
echo "<select name='class'  data-rel='chosen' required ='required'><option value=''>Select</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[class_name]'>$noticia[class_name]</option>";
}
echo "</select>";
                       
		?>
        
        
	<?php
	global $database;
	 $qry=$database->query("SELECT id, subject_name FROM `subjects`" );
$qno=0;
while($values=$database->fetch_array($qry)){	
?>
			
    <div class="row">
        <div class="col-md-4">
			
                <label>
                         <?php echo $values['subject_name']; ?>
                        <span> <input name="qst[]" type="checkbox" id="checkAll" value="<?php echo $values['subject_name'];?>"/>				 							
                       </label>
                         
            </div>
            </div>
     
    <?php } // end whileloop ?>
                                                                                         
                 
                 
              <p>&nbsp;</p>
              </div>
                 
              <p class="center col-md-3">
    <button type="submit" class="btn btn-primary">Assign </button>
              </p> 
                 
              <p>&nbsp;</p>
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