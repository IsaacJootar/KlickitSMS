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
               <h4>GENERATE STUDENT CUMULATIVE RESULTS BY CLASS</h4></div>
                <a href="results_stat.php" style="float:left" title="Go back to  previous page"  data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                 
                            
             <form class="form-horizontal" name="cat_form" action="" method="post">
                    <fieldset>
                
                 
<b><h5>Select a session and class to generate cummulative results</h5></b><p><p>
<?Php

///////// Getting the data from Mysql table for first list box//////////
 $quer2="SELECT id, session FROM `session_manager` order by id"; 
///////////// End of query for first list box////////////
?>
                  <td><strong>Session</strong>
<?php

echo "<select name='cat'  data-rel='chosen'  required='required' onchange=\"reload(this.form)\"><option value=''>Select A Session... </option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['id']==@$cat){echo "<option selected value='$noticia2[id]'>$noticia2[session]</option>"."<BR>";}
else{echo  "<option value='$noticia2[id]'>$noticia2[session]</option>";}
}
echo "</select>";
?>
           <strong>Class</strong>
                             <?php
                        $quer="SELECT class_name FROM `classes`"; 
echo "<select name='class_name'  data-rel='chosen' required  ><option value=''>Select a class.......</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[class_name]'>$noticia[class_name]</option>";
}
echo "</select>";
 echo "<select name='page_count'  data-rel='chosen' required  ><option value=''>Select pagination</option>";

echo  "<option value='1'>1-10</option>";
echo  "<option value='2'>11-20</option>";
echo  "<option value='3'>21-30</option>";
echo  "<option value='4'>31-40</option>";
echo  "<option value='5'>41-50</option>";
"<option value='6'>51-60</option>";
echo "</select>";
                       
    ?>    
                             
                       
                  <button style="float:!important" type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
                            
                    
                 
                    
                    
                       
                    
                    
                </fieldset>
            </form>
                                 
        <?php 


if(!isset($_POST['submit'])){}?>
        <?php
    if (isset($_POST['submit'])){
	$session->message("Student Results  for $_POST[class_name] has been generated successfully");
	   
		
		$_SESSION['sess_id']=$_POST['cat'];
      $_SESSION['class_name']=$_POST['class_name'];
      $_SESSION['page_count']=$_POST['page_count'];
						  
?>                        
             <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Student cumulative Results Generated for <?php echo  $_POST['class_name']; ?>                </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                 
                  
                    
                        
                          
                          <?php echo "<a target='_blank' class='btn btn-primary btn-sm' href=\"a_cumulative_results.php?class_name=".(urlencode($_SESSION['class_name']))."&&sess_id=".(urlencode($_SESSION['sess_id']))."&&term_id=".(urlencode($term_id))."\"><i class='glyphicon glyphicon-print' ></i>  Print preview filtered Result</a>" ?>
                     

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