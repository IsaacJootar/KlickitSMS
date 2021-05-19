<?php include('includes/header.php'); ?>
        .
        <p>
          <?php require_once('classes/functions.php'); ?>
  <?php require_once('classes/session.php'); ?>
  <?php require_once('includes/config2.php'); ?>
          
          
        </p>
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
                    <a href="manage_staff.php">Back</a>
                    </p> 
                    <div class="controls" align="center">
               
                              
                       
                        
            <div class="alert alert-info">
             View subjects that are assigned to staff in a particular class
            </div>
            
             
              
              <div align="center">                                           
<?Php


echo "<form method=post name='submit' action='view_subjects_teacher.php' >";
//////////        Starting of first drop downlist /////////
?>
<SCRIPT language=JavaScript>
                       function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='view_subjects_teacher.php?cat=' + val ;
}

</script>
<b>Select a class and a corresponding subject to view</b><p>
<p>
<?Php

@$cat=$_GET['cat']; 
///////// Getting the data from Mysql table for first list box//////////
 $quer2="SELECT * FROM `classes` ORDER BY trim(class_name) ASC"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
if(isset($cat)){
$quer="SELECT * FROM `subject_class` WHERE `class_name`= '{$cat}'"; 
}else{$quer="SELECT DISTINCT subject_name FROM `subjects` order by trim(subject_name) ASC"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////


echo "<select name='cat'  data-rel='chosen'  required='required' onchange=\"reload(this.form)\"><option value=''>Select a class /Search class.....</option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['class_name']==@$cat){echo "<option selected value='$noticia2[class_name]'>$noticia2[class_name]</option>"."<BR>";}
else{echo  "<option value='$noticia2[class_name]'>$noticia2[class_name]</option>";}
}
echo "</select>";
  
echo "<select name='subcat'  data-rel='chosen'  required='required'><option value=''>Select a subject name......</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[subject_name]'>$noticia[subject_name]</option>";
}
echo "</select>"; ?>
<p>  </div>
 
          <input type="hidden" style="visibility: hidden;" value="<?php echo  $name ?>" name="staff_name">
                 
              <p class="center col-md-2" align="center">
    <button type="submit" name="submit" class="btn btn-primary">Display staff</button>
              </p> 
                 
              <p>&nbsp;</p>
              </div>
</form>
        </div>
        <!--/span-->
    </div><!--/row-->       
                           
                   
            
             <div class="box col-md-11">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                
                   <h2>Name of staff  assigned to<i style="color:#000"> <?php echo $_POST['subcat']; ?></i> in <i style="color:#000"><?php echo $_POST['cat']; ?></i> </h2>
                   <div class="box-icon"> </div>
                 </div>
                
                 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Staff Name</th>
                           <th>Assigned By</th>
                        
                       </tr>
                     </thead>
                     <tbody>
                      
                       
         <td class="center">  <?php 
         
          
         $sql=mysql_fetch_array(mysql_query("SELECT * FROM `subject_teacher` 
          WHERE `class_name` = '{$_POST['cat']}' AND `subject_name`= '{$_POST['subcat']}' "));
         $staff_id=$sql['staff_id'];
          $name=mysql_fetch_array(mysql_query("SELECT * FROM `staff` WHERE `id` = '{$staff_id}'"));
          echo $name=$name['fullname'];
          ?></td>
            <td class="center"><?php echo 'Administrator'  ?></td>
                      
               
              
                      
                     </tr>
                     
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