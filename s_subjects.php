<?php include('includes/s_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/subject_manager.php'); ?> 
 
            
            <div class="box-content row">
            
                     <div class="alert alert-info" align="center">
               <h4>Currently offered subjects</h4></div>
 <table class="table table-striped">
                     <tbody>
                       <?php
					  
       $classes = subjectManager::find_by_sql("SELECT * FROM `student_subjects` WHERE `student_id` = '{$s_id}' AND `session_id`='$sess_id' AND `term_id`='$term_id' order by `id` desc");
foreach($classes  as $class ) {?>
               
                        <a href="#" class="btn btn-primary btn-sm"><i
                                  class="glyphicon glyphicon-chevron glyphicon-white"></i> <?php echo $class->subject_name ;  ?></a>
     
                  
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    

              </div>
                

            </div>
        </div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    
    
</div>

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

  
            </div>
        </div>
    </div>
    <!--/span-->
    <!--/span-->
    <!--/span-->


</div><!--/row-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

 <?php include('includes/footer.php'); ?>