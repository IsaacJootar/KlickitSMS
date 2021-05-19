<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/section_manager.php'); ?>
<?php require_once('includes/config.php'); ?>
   
            
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
                     
                  <p class="center col-md-1" align="right">
                    <a href="section.php">Back</a>
                    </p> 
                 
             <div class="well col-md-12 center login-box">
             
            <div class="alert alert-info">
               Configure School Section
            
                <fieldset>
                    
                </div>
            <form class="form-horizontal" action="create_section_exe.php" method="post">
            <div align="left">
             <p><strong>Section Name</strong>
                    <select name="name"  id="selectError2" class="form-control" required>
                      
                      <option value="">Select an option</option>
                       <option>PLAY GROUP</option>
                      <option>CRECHE</option>
                      <option>NURSERY</option>
                       <option>PRE-NURSERY</option>
                          <option>PRE-SCHOOL</option>
                            <option>RECEPTION</option>
                       <option>PRIMARY</option>
                      <option>LOWER PRIMARY</option>
                      <option>UPPER PRIMARY</option>
                      <option>JUNIOR SECONDARY</option>
                      <option>JUNIOR SCHOOL</option>
                      <option>SENIOR SECONDARY</option>
                      <option>MOCK</option>
                      
                      
                    </select>
               <strong>Section Range</strong><p>From
               <select name="start"  id="start" class="form-control" required>
                      <option value="">-----</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                       <option>6</option>
                        <option>7</option>
                      <option>8</option>
                      <option>9</option>
                       <option>10</option>
               </select>
             To
                            <select name="end"  id="end" class="form-control"  required>
                              <option value="">-----</option>
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                                <option>6</option>
                                <option>7</option>
                              <option>8</option>
                              <option>9</option>
                               <option>10</option>
                            </select>
               <strong>Section Code</strong>
                            <select name="code"  id="code" class="form-control" required>
                              <option value="">Select</option>
                              <option>PLAY GROUP</option>
                              <option>CRECHE</option>
                               <option>PRE-NUR</option>
                               <option>RECEPT</option>
                               
                              <option>NUR</option>
                              <option> PRI</option>
                              <option>PRE-SCH</option>
                               <option> JS</option>
                              <option> JSS</option>
                              <option> SSS</option>
                                <option>MCK</option>
                            </select>
             </p>
                      </br>   
                             <p>
              
  
                                                                                        
                     <p>&nbsp;</p>
              <p class="center col-md-3">
                      <button type="submit" class="btn btn-primary">Save</button>
</p> 
                 
              <p>&nbsp;</p>
              </div>
            </form>
                      
                              
                              
                           
                      
            
          
                
                  
                       </p>
                        <p>&nbsp;                        </p>
                     
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