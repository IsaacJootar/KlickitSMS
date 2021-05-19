<?php error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING &  ~E_STRICT & ~E_DEPRECATED); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bank</title>
</head>

<body>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/accountBank.php'); ?>




<?php 
 
$id = $_GET['id'];
$sql=accountBank::find_by_id($id);
?>
 <div class="modal-header">
 
  <button type="button" class="close" data-dismiss="modal">X</button>
                   
                    <h5 style="color:#F33">Are you sure you want delete this bank?</h5>
                </div>
                <div class="modal-body">
                   <form class="form-horizontal" action="acc_delete_bank.php" method="post">
                <fieldset>
                  <div class="input-group col-md-4">
                    <div class="input-group col-md-4"> <span class="input-group-addon">Bank Name:</i></span>
                      <input type="text" readonly="readonly" name="bank_name" value="<?php echo $sql->bank_name;?>" required class="form-control" placeholder=" Cat. Name: E.g Adminstration, traportation, electricity, ">
                    </div></br>
                    <div class="input-group col-md-4"> <span class="input-group-addon">Bank Code:</i></span>
                      <input type="text" readonly="readonly" name="bank_code" value="<?php echo $sql->bank_code;?>" required class="form-control" />
                    </div></br>
                   
                    <input name="id" value="<?php echo $id; ?>" type="hidden" />
                  
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Proceed</button>
                    </p>
                </fieldset>
            </form>
                </div>
                
            </div>
           
</body>
</html>