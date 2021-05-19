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
               <h4>TAKE CBT TEST</h4></div>
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
            // get from this term 
       $classes = $database->query("SELECT * FROM `cbt_question_tittle` WHERE `class_name`='{$my_class}'  
      AND `sess_id`='{$sess_id}' AND `term` = '{$term}' AND `status`=1  ORDER BY `id` desc");
foreach($classes  as $class ) { 
   $sess= $database->query("SELECT * FROM `session_manager` WHERE `id`='{$class['sess_id']}'");
   $sess=$database->fetch_array($sess);

    ?>                   
         <td class="center"><?php echo  $class['class_name'] ;  ?></td>
                       <td class="center"><?php echo  $class['subject_name'];  ?></td>
                           <td class="center"><?php echo "<span class='label-success label label-default'> " .   $class['tittle_text'];  ?></span></td>
                           <td class="center"><?php echo  $class['term'];  ?></td>
                           <td class="center"><?php echo  $sess['session'];  ?></td>
                          
                           
<td style="font-size:12px" class="center"> 

  <?php 
  $ques= $database->query("SELECT * FROM `cbt_questions` WHERE `tittle_text`='{$class['tittle_text']}'");
  
  echo $ques=$database->num_rows($ques); // number of questions//

  ?> 
</td>
                  

<?php
    // add questions link should only display for current term. I Dont want folks adding questions for past terms
$trials = $database->query("SELECT DISTINCT `tittle_text` FROM `cbt_answeres` WHERE `user_id`='{$s_id}' AND `tittle_text`='{$class['tittle_text']}'") ;

  ?>
        
                
                      <td style="font-size:12px" class="center"> 
<?php
    // add questions link should only display for current term. I Dont want folks adding questions for past terms
    if ($database->num_rows($trials) < 1 ) { ?>
      <a href="cbt_stest_questions2.php?tittle_text=<?php echo urlencode($class['tittle_text']) ?>">  take test </a> </td>
    <?php }else{ ?>
      <span class='label-info label label-default'> already taken </span>
   <?php } ?>
       
    
                        
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