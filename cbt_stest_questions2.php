<?php include('includes/s_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
 
<?php $tittle_text=$_GET['tittle_text'];   

  $data= $database->query("SELECT * FROM `cbt_question_tittle` WHERE `tittle_text`='{$tittle_text}' ORDER BY `id` desc");
  $data=$database->fetch_array($data);


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
        ?>    <a href="cbt_stest_questions.php"> << Back </a>
                  <?php echo $session->display_error(); ?>         
                     
                 <div class="alert alert-info" align="center">
               <h4>TAKE A TEST</h4></div>
              <p align="center">
            
             
          
                
                <div class="box-content">
                   
                </div>
            </div>
        </div>
             <div class="box col-md-16">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Note: All questions carry equal marks.</h2>
                 </div>
                 <div class="box-content">

                        <table width="" border="1" align="center" cellpadding="0" cellspacing="0">
     
  <tr class="transcriptheader hdsmall">
    <td width="141"><strong>Class:</strong></td>
    <td width="206"><?php echo $data['class_name']; ?></td>
    <td width="154"><strong>Subject:</strong>:</td>
    <td width="155"><?php echo  $data['subject_name']; ?><font size="-4"></td>
   
  </tr>
  <tr class="transcriptheader hdsmall">
    <td><strong>Test Title :</strong> </td>
    <td>  <i style="color:#000"><?php echo "<span class='label-success label label-default'> " . $data['tittle_text']; ?></td>
    <td> <strong>Test Duration:</strong></td>
    <td><?php echo $data['duration'] ?></td>
  </tr>

  <tr class="transcriptheader hdsmall">
    <td width="141"><strong>Instruction(s)</strong></td>
    <td width="206"><?php echo'all questions carry equal marks'; ?></td>
    <td width="154"><strong>Timer</strong>:</td>
    <td style="background-color:black"  width="155"><div style="background-color:white"  id="display"></div><font size="-4"></td>
   
  </tr>
 

<tr class="transcriptheader hdsmall">
  
    <td colspan="4"><strong>NOTE:</strong> The system will submit your test automatically  when your time expires. Unattempted questions will carry zero marks.<p></strong></p>
      <p></td>
    
  </tr>

</table>
<?php //<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> ?>

             <?php 
          
          
  $ques=$database->query("SELECT * FROM `cbt_questions` WHERE `tittle_text` = '{$tittle_text}'");
   $check=$database->num_rows($ques);
      if ($check < 1){
        echo  '</br>';
        echo  '</br>';
        echo "<b>No questions are set yet for this selection".'<b>'; 
        echo  '</br>';
        echo  '</br>';
        echo '<a href="cbt_stest_questions.php"> << Back</a>';
      }else{ // if questions are found, display the table carrying them ?>
                       
      <hr>
        <p>
  
 <?php    
$qno=0;
while($values=$database->fetch_array($ques)){   
  $qno++; ?>
 </p>

<form method="post" action="cbt_submit_test.php" id="form">
<?php 
 
  echo '<b>'.  "Question" .  ' '. $qno.  '</b>' ." " . $values['ques_text'] . "" . '</b>';?>  
   <?php  $index= $values['id']; ?>
   <input name="question[]" type="checkbox" value="<?php echo $index;?>" checked="checked" style="visibility: hidden" /><p>
                <?php 
       $char='A';
               $oq=$database->query("SELECT * FROM `cbt_options` WHERE `ques_id` = '{$index}' ");
               while($os=$database->fetch_array($oq)){
                $choice=$database->query("SELECT `ans` FROM `cbt_questions` WHERE `tittle_text` = '{$tittle_text}'");
               $ans=$database->fetch_array($choice);
            
               ?>
                <label>
                         
                  <input type="radio" name="<?php echo $index ?>"   value="<?php echo  $os['id'];?>" />
                    <?php  echo " $char - "; ?><?php echo  $os['option'];?>
            </label>
                 <br />
                 
      <?php $char++;}?>
        </p>
               <p align="">
                   
          <hr>
     
    </p> <?php } // end while loop ?>
    <input name="cat" type="hidden" value="<?php echo $cat?>" />
   <input name="tittle_text" type="hidden" value="<?php echo $tittle_text?>" />    
  <input class="btn btn-primary" type="submit" value="Submit Test" /></p>
        </form>
     </div>   
         
</div>

 <?php } // end of else statement ?>
  <script type="text/javascript">

        function CountDown(duration, display) {
            if (!isNaN(duration)) {
                var timer = duration, minutes, seconds;
                
              var interVal=  setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    $(display).html("<b>" + minutes + "min : " + seconds + "sec" + "</b>");
                    if (--timer < 0) {
                        timer = duration;
                       SubmitFunction();
                       $('#display').empty();
                       clearInterval(interVal)
                    }
                    },1000);
            }
        }
        
        function SubmitFunction(){
       $('form').submit();
        
        }
    // php convert the min of duration into seconds //
         CountDown(<?php echo $data['duration']*60 ?>,$('#display'));
</script>


<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->


   
 <?php include('includes/footer.php'); ?>