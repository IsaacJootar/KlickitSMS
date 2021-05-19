<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
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
                     
                 <div class="alert alert-info" align="center">
               <h4>FILTER MASTER SCORE SHEET</h4></div>
                                  
                   <a href="results_stat.php"> Back </a>
             <div class="box col-md-12">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Filter to clean up the school score sheet for this term.       </h2>
                   <div class="box-icon"> <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a> <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                 <form action="filter_score_sheet_exe.php" method="post">
                
                 <h5 align="center">  All clases checked will be affected</h5><p>
              
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

                      
         
    
             
        <p class="center col-md-5">
  <button style="float:center" type="submit" name="submit" value="1"   title="clicking this button will  Filter both assessment and exam score sheet for the entire school to remove errors"  data-toggle="tooltip" class="btn btn-primary">Fiter master score sheet now</button>     
                </p>              
                </form>               
                   
                     
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