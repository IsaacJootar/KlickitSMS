<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>

            
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
                  
                    <a href="subject_to_staff.php">Back</a>
                    
                    </p> 
                  
            <div class="alert alert-info">
               Assign Subject(s) to Teacher
            </div>
              <b><input type="checkbox" id="checkAll" /> Select all</b>
                <script type="text/javascript">
$("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>
            <form class="form-horizontal" action="subject_to_staff_exe.php" method="post">
              <div align="left">
               <h5 align="center">  check appropriately to assign subject(s) to teacher</h5><p>
               <?php
               global $database;
			    @$staff_id=$_POST['cat'];
				@$class_name=$_POST['subcat'];
				$_SESSION['staff_id']=$staff_id;
				$_SESSION['class_name']=$class_name;
               $qry=$database->query("SELECT id, `firstname`, `lastname` FROM `staff` WHERE `id`='{$staff_id}'");
			   $qry=$database->fetch_array($qry);
			   ?>
              <h5 align="left">  Staff Name: <?php echo strtoupper($qry['firstname']). " " .strtoupper( $qry['lastname']); ?></h5><p>  
               <h5 align="left">  Class Name: <?php echo strtoupper($class_name); ?></h5><p>  
         
        
        
	<?php
	 $qry=$database->query("SELECT id, subject_name FROM `subject_class` WHERE `class_name`= '{$class_name}'" );
$qno=0;
while($values=$database->fetch_array($qry)){
		
?>
			<div>
                <label>
               
                         <?php echo  $values['subject_name']; ?>
                         <input name="qst[]" type="checkbox" id="checkAll"  value="<?php echo $values['subject_name'];?>" type="checkbox"/> 
						 
                      
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