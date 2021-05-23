<?php include('includes/acc_header.php'); ?>
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

 $term_id = $_GET['term']; 
 $student_id = $_GET['student_id'];
$query="SELECT `fullname` , `student_id`, `class_name` FROM `student_class` WHERE `student_id`=$student_id AND `status`= 1 AND `account_status`=0"; 
   $result=$database->query($query);
    if (!$result){
      die("database query faild");
    }
$data = $database->fetch_array($result);
$query1=$database->query("SELECT *  FROM  `acc_school_fees_payments`  WHERE `sess_id`='{$sess_id}' AND  `term_id`= '{$term_id}' AND `status`=0  AND `student_id`='{$student_id}' AND `item_name`='tuition'");
    if (!$query1){
      die("database query failed getting tuition");
    }
    $fees= $database->fetch_array($query1);

 
$query2=$database->query("SELECT *  FROM  `acc_school_fees_payments`  WHERE `sess_id`='{$sess_id}' AND  `term_id`= '{$term_id}' AND `status`=0  AND `student_id`='{$student_id}' AND `item_name`!='tuition'");
    if (!$query2){
      die("database query failed getting configs");
    }
?>

 <div class="modal-header">
     
 
  <button type="button" onclick="window.location.href = 'acc_pay_fees_new2.php';" class="close" data-dismiss="modal">close</button>
                   
                    <h4 align="center">Make changes for:<b style="color:#000"> <?php echo ucwords($data['fullname']);?></b> </h4>
                 
                </div>
                <div class="modal-body" align="center">
                   <form class="form-horizontal" action="acc_pay_fees_edit_new_exe.php" method="post">

               <div align="center" class="alert alert-info"> Update Tuition fee</div>
                    <div class="input-group col-md-4"> <span class="input-group-addon">payment date</span>
                      <input type="date" name="date" disabled  value="<?php  echo $fees['paid_on']; ?>" required class="form-control"/>
                    </div></br>
                    <div class="input-group col-md-4"> <span class="input-group-addon">Select bank</span>
                     <?php
  $sql="SELECT id, bank_name FROM `acc_bank`"; 
echo "<select required class='form-control' name='bank_name'  =''  data-rel='chosen' ><option value=''></option>";
foreach ($dbo->query($sql) as $bank) {
        if ($bank['bank_name']==$fees['bank_name']) {
echo  "<option selected  value='$bank[bank_name]'>$bank[bank_name]</option>";
          # code...
        } else { echo  "<option  value='$bank[bank_name]'>$bank[bank_name]</option>";}
}
echo "</select>" . '</br>'. '</br>';
                       
    ?> 
                    </div></br>
                   
                    <div class="input-group col-md-4"> <span class="input-group-addon">Tuition fee [₦]</span>
                      <input type="text" name="tuition_fee"  value="<?php  echo $fees['have_paid']; ?>" placeholder="enter amount" required class="form-control"/>
                    </div></br>
                    <div class="input-group col-md-4"> <span class="input-group-addon">Discount [₦]</span>
                      <input type="number" name="discount"  value="<?php  echo $fees['discount']; ?>" placeholder="enter amount or leave it blank " class="form-control"/>

                    </div><span class="label label-info">leave this field blank if  <?php echo $data['fullname'];?> is not on discount</span></br></br>
                     <div class="input-group col-md-4"> <span class="input-group-addon">Teller Number</span>
                      <input type="text" name="teller_no"  value="<?php  echo $fees['teller_no']; ?>" placeholder="enter teller" class="form-control"/>
                    </div></br>
                      <input name="term_id" type='hidden'  value="<?php  echo $term_id; ?>" />
                    <div align="center" class="alert alert-info">Update other school fees  items</div>
          
<?php
                  while($configs=$database->fetch_array($query2)) { ?>
                  
             
                    <div class="input-group col-md-4"> <span class="input-group-addon"><?php echo  $configs['item_name']; ?> [₦]</span>
                      <input type="text" name="other_items[<?php echo $configs['item_name'] ?>]"  value="<?php echo $configs['have_paid']; ?>" placeholder="enter amount" required class="form-control"/>
                    </div></br>
                 <?php  } ?>
                  
                    <input name="student_id" value="<?php echo $student_id; ?>" type="hidden" />
                    
                    
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">update</button>
                    </p>
                </fieldset>
            </form>
                </div>
                
            </div>
           
</body>
</html>