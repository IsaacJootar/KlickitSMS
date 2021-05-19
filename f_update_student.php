<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/student_manager.php'); ?>
            
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
                    <a href="manage_student.php">Back</a>
                    </p> 
                 <?php
				 $_SESSION['id']=$_GET['id'];
				 $student=studentManager::find_by_id($_GET['id']); ?>
             <div class="well col-md-9 center login-box">
             
            <div class="alert alert-info">
              Update Student Account
                </div>
            <form class="form-horizontal" action="f_update_student_exe.php" method="post">
                <fieldset>
                 <img src="images/avatar.png" style="float:right" alt="" width="82" height="82"/>
                
				<h4 align="left"><strong>Personal Information </strong></br></h4>
                
                <div class="input-group col-md-4">
                 <div align="left"><strong>Present Class</strong>
                  <h4><?php echo $student->present_class;?></h4>
                    <div class="clearfix"></div><br>
                  
                     
                  </div>
            
                    <div class="input-group col-md-4">
                  
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" name="firstname"      value=" <?php echo $student->firstname;?>"  class="form-control" placeholder="First Name">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" name="othername"      value=" <?php echo $student->othername;?>" class="form-control" placeholder="Other Name">
                    </div>
                <div class="clearfix"></div><br>
                     <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" name="lastname"      value=" <?php echo $student->lastname;?>" class="form-control" placeholder="Last Name">
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
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home red"></i></span>
                        <textarea name="residential"   class="form-control" rows="2" cols="1" > <?php echo $student->residential;?>
                        </textarea>
                    </div>
					<div class="clearfix"></div><br>
                    <div align="left"><strong>Contact Address</strong></br></div>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-globe red"></i></span>
                        <textarea name="contact"  class="form-control" rows="2" cols="1"> <?php echo $student->contact;?>
                        </textarea>
                    </div>
                <div class="clearfix"></div><br>
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home red"></i></span>
                        <input type="text" name="state" value=" <?php echo $student->state;?>" class="form-control" placeholder="State of Origin">
                    </div>
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home red"></i></span>
                        <input type="text" name="lga" value=" <?php echo $student->lga;?>"class="form-control" placeholder="Local Government Area">
                    </div>
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone red"></i></span>
                        <input type="text" name="phone"      value=" <?php echo $student->phone;?>" class="form-control" placeholder="Phone Number">
                    </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope red"></i></span>
                        <input type="text" name="email"      value=" <?php echo $student->email;?>" class="form-control" placeholder="Email Address">
                    </div>;
                <div class="clearfix"></div><br>
				<h4 align="left"><strong>Parent/Guardian information </strong></br></h4>
					<div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" name="father_name"      value=" <?php echo $student->father_name;?>" class="form-control" placeholder="Father's Name">
                    </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-globe red"></i></span>
                        <input type="text" name="father_address"      value=" <?php echo $student->father_address;?>" class="form-control" placeholder="Father's Address">
                    </div>
					
                <div class="clearfix"></div><br>
                   <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-globe red"></i></span>
                        <input type="text" name="father_number"      value=" <?php echo $student->father_number;?>" class="form-control" placeholder="Father's Number">
                    </div>
					
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase red"></i></span>
                        <input type="text" name="father_occupation"  value=" <?php echo $student->father_occupation;?>" class="form-control" placeholder="Father's Occupation">
                    </div>
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" name="mother_name"      value=" <?php echo $student->mother_name;?>" class="form-control" placeholder="Mother's Name">
                    </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone red"></i></span>
                        <input type="text" name="mother_number"  value=" <?php echo $student->mother_number;?>" class="form-control" placeholder="Mother's Phone Number">
                    </div>
					
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase red"></i></span>
                        <input type="text" name="mother_occupation"      value=" <?php echo $student->mother_occupation;?>" class="form-control" placeholder="Mother's Occupation">
                    </div>
                
                <div class="clearfix"></div><br>
                   
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-heart red"></i></span>
                        <input type="text" name="health"      value=" <?php echo $student->health;?>" class="form-control" placeholder="Special Health Problem">
                    </div>
                   
                <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Update Account</button>
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