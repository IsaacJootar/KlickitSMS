<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/staff_manager.php'); ?>


            
            <div class="box-content row">
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
                     
                  <p class="center col-md-1" align="right">
                    <a href="300pc419pxystaff.php">Back</a>
                    </p> 
                 
             <div class="well col-md-9 center login-box">
             
            <div class="alert alert-info">
              Update Staff Account
             
                </div>
                <?php 
                $staff_id=$id; // global system id
				$staff=staffManager::find_by_id($staff_id);
				 ?>
            <form class="form-horizontal" action="#" method="post"><img src="images/avatar5.png" width="93" height="93"; style="float:right">
                <fieldset>
                 
                    <div class="input-group col-md-4">
                         <span class="input-group-addon">Firstname</span>
                        <input type="text" name="firstname"      value=" <?php echo $staff->fullname;?>"  class="form-control" placeholder="First Name">
                    </div>
                    <div class="clearfix"></div><br>

                   
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                       
				<div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                    
                    
				<h4 align="left"><strong>Contact Information </strong></br></h4>
                <div class="clearfix"></div>
                    <div align="left"><strong>Residential Address</strong></br></div>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon">Residential</span>
                        <textarea name="residential"   class="form-control" rows="2" cols="1" > <?php echo $staff->residential;?>
                        </textarea>
                    </div>
					<div class="clearfix"></div><br>
                    <div align="left"><strong>Contact Address</strong></br></div>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon">Contact</span>
                        <textarea name="contact"  class="form-control" rows="2" cols="1"> <?php echo $staff->contact;?>
                        </textarea>
                    </div>
                <div class="clearfix"></div><br>
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon">State</span>
                        <input type="text" name="state" value=" <?php echo $staff->state;?>" class="form-control" placeholder="State of Origin">
                    </div>
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon">Local Government Area</span>
                        <input type="text" name="lga" value=" <?php echo $staff->lga;?>" class="form-control" placeholder="Local Government Area">
                    </div>
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon">Phone</span>
                        <input type="text" name="phone"  value=" <?php echo $staff->phone;?>" class="form-control" placeholder="Phone Number">
                    </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon">Email</span>
                        <input type="text" name="email"  value=" <?php echo $staff->email;?>" class="form-control" placeholder="Email Address">
                    </div>
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon">next of kin</span>
                        <input type="text" name="next_of_kin"   value=" <?php echo $staff->next_of_kin;?>" class="form-control" placeholder="Next of Kin">
                    </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon">next of kin Phone</span>
                        <input type="text" name="num_of_kin"  value=" <?php echo $staff->num_of_kin;?>" class="form-control" placeholder="Phone Number of Kin">
                    </div>
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon">Status</span>
                        <input type="text" name="status"  value=" <?php echo $staff->status;?>" class="form-control" placeholder="Marriage Status">
                    </div>
                <div class="clearfix"></div><br> 
                    
                <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="" class="btn btn-primary">Update Account</button>
                    </p>
                </fieldset>
            </form>
                      
                        
                       </p>
                        <p>&nbsp;                        </p>
                     
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