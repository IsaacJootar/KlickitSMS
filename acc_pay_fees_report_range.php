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
               <h4>Genarate income reports from certain period of time</h4></div>
                <a href="acc_pay_fees_reports.php" style="float:left" title="Go back to  payment details"  data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                 
                              <a class="btn btn-default" title="click here to refreash page " data-toggle="tooltip" href="acc_pay_fees_report_range.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Refresh page</a></br>
              <form class="form-horizontal" name="cat_form" action="" method="post">
                <fieldset>
                
                 
                       
                  
                      <strong><td>From </td> 
                    </strong>
                         <input type="text" name="from" readonly id="datepicker1">

          <strong><td>To </td>
                  </strong>
                        
                      <input type="text" name="to" readonly id="datepicker2">
                    
	
                  <button style="float:!important" type="submit" name="submit" class="btn btn-primary btn-sm">Generate Report</button>
                            <p>&nbsp;</p>
                    
                 
                    
                    
                       
                    
                    
                </fieldset>
            </form>
                                 
        <?php 


if(!isset($_POST['submit'])){}?>
        <?php
    if (isset($_POST['submit'])){
					
		 $_SESSION['from']=$_POST['from'];
		 $_SESSION['to']=$_POST['to'];
	     //$_SESSION['item_id']=$_POST['item_id'];
		
						   }
?>                        
             <div class="box col-md-11">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Income report generated from [ <?php echo  $_SESSION['from']. ' ' .' To' . ' ' .  $_SESSION['to'];?>]              </h2>
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
					  
      $expense=accountschoolFees::find_fees_all_by_date_range($_SESSION['from'], $_SESSION['to']);
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
                  
                     <strong style="color:#F00" style="float:inherit">Total income this term: </strong>
                     <?php
                    echo  $total=accountschoolFees::find_total_fees_per_term1($sess_id, $term_id);
			
				  ?>
                  by <?php 
				 echo $total=accountschoolFees::find_total_number_of_payments($sess_id, $term_id);?>
                  <strong style="color:#F00" style="float:inherit">students</strong>
                       </tbody>
                     
                   </table>
                             <th width="400"><?php echo "<a target='_blank' class='btn btn-primary btn-sm' href=\"acc_pay_fees_range_print.php?from=".(urlencode($_SESSION['from']))."&&to=".(urlencode($_SESSION['to']))."&&item_id=".(urlencode($_SESSION['item_id']))."\"><i class='glyphicon glyphicon-print' ></i>  Print this report</a>" ?>
                      </th>
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