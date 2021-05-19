<?php include('includes/header.php'); ?>
<?php require_once('classes/session.php'); ?> 
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/class_manager.php'); ?>

            
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
            Set Graduating Classes
            
               
                    
                </div>
                <b><input type="checkbox" id="checkAll" /> Select all</b>
                <script type="text/javascript">
$("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>
            <form class="form-horizontal" action="set_graduating_classes_exe.php" method="post">
             
              <div align="left">
               <h5> Tick appropriately to set classes as graduating classes</h5>
        
	<?php
	global $database;
	 $qry=$database->query("SELECT id, class_name FROM `classes`" );
$qno=0;
while($values=$database->fetch_array($qry)){	
?>
			
    <div class="row">
        <div class="col-md-4">
			
                <label>
                         <?php echo $values['class_name']; ?>
                        <span> <input name="qst[]" type="checkbox" id="checkAll" value="<?php echo $values['class_name'];?>"/>				 							
                       </label>
                         
            </div>
            </div>
     
    <?php } // end whileloop ?>
                                                                                         
                 
                 
              <p>&nbsp;</p>
              </div>
                 
              <p class="center col-md-3">
    <button type="submit" class="btn btn-primary">Set Classes</button>
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