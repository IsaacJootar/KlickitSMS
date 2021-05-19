<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>
    
            
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
               <h4>MANAGE RESULTS</h4>
            </div>                 
                        <p align="center">  <a href="release.php" title="Click here to release students results." data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-list-alt"></i>  Release Results</a>
                                 
                                 <p align="center">  <a href="unrelease_results.php" title="Click here to release students results." data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-list-alt"></i>  Withold Results</a>
                                 
                          
                                 
                                <a href="close_score_entry.php" title="Close Entries of  Scores " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-list-alt"></i> Close Score Entries</a>
                                 
                                 
                                 
                                 <a href="vet1.php"  title="Click here to vet on students results" data-toggle="tooltip"  class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-list-alt"></i> Vet Result</a>
                                 
                                  <p align="center">  <a href="generate_results.php" title="Click here to generate students results per class" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-print"></i>  Generate student Results(bulk)</a>
                                
                                  <p align="center">  <a href="generate_single_result.php" title="Click here to generate students results per class" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-print"></i>  Generate student Results(single)</a>
                                 <p align="center">  <a href="generate_cumulatiive_results.php" title="Click here to generate students cumulation results per class" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-print"></i>  Generate student's Cumulative Results(bulk)</a>
                                     <p align="center">  <a href="generate_single_result_cumulative.php" title="Click here to generate students cumulation results per class" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-print"></i>  Generate student's Cumulative Results(Single)</a>
                                 
                                

                                <p align="center">  <a href="result_release_count.php" title="Click here view the counts of results releases" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-search"></i>  Released Results</a>
                                  <p align="center">  
                                <a href="processed_result.php" title="Click here view the counts of results releases" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-search"></i>  Processed Results</a>
                                
                                       <a href="monitor_scores.php" title="Click here view and monitor score entry in real time" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-search"></i>  Monitor score entry</a>

                                <p align="center">  <a href="filter_score_sheet.php" title="Click here to filter from master score sheet" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-trash"></i>  fiter score sheet</a>
                                 
                                   <p align="center">  <a href="resolve_scoresheet.php" title="Click here to resolve abnormalities in masterscoresheet" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-search"></i> Resolve score sheet abnormalities</a>
                                 


                                 
               <p align="center">  <a href="delete_from_master_score_sheet.php" title="Click here to delete from master score sheet" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-trash"></i>  Delete from master score sheet</a>
                                 
               
                        <p align="center"></br>
                 
                              
                     
                  
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