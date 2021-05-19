<?php include('includes/header.php'); ?>
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
                    <a href="class.php">Back</a>
                    </p>
             
            <div class="alert alert-info">
               Remove Subject(s) From Classes
            </div>
            <form class="form-horizontal" action="remove_subj_from_class_exe.php" method="post">
              <div align="left">
               <h5 align="center">  check the subjects appropriately to remove subjects from classes</h5><p>
 <?php @$class=$_POST['class'];?>
                <h4 align="center">  Slected Class: <?php echo @$class; ?></h4>
              <p>
              <h5 align="left">  List of  subjects already assigned to <?php echo  $class ;?></h5><p>  
         
        
        
	<?php
	
	@$class=$_POST['class'];
	$_SESSION['class']=$class;
	global $database;
	 $qry=$database->query("SELECT id, subject_name FROM `subject_class` WHERE `class_name`= '{$class}'" );
$qno=0;
while($values=$database->fetch_array($qry)){
?>
			<div>
                <label>
               
                         <?php echo $values['subject_name']; ?>
                         <input name="qst[]" type="checkbox"  value="<?php echo $values['subject_name'];?>" type="checkbox"/> 
						 
                      
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