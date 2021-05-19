<?php include('includes/header.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('includes/config2.php'); ?>            
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
                     
                    <div class="controls" align="center">
               
                              
                        <div class="well col-md-12 center login-box">
            <div class="alert alert-info">
              <h4> Create Term</h4> 
            </div>
            <?php  
						  
			?>
            <form class="form-horizontal" action="term_exe.php" method="post">
                <fieldset>
                
                 
                       
                  
                      <strong><td>Session </td> 
                    </strong>
                        <?php
                        $quer="SELECT id, session FROM `session_manager` WHERE `status`='Current Session' order by id"; 
echo "<select name='session'  data-rel='chosen' ><option value=''>-------------------</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[session]</option>";
}
echo "</select>";
                       
		?>    
        
          <strong><td>Term Defination</td>
                    </strong>
                        
                    <select name="def"  id="selectError2" data-rel="chosen" >
                              <option value="">------------------</option>
                              
                              
                              <option>First Term</option>
                              <option>Second Term</option>
                               <option>Third Term</option>
                             
                            </select>
                    
                       
                          <strong>
                            <td>Term Code</td>
                    </strong>
                            <select name="code" id="code" data-rel="chosen" >
                              <option value="">-------------</option>
                              <option>1st</option>
                              <option>2nd</option>
                              <option>3rd</option>
                            </select>
                     
                 
                    
                    
                       
                    
                    <p class="center col-md-2">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </p>
                </fieldset>
            </form>
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