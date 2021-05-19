<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
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
                     
                
                 <p align="center">  <a title="Click to go back" data-toggle="tooltip" href="300pc419pxystaff.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Back</a>
                                 
                
               
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
		}			 ?>    
                </div>
                <div class="box-content">
                   <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Student full Name (class <?php echo $class_name; ?>)</th>
                        
                             
                       </tr>
                     </thead>
                     <tbody>
                     <?php
                      
       $query="SELECT * FROM `student_class` WHERE `class_name`='{$class_name}'"; $result=mysql_query($query);
		if (!$result){
			die("database query faild". mysql_error());
		}
		while($student = mysql_fetch_array($result)){	?>
                       
         <td class="center">	<?php echo "<a href=\"f_print_result.php?s_id=".urlencode(($student['student_id']))."\"> {$student['fullname']}</a>" ?> </td>
                        
                          
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
                   <div class="box-icon"> <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a> <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                 <?php @$s_id=$_GET['s_id'];
				 if (isset($_GET['s_id'])){
				 $check=mysql_query("SELECT `student_id`, `session_id`, `term_id` FROM `score_entry` WHERE `student_id`='{$s_id}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' ");
				 if($check=mysql_num_rows($check) < 1){; ?>
				 
					<h4> <?php echo "No records where found for this student";?></h4>
                    <?php
					 exit();
					 }
				 }
				  ?>
              <?php       if(!isset($_GET['s_id'])){ exit();}
			 if(isset($_GET['s_id'])){
				 $s_id=$_GET['s_id'];
			  } ?>
              
              <?php
			  $data=mysql_fetch_array(mysql_query("SELECT `fullname`, `class_name` FROM `student_class` WHERE `student_id`='{$s_id}'"));
				
              
              $verify=mysql_fetch_array(mysql_query("SELECT * FROM `session_manager` WHERE `status`='Current Session' "));
					  $session=mysql_fetch_array(mysql_query("SELECT * FROM `session_manager` WHERE `status`='Current Session'"));
	$sess_id=$session['id'];

	 $term=mysql_fetch_array(mysql_query("SELECT * FROM `term` WHERE `status`='Current Term'"));
	$term_id=$term['id'];
					  ?>
                  <table class="table table-striped" >
                   
<tr class="transcriptheader hdsmall">
 <td rowspan="1" ><img src="images/jet.jpg" alt="" width="125" height="119" align="left"/></td>
      <th colspan="5" style="color:#600"><h2 align="center" style="color:#600"><?php echo $school_address=schoolInformation::find_school_name();?></h2>
        <p align="left">
        <h5 align="center" style="color:#600">Address: <?php echo $school_address=schoolInformation::find_school_address();?> 
        </p>
        </h5></p>
        <p align="right" style="color:#F00">ASSESMENT /RESULT SHEET</p>
        <div align="left">TERMLY ACADEMIC REPORT ( <?php echo $info=resultManager2::find_current_term();?> )</div><div align="right">NEXT TERM BEGINS (<?php echo $info=resultManager2::find_term_infor($sess_id, $term_id) ?> )</div></div></th>
        <div class="box-header well" data-original-title="">
                 
                   <a style="float:right" target="_blank" href="f_dossier_test.php?term_id=<?php echo $term_id;?>&s_id=<?php echo $_GET['s_id'];?>&sess_id=<?php  echo $sess_id?>">[Click to Preview]</a>
                   <div class="box-icon"> </div>
                 </div>
    </tr>


  <tr class="transcriptheader hdsmall">
    <td width="141">Full Name:</td>
    <td width="206"><?php  echo $data['fullname']; ?></td>
    <td width="154">N0. in Class:</td>
    <td width="155"><?php echo $pos=resultManager2::find_num_in_class($s_id, $data['class_name'], $sess_id, $term_id); ?> <font size="-4"></td>
   
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Gender:</td>
    <td><?php echo $gender=resultManager2::find_student_gender_by_id($s_id); ?></td>
    <td>Session:</td>
    <td><?php echo $st=resultManager2::find_current_session();  ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Average:</td>
    <?php  $class=resultManager2::find_student_class_by_id($s_id, $sess_id, $term_id); //find then student class first, then use it to find the average 
	 $class['class_name']; ?>
    <td><?php echo $av=resultManager2::find_student_average($s_id,  $class['class_name'], $sess_id, $term_id);  ?></td>
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
    <td><?php echo resultManager2::find_class_highest_score($s_id,  $class['class_name'], $sess_id, $term_id);?></td>
    <td>Student's Total  Score</td>
   <td><?php echo resultManager2::find_student_total_score($s_id,  $class['class_name'], $sess_id, $term_id);?></td>
  </tr>
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

    <!-- Ad, you can remove it -->
   
 <?php include('includes/footer.php'); ?>