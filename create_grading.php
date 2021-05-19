<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/grading_manager.php'); ?>
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
                    <a href="grading.php">Back</a>
                    </p> 
            
             
            <div class="alert alert-info">
               Create New Grading Format
            
               
                    
                </div>
            <form class="form-horizontal" action="create_grading_exe.php" method="post">
              <div align="left">
                <p>&nbsp;</p>
                <p>&nbsp;</p>    
              </div>
              <div align="left">
                <p align="center">
                  <?php
                       $quer="SELECT DISTINCT id, sec_name FROM `section` order by id"; 
echo "<select title='Select a section'  name='sec'  class='form-control' required ='required'><option value=''>Section a section </option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[sec_name]</option>";
}
echo "</select>";
                       
		?>
                 
<select title="select the grade you wish to configure" name="grade"  id="selectError2" class='form-control'  required>
  <option value="">select a grade</option>
  <option>F</option>
<option>E</option>
  <option>D</option>
  <option>C+</option>
  <option>C</option>
  <option>B+</option>
  <option>B</option>
  <option>A+</option>
  <option>A</option>
  <option>F9</option>
  <option>E8</option>
  <option>D7</option>
  <option>C6</option>
  <option>C5</option>
  <option>C4</option>
  <option>B3</option>
  <option>B2</option>
  <option>A1</option>
</select>
                
   <div class="input-group col-md-4"> <span class="input-group-addon">Grade Remark</span>
                      <input type="text" name="desc"  value="" placeholder="e.g Very Good" required class="form-control"/>
                    </div></br>

<div class="input-group col-md-4"> <span class="input-group-addon">Score Range: Starts</span>
                      <input type="text" name="starts"  value="" placeholder="0" required class="form-control"/>
                    </div></br>
<div class="input-group col-md-4"> <span class="input-group-addon">Score Range: ends</span>
                      <input type="text" name="ends"  value="" placeholder="39" required class="form-control"/>
                    </div></br>
                  
               
                
                <p>&nbsp;</p>
              </div>
              <p class="center col-md-3">
    <button type="submit" class="btn btn-primary">Save Format</button>
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