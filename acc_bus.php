<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/accountschoolBus.php'); ?>


            
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
               <h4>Configure Bus Routes</h4></div>
                                 
                 <a href="acc_manage_payments.php" title="Click here to go back" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                              <a href="#" title="Click here to pay for school bus " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Pay for Bus</a> <?php echo ' '. ' ' ;   ?>
                                 
                                        
                
                                 
                             
                <div class="box col-md-3">
                  <p><a data-toggle="modal" href="#myModal2" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Create bus routes</a></p>
                  <p>&nbsp;</p>
                  <p>
                    
                    <a data-toggle="modal" href="myModal" class="btn btn-primary btn-setting"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Configure Bus Price</a></p>
              </div>
        
        
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h4 align="center">Configure Bus Fare</h4>
                </div>
                <div class="modal-body">
                
                 <form name="testform" method='POST' action='acc_configure_bus_exe.php'>
                 <tr>
                 <td>
<?Php

echo "<br><b>SELECT A BUS ROUTE  </b> </br><p>

<select name='route_id' required title='select a bus route'>
<option value=''>Select Route</option>";

$sql="select id, route_name FROM `acc_bus_routes` ";

foreach ($dbo->query($sql) as $row) {
echo "<option value=$row[id]>$row[route_name]</option>";
}
?>
</select></br>

</td>
</tr>
<br>

<tr>
<td>
<strong>
ENTER BUS PRICE AMOUNT</strong></br><p>
<input type="number" title="please enter bus fare" name="expected_to_pay"  required />
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
     <div class="modal" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h4 align="center">Create Bus Routes</h4>
                </div>
                <div class="modal-body">
                
                 <form name="testform" method='POST' action='acc_bus_routes_exe.php'>
                 <div class="input-group col-md-4">
                    <div class="input-group col-md-4"> <span class="input-group-addon">Enter Destination</i></span>
                      <input type="text" name="route_name" title='enter a destination-example durumi' required class="form-control" placeholder="Gwarimpa-Galatima, Wuse (zone 4), kubwa express">
                    </div></br>
                    
                   
                  </div><p>


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
                   <h2>Available school bus configurations                 </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                   <table width="222%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr>
                         
                         <th> Bus Destination</th>
                         
                            <th>Bus Fare(₦)</th>
                         
                            <th>status</th>
                             
                           <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                     
                       <?php
				global $database;	 
      $sql=$database->query("SELECT `acc_configure_bus_routes`. `route_id`, `acc_configure_bus_routes`. `expected_to_pay`, `acc_bus_routes`.`route_name`, `acc_bus_routes`.`id`  FROM `acc_configure_bus_routes` JOIN `acc_bus_routes` ON  `acc_configure_bus_routes`. `route_id`=`acc_bus_routes`. `id`  WHERE `sess_id`= $sess_id AND `term_id`= $term_id");
while($bus=$database->fetch_array($sql)) {
	 ?>

                       
         <td class="center"><?php echo $bus['route_name'] ?></td>
                      
                           <td class="center"><strong> <?php echo $bus['expected_to_pay'] ;  ?></strong></td>
                      
                        
            <td class="center"><?php echo "<span class='label-success label label-default'>Configured</span>"; ?>
        </td>
                       
                        
                        
                           
                            <td class="center">	<?php echo "<a href=\"acc_delete_bus_config.php?id=".urlencode(($bus['id']))."\"> Remove Fee</a>" ?> </td>
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