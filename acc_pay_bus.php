<?php include('includes/acc_header.php'); ?>
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
               <h4>MANAGE SCHOOL BUS PAYMENTS</h4></div>
                                 
                 <a href="700jstpxvzpdo_accts.php" title="Click here to go back to main page " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon"></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                
                       
                        
                <div class="box col-md-5">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Make Bus  Payments</h2>

                    
                </div>
                 <form name="form" method="post" action="acc_pay_bus_exe.php">
                 
                            <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='acc_pay_bus.php?cat=' + val ;
}

</script>
<b>SELECT STUDENT'S CLASS</b><p><p>
<?Php

@$cat=$_GET['cat']; 
///////// Getting the data from Mysql table for first list box//////////
 $quer2="SELECT * FROM `classes` order by id"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
if(isset($cat)){
$quer="SELECT * FROM `student_class` WHERE `class_name`= '{$cat}'"; 
}else{$quer="SELECT DISTINCT fullname FROM `student_class` order by fullname"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////


echo "<select name='cat'  data-rel='chosen'  required='required' onchange=\"reload(this.form)\"><option value=''>Select a class......</option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['class_name']==@$cat){echo "<option selected value='$noticia2[class_name]'>$noticia2[class_name]</option>"."<BR>";}
else{echo  "<option value='$noticia2[class_name]'>$noticia2[class_name]</option>";}
}
echo '</select>'. '</br>'. '</br>';
echo '<strong>'. 'SELECT STUDENT\'S NAME'. '</strong>'. '</br>'. '</br>';
echo "<select name='subcat'  data-rel='chosen'  required='required'><option value=''>Select Student</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[student_id]'>$noticia[fullname]</option>";

}
echo "</select>". '</br>'. '</br>'; ?>

 <?php
 echo '<strong>'. 'SELECT BANK'. '</strong>'. '<p>';
  $sql="SELECT id, bank_name FROM `acc_bank`"; 
echo "<select name='bank_id'  required='required'  data-rel='chosen' ><option value=''>Select Bank</option>";
foreach ($dbo->query($sql) as $bank) {
echo  "<option value='$bank[id]'>$bank[bank_name]</option>";
}
echo "</select>" . '</br>'. '</br>';
                       
		?> 
        
       
        <tr>
<td>
<strong>
ENTER BANK TELLER NO. </strong></br><p>
<input type="text" name="teller_no" title="Enter the teller number on your payment slip"  required />
</p>
</td>
</tr> 
<tr>
<td>
<strong></br><p>
ENTER BUS FARE AMOUNT</strong></br><p>
<input type="number" name="have_paid" title="enter the school fees amount you paid" required />

</p>
</td>
</tr>
 <?php
 echo '</br>';
 echo '<strong>'. 'SELECT DESTINATION'. '</strong>'. '<p>';
  $sql="SELECT id, route_name FROM `acc_bus_routes`"; 
echo "<select name='route_id'  required='required'  data-rel='chosen' ><option value=''>Select Bus Route</option>";
foreach ($dbo->query($sql) as $route) {
echo  "<option value='$route[id]'>$route[route_name]</option>";
}
echo "</select>" . '</br>'. '</br>';
                       
		?> 
 <div class="clearfix"></div>
                    
                         <button type="submit" class="btn btn-primary">Pay</button>
                    
                            
                        </form>
            </div>
        </div>
        
        
        
            
                 
                </div>
                
             <div class="box col-md-7">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>List of Recent Payments                </h2>
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
      $payment=accountschoolBus::find_all($sess_id, $term_id);
foreach($payment as  $pay) { ?>
                            
        
         <?php
 $fullname=$database->query("SELECT `fullname` FROM `student_class` WHERE `student_id`= '{$pay->student_id}'");
$fullname=$database->fetch_array($fullname);?>
		
		  <td class="center"><?php echo ucwords($fullname=$fullname['fullname']); ?></td>
		 
          <td class="center"><?php echo   $pay->class_name;  ?></td>
           <td class="center"><?php echo   $pay->have_paid;  ?></td>
                     
                          
                         
                        <td class="center"><?php echo $pay->trans_id ;  ?></td>
                    
                          <td class="center"><?php echo $pay->created_on;  ?></td>
                              <td class="center">	<?php echo "<a target='_blank' class='btn btn-primary btn-sm' href=\"acc_pay_bus_print_receipt.php?payment_id=".urlencode(($pay->trans_id))."\"><i class='glyphicon glyphicon-print'
                                ></i>  Print</a>" ?> </td>
                        
                           
                           
                     
                     </tr>
                     <?php }?>
                  
                      
                       </tbody>
                     
                   </table>
                
                 
    </div>
                 
                 </div>
               </div>
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