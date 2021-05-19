<?php include('includes/header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config2.php'); ?>
            
          <div class="box-content row">
            
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
              <a aligh='center' href="400js419pxysadmin.php.php">Back </a>
              <?php echo $session->display_error(); ?>      
              
              
            </div>
            <div class="well col-md-7 center login-box">
              <div class="alert alert-info">
                Please enter your old and new Password.
            </div>
           <div align="right"><img src="images/avatar5.png" width="32" height="32" alt=""></div>
            <form class="form-horizontal" action="change_pass_exe.php" method="post">
                   <fieldset>
                 
                       
                      <p>
                        <input type="password" placeholder="Enter old password"  name="old_pass" class="password">
                        </br></p>
                      <p>
                        <input type="password" placeholder="Enter new password" name="new_pass" class="password">
                        <br>
                        <input type="checkbox"  id="showHide"> <i>Reveal password</i>
                   
                      </p>
                    <div class="clearfix"></div>

                    
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                    
   
                        <button type="submit" class="btn btn-primary">Change</button>
                    </p>
              </fieldset>
            </form>
            <script type="text/javascript">
 $(document).ready(function () {
 $("#showHide").click(function () {
 if ($(".password").attr("type")=="password") {
 $(".password").attr("type", "text");
 }
 else{
 $(".password").attr("type", "password");
 }
 
 });
 });
</script>
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