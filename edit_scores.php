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
                      
                    <div class="controls" align="center">
               
                              
                       
                        
            <div class="alert alert-info">
            Permit Score Editing
            </div>
            
            <p class="center col-md-1" align="right">
                    <a href="results_stat.php">Back</a>
                    </p>  
              
              <div align="center">
              
               
            
<b>Select a section and a corresponding class to proceed</b><p><p>








<SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
self.location='edit_scores.php?cat=' + val ;
}
function reload3(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
var val2=form.subcat.options[form.subcat.options.selectedIndex].value; 

self.location='edit_scores.php?cat=' + val + '&cat3=' + val2 ;
}

</script>

                                            
<?Php

///////// Getting the data from Mysql table for first list box//////////
$quer2="SELECT distinct `score_entry`. `staff_id`, `staff`. `fullname` FROM `score_entry` JOIN `staff` ON `score_entry`. `staff_id`=`staff`. `id` WHERE `session_id`='{$sess_id}' AND `term_id`"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
@$cat=$_GET['cat']; // This line is added to take care if your global variable is off
if(isset($cat) and strlen($cat) > 0){
$quer="SELECT DISTINCT staff_id, class_name, session_id, term_id FROM `score_entry` where staff_id=$cat AND `session_id`='{$sess_id}' AND `term_id` order by class_name"; 
}else{$quer="SELECT DISTINCT class_name FROM score_entry order by class_name"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////


/////// for Third drop down list we will check if sub category is selected else we will display all the subcategory3///// 
@$cat3=$_GET['cat3']; // This line is added to take care if your global variable is off
if(isset($cat3)) {
$quer3="SELECT DISTINCT staff_id, subject_name, session_id, term_id FROM `score_entry` where class_name='{$cat3}' AND `session_id`='{$sess_id}' AND `term_id` AND `staff_id`={$cat} order by subject_name"; 
}else{$quer3="SELECT DISTINCT subject_name FROM `score_entry` order by `subject_name` asc"; } 
////////// end of query for third subcategory drop down list box ///////////////////////////


echo "<form method=post name='submit' action='edit_scores.php' >";
//////////        Starting of first drop downlist /////////

echo "<select name='cat' required='required' data-rel='chosen' onchange=\"reload(this.form)\"><option value=''>Select staff</option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['staff_id']==@$cat){echo "<option selected value='$noticia2[staff_id]'>$noticia2[fullname]</option>"."<BR>";}
else{echo  "<option value='$noticia2[staff_id]'>$noticia2[fullname]</option>";}
}
echo "</select>";
	
//////////////////  This will end the first drop down list ///////////

//////////        Starting of second drop downlist /////////
echo "<select name='subcat' required='required'  data-rel='chosen' onchange=\"reload3(this.form)\"><option value=''>Select a class..............</option>";
foreach ($dbo->query($quer) as $noticia) {
if($noticia['class_name']==@$cat3){echo "<option selected value='$noticia[class_name]'>$noticia[class_name]</option>"."<BR>";}
else{echo  "<option value='$noticia[class_name]'>$noticia[class_name]</option>";}
}
echo "</select>";
	
//////////////////  This will end the second drop down list ///////////


//////////        Starting of third drop downlist /////////

echo "<select name='subcat3' required='required'  data-rel='chosen' ><option value=''>Select subject................</option>";
foreach ($dbo->query($quer3) as $noticia) {
echo  "<option value='$noticia[subject_name]'>$noticia[subject_name]</option>";
}
echo "</select>";	echo "<select name='ca_type' required='required'  data-rel='chosen' ><option value=''>Select Ca Type......</option>";

echo  "<option value='CA1'>CA 1</option>";
echo  "<option value='CA2'>CA 2</option>";
echo  "<option value='CA3'>CA 3</option>";
echo  "<option value='CA4'>CA 4</option>";
echo "</select>";

?>


<a class="btn btn-default" href="edit_scores.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Reset &amp; start again</a> 
              <p>&nbsp;</p>
              </div>
                 
              <p class="center col-md-2" align="center">
    <button type="submit" name="submit" class="btn btn-primary">Display CA</button>
              </p> 
                 
              <p>&nbsp;</p>
              </div>
</form>               
                </div>
            </div>
        </div>
             <div class="box col-md-9">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2 align="center">List of Students in <?php echo @$_POST['subcat']; ?></h2>
                   <div class="box-icon"> </div>
                 </div>
                 <div class="box-content">
                               <?php       if(!isset($_POST['submit'])){ exit();}
							   ?>
                               <?php       if(isset($_POST['submit'])){
								    $_SESSION['subject_name']=@$_POST['subcat3'];
									  $_SESSION['staff_id']=@$_POST['cat'];
									   $_SESSION['class_name']=@$_POST['subcat'];
									     $_SESSION['ca_type']=@$_POST['ca_type'];
									
									}?>
			 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead align="center">
                       <tr bgcolor="CCCCCC">
                         
                         <th>Student's Full Name</th>
                         <th>CA1</th>
                            <th>CA2</th>
                              <th>CA3</th>
                                <th>CA4</th>
                               <th>Action</th>
                           
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					  
       $scores=mysql_query("SELECT * FROM  `score_entry` WHERE `session_id`='{$sess_id}' AND `term_id`='{$term_id}' AND `subject_name`='{$_POST['subcat3']}' AND `class_name` = '{$_POST['subcat']}' AND `staff_id`= '{$_POST['cat']}' ");
while($score=mysql_fetch_array($scores)){ 
 $name=mysql_query("SELECT student_id, fullname FROM  `student_class` WHERE  `student_id`=  '{$score['student_id']}'"); 
			$name=mysql_fetch_array($name)
			?>
                       
                       
         <td class="center"><?php echo $name['fullname']; ?></td>
                       <td class="center"><?php echo $score['CA1']; ?></td>
                        <td class="center"><?php echo $score['CA2'];  ?></td>
                          <td class="center"><?php echo $score['CA3']; ?></td>
                        <td class="center"><?php echo $score['CA4'];  ?></td>
                           
                            
 <td class="center">
  <?php echo "<a href=\"edit_scores2.php?id=".urlencode(($score['student_id']))."\"> Permit Editing</a>" ?>
                                    </td>
                            
                            
                           
                                 
                     </tr>
                     <?php }?>
                       </tbody>
                       
           <b>CLASS:</b>  <b><a href=""><?PHP echo $_SESSION['class_name'];?></a>
                         </b>

          <b> SUBJECT:</b> <b><a href=""><?PHP echo $_SESSION['subject_name'];?></a>

             <b> CA TYPE:</b> <b><a href=""><?PHP echo $_SESSION['ca_type'];?></a>
                         </b>
                         
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