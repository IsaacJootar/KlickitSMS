<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/class_manager.php'); ?>
<?php require_once('classes/student_class_manager.php'); ?>


            
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
               <h4>Manage Students</h4>
            </div>                 
                            
                                
                                  <a href="f_attendance.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-edit"></i>  Mark  Attendance</a>
                                 
                                 
                 <a href="print_attendance_sheet.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-print"></i> Print weekly attendance sheet</a>
                    <a href="print_attendance_sheet_termly.php" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-print"></i> Print termly attendance sheet</a>
                                                 
                        
<div class="box col-md-3">
        <div class="box-inner">
            <div class="box-header well">
                <h2>My Classes</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped">
                     <tbody>
                       <?php
            if(!isset($_GET['id'])){$_GET['id']= "";};
       $classes = classManager::find_by_sql("SELECT * FROM `staff_class` WHERE `staff_id` = '{$id}' order by `id` desc");
foreach($classes  as $class ) {?>
                <td>
                        <a href="#" class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-white"></i> <?php echo $class->class_name ;  ?></a>
       
                  </td>
                     </tr>
                     <?php }?>
                       </tbody>
                     
              </table>
            </div>
     
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <!--/span-->
    <!--/span-->
    <!--/span-->


</div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <!--/row-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p><!--/fluid-row--></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp; </p>
    <?php include('includes/footer.php'); ?>