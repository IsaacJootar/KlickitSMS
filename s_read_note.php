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
                  <?php
				  
				   echo $session->display_error(); ?>         
                     
                
                 <div class="box col-md-14">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                             
                          
                        
                     <h2 align="right"> Notification Panel (inbox)</a>                 </h2>
                   <div class="box-icon"> </div>
                 </div>
                 <div class="box-content" align="center">
                 
                 <p>
                   <?php   global $database;
						 $note_id=$_GET['id']; // note id//		  					  global $database;
					  $note=$database->query("SELECT * FROM `notification` WHERE `id`= '{$note_id}' ");
					    $note=$database->fetch_array($note); ?>
						<table align="left" width="231">
                        <?php
						echo $note=$note['note']; ?>
						</table>
                        <?php
						echo '<br>';?>
                 </p>
                 <p>&nbsp;</p>
                 <p>                   <a href="s_view_note.php">&lt;&lt; Back to Messages</a>
                   <?php 
 $sql=$database->query("UPDATE `notification` SET `status`=1 WHERE `id`= '{$note_id}'");
					 ?>
                 </p>
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