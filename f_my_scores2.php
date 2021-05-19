<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/result_manager.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/result_manager2.php'); ?>


  <?php 
        $_SESSION['cat']= @$_POST['cat'];
     $_SESSION['subcat']= @$_POST['subcat'];
  
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
                     
                               
              <p align="center">  <a href="f_my_scores.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Back </a>
                                 
                        
                    <td><h4>Class</strong>: <i style="color:#000"> <?php echo @$_SESSION['cat'] . '  ';?></i> Subject:</strong> <i style="color:#000"> <?php echo @$_SESSION['subcat'];?></i></h4></td>
                  <p align="center"></br>
             <div class="box col-md-14">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Available Students Offering <?php echo  @$_SESSION['subcat']; ?> 
                                   </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>  </div>
                                 
                 </div>
                
                 <div class="box-content">
               
                  <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="#CCCCCC" align="center">
                        
                         <th align="center" width="321"><div align="center">Student's Full Name</div></th>
                         
                          <?php
                          $get_section=mysql_fetch_array(mysql_query("SELECT 
                            `section_id` FROM `class_section` WHERE `class_name`='{$_SESSION['cat']}'"));
              

$ca_num=mysql_fetch_array(mysql_query("SELECT * FROM `assessment` 
  WHERE `section_id`='{$get_section['section_id']}'"));
                             ?>
                             <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><?php echo $ca_num['CA1'];?><br> <?php echo $ca_num['score1'] . ' ' .'marks';?></span>
                            </div> </th> 
                             
                           
                            
                            
                             <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><?php echo $ca_num['CA2'];?><br> <?php echo $ca_num['score2'] . ' ' .'marks';?> </span>
                            </div> </th> 
                              <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><?php echo $ca_num['CA3'];?><br> <?php echo $ca_num['score3'] . ' ' .'marks';?></span>
                            </div> </th> 
                             <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><?php echo $ca_num['CA4'];?><br> <?php echo $ca_num['score4'] . ' ' .'marks';?></span>
                            </div> </th> 
                            <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><?php echo $ca_num['CA5'];?><br> <?php echo $ca_num['score5'] . ' ' .'marks';?></span>
                            </div> </th> 
                            <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><?php echo $ca_num['CA6'];?><br> <?php echo $ca_num['score6'] . ' ' .'marks';?></span>
                            </div> </th> 
              
                          <th align="center" width="200"><div align="center">Sub total </div></th>
                          <th align="center" width="157"><div align="center">Exam</div></th>
                          <th align="center" width="200"><div align="center">Term total</div></th>
                             <th align="center" width="200"><div align="center">Grade</div></th>
               
              
              
                       </tr>
                     </thead>
                     <tbody>
                       <?php
     $sql=mysql_query("SELECT  * FROM `score_entry` WHERE `subject_name`='{$_SESSION['subcat']}' AND `class_name`='{$_SESSION['cat']}'  AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `account_status` = 1 ");
    while($values=mysql_fetch_array($sql)){
       ?>
    <?php $st=mysql_fetch_array(mysql_query("SELECT `id`, `student_id`, `fullname` FROM `student_class` WHERE `student_id` = '{$values['student_id']}' AND `account_status` = 1 ORDER BY trim(fullname) ASC "))?>
                      <td class="center"><?php echo  $st['fullname']; ?></td>
                                      
                            
                                    <td><?php echo $values['CA1']?>
                                  <td>  <?php echo $values['CA2'];?></td>
                                   <td> <?php echo $values['CA3'];?></td>
                                      <td> <?php echo $values['CA4'];?></td>
                                       <td>  <?php echo $values['CA5'];?></td>
                                   <td> <?php echo $values['CA6'];?></td>
                                   
                                      <td>  <?php echo $values['CA_total'];?></td>
                                   <td> <?php echo $values['exam'];?></td>
                                    <td>  <?php echo $values['term_total'];?></td>
                                    <td>  <?php echo $values['grade'];?></td>
                                   
                                     
                                     
                             
                  </label>
                              </td>
                              </tr>
                             
              
                  <?php } // end whileloop ?>
                       </tbody>
                     
                   </table>
                  
                   </form>
                   
                 </div>
               </div>
           </div>
             </p>
                      
                 <p>&nbsp;                        </p>
                     
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