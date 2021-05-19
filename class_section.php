<?php include('includes/header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>

            
            <div class="box-content row">
                 <div align="center"><?php
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
               Assign Classes To School Sections
            
               
                    
                </div>
            <form class="form-horizontal" action="class_section_exe.php" method="post">
              <div align="left">
                   
              </div>
              <div align="left">
               <h5>Tick appropriately, the classes associated to this school section(assign classes to section)</h5>
              <p>
                <p><strong> Section a section 
                  </strong>
                  
                  <?php
          
                       $quer="SELECT * FROM `section` order by id"; 
echo "<select name='sec'  class='form-control' required ='required'><option value=''>Select</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[sec_name]'>$noticia[sec_name]</option>";
}
echo "</select>";
                       
    ?>
        
        
  <?php
  global $database;
   $qry=$database->query("SELECT *  FROM `classes`" );
$qno=0;
while($values=$database->fetch_array($qry)){  
?>
      <div>
                <label>
                         <?php echo $values['class_name']; ?>
                         <input name="qst[]" type="checkbox" value="<?php echo $values['class_name'];?>" type="checkbox"/> 
          
                    <input name="class_id" value="<?php echo $values['id'] ?>" style="visibility:hidden"/>   
                      
                       </label>
                         
            </div>
     
    <?php } // end whileloop ?>
                                                                                         
                 
                 
              <p>&nbsp;</p>
              </div>
                 
              <p class="center col-md-3">
    <button type="submit" class="btn btn-primary">Assign</button>
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