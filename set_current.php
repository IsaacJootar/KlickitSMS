<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/session_manager.php'); ?>
            
            <div class="box-content row">
                <div align="center"><?php
					if ((output_message($message))){
               echo   '<div class="alert alert-success">';
                   echo ' <button type="button" class="close" data-dismiss="alert">&times;</button>';
                   
                   echo output_message($message); 
               echo ' </div>';
				 unset ($message);
				 }
			  ?>
                  <?php echo $session->display_error(); ?> 
                 
               <div class="control-group">
                   
            <div class="alert alert-info" align="center">
               <h4>Set Current Session</h4>
            </div>

                    <div class="controls" align="center">
                                           
                        <p>
                      <table width="92%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>

        
           <th><div align="left" style="color:#57B7E2">Session</div></th>
        <th><div align="left" style="color:#57B7E2">Date Of  Creation</div></th>
          <th><div align="left" style="color:#57B7E2">Status</div></th>
          <th><div align="left" style="color:#57B7E2">Action</div></th>
              
    </tr>
    </thead>
   <tbody>
    <tr>
    <?php
    $session = sessionManager::find_by_sql("SELECT * FROM `session_manager` ORDER BY status desc");
foreach($session as $sess) { ?>
         
        <td class="center"><?php echo $sess->session ;  ?> </td>
        
        <td class="center"><?php echo $sess->created_on ?></td>
         
        <td class="center">
        <?php 
	
		
	switch($status=$sess->status)
{
	case 'Old Session': 
	echo "<span class='label-alert label label-default'>Old session</span>";
	break;
	case 'Current Session':
	echo "<span class='label-success label label-default'>Current session</span>";
	break;
}
	
    ?>
      
        </td>
        <td class="center">	<?php echo "<a href=\"set_current_exe.php?id=".urlencode(($sess->id))."\"> Set as current session</a>" ?> </td>
        
    </tr>
    <?php } // end foreach?>
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