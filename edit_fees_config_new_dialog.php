<?php error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING &  ~E_STRICT & ~E_DEPRECATED); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update School Fees </title>
</head>

<body>
  <?php require_once('error_notice.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>

<?php 

$id = $_GET['id'];
$sql=$database->query("SELECT * FROM  `acc_configure_tuition_fees` WHERE `id`='{$id}'");
$sql=$database->fetch_array($sql);
?>
 <div class="modal-header">
 
  <button type="button" class="close" data-dismiss="modal">X</button>
                   
                    <h4 align="center">Update School Fees Amount </h4>
                </div>
                <div class="modal-body">
                   <form class="form-horizontal" action="edit_fees_config_new_exe.php" method="post">
                <fieldset>
                   <div class="input-group col-md-4">
                    <div class="input-group col-md-4"> <span class="input-group-addon">Enter New Amount</span>
                      <input type="number" name="expected_to_pay" value="<?php echo $sql['expected_to_pay'];?>" required class="form-control"/>
                    </div></br>
                    
                    
                    <input name="id" value="<?php echo $sql['id'];?>" type="hidden" />
                    
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Update Now</button>
                    </p>
                </fieldset>
            </form>
                </div>
                
            </div>
           
</body>
</html>