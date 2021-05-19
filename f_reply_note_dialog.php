<?php error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING &  ~E_STRICT & ~E_DEPRECATED); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REPLY NOTIFICATION</title>
</head>

<body>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>





<?php 
 
$_SESSION['s_id'] =$_GET['id'];
?>
 <div class="modal-header">
 
  <button type="button" class="close" data-dismiss="modal">X</button>
                 
                    <h5 style="color:#000">REPLY NOTIFICATION</h5>
                </div>
                <div class="modal-body">
                   <form class="form-horizontal" action="f_reply_exe.php" method="post">
                <fieldset>
                  <div class="input-group col-md-4">
                    <div class="input-group col-md-4"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil red"></i></span>
                    
                      <textarea name="note" cols="2" rows="4" title="type in your reply message here" required class="form-control" placeholder=" type in you reply here"/><input type="hidden" name="name" value="<?php echo $_SESSION['s_id']; ?>"/>
                    </div></br>
                   
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Reply</button>
                    </p>
                </fieldset>
            </form>
                </div>
                
            </div>
           
</body>
</html>