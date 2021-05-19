<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>

            
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
                    <a  href="manage_student.php">Back</a>
                    </p> 
                    <div class="controls" align="center">
               
                              
                       
                        
            <div class="alert alert-info">
             View subjects that are assigned to students
            </div>
            
             
              
              <div align="center">
              
               
            
<b>Select a section and a corresponding class to proceed</b><p><p>








<SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
self.location='student_subject_assign.php?cat=' + val ;
}
function reload3(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
var val2=form.subcat.options[form.subcat.options.selectedIndex].value; 

self.location='student_subject_assign.php?cat=' + val + '&cat3=' + val2 ;
}

</script>

                                            
<?Php

///////// Getting the data from Mysql table for first list box//////////
$quer2="SELECT id, sec_name FROM `section` ORDER BY id"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
@$cat=$_GET['cat']; // This line is added to take care if your global variable is off
if(isset($cat) and strlen($cat) > 0){
$quer="SELECT DISTINCT section_id, class_name FROM `class_section` where section_id=$cat order by class_name"; 
}else{$quer="SELECT DISTINCT section_id, class_name FROM class_section order by section_id"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////


/////// for Third drop down list we will check if sub category is selected else we will display all the subcategory3///// 
@$cat3=$_GET['cat3']; // This line is added to take care if your global variable is off
if(isset($cat3)) {
$quer3="SELECT * FROM `student_class` where class_name='$cat3' order by `fullname` asc"; 
}else{$quer3="SELECT DISTINCT fullname FROM student_class order by `fullname` asc "; } 
////////// end of query for third subcategory drop down list box ///////////////////////////


echo "<form method=post name='submit' action='student_subject_assign.php' >";
//////////        Starting of first drop downlist /////////

echo "<select name='cat' required='required'   data-rel='chosen' onchange=\"reload(this.form)\"><option value=''>Select a section</option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['id']==@$cat){echo "<option selected value='$noticia2[id]'>$noticia2[sec_name]</option>"."<BR>";}
else{echo  "<option value='$noticia2[id]'>$noticia2[sec_name]</option>";}
}
echo "</select>";
	
//////////////////  This will end the first drop down list ///////////

//////////        Starting of second drop downlist /////////
echo "<select name='subcat' required='required'  data-rel='chosen' onchange=\"reload3(this.form)\"><option value=''>Select a class.....</option>";
foreach ($dbo->query($quer) as $noticia) {
if($noticia['class_name']==@$cat3){echo "<option selected value='$noticia[class_name]'>$noticia[class_name]</option>"."<BR>";}
else{echo  "<option value='$noticia[class_name]'>$noticia[class_name]</option>";}
}
echo "</select>";
	
//////////////////  This will end the second drop down list ///////////


//////////        Starting of third drop downlist /////////

echo "<select name='subcat3' required='required'  data-rel='chosen' ><option value=''>Select a student......</option>";
foreach ($dbo->query($quer3) as $noticia) {
echo  "<option value='$noticia[student_id]'>$noticia[fullname]</option>";
}
echo "</select>";

?>


<a class="btn btn-default" href="student_subject_assign.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Reset &amp; start again</a> 
              <p>&nbsp;</p>
              </div>
                 
              <p class="center col-md-2" align="center">
    <button type="submit" name="submit" class="btn btn-primary">Display subjects</button>
              </p> 
                 
              <p>&nbsp;</p>
              </div>
</form>
        </div>
        <!--/span-->
    </div><!--/row-->       
                           
                   
            <?php
			
			
				 if(!isset($_POST['submit'])){
					 
					 $_SESSION['id']='';
				 }
				 
				 if(isset($_POST['submit'])){
					 
					 $_SESSION['id']=$_POST['subcat3'];
				 }
				 
				 $sql=mysql_fetch_array(mysql_query("SELECT * FROM `student_class` WHERE `student_id` = '{$_SESSION['id']}'"));
				  ?>
             <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>List of subjects assigned to <?php echo  strtoupper(($sql['fullname'])); ?>                   </h2>
                   <div class="box-icon"> <i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                
                 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Subject Name</th>
                           <th>Assign By</th>
                        
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					 
      $query="SELECT * FROM `student_subjects` WHERE `student_id`= '{$_SESSION['id']}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' ";
		$result=mysql_query($query);
		if (!$result)
		{
			die("database query faild". mysql_error());
		}
		
	
		
		while($subj = mysql_fetch_array($result))
		
		{	?>
                       
         <td class="center"><?php echo $subj['subject_name'];  ?></td>
            <td class="center"><?php echo 'Administrator'  ?></td>
                      
               
              
                      
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