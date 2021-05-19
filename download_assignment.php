<?php include('includes/s_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
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
        ?>
              
              
                  <?php echo $session->display_error(); ?>         
                     
                 <div class="alert alert-info" align="center">
               <h4>HOMEWORK / ASSESSMENT DASHBAORD </h4>
            </div>                 
                       
                                
                                  
                        <p align="center"></br>
                        
                 <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>List of Uploaded Assignments               </h2>
                   <div class="box-icon"> <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a> <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr>
                         
                        <th>DOCUMENT NAME</th>
                         <th>DOCUMENT TYPE</th>
                          <th>SESSION / TERM</th>
                           <th>UPLOADED DATE</th>
                            <th>ACTION</th>
                            <th>ACTION</th>
                         
                             <th>STATUS</th>
                                 <th>ACTION</th>
                             
                          
                       </tr>
                     </thead>
                     <tbody>
                       <?php
  
            
       $assignment=$database->query("SELECT * FROM  `assignment` WHERE `class_name`='$my_class'");
foreach($assignment as $ass) { 
     $session=mysql_query("SELECT * FROM `session_manager` WHERE `id`= '{$ass['sess_id']}'");
  $session=mysql_fetch_array($session);

   $qry=mysql_query("SELECT `term_def` FROM `term` WHERE `id`='{$ass['term_id']}'");
  $term=mysql_fetch_array($qry);

$count=mysql_num_rows(mysql_query("SELECT `student_id` FROM `submitted_homework`
 WHERE `assignment_id`= '{$ass['id']}' AND `student_id`=$s_id"));
?>
                       
  
<td class="center"><?php echo $ass['file_name']?></td>
                    <td class="center"><?php echo $ass['file_ext']?></td>
                          
<td class="center"><?php echo $term['term_def'] .  ',' . ' ' .  $session['session'] . ' ' . ' Academic Session';?></td>
    <td class="center"><?php echo $ass['date']?></td>
                                          <td class="center"><a href="homework/<?php echo $ass['file_name']; ?>" download>Download / export</a>
                                          <td class="center"><a target="_blank" href="homework/<?php echo $ass['file_name']; ?>" view>view / open</a>
                                          
</td>
<td class="center">
<?php
if($count > 0){
     
      echo "<span class='label-success label label-default'>submitted</span>";
  }
   
      if($count < 1 ){
     
      echo "<span class='label-alert label label-default'>not yet submitted</span>";
  } ?>
       </td>    
           
          <td class="center"><a href="submit_assignment.php?ass_id=<?php echo $ass['id']; ?>">submit asssignment</a>
                                                           
</td>
                            

                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                              
                     
                  
                      </p>
                      
                 <p>&nbsp;                        </p>
                     
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