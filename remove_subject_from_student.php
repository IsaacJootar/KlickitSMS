<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('includes/config.php'); ?>
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
                    <a href="manage_student.php">Back</a>
                    </p> 
                    <div class="controls" align="center">
               
                              
                        <div class="well col-md-12 center login-box">
                        
            <div class="alert alert-info">
              Remove Subject(s) from Student
            </div>
            
             <form class="form-horizontal" action="remove_subject_from_student2.php" method="post">
              <div align="left">
                   
              </div>
              <div align="center">
              
               
                  
                  <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='remove_subject_from_student.php?cat=' + val ;
}

</script>
<b>Select a section and a corresponding class to proceed</b><p><p>
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
?><a class="btn btn-default" href="remove_subject_from_student.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Reset &amp; start again</a> 
              <p>&nbsp;</p>
              </div>
                 
              <p class="center col-md-2" align="center">
    <button type="submit" class="btn btn-primary">Proceed</button>
              </p> 
                 
              <p>&nbsp;</p>
              </div>
</form>
        </div>
        <!--/span-->
    </div><!--/row-->       
                           
                   
           
              </div>
  
                    <p>&nbsp;</p>

              </div>
                

            </div>
          
          
        </div>
    </div>
</div>

<div class="row"><!--/span--><!--/span--><!--/span-->
                       </p>
                        <p>&nbsp;                        </p>
                     
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
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it --