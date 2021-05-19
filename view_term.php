<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/term_manager.php'); ?>

            
            <div class="box-content row">
                
                 
               <div class="control-group">
                   

                     <div class="alert alert-info" align="center">
               <h4>View Term</h4>
            </div>                 
                        <p>
                      <table width="92%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>

        
           <th><div align="left" style="color:#57B7E2">Session</div></th>
            <th><div align="left" style="color:#57B7E2">Term Definition</div></th>
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
         
        <td class="center">
       
            <?php 
	
		
	switch($term->status)
{
	case 'Passd Term': 
	echo "<span class='label-alert label label-default'>Passed Term</span>";
	break;
	case 'Current Term':
	echo "<span class='label-success label label-default'>Current Term</span>";
	break;
}
	
    ?>
        </td>
        
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