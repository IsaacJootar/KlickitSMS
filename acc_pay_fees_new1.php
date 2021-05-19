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
              SCHOOL FEES PAYMENT FOR NEW STUDENTS</div>
            <?php  
              
      ?>
             <form class="form-horizontal" action="acc_pay_fees_new2.php" name="class_name" method="post">
               <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='acc_pay_fees_new1.php?cat=' + val ;
}

</script>
<b><h5>Select a session and the corresponding term to access fees</h5></b><p><p>
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
echo "<select class='form-control' name='class' required><option value=''>-----</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[class_name]'>$noticia[class_name]</option>";

}
echo "</select>";
                       
    ?> 
    </div><p>   
               </fieldset>    
              <p class="center col-md-2" align="center">
                  
    <button type="submit" class="btn btn-primary">Proceed</button>
              </p> 
                 
              <p>&nbsp;</p>
             </form>
             <?php 
            
            
            
            if(isset($_POST['submit'])){
             $_SESSION['class']=$_POST['class'];
             $_SESSION['sess_id']=$_POST['cat']; 
             $_SESSION['term_id']=$_POST['subcat'];
      
             
            }
            ?>
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