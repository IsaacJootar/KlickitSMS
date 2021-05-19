<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config2.php'); ?>

      

<div class="row" align="center">
<?php
if ((output_message($message))){
               echo   '<div class="alert alert-success">';
                   echo ' <button type="button" class="close" data-dismiss="alert">&times;</button>';
                   
                   echo output_message($message); 
               echo ' </div>';
				 unset ($message);
				 }
			  ?><a href="300pc419pxystaff.php">Back </a>
                  <?php echo $session->display_error(); ?> 
    
            
          <div class="box-content row">
            
               
                
                 
		    <div class="well col-md-7 center login-box">
            <div class="alert alert-info">
                Please enter your old and new Password.
            </div>
           <div align="right"><img src="images/avatar5.png" width="32" height="32" alt=""></div>
            <form class="form-horizontal" action="f_change_pass_exe.php" method="post">
                <fieldset>
                    <div class="input-group input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="text" required name="old_pass" class="form-control" placeholder="Old Password">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" required name="new_pass" class="form-control" placeholder=" New Password">
                    </div>
                    <div class="clearfix"></div>

                    
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                    
   
                        <button type="submit" class="btn btn-primary">Change</button>
                    </p>
                </fieldset>
            </form>
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