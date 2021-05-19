<?php include('includes/header.php'); ?>
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
                    <a href="manage_student.php">Back</a>
                    </p> 
                 <?php
         $_SESSION['id']=$_GET['id'];
         $student=studentManager::find_by_id($_GET['id']); ?>
             <div class="well col-md-9 center login-box">
             
            <div class="alert alert-info">
            UPDATE STUDENT ACCOUNT
                </div>
            <form class="form-horizontal" action="update_student_exe.php" method="post">
                <fieldset>
                 <img src="images/avatar.png" style="float:right" alt="" width="82" height="82"/>
                
        <h4 align="left"><strong>Personal Information </strong></br></h4>
                
                <div class="input-group col-md-4">
                 <div align="left"><strong>Present Class</strong>
                  <h4><?php echo $student->present_class;?></h4>
                    <div class="clearfix"></div><br>
                  
                     
                  </div>
                  <div class="input-group col-md-4">
                  
                        <span class="input-group-addon">USER NAME</span>
                        <input type="text" name="username"      value=" <?php echo $student->username;?>"  class="form-control" placeholder="username">
                    </div>
                     <div class="clearfix"></div><br>
                  
                     
                  </div>
            
                    <div class="input-group col-md-4">
                  
                        <span class="input-group-addon">FULLNAME</span>
                        <input type="text" name="firstname"      value=" <?php echo $student->firstname;?>"  class="form-control" placeholder="Fullname">
                    </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                    <div class="clearfix"></div><br>
                    <div class="input-group col-md-4"> 
                     <?php
  $sql="SELECT id, `gender` FROM `students`"; 
echo "<select required class='form-control' name='gender'  ='' ><option value=''></option>";
foreach ($dbo->query($sql) as $gender) {
        if ($gender['gender']==$student->gender) {
echo  "<option selected  value='$gender[gender]'>$gender[gender]</option>";
          # code...
        } else { echo  "<option  value='$gender[gender]'>$gender[gender]</option>";}
}
echo "</select>" . '</br>'. '</br>';
                       
    ?> 
                    </div></br>
                   
                   <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                       
        <div class="clearfix"></div><br>
                    
                
                    <div class="input-group col-md-4">
                    
                    
        <h4 align="left"><strong>Contact Information </strong></br></h4>
                <div class="clearfix"></div>
             
                    <div class="input-group col-md-4">
                        <span class="input-group-addon">Residential Address</span>
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
                        <span class="input-group-addon">PHONE </i></span>
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
                         <input type="hidden" name="class_name"  value="><?php echo $student->present_class;?>">
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