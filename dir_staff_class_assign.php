<?php include('includes/dir_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>



    
            <!-- content starts -->
           
<div class=" row"></div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
                <h2 align="justify"><img src="images/fa.png" width="18" height="18"> Klickit School Management Software.  [ Version 1.4.1 ]</h2>
        </div>
            
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
                    <a href="dir_manage_staff.php">Back</a>
                    </p> 
                    <div class="controls" align="center">
               
                              
                       
                        
            <div class="alert alert-info">
             View classes that are assigned to staff
            </div>
            
             
              
              <div align="center">
              
               
            
<b>Select or search staff name</b><p><p>










                                            
<?Php


echo "<form method=post name='submit' action='dir_staff_class_assign.php' >";
//////////        Starting of first drop downlist /////////
                        $quer="SELECT `id`, `fullname` FROM `staff`"; 
echo "<select name='staff'  data-rel='chosen' ><option value=''>Select staff name</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[fullname]</option>";
}
echo "</select>";
                     

?>


<a class="btn btn-default" href="dir_staff_class_assign.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Reset &amp; start again</a> 
              <p>&nbsp;</p>
              </div>
                 
              <p class="center col-md-2" align="center">
    <button type="submit" name="submit" class="btn btn-primary">Display Classes</button>
              </p> 
                 
              <p>&nbsp;</p>
              </div>
</form>
        </div>
        <!--/span-->
    </div><!--/row-->       
                           
                   
            <?php 
					$staff_id=@$_POST['staff'];
				 
				  
				 $sql=mysql_fetch_array(mysql_query("SELECT * FROM `staff_class` WHERE `staff_id` = '{$staff_id}'"));
				  $name=mysql_fetch_array(mysql_query("SELECT * FROM `staff` WHERE `id` = '{$staff_id}'"));
				  ?>
             <div class="box col-md-11">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                
                   <h2>List of classes assigned to <?php echo $name['fullname']; ?>                   </h2>
                   <div class="box-icon"> <i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                
                 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                    
                          <th>Class Name</th>
                           <th>Assigned By</th>
                        
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					 
      $query="SELECT DISTINCT `staff_id`, `class_name` FROM `staff_class` WHERE `staff_id`= '{$staff_id}' ";
		$result=mysql_query($query);
		if (!$result)
		{
			die("database query faild". mysql_error());
		}
		
	
		
		while($subj = mysql_fetch_array($result))
		
		{	?>
                       
          <td class="center"><?php echo $subj['class_name'];  ?></td>
            <td class="center"><?php echo 'Administrator'  ?></td>
                      
               
              
                      
                     </tr>
                     <?php }
					 unset($_SESSION['staff_id']);
					 ?>
                       </tbody>
                     
                   </table>
                 </div>
               </div>
             </div>
             </p>
                      
                 <p>&nbsp;                        </p>
                     
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