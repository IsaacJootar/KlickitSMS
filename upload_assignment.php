<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
   

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
            
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                 
                      
                  </div>
 
 
            <div class="alert alert-info" align="center">
          UPLOAD HOMEWORK / ASSIGNMENT TO STUDENTS. (<?php echo $myclass; ?>)
              </div>
                    
                  
                  <td style="color:#09C"; align="center"><div style="color:#09C" align="center">Choose assignment document from computer/drive</div></td>
 

              </div>
              <form enctype="multipart/form-data" method="post" action="upload_assignment_exe.php">
                <div align="center">
                  <input type="file" name="uploaded_file" id="vpb_fullname"  required="required"/>
                  <br/>
                  <input type="submit" class="btn btn bg-primary"  name="" value="upload now" id="vpb_fullname"  required="required"/>
                </div>
  
            </form>
  
          </div>
          
           
                        <p align="center"></br>
                        
                 <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>List of assignment(s)  uploaded for  <?php echo $myclass; ?> </h2>
                   <div class="box-icon"> <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a> <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr>
                         
                        <th>DOCUMENT NAME</th>
                         <th>DOCUMENT TYPE</th>
                          <th>SESSION / TERM</th>
                           <th>UPLOADED DATE</th>
                            <th>ACTION</th>
                            <th>ACTION</th>
                             <th>ACTION</th>
                          
                       </tr>
                     </thead>
                     <tbody>
                       <?php
  
            
       $assignment=$database->query("SELECT * FROM  `assignment` WHERE `class_name`='{$_SESSION['myclass']}'");
foreach($assignment as $ass) { 
     $session=mysql_query("SELECT * FROM `session_manager` WHERE `id`= '{$ass['sess_id']}'");
	$session=mysql_fetch_array($session);

	 $qry=mysql_query("SELECT `term_def` FROM `term` WHERE `id`='{$ass['term_id']}'");
	$term=mysql_fetch_array($qry);


?>
                       
  
<td class="center"><?php echo $ass['file_name']?></td>
                    <td class="center"><?php echo $ass['file_ext']?></td>
                          
<td class="center"><?php echo $term['term_def'] .  ',' . ' ' .  $session['session'] . ' ' . ' Academic Session';?></td>
    <td class="center"><?php echo $ass['date']?></td>
                                          <td class="center"><a href="homework/<?php echo $ass['file_name']; ?>" download>Download / export</a>
                                          <td class="center"><a target="_blank" href="homework/<?php echo $ass['file_name']; ?>" view>view / open</a>
                                          
</td>

           <td title="deleting this assignment will remove all the copies sent to all students completely" class="center"><a href="delete_assignment_.php?file_name=<?php echo $ass['file_name'];  ?> &class_name=<?php echo $_SESSION['myclass']; ?> &ass_id=<?php echo $ass['id']; ?>">delete asssignment</a>
                                                           
</td>
                            

                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                              
                     
                  
                      </p>
                      
                 <p>&nbsp;                        </p>
                     
              </div>
           
              </div>v>
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