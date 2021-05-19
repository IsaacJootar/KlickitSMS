<?php include('includes/f_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
 <script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "#mytextarea", 
            plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste"
],
 toolbar: "insertfile undo redo | styleselect | bold italic | alignleft  aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
    </script>

  <?php 
  // get $tittle_id on matter where user is coming from
  if(isset($_GET['id'])){
     $tittle_id=$_GET['id'];
     unset($_SESSION['tittle_id']);
  }
  if(isset($_SESSION['tittle_id'])){
     $tittle_id=$_SESSION['tittle_id'];
     unset($_GET['id']);
  }
   
  $data= $database->query("SELECT * FROM `cbt_question_tittle` WHERE `id`='{$tittle_id}' order by `id` desc");
  $data=$database->fetch_array($data);

  
                 ?>
            
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
                     
                               
              <p align="center">  <a href="f_cbt.php"> << back </a>
                                 
                        
    <td><h4>Class</strong>: <i style="color:#000"> <?php echo $data['class_name'] . '  ';?></i> Subject:</strong> <i style="color:#000"> <?php echo $data['subject_name']. '</br>';  ?> </i></br>Test Title</strong> <i style="color:#000"> <?php echo "<span class='label-success label label-default'> " .   $data['tittle_text']; ?></span></h4> </td>
                  <p align="center"></br>
             <div class="box col-md-14">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Start adding Questions. Select yes for  correct answer</h2></div>
                
                 <div class="box-content">
               
 <form  id="form" action="cbt_fadd_questions_exe.php" method="POST"> 

<table class="table table-striped table-bordered bootstrap-datatable">
  
<?php
  $tittle_text=$data['tittle_text'];
  $query1="SELECT * FROM `cbt_questions` WHERE `tittle_text`= '$tittle_text'"; // come back and reduce the elements this query will fetch- select question_text where...//
  $result=$database->query($query1);
    // numbering aglorithm for questions
  $qid=$database->num_rows($result);
  $qid=$qid+1;

  $_SESSION['qid'] = $qid;
  $_SESSION['tittle_text'] = $data['tittle_text'];
  $_SESSION['class'] = $data['class_name'];
  $_SESSION['subject'] =$data['subject_name'];
  $_SESSION['tittle_id']=$tittle_id; //maintain the numbering
  $_SESSION['staff_id'] = $id; //stored when user logged in 
  session_write_close();  

?> 
       <tr>

<td><b>Enter Question<?php echo ' '. $qid; ?></b></td>
    <td width="300"><p>
       <textarea id="mytextarea"  name="ques_text"   placeholder="start typing your question here"></textarea>
    </p>
      <p><strong>Enter the options below &amp; select yes for the correct option</strong></p>
      <p>&nbsp; </p></td>
         
    </tr>
        
    <tr>
    <td width="250">Option A</td>
    <td><input name="o1" type="text"  required class="form-control" placeholder="Type Your first option Here">
    
        <label>is this option the correct answer?<p>
          <input type="radio" name="oa" checked  required="required" value="no" id="oa_0" />
          no</label>
    
        <label>
          <input type="radio" name="oa"  value="yes" id="oa_1" />
          yes</label>  
            </td>
        
    </tr>
    <tr>
    <td width="250">Option B</td><td>
        <input name="o2" type="text"  required class="form-control" placeholder="Type Your second option Here">
        
      
        <label>is this option the correct answer?<p>
          <input type="radio" name="ob" checked   required="required" value="no"  />
          no</label>
        <label>
          <input type="radio" name="ob"  required="required"value="yes" />
          yes</label>   
        </td>
    </tr>       
      <tr>
<td width="250">Option C</td>
    <td><input name="o3" type="text"   required class="form-control" placeholder="Type Your third option Here">
        <label>is this option the correct answer?<p>
          <input type="radio" name="oc" checked  required value="no" />
          no</label>
    
        <label>
          <input type="radio" name="oc"  value="yes" />
          yes</label>  
            </td>
    </tr>
     <tr>
<td width="250">Option D</td>
    <td><input name="o4" type="text"   required class="form-control" placeholder="Type Your fourth option Here">
        <label>is this option the correct answer?<p>
          <input type="radio" name="od" checked  required value="no" />
          no</label>
    
        <label>
          <input type="radio" name="od"  value="yes" />
          yes</label>  
            </td>
    </tr>

    <tr>
    <td width="250">Option E</td><td>
      <p>
        <input name="o5" type="text"  required class="form-control" placeholder="Type Your fifth option Here">
        
        <label>is this option the correct answer?<p>
          <input type="radio" name="oe"  checked  required value="no" id="oa_0" />
          no</label>
        <label>
          <input type="radio" name="oe" required value="yes" id="oa_1" />
          yes</label>
        
        </p>
      </td>
</tr>

<?php

 $score= $database->query("SELECT * FROM `cbt_questions` WHERE `tittle_text`='{$tittle_text}' order by `id` desc");
  $score=$database->fetch_array($score);
  if(!empty($score['score'])){
  $score=$score['score'];

echo '<tr>
   <td colspan="3"><strong>
  <div align="center">
  <strong>This mark is selected automatically based on your previous selection. </strong>


 
<p>';
?>
 <input type="text" name="score" value="<?php echo "$score"; ?>" readonly />

      </p>
      <p>&nbsp;</p>
      <p>&nbsp; </p>
           </td>
    
    </tr>
    <?php }else{?>
          
  <?php 
 echo '<tr>
   <td colspan="3"><strong>
  <div align="center">
  <strong>Select the required mark for this question. All questions should carry equal mark</strong>


 
<p>
  <select  name="score" required="required">
  <option value="">set score</option>
  <option value="1">1 Mark</option> 
   <option value="2">2 Marks</option> 
   <option value="3">3 Marks</option> 
   <option value="4">4 Marks</option> 
   <option value="4">5 Marks</option> 
   <option value="5">5 Marks</option> 
</select>


      </p>
      <p>&nbsp;</p>
      <p>&nbsp; </p>
           </td>
    
    </tr>';
}
  ?>
<td colspan="3"><div align="center">
<script type="text/javascript">
tinymce.get('elm1').save();
</script>

<script type="text/javascript">

</script>
<input name="submit" value="Set Question Now" type="submit" /></div></td>
 </table>
 </form> 
   <td id="navigation">&nbsp;
       <?php // include('includes/side_right.php')?>
</td>
</tr>
</table>  
                   </form>
                   
                 </div>
               </div>
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