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
                     
                   

                    <div class="alert alert-info" align="center">
               <h4>Delete Term Information</h4>
            </div>                  
                        <p>
                       <table width="92%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>

        
           <th><div align="left" style="color:#57B7E2">Session</div></th>
                  <th><div align="left" style="color:#57B7E2">Term</div></th>
            <th><div align="left" style="color:#57B7E2">next_term_starts</div></th>
          <th><div align="left" style="color:#57B7E2">Action</div></th>
              
    </tr>
    </thead>
   <tbody>
    <tr>
    <?php
    $session = termInforManager::find_by_sql("SELECT * FROM `term_infor`");
foreach($session as $term) { ?>
         
        <td class="center"><?php echo $term->sess_id ;  ?> </td>
         <td class="center"><?php echo $term->term_id ;  ?> </td>
             <td class="center"><?php echo $term->next_term_starts;  ?> </td>
         
          <td class="center">	<?php echo "<a href=\"delete_info_exe.php?id=".urlencode(($term->id))."\"> Delete</a>" ?> </td>
        
    </tr>
    <?php }?>
    </tbody>
    </table>
       
              </div>
                 </div>
           
              </div>
  
                    <p>&nbsp;</p>

 <p>&nbsp;</p>
               
                

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