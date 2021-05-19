<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config2.php'); ?>


  <?php 
       if(isset($_POST['subcat'])){
           $_SESSION['subcat']=$_POST['subcat'];
           }
   ?>
            
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
               <h4>ASSIGN SUBJECT(S) TO STUDENT(S)</h4></div>
                                  
                   <a href="subject_to_student.php"> Back </a>
             <div class="box col-md-12">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Available Students and subjects in  <?php echo  @$_SESSION['subcat']; ?>                 </h2>
                   <div class="box-icon"> <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a> <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                 <form action="subject_to_student_exe.php" method="post">
                 <table width="250" align="left">
                   <tr>
                     <th scope="row"> 
                               <?php
                       global $database;
       $sql_students=$database->query("SELECT `student_id`, `fullname` FROM `student_class` WHERE `class_name`= '{$_SESSION['subcat']}' AND `account_status` = 1 ORDER BY trim(fullname) ASC");
    
    while($values=$database->fetch_array($sql_students)){ 

                    ?>   
                    <tr>
                                     <td style="font-size:9px" align="left"><input name="get_st[]" type="checkbox" checked="checked" class="flat" value="<?php echo $values['student_id'];?>" />
                                       <img src="images/avatar.png" width="30" height="30"/>
                                       
                                       <?php echo $values['fullname']; ?>
                  <?php } // end of first whileloop ?>
                  </td>
                  </tr></th>
                   </tr>
                 </table>
                 <h5 align="center">  Check and Uncheck Appropriately to Assign Subject(s) to Student(s)</h5><p>
              
                 <table width="575" height="136" align="center">
                  <tr>
                     <?php  $sql_subjects=$database->query("SELECT distinct `subject_name` FROM `subject_class` WHERE `class_name`= '{$_SESSION['subcat']}'");
        while($get_subjects=$database->fetch_array($sql_subjects)){

?>                    
          
             
                <input name="subject_name[]" type="checkbox" checked  title="<?php echo $get_subjects['subject_name']; ?>" value="<?php echo $get_subjects['subject_name'];?>" /><?php echo $get_subjects['subject_name']; ?>
             <?php } // end while loop for subjects ?>
                </tr>
                 </table>

                        </div>
               </div> 
         
           
        <p class="center col-md-5">
  <button style="float:center" type="submit" name="submit" value="1"   title="clicking this button will assign subject(s) to Student(s)"  data-toggle="tooltip" class="btn btn-primary">assign subject(s)</button>
          </form>               
                     
                </p>              
               
                     
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