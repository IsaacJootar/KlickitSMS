<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/accountmonthlypayrollconfig.php'); ?>
<?php
		 
?>
       
            
                
             
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
               
             <div class="box col-md-5">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Click  on staff name to Display Details</h2> <a href="acc_payroll.php" title="go back to previous page"><< Back</a>

                </div>
                <div class="box-content">
                  <table  class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
                     <thead>
                       <tr bgcolor="CCCCCC">       
                       </tr>
                     </thead>
                     <tbody>
                     <?php
					 global $database;
					 $month=date('F');
					 $year=date('Y');
                      // make these names come from school fee tables, insteal of whole students in a class.//
       $query=$database->query("SELECT  * FROM `acc_staff_monthly_payroll` WHERE `sess_id`='{$sess_id}' AND `term_id`= '{$term_id}' AND `payroll_month`='{$month}' AND `payroll_year`='{$year}' GROUP BY `staff_id`");
		if (!$result){
			die("database query faild". mysql_error());
		}
		while($staff=$database->fetch_array($query)){	
		$_SESSION['payroll_month']=$staff['payroll_month'];
		$_SESSION['payroll_year']=$staff['payroll_year'];
		
		?>
        
                       
         <td class="center"><img src="images/staff.png" width="33" height="33" alt=""/><?php echo "<a href=\"acc_pr_manage_staff_payments.php?fullname={$staff['fullname']}&&id=".urlencode(($staff['staff_id']))."\"> {$staff['fullname']}</a>" ?> </td>
                        
                          
                                               </tr>
  <?php }?>
                   </table>
                </div>
            </div>
        </div>
             <div class="box col-md-7">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2 align="center">Staff salary Details for the month of <?php echo $_SESSION['payroll_month']; ?></h2> </div>
                   <?php 
				 if (isset($_GET['id'])){
					 @$id=$_GET['id'];
				 $check=mysql_query("SELECT * FROM `acc_staff_monthly_payroll` WHERE `staff_id`='{$id}' AND `sess_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `payroll_month`='$month'  AND `payroll_year` ='$year'");
				 if($check=mysql_num_rows($check) < 1){; ?>
                 <?php echo "No Payment details where found for this staff"; // this senario is unlikely anyway?>
				    <?php
					 exit();
					 }
				 }
				  ?>
              <?php       if(!isset($_GET['id'])){ exit();}
			 if(isset($_GET['id'])){
				// $id=$_GET['id']; // id twice? but no time joor, i wont check//
				  $fullname=$_GET['fullname'];
				 // $_SESSION['fullname']=$_GET['fullname'];
				   $_SESSION['staff_id']=$_GET['id'];
				   
				   
			  } ?>
              
      
     
     
 
</table><?php
                    $get_data=$database->query("SELECT * FROM `acc_staff_monthly_payroll` WHERE `staff_id`= '{$_SESSION['staff_id']}' AND `payroll_month`='$month'  AND `payroll_year` ='$year'");
		$get_data=$database->fetch_array($get_data);
		 $_SESSION['salary_amount']=$get_data['salary_amount'];
		 $_SESSION['staff_id']=$get_data['staff_id'];
		 $_SESSION['coo_status']=$get_data['coo_status'];
		 $_SESSION['gender']=$get_data['gender'];
		  $_SESSION['payroll_month']=$get_data['payroll_month'];
		   $_SESSION['payroll_year']=$get_data['payroll_year'];
		 $_SESSION['configured_on']=$get_data['configured_on'];
		  $_SESSION['fullname']=$get_data['fullname'];
		  // no need? // 
		   // $_SESSION['sess_id']=$sess_id; // included term session and term//
			//  $_SESSION['term_id']=$term_id;
			
				  
		?>
         <hr align="left">
         <div align="center"><strong>Name:</strong>  <?php echo  ucwords($fullname); ?> <strong> staff ID:</strong> <?php echo $get_data['staff_id'];?>
           <strong>Gender:</strong> <?php echo $get_data['gender'];?> <strong>Payroll Month:</strong>   <?php echo $get_data['payroll_month'];?>       </div>
         <td></td>
       <strong> Account Number:</strong> <?php $acc_num=$database->query("SELECT * FROM `acc_staff_payroll` WHERE `staff_id`= '{$_SESSION['staff_id']}'"); 
		$acc_num=$database->fetch_array($acc_num);
		echo $acc_num=$acc_num['account_number']
		?>
