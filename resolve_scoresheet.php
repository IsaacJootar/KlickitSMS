<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config2.php');?>
            
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
                      <p class="center col-md-1" align="right">
                    <a href="results_stat.php">Back</a>
                    </p> 
                    <div class="controls" align="center">
               
                              
                       
                        
            <div class="alert alert-info">
         RESOLVE ABNORMALTIES IN MASTER SCORE SHEET
            </div>
            
             
              
              <div align="center">
              
               
<form class="form-horizontal" action="resolve_scoresheet_exe.php" method="post">
              <div align="left">
                   
              </div>
              <div align="center">
               
              
               
                  <h5 align="center">  All classes will be resolved</h5><p>
              
                 <table width="575" height="136" align="center">
                  <tr>
                     <?php  $sql=$database->query("SELECT `class_name` FROM `classes` ");
        while($get_classes=$database->fetch_array($sql)){

?>                    
           <input name="subject_name[]" disabled="disabled" type="checkbox" checked />
             
                <?php echo $get_classes['class_name']; ?>
             <?php } // end while loop for classes?>
                </tr>
                 </table>

               
        
  
              <p>&nbsp;</p>
              </div>
                 
              <p class="center col-md-2" align="center">
    <button type="submit" class="btn btn-primary"> find & resolve abnormalities now</button>
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