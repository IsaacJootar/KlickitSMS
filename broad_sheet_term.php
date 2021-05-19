<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/accountschoolFees.php'); ?>
<?php require_once('classes/result_manager.php'); ?>
 
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
               <h4>GENERATE TERMLY BROAD SHEETS</h4></div>
         
                <a href="broadsheet.php" style="float:left" title="Go back to previous page"  data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                 
                            <button style="float:right" title="refresh  cache to display the correct data "  data-toggle="tooltip" onclick="myFunction()">Reload cached data</button>

<script>
function myFunction() {
    location.reload();
}
</script>

</br>
              <form class="form-horizontal" name="cat_form" action="" method="post">
                    <fieldset>
                
                 
                       
                  
                    <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='broad_sheet_term.php?cat=' + val ;
}

</script>
<b><h5>Select a session and the corresponding term and class to generate broad sheet</h5></b><p><p>
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
                  <td><strong>Session</strong>
<?php

echo "<select name='cat'  data-rel='chosen'  required='required' onchange=\"reload(this.form)\"><option value=''>Select A Session... </option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['id']==@$cat){echo "<option selected value='$noticia2[id]'>$noticia2[session]</option>"."<BR>";}
else{echo  "<option value='$noticia2[id]'>$noticia2[session]</option>";}
}
echo "</select>";
?>
    <strong>Term</strong>
<?php
	
echo "<select name='subcat'  data-rel='chosen'  required='required'><option value=''>Select  a term </option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[term_def]</option>";
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
                       
		?>    
                             
                       
                  <button style="float:!important" type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
                            
                    
                 
                    
                    
                       
                    
                    
                </fieldset>
            </form>
              <?php 


