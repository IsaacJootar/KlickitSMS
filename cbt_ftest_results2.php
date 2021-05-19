<?php include('includes/f_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
  <?php 
  $tittle_text=$_GET['tittle_text'];
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
        ?>    <a href="cbt_ftest_results.php"> << Back </a>
                  <?php echo $session->display_error(); ?>         
                     
                 <div class="alert alert-info" align="center">
               <h4>VIEW CBT RESULTS</h4></div>
              <p align="center">
            
             
          <div class="box-content">
                   
                </div>
            </div>
        </div>
             <div class="box col-md-16">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Student Who Submitted </h2>
                 </div>
                 <div class="box-content">
                  <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Class</th>
                         <th>Subject</th>
                           <th>Test Tittles / Topic</th>
                            <th> Term</th>
                            <th>Session</th>
                             <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php

            // here make sure u get the tests that have been attemted only, session or term not withstanding . 

       $classes = $database->query("SELECT DISTINCT `user_id` FROM `cbt_answeres` WHERE `tittle_text`='{$tittle_text}'  
        ORDER BY `id` desc");
foreach($classes  as $class ) { 
  $data= $database->query("SELECT * FROM `cbt_question_tittle` WHERE `tittle_text`='{$tittle_text}'");
  $data=$database->fetch_array($data);

  $sess= $database->query("SELECT * FROM `session_manager` WHERE `id`='{$data['sess_id']}'");
  $sess=$database->fetch_array($sess);
  $student= $database->query("SELECT `fullname` FROM `student_class` WHERE `student_id`='{$class['user_id']}'");
  $student=$database->fetch_array($student);


    ?>                   
         <td class="center"><?php echo  $data['class_name'] ;  ?></td>
                       <td class="center"><?php echo  $data['subject_name'];  ?></td>
                           <td class="center"><?php echo $student['fullname'];  ?></span></td>
                           <td class="center"><?php echo  $data['term'];  ?></td>
                           <td class="center"><?php echo  $sess['session'];  ?></td>
                          
                     <td style="font-size:12px" class="center"> 
      <a href="cbt_ftest_results3.php?n=<?php echo urlencode($student['fullname'])?>&s_id=<?php echo urlencode($class['user_id'])?>&tittle_text=<?php echo urlencode($tittle_text) ?>"> View result</a> </td>
    
                        
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                   
                 <p>&nbsp;                        </p>
                      ``
            
  
<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->


   
 <?php include('includes/footer.php'); ?>