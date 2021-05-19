<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
    
    <?php
    if($_POST['submit']){
        $sec_id=$_SESSION['sec_id']; 
        $ca_num=$_SESSION['ca_num']; 

        $CA1=$_POST['CA1'];
        $CA2=$_POST['CA2'];
        $score1=$_POST['score1'];
        $score2=$_POST['score2'];
        $total_ca=$_POST['total_ca'];
        $total_exam=$_POST["total_exam"];
      
        
            $query="INSERT INTO `assessment` (`ca_num`, `section_id`, `CA1`, `CA2`, `score1`, `score2`, `total_ca`, `total_exam` ) 
            VALUES ('{$ca_num}','{$sec_id}','{$CA1}', '{$CA2}', '{$score1}', '{$score2}', '{$total_ca}', '{$total_exam}')" ; 
        $result=mysql_query($query);
                if(!$result){
                        echo mysql_error();
                        exit();
                        }
      $session->message("Assessment configuration for $ass_name has been saved");
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
                  
             <div class="box col-md-12">
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
                <p>Name of CA 1
                                <input type="text" size="10" title=" Enter name of 1st CA " name="CA1"  placeholder="<?php  //echo 'ca 1' ?>"/>
                                CA 1 Score 
                                <input type="text" size="10" title=" Enter score of 1st CA" name="score1"  placeholder="<?php  //echo 'ca 1' ?>"/>
                                Total CA Score
                  <input type="text" size="10" title="Enter total CA score " name="total_ca"  placeholder="<?php  //echo 'ca 1' ?>"/>
                  Total Exam Score
                  <input type="text" size="10" title="Enter total Exam Score " name="total_exam"  placeholder="<?php  //echo 'ca 1' ?>"/>
                </p>
                <p>Name of CA 
                  2
                  <input type="text" size="10" title="Enter name of 2nd CA " name="CA2"  placeholder="<?php  //echo 'ca 1' ?>"/>
                  CA 2 Score 
                                
                                 <input type="text" size="10"  title="CA score of 2nd CA" name="score2" placeholder="<?php //echo ' ca 2'?>"/> 
                            </p>
                           
                <p>&nbsp;</p>
                              <p>                              
                              <p class="center col-md-5">
                                <button style="float:center" type="submit" name="submit" value="1"   title=" Save this Configuration" data-toggle="tooltip" class="btn btn-primary">Save Configuration</button>
                              </p></td>
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