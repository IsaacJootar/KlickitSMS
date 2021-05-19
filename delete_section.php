<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/section_manager.php'); ?>



        <div id="content" class="col-lg-13 col-sm-13">
            <!-- content starts -->
           
<div class=" row"></div>

<div class="row">
    <div class="box col-md-17">
        <div class="box-inner">
        
            
            <div class="box-content row">
                
                 
               <div class="control-group">
                   
 <div align="center">
                  <p>
                    <?php
					if ((output_message($message))){
               echo   '<div class="alert alert-success">';
                   echo ' <button type="button" class="close" data-dismiss="alert">&times;</button>';
                   
                   echo output_message($message); 
               echo ' </div>';
				 unset ($message);
				 }
			  ?>
                  <?php echo $session->display_error(); ?>         </p>
               
                  <div class="alert alert-info" align="center">
                    <h4> Delete School Sections</h4>
          </div>                 
                        <p align="center">  <a href="create_section.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Create School Section</a>
                                 
                 <a href="section.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> View School Section</a>                        
                        <p align="center"></br>
                 <table width="92%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>

        
           <th><div align="left" style="color:#57B7E2">Section Name</div></th>
            <th><div align="left" style="color:#57B7E2">Section Code</div></th>
             <th><div align="left" style="color:#57B7E2">Section  Range</div></th>
          <th><div align="left" style="color:#57B7E2">Action</div></th>
              
    </tr>
    </thead>
   <tbody>
    <tr>
    <?php
      $section = sectionManager::find_by_sql("SELECT *  FROM `section`");
foreach($section as $sec) { ?>
         
        <td class="center"><?php echo $sec->sec_name ;  ?> </td>
         <td class="center"><?php echo $sec->code ;  ?> </td>
             <td class="center"><?php echo $sec->rangee ;  ?> </td>  
        <td class="center">	<?php //while wud anyone want to delete a session?  "<a href=\"delete_section_exe.php?id=".urlencode(($sec->id))."\"> Delete</a>" ?> </td>
        
    </tr>
    <?php }?>
    </tbody>
    </table>
                              
                     
                  
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