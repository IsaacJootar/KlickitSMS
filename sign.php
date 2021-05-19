<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
   
 
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
                  </div>
 
 
            <div class="alert alert-info" align="center">
           PRINCAPAL'S SIGNATURE UPLOAD
                </div>
                <a href="400js419pxysadmin.php.php">Back </a>
   <h3 align="center">Principal's signatory capture</h3>
            
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
               
                
 <td>&nbsp;</td>
 <td><form enctype="multipart/form-data" method="post" action="sign_exe.php">
  
  <input type="file" name="uploaded_file" id="vpb_fullname"  required="required" style="width:600%" /><br clear="all" />
  <input type="submit" value="upload file" />
</form>
                        </td>
                    <p>&nbsp;</p>
                    

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