<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/comments_manager.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('includes/config2.php'); ?>

            
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
                    <a href="result_comments.php">Back</a>
                    </p> 
            
             
            <div class="alert alert-info">
               Create New Commenting Format
            
               
                    
                </div>
            <form class="form-horizontal" action="create_comments_exe.php" method="post">
              <div align="left">
                <p align="center"><strong>Section a section </strong>
                  <?php
                       $quer="SELECT DISTINCT id, sec_name FROM `section` order by id"; 
echo "<select title='Select a section'  name='sec'  data-rel='chosen' required ='required'><option value=''></option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[sec_name]</option>";
}
echo "</select>";
                       
    ?>
                  <strong>Average Score Range: From </strong>
                  <input type="text" name="starts" size="4" placeholder="0" required>
                  <strong>To</strong>
                  <input type="text" name="ends" size="4" placeholder="39" required>
                </p>
                <p>&nbsp;</p>
                <div align="center"><strong>Formaster's Comment </strong>
                  <input type="text" name="f_comment" size="45" title="Enter Overall Remark" required placeholder="e.g An excellent result">
                  <strong>Principal's Comment </strong>
                  <input type="text" size="45" name="p_comment" title="Enter Overall Remark" required placeholder="e.g An excellent result">
                </div>
              </div>
              <div align="left">
                <p>&nbsp;</p>
                <p>&nbsp;</p>
              </div>
              <p class="center col-md-3">
    <button type="submit" class="btn btn-primary">
    <div align="center">Save Format</div>
    </button>
              </p> 
                 
              <p>&nbsp;</p>
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