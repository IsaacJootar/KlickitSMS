<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php // require_once('classes/database.php'); ?>
<?php require_once('classes/student_class_manager.php'); ?>
<script src="jquery-ui-1.12.0/jquery-1.12.4.js"></script>
<script src="jquery-ui-1.12.0/jquery-ui.js"></script>
<script>
$( function() {
$( "#datepicker1" ).datepicker();
$( "#datepicker2" ).datepicker();
} );
</script>


<div class="box-content row">


<div class="control-group">
 
<div align="center">
<?php
if ((output_message($message))){
echo   '<div class="alert alert-success">';
 echo ' <button type="button" class="close" data-dismiss="alert">&times;</button>';
 
 echo output_message($message); 
echo ' </div>';
unset ($message);
}
?>
<?php echo $session->display_error(); ?>         
    <a href="f_attendance1.php"> back </a>
<div class="alert alert-info" align="center">
<h4>STUDENT'S SCHOOL ATTENDANCE</h4></div>


              

</br>  <form class="form-horizontal" action="" method="post">

<div align="center">
<h5> Select a week to start marking</h5>
<p>


<?php

     $query="SELECT `duration` FROM `config_term_duration`
      WHERE  `session` = '{$sess_id}' AND `term` = '{$term}'";
     $result=$database->query($query);
     $result=$database->fetch_array($result);
     $weeks=$result['duration'];
     
echo "<select name='week' data-rel='chosen' required ='required'><option value=''> Week --------</option>";
for ($i=1; $i<= $weeks; $i++) {
echo  "<option value='$i'> Week $i </option>";
}
echo "</select>";
     
?>

<input type="text" name="date"  placeholder="click to pick date" required readonly id="datepicker2">  <button type="submit" name="submit" class="btn btn-primary">create attendance sheet</button>
<p>&nbsp;</p>

</div>
</div>
</form>
<?php


if(!isset($_POST['submit'])){}?>
<?php
    if (isset($_POST['submit'])){
    $date=$_POST['date'];
    $date=date('D, M j, Y',  strtotime($date));
     $day=substr($date, 0, 3);
    $week=$_POST['week'];


    $classes = studentclassManager::find_by_sql("SELECT * FROM `student_class` WHERE `class_name`='{$myclass}'"); 

?>                       
<div class="box col-md-81">
<div class="box-inner">

<div class="box-header well" data-original-title="">

 <h2>Tick appropriately to mark student attendance for  <?php echo $date; ?></h2>
 <div class="box-icon"> 

  <a href="#" class="btn btn-minimize btn-round btn-default"><i
              class="glyphicon glyphicon-chevron-up"></i></a> 
</div>
</div>
<div class="box-content">

   <form method="post" action="f_attendance_.php" >
       <table width="122%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
   <thead>
      
     <tr bgcolor="CCCCCC">
       
       <th>Student's Full Name</th>
       <th>Status</th>
        <th>Status</th>
         <th>Status</th>
      
        
     </tr>
   </thead>
   <tbody>
     <?php

foreach($classes  as $class ) {  
$select=$database->query("SELECT *  FROM `student_attendance` WHERE `class_name`='{$myclass}'
 AND `sess_id`='{$sess_id}' AND `term_id` = '{$term_id}'  AND 
  `student_id`= '{$class->student_id}' AND `week`='{$week}' AND  `$day` IS NOT NULL");
$select=$database->fetch_array($select);


// end if?>


<td class="center"><?php echo  $class->fullname ; ?></td>

<input name="qst[]" type="text" size="8" class="flat"  value="<?php echo $class->student_id;?>" style="visibility:hidden" />
 
 <td>
<input type="radio" name="<?php echo $class->student_id;?>" <?php if ($select["$day"] == '1' ) 
          
          {echo 'checked="checked" ';} ?>    required="required" value="1"  />
present </td>
<td>
<input type="radio" name="<?php echo $class->student_id;?>" <?php if ($select["$day"] =='0' ) 
          
          {echo 'checked="checked" ';} ?>   required="required" value="0"  />
absent </td>
<td>
<input type="radio" name="<?php echo $class->student_id;?>" <?php if ($select["$day"] == 'off' ) 
          
          {echo 'checked="checked" ';} ?> required="required" value="off" />
---

</td>
<input name="week" type="text" size="8" class="flat"  value="<?php echo $week;?>" style="visibility:hidden" />
<input name="date" type="text" size="8" class="flat"  value="<?php echo $date?>" style="visibility:hidden" />
      
          
   </tr>
   <?php }?>
     </tbody>
 </table>
 
 
  <br><div align="center">
    <input  align="center" type="submit" name="submit" value="Submit">  
    </br>
 </div>
</form>
 <?php } // end the form submission check vpost variable?>    


</div>
</div>
<p>&nbsp;</p>
</div>
</p>
<p>&nbsp;                        </p>
   
</div>

</div>

  


</div>


</div>


</div>
</div>
</div>

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->
<!-- content ends -->
</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

<!-- Ad, you can remove it -->

<?php include('includes/footer.php'); ?>