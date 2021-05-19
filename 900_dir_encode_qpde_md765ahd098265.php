<?php include ('includes/dir_header.php');?>

<?php  // header ends?>
    <div class="box col-md-12">
        <div class="box-inner">
            
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                    <h2>welcome to director's Account</h2>
                        Klickit SMS is a dynamic, responsive, multi tasking school management software.</h1>
                    <p>Klickit Systems has created this software to ease the tasking work of managing students, session, term, classes, results, inventory, accounting and many other processes in schools and colleges. Everything is just a Klick away!</p>
                    

                   
                </div>
                <!-- Ads, you can remove these -->
                <div class="col-lg-5 col-md-12 hidden-xs center-text">
                   
              </div>

                <div class="col-lg-5 col-md-12 visible-xs center-text">
                    
              </div>
                <!-- Ads end -->

            </div>
        </div>
    </div>
</div>

<div class="row"><!--/span--><!--/span--><!--/span-->
</div><!--/row-->

<div class="row"><!--/span--><!--/span-->

    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-list"></i> School Statistical Overview</h2>

                <div class="box-icon">
                   
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <ul class="dashboard-list">
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-arrow-up"></i>
                            <span class="green"><?php echo $classes=director::find_num_of_classes(); ?></span>
                            Classes
                      </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-user"></i>
                            <span class="red"><?php echo $female=director::find_num_of_female(); ?></span>
                            Female Students
                      </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-user"></i>
                            <span class="blue"><?php echo $male=director::find_num_of_male(); ?></span>
                          Male Students
                      </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-file"></i>
                            <span class="yellow"><?php echo $female=director::find_num_of_sec(); ?></span>
                           School Sections
                      </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-user"></i>
                            <span class="green"><?php echo $grads=director:: find_num_of_graduates(); ?></span>
                            Graduated Students
                      </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-arrow-down"></i>
                            <span class="red"><?php echo $bank=director::find_num_of_bank(); ?></span>
                           Authorized Banks
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-arrow-up"></i>
                            <span class="blue"><?php echo $bus=director::find_num_of_bus(); ?></span>
                           Students Taking School Bus
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-user"></i>
                            <span class="yellow"><?php echo $students=director::find_num_of_students(); ?></span>
                          Total Number of Students
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

   <?php include('includes/footer.php'); ?>