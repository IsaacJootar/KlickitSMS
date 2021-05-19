<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/accountschoolFees.php'); ?>

            
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
               <h4>CONFIGURE SCHOOL FEES FOR NEW STUDENTS</h4></div>
                                 
                 <a href="700jstpxvzpdo_accts.php" title="Click here to go back to main page " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                        
                
                                 
                                <a class="btn btn-default" title="click here to refreash page " data-toggle="tooltip" href="acc_school_fees_for_new.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Refresh page</a>                        
                        <p align="center"></br>
                        
                <div class="box col-md-3">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Click To Configure Fees               </h2>
                </div>
                <div class="box-content" align="left">
                  <a href="#" class="btn btn-info btn-setting">Configure School for Fees</a>
                    
                </div>
            </div>
        </div>
        
        
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h4 align="center">Configure School  Fees for New Students</h4>
                </div>
                <div class="modal-body">
                
                 <form name="testform" method='POST' action='acc_school_fees_for_new_exe.php'>
                 <tr>
                 <td>
<?Php

echo "<br><b>SELECT A SCHOOL  SECTION  </b> </br><p>

<select name='sec_id'>
<option value=''>Select Section</option>";

$sql="select id, sec_name FROM `section` "; // Query to collect data from table 

foreach ($dbo->query($sql) as $row) {
echo "<option value=$row[id]>$row[sec_name]</option>";
}
?>
</select></br>

</td>
</tr>
<br>

<tr>
<td>
<strong>
ENTER FEES AMOUNT FOR THIS SECTION</strong></br><p>
<input type="number" name="amount"  required />
</p>
</td>
</tr>
 <p class="center col-md-5">

                   <button type="submit" class="btn btn-primary">Save</button>
                    </p>
                   
   
           
</form>
                </div>
                
            </div>
        </div>
    </div>
    
             <div class="box col-md-9">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Available school fees configurations for new students                </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                   <table width="222%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr>
                         
                         <th> Section Name</th>
                         
                            <th>Amount(₦)</th>
                         
                            <th>status</th>
                             
                           <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                     
                       <?php
				global $database;	 
      $sql=$database->query("SELECT * FROM `acc_configure_school_fees` WHERE `sess_id`= $sess_id AND `term_id`= $term_id AND `status`= 0 GROUP BY `sec_id`");
while($fee=$database->fetch_array($sql)) {
	 ?>

                       
         <td class="center"><?php echo $fee['sec_name'] ?></td>
                      
                           <td class="center"> <?php echo $fee['expected_to_pay'] ;  ?></td>
                      
                        
            <td class="center"><?php echo "<span class='label-success label label-default'>Configured</span>"; ?>
        </td>
                       
                        
                        
                           
                            <td class="center">	<?php echo "<a href=\"acc_delete_school_fees_for_new.php?id=".urlencode(($fee['id']))."\"> Remove Fee</a>" ?> </td>
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                 <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
               
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                  
                </div>
                
            </div>
        </div>
    </div>
                 
                 </div>
               </div>
             </div>
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