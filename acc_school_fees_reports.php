<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
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
                      <a href="acc_manage_school_fees.php" title="Click here to go back to previous page " data-toggle="tooltip">   Back</a> <?php echo ' '. ' ' ;   ?>
                    <div class="controls" align="center">
               
            <div class="alert alert-info">
              SCHOOL TUITION REPORTS</div>
            <?php  
              
      ?>
              <form class="form-horizontal"  action="" method="post">
                <fieldset>
                
                 
                       
                  
                   <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='acc_school_fees_reports.php?cat=' + val;
}

</script>
<b><h5>Select appropriate combinations to generate report</h5></b><p><p>
<?Php

@$cat=$_GET['cat']; //
///////// Getting the data from Mysql table for first list box//////////
 $quer2="SELECT id, session FROM `session_manager` order by id"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
if(isset($cat)){
$quer="SELECT * FROM `term` where sess_id=$cat order by `sess_id` "; 
}else{$quer="SELECT DISTINCT id, term_code, term_def FROM term order by id"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////
?>
                     <fieldset>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon">Select Session  </span>
<?php

echo "<select class='form-control' name='cat' required='required' onchange=\"reload(this.form)\"><option value=''></option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['id']==@$cat){echo "<option selected value='$noticia2[id]'>$noticia2[session]</option>"."<BR>";}
else{echo  "<option value='$noticia2[id]'>$noticia2[session]</option>";}
}
echo "</select>";
?>
</div><p>
<div class="input-group col-md-4">
<span class="input-group-addon">Select Term </span>
<?php
echo "<select class='form-control' name='subcat' required><option value=''>-----</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[term_def]</option>";
}
echo "</select>";
                    
      ?>  
</div><p>
<?php
$quer="SELECT class_name FROM `classes`"; ?>
<div class="input-group col-md-4">
<span class="input-group-addon">Select Class  </span>
<?php
echo "<select class='form-control' name='class_name' required><option value=''>-----</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[class_name]'>$noticia[class_name]</option>";

}
echo "</select>";
                       
    ?> 
    </div><p>
 <div class="input-group col-md-4">
<span class="input-group-addon">Student Type </span>
<?php
echo "<select class='form-control' name='s_type' required><option value=''>-----</option>";
echo  "<option value='=1'>Returning Student</option>";
echo  "<option value='=0'>New Students</option>";
echo  "<option value='BETWEEN 0 AND 1'>All Students</option>";
echo  "</select>";
                    
      ?>  
</div><p>
               </fieldset>    
              <p class="center col-md-2" align="center">
  
                  <button style="float:!important" type="submit" name="submit" class="btn btn-primary btn-sm">generate report</button>
                            <p>&nbsp;</p>
                    </fieldset>
            </form>
                                 
        <?php 
if(!isset($_POST['submit'])){}?>
        <?php
    if (isset($_POST['submit'])){ 
   $_SESSION['sess_id']=$_POST['cat'];
    $_SESSION['term_id']=$_POST['subcat'];
    $_SESSION['s_type']=$_POST['s_type'];
     $_SESSION['class_name']=$_POST['class_name'];
              
?>                        
             <div class="box col-md-11">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Tuition report Generated                </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                 
             
                    
                        
                          
                                              
        <?php echo "<a target='_blank' class='btn btn-primary btn-sm' href=\"acc_school_fees_reports_print.php?class_name=".(urlencode($_SESSION['class_name']))."&&s_type=".(urlencode($_SESSION['s_type']))."&&sess_id=".(urlencode($_SESSION['sess_id']))."&&term_id=".(urlencode($_SESSION['term_id']))."\"><i class='glyphicon glyphicon-print' ></i>  click to preview report</a>" ?>
                           
             

                       </tr>
                     </thead>
                  
                     
                      
                  
                      
                       </tbody>
                     
                 
                   <?php } // end loop?>
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
                 
              
             <p>&nbsp;</p>
 </div>
             </p>
               <p>&nbsp;                        </p>
                     
             
           
<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
   
 <?php include('includes/footer.php'); ?>