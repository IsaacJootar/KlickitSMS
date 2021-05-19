<?php include('includes/s_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/accountschoolBus.php'); ?>


       
            
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
               <h4>SCHOOL BUS PAYMENT DETAILS</h4></div>
                <a href="100bfstudent_gpanel.php" style="float:left" title="Go back to  payment details"  data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                 
                              <a class="btn btn-default" title="click here to refreash page " data-toggle="tooltip" href="s_view_bus.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Refresh page</a></br>
              <form class="form-horizontal" name="cat_form" action="" method="post">
                    <fieldset>
                
                 
                       
                  
                      <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='s_view_bus.php?cat=' + val ;
}

</script>
<b>Select a session and term to view payments</b><p><p>
<?Php

@$cat=$_GET['cat']; //
///////// Getting the data from Mysql table for first list box//////////
 $quer2="SELECT id, session FROM `session_manager` WHERE `status`='Current Session' order by id"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
if(isset($cat)){
$quer="SELECT * FROM `term` where sess_id=$cat order by `sess_id`"; 
}else{$quer="SELECT DISTINCT id, term_code, term_def FROM term order by id"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////
?>
<strong>
                            <td>Session</td>
                    </strong>
<?php

echo "<select name='cat'  data-rel='chosen'  required='required' onchange=\"reload(this.form)\"><option value=''>Select A Session... </option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['id']==@$cat){echo "<option selected value='$noticia2[id]'>$noticia2[session]</option>"."<BR>";}
else{echo  "<option value='$noticia2[id]'>$noticia2[session]</option>";}
}
echo "</select>";
?>
<strong>
                            <td>Term</td>
                    </strong>
<?php
	
echo "<select name='subcat'  data-rel='chosen'  required='required'><option value=''>Select  a term </option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[term_code]</option>";
}
echo "</select>";
                    
      ?>                 
                       
                  <button style="float:!important" type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
                            <p>&nbsp;</p>
                    
                 
                    
                    
                       
                    
                    
                </fieldset>
            </form>
                                 
        <?php 


if(!isset($_POST['submit'])){}?>
        <?php
    if (isset($_POST['submit'])){
					
		$_SESSION['sess']=$_POST['cat'];
		$_SESSION['term']=$_POST['subcat'];
	   
						   }
?>                        
             <div class="box col-md-12">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Current Bus Payment Records           </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                   <table width="322%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr>
                         
                         
                         <th align="center">Student</th>
                         <th align="center"> class</th>
                         
                            <th align="center">Amount Paid(₦)</th>
                             <th align="center">Payment id</th>
                           
                          
                              <th align="center">Recieved On</th>
                                  <th align="center">Print Receipt</th>
                                  
                              
                           
                       </tr>
                     </thead>
                     <tbody>
                     
                       <?php
					  global $database;
      $payment=accountschoolBus::find_student_bus_details($sess_id, $term_id, $s_id);
foreach($payment as  $pay) { ?>
                            
        
         <?php
 $fullname=$database->query("SELECT `fullname` FROM `student_class` WHERE `student_id`= '{$pay->student_id}'");
$fullname=$database->fetch_array($fullname);?>
		
		  <td class="center"><?php echo ucwords($fullname=$fullname['fullname']); ?></td>
		 
          <td class="center"><?php echo   $pay->class_name;  ?></td>
           <td class="center"><?php echo   $pay->have_paid;  ?></td>
                     
                          
                         
                        <td class="center"><?php echo $pay->trans_id ;  ?></td>
                    
                          <td class="center"><?php echo $pay->created_on;  ?></td>
                              <td class="center">	<?php echo "<a target='_blank' class='btn btn-primary btn-sm' href=\"s_pay_bus_print_receipt.php?payment_id=".urlencode(($pay->trans_id))."\"><i class='glyphicon glyphicon-print'
                                ></i>  Print</a>" ?> </td>
                        
                           
                           
                     
                     </tr>
                     <?php }?>
                  
                      
                       </tbody>
                     
                   </table>
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