<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/accountschoolFees.php'); ?>


           
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
                     
                 <div class="alert alert-info" align="center">
               <h4>REMOVE STAFF FROM PAYROLL</h4></div>
                                 
                 <div align="left"><a href="acc_payroll.php" title="Click here to go back " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' '.  ' '. ' ' ;   ?>
                 </div>
                 <form method="post" action="acc_pr_remove_staff_exe.php">
                   </br>
 
             
                      
                                        
                  <strong><td>Select staff Name </td>
                  </strong>
                  <p></br>
                    <?php
                        $quer="SELECT * FROM `staff` order by id"; 
echo "<select name='staff_id' requir data-rel='chosen' required title='please select a staff name' ><option value=''></option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[username]'>$noticia[fullname]</option>";
}
echo "</select>";

                       
		?>  
                  </p>
                  <p>&nbsp;</p>
                  <p class="center col-md-5">
                    <button type="submit" class="btn btn-primary">Remove Staff</button>
                        
                   </p>
</form>                                    
                        
    
            
                 
      
                 
                
                 
        
                
           
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
</div>

    <!-- Ad, you can remove it -->
   
 <?php include('includes/footer.php'); ?>