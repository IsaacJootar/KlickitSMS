<?php include('includes/f_header.php'); ?>
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
                   <div class="box-icon"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr bgcolor="CCCCCC">
                         
                         <th> Notifications</th>
                           <th> Reg N0.</th>
                         
                           <th>Account Name </th>
                             <th>Recieved On</th>
                              <th>Action</th>
                      
                       </tr>
                     </thead>
                     <tbody>
                     <?php 
					 
					 // to formaster, outgoing is his incoming and vise versa//
					  global $database;
					   $class=$database->query("SELECT * FROM `form_master` WHERE `staff_id`= '{$id}' order by `id` desc"); $class=$database->fetch_array($class); $class=$class['class_name'];
					 
					  $sql=$database->query("SELECT * FROM `notification` WHERE `class_name`= '{$class}' AND `type`= 0 order by `id` desc");
					 while( $note=$database->fetch_array($sql)){
						 $student_id=$note['student_id'];
                      $name=$database->query("SELECT * FROM `students` WHERE `id`= '{$student_id}'"); $name=$database->fetch_array($name);?>
					 
                    <td class="center"><?php echo  $note['note'] ;  ?></td>
                          <td class="center"><?php echo  $name['username'] ;  ?></td>
                            <td class="center"><?php echo  $name['fullname'] ;  ?></td>
                        <td class="center"><?php echo  $note['created_on'];  ?></td>
                     
                            <td class="center">    <a  class="openModal" data-toggle="modal" data-target="#myModal" data-id="<?php echo $note['student_id'];?>"> Reply
                      
                    </a>
                     </td>
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                 <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
               
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                  
            </div>
                
    
          
        </div>
    </div>
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
     <script type="text/javascript">
				
  $('.openModal').click(function(){
      var id = $(this).attr('data-id');
      $.ajax({url:"f_reply_note_dialog.php?id="+id,cache:false,success:function(result){
          $(".modal-content").html(result);
      }});
  });
				  </script>
 <?php include('includes/footer.php'); ?>