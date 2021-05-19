<?php include('includes/f_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
 
  <?php $tittle_text=$_GET['tittle_text'];   ?>        
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
        ?>    <a href="cbt_fview_questions.php"> << Back </a>
                  <?php echo $session->display_error(); ?>         
                     
                 <div class="alert alert-info" align="center">
               <h4>VIEW CBT QUESTIONS</h4></div>
              <p align="center">
            
             
          
                
                <div class="box-content">
                   
                </div>
            </div>
        </div>
             <div class="box col-md-16">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Questions- <?php echo $tittle_text;?></h2>
                 </div>
                 <div class="box-content">
                  <h5>Questions can only be viewed here. The checked options are the answers you chose.</h5>
                  <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
  <tr> 
      <hr>
        <p>
  <?php
          
          
  $ques=$database->query("SELECT * FROM `cbt_questions` WHERE `tittle_text` = '{$tittle_text}'");
     
$qno=0;
while($values=$database->fetch_array($ques)){   
  $qno++; ?>
 </p>

<form method="post"  id="form">
<?php 
 
  echo '<b>'.  "Q" . $qno.  '</b>' ." " . $values['ques_text'] . "" . '</b>';?>  
   <?php  $index= $values['id']; ?>
           
      <p
                <?php 
       $char='A';
               $oq=$database->query("SELECT * FROM `cbt_options` WHERE `ques_id` = '{$index}' ");
               while($os=$database->fetch_array($oq)){
                $choice=$database->query("SELECT `ans` FROM `cbt_questions` WHERE `tittle_text` = '{$tittle_text}'");
               $ans=$database->fetch_array($choice);
            
               ?>
                <label>
                         
                  <input disabled type="radio" <?php if ($values['ans']== $os['id'] ) {echo 'checked="checked" ';}  ?> />
                    <?php  echo " $char - "; ?><?php echo  $os['option'];?>
            </label>
                 <br />
                 
                             <?php $char++;}?>
        </p>
               <p align="">
                   
          <hr>
     
    </p> <?php } ?>
        </form>
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