<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/accountschoolFees.php'); ?>


       
            
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
               <h4>STUDENT SUBJECT ASSIGNMENTS</h4></div>
                <a href="manage_student.php" style="float:left" title="Go back to home page"  data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                 
                              <a class="btn btn-default" title="click here to refreash page " data-toggle="tooltip" href="student_assigned_subjects.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Refresh page</a></br>
              <form class="form-horizontal" name="cat_form" action="" method="post">
                    <fieldset>
                
                 
                       
                  
                      <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='student_assigned_subjects.php?cat=' + val ;
}

</script>
<b>Select a section  and class</b><p><p>
<?Php

@$cat=$_GET['cat']; // category, as in staff//
///////// Getting the data from Mysql table for first list box//////////
 $quer2="SELECT id, sec_name FROM `section` ORDER BY id"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
if(isset($cat)){
$quer="SELECT DISTINCT section_id, class_name FROM `class_section` where section_id=$cat order by class_name"; 
}else{$quer="SELECT DISTINCT section_id, class_name FROM class_section order by section_id"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////


echo "<select name='cat'  data-rel='chosen'  required='required' onchange=\"reload(this.form)\"><option value=''>Select A Section... </option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['id']==@$cat){echo "<option selected value='$noticia2[id]'>$noticia2[sec_name]</option>"."<BR>";}
else{echo  "<option value='$noticia2[id]'>$noticia2[sec_name]</option>";}
}
echo "</select>";
	
echo "<select name='subcat'  data-rel='chosen'  required='required'><option value=''>Select A Class/Grade/Arm......</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[class_name]'>$noticia[class_name]</option>";
}
echo "</select>";
?>              
                       
                  <button style="float:!important" type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
                            <p>&nbsp;</p>
                    
                 
                    
                    
                       
                    
                    
                </fieldset>
            </form>
                                 
        <?php 


if(!isset($_POST['submit'])){}?>
        <?php
    if (isset($_POST['submit'])){
					
		$_SESSION['class_name']=$_POST['subcat'];
	   
						   
?>                        
             <div class="box col-md-81">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>List of students and subjects assigned to them in  <?php echo $_SESSION['class_name']; ?>          </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                    <table width="200" border="1" align="center">
                          <tr bgcolor="#CCCCCC">
                            <td><div align="center"><strong>STUDENTS</strong> </div></td>
                            
                            <?php
     $sql=mysql_query("SELECT distinct `class_name`, `subject_name` FROM `student_subjects` WHERE `class_name`='{$_POST['subcat']}'");
	  while($sub=mysql_fetch_array($sql)){ ?> 
                            <th class="rotate" style="font-weight:1"><div>
                              <div align="left"><span><font size="-2"> <?php echo $sub['subject_name'];?></font></span></div>
                            </div> </th>
                            <?php } ?>
                          </tr>
                          <?php
	  
	  ?>
                          <style type="text/css">
      th.rotate {
  /* Something you can count on */
  height: 90px;
}

th.rotate {
 /* Safari */
-webkit-transform: rotate(-90deg);

/* Firefox */
-moz-transform: rotate(-90deg);

/* IE */
-ms-transform: rotate(-90deg);

/* Opera */
-o-transform: rotate(-90deg);
}
</style>
                          <?php
					
			$sql2=mysql_query("SELECT * FROM `student_class` WHERE `class_name`='{$_POST['subcat']}' AND `account_status` = 1 ORDER BY trim(fullname) ASC");
	  while($stu=mysql_fetch_array($sql2)){ ?>
                          <tr><td><div align="center"> <font size="-3">
                            <?php  echo $stu['fullname'];?></font>
                            </div></td>
                            <?php 	
					$student_id= $stu['student_id'];
					$sql3=mysql_query("SELECT distinct `class_name`, `subject_name` FROM `student_subjects` WHERE  `class_name`='{$_POST['subcat']}'");
	  		while($sub=mysql_fetch_array($sql3)){
				
				$sub=$sub['subject_name'];
				
				 ?>
                            
                            <?php 
            $sql4=mysql_query("SELECT * FROM `student_subjects` WHERE `student_id`='{$student_id}' AND 		 `class_name`='{$_POST['subcat']}' AND `subject_name` = '{$sub}'");
	  		     $subjects=mysql_fetch_array($sql4);
		?>
                            <td style="font-size:14px"><div align="center"><font size="-2"><?php echo $subjects['subject_name']; 
				
				
				?></font></div></td>
                            
                            <?php  }?>
                          </tr>
                          <?php }?>
                        </table>
                        
                   <?php } // end the form submission check vpost variable?>    
            
            
                 <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
               
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                  
                </div>
                
            </div>
        </div>
    </div>
                 
                 </div>
               </div>
             <p>&nbsp;</p>
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