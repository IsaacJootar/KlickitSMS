<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
    
    <?php
    if($_POST['submit']){
        $sec_id=$_SESSION['sec_id']; 
        $ca_num=$_SESSION['ca_num']; 
        $total_ca=$_POST['total_ca'];
        $total_exam=$_POST["total_exam"];
      
        
            $query="INSERT INTO `assessment` (`ca_num`, `section_id`, `CA1`, `CA2`, `score1`, `score2`, `total_ca`, `total_exam` ) 
            VALUES ('{$ca_num}','{$sec_id}','{$CA1}', '{$CA2}', '{$score1}', '{$score2}', '{$total_ca}', '{$total_exam}')" ; 
        $result=mysql_query($query);
                if(!$result){
                        echo mysql_error();
                        exit();
                        }
      $session->message("Assessment configuration has been saved");
    redirect_to('create_assess1.php');
    exit();
} // end if 
    ?>        
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
               <h4>ENTER CA CONFIGURATIONS </h4></div>
                                  
                   <a href="create_assess1.php"> Back </a>
                  
             <div class="box col-md-8">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Configure assessment format here</h2>
                   <div class="box-icon"> <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a> <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <?php 
   $error_array=array();
  //initilize error flag//
  $error_flag=false;
         
   
         
         ?>
                 <div class="box-content">
                 <form action="" method="post">
                  <table class="table">
                     <thead>
                       
                     </thead>
                     <tbody>
                       
                                    
                <td class="center">
                <label>
                <p align="center">
                          
                                Total CA Score
                  <input type="text" size="10" disabled="disabled" placeholder="No Ca"/>
                  Total Exam Score
                  <input type="number" size="10" title="Enter total Exam Score" title="Enter the total sore or exams" name="total_exam"  placeholder="<?php  //echo 'ca 1' ?>"/><p>
                   <p class="center col-md-5">
               
                                                   
                             
                                <button style="float:center" type="submit" name="submit" value="1"   title=" Save this Configuration" data-toggle="tooltip" class="btn btn-primary">Save Configuration</button>
                              </td>
                              </tr>
                             
          
                       </tbody>
                     
                   </table>
                   
                   </form>
                   
                 </div>
               </div>
           </div>
           
                      
               
                     
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