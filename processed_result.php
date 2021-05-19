<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/term_manager.php'); ?>
<?php require_once('classes/session_manager.php'); ?>

            
            <div class="box-content row">
                
                 
               <div class="control-group">
                   

                     <div class="alert alert-info" align="center">
               <h4>View Result Processed Count</h4>
            </div>                 
                        <p>
                      <table align="center" width="92%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>

        
           <th><div align="left" style="color:#57B7E2">Session</div></th>
            <th><div align="left" style="color:#57B7E2">Term Definition</div></th>
             <th><div align="left" style="color:#57B7E2">Term Code</div></th>
          <th><div align="left" style="color:#57B7E2">Term Status</div></th>
          <th><div align="left" style="color:#57B7E2">Number of results processed</div></th>
              
    </tr>
    </thead>
   <tbody>
    <tr>
    <?php
    $termm = termManager::find_by_sql("SELECT * FROM `term`");
foreach($termm as $term) {
          $sess = sessionManager::find_by_id($term->sess_id);
          ?>
        <td class="center"><?php echo  $sess->session;  ?> </td>
         <td class="center"><?php echo $term->term_def ;  ?> </td>
             <td class="center"><?php echo $term->term_code ;  ?> </td>
        <td class="center">
       
            <?php 
	
		
	switch($term->status)
{
	case 'Passed Term': 
	echo "<span class='label-alert label label-default'>Passed Term</span>";
	break;
	case 'Current Term':
	echo "<span class='label-success label label-default'>Current Term</span>";
	break;
}
	
    ?>
        </td>
        <?php 

// get number of results released//
        global $database;
        $query=$database->query("SELECT DISTINCT `student_id` FROM `score_entry` 
          WHERE `session_id` ='{$term->sess_id}' AND `term_id`='{$term->id}'");
        $count=$database->num_rows($query);
        ?>
         <td class="center"><?php echo $count ?></td>
         
    </tr>
    <?php }?>
    </tbody>
    </table>
                              
                              
                     
                  
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
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
   
 <?php include('includes/footer.php'); ?>