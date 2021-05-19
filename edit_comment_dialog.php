<?php error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING &  ~E_STRICT & ~E_DEPRECATED); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Comment</title>
</head>

<body>

<?php require_once('includes/config2.php'); ?>
<?php
$session=mysql_query("SELECT * FROM `session_manager` WHERE `status`='Current Session'");
	$session=mysql_fetch_array($session);
	 $sess_id=$session['id'];
	$session=$session['session'];
	 $qry=mysql_query("SELECT * FROM `term` WHERE `status`='Current Term'");
	$term=mysql_fetch_array($qry);
	$term_id=$term['id'];
	$term=$term['term_def'];
	?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/class_manager.php'); ?>
<?php 
 
$c_id = $_GET['id'];
$sql= $check=mysql_fetch_array(mysql_query("SELECT * FROM `result_comments` WHERE `id`='{$c_id}'"));
		
?>
 <div class="modal-header">
 
  <button type="button" class="close" data-dismiss="modal">X</button>
                   
                    <h4 align="center">Update Comment</h4>
                </div>
                <div class="modal-body">
                   <form class="form-horizontal" action="update_comment_exe.php" method="post">
                <fieldset>
                  <div class="input-group col-md-4">
                    <div class="input-group col-md-4"> <span class="input-group-addon">Update Comment</span>
                      <input type="text" name="comment" value="<?php echo $sql['f_comment'];?>" required class="form-control"/>
                    </div></br>
                    
                    <input name="c_id" value="<?php echo $sql['id']; ?>" type="hidden" />
                    
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Update Comment</button>
                    </p>
                </fieldset>
            </form>
                </div>
                
            </div>
           
</body>
</html>