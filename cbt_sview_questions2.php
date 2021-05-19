<?php include('includes/s_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
 
 <?php $tittle_text=$_GET['tittle_text'];   


$data=$database->query("SELECT * FROM `cbt_question_tittle` 
          WHERE `tittle_text` = '{$tittle_text}'
           ");
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
        ?>    <a href="cbt_sview_results.php"> << Back </a>
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
                   <h2>details of test</h2>
                 </div>
                 <div class="box-content">
                  
                 <table width="" border="1" align="center" cellpadding="0" cellspacing="0">
                   <tr class="transcriptheader hdsmall">
    <td><strong>Test Tittle :</strong> </td>
    <td>  <i style="color:#000"><?php echo "<span class='label-success label label-default'> " . $data['tittle_text']; ?></td>
    <td> <strong>Test Duration:</strong></td>
    <td><?php echo $data['duration'] .  ' ' . 'Minutes'; ?></td>
  </tr>
     
  <tr class="transcriptheader hdsmall">
    <td width="141"><strong>Class:</strong></td>
    <td width="206"><?php echo $data['class_name'];?></td>
    <td width="154"><strong>Subject</strong>:</td>
    <td width="155"><?php echo $data['subject_name']; ?><font size="-4"></td>
   
  </tr>
   <tr class="transcriptheader hdsmall">
    <td><strong>Intruction(s) :</strong> </td>
    <td>  Answers all questions </td>
    <td> <strong>Assessment type:</strong></td>
    <td> Computer Based Test</td>
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