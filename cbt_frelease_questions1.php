<?php include('includes/f_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/database.php'); ?>
 <?php 
  $tittle_text=$_GET['tittle_text'];
 ?>
            
          
                   
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
               <h4>RELEASE CBT QUESTIONS</h4></div>
              <p align="center">
            
             
          
                
                <div class="box-content">
                   
               
             <div class="box col-md-16">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Set duration before release</h2>
                 </div>
                 <div class="box-content">
                
                     <form class="form-horizontal" action="cbt_frelease_questions.php" method="post">
                <fieldset>
                 
  <select name="duration">
<option value="20">20 minutes</option>
<option value="30">30 minutes</option>
<option value="45">45 minutes</option>
<option value="50">50 minutes</option>
<option value="60">1 hour minutes</option>
<option value="90">1 hour 30 minutes</option>
<option value="105">1 hour 45 minutes</option>
<option value="120">2 hours</option>
<option value="150">2 hours 30 minutes</option>
<option value="180">3 hours</option>
</select><p></p>
                 

              
                  
                    <p align="center">
                        <input name="tittle_text" type="hidden" value="<?php echo $tittle_text; ?>">
                        
                        <button type="submit" class="btn btn-primary">release test now</button>
                    </p>
                </fieldset>
            </form>      
               
                   
                
                    
          

 
<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->


   
 <?php include('includes/footer.php'); ?>