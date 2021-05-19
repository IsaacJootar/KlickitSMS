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
                    <a href="time_table.php">back</a>
                    </p> 
            
             
            <div class="alert alert-info">
               Create School Time Table
            
               
                    
                </div>
            <form class="form-horizontal" action="create_time_table_exe.php" method="post">
              <div align="left">
                <p>&nbsp;</p>
                <p>&nbsp;</p>    
              </div>
              <div align="left">
                <p align="center"><strong> Section a section 
                  </strong>
                  <?php
                       $quer="SELECT DISTINCT id, sec_name FROM `section` order by id"; 
echo "<select title='Select a section'  name='section_id'  data-rel='chosen' required ='required'><option value=''></option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[sec_name]</option>";
}
echo "</select>"; 
                       
		?> <p align="center"><strong> Select Day 
                  </strong>
<select title="select the day you wish to set up" name="day"  id="selectError2" data-rel="chosen"  required>
  <option value=""></option>
  <option>Monday</option>
  <option>Tuesday</option>
  <option>Wednesday</option>
  <option>Thursday</option>
  <option>Friday</option>
</select>


                 
                <p align="center"><strong>Time Range: Starts </strong>
                  <input type="time" name="starts"  placeholder="9:55 Am" required>
                  <strong>Ends</strong>
                  <input type="time" name="ends"  placeholder="11:00 Am" required>
                   <strong>Ends</strong>
                
                   <p align="center"><strong> Select  Activity
                  </strong>
                  <?php
                       $quer="SELECT `activity` FROM `time_table_activity` order by `id` asc"; 
echo "<select title='Select Activity'  name='activity'  data-rel='chosen' required ='required'><option value=''></option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[activity]'>$noticia[activity]</option>";
}
echo "</select>";
                       
    ?>
                <p>&nbsp;</p>
              </div>
              <p class="center col-md-3">
    <button type="submit" class="btn btn-primary">Save setup</button>
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