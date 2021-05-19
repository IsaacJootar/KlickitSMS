<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/term_info_manager.php'); ?>

     
            
            <div class="box-content row">
                
                 
               <div class="control-group">
                   

                     <div class="alert alert-info" align="center">
               <h4>View Term Infor</h4>
            </div>                 
                        <p>
                      <table width="92%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>

        
           <th><div align="left" style="color:#57B7E2">Session</div></th>
            <th><div align="left" style="color:#57B7E2">Term Starts</div></th>
             <th><div align="left" style="color:#57B7E2">Term Ends</div></th>
        <th><div align="left" style="color:#57B7E2">Date Of  Creation</div></th>
          <th><div align="left" style="color:#57B7E2">Status</div></th>
              
    </tr>
    </thead>
   <tbody>
    <tr>
    <?php
    $session = termInforManager::find_by_sql("SELECT * FROM `term_infor` ORDER by id desc");
foreach($session as $term) { ?>
         
        <td class="center"><?php echo $term->sess_id ;  ?> </td>
         <td class="center"><?php echo $term->starts ;  ?> </td>
             <td class="center"><?php echo $term->ends ;  ?> </td>
        
        <td class="center"><?php echo $term->created_on ?></td>
         
        <td class="center">
            <span class="label-success label label-default">Active</span>
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