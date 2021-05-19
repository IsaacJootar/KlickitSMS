<?php include('includes/s_header.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<script src="jquery-ui-1.12.0/jquery-1.12.4.js"></script>
  <script src="jquery-ui-1.12.0/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker1" ).datepicker();
	 $( "#datepicker2" ).datepicker();
  } );
  </script>
<?php 

// find section where the student to this class belongs //
 // id is student id//
 $id = $_GET['ass_id'];
$result=$database->query("SELECT * FROM  `assignment` WHERE `id`=$id"); 
		if (!$result){
			die("database query faild");
		}
$result =$database->fetch_array($result);
?>

 <div class="modal-header">
     
 
  <button type="button" onclick="window.location.href = 'download_assignment.php';" class="close" data-dismiss="modal">close</button>
  
                    <h4 align="center"><strong>SUBMIT ASSIGNMENT</strong> </h4></br>
                    
                    <h4 align="center">Assignment / Document name:<b style="color:#000"> <?php echo ucwords($result['file_name']);?></b> </h4>
                     <h4 align="center">Document Type:<b style="color:#000"> <?php echo ucwords($result['file_ext']);?></b> </h4>
                 
                  <h4 align="center">Date assignment was uploaded:<b style="color:#000"> <?php echo ucwords($result['date']);?></b> </h4>
                     <h4 align="center"> Document size in bytes :<b style="color:#000"> <?php echo ucwords($result['file_size']);?></b> </h4>
                  
                 
                  <td align="center"><div  align="center">Please note your grading / scores may be sent to you via your notification inbox </div></td>
 
                  
                 
                </div>
                <div class="modal-body" align="center">
                   
              <div align="center">
              <p>
              
                 
                    <td style="color:#09C"; align="center"><div style="color:#09C" align="center">Choose assignment document from computer / phone / drive to submit</div></td>
 

              </div>
              <form enctype="multipart/form-data" method="post" action="submitted_assignment_.php">
                <div align="center">
                  <input type="file" name="uploaded_file" id="vpb_fullname"  required="required"/>
                  <br/>
                     <input type="hidden" class="btn btn bg-primary"  name="ass_id" value="<?php echo $id; ?>"/>
                  <input type="submit" class="btn btn bg-primary"  name="" value="submit now"  required="required"/>
                </div>
  
            </form>
             </fieldset>
          
                
            </div>
           
</body>
</html>