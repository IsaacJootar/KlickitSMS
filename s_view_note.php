<?php include('includes/s_header.php'); ?>
 <?php require_once('classes/session.php'); ?>
<?php  require_once('classes/functions.php'); ?>
<?php  require_once('classes/database.php'); ?>
   
            
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
                     
                 <div class="alert alert-info" align="center">
               <h4>Inbox notifications</h4>
               </br>
             </div>
                 <div class="box col-md-11">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Recieved  Notifications (Inbox)                 </h2>
                   <div class="box-icon"> </div>
                 </div>
                 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th> Notifications</th>
                         
                         
                     
                             <th>Recieved On</th>
                              <th>Status</th>
                                 <th>Action</th>
                       
                      
                       </tr>
                     </thead>
                     <tbody>
                     <?php 
					 
					 // to formaster outgoing is his incoming and vise versa//
					  global $database;
					  $sql=$database->query("SELECT * FROM `notification` WHERE `student_id`= '{$s_id}' AND `type`= 1 ORDER BY `created_on` DESC ");
					 while( $note=$database->fetch_array($sql)){
						
						
						
                     ?>
					 
                    <td class="center"><?php echo substr($note['note'], 0, 5). '...'?></td>
                  
                        <td class="center"><?php echo  $note['created_on'];   ?></td>
                        <td class="center">
                        <?php
  if($note['status']==0){
		 
		  echo "<span class='label-success label label-default'>Unread</span>";
  }
	 
      if($note['status']==1 ){
		 
		  echo "<span class='label-alert label label-default'>Read</span>";
  }
	  ?>
  
  </td>
                      <td class="center" align="right">	<?php echo "<a 
							   class='btn btn-primary btn-sm' href=\"s_read_note.php?id=".urlencode(($note['id']))."\">  open message</a>" ?> </td>
                        
                           
                           
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
               
                 <p>&nbsp;</p>
                 <p>&nbsp;</p>
                 <p>&nbsp;</p>
                 <p>&nbsp;</p>
                 <p>&nbsp;</p>
                 <p>&nbsp;</p>
                 <p>&nbsp;</p>
                 <p>&nbsp;</p>
                 <p>&nbsp;</p>
                 <p>&nbsp;</p>
                 <p>&nbsp;</p>
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