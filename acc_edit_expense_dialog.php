<?php error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING &  ~E_STRICT & ~E_DEPRECATED); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Budget Category</title>
</head>

<body>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/accountExpense.php'); ?>




<?php 
 
$id = $_GET['id'];
$sql=accountExpense::find_by_id($id);
?>
 <div class="modal-header">
 
  <button type="button" class="close" data-dismiss="modal">X</button>
                   
                    <h4>Update Expense Item</h4>
                </div>
                <div class="modal-body">
                   <form class="form-horizontal" action="acc_edit_expense_exe.php" method="post">
                <fieldset>
                  <div class="input-group col-md-4">
                    <div class="input-group col-md-4"> <span class="input-group-addon">Category Name</i></span>
                      <input type="text" readonly="readonly" value="<?php echo $sql->cat_name;?>" required class="form-control ">
                    </div></br>
                   <div class="input-group col-md-4"> <span class="input-group-addon">Item Name</i></span>
                      <input type="text" readonly="readonly" value="<?php echo $sql->item_name;?>" required class="form-control ">
                    </div></br>
                    <div class="input-group col-md-4"> <span class="input-group-addon">Item Name</i></span>
                      <input type="text" name="amount" value="<?php echo $sql->amount;?>" required class="form-control ">
                    </div></br>
                    <div class="input-group col-md-4"> <span class="input-group-addon">Transaction ID</i></span>
                      <input type="text" readonly="readonly"  value="<?php echo $sql->trans_id;?>" required class="form-control ">
                    </div></br>
                    <input name="cat_id" value="<?php echo $id; ?>" type="hidden" />
                    
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </p>
                </fieldset>
            </form>
                </div>
                
            </div>
           
</body>
</html>