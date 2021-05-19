<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/accountExpense.php'); ?>
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
               <h4>GENERATE EXPENSE REPORTS</h4></div>
                <a href="acc_expense.php" style="float:left" title="Go back to  payment details"  data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                
              <form class="form-horizontal" name="cat_form" action="" method="post">
                <fieldset>
                
                 
                       
                  
                      <strong><td>From </td> 
                    </strong>
                         <input type="text" name="from" readonly id="datepicker1">

          <strong><td>To </td>
                  </strong>
                        
                      <input type="text" name="to" readonly id="datepicker2">
                    
                       
                          <strong>
                            <td>Select Expense Item</td>
                    </strong>
                            <?php
                        $quer="SELECT DISTINCT `item_name`, `cat_name` FROM  `acc_expense` WHERE `sess_id`='{$sess_id}' AND `term_id`='{$term_id}'"; 
echo "<select name='item_name' required  data-rel='chosen' ><option value=''>-------------------</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[item_name]'>$noticia[item_name] [$noticia[cat_name]]</option>";
}
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
		
		$_SESSION['from']= $_POST['from'];
		 $_SESSION['to']= $_POST['to'];
	   $_SESSION['item_name']=$_POST['item_name'];

     $date1=$_POST['from'];
    $from=date('D, M j, Y',  strtotime($date1));
    $date2=$_POST['to'];
    $to=date('D, M j, Y',  strtotime($date2));
    
		
						   }
?>                        
             <div class="box col-md-11">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Expense Generated from [ <?php echo $from. ' ' .' To' . ' ' .  $to;?>]              </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                   <table width="322%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr>
                         
                        
                         
                         <th align="center"> Item </th>
                         
                            <th align="center">Amount(₦)</th>
                             <th align="center">Expense ID</th>
                          
                              <th align="center">Created On</th>
                    
                           
                       </tr>
                     </thead>
                     <tbody>
                     
                       <?php
					  
      $expense=accountExpense::find_an_item_by_date_range($_SESSION['from'], $_SESSION['to'], $_SESSION['item_name']);
foreach($expense as $exp) { ?>
                            
                    <td class="center"><?php echo  $exp->item_name;  ?></td>
                     
                    <td class="center"><strong> <?php echo  $exp->expense_amount ;  ?></td>
                       
                         
                    <td class="center"><?php echo   $exp->expense_id ;  ?></td>
                    <td class="center"><?php echo  $exp->created_on;  ?></td>
                              
                     
                     </tr>
                     <?php }?>
                  
                     <strong style="color:#F00" style="float:inherit">Total Expense: </strong>
                     <?php
                     $total=accountExpense::find_total_expense($sess_id, $term_id);
				 echo '<b>'.$format_currency=accountExpense::format_currency($total). '<b>';
				  ?>
                  on <?php 
				 echo $total=accountExpense::find_total_number_of_items($sess_id, $term_id);?>
                 items for this current term
                       </tbody>
                     
                   </table>
                              <th width="400"><?php echo "<a target='_blank' class='btn btn-primary btn-sm' href=\"acc_expense_print_out.php?from=".(urlencode($_SESSION['from']))."&&to=".(urlencode($_SESSION['to']))."&&item_name=".(urlencode($_SESSION['item_name']))."\"><i class='glyphicon glyphicon-print' ></i>  view / print this report</a>" ?>
                       <?php echo "<a target='_blank' class='btn btn-primary btn-sm' href=\"acc_daily_expense_print.php\"><i class='glyphicon glyphicon-print' ></i>  View today's  expense report</a>" ?></th>
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