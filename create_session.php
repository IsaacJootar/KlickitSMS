<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/session_manager.php'); ?>
<?php require_once('includes/config.php'); ?>




            
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
                     
                   

                    <div class="controls" align="center">
               
                              
                        <div class="well col-md-12 center login-box">
            <div class="alert alert-info">
               Create New Session
            </div>
                       
  
                        <form method="post" action="create_session_exe.php" >
                          <p>
                            <select name="session"   id="selectError2" data-rel="chosen" >
                              <option value=""></option>
                              
                              
                              <option>2014/2015</option>
                              <option>2015/2016</option>
                              <option>2016/2017</option>
                              <option>2017/2018</option>
                              <option>2018/2019</option>
                              <option>2019/2020</option>
                              <option>2020/2021</option>
                              <option>2021/2022</option>
                              <option>2022/2023</option>
                              
                              
                            </select>
                          </p>
                          </p>
                          </p>
                          
                          
                          <p class="center col-md-2">
                        <button type="submit" class="btn btn-primary">Create Session</button>
                    </p>
                          
                           
                          </p>
                      </form>
                      
                              
                              
                           
                      
            
					
                
                  
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