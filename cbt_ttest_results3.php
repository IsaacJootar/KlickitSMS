<?php include('includes/t_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
 
 <?php $tittle_text=$_GET['tittle_text'];
 $s_id=$_GET['s_id']; 
 $fullname=$_GET['n']; 

// get time
$result=$database->query("SELECT `time` FROM `cbt_answeres` 
        WHERE `user_id` = '{$s_id}'
         AND `tittle_text` = '{$tittle_text}'");
$time=$database->fetch_array($result);
$time=$time['time'];

    //get score   
$result=$database->query("SELECT `score` FROM `cbt_questions` 
          WHERE `tittle_text` = '{$tittle_text}'
           ");
$score=$database->fetch_array($result);
$score=$score['score'];

$duration=$database->query("SELECT `duration` FROM `cbt_question_tittle` 
          WHERE `tittle_text` = '{$tittle_text}'
           ");
$duration=$database->fetch_array($duration);
$duration=$duration['duration'];


$data= $database->query("SELECT * FROM `cbt_questions` WHERE `tittle_text`='{$tittle_text}' ORDER BY `id` desc");
// number of quest//
$qno=$database->num_rows($data); 
$data=$database->fetch_array($data);

// get total score of test//
 $tscore= $qno * $score;
  // calculate right answer                    
$result=$database->query("SELECT `is_correct` FROM `cbt_answeres` 
          WHERE `user_id` = '{$s_id}'
          AND `is_correct` = '1'
          AND `tittle_text` = '{$tittle_text}'");
$count_1=$database->num_rows($result);    
       if ($count_1 > 0 ) {
         $count_1= $count_1;
         $count_sum=$count_1 * $score;   //  score dynamically, the one coming from the teachers during set questions//
         } 
         if ($count_1 < 1 ){
           
           $count_1=$count_1;
           $count_sum=$count_1 * $score;
         }
         // get wrong answers
$result=$database->query("SELECT `is_correct` FROM `cbt_answeres` 
       WHERE `user_id` = '{$s_id}'
       AND `is_correct` = '0'
       AND `tittle_text` = '{$tittle_text}'");
      $count_0=$database->num_rows($result);
      if(!$result){
        echo mysqli_error();
      }
          if ($count_0 > 0) {
             $count_0=$count_0;
             
          } 
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
        ?>    <a href="cbt_ttest_results2.php"> << Back </a>
                  <?php echo $session->display_error(); ?>         
                     
                 <div class="alert alert-info" align="center">
               <h4>VIEW CBT RESULTS</h4></div>
              <p align="center">
            
             
          
                
                <div class="box-content">
                   
                </div>
            </div>
        </div>
             <div class="box col-md-16">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Student Name: <?php echo $fullname;?></h2>
                 </div>
                 <div class="box-content">
                  
                 <table width="" border="1" align="center" cellpadding="0" cellspacing="0">
                   <tr class="transcriptheader hdsmall">
    <td><strong>Test Tittle :</strong> </td>
    <td>  <i style="color:#000"><?php echo "<span class='label-success label label-default'> " . $data['tittle_text']; ?></td>
    <td> <strong>Test Duration:</strong></td>
    <td><?php echo $duration .  ' ' . 'Minutes'; ?></td>
  </tr>
     
  <tr class="transcriptheader hdsmall">
    <td width="141"><strong>Right answer(s):</strong></td>
    <td width="206"><?php echo $count_1; ?></td>
    <td width="154"><strong>Wrong answer(s):</strong>:</td>
    <td width="155"><?php echo  $count_0; ?><font size="-4"></td>
   
  </tr>
   <tr class="transcriptheader hdsmall">
    <td><strong>Total score :</strong> </td>
    <td>  <?php echo $count_sum .  '/'. $tscore; ?> </td>
    <td> <strong>Date/time submitted:</strong></td>
    <td><?php echo $time; ?></td>
  </tr>
 
 
 
</table><hr><h4>The checked options are the answers you chose.</h4><p>
  <?php
              

$result=$database->query("SELECT * FROM `cbt_questions` WHERE `tittle_text` = '{$tittle_text}'");
if(!$result) {echo "error" . mysqli_error();}
$qno=0;
while($values=$database->fetch_array($result)){   
  $qno++; ?>
            </p>
                
        <?php 
 
  echo '<b>'.  "Q" . $qno.  '</b>' ." " . $values['ques_text'] . "" . '</b>';?>  
        <?php $index= $values['id']; ?>
         
                
        <p>                  <?php 
               $char='A';
               $option_query=$database->query("SELECT * FROM `cbt_options`
                WHERE `ques_id` = '$index' ");
               while($os=$database->fetch_array($option_query)){
                 
              $choice=$database->query("SELECT * FROM `cbt_answeres` WHERE ques_id = '$index' AND  `user_id` = '{$s_id}' AND `tittle_text`='{$tittle_text}'");
               $ans=$database->fetch_array($choice);  
                if ( $ans['is_correct'] == '0' ) {
                    
              ?>
                <label style="color:#F00">
                       <?php  } else {  ?>
                           <label style="color:#096">
                         
                         <?php } ;?>  
            
             
            <input  type="radio" disabled name="<?php echo $index ?>"  <?php if ( $ans['optionid'] == $os['id'] ) 
          
          {echo 'checked="checked" ';} ?> value="<?php echo  $os['id'];?>"   />
                       <?php  echo " $char - "; ?> <?php echo $os['option'] ;?>
        
              </label>
          <br />
                             <?php $char++;}?>
        
          <?php  // if ( $ans['optionid'] == $os['id'] )  echo  'correct'?>      
                      
                   
        <hr>
     
    
    <?php } // first while loop?>
      
      
     </div>   
         
</div>



  
</tr>

</table>
  
<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->


   
 <?php include('includes/footer.php'); ?>