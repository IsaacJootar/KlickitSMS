<?php include('includes/header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config2.php'); ?>



  
            
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
                        
                
               
             <div class="box col-md-3">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Click to display bulk SMS panel</h2>

                    
                </div>
                <div class="box-content">
                  <form method="post" action="bulk_to_all.php" >
                         
                         
                      </p>
                           
                      <p align="left">&nbsp;</p>
                      <p align="left"><span class="center col-md-2">
                        <input type="submit" name="submit" value="Dispaly message panel">
                      </span></p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                         
                         
              
                    </form>
                      
                </div>
            </div>
        </div>
             <div class="box col-md-9">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2 align="center">Bulk SMS Panel</h2>
                   <div class="box-icon"> <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a> <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                               <?php       if(!isset($_POST['submit'])){ exit();} ?>
                 
                   <h4>Sending bulk message to all parents </h4>
                <form method="post" action="#">
                
                
                 
                    <input name="display_name" type="text" placeholder="Sender's Tittle name">
                  </p>
                  <p>
                    <textarea name="bulk_num" cols="24" rows="10" placeholder="type your bulk message here, a page is 160 characters "></textarea>
                  </p>
                  <p>
                    <textarea name="bulk_num2" cols="34" rows="8" placeholder="You can add more numbers  ">
                     <?php 
					$qry=mysql_query("SELECT * FROM `bulk_sms`");
					while($numbers=mysql_fetch_array($qry)){
					echo $numbers['number'] . ",";
					}
					?>
                    
                    </textarea>
              </p>
                  <p><h6>You can type in more numbers</h6></p>
                      <input type="submit" name="submit" value="Sent Message">
                </form>
                   
                 </div>
               </div>
             </div>
             </p>
                      
                 <p>&nbsp; 
                 
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