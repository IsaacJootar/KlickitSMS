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
               <h4>GENERATE STUDENT RESULT CUMULATIVE (SINGLE)</h4></div>
                <a href="results_stat.php" style="float:left" title="Go back to  previous page"  data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                 
                              <a class="btn btn-default" title="click here to refreash page " data-toggle="tooltip" href="" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Refresh page</a></br>
              <form class="form-horizontal"  action="" method="post">
                <fieldset>
                
                 
                       
                  
                    <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='generate_single_result_cumulative.php?cat=' + val ;
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
                  <td>Session</td>
                  <?php

echo "<select name='cat'  data-rel='chosen'  required='required'><option value=''>Select</option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['id']==@$cat){echo "<option selected value='$noticia2[id]'>$noticia2[session]</option>"."<BR>";}
else{echo  "<option value='$noticia2[id]'>$noticia2[session]</option>";}
}
echo "</select>";
?>

         <td>Student Name</td> <?php
                        $quer="SELECT student_id, fullname FROM  `student_class` ORDER BY trim(fullname) ASC"; 
echo "<select name='student_id'  data-rel='chosen' required  ><option value=''>Select</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[student_id]'>$noticia[fullname]</option>";
}
?><?php
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
    $_SESSION['sess_id']=$_POST['cat'];
    //$_SESSION['term_id']=$_POST['subcat'];
    $_SESSION['student_id']=$_POST['student_id'];
              
?>                        
             <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Student Cumulative Result is Generated                </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                 
             
                    
                        
                          
                          <?php echo "<a target='_blank' class='btn btn-primary btn-sm' href=\"single_result_cumulative.php?student_id=".(urlencode($_SESSION['student_id']))."&&sess_id=".(urlencode($_SESSION['sess_id']))."&&term_id=".(urlencode($term_id))."\"><i class='glyphicon glyphicon-print' ></i>  Print preview filtered Result</a>" ?>
                           
                    

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