<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/schoolInformation.php'); ?>

            
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
               <h4>CONFIGURE SCHOOL INFORMATION</h4></div>
                                 
                 <a href="400js419pxysadmin.php.php" title="Click here to go back to main page " data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                        
                
                                 
                                                   
                        <p align="center"></br>
                        
                <div class="box col-md-3">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Click To Configure                </h2>
                </div>
                <div class="box-content" align="left">
                  <a href="#" class="btn btn-info btn-setting">Configure School  Information</a>
                    
                </div>
            </div>
        </div>
        
        
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h4 align="center">Configure School  Information</h4>
                </div>
                <div class="modal-body">
                
                 <form name="testform" method='POST' action='configure_school_infor_exe.php'>
                 <tr>
                   <td>
                 
                     <p><strong>Enter Your School's Official Fullname</strong></p>
                     <p>
                       <textarea name="sch_name" rows="4" cols="48" title="enter your school name">

<?php
 global $database;  
      $sql=$database->query("SELECT * FROM `school_infor` ORDER BY `school_infor`.`id` DESC");
$infor=$database->fetch_array($sql) ;
echo trim($infor['school_name']);
?>
                        </textarea>
                     </p>
                     <p></br>
<strong>Enter Your School's Official Address</strong></p>

                   </td>
                   <td>
      
<textarea name="sch_address" rows="4" cols="48" title="your school address can include phone numbers if you wish" placeholder="your school address can include phone numbers if you wish">
<?php 
      $sql=$database->query("SELECT * FROM `school_infor` ORDER BY `school_infor`.`id` DESC");
$infor=$database->fetch_array($sql) ;
echo trim($infor['school_address']);
?>
 </textarea>

</td>
</tr>
<br>


 <p class="center col-md-5">

                   <button type="submit" class="btn btn-primary">Save</button>
                   </p>
                   
   
           
</form>
                </div>
                
            </div>
        </div>
    </div>
    
             <div class="box col-md-9">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>School Information Details               </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                   <table width="222%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr>
                         
                         <th> School Name</th>
                         
                          <th> School Address</th>
                       </tr>
                     </thead>
                     <tbody>
                     
                       <?php
        global $database;  
      $sql=$database->query("SELECT * FROM `school_infor` ORDER BY `school_infor`.`id` DESC");
while($infor=$database->fetch_array($sql)) {
   ?>

                       
         <td class="center"><?php echo $infor['school_name'] ?></td>
                      
                           <td class="center"><?php echo $infor['school_address'] ?></td>
            
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                 <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
               
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                  
                </div>
                
            </div>
        </div>
    </div>
                 
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