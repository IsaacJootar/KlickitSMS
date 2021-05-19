<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/result_manager.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/result_manager2.php'); ?>


  <?php 
        $_SESSION['cat']= @$_POST['cat']; // class
        
    $get_staff_id=mysql_fetch_array(mysql_query("SELECT `staff_id` FROM `form_master` WHERE `class_name`='{$_SESSION['cat']}'"));
    $staff=mysql_fetch_array(mysql_query("SELECT `fullname` FROM `staff` WHERE `id`='{$get_staff_id['staff_id']}'"));
    $staff=$staff['fullname'];
    
  
    
  
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
                     
                               
              <p align="center">  <a href="monitor_scores.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Back </a>
                                 
                        
                    <td><h4>Class</strong>: <i style="color:#000"> <?php echo @$_SESSION['cat'];?></i> Formaster:</strong> <i style="color:#000"> <?php echo $staff;?></i></h4></td>
                  <p align="center"></br>
             <div class="box col-md-12">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Pending  issues to be resolved in  <?php echo  @$_SESSION['cat']; ?> 
                                   </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>  </div>
                                 
                 </div>
                
                 <div class="box-content">
                     
               
                  <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="#CCCCCC" align="center">
                        
                         <th align="center" width="321"><div align="center">Student's Name</div></th>
                          <th align="center" width="321"><div align="center">Subject</div></th>
                         
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
              
                          <th align="center" width="200"><div align="center">Sub. total </div></th>
                          <th align="center" width="157"><div align="center">Exam</div></th>
                          <th align="center" width="200"><div align="center">Term total</div></th>
                             <th align="center" width="200"><div align="center">Staff in charge</div></th>
                             
                             
                             
               
              
              
                       </tr>
                     </thead>
                     <tbody>
                       <?php
                       
                       // derive criteria  for pending issues//
     $sql=mysql_query("SELECT  * FROM 
     `score_entry` 
     WHERE (`class_name`='{$_SESSION['cat']}'  AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'
     AND `account_status` = 1 AND `CA_total`= 0 AND `term_total`= 0)
     OR (`class_name`='{$_SESSION['cat']}'  AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'
     AND `account_status` = 1 AND `term_total`!= 0 AND `exam`= 0 )
     OR (`class_name`='{$_SESSION['cat']}'  AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'
     AND `account_status` = 1 AND `term_total` IS NULL)
     ");
    
    while($values=mysql_fetch_array($sql)){
       ?>
    <?php $st=mysql_fetch_array(mysql_query("SELECT `id`, `student_id`, `fullname` FROM `student_class` WHERE `student_id` = '{$values['student_id']}' AND `account_status` = 1 ORDER BY trim(fullname) ASC "))?>
    <?php $staff=mysql_fetch_array(mysql_query("SELECT  `fullname` FROM `staff` WHERE `id` = '{$values['staff_id']}' "))?>
                      <td><?php echo  $st['fullname']; ?></td>
                        <td><?php echo $values['subject_name']?>
                                      
                            
                                    <td><?php echo $values['CA1']?>
                                  <td>  <?php echo $values['CA2'];?></td>
                                   <td> <?php echo $values['CA3'];?></td>
                                      <td> <?php echo $values['CA4'];?></td>
                                       <td>  <?php echo $values['CA5'];?></td>
                                   <td> <?php echo $values['CA6'];?></td>
                                   
                                      <td>  <?php echo $values['CA_total'];?></td>
                                  <td> <?php if(is_null($values['exam'])){ echo " <span class='label-warning label label-default'>exam not entered </span>";}elseif($values['exam']==0){echo $values['exam']. " ". "<span class='label-info label label-default'> verify this score </span>" ;}else{echo $values['exam'];}?></td>
                                    <td>  <?php if(is_null($values['term_total'])){ echo "<span class='label-Default label label-default'>no exams to compute </span>";}else{echo $values['term_total'];}?></td>
                                     <td>  <?php echo $staff['fullname'];?></td>
                                   
                                     
                                    
                             
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
                   
                   
  <table  border="1"  class="Tborder"; style="line-height:1;">
                    <tr class="transcriptheader hdsmall" bgcolor="#CCCCCC" valign="top"; style="vertical-align:top" align="center">
    <td width="400"><div align="center"><strong>Number of staff assigned to  <?php echo $_SESSION['cat']; ?></strong></div></td>
    <td width="400"><div align="center"><strong>Number of staff who have entered atleast one subject in <?php echo $_SESSION['cat']; ?></strong></div></td>
  
  </tr>
   <?php  
 

// get number of staff assigned to this class//
   $sql=mysql_query("SELECT count(DISTINCT `staff_id`) AS number_of_staff  FROM `staff_class` WHERE `class_name`='{$_SESSION['cat']}'");
   if(!$sql) { echo "errror occured";}
 $data=mysql_fetch_array($sql) ?>
	<tr bgcolor="#FFFFFF">
    <td><div align="center"><a><span class="blue"><?php echo  $data['number_of_staff'] . '</br>';?> </span></a></div></td>
    
    
    <?php
     $sql=mysql_query("SELECT count(DISTINCT `staff_id`) AS number_of_staff FROM `score_entry` WHERE `class_name`='{$_SESSION['cat']}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'");
    $data=mysql_fetch_array($sql);
     ?>
    <td><div align="center"><a><span class="red"><?php echo  $data['number_of_staff'] . '</br>';?> </span></a></div></td>
  
   </td>
  </tr>
    
     
    
        
</table><br/>
<?php
// query to get that, alhough asigned to this class they have not yet been found in the score sheet, that is, they havee not entered any score atall for this term// 
 $no=1;
$sql=mysql_query("SELECT  DISTINCT `staff_id`
FROM    `staff_class`
WHERE  `class_name`='{$_SESSION['cat']}'
AND  `staff_id` 
NOT IN (SELECT `staff_id`
FROM score_entry  
WHERE `class_name`='{$_SESSION['cat']}'
AND `session_id`='{$sess_id}'
AND `term_id` = '{$term_id}' )");
    $data=mysql_num_rows($sql);
?>
      <td class="center"><strong><strong>
      </strong>
        <div align="center">
            <strong>Total number of staff yet to enter any score atall for <?php echo $_SESSION['cat']; ?> this term is
            </strong> <a><span class="yellow"><?php echo  $data;?> </span></a>
      </strong>        </div></td></br>   
                 <p>&nbsp;  <a href="#">
                            <i class="glyphicon glyphicon-arrow-down"></i>
                            </a>
                 </br></br>
                  <a href="#">
            List of staff yet to enter any score atall in  <?php echo $_SESSION['cat'];?> this term
                        </a></p>
                <table  border="1"  class="Tborder"; style="line-height:1;">
                    <tr class="transcriptheader hdsmall" bgcolor="#CCCCCC" valign="top"; style="vertical-align:top" align="center">
    <td><div align="center"><strong>SN</strong></div></td>
    <td width="400"><div align="center"><strong>Staff name</strong></div></td>
    <td width="400"><div align="center"><strong>Staff Registration No.</strong></div></td>
  
  </tr>
   <?php  
 
 
	while ($data=mysql_fetch_array($sql)){ 
	$get_staff=mysql_fetch_array(mysql_query("SELECT `fullname`, `username` FROM `staff` WHERE `id`= '{$data['staff_id']}'")); ?>
	<tr bgcolor="#FFFFFF">
 <td><div align="center"><?php echo $no;?></div> </td>
    <td><div align="center"><?php echo $get_staff['fullname'] . '</br>';$no++; ?></div></td>
    <td><div align="center"><?php echo $get_staff['username'];?></div></td>
  
   </td>
  </tr>
	<?php } // while loop ?>

</table>  
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