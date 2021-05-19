<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
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
                     
              <div class="alert alert-info" align="center">
               <h4>GENERATE ASSESSMENT TEMPLATE</h4></div>
                <a href="broadsheet.php" style="float:left" title="Go back to  previous page"  data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                 
                             </br>
              <form class="form-horizontal"  action="" method="post">
                <fieldset>
                
                 
                       
               
                    </strong>
                     
                     <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='tem.php?cat=' + val ;
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
?>
                         
  
                  <button style="float:!important" type="submit" name="submit" class="btn btn-primary btn-sm">Generate</button>
                            <p>&nbsp;</p>
                    
                 
                    
                    
                       
                    
                    
                </fieldset>
            </form>
                                 
        <?php 


if(!isset($_POST['submit'])){}?>
        <?php
    if (isset($_POST['submit'])){
  $session->message("Assessment template has been generated successfully");
     
    
    $_SESSION['subcat']=$_POST['subcat'];
     $_SESSION['cat']=$_POST['cat'];
 
              
?>                        
             <div class="box col-md-11">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Assessment template for  <?php echo  $_SESSION['subcat'] ; ?> has been generated successfully            </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                 
                   <table width="222%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    
                        
                           <th width="221"><?php echo "<a target='_blank' class='btn btn-primary btn-sm' href=\"check_tem.php?section=".(urlencode($_SESSION['cat']))."\"><i class='glyphicon glyphicon-print' ></i>  Print preview template</a>" ?>
                           
                      </th>


                       </tr>
                     </thead>
                  
                     
                      
                  
                      
                       </tbody>
                     
                   </table>
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