<?php include('includes/header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/student_manager.php'); ?>



            
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
                        
                
               
             <div class="box col-md-5">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Select a session  to view graduates  </h2>

                    
                </div>
                <div class="box-content">
                  <form method="post" action="graduates.php" >
                         
                            <p align="left">
                             <?php
                        $quer="SELECT * FROM `session_manager`"; 
echo "<select name='session'  data-rel='chosen' required  ><option value=''>Select a session..........</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[session]</option>";
}
echo "</select>";
                       
		?>    
                      </p>
                           
                      <p align="left">&nbsp;</p>
                      <p align="left"><span class="center col-md-2">
                        <input type="submit" name="submit" value="Submit">
                      </span></p>
                      <p>&nbsp;</p>
                    
                         
                         
              
                    </form>
                      
                </div>
            </div>
        </div>
         <?php       if(!isset($_POST['submit'])){ exit();}
			 if(isset($_POST['submit'])){
				 $_SESSION['session']=$_POST['session'];
			  } ?>
             <div class="box col-md-6">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Students Graduates                   </h2>
                   <div class="box-icon"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                           
              
                 
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                      
                       <tr bgcolor="CCCCCC">
                        
                         <th>Student's Full Name</th>
                          <th>Gender</th>
                             
                   
                         
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					 
       $names = mysql_query("SELECT * FROM `student_graduates` WHERE  `session_id`= '{$_POST['session']}'");
while($students=mysql_fetch_array($names)) { 

$graduate=mysql_fetch_array(mysql_query("SELECT `fullname`,`gender` FROM `students` WHERE `id`='{$students[student_id]}'"));
?>
                       
       
                    
                       
                 
               
                          <td class="center"><?php echo $graduate['fullname'];  ?></td>
                            <td class="center"><?php echo $graduate['gender'];  ?></td>
                          
                       
              
						 
                      
                      
            
     
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                  
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