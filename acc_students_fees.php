<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>




       
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
                      <a href="acc_manage_payments.php" title="Click here to go back to previous page " data-toggle="tooltip">   Back</a> <?php echo ' '. ' ' ;   ?>
                    <div class="controls" align="center">
               
            <div class="alert alert-info">
               MANAGE STUDENT'S PAYMENTS DETAILS</div>
            <?php  
						  
			?>
             <form class="form-horizontal" action="acc_students_fees2.php" name="class_name" method="post">
              <div align="left">
                   
              </div>
              <div align="center">
               <h5> Select a Class To Proceed</h5>
              <p>
               
                  
                  <?php
				  
                       $quer="SELECT * FROM `classes` order by id"; 
echo "<select name='class' data-rel='chosen' required ='required'><option value=''>Select Class......</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[class_name]'>$noticia[class_name] </option>";
}
echo "</select>";
                       
		?>
        
  
              <p>&nbsp;</p>
              </div>
                 
              <p class="center col-md-2" align="center">
    <button type="submit" class="btn btn-primary">Proceed</button>
              </p> 
                 
              <p>&nbsp;</p>
             </form>
             <?php 
						
						
						
						if(isset($_POST['submit'])){
						 $_SESSION['class']=$_POST['class'];
						 
						}
						?>
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