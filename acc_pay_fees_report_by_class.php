<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/accountschoolFees.php'); ?>
<script src="jquery-ui-1.12.0/jquery-1.12.4.js"></script>
  <script src="jquery-ui-1.12.0/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker1" ).datepicker();
	 $( "#datepicker2" ).datepicker();
  } );
  </script>

            
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
               <h4>Genarate income reports by class</h4></div>
                <a href="acc_pay_fees_reports.php" style="float:left" title="Go back to  payment details"  data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                 
                              <a class="btn btn-default" title="click here to refreash page " data-toggle="tooltip" href="acc_pay_fees_report_by_class.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Refresh page</a></br>
              <form class="form-horizontal" name="cat_form" action="" method="post">
                <fieldset>
                
                 
                       
                   <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='acc_pay_fees_report_by_class.php?cat=' + val ;
}

</script>
<b><h5>Select a session, term, class and  corresponding student type to generate report</h5></b><p><p>
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
echo "<select name='class'  data-rel='chosen' required  ><option value=''>Select a class.......</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[class_name]'>$noticia[class_name]</option>";
}
echo "</select>";
                       
		?>    
		 <strong>Student Type</strong>
                             <?php
                        
echo "<select name='type'  data-rel='chosen' required  ><option value=''>Select condition</option>";

echo  "<option value='0'>[new students]</option>";
echo  "<option value='1'>[old students]</option>";
echo  "<option value='2'>[both old and new]</option>";
echo "</select>";
                       
		?>    
	
                  <button style="float:!important" type="submit" name="submit" class="btn btn-primary btn-sm">Generate Report</button>
                            <p>&nbsp;</p>
                    
                 
                    
                    
                       
                    
                    
                </fieldset>
            </form>
                                 
        <?php 


if(!isset($_POST['submit'])){}?>
        <?php
    if (isset($_POST['submit'])){
					
	
		
						   
?>                        
             <div class="box col-md-11">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Income report generated for [ <?php echo  $_POST['class'];?>]              </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                   <table width="322%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr>
                         
                        
                         <th align="center">Student name</th>
                         <th align="center"> Actual Fee</th>
                         
                            <th align="center">Amount paid</th>
                              <th align="center">Balance</th>
                             <th align="center">Trans. id</th>
                          
                              <th align="center">Date of last payment</th>
                                 
                           
                       </tr>
                     </thead>
                     <tbody>
                     
                       <?php
if($_POST['type']==0){
    $expense=accountschoolFees::find_by_sql("SELECT * FROM `acc_student_fees_with_items` WHERE `sess_id`='{$_POST['cat']}' AND `term_id`= '{$_POST['subcat']}' AND `class_name`= '{$_POST['class']}' AND `student_type`= 0");
    
}

if($_POST['type']==1){
    $expense=accountschoolFees::find_by_sql("SELECT * FROM `acc_student_fees_with_items` WHERE `sess_id`='{$_POST['cat']}' AND `term_id`= '{$_POST['subcat']}' AND `class_name`= '{$_POST['class']}' AND `student_type`= 1");
    
}
if($_POST['type']==2){
    $expense=accountschoolFees::find_by_sql("SELECT * FROM `acc_student_fees_with_items` WHERE `student_type` BETWEEN 0 AND 1 AND `sess_id`='{$_POST['cat']}' AND `term_id`= '{$_POST['subcat']}' AND `class_name`= '{$_POST['class']}' ");
    
}
					 
      
foreach($expense as $exp) { 

 $query1="SELECT `username`, `fullname` FROM `students` WHERE `id`=$exp->student_id"; 
 $result1=mysql_query($query1);
$username = mysql_fetch_array($result1);
?>
                             <td class="center"><?php echo ucwords(strtolower($username['fullname']));  ?></td>
         <td class="center"><?php echo  $format_currency=accountschoolFees::format_currency($exp->expected_to_pay);  ?></td>
                     
                           <td class="center"><?php echo  $format_currency=accountschoolFees::format_currency($exp->have_paid);  ?></td>
          <td class="center"><?php 
	  if($exp->have_paid <  $exp->expected_to_pay){
		  echo  $format_currency=accountschoolFees::format_currency($exp->expected_to_pay - $exp->have_paid);
	  }
	  if($exp->have_paid >= $exp->expected_to_pay){
		 
		  echo "none";
      
	  }
	   ?>        
           </td>
                        <td class="center"><?php echo  $exp->trans_id ;  ?></td>
                          <td class="center"><?php echo  $exp->date;  ?></td>
                              
                     
                     </tr>
                     <?php }?>
Total income for   <strong style="color:#F00" style="float:inherit"><?php
                     echo accountschoolFees::find_term($_POST['subcat']);?>, 
                     <?php echo accountschoolFees::find_session($_POST['cat']); ?> session </strong> is 
                     <?php echo $total=accountschoolFees::find_total_fees_per_term1($_POST['cat'], $_POST['subcat']);?>
                    
                  paid by <strong style="color:#F00" style="float:inherit"><?php 
				 echo $total=accountschoolFees::find_total_number_of_payments($_POST['cat'], $_POST['subcat']);?>
                  students</strong>
                       </tbody>
                     
                   </table>
                             <th width="400"><?php echo "<a target='_blank' class='btn btn-primary btn-sm' href=\"acc_pay_fees_report_by_class_print.php?sess_id=".(urlencode($_POST['cat']))."&&term_id=".(urlencode($_POST['subcat']))."&&class=".(urlencode($_POST['class']))."&&type=".(urlencode($_POST['type']))."\"><i class='glyphicon glyphicon-print' ></i>  Print this report</a>" ?>
                      </th>
            </div>

        </div>
    </div>
                 
              <?php } ?>   </div>
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