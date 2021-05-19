<?php include('includes/f_header.php'); ?>
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
                      <p class="center col-md-1" align="right">
                    <a href="300pc419pxystaff.php">Back</a>
                    </p> 
                    <div class="controls" align="center">
               
                              
                       
                        
            <div class="alert alert-info">
             View and assignment submitted by students
            </div>
            
             
              
              <div align="center">
              
               
            
<b>Select a particular assignment for grading</b><p><p>










                                            
<?php          

 $_SESSION['myclass']; // staff_class from f_header session

echo "<form method=post name='submit' action='view_homework.php' >";
//////////        Starting of first drop downlist /////////
                        $quer="SELECT * FROM `assignment` WHERE `class_name`='{$_SESSION['myclass']}'"; 

echo "<select required name='file_name'  data-rel='chosen' >
<option value=''>Select assignment</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[file_name]'>$noticia[file_name]</option>";

}
echo "</select>";
                     

?>


<a class="btn btn-default" href="view_homework.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Reset &amp; start again</a> 
              <p>&nbsp;</p>
              </div>
                 
              <p class="center col-md-2" align="center">
    <button type="submit" name="submit" class="btn btn-primary">Submit </button>
              </p> 
                 
              <p>&nbsp;</p>
              </div>
</form>
        </div>
        <!--/span-->
    </div><!--/row-->       
                           
                   <?php 


if(!isset($_POST['submit'])){}?>
   <?php
    if (isset($_POST['submit'])){ ?>
         
             <div class="box col-md-11">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                
                   <h2>List of students who have submitted their work: ( <?php echo @$_POST['file_name']; ?> )                  </h2>
                   <div class="box-icon"> <i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                
                 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                          <th>STUDENT NAME</th>
                        <th>DOCUMENT NAME</th>
                         <th>DOCUMENT TYPE</th>
                          <th>SESSION / TERM</th>
                           <th>UPLOADED DATE</th>
                            <th>ACTION</th>
                            <th>ACTION</th>
                             <th>ACTION</th>
                        
                       </tr>
                     </thead>
                     <tbody>
                       <?php
                       $file_name=@$_POST['file_name'];
                       $ass_id=mysql_query("SELECT `id` FROM `assignment` WHERE `file_name`='{$file_name}'");
                      $ass_id=mysql_fetch_array($ass_id);
                       $ass_id=$ass_id['id'];
                       
					 
      $query="SELECT * FROM `submitted_homework` WHERE `class_name`='{$_SESSION['myclass']}' AND `assignment_id`= '{$ass_id}'";
		$result=mysql_query($query);
		if (!$result)
		{
			die("database query faild". mysql_error());
		}
		
	
		
		while($ass = mysql_fetch_array($result)){	
       $session=mysql_query("SELECT * FROM `session_manager` WHERE `id`= '{$ass['sess_id']}'");
  $session=mysql_fetch_array($session);

   $qry=mysql_query("SELECT `term_def` FROM `term` WHERE `id`='{$ass['term_id']}'");
  $term=mysql_fetch_array($qry);
   $students=mysql_query("SELECT `fullname` FROM `student_class` WHERE `student_id`='{$ass['student_id']}'");
   $students=mysql_fetch_array($students);
?>
    <td class="center"><?php echo $students['fullname']?></td>                   
<td class="center"><?php echo $ass['file_name']?></td>
<td class="center"><?php echo $ass['file_ext']?></td>
                          
<td class="center"><?php echo $term['term_def'] .  ',' . ' ' .  $session['session'] . ' ' . ' Academic Session';?></td>
<td class="center"><?php echo $ass['date']?></td>
<td class="center"><a href="homework/<?php echo $ass['file_name']; ?>" download>Download / export</a>
<td class="center"><a target="_blank" href="homework/<?php echo $ass['file_name']; ?>" view>view / open</a>
                                          
</td>

<td class="center"><a href="f_notification.php">grade student</a>
                                                           
</td>
                            
               
              
                      
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                 </div>
               </div>
             </div>
             </p>
                      
                 <p>&nbsp;                        </p>
                     
              </div>
           
              </div>
  
               <?php } // end loop?>           
         
<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
   
 <?php include('includes/footer.php'); ?>