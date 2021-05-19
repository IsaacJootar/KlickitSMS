<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/term_info_manager.php'); ?>
            
            <div class="box-content row">
                
                 
               <div class="control-group">
                    <div align="center">
                  <?php
					if (output_message($message)){
               echo   '<div class="alert alert-success">';
                   echo ' <button type="button" class="close" data-dismiss="alert">&times;</button>';
                   
                   echo output_message($message); 
               echo ' </div>';
				 unset ($message);
				 }
			  ?>
                  <?php echo $session->display_error(); ?>         
                     

                    <div class="controls" align="center">
               
                              
                        <div class="well col-md-10 center login-box">
            <div class="alert alert-info">
               Set Term Information
            </div>
            <div align="center">
            <form class="form-horizontal" action="term_info_exe.php" method="post">
                <fieldset>
                
                  <div class="input-group col-md-4"></br>
                      <div align="left"><strong>Select Session
                        </strong>
                        <?php
                        $quer="SELECT id, session FROM `session_manager` WHERE `status`='Current Session' order by id"; 
echo "<select name='session'  id='selectError2' data-rel='chosen' required ='required'><option value=''>-------------------</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[session]</option>";
}
echo "</select>";
                       
		?>
        
                     <?php
                        $quer="SELECT id, term_code FROM `term` WHERE `status`='Current Term' order by id"; 
echo "<select name='term'  id='selectError2' data-rel='chosen' required ='required'><option value=''>-------------------</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[term_code]</option>";
}
echo "</select>";
                       
		?>
        
            <div class="clearfix"></div><br>
                       
                  <div class="input-group col-md-4">
                      <div align="left"><strong>Next Term Begins
                        </strong>
                        
                        <select name="DAY" required id="selectError2" data-rel="chosen">
                          <option value="">Day---------</option>
                          <?php for( $i =1; $i<32; $i++){?>
                          <option value="<?php echo (($i/10)<1)? "0". $i : $i;?>"> <?php echo (($i/10)<1)?"0".$i:$i?></option>
                          <?php }?>
                        </select>
                        <select name="MONTH" required id="selectError2" data-rel="chosen">
                          <option value="">Month---------</option>
                          <?php for($i=1;$i<13;$i++){?>
                          <option value="<?php echo (($i/10)<1)?"0".$i : $i?>"><?php echo (($i/10)<1)?"0".$i : $i?></option>
                          <?php }?> 
                        </select>
                        <select name="YEAR" required id="selectError2" data-rel="chosen"> 
                          <option value="">Year---------</option>
                          <?php for($i =1900; $i<2032; $i++){?>
                          <option value="<?php echo (($i/10)<1)? "0". $i : $i?>"> <?php echo (($i/10)<1)?"0". $i : $i?></option>
                          <?php } ?>
                        </select>
                        
                        
                    
                         <div class="clearfix"></div><br>
                    
                       
                    
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->       
                           
                    
                
                  
                       </p>
                        <p>&nbsp;                        </p>
                     
                 </div>
           
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