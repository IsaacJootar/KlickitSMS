<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>


  <?php 
        $_SESSION['cat'];
        $_SESSION['subcat'];
        $section_id= $_SESSION['section_id'];
  
   ?>




            <?php 
   $error_array=array();
  //initilize error flag//
  $error_flag=false;

  $sql=mysql_query("SELECT  * FROM `score_entry` WHERE `subject_name` = '{$_SESSION['subcat']}' AND `class_name` ='{$_SESSION['cat']}' AND  `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'");
     
       if($values=mysql_num_rows($sql) < 1){
      $error_array[]='No scores are available yet for vetting in this subject this term';
      $error_flag=true;
      }
     
      if($error_flag){  
      $_SESSION['sess_errors']=$error_array;
      session_write_close();
      redirect_to('vet1.php');
      exit();
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
               <h4>VET RESULT</h4></div>
                                  
                   <a href="vet1.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Back </a>
                  <td><h4>Class</strong>: <i style="color:#000"> <?php echo @$_SESSION['cat'] . '  ';?></i> Subject:</strong> <i style="color:#000"> <?php echo @$_SESSION['subcat'];?></i></h4></td>
                   
             <div class="box col-md-14">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Result Vetting Process For <?php echo  @$_SESSION['subcat']; ?>                 </h2>
                   <div class="box-icon"> <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a> <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <?php 
   $error_array=array();
  //initilize error flag//
  $error_flag=false;
         
    // get dossier config//
             global $database;
             $config=$database->query("SELECT * FROM `assessment` WHERE `section_id`='{$section_id}'");
             $config=$database->fetch_array($config);
         
         ?>
                 <div class="box-content">
                 <form action="vet_type4_exe.php" method="post">
                  <table class="table">
                     <thead>
                       <tr bgcolor="#000000" align="center">
                        
                         <th width="1100"><div align="left">Name</div></th>
                         
                              <th width="420"><div align="left"><?php echo $config['CA1']. '</br>'.  $config['score1']?> Marks</div></th>
                                <th width="420"><div align="left"><?php echo $config['CA2']. '</br>'.  $config['score2']?> Marks</div></th>
                               <th width="420"><div align="left"><?php echo $config['CA3']. '</br>'.  $config['score3']?> Marks</div></th>
                                <th width="420"><div align="left"><?php echo $config['CA4']. '</br>'.  $config['score4']?> Marks</div></th>
                               <th width="420"><div align="left">Total CA</div></th>
                               
                               <th width="420"><div align="left">Exam</div></th>
                               <th width="420"><div align="left">Term Total</div></th>
                               
                                <th width="420"><div align="left">Grade</div></th>
                               
                                <th width="420"><div align="left">Remark</div></th>
                               
                               
                               
                               
                               
                               
              
                       </tr>
                     </thead>
                     <tbody>
                     <?php
                     // get dossier config//
             global $database;
             $config=$database->query("SELECT * FROM `assessment` WHERE `section_id`='{$section_id}'");
             $config=$database->fetch_array($config);
       $sql=mysql_query("SELECT distinct `student_subjects`. `student_id`, `students`. `fullname` FROM `student_subjects` JOIN `students` ON `student_subjects`. `student_id`=`students`. `id` WHERE `subject_name`= '{$_SESSION['subcat']}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `class_name`='{$_SESSION['cat']}'");
    
    while($values=mysql_fetch_array($sql)){ 
       $sql2=mysql_query("SELECT  * FROM `score_entry` WHERE `subject_name`='{$_SESSION['subcat']}' AND `class_name`='{$_SESSION['cat']}' AND `student_id`='{$values['student_id']}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'");
      $qry3=mysql_fetch_array($sql2);
      $id=$qry['id'];     
  
        ?>

                                     <td class="center"><img src="images/avatar.png" width="31" height="31"/><?php echo $values['fullname']; ?>
                                     </td>
                      
              
                <label>
                                    
                                     
                   <input name="qst[]" type="text" size="1" class="flat"  value="<?php echo $values['student_id'];?>" style="visibility:hidden" />
                      
                    
                  <td>   <input type="number"   size="8" min="0" max="<?php echo $config['score1'] ?>"  title="<?php echo $config['CA1']. 'cannot be more than'.  $config['score1']; ?> " name="<?php echo $values['student_id'].'ca1' ;?>" placeholder="<?php echo  $config['CA1']; ?>"   value="<?php echo $qry3['CA1'];?>" /> 
                                         </td>
                    <td>
                    <input type="number"   size="8" min="0" max="<?php echo $config['score2'] ?>"  title="<?php echo $config['CA2']. 'cannot be more than'.  $config['score2']; ?> " name="<?php echo $values['student_id'].'ca2' ;?>" placeholder="<?php echo  $config['CA2']; ?>"   value="<?php echo $qry3['CA2'];?>" /> 
                                         </td>
                                         <td>
                   <input type="number"   size="8" min="0" max="<?php echo $config['score3'] ?>"  title="<?php echo $config['CA3']. 'cannot be more than'.  $config['score3']; ?> " name="<?php echo $values['student_id'].'ca3' ;?>" placeholder="<?php echo  $config['CA3']; ?>"   value="<?php echo $qry3['CA3'];?>" />   </td>
                    <td>
                   <input type="number"   size="8" min="0" max="<?php echo $config['score4'] ?>"  title="<?php echo $config['CA4']. 'cannot be more than'.  $config['score4']; ?> " name="<?php echo $values['student_id'].'ca4' ;?>" placeholder="<?php echo  $config['CA4']; ?>"   value="<?php echo $qry3['CA4'];?>" />   </td>
                                     
                                     <td style="font-weight:bold"> 
                                     <?php echo $qry3['CA_total'];?>  </td>
                                      <td>
                                       <input type="text" size="1" name="<?php echo $values['student_id'].'exam';?>"   value="<?php echo $qry3['exam'];?>" />  </td>
                                       
                                     <td style="font-weight:bold"> 
                                       <?php echo $qry3['term_total'];?>  </td>
                                      <td style="font-weight:bold"> 
                                         <?php echo $qry3['grade'];?> </td>
                                       
                                        
                                        <?php if ($qry3['term_total'] >=70 and $qry['term_total']<=100 ){
                       ?>
                                               <td>
                                       <span class='label-success'><?php echo $qry3['remark']; }?> </span>
                                      </td>
                                       
                                       <?php if ($qry3['term_total'] >=60 and $qry3['term_total']<=69 ){
                       ?>
                                               <td>
                                       <span class='label-info'><?php echo $qry['remark']; }?> </span>
                                      </td>
                                       
                                       <?php if ($qry3['term_total'] >=50 and $qry3['term_total']<=59 ){
                       ?>
                                               <td>
                                       <span class='label-primary'><?php echo $qry3['remark']; }?> </span>
                                      </td>
                                       <?php if ($qry3['term_total'] >=40 and $qry3['term_total']<=49 ){
                       ?>
                                               <td>
                                       <span class='label-warning'><?php echo $qry3['remark']; }?> </span>
                                      </td>
                                       
                                        <?php if ($qry3['term_total'] >=30 and $qry3['term_total']<=39 ){
                       ?>
                                               <td>
                                       <span class='label-danger'><?php echo $qry3['remark']; }?> </span>
                                      </td>
                                        <?php if ($qry3['term_total']<29 ){
                       ?>
                                               <td>
                                       <span class='label-danger'><?php echo $qry3['remark']; }?> </span>
                                      </td>
                                       
                                      
                                    
                </label>
                              
                           
                              </tr>
                             
              
                  <?php } // end whileloop ?>
                       </tbody>
                     
                   </table>
                   <p class="center col-md-5">
                        <button style="float:center" type="submit" name="submit" value="1"   title="clicking this button will apply vetting changes to all records that are updated" data-toggle="tooltip" class="btn btn-primary">Apply Changes</button>
                        
                        
                    </p>
                   </form>
                   
                 </div>
               </div>
           </div>
           
                      
               
                     
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