<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/asses_manager.php'); ?>
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
                    <a href="asses.php">Back</a>
                    </p> 
                 
       
             
            <div class="alert alert-info">
               Create New Asssesment Format
          </div>
          
            <form class="form-horizontal" action="create_asses_exe.php" method="post">
              <div align="left">
                <p>&nbsp;</p>
                <p>&nbsp;</p>    
              </div>
              <div align="left">
          
                  </strong>
                  <p align="center">
                    <?php
                       $quer="SELECT id, sec_name FROM `section` order by id"; 
echo "<select name='sec'  data-rel='chosen' required><option value=''>Select Section</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[sec_name]</option>";
}
echo "</select>";
                       
		?>
                    Number  of CA
                    <select name='ca_num'  data-rel='chosen' required>
                      <option value=''>Select....</option>
                      <option value="1"> 1</option>
                      <option value="2">2 </option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6 </option>
                    </select>
                  </p>
                  <p>&nbsp;</p>
                  <p align="center">
                    Total CA score
                    <input type="number" name="ca_score" title="enter CA total score" placeholder="E.G 30" required>
                    </p>
                  <p>&nbsp;</p>
                  <p align="center">Total Exams score</strong>
                    <input type="number" name="exam_score"  title="enter exam total score" placeholder="E.g 70" required>
                  </p>
                  </p>
                  <p>&nbsp;</p>
              </div>
              <p class="center col-md-3">
    <button type="submit" class="btn btn-primary">Save Format</button>
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

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
   
 <?php include('includes/footer.php'); ?>