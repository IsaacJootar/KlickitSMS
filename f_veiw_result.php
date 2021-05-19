<?php include('includes/f_header.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>

<?php require_once('classes/student_manager.php'); ?>
<?php require_once('classes/result_manager2.php'); ?>
<?php require_once('classes/schoolInformation.php'); ?>



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
                     
                
                 <p align="center">  <a title="Click on student name by the left hand side to make comment." data-toggle="tooltip" href="#" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Result View</a>
                                 
                
               
             <div class="box col-md-3">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Click to display result</h2>
<?php
            
    $query="SELECT * FROM `form_master` WHERE `staff_id`='{$id}'"; $result=mysql_query($query); $result=mysql_fetch_array($result);
    $class_name=$result['class_name'];
    $_SESSION['class_name']=$class_name;
    if (!$result){
      die("database query faild". mysql_error());
    }      ?>    
                </div>
                <div class="box-content">
                   <table width="109%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Student's List (<?php echo $class_name; ?>)</th>
                        
                             
                       </tr>
                     </thead>
                     <tbody>
                     <?php
                      
       $query="SELECT * FROM `student_class` WHERE `class_name`='{$class_name}' order by trim(fullname) ASC"; $result=mysql_query($query);
    if (!$result){
      die("database query faild". mysql_error());
    }
    while($student = mysql_fetch_array($result)){ ?>
                       
         <td class="center">  <?php echo "<a href=\"f_veiw_result.php?id=".urlencode(($student['student_id']))."\"> {$student['fullname']}</a>" ?> </td>
                        
                          
                                               </tr>
  <?php }?>
                       
                     
                   </table>
                </div>
            </div>
        </div>
             <div class="box col-md-9">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2 align="center">Student report sheet</h2>
                   <div class="box-icon"> <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>  </div>
                 </div>
                 <div class="box-content">
                 <?php @$id=$_GET['id'];
         if (isset($_GET['id'])){
         $check=mysql_query("SELECT `student_id`, `session_id`, `term_id` FROM `score_entry` WHERE `student_id`='{$id}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' ");
         if($check=mysql_num_rows($check) < 1){; ?>
         
          <h4> <?php echo "No records where found for this student";?></h4>
                    <?php
           exit();
           }
         }
          ?>
              <?php       if(!isset($_GET['id'])){ exit();}
       if(isset($_GET['id'])){
         $id=$_GET['id'];
        } ?>
              
              <?php
         $data=mysql_fetch_array(mysql_query("SELECT * FROM  `student_class`
          WHERE `student_id`='{$id}'"));
        
              
              $verify=mysql_fetch_array(mysql_query("SELECT * FROM `session_manager` WHERE `status`='Current Session' "));
            $session=mysql_fetch_array(mysql_query("SELECT * FROM `session_manager` WHERE `status`='Current Session'"));
  $sess_id=$session['id'];

   $term=mysql_fetch_array(mysql_query("SELECT * FROM `term` WHERE `status`='Current Term'"));
  $term_id=$term['id']; 
  $get_section=mysql_fetch_array(mysql_query("SELECT 
                            `section_id` FROM `class_section` WHERE `class_name`='{$_SESSION['class_name']}'"));
  $get_section=$get_section['section_id'];

  // get dossier config//
          
             $config=mysql_fetch_array(mysql_query(" SELECT * FROM `assessment` WHERE `section_id`='{$get_section}'"));

         
         ?>


                  <table   width="62%" class="table table-striped" >
                   
<tr class="transcriptheader hdsmall">
 <td rowspan="1" ><img src="images/jet.jpg" alt="" width="125" height="119" align="left"/></td>
      <th colspan="5" style="color:#600"><h2 align="center" style="color:#600">   <?php echo $school_address=schoolInformation::find_school_name();

?></h2>
        <p align="left">
        <h5 align="center" style="color:#600">Address: <?php echo $school_address=schoolInformation::find_school_address();?> 
        </p>
        </h5></p>
       <div align="right">NEXT TERM BEGINS ( <?php echo $info=resultManager2:: find_term_infor($sess_id, $term_id) ?> )</div></div></th>
    </tr>



  <tr class="transcriptheader hdsmall">
    <td >Full Name:</td>
    <td><?php  echo $data['fullname']; ?></td>
    <td>No. in Class:</td>
    <td><?php echo $pos=resultManager2::find_num_in_class($id,  $data['class_name'], $sess_id, $term_id); ?> <font size="-4"></td>
   
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Gender:</td>
    <td><?php echo $gender=resultManager2::find_student_gender_by_id($id); ?></td>
    <td>Session:</td>
    <td><?php echo $st=resultManager2::find_current_session();  ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Average:</td>
    <?php  $class=resultManager2::find_student_class_by_id($id, $sess_id, $term_id); //find then student class first, then use it to find the average 
   $class['class_name']; ?>
    <td><?php echo $av=resultManager2::find_student_average($id,  $class['class_name'], $sess_id, $term_id);  ?></td>
    <td>Term:</td>
    <td><?php echo $term=resultManager2::find_current_term();  ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Remark/Grade:</td>
    <td><?php  if($av > 40){ echo "Passed";} else {echo "Failed";}?></td>
    <td>Class:</td>
    <td><?php 
      echo $class['class_name']
   ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Class Highest Score</td>
    <td><?php echo resultManager2::find_class_highest_average($id,  $class['class_name'], $sess_id, $term_id);?></td>
    <td>Class Lowest Average</td>
   <td><?php echo resultManager2::find_class_lowest_average($id,  $class['class_name'], $sess_id, $term_id);?></td>
  </tr>
</table>
                 <table border="1"  class="Tborder">
                    <tr class="transcriptheader hdsmall" bgcolor="#CCCCCC" valign="top"; style="vertical-align:top" align="center">
    <td><div align="center">SN</div></td>
    <td><div align="center">Subjects</div></td>
    <td><div align="center"><?php echo $config['CA1']. '</br>'.  $config['score1']?> Marks</div></td>
   <td><div align="center"><?php echo $config['CA2']. '</br>'.  $config['score2']?> Marks</div></td>
 <td><div align="center"><?php echo $config['CA3']. '</br>'.  $config['score3']?> Marks</div></td>
   
    <td><div align="center">Exam<br><?php echo $config['total_exam'];?> Marks</strong></div></td>
    <td><div align="center">Term total<br>100</div></td>
    <td>Grade</td>
    <td><div align="center">Highest <br>in<br>class</div></td>
   <td><div align="center">Lowest <br>in<br>class</div></td>
   
      <?php //echo $st['class_name']; ?>
  </tr>
   <?php  
 
   $no=1;
   $all=resultManager2::find_student_all_by_id($id, $class['class_name'], $sess_id, $term_id);
  while ($student=mysql_fetch_array($all)){ ?>
  <tr bgcolor="#99CCCC">
 <td><div align="center"><?php echo $no;?></div> </td>
    <td><div align="left"><?php echo $student['subject_name'] . '</br>';$no++; ?></div></td>
   <td><div align="center"><?php echo $student['CA1'];?></div></td>
   <td><div align="center"><?php echo $student['CA2'];?></div></td>
    <td><div align="center"><?php echo $student['CA3'];?></div></td>
    
    <td><div align="center"><?php echo $student['exam']; ?></div></td>
    <td><div align="center"><?php  echo $student['term_total'];?></div></td>
    <td><div align="center"><?php echo $student['grade']; ?></div></td>
    <td><div align="center"><?php
    $rank=mysql_fetch_array(mysql_query("SELECT * FROM `score_entry` WHERE `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `subject_name` = '{$student['subject_name']}' AND `class_name`= '{$class['class_name']}' ORDER BY `term_total` DESC LIMIT 1  "));
    if(!$rank){echo "error". mysql_error();}
    echo $rank['term_total']; // highest in class

  
  ?></div></td>
    <td><div align="center"><?php $rank=mysql_fetch_array(mysql_query("SELECT * FROM `score_entry` WHERE `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `subject_name` = '{$student['subject_name']}' AND `class_name`= '{$class['class_name']}' ORDER BY `term_total` ASC LIMIT 1  "));
    if(!$rank){echo "error". mysql_error();}
    echo $rank['term_total']; // lowest in class//
   ?></div></td>
   <?php } // end while loop?>
  </tr>
  <?php ?>
    
     
     
 
</table>
                   
                       </tbody>
                     
                   </table>
                   <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
               
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                  
                </div>
                
            </div>
        </div>
           
     
                        </td>
                        <td></td>
                    </tr>
</p>
                     <table>
   
</table>
                  
                   <?php 
          $_SESSION['id']=$_GET['id'];
           ?>
                  
                 </div>
               </div>
             </div>
             </p>
                      
                 <p>&nbsp; 
                 
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


 <?php include('includes/footer.php'); ?>



