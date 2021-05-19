<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/student_class_manager.php'); ?>
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
    <a href="f_attendance1.php"> back </a>
<div class="alert alert-info" align="center">
<h4> GENARATE STUDENT'S ATTENDANCE</h4></div>


              

</br>  <form class="form-horizontal" action="" method="post">

<div align="center">
<h5> Attendance Sheets are for this present term </h5>
<p>


<?php
$result=$database->query("SELECT distinct `week` FROM `student_attendance` WHERE `class_name`='{$myclass}' AND `sess_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `staff_id`='{$id}'");
   
echo "<select name='week' data-rel='chosen' required ='required'><option value=''> Week --------</option>";
while ($weeks=$database->fetch_array($result)) {
echo  "<option value='$weeks[week]'> Week  $weeks[week] </option>";
}
echo "</select>";
     
?>

 <button type="submit" name="submit" class="btn btn-primary"> generate</button>
<p>&nbsp;</p>

</div>
</div>
</form>                
        <?php 


if(!isset($_POST['submit'])){}?>
        <?php
    if (isset($_POST['submit'])){  
		
		$date=$_POST['date'];
    $date=date('D, M j, Y',  strtotime($date));
    $week=$_POST['week'];

						  
?>                        
             <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Attendance sheet for week <?php echo  $week; ?> is generated.                </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                 
                  
                    
                        
                          
                          <?php echo "<a target='_blank' class='btn btn-primary btn-sm' href=\"print_attendance_sheet_.php?class_name=".urlencode($myclass)."&&week=".urlencode($week)."&&sess_id=".urlencode($sess_id)."&&term_id=".urlencode($term_id)."\"><i class='glyphicon glyphicon-print' ></i> [print] [view] [save] </a>" ?>
                           
                     

                       </tr>
                     </thead>
                  
                     
                      
                  
                      
                       </tbody>
                     
                
                   <?php } // end loop?>
                 <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        
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