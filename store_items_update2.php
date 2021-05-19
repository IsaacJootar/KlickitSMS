<?php error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING &  ~E_STRICT & ~E_DEPRECATED); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>store_items_update </title>
</head>

<body>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>

<?php 
require_once('classes/database.php');


 $id = $_GET['id'];
?>
 <div class="modal-header">
 
  <button type="button" class="close" data-dismiss="modal">X</button>
                   
                    <h4 align="center">Update store Items <b style="color:#000"> <?php// echo $name['fullname'];?> </b></h4>
                </div>
                <div class="modal-body">
                   <form class="form-horizontal" action="store_create_item_exe.php" method="post">
                <fieldset>
                  <div class="input-group col-md-4">
                    <div class="input-group col-md-4"> <span class="input-group-addon">Item Name</i></span>
                      <input type="text" name="item_name" required class="form-control" placeholder=" Item. Name: E.g diesel, bulbs, dstv, drinks etc  ">
                    </div></br>
                   <div class="input-group col-md-4">
                    <div class="input-group col-md-4"> <span class="input-group-addon">Unit Price</i></span>
                      <input type="number" name="unit_price" required class="form-control" placeholder=" E.g 2500  ">
                    </div></br>
                   
                  </div><p>
                  <div class="input-group col-md-4">
                    <div class="input-group col-md-4"> <span class="input-group-addon">Quantity</i></span>
                      <input type="number" name="quantity" required class="form-control" placeholder=" E.g 47 ">
                    </div></br>
                   
                  </div><p>
                 
                     
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </p>
                </fieldset>
            </form>
                </div>
                
            </div>
           
</body>
</html>