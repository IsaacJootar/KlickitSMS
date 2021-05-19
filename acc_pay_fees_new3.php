<?php error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING &  ~E_STRICT & ~E_DEPRECATED); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pay School Fees </title>
</head>

<body>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>

<?php 
require_once('classes/database.php');
$session=$database->query("SELECT * FROM `session_manager` WHERE `status`='Current Session'");
  $session=$database->fetch_array($session);
   $sess_id=$session['id'];
  $session=$session['session'];
   $qry=$database->query("SELECT * FROM `term` WHERE `status`='Current Term'");
  $term=$database->fetch_array($qry);
  $term_id=$term['id'];

$id = $_GET['id'];
$sql=$database->query("SELECT * FROM  `student_class` WHERE `student_id`='{$id}'");
$name=$database->fetch_array($sql); 
$class_name=$name['class_name'];
// tuition config
$sql1=$database->query("SELECT * FROM  `acc_configure_tuition_fees` WHERE `sess_id`='{$sess_id}' AND  `term_id`= '{$term_id}' AND `status`=0  AND `class_name`='{$class_name}' ");
$expected_to_pay=$database->fetch_array($sql1); 
$tuition_exp=$expected_to_pay['expected_to_pay'];
 
$query=$database->query("SELECT `class_name`, `expected_to_pay`, `item_name`  FROM  `acc_configure_school_fees_items`  WHERE `sess_id`='{$sess_id}' AND  `term_id`= '{$term_id}' AND `status`=0  AND `class_name`='{$class_name}'");
    if (!$query){
      die("database query failed getting configs". mysql_error());
    }

?>
 <div class="modal-header">
 
  <button type="button" class="close" data-dismiss="modal">X</button>
                   
                    <h4 align="center">Pay school fees for <b style="color:#000"> <?php echo $name['fullname'];?> </b></h4>
                </div>
                <div class="modal-body">
                   <form class="form-horizontal" action="acc_pay_fees_new_exe.php" method="post">

               <div align="center" class="alert alert-info">Tuition fee</div>
                    <div class="input-group col-md-4"> <span class="input-group-addon">payment date</span>
                      <input type="date" name="date"  value="" placeholder="enter amount" required class="form-control"/>
                    </div></br>
                    <div class="input-group col-md-4"> <span class="input-group-addon">Select bank</span>
                     <?php
  $sql="SELECT id, bank_name FROM `acc_bank`"; 
echo "<select required class='form-control' name='bank_name'  =''  data-rel='chosen' ><option value=''></option>";
foreach ($dbo->query($sql) as $bank) {
echo  "<option value='$bank[bank_name]'>$bank[bank_name]</option>";
}
echo "</select>" . '</br>'. '</br>';
                       
    ?> 
                    </div></br>
                     <div class="input-group col-md-4"> <span class="input-group-addon">Mode of Payment</span>
                     <?php
echo "<select required class='form-control' name='mop' ><option value=''>Select Method</option>";
echo  "<option value='bank'>Bank Deposit</option>";
echo  "<option value='cash'>Cash at Hand</option>";
echo  "<option value='cash'>Mobile / Phone transfer</option>";
echo "</select>" . '</br>'. '</br>';
                       
    ?> 
                    </div></br>
                   
                    <div class="input-group col-md-4"> <span class="input-group-addon">Tuition fee [₦]</span>
                      <input  type="number" min="1" name="tuition_fee"  value="" placeholder="Enter amount" required class="form-control"/>
                    </div></br>
                    <div class="input-group col-md-4"> <span class="input-group-addon">Discount [₦]</span>
                      <input type="text" name="discount"  value="" placeholder="Enter amount or leave it blank " class="form-control"/>
                    </div><span class="label label-info">leave this field blank if  <?php echo $name['fullname'];?> is not on discount</span></br></br>
                     <div class="input-group col-md-4"> <span class="input-group-addon">Teller Number</span>
                      <input type="text" name="teller_no"  value="" placeholder="Enter teller"  class="form-control"/>
                    </div><span class="label label-info">Only for  mode of payments that are bank deposits</span></br></br>
                    <div align="center" class="alert alert-info">Other school fees  items</div>
          
<?php
                  while($configs=$database->fetch_array($query)) { ?>
                  
             
                    <div class="input-group col-md-4"> <span class="input-group-addon"><?php echo  $configs['item_name']; ?> [₦]</span>
                      <input type="text" name="other_items[<?php echo $configs['item_name'] ?>]"  value="" placeholder="enter amount"  class="form-control"/>
                    </div></br>
                 <?php  } ?>
                  
                    <input name="student_id" value="<?php echo $id; ?>" type="hidden" />
                     <input name="class_name" value="<?php echo $class_name; ?>" type="hidden" />
                     <input name="tuition_exp" value="<?php echo $tuition_exp;?>" type="hidden" />
                    
                    
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">pay</button>
                    </p>
                </fieldset>
            </form>
                </div>
                
            </div>
           
</body>
</html>