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
<h4> GENARATE STUDENT'S ATTENDANCE FOR THE TERM</h4></div>


                <?php echo "<a target='_blank' class='btn btn-primary btn-sm' href=\"print_attendance_sheet_termly_.php?class_name=".urlencode($myclass)."&&sess_id=".urlencode($sess_id)."&&term_id=".urlencode($term_id)."\"><i class='glyphicon glyphicon-print' ></i> [print] [view] [save] </a>" ?>
                          
        
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