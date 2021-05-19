<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/result_manager.php'); ?>
           
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
                     
                 <a href="f_activity.php">Back << </a>
                 <p align="center">  
                
               
             <div class="box col-md-5">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Click to display activity rating</h2>

                    
                </div>
                <?php
            
    $query="SELECT * FROM `form_master` WHERE `staff_id`='{$id}'"; 
    $result=mysql_query($query); 
    $result=mysql_fetch_array($result);
    $class_name=$result['class_name'];
    $_SESSION['class_name']=$class_name;
    if (!$result){
      die("database query failed". mysql_error());
    }      ?>    
                <div class="box-content">
                  <table >
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Students</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
            
    $query="SELECT * FROM `student_class` WHERE `class_name`='{$class_name}' order by trim(fullname) ASC"; $result=mysql_query($query);
    if (!$result){
      die("database query failed". mysql_error());
    }
    while($student = mysql_fetch_array($result)){ ?>
         <td class="center">  <?php echo "<a href=\"f_activity_psychomotor.php?s_id=".urlencode(($student['student_id']))."\"> {$student['fullname']}</a>" ?> </td>
                        
                      
                          
                                               </tr>
  <?php }?>
                       
                     
                   </table>
                  
                                <table class="table table-striped table-bordered responsive">
                        <thead>
  <tr>
    <th scope="col"><h5>KEYS TO GRADING (SYSTEM DEFAULT)</h5></th>
  </tr>
  <tr>
    <th scope="row">5 - Exellent</th>
   
  </tr>
  <tr>
    <th scope="row">4 - Very Good</th>
    
  </tr>
  <tr>
    <th scope="row">3 - Good</th>
      </tr>
      <tr>
    <th scope="row">2 - Fair</th>
      </tr>
      <tr>
    <th scope="row">1 - Unsatisfactory</th>
      </tr>
 
  
  </tr>
  </thead>
</table>
                    
                </div>
            </div>
        </div>
             <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2 align="center">Activity rating for student</h2>
                   <div class="box-icon"> <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a> <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                  
                 <?php @$s_id=$_GET['s_id'];
         if (isset($_GET['id'])){
                $_SESSION['s_id']=@$_GET['s_id'];
         $check=mysql_query("SELECT `student_id` FROM `score_entry` WHERE `student_id`='{$s_id}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' ");
         if($check=mysql_num_rows($check) < 1){; ?>
         
          <h4> <?php echo "No records where found for this student";?></h4>
                    <?php
           exit();
           }
         }
          ?>
              <?php       if(!isset($_GET['s_id'])){ exit();}
       if(isset($_GET['s_id'])){
        
        } ?>
                 

     <h6>Tick appropraitely to rate this student's  <i style="color:#000"> Psychomotor Records.</i></h6>
                     <form method="post" action="f_activity_psychomotor_exe.php">
                     <?php
          
      if (isset($_GET['s_id'])){
        $_SESSION['s_id']=$_GET['s_id'];
          
         $check=mysql_query("SELECT id, fullname  FROM `student_class` WHERE `student_id`= '{$_GET['s_id']}'  ");
          if($check=mysql_fetch_array($check)){
          
        echo  '<h4>'. '<strong>'.  $check['fullname']. '</strong>'. '</h4>';
           }
      }
                    
            ?>
     
     <table class="table table-striped">
<thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th>Trait Description </th>
                         <th align="right">Activity Score</th>
                          
                       </tr>
                     </thead>

     
      <tbody>
  <?php 
           $result=mysql_query("SELECT * FROM `activity_psychomotor` limit 25  ");
                      while($values=mysql_fetch_array($result)){  ?>  
  <form method="post" action="f_activity.exe.php" >
  
                       <tr>
                         <td> <h5><?php echo   $values['activity_name'];?></h5></td>
                      <?php  $index= $values['id']; ?>
                       <input name="qst[]" type="checkbox" value="<?php echo $values['id'];?>" checked="checked" style="visibility:hidden" /> 
                       <?php 
              // $char='A';
               $oq=mysql_query("SELECT * FROM `activity_option_psychomotor` limit 25");// limit number to 25 for now//?>
                        
                                 
                    <td>
                       
                   <?php
               while($os=mysql_fetch_array($oq)){
                 
               ?>
                 
               
               <strong>    <?php echo  $os['option'];?></strong>
               <input type="radio"  name="<?php echo $index ?>"   value="<?php echo  $os['option'];?>" required />
               
               
            
                <?php }?> 
                  </td>
    <?php } ?>
         </tr>   
                    
                       </tbody>
                      
                     </table>
     
        <br>previous ratings will be discarded if this student is rated twice in one term
                
                    <br><br>
                      <input type="submit" name="submit" value="Submit">  
                      </br>
                   
  </form>
                   
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