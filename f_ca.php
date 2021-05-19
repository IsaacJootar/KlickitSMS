<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/class_manager.php'); ?>

          <div class="control-group" align="center">
                  
                  <?php
					if ((output_message($message))){
               echo   '<div class="alert alert-success">';
                   echo ' <button type="button" class="close" data-dismiss="alert">&times;</button>';
                   
                   echo output_message($message); 
               echo ' </div>';
				 unset ($message);
				 }
			  ?><a href="300pc419pxystaff.php">Back </a>
                  <?php echo $session->display_error(); ?>  
                   <div class="alert alert-info" align="center">
               <h4> INPUT ASSESSMENT SCORES </h4>
            </div>                 
                       
                          <a href="f_exam.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Input scores for exams</a>
                                 
                                
                 <a href="#" title="Request permission from admin before updating students scores." data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Update students scores</a>   
                                     
                                    
                     
    <div class="box col-md-9">
        <div class="box-inner">
            
            <div class="box-content">
            
                
             
                    
                        <form name="form" method="post" action="check_section_ca.php">
                            <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='f_ca.php?cat=' + val ;
}

</script>
<b>Select a class and a corresponding subject to proceed</b><p><p>
<?Php

@$cat=$_GET['cat']; 
///////// Getting the data from Mysql table for first list box//////////
 $quer2="SELECT * FROM `staff_class` WHERE `staff_id`='{$id}' order by id"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
if(isset($cat)){
$quer="SELECT * FROM `subject_teacher` WHERE `class_name`= '{$cat}'  AND `staff_id`='{$id}'"; 
}else{$quer="SELECT DISTINCT subject_name FROM `subject_teacher` order by subject_name"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////


echo "<select name='cat'  class='form-control' required='required' onchange=\"reload(this.form)\"><option value=''>Select a class</option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['class_name']==@$cat){echo "<option selected value='$noticia2[class_name]'>$noticia2[class_name]</option>"."<BR>";}
else{echo  "<option value='$noticia2[class_name]'>$noticia2[class_name]</option>";}
}
echo "</select>";
	
echo "<select name='subcat'  class='form-control'  required='required'><option value=''>Select a subject name......</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[subject_name]'>$noticia[subject_name]</option>";
}
echo "</select>"; ?>
 <div class="clearfix"></div>
                    
                        <button type="submit" class="btn-primary" name="submit">
                        <div align="center">Proceed </div>
                        </button>
                    
                            
                        </form>
                        
                        <?php 
						
						
						
						if(isset($_POST['submit'])){
						 $_SESSION['cat']=$_POST['cat'];
						 $_SESSION['subcat']=$_POST['subcat'];
						 
						}
						?>
                        <p>&nbsp;</p>
                    </div>
              </div>
                <!--/row -->

                <div class="row"></div>
                <div class="row"></div>

            </div>
        </div>
    </div>
    <!--/span-->

    <div class="box col-md-3">
        <div class="box-inner">
            <div class="box-header well">
                <h2>My Classes</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped">
                     <tbody>
                       <?php
					  if(!isset($_GET['id'])){$_GET['id']= "";};
       $classes = classManager::find_by_sql("SELECT * FROM `staff_class` WHERE `staff_id` = '{$id}' order by `id` desc");
foreach($classes  as $class ) {?>
                <td>
                        <a href="#" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> <?php echo $class->class_name ;  ?></a>
       
                  </td>
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
            </div>
       

</div><!--/row-->

  </div>
  </p>
  </p>
  </SCRIPT>
  </form>
  </div>
  </div>
  </div>
  </div>
  
 <?php include('includes/footer.php'); ?>