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
            
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                 
                      
                  </div>
 
 
            <div class="alert alert-info" align="center">
          UPLOAD NEWSLETTER TO ALL PARENTS.
              </div>
                    
                  
                  <td style="color:#09C"; align="center"><div style="color:#09C" align="center">Choose newsletter document from computer/drive</div></td>
 

              </div>
              <form enctype="multipart/form-data" method="post" action="newsletter_exe.php">
                <div align="center">
                  <input type="file" name="uploaded_file" id="vpb_fullname"  required="required"/>
                  <br/>
                  <input type="submit" class="btn btn bg-primary"  name="" value="Send now" id="vpb_fullname"  required="required"/>
                </div>
  
            </form>
  
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