<hr align="left">
<div align="center"><strong>Payroll ID:</strong>
  <?php echo 1209834;
  ?>
  
  <strong>Payroll Group:</strong>
  <?php echo "<span class='label-alert label label-default'>pending</span>";?>
  
 
  
  <strong>Cooperative Status:</strong>
   <?php
  if($get_data['coo_status']==1){
		 
		  echo "<span class='label-success label label-default'>suscribed</span>";
  }
	 
      if($get_data['coo_status']==0 ){
		 
		  echo "<span class='label-alert label label-default'>not suscribed</span>";
  }
	  ?>
  
</div>
 <hr align="left">
<div align="center"><strong><h4>This month's earning Item(s):</h4></strong>
<table width="89%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Item  Name</th>
                      
                           <th>Item Amount</th>
                       </tr>
                     </thead>
                     <tbody>
                   <td class="center">  <?php echo 'Basic Salary'. ' ';?></td>
<td class="center"><?php echo '₦'. $get_data['salary_amount'];?> </td>


  </tbody>
                     
                   </table>
  
  
</div>
<hr align="left">
<div align="center"><strong><h4>This month's  deductions:</h4></strong>
<table width="89%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Item  Name</th>
                      
                           <th>Item Amount</th>
                           <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                     
                     
<?php

    $items = $database->query("SELECT * FROM `acc_staff_monthly_payroll`  WHERE `staff_id`= '{$get_data['staff_id']}' AND `sess_id`='{$sess_id}' AND `term_id`= '{$term_id}' AND `payroll_month` ='$month' AND `debit_item` != 'none'");
foreach($items as $item) { ?>
                       
         <td class="center"><?php echo  $item['debit_item'];  ?></td>
          <td class="center"><?php echo  $item['debit_amount'];  ?></td>
                        
							 <?php  
							 $debit_item=$item['debit_item']; ?>
                        
                            <td class="center">	<?php  echo "<a href=\"acc_pr_remove_deduction.php?debit_item=$debit_item\"> Remove this deduction</a>" ?> </td>
                     </tr>
                     <?php }?>
   </tbody>
                     
                   </table>
                  
<p><strong>Gross Salary:</strong>  <?php
                    $gross=accountsmonthlypayrollconfig::find_pr_gross_salary($year, $month, $_SESSION['staff_id']);
echo $gross=accountsmonthlypayrollconfig::format_currency($gross);				   
?>

 </p>
<p><strong>Total Deductions:</strong><?php
                    $deduct=accountsmonthlypayrollconfig::find_pr_deductions($year, $month, $_SESSION['staff_id']);
					 echo $deduct=accountsmonthlypayrollconfig::format_currency($deduct);
					?>
				   </p>
<p><strong>Net  Salary:</strong> <?php
                   $net=accountsmonthlypayrollconfig::find_pr_net_salary($year, $month, $_SESSION['staff_id']);
				   echo $net=accountsmonthlypayrollconfig::format_currency($net);
				   ?>
                   
				   </p>
<p><a data-toggle="modal" href="#myModal2" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i>  Make duductions</a>
                                
                                
                   
                               <?php echo "<a target='_blank' class='btn btn-primary btn-sm' href=\"acc_pr_staff_pay_slip.php?staff_id=".urlencode(($_SESSION['staff_id']))."\"><i class='glyphicon glyphicon-print'
                                ></i>  Generate pay slip</a>" ?>
                
          </div>   
<p>  
              
        
       
                 
                 
                 
                 
        <div class="modal" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h4 align="center"> Making duductions for <b style="color:#000"> <?php echo ucwords($_SESSION['fullname']);?></b></h4>
                </div>
                <div class="modal-body">
                   <form class="form-horizontal" action="acc_pr_monthly_deduct.php" method="post">
                <fieldset>
                   <div class="input-group col-md-4"> <span class="input-group-addon">Deduction Amount</i></span>
                      <input type="number" name="debit_amount" title="enter debit amount " required class="form-control">
                      <input type="hidden" name="staff_id" value="<?php echo $_SESSION['staff_id']; ?>"><br>
                      
                   </div></br>
                    <strong><td align="center">Select reason for this deductions </td> <p>
                    </strong>
                        <?php
                        $quer="SELECT * FROM `acc_pr_debit_items` order by id"; 
echo "<select name='debit_item' required  ><option value=''></option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[item]'>$noticia[item]</option>";
}
echo "</select>";
                       
		?>    
        
                     
                     
                  </div><p>
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </p>
                </fieldset>
            </form>
                </div>
                
            </div>
        </div>
    </div>               <hr>		   
                    
<p>&nbsp;</p>
 <tr>
                        
                    </tr>
</p>
                     <table>
   
</table>
                  
                  
				  
                  
                 </div>
               </div>

             </div>
             </p>
                      
                 <p>&nbsp; 
                 
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
