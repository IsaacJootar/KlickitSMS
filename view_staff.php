<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/staff_manager.php'); ?>

            
            <div class="box-content row">
                
                 
               <div class="control-group">
                   

                     <div class="alert alert-info" align="center">
               <h4>View Term</h4>
            </div>                 
                        <p>
         <table width="422%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
           <th width="300"><div align="left" style="color:#57B7E2">First Name</div></th>
        <th  width="300"><div align="left" style="color:#57B7E2">Other Name</div></th>
          <th  width="300"><div align="left" style="color:#57B7E2">Last Name</div></th>
           <th  width="300"><div align="left" style="color:#57B7E2">Gender</div></th>
        <th  width="300"><div align="left" style="color:#57B7E2">Date of Birth</div></th>
          <th  width="300"><div align="left" style="color:#57B7E2">Residential Address</div></th>
           <th  width="300"><div align="left" style="color:#57B7E2">Contact Address</div></th>
              <th  width="300"><div align="left" style="color:#57B7E2">Action</div></th>
          
              
    </tr>
    </thead>
   <tbody>
    <tr>
    <?php
    $staffss = staffManager::find_by_sql("SELECT * FROM `staff` order by id desc");
foreach($staffss as $staffs) { ?>
		 
        <td class="center"><?php echo $staffs->firstname ;  ?> </td>
        <td class="center"><?php echo $staffs->othername ?></td>
        <td class="center"><?php echo $staffs->lastname ;  ?> </td>
        <td class="center"><?php echo $staffs->gender ?></td>
        <td class="center"><?php echo $staffs->date_of_birth ;  ?> </td>
        <td class="center"><?php echo $staffs->residential ?></td>
        <td class="center"><?php echo $staffs->contact ;  ?> </td>
       
        <td class="center">	<?php echo "<a href=\"view_staff.php?id=".urlencode(($staffs->id))."\" class='btn-setting'> Delete</a>" ?> </td>
       
        
        
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