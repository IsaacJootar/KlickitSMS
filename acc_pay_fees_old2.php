<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>


            
            <?php
if (isset($_POST['class'])) {
    $_SESSION['class'] = $_POST['class'];
      	 $_SESSION['sess_id'] = $_POST['cat'];
      	 $_SESSION['term_id'] = $_POST['subcat'];
}?>
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
                      
               <h4>School fees payment</h4></div>
                                 
<a href="acc_pay_fees_old1.php" title="Click here to go back to previous page " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-fast-backward"></i>   Back</a> <?php echo ' '. ' ' ;   ?>                       
                        <p align="center"></br>
                        
               
        </div>
        
       
                 
       
             <div class="box col-md-12">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Available Students in <?php echo  $_SESSION['class']; ?> (old students)                </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                   <table width="222%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Registration No.</th>
                         <th> Student's Name</th>
                        <th> Class Name</th>
                           
                           <th>Action</th>
                             <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
				
   $query="SELECT * FROM `student_class` WHERE `class_name`='{$_SESSION['class']}' AND `status`= 1 AND `account_status`=1 ORDER BY `fullname` ASC"; // old studs.
   $result=$database->query($query);
		if (!$result){
			die("database query faild". mysql_error());
		}
		while($student = $database->fetch_array($result)){ ?>
		<?php
    $student_id= $student['student_id'];
		 $query1="SELECT `username` FROM `students` WHERE `id`='{$student['student_id']}'"; 
		 $result1=$database->query($query1);
$username = $database->fetch_array($result1) ?>
                       

                    <td class="center"><?php echo $username['username'];?></td>
                    <td class="center"><?php echo $student['fullname'];  ?></td>
                       <td class="center"><?php echo $student['class_name'];?></td>
                       
                      
                       
                        
                          
                      <td class="center">  
                      <?php 
$query2="SELECT `id`, `student_id`, `teller_no` FROM `acc_school_fees_payments`  WHERE `student_id`='{$student_id}' AND  `sess_id`= '{$_SESSION['sess_id']}' AND `term_id`= '{$_SESSION['term_id']}'  AND `class_name`='{$_SESSION['class']}' AND `status`=1";
     $query2=$database->query($query2);
     if($result2=$database->num_rows($query2) < 1){ 
                      ?>  
                        <a href="myModal" class="openModal" data-toggle="modal" data-target="#myModal" data-id="<?php echo $student_id;?>">
                     <i class='glyphicon glyphicon-qrcode'
                                ></i> pay
                       
                    </a> 
                  <?php  
      }else {echo '';} 
       ?>
                     </td>
                     
                     
                      <td class="center">
                          	
                              <?php
		 $query2="SELECT `id`, `student_id`, `teller_no` FROM `acc_school_fees_payments`  WHERE `student_id`='{$student_id}' AND  `sess_id`= '{$_SESSION['sess_id']}' AND `term_id`= '{$_SESSION['term_id']}'  AND `class_name`='{$_SESSION['class']}' AND `status`=1";
		 $query2=$database->query($query2);
		 if($result2=$database->num_rows($query2) > 0){
		 $result2=$database->fetch_array($query2);
		 echo "<a target='_blank'  href=\"acc_pay_fees_print_receipt.php?student_id=".urlencode($student_id)."&&sess=".urlencode($_SESSION['sess_id'])."&&term=".urlencode($_SESSION['term_id'])."\"><i class='glyphicon glyphicon-print'
                                ></i>  receipt </a>"; echo '   ';                      
        echo "<a  href=\"acc_pay_fees_edit_old.php?id=".(urlencode($result2['id']))."&&student_id=".urlencode(($result2['student_id']))."\"><i class='glyphicon glyphicon-edit'
                                ></i>  update</a>"; echo '   ';
           
                                 echo "<a  href=\"acc_delete_fees_old.php?id=".urlencode(($result2['student_id']))."\"><i class='glyphicon glyphicon-trash'
                                ></i>  delete</a>";
		     
		 } else { echo '';};
                             
                                
                                ?>
                                </td>
                   
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
             </div>
             </p>
                      
           <?php
           
		   ?>      <p>&nbsp;                        </p>
                     
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
 <script type="text/javascript">
        
  $('.openModal').click(function(){
      var id = $(this).attr('data-id');
      $.ajax({url:"acc_pay_fees_old3.php?id="+id,cache:false,success:function(result){
          $(".modal-content").html(result);
      }});
  });
          </script><!-- Ad, you can remove it -->
   
 <?php include('includes/footer.php'); ?>