<?php include('includes/dir_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/accountschoolBus.php'); ?>


      
            <!-- content starts -->
           
<div class=" row"></div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
                <h2 align="justify"><img src="images/fa.png" width="18" height="18"> Klickit School Management Software.  [ Version 1.4.1 ]</h2>
        </div>
            
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
                     
                            
                 <a href="900_dir_encode_qpde_md765ahd098265.php" title="Click here to go back" data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                             
                                        
                
                                 
                                <a class="btn btn-default" title="click here to refreash page " data-toggle="tooltip" href="acc_bus.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Refresh page</a>                        
                        <p align="center"></br>
                        
              
        
       
    
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