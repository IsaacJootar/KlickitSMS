<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
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
                         <a href="results_stat.php"> Back </a>
               
            <div class="alert alert-info">
               MONITOR SCORE ENTRIES
            </div>
            <?php  
						  
			?>
             <form class="form-horizontal" action="monitor_scores_.php" method="post">
              <div align="left">
                   
              </div>
              <div align="center">
               <h5> Select a class and Proceed</h5>
              <p>
               
                  
                  <?php
				  
                       $quer="SELECT * FROM `classes` order by id desc"; 
echo "<select name='cat' data-rel='chosen' required ='required'><option value=''>Select / Search class</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[class_name]'> $noticia[class_name] </option>";
}
echo "</select>";
                       
		?>
        
  
              <p>&nbsp;</p>
              </div>
                 
              <p class="center col-md-2" align="center">
    <button type="submit" class="btn btn-primary"> monitor class</button>
              </p> 
                 
              <p>&nbsp;</p>
              </div>
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