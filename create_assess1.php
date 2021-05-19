<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/result_manager.php'); ?>
<?php
if(isset($_POST['submit'])){
  $_SESSION['sec_id']=$_POST['sec_id'];
   $_SESSION['ca_num']=$_POST['ca_num'];
    switch ($_POST['ca_num']) {
       case '0':
        redirect_to('create_assess0.php');
        break;
      case '1':
        redirect_to('create_assess1_.php');
        break;
      case '2':
        redirect_to('create_assess2.php');
        break;
      case '3':
        redirect_to('create_assess3.php');
        break;
      case '4':
        redirect_to('create_assess4.php');
        break;
         case '5':
        redirect_to('create_assess5.php');
        break;
        case '6':
        redirect_to('create_assess6.php');
        break;
      default:
        redirect_to('create_assess1.php');

        break;
    }
} // end of forloop//
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
                     
              <div class="alert alert-info" align="center">
               <h4>CREATE ASSESSMENT FORMAT</h4></div>
         
                <a href="asses.php" style="float:left" title="Go back to previous page"  data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
<script>
function myFunction() {
    location.reload();
}
</script>

</br>
              <form class="form-horizontal" name="cat_form" action="" method="post">
                    <fieldset>
                
                 
<b><h5>Select a section and the number of CAs</h5></b><p><p>
<?php
                       $quer="SELECT id, sec_name FROM `section` order by id"; 
echo "<select name='sec_id'  data-rel='chosen' required><option value=''>Select Section</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[id]'>$noticia[sec_name]</option>";
}
echo "</select>";
                       
    ?>
                    Number  of CA
    <select name="ca_num" data-rel='chosen' required>
      <option value="">----</option>
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select>
                  </p>
                             
                       
                  <button style="float:!important" type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
                            
                    
                 
                    
                    
                       
                    
                    
                </fieldset>
            </form>
                           
      </font>
                
                </td>
             
             
                          </tr>
                        
                        
                     
                       
                          
                        
                        </table>
                        
          
            
            
                 
                
            </div>
        </div>
    </div>
                 
                 </div>
            
              <p>&nbsp; </p>
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