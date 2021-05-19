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
                    <a href="remove_form_master.php">Back</a>
                    </p> 
                 
             <div class="well col-md-12 center login-box">
             
            <div class="alert alert-info">
               Remove form master role from teacher
            </div>
            <form class="form-horizontal" action="remove_form_master_exe.php" method="post">
              <div align="left">
               <h5 align="center">  check appropriately to remove this teacher as form master of this class</h5><p>
               <?php
               global $database;
			    @$staff=$_POST['staff_id'];
               $qry=$database->query("SELECT id, fullname FROM `staff` WHERE `id`='{$staff}'");
			   $qry=$database->fetch_array($qry);
			   ?>
              <h5 align="left">  List of  classes already assigned to <?php echo strtoupper($qry['fullname']);?></h5><p>  
         
        
        
	<?php
	
		   $_SESSION['staff_id']=$_POST['staff_id'];
	 $qry=$database->query("SELECT id, class_name FROM `form_master` WHERE `staff_id`= '{$_SESSION['staff_id']}'" );
$qno=0;
while($values=$database->fetch_array($qry)){
	if(empty($values)){echo "empty";}	
?>
			<div>
                <label>
               
                         <?php echo $values['class_name']; ?>
                         <input name="qst[]" type="checkbox"  value="<?php echo $values['class_name'];?>" type="checkbox"/> 
						 
                      
                       </label>
                         
            </div>
     
    <?php } // end whileloop ?>
                                                                                         
                 
                 
              <p>&nbsp;</p>
              </div>
                 
              <p class="center col-md-3">
    <button type="submit" class="btn btn-primary">Remove Teacher</button>
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