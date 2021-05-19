<?php include('includes/header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('classes/section_manager.php'); ?> 
<?php require_once('classes/asses_manager.php'); ?> 

            
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
               <h4>Assessments Formats</h4></div>
                 <a href="400js419pxysadmin.php.php"> Back </a>
                 <p align="center">  <a href="create_assess1.php" title="Create New Assessment Format" data-toggle="tooltip"  class="btn btn-primary btn-sm"><i
                                class="glyphicon glyphicon-chevron glyphicon-edit"></i> New Assessment Format</a>
                                 
              
            <div class="box col-md-2">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2>Click for Details </h2>
                </div>
                <div class="box-content">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Section Name</th>
                        </tr>
                        </thead>
                        <tbody>
                         <?php
    $section = sectionManager::find_by_sql("SELECT * FROM `section`");
foreach($section as $sec) { ?>
        
        <td style="font-size:12px" class="center"> <a href="asses.php?<?php echo "id=".urlencode(($sec->id))."\">"?><?php echo $sec->sec_name ;?></a> </td>
    </tr>
    <?php }?>
                        </tbody>
                    </table>
                    <ul class="pagination pagination-centered">
                        <li><a href="#">Prev</a></li>
                        <li class="active">
                          
                        
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
             <div class="box col-md-10">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Assessment Format Details</h2>
                   
                 </div>
                 <div class="box-content">
                  <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                     <thead>
                       <tr style="font-size:10px">
                         
                         <th>N0. of CAs</th>
                         <th>CA1</th>
                          <th>CA2</th>
                           <th>CA3</th>
                            <th>CA4</th>
                             <th>CA5</th>
                              <th>CA6</th>
                            <th>score1</th>
                            <th>score2</th>
                           <th>score3</th>
                            <th>score4</th>
                             <th>score5</th>
                            <th>score6</th>
                             <th> Total CA score</th>
                           <th>Total Exam Score</th>
                           <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
					  if(!isset($_GET['id'])){$_GET['id']= "";};
       $asesss = assesManager::find_by_sql("SELECT * FROM `assessment` WHERE `section_id` = '{$_GET['id']}' order by `id` desc");
foreach($asesss  as $asses ) { ?>
                       
         <td class="center"><?php echo  $asses->ca_num;?> (Dossier Assos.)</td>
                       <td class="center"><?php echo $asses->CA1 ;  ?></td>
                        <td class="center"><?php echo $asses->CA2 ;  ?></td>
                         <td class="center"><?php echo $asses->CA3 ;  ?></td>
                        <td class="center"><?php echo  $asses->CA4 ;  ?></td>
                           <td class="center"><?php echo $asses->CA5 ;  ?></td>
                        <td class="center"><?php echo  $asses->CA6 ;  ?></td>
                        <td class="center"><?php echo $asses->score1 ;  ?> Marks</td>
                         <td class="center"><?php echo $asses->score2 ;  ?> Marks</td>
                          <td class="center"><?php echo $asses->score3 ;  ?> Marks</td>
                           <td class="center"><?php echo $asses->score4 ;  ?> Marks</td>
                                <td class="center"><?php echo $asses->score5 ;  ?> Marks</td>
                           <td class="center"><?php echo $asses->score6 ;  ?> Marks</td>
                            <td class="center"><?php echo $asses->total_ca ;  ?> Marks</td>
                            <td class="center"><?php echo $asses->total_exam ;  ?> Marks</td>
                          
                          
                          
                          
                            
                            
                            <td class="center">	<?php echo "<a href=\"delete_asses.php?id=".urlencode(($asses->id))."\"> Delete</a>" ?> </td>
                     </tr>
                     <?php }?>
                       </tbody>
                     
                   </table>
                  
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