<?php include('includes/header.php'); ?>
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
    <a href="time_table.php"> back </a>
<div class="alert alert-info" align="center">
<h4> GENARATE STUDENT'S TIME ATTENDANCE</h4></div>


              

</br>  <form class="form-horizontal" action="" method="post">

<div align="center">
<p>


<?php
$result=$database->query("SELECT * FROM `classes` order by `id` desc");
   
echo "<select name='class_name' data-rel='chosen' required ='required'><option value=''> Week --------</option>";
while ($class_name=$database->fetch_array($result)) {
echo  "<option value='$class_name[class_name]'> $class_name[class_name] </option>";
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
    $class_name=$_POST['class_name'];

						  
?>                        
             <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Time table for  <?php echo  $class_name; ?> is generated.                </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                 
                  
                    
                        
                          
                          <?php echo "<a target='_blank' class='btn btn-primary btn-sm' href=\"print_time_table_.php?class_name=".urlencode($class_name)."&&sess_id=".urlencode($sess_id)."&&term_id=".urlencode($term_id)."\"><i class='glyphicon glyphicon-print' ></i> [print] [view] [save] </a>" ?>
                           
                     

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