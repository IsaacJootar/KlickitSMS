<?php include('includes/header.php'); ?>
<?php  require_once('classes/session.php'); ?>
<?php  require_once('classes/functions.php'); ?>
<?php  require_once('includes/config.php'); ?>
<?php  require_once('includes/config2.php'); ?>
 <?php  require_once('classes/staff_manager.php'); ?>
     
            
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
                    <a href="manage_roles.php">Back</a>
                    </p> 
             
            <div class="alert alert-info">
               Assign Form Master Role To a Teacher 
            
               
                    
                </div>
                
            <form class="form-horizontal" action="assign_form_master_exe.php" method="post">
              <div align="center">
                   
              </div>
              <div align="center">
               <h5>Tick appropriately to assign formaster to a class</h5> <b style="color:#F00">
               
               Do not assign one staff as form master in more than one class!</b>
              <p>
                <p><strong> Select a Staff
                  </strong>
                  
                  <?php
				  
                       $quer="SELECT id, fullname FROM `staff` order by id"; 
echo "<select name='staff_id'  data-rel='chosen' required ='required'><option value=''>Select Staff Name /Search Staff</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[fullname] </option>";
}
echo "</select>"; 
	echo '</p>';
                       
		?>
       
        
	<?php
	global $database;
	 $qry=$database->query("SELECT *  FROM `classes`" );
$qno=0;
while($values=$database->fetch_array($qry)){	
?>
			<div>
                <label>
                         <?php echo $values['class_name']; ?>
                         <input name="qst[]" type="radio"  value="<?php echo $values['class_name'];?>" type="checkbox"/> 
						 
                      
                       </label>
                         
            </div>
     
    <?php } // end whileloop ?>
                                                                                         
                 
                 
              <p>&nbsp;</p>
              </div>
                 
              <p class="center col-md-3">
    <button type="submit" class="btn btn-primary">Assign</button>
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