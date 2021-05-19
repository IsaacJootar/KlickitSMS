<?php include('includes/header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/student_manager.php'); ?>

            
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
                        
                <a href="results_stat.php">Back</a>
               
             <div class="box col-md-5">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Select parameters for withholding result(s)</h2>

                    
                </div>
                <div class="box-content">
                  <form method="post" action="unrelease_results.php" >
                         
                            <p align="left">

                       <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='unrelease_results.php?cat=' + val ;
}

</script>
<b><h5>Select a session and the corresponding term</h5></b>
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
                  <td><p>Session
                    <?php

echo "<select name='cat'  data-rel='chosen'  required='required' onchange=\"reload(this.form)\"><option value=''>Select A Session... </option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['id']==@$cat){echo "<option selected value='$noticia2[id]'>$noticia2[session]</option>"."<BR>";}
else{echo  "<option value='$noticia2[id]'>$noticia2[session]</option>";}
}
echo "</select>";
?>
                  </p>
                    <p>
                      <?php
  
echo "<select name='subcat'  data-rel='chosen'  required='required'><option value=''>Select  a term </option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[term_def]</option>";
}
echo "</select>";
?>
                    </p>
                    <p> <p> <p> <p>
<b><h5>Select a Class</h5></b>
                             <?php
                        $quer="SELECT distinct class_name FROM `classes`"; 
echo "<select name='class'  data-rel='chosen' required  ><option value=''>Select a class..........</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[class_name]'>$noticia[class_name]</option>";
}
echo "</select>";
                       
		?>    
                              
                      <p align="center">&nbsp;</p>
                      <p align="center"><span class="center col-md-2">
                        <input type="submit" name="submit" value="Proceed">
                      </span></p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                         
                         
              
                    </form>
                      
                </div>
            </div>
        </div>
         <?php       if(!isset($_POST['submit'])){ exit();}
			 if(isset($_POST['submit'])){
				 $_SESSION['class']=$_POST['class'];
           $_SESSION['sess_id']=$_POST['cat'];
             $_SESSION['term_id']=$_POST['subcat'];
			  } ?>
             <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Registered students available for <?php echo  $_SESSION['class']; ?>                   </h2>
                   <div class="box-icon"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                           
                <form method="post" action="unrelease_exe.php">
                 
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                      
                       <tr bgcolor="CCCCCC">
                         <b><input type="checkbox" id="checkAll" /> Select all</b>
                <script type="text/javascript">
                 $("#checkAll").change(function () {
                 $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>
                         <th>Student's Full Name</th>
                          <th>Gender</th>
                            <th>Result status</th>
                               <th>Tick to unrelease</th>
                   
                         
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					 
       $names = $database->query("SELECT * FROM `student_class` WHERE  `class_name`= '{$_POST['class']}' AND `account_status` = 1 ORDER BY trim(fullname) ASC");
while($students=$database->fetch_array($names)) {
$sta=$database->fetch_array($database->query("SELECT `status` FROM `score_entry`
 WHERE `class_name`= '{$_SESSION['class']}' AND `session_id`= '{$_SESSION['sess_id']}'
  AND `term_id`= '{$_SESSION['term_id']}'  AND `student_id`='{$students['student_id']}' "));
                       
                 ?>
               
                          <td class="center"><?php echo $students['fullname'];  ?></td>
                          
                          <td class="center"><?php echo $students['gender'];  ?></td>

                             <td class="center"><?php
  if($sta['status']==1){
     
      echo "<span class='label-success label label-default'>released</span>";
  }
   
      if($sta['status']==0 ){
     
      echo "<span class='label-alert label label-default'>not released</span>";
  }
    ?>
        </td>
               <td class="center">          
                         <input name="qst[]" id="checkAll" type="checkbox"  value="<?php echo  $students['student_id'];?>" type="checkbox"/>
                         </td> 
						 
                      
                       </label>
            </div>
     
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                   <input type="submit" name="submit" value="withhold result(s)"/>
                   </form>
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