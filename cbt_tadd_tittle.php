<?php include('includes/t_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config.php'); ?>
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
        ?>        <a href="t_cbt.php"> << Back </a>
                  <?php echo $session->display_error(); ?>         
                     
                 <div class="alert alert-info" align="center">
               <h4>Manage CBT Exam Questions</h4></div>
              <p align="center">
            
             
          
                <div class="box-header well" data-original-title="">
                    <h2>Create A New Exam Title</h2>

                    <div class="box-icon">
                        
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                   <form class="form-horizontal" action="cbt_tadd_tittle_exe.php" method="post">
                <fieldset>
                                              <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='cbt_tadd_tittle.php?cat=' + val ;
}

</script>
<b>Select a class and a corresponding subject</b><p><p>
<?Php

@$cat=$_GET['cat']; 
///////// Getting the data from Mysql table for first list box//////////
 $quer2="SELECT * FROM `staff_class` WHERE `staff_id`='{$id}' order by id"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
if(isset($cat)){
$quer="SELECT * FROM `subject_teacher` WHERE `class_name`= '{$cat}' AND `staff_id`='{$id}' "; 
}else{$quer="SELECT DISTINCT subject_name FROM `subject_teacher` order by subject_name"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////


echo "<select name='cat'  class='form-control'  required='required' onchange=\"reload(this.form)\"><option value=''>Select a class</option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['class_name']==@$cat){echo "<option selected value='$noticia2[class_name]'>$noticia2[class_name]</option>"."<BR>";}
else{echo  "<option value='$noticia2[class_name]'>$noticia2[class_name]</option>";}
}
echo "</select>. '  '.";
  
echo "<select name='subcat'  class='form-control'  required='required'><option value=''>Select a subject</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[subject_name]'>$noticia[subject_name]</option>";
}
echo "</select>";

 ?>
                    <div  class="input-group col-md-9">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil red"></i></span>
                        <input type="text" name="tittle" required class="form-control" placeholder="Type Your Exam title  Here">
                    </div><p>
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Save Title</button>
                    </p>
                </fieldset>
            </form>
                    
                </div>
            </div>
        </div>
             <div class="box col-md-16">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>My CBT Questions</h2>
                 </div>
                 <div class="box-content">
                  <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Class</th>
                         <th>Subject</th>
                           <th>Test Titles / Topic</th>
                            <th> Term</th>
                            <th>Session</th>
                           <th>Action</th>
                             <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
            if(!isset($_GET['id'])){$_GET['id']= "";};
       $classes = $database->query("SELECT * FROM `cbt_question_tittle` WHERE `staff_id`='{$id}' order by `id` desc");
foreach($classes  as $class ) { 
   $sess= $database->query("SELECT * FROM `session_manager` WHERE `id`='{$class['sess_id']}'");
   $sess=$database->fetch_array($sess);

    ?>                   
         <td class="center"><?php echo  $class['class_name'] ;  ?></td>
                       <td class="center"><?php echo  $class['subject_name'];  ?></td>
                           <td class="center"><?php echo "<span class='label-success label label-default'> " .   $class['tittle_text'];  ?></span></td>
                           <td class="center"><?php echo  $class['term'];  ?></td>
                           <td class="center"><?php echo  $sess['session'];  ?></td>
                          
                           
                          
                            <td style="font-size:12px" class="center"> <a href="cbt_tdelete_tittle.php?id=<?php echo urlencode($class['id']) ?>"> remove </a> </td>
                      <td style="font-size:12px" class="center"> 
<?php
    // add questions link should only display for current term. I Dont want folks adding questions for past terms
    if ($class['term'] == $term) { ?>
      <a href="cbt_tadd_questions.php?id=<?php echo urlencode($class['id']) ?>"> proceed to questions </a> </td>
    <?php }else{
      echo "Passed term";
    }
?>
                        
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                   
                 <p>&nbsp;                        </p>
                      ``
            
  
<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->


   
 <?php include('includes/footer.php'); ?>