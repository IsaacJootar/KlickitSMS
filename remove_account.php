<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>

            
            <div class="box-content row">
                
                 
               <div class="control-group">
                   
		 <div align="center">
                  <?php
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
                     
                    <div class="controls" align="center">
               
            <div class="alert alert-info">
               Remove  staff as account officer
            </div>
            <?php  
						  
			?>
             <form class="form-horizontal" action="remove_account_exe.php" method="post">
              <div align="left">
                   
              </div>
              <div align="center">
               <h5> Select staff name  and remove</h5>
              <p>
               
                  
                  <?php
                  global $database;
				
				  $staff=$database->query("SELECT * FROM `system_accounts` WHERE  `role`= 'Account Officer'");
				  $staff=$database->fetch_array($staff);
				  $staff=$staff['staff_id'];
				 
				  
				 
				  
                       $quer="SELECT id, fullname FROM `staff` WHERE id='{$staff}'"; 
echo "<select name='staff_id' data-rel='chosen' required ='required'><option value=''>Select Staff Name /Search Staff</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[fullname] </option>";
}
echo "</select>";
                       
		?>
        
  
              <p>&nbsp;</p>
              </div>
                 
              <p class="center col-md-2" align="center">
    <button type="submit" class="btn btn-primary">Remove </button>
              </p> 
                 
              <p>&nbsp;</p>
              </div>
</form>
        </div>
        <!--/span-->
    </div><!--/row-->       
                           
                   
           
              </div>
  
                    <p>&nbsp;</p>

              </div>
                

            </div>
          
          
        </div>
    </div>
</div>

<div class="row"><!--/span--><!--/span--><!--/span-->
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
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it --