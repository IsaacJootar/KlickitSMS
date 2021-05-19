<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
            
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
               <h4>GENERATE BANK SCHEDULE</h4></div>
                <a href="acc_payroll.php" style="float:left" title="Go back to  previous page"  data-toggle="tooltip" class="btn btn-primary btn-sm"><i
                                ></i>   Back</a> <?php echo ' '. ' ' ;   ?>
                                 
                                 
                              <a class="btn btn-default" title="click here to refreash page " data-toggle="tooltip" href="acc_pr_bank_schedule.php" style="float:right"><i class="glyphicon glyphicon-refresh"></i>Refresh page</a></br>
              <form class="form-horizontal"  action="" method="post">
                <fieldset>
                
                 
                       
                  
                      <strong><td>YEAR </td> 
                    </strong>
                        <?php
                        $quer="SELECT distinct payroll_year FROM `acc_staff_monthly_payroll`"; 
echo "<select name='year' requir data-rel='chosen' required ><option value=''></option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[payroll_year]'>$noticia[payroll_year]</option>";
}
echo "</select>";

                       
		?>  

          <strong><td>MONTH </td>
                  </strong>
                        
                   <?php
                        $quer="SELECT distinct payroll_month FROM `acc_staff_monthly_payroll`"; 
echo "<select name='month'  data-rel='chosen' ><option value=''></option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[payroll_month]'>$noticia[payroll_month]</option>";
}
echo "</select>";
                       
		?>    
                    
                         
	
                  <button style="float:!important" type="submit" name="submit" class="btn btn-primary btn-sm">Generate</button>
                            <p>&nbsp;</p>
                    
                 
                    
                    
                       
                    
                    
                </fieldset>
            </form>
                                 
        <?php 


if(!isset($_POST['submit'])){}?>
        <?php
    if (isset($_POST['submit'])){
	$session->message("Bank schedule for $_SESSION[month] $_SESSION[year] has been generated successfully");
	   
		
		$_SESSION['year']=$_POST['year'];
		$_SESSION['month']=$_POST['month'];
						  
?>                        
             <div class="box col-md-11">
               <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                   <h2>Bank Schedule Generated for <?php echo  $_SESSION['month']  . ' '.$_SESSION['year'] ; ?>                </h2>
                   <div class="box-icon">  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a> <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> </div>
                 </div>
                 <div class="box-content">
                 
                   <table width="222%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    
                        
                          
                           <th width="221"><?php echo "<a target='_blank' class='btn btn-primary btn-sm' href=\"acc_pr_bank_schedule_print_out.php?year=".(urlencode($_SESSION['year']))."&&month=".(urlencode($_SESSION['month']))."\"><i class='glyphicon glyphicon-print' ></i>  Print bank schedule</a>" ?>
                           
                      </th>

                       </tr>
                     </thead>
                  
                     
                      
                  
                      
                       </tbody>
                     
                   </table>
                   <?php } // end loop?>
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