if(!isset($_POST['submit'])){}?>
        <?php
    if (isset($_POST['submit'])){
					
		$_SESSION['class_name']=$_POST['class_name'];
	    $_SESSION['sess']=$_POST['cat'];
		$_SESSION['term']=$_POST['subcat'];
		
					 ?>                       
             <div class="box col-md-81">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                  <a  class='btn btn-primary btn-sm'  style="float:right" target="_blank" href="broad_sheet_term_print_out.php?term=<?php echo $_SESSION['term'];?>&sess=<?php  echo   $_SESSION['sess'];?>&class_name=<?php  echo $_SESSION['class_name'];?>"><i class='glyphicon glyphicon-print' ></i> Print Preview</a>

                   <h2>Termly Broad Sheet Generated for  <?php echo $_SESSION['class_name']; ?>          </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>  </div>
                 </div>
                 <div class="box-content">
                    <table width="300" border="1" align="center">
                          <tr bgcolor="#CCCCCC">
                            <td width="200"><div align="center"><strong>STUDENTS</strong> </div></td>
                            
                            <?php
     $sql=mysql_query("SELECT distinct `class_name`, `subject_name` FROM `subject_class`
	  WHERE `class_name`='{$_POST['class_name']}'");
	  while($sub=mysql_fetch_array($sql)){ ?> 
                            <th class="rotate" style="font-weight:1"><div>
                              <div align="left"><span><font size="-2"> <?php echo $sub['subject_name'];?></font></span></div>
                            </div> </th> 
                             
                           
                            <?php } ?>
                            
                             <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><font size="-2">Total</font></span>
                            </div> </th> 
                             <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><font size="-2">Average</font></span></div>
                            </div> </th> 
                             <th class="rotate" style="font-weight:1"><div>
                              <div align="center"><span><font size="-2">  Position</font></span></div>
                            </div> </th>
                            
                          </tr>
                          
                          <?php
	  
	  ?>
                          <style type="text/css">
      th.rotate {
  /* Something you can count on */
  height:80px;

  padding:0px;

  
}

th.rotate {
 /* Safari */
-webkit-transform: rotate(-90deg);

/* Firefox */
-moz-transform: rotate(-90deg);

/* IE */
-ms-transform: rotate(-90deg);

/* Opera */
-o-transform: rotate(-90deg);
  border-collapse:collapse;
}
</style>
                          <?php
					
			$sql2=mysql_query("SELECT distinct `score_entry`. `student_id`, `score_entry`. `account_status`, `students`. `fullname` FROM `score_entry` JOIN `students` ON `score_entry`. `student_id`=`students`. `id` WHERE `class_name`= '{$_SESSION['class_name']}'
       AND `session_id`='{$_POST['cat']}' 
       AND `term_id`='{$_POST['subcat']}'
       AND `score_entry`. `account_status`=1 ORDER BY trim(fullname) ASC");

	  while($stu=mysql_fetch_array($sql2)){ ?>
                          <tr><td><div align="center"> <font size="-2">
                            <?php  echo $stu['fullname'];?></font>
                            </div></td>
                            <?php 	
					$student_id= $stu['student_id'];
					$sql3=mysql_query("SELECT `subject_name` FROM `subject_class` WHERE  `class_name`='{$_POST['class_name']}' ");
	  		while($sub=mysql_fetch_array($sql3)){
				
				$sub=$sub['subject_name'];
				
				 ?>
                            
                            <?php 
            $sql4=mysql_query("SELECT * FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_POST['class_name']}' AND `subject_name` = '{$sub}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'");
	  		     $scores=mysql_fetch_array($sql4);
		?>
                            <td style="font-size:2px"><div align="center"><font size="-2"><?php echo   $scores['term_total']; 
				
				
				?></font></div>
                
                
                </td>
                
                
               
                            
                            <?php  }?>
                            
                                                        <?php 
														
														//query table for Total score 
														
											  
            $sql7=mysql_query("SELECT SUM(term_total) AS total FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'");
	  		     $total=mysql_fetch_array($sql7);?> 	
														
														
      
                            
                             <td style="font-size:2px"><div align="center"><font size="-2"><?php echo number_format((float)$total['total'], 2, '.', '');
        
        
        ?></font></div>
                
                
                </td>
                <?php
                //query table for  average//
               
				$query1=mysql_fetch_array(mysql_query("SELECT SUM(term_total) AS total FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'"));
			$query2=mysql_num_rows(mysql_query("SELECT `subject_name` FROM `score_entry` WHERE `student_id`='{$student_id}' AND `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'"));
		?>
                
                             <td style="font-size:2px"><div align="center"><font size="-2"><?php if ($query2 < 0) {echo ' ';} 
							  if ($query2 > 0){
							      
							      
							        $obtainabl_score=$query2*100;
                            $av=$query1['total']/$obtainabl_score;
                            $av=$av*100;
							      echo $av=number_format((float)$av, 2, '.', '');}		
	

				
				
				?></font></div>
                
                
                </td>
            				   
				   <?php 		   
                $query3=mysql_query("SELECT distinct `class_name`, `term_id`, `session_id` FROM `score_entry_average` WHERE `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'");

 if($values=mysql_num_rows($query3) > 0){  
				
				// check if new students are available to be inserted first in the average table, bfor update can be carried out//
$query4="SELECT  * FROM `score_entry_average` WHERE `student_id`='{$student_id}' AND `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'";
		 $query4=mysql_query($query4);
		  if(mysql_num_rows($query4) < 1){
			$query4="INSERT INTO `score_entry_average` 
				(`student_id`, `class_name`,`session_id`, `term_id`, `average`) 
		VALUES ('{$student_id}', '{$_POST['class_name']}', '{$_POST['cat']}', '{$_POST['subcat']}', '{$av}')" ;
												$result=mysql_query($query4);  
		  }
												
			$query5="UPDATE `score_entry_average` 
				SET
				 `student_id` = '$student_id',
				 `class_name`= '{$_POST['class_name']}',
				  `term_id`= '{$_POST['subcat']}',
				  `session_id` = '{$_POST['cat']}', 
				  `average`='{$av}'
				  WHERE `student_id`='{$student_id}' AND `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'
				   "; 
				   $result=mysql_query($query5);
				
		  }
 
 // if students are not already given average then we insert.//
				   if($values=mysql_num_rows($query3) < 1){ 
		
			
		$query6="INSERT INTO `score_entry_average` 
				(`student_id`, `class_name`,`session_id`, `term_id`, `average`) 
		VALUES ('{$student_id}', '{$_POST['class_name']}', '{$_POST['cat']}', '{$_POST['subcat']}', '{$av}') ";
			$result=mysql_query($query6);	
		   			}
		   		
					
		   
		   
	   
 
             ?>

                  <td style="font-size:2px"><div align="center"><font size="-2"><?php  
       
$query7="SELECT t1.student_id, (SELECT COUNT(*) FROM score_entry_average t2 WHERE t2.average > t1.average AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}' AND `class_name`= '{$_POST['class_name']}') +1 AS rank FROM score_entry_average t1 WHERE `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}' AND `class_name`= '{$_POST['class_name']}'

";
     $query7=mysql_query($query7);
     while ($pos=mysql_fetch_array($query7)){
      $user_id=$pos['student_id'];
        $pos=$pos['rank'];
    $query8="UPDATE `score_entry_average` 
        SET
          `pos`='{$pos}'
          WHERE `student_id`='{$user_id}' AND `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'
           "; 
           $result=mysql_query($query8);
     }
       ?>
           
           
           
           
           
           <?php

$query9=mysql_fetch_array(mysql_query("SELECT `pos` FROM  `score_entry_average` WHERE `student_id`='{$student_id}' AND `class_name`='{$_POST['class_name']}' AND `session_id`='{$_POST['cat']}' AND `term_id`='{$_POST['subcat']}'"));  
echo $query9['pos'];  
  

        
        
        ?></font></div>
                
                </td>
             
             
                          </tr>
                        
                        
                     
                          <?php }?>
                          
                        
                        </table>
                        
                   <?php } // end the form submission check vpost variable?>    
            
            
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