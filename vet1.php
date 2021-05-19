<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
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
                    <a href="results_stat.php">Back</a>
                    </p> 
                    <div class="controls" align="center">
               
                                     
            <div class="alert alert-info">
             RESULT VETTING 
            </div>
            
             <form class="form-horizontal" action="check_vet_type.php" method="post">
              <div align="left">
                   
              </div>
              
              
               
                  
                  <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='vet1.php?cat=' + val ;
}

</script>
                  <b>Select a class and a corresponding subject to proceed</b>
                  <p><p>
<?Php

@$cat=$_GET['cat']; // category, as in class//
///////// Getting the data from Mysql table for first list box//////////
 $quer2="SELECT * FROM `classes` order by id"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
if(isset($cat)){
$quer="SELECT * FROM `subject_class` where `class_name`='{$cat}'"; 
}else{$quer="SELECT DISTINCT subject_name FROM `subject_class`"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////


echo "<select name='cat'  data-rel='chosen'  required='required' onchange=\"reload(this.form)\"><option value=''>Select Class Name /Search class</option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['class_name']==@$cat){echo "<option selected value='$noticia2[class_name]'>$noticia2[class_name] </option>"."<BR>";}
else{echo  "<option value='$noticia2[class_name]'>$noticia2[class_name]</option>";}
}
echo "</select>";
	
echo "<select name='subcat'  data-rel='chosen'  required='required'><option value=''>Select a Subject</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[subject_name]'>$noticia[subject_name]</option>";
}
echo "</select>";
?><a class="btn btn-default" href="vet1.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Reset &amp; start again</a> 
              <p>&nbsp;</p>
              
                 
              <p class="center col-md-2" align="center">
    <button type="submit" class="btn btn-primary">Proceed to Vet</button>
              </p> 
                 
              <p>&nbsp;</p>
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