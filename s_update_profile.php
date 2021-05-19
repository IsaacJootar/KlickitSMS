<?php include('includes/s_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
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
                    <a href="100bfstudent_gpanel.php">Back</a>
                    
                    </p> 
                 <?php
				 $_SESSION['id']=$s_id;
				 $student=studentManager::find_by_id($s_id); ?>
             <div class="well col-md-11 center login-box">
            
	   
            <div class="alert alert-info">
            UPDATE STUDENT/PARENT ACCOUNT
                </div>
                <?php
				echo $get_passsport=studentManager::getPassport($s_id);
				?>
		 
				<h4 align="left"><strong>Upload Passport</strong></br></h4>
 <form style="float:center" enctype="multipart/form-data" method="post" action="passport_upload.php">
  
  <input align="center" style="float:center" type="file" name="uploaded_file" id="vpb_fullname"  required="required"/></br>
  <input align="left" style="float:left" type="submit" value="upload photo" /></br>
</form>
     
		
            <form class="form-horizontal" action="s_update_profile_exe.php" method="post">
                <fieldset>
               
				<h4 align="left"><strong>Personal Information </strong></br></h4>
                
                <div class="input-group col-md-4">
                 <div align="left"><strong>Present Class</strong>
                  <h4><?php echo $student->present_class;?></h4>
                    <div class="clearfix"></div><br>
                  
                     
                  </div>
            
                    <div class="input-group col-md-4">
                  
                        <span class="input-group-addon">FULLNAME</span>
                        <input type="text" name="firstname"      value=" <?php echo $student->firstname;?>"  class="form-control" placeholder="First Name">
                    </div>
                    <div class="clearfix"></div><br>

                    
                
                <div class="clearfix"></div><br>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                    <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <div align="left"><strong>Select Gender</strong>
                          <select name="gender" id="selectError2" data-rel="chosen" >
                            <option value=""> </option>        
						<option>Male</option>
						<option>Female</option>
						</select>
                        <?php echo $student->gender; ?></div>
                  </div>
                   <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                       
				<div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                    <div align="left"><strong>Date Of Birth</strong>
                      <select name="DAY" id="selectError2" data-rel="chosen"  >
  <option value="">Day------</option>
<?php for( $i =1; $i<32; $i++){?>
<option value="<?php echo (($i/10)<1)? "0". $i : $i;?>"> <?php echo (($i/10)<1)?"0".$i:$i?></option>
<?php }?>
</select>
<select name="MONTH" id="selectError2" data-rel="chosen" >
  <option value="">Month------</option>
  <?php for($i=1;$i<13;$i++){?>
          <option value="<?php echo (($i/10)<1)?"0".$i : $i?>"><?php echo (($i/10)<1)?"0".$i : $i?></option>
          <?php }?> 
</select>
<select name="YEAR" id="selectError2" data-rel="chosen"> 
<option value="">Year------</option>
<?php for($i =1900; $i<2032; $i++){?>
<option value="<?php echo (($i/10)<1)? "0". $i : $i?>"> <?php echo (($i/10)<1)?"0". $i : $i?></option>
<?php } ?>
</select>
                    <?php echo $student->date_of_birth; ?></div><br>
                     <div class="clearfix"></div><br>
                     <div class="input-group col-md-4">
                        <span class="input-group-addon">PREVIOUS SCHOOL</span>
                        <input type="text" name="previous"      value=" <?php echo $student->previous;?>" class="form-control" placeholder="Last Name">
                    </div>
                       <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon">REASON FOR LEAVING</span>
                        <input type="text" name="reason"      value=" <?php echo $student->reason;?>" class="form-control" placeholder="Last Name">
                    </div>
                
                    <div class="input-group col-md-4">
                    
                    
				<h4 align="left"><strong>Contact Information </strong></br></h4>
                <div class="clearfix"></div>
             
                    <div class="input-group col-md-4">
                        <span class="input-group-addon">RESIDENTIAL   ADDRESS</span>
                        <textarea name="residential"   class="form-control" rows="2" cols="1" > <?php echo $student->residential;?>
                        </textarea>
                    </div>
					<div class="clearfix"></div><br>
                 
                    <div class="input-group col-md-4">
                        <span class="input-group-addon">CONTACT ADDRESS</span>
                        <textarea name="contact"  class="form-control" rows="2" cols="1"> <?php echo $student->contact;?>
                        </textarea>
                    </div>
                <div class="clearfix"></div><br>
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon">STATE</span>
                        <input type="text" name="state" value=" <?php echo $student->state;?>" class="form-control" placeholder="State of Origin">
                    </div>
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon">LOCAL NUMBER</span>
                        <input type="text" name="lga" value=" <?php echo $student->lga;?>"class="form-control" placeholder="Local Government Area">
                    </div>
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon">PHONE NUMBER </i></span>
                        <input type="text" name="phone"      value=" <?php echo $student->phone;?>" class="form-control" placeholder="Phone Number">
                    </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon">EMAIL</i></span>
                        <input type="email" name="email"      value=" <?php echo $student->email;?>" class="form-control" placeholder="Email Address">
                    </div>;
                <div class="clearfix"></div><br>
				<h4 align="left"><strong>PARENT/GURDIAN INFORMATION </strong></br></h4>
					<div class="input-group col-md-4">
                        <span class="input-group-addon">FATHER'S NAME</span>
                        <input type="text" name="father_name"      value=" <?php echo $student->father_name;?>" class="form-control" placeholder="Father's Name">
                    </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon">FATHER'S ADDRESS</span>
                        <input type="text" name="father_address"      value=" <?php echo $student->father_address;?>" class="form-control" placeholder="Father's Address">
                    </div>
					
                <div class="clearfix"></div><br>
                   <div class="input-group col-md-4">
                        <span class="input-group-addon">FATHER'S NUMBER</span>
                        <input type="text" name="father_number"      value=" <?php echo $student->father_number;?>" class="form-control" placeholder="Father's Number">
                    </div>
					
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon">FATHER'S OCCUPATION</span>
                        <input type="text" name="father_occupation"  value=" <?php echo $student->father_occupation;?>" class="form-control" placeholder="Father's Occupation">
                    </div>
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon">MOTHER'S NAME</span>
                        <input type="text" name="mother_name"      value=" <?php echo $student->mother_name;?>" class="form-control" placeholder="Mother's Name">
                    </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon">FATHER'S NUMBER</span>
                        <input type="text" name="mother_number"  value=" <?php echo $student->mother_number;?>" class="form-control" placeholder="Mother's Phone Number">
                    </div>
					
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon">FATHER'S OCCUPATION</span>
                        <input type="text" name="mother_occupation"      value=" <?php echo $student->mother_occupation;?>" class="form-control" placeholder="Mother's Occupation">
                    </div>
                
                <div class="clearfix"></div><br>
                   
                <div class="clearfix"></div><br>
					<div class="input-group col-md-4">
                        <span class="input-group-addon">SPECIAL HEALTH CHALLENGE</i></span>
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