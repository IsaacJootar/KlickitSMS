<?php include('includes/s_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
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
                  <div class="alert alert-info" align="center">
               <h4>GENERATE STUDENT TERM RESULTS </h4></div>
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                   
<a href="s_result_check_.php" style="float:center" title="Go back to  previous page"><i
                                ></i> << back</a> <?php echo ' '. ' ' ;   ?>
                    
                </div>
                <div class="box-content">
                  <form method="post" action="s_result_check.php" >
                         
                            <p align="center">
                     <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='s_result_check.php?cat=' + val ;
}

</script>
<b><h5>Select a session and the corresponding term to generate result</h5></b><p><p>
<?Php

@$cat=$_GET['cat']; //
///////// Getting the data from Mysql table for first list box//////////
 $quer2="SELECT id, session FROM `session_manager` order by id"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
if(isset($cat)){
$quer="SELECT * FROM `term` where sess_id=$cat order by `sess_id`"; 
}else{$quer="SELECT DISTINCT id, term_code, term_def FROM term order by id"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////
?>
<strong>
            
                  <?php

echo "<select name='cat'  data-rel='chosen'  required='required' onchange=\"reload(this.form)\"><option value=''>Select Session... </option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['id']==@$cat){echo "<option selected value='$noticia2[id]'>$noticia2[session]</option>"."<BR>";}
else{echo  "<option value='$noticia2[id]'>$noticia2[session]</option>";}
}
echo "</select>";
?>
                  <?php
	
echo "<select name='subcat'  data-rel='chosen'  required='required'><option value=''>Select Term </option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[term_def]</option>";
}
echo "</select>";
                    
      ?>
                    </strong><strong>
                            
                    </strong>
                    </p>
                      
                        <input type="submit" name="submit" value="Display Result">
                     
                    <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                         
                         
              
                    </form>
                      
                </div>
            </div>
        </div>
        <?php if(!isset($_POST['submit'])){ }?>
        <?php
    if (isset($_POST['submit'])){
					
		               $_SESSION['sess']=$_POST['cat'];
			       $_SESSION['term']=$_POST['subcat'];
					  
?>
          
                 <?php 
				
					  
					$check=mysql_query("SELECT `student_id` FROM `score_entry` WHERE `student_id`='{$s_id}' AND `session_id`='{$_SESSION['sess']}' AND `term_id` = '{$_SESSION['term']}' ");
				 		if($check=mysql_num_rows($check) < 1){; ?>
				 
							<h4> <?php echo "No records was found for this student in this session and term";?></h4>
                    		<?php
					 		exit();
						}
						
							  
					$check=mysql_query("SELECT `student_id` FROM `score_entry` WHERE `student_id`='{$s_id}' AND `session_id`='{$_SESSION['sess']}' AND `term_id` = '{$_SESSION['term']}' AND `status`=0 ");
				 		if($check=mysql_num_rows($check) > 0){; ?>
				 
							<h4> <?php echo "Sorry! Your result for this term has been temporarily witheld, please contact the school administration";?></h4>
                    		<?php
					 		exit();
						}
						
					
				 
			
				  ?>
          
          
              
			  
               <?php
$data=mysql_fetch_array(mysql_query("SELECT `fullname`, `id` FROM `students` WHERE `id`='{$s_id}'"));
$student_class=mysql_fetch_array(mysql_query("SELECT distinct `class_name` FROM `score_entry` WHERE `session_id`= '{$_SESSION['sess']}' AND `term_id` = '{$_SESSION['term']}' AND  `student_id`= '{$s_id}'"));
$student_class=$student_class['class_name'];
				 ?>
 
    <div class="box col-md-11">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2 align="center">Student report sheet</h2>
                  
                   <div class="box-icon"> </div>
                 </div>
                 <div class="box-content">
                  <table  class="table table-striped" >
                      
                   
<tr class="transcriptheader hdsmall">
 <td rowspan="1" ><img src="images/jet.jpg" alt="" width="125" height="119" align="left"/></td>
      <th colspan="5"><h3 align="center"><?php echo $school_address=schoolInformation::find_school_name();

?> 
 </h3>
        <p align="left"><h5 align="center">Address:<?php echo $school_address=schoolInformation::find_school_address();?> 
</h5></p>
        
   <?php require_once('classes/result_manager.php'); ?>
<?php require_once('classes/result_manager2.php'); ?>
         
         
        <p align="right" style="color:#F00">ASSESSMENT /RESULT SHEET</p>
     
    </tr>


  <tr class="transcriptheader hdsmall">
    <td width="141">Full Name:</td>
    <td width="206"><?php  echo $dp; ?></td>
    <td width="154">No. in Class:</td>
    <td width="155"><?php echo $pos=resultManager::find_num_in_class($s_id,  $student_class,  $_SESSION['sess'],  $_SESSION['term']); ?> <font size="-4"></td>
   
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Gender:</td>
    <td><?php echo $gender=resultManager::find_student_gender_by_id($s_id); ?></td>
    <td>Session:</td>
    <td><?php echo $st=resultManager::find_current_session($_SESSION['sess']);  ?></td>
  </tr>
  <tr class="transcriptheader hdsmall">
    <td>Average:</td>
    <?php  $class=resultManager::find_student_class_by_id($s_id,  $_SESSION['sess'],  $_SESSION['term']); //find the student class first, then use it to find the average 
	 $class['class_name']; ?>
   <td><?php echo $av=resultManager2::find_student_average($s_id,  $class['class_name'],  $_SESSION['sess'],  $_SESSION['term']);  ?></td>
    <td>Term:</td>
    <td><?php echo $term=resultManager::find_current_term($_SESSION['sess'],  $_SESSION['term']);  ?></td>
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
    <td><?php echo resultManager::find_class_highest_score($s_id,  $class['class_name'],  $_SESSION['sess'],  $_SESSION['term']);?></td>
    <td>Class Lowest Score</td>
   <td><?php echo resultManager::find_class_lowest_score($s_id,  $class['class_name'],  $_SESSION['sess'],  $_SESSION['term']);?></td>

   </tr>       

</table>
  <div align="center"> <a   class='btn btn-primary btn-sm'  target="_blank" href="s_dossier_test.php?term=<?php echo $_SESSION['term'];?>&sess=<?php  echo   $_SESSION['sess'];?>"><i class='glyphicon glyphicon-print' ></i>[View Full  Result]</a>
       </div>
         
          
          
  <?php  } ?>
    
    
    
    
    
    
    
    
    
        </div>
    </div>
</div>

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
    <!-- content ends --><!--/#content.col-md-0--><!--/fluid-row-->

    <!-- Ad, you can remove it -->
   
 <?php include('includes/footer.php'); ?>