<?php error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING &  ~E_STRICT & ~E_DEPRECATED);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Budget Items</title>
</head>

<body>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('classes/database.php'); ?>

<?php 

$id = $_GET['id'];
$sql=$database->query("SELECT * FROM  `time_table` WHERE `id`='{$id}'");
$sql=$database->fetch_array($sql);
?>
 <div class="modal-header">
 
  <button type="button" class="close" data-dismiss="modal">X</button>
                   
                    <h4 align="center">Update Time Table Set Up</h4>
                </div>
                <div class="modal-body">
                   <form class="form-horizontal" action="update_time_table.php" method="post">
                <fieldset>
                  <div class="input-group col-md-4">
                    <div class="input-group col-md-4"> <span class="input-group-addon">Activity</span>
                <select  name="activity" class="form-control" id="cat">
                            <?php 
                            global $database; 
                            $query=$database->query("SELECT `activity` 
                              FROM `time_table_activity` order by `id` asc");
                        while($activity=$database->fetch_array($query)) { ?>
                           <?php 
                          if($activity['activity']==$sql['activity']){ 
                            echo  '<option selected>'; 
                          } else{
                                 echo '<option>';
                             }
                         ?>
                            
                             <?php 
                               echo $activity['activity'];
                             } ?></option>
                           
                            
                            </select>
                    </div></br>
                   
                    <div class="input-group col-md-4"> <span class="input-group-addon">Starts</span>
                      <input type="time" name="starts" value="<?php echo $sql['starts'];?>" required class="form-control"/>
                    </div></br>
                    
                  
                    <div class="input-group col-md-4"> <span class="input-group-addon">Ends</span>
                      <input type="time" name="ends" value="<?php echo $sql['ends'];?>" required class="form-control"/>
                    </div></br>
                    
                    
                    <input name="id" value="<?php echo $sql['id'];?>" type="hidden" />
                    
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Update time table</button>
                    </p>
                </fieldset>
            </form>
                </div>
                
            </div>
           
</body>
</html>