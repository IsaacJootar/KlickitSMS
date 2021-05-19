<?php include('includes/header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/student_manager.php'); ?>
<script src="http://code.jquery.com/jquery-1.5.js"></script>
    <script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 80) {
          val.value = val.value.substring(0, 80);
        } else {
          $('#charNum').text(80 - len);
        }
      };
    </script>

            
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

               <a href="manage_sms.php">back</a>       
                        
                
               
             <div class="box col-md-5">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Select a class name you wish to send bulk message to</h2>

                    
                </div>
                <div class="box-content">
                  <form method="post" name="class" action="bulk_message.php" >
                         
                            <p align="left">
                             <?php
                        $quer="SELECT distinct class_name FROM `classes`"; 
echo "<select name='class'  data-rel='chosen' required  ><option value=''>Select a class..........</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[class_name]'>$noticia[class_name]</option>";
}
echo "</select>";?>
                            <input type="submit" name="submit1" value="display names">
                    
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                         
                         
              
                    </form>
                      
                </div>
            </div>
        </div>
         <?php      ?>
             <div class="box col-md-7">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="bulk sms">
                   <h2>Phone numbers of parents associated to  <?php echo  @$_POST['class'];?>  students                   </h2>
                   <div class="box-icon"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                           
                <form method="post" action="bulk_message_send.php">
                 
                  <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                      
                       <tr bgcolor="CCCCCC">
                         <b><input type="checkbox" id="checkAll" /> Select all</b>
                <script type="text/javascript">
$("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>
                         <th>Student's Full Name</th>
                          <th>Associated Number</th>
                               <th>Tick to check/uncheck</th>
                   
                         
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					 
       $names = mysql_query("SELECT * FROM `student_class` WHERE 
        `class_name`= '{$_POST['class']}' AND `account_status`=1 ORDER BY trim(fullname)");
while($students=mysql_fetch_array($names)) { 
      $phone_number=$database->query("SELECT `phone_number` FROM `bulk_sms` 
        WHERE  `student_id`= '{$students['student_id']}'");
$phone_number=$database->fetch_array($phone_number);
$phone_number=$phone_number['phone_number'];
  ?>
                       
 <td class="center"><?php echo $students['fullname'];  ?></td>
                          
                         
                            <td class="center"><span class="label-info label label-default"><?php  echo $phone_number;?></span></td>
               <td class="center">          
                         <input name="qst[]" id="checkAll" type="checkbox" checked  value="<?php echo $students['student_id'];?>" type="checkbox"/>
                         </td> 
						 
                      
                       </label>
            
     
                     </tr>
                     <?php
 } //end ?>
                       </tbody>
                     
                   </table>
                    <script src="http://code.jquery.com/jquery-1.5.js"></script>
    <script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 500) {
          val.value = val.value.substring(0, 500);
        } else {
          $('#charNum').text(len);
        }
      };
    </script>
  </head>

  <body>
   
  
  </body>
                    <tr><td>
      <textarea name="message" id="field" onkeyup="countChar(this)" required placeholder="Type your bulk message here, be brief and concise" cols="60" rows="5"></textarea></td></br>
      160 Characters=1 page.</br>
        character count:<div id="charNum"></div>
    </tr></br>
   
            Bulk SMS balance left: <strong>
                 <?php
                    $username='klickitsms';
                    $password='wisdom123';
            echo $result = file_get_contents("https://api.loftysms.com/simple/getbalance?username=$username&password=$password");?>
    <tr> </strong> Units</br>
      <td><label>
        <input type="reset" name="button2" id="button2" value="Clear text"/>
        
      </label></td>
      <td><div align="left"></div></td>
    </tr>
                   <p class="center col-md-5">
                 
                        <button type="submit" class="btn btn-primary">Send Now</button>
                    </p>
                   
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