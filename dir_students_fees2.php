<?php include('includes/dir_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/accountschoolFees.php');
 ?>

<?php
if (isset($_POST['class'])) {
    $_SESSION['class'] = $_POST['class'];
}
		 
?>
       
            <!-- content starts -->
           
<div class=" row"></div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
                <h2 align="justify"><img src="images/fa.png" width="18" height="18"> Klickit School Management Software.  [ Version 1.4.1 ]</h2>
        </div>
            
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
                     
                        
                     
                
                 <p align="center">  <a title="Click to go back" data-toggle="tooltip" href="dir_manage_payments.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Back</a>
                                 
                                  
                                <a class="btn btn-default" title="click here to refreash page " data-toggle="tooltip" href="dir_students_fees2.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Refresh page</a>                        
                                
                                 
                
               
             <div class="box col-md-5">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Click  student name to Display Details</h2>

                </div>
                <div class="box-content">
                  <table  class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th> <?php echo $_SESSION['class'];?> Students</th>
                        
                             
                       </tr>
                     </thead>
                     <tbody>
                     <?php
                      // make these names come from school fee tables, insteal of whole students in a class.//
       $query="SELECT * FROM `student_class` WHERE `class_name`='{$_SESSION['class']}' order by `fullname` ASC"; $result=mysql_query($query);
		if (!$result){
			die("database query faild". mysql_error());
		}
		while($student = mysql_fetch_array($result)){	?>
                       
         <td class="center"><img src="images/avatar.png" width="38" height="38"/><?php echo "<a href=\"dir_students_fees2.php?fullname={$student['fullname']}&&id=".urlencode(($student['student_id']))."\"> {$student['fullname']}</a>" ?> </td>
                        
                          
                                               </tr>
  <?php }?>
                       
                     
                   </table>
                </div>
            </div>
        </div>
             <div class="box col-md-7">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2 align="center">Student Payment Details</h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                 <?php @$id=$_GET['id'];
				 if (isset($_GET['id'])){
				 $check=mysql_query("SELECT * FROM `acc_student_fees` WHERE `student_id`='{$id}' AND `sess_id`='{$sess_id}' AND `term_id` = '{$term_id}' ");
				 if($check=mysql_num_rows($check) < 1){; ?>
				 
					<h4> <?php echo "No Payment details where found for this student";?></h4>
                    <?php
					 exit();
					 }
				 }
				  ?>
              <?php       if(!isset($_GET['id'])){ exit();}
			 if(isset($_GET['id'])){
				 $id=$_GET['id'];
				  $fullname=$_GET['fullname'];
				  $_SESSION['fullname']=$_GET['fullname'];
				   $_SESSION['student_id']=$_GET['id'];
				
			  } ?>
              
      
     
     
 
</table><?php
                    $get_data=$database->query("SELECT * FROM `acc_student_fees` WHERE `student_id`= '{$id}' AND `sess_id`='{$sess_id}' AND `term_id`= '{$term_id}'");
		$get_data=$database->fetch_array($get_data);
		$bank_id=$get_data['bank_id'];
		
        
       $get_bank=$database->query("SELECT * FROM `acc_bank` WHERE `id`='{$bank_id}'");
		$get_bank=$database->fetch_array($get_bank);?>
              
              
         <hr align="left">
         <div align="center"><strong>Name:</strong>  <?php echo  ucwords($fullname); ?> <strong> Class:</strong> <?php echo $get_data['class_name'];?>
           <strong>Bank:</strong> <?php echo $get_bank['bank_name'];?> <strong>Amount Paid:</strong> <?php echo '₦'. $get_data['have_paid'];?>         </div>
         <td></td>
<hr align="left">
<div align="center"><strong>Payment ID:</strong>
  <?php echo $get_data['trans_id'];
   $_SESSION['trans_id']=$get_data['trans_id'];
  ?>
  
  <strong>Teller No:</strong>
  <?php echo $get_data['teller_no'];?>
  
  <strong>Actual Fees:</strong>
  <?php echo $get_data['expected_to_pay'];?>
  
  
  <strong>Balance:</strong>
  <?php 
	  if($get_data['have_paid'] < $get_data['expected_to_pay']){
		  echo '₦';
		  echo  $get_data['expected_to_pay'] - $get_data['have_paid'];
	  }
	  if($get_data['have_paid'] >= $get_data['expected_to_pay']){
		 
		  echo "none";
	  }
	   ?>
  <strong>Discount:</strong>
  <?php 
  	  echo '₦';
	 echo $get_data['discount'];?>
</div>
 <div align="left"></div>
 <hr>
 <hr align="left">
<div align="center"><strong>Last Payment Date:</strong>
  <?php echo $get_data['created_on'];?>
  
  <strong>Recieved By:</strong>
  <?php echo $get_data['created_by'];?>
  
  
 
</div>

<div align="center"><strong>School Fees Status:</strong>
<?php
  if($get_data['have_paid'] >= $get_data['expected_to_pay']){
		 
		  echo "<span class='label-success label label-default'>Full Payment</span>";
  }
	 
      if($get_data['have_paid'] < $get_data['expected_to_pay']){
		 
		  echo "<span class='label-alert label label-default'>Part Payment</span>";
  }
	  ?>
  
 
 
</div>
 <div align="left"></div>
 <hr>
<hr><a data-toggle="modal" href="#myModal2" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Add Payments</a>
                                
                                 <a data-toggle="modal" href="myModal" class="btn btn-primary btn-setting"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> Make Discount</a>
                   
                   
                   
                               <?php echo "<a target='_blank' class='btn btn-primary btn-sm' href=\"acc_pay_fees_print_receipt.php?payment_id=".urlencode(($_SESSION['trans_id']))."\"><i class='glyphicon glyphicon-print'
                                ></i>  Print Reciept</a>" ?>
                
               
               
        
        
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h4 align="center">Discount <b style="color:#000"> <?php echo ucwords($_SESSION['fullname']);?></b></h4>
                </div>
                <div class="modal-body">
                   <form class="form-horizontal" action="acc_student_discount.php" method="post">
                <fieldset>
                  
                    <div class="input-group col-md-4"> <span class="input-group-addon">Discount Amount</i></span>
                      <input type="number" name="discount" required class="form-control">
                        <input type="hidden" name="student_id" value="<?php echo $_SESSION['student_id']; ?>">
                    </div></br>
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
    </div>
                 
                 
                 
                 
        <div class="modal" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h4 align="center">Make Payment for <b style="color:#000"> <?php echo ucwords($_SESSION['fullname']);?></b></h4>
                </div>
                <div class="modal-body">
                   <form class="form-horizontal" action="acc_student_add_fees.php" method="post">
                <fieldset>
                   <div class="input-group col-md-4"> <span class="input-group-addon">School Fee Amount</i></span>
                      <input type="number" name="add_fees" required class="form-control">
                      <input type="hidden" name="student_id" value="<?php echo $_SESSION['student_id']; ?>">
                       
                    </div></br>
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
   
 <?php include('includes/footer.php'); ?>>
>
