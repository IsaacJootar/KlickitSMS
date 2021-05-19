<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/term_manager.php'); ?>


        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
           
<div class=" row"></div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
                <h2 align="justify"><i class="glyphicon glyphicon-check"></i> CLickit School Management Software.  Version 1.0</h2>
        </div>
            
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
               <h4>Delete Term</h4>
            </div>                  
                        <p>
                       <table width="92%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>

        
          <th><div align="left" style="color:#57B7E2">Session</div></th>
            <th><div align="left" style="color:#57B7E2">Term Defination</div></th>
             <th><div align="left" style="color:#57B7E2">Term Code</div></th>
        <th><div align="left" style="color:#57B7E2">Date Of  Creation</div></th>
          <th><div align="left" style="color:#57B7E2">Status</div></th>
              
    </tr>
    </thead>
   <tbody>
    <tr>
    <?php
    $termm = termManager::find_by_sql("SELECT * FROM `term`");
foreach($termm as $term) { ?>
         
        <td class="center"><?php echo $term->sess_id ;  ?> </td>
         <td class="center"><?php echo $term->term_def ;  ?> </td>
             <td class="center"><?php echo $term->term_code ;  ?> </td>
        
        <td class="center"><?php echo $term->created_on ?></td>
         
         
          <td class="center">	<?php echo "<a href=\"delete_term_exe.php?id=".urlencode(($term->id))."\"> Delete</a>" ?> </td>
        
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