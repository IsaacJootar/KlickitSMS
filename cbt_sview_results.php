<?php include('includes/s_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
            
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
        ?>    <a href="s_cbt.php"> << Back </a>
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
                   <h2>My  CBT Test Tittles  </h2>
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
                           <th>N0. of questions</th>
                             <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
            if(!isset($_GET['id'])){$_GET['id']= "";};

            // here make sure u get the tests that have been attemted only, session or term not withstanding . 

       $classes = $database->query("SELECT DISTINCT `tittle_text` FROM `cbt_answeres` WHERE `user_id`='{$s_id}'  
        ORDER BY `id` desc");
foreach($classes  as $class ) { 
  $data= $database->query("SELECT * FROM `cbt_question_tittle` WHERE `tittle_text`='{$class['tittle_text']}'");
  $data=$database->fetch_array($data);

  $sess= $database->query("SELECT * FROM `session_manager` WHERE `id`='{$data['sess_id']}'");
  $sess=$database->fetch_array($sess);


    ?>                   
         <td class="center"><?php echo  $data['class_name'] ;  ?></td>
                       <td class="center"><?php echo  $data['subject_name'];  ?></td>
                           <td class="center"><?php echo "<span class='label-success label label-default'> " .   $class['tittle_text'];  ?></span></td>
                           <td class="center"><?php echo  $data['term'];  ?></td>
                           <td class="center"><?php echo  $sess['session'];  ?></td>
                          
                           
<td style="font-size:12px" class="center"> 

  <?php 
  $ques= $database->query("SELECT * FROM `cbt_questions` WHERE `tittle_text`='{$class['tittle_text']}'");
  
  echo $ques=$database->num_rows($ques);

  ?> 
</td>
                      <td style="font-size:12px" class="center"> 
      <a href="cbt_sview_results2.php?tittle_text=<?php echo urlencode($class['tittle_text']) ?>"> View result</a> </td>
    
                        
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