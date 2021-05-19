<?php include('includes/acc_header.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php require_once('classes/student_manager.php'); ?>            
            <div class="box-content row">
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
                     
                  <p class="center col-md-1" align="right">
                    <a href="manage_student.php">Back</a>
                    </p> 
                 
             <div class="well col-md-12 center login-box">
             
            <div class="alert alert-info">
              Create Student Account
             
                </div>
            <form class="form-horizontal" action="acc_create_student_exe.php" method="post">
                <fieldset>
                 <img src="images/avatar.png" style="float:right" alt="" width="68" height="68"/>
                
                <h4 align="left"><strong>Personal Information </strong></br></h4>
                
                <div class="input-group col-md-4">
                 <div align="left"><strong>Present Class</strong>
                 
                         <SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='acc_create_student.php?cat=' + val ;
}

</script>
<?Php

@$cat=$_GET['cat']; // category, as in staff//
///////// Getting the data from Mysql table for first list box//////////
 $quer2="SELECT id, sec_name FROM `section` ORDER BY id"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
if(isset($cat)){
$quer="SELECT DISTINCT section_id, class_name FROM `class_section` where section_id=$cat order by class_name"; 
}else{$quer="SELECT DISTINCT section_id, class_name FROM class_section order by section_id"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////


echo "<select name='cat' data-rel='chosen'  required='required' onchange=\"reload(this.form)\"><option value=''>Select A Section... </option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['id']==@$cat){echo "<option selected value='$noticia2[id]'>$noticia2[sec_name]</option>"."<BR>";}
else{echo  "<option value='$noticia2[id]'>$noticia2[sec_name]</option>";}
}
echo "</select>";
    
echo "<select name='subcat' data-rel='chosen' required='required'><option value=''>Select A Class/Grade/Arm......</option>";
foreach ($dbo->query($quer) as $noticia) {
echo  "<option value='$noticia[class_name]'>$noticia[class_name]</option>";
}
echo "</select>";
?>
                        </div>
                     
                  </div>
                   <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <div align="left"><strong>Student Type</strong>
                        <select required="required" name="status"  id="selectError2" data-rel="chosen" >
                          <option value=""></option> 
                        <option value="1">Returning Student</option>
                        <option value="0">New Student</option>
                        </select>
                        </div>
                  </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                  
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" name="firstname"  class="form-control" placeholder="First Name">
                    </div>
                    <div class="clearfix"></div><br>

                <div class="clearfix"></div><br>
                     <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" name="lastname"  class="form-control" placeholder="Last Name">
                    </div>
                     <div class="clearfix"></div><br>
                     <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" name="user_id" required  class="form-control" placeholder="student reg. number ">
                    </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <div align="left"><strong>Select Gender</strong>
                        <select name="gender"  id="selectError2" data-rel="chosen" >
                        <option value=""> </option>        
                        <option>Male</option>
                        <option>Female</option>
                        </select>
                        </div>
                  </div>
                   <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                       
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                    <div align="left"><strong>Date Of Birth</strong>
                       <select name="DAY" id="selectError2" data-rel="chosen"  >
<option value="">Day------</option>
<?php for( $i =1; $i<32; $i++){?>
<option value="<?php echo (($i/10)<1)? "0". $i : $i;?>"> <?php echo (($i/10)<1)?"0".$i:$i?></option>
<?php }?>
</select>
<select name="MONTH" id="selectError2" data-rel="chosen" >
  <option value="">Month------</option>
  <?php for($i=1;$i<13;$i++){?>
          <option value="<?php echo (($i/10)<1)?"0".$i : $i?>"><?php echo (($i/10)<1)?"0".$i : $i?></option>
          <?php }?> 
</select>
<select name="YEAR" id="selectError2" data-rel="chosen"> 
<option value="">Year------</option>
<?php for($i =1900; $i<2032; $i++){?>
<option value="<?php echo (($i/10)<1)? "0". $i : $i?>"> <?php echo (($i/10)<1)?"0". $i : $i?></option>
<?php } ?>
</select>
                    </div><br>
                <h4 align="left"><strong>Contact Information </strong></br></h4>
                <div class="clearfix"></div>
                    <div align="left"><strong>Residential Address</strong></br></div>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home red"></i></span>
                        <textarea name="residential" class="form-control" rows="2" cols="1" >
                        </textarea>
                    </div>
                    <div class="clearfix"></div><br>
                    <div align="left"><strong>Contact Address</strong></br></div>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-globe red"></i></span>
                        <textarea name="contact" class="form-control" rows="2" cols="1">
                        </textarea>
                    </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <div align="left"><strong>Select Country</strong>
                        <select name="country"  id="selectError2" data-rel="chosen" >
                        <option value=""> </option>        
                        <option value="United States">United States</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="Afghanistan">Afghanistan</option>
            <option value="Aland Islands">Aland Islands</option>
            <option value="Albania">Albania</option>
            <option value="Algeria">Algeria</option>
            <option value="American Samoa">American Samoa</option>
            <option value="Andorra">Andorra</option>
            <option value="Angola">Angola</option>
            <option value="Anguilla">Anguilla</option>
            <option value="Antarctica">Antarctica</option>
            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
            <option value="Argentina">Argentina</option>
            <option value="Armenia">Armenia</option>
            <option value="Aruba">Aruba</option>
            <option value="Australia">Australia</option>
            <option value="Austria">Austria</option>
            <option value="Azerbaijan">Azerbaijan</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahrain">Bahrain</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbados">Barbados</option>
            <option value="Belarus">Belarus</option>
            <option value="Belgium">Belgium</option>
            <option value="Belize">Belize</option>
            <option value="Benin">Benin</option>
            <option value="Bermuda">Bermuda</option>
            <option value="Bhutan">Bhutan</option>
            <option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
            <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            <option value="Botswana">Botswana</option>
            <option value="Bouvet Island">Bouvet Island</option>
            <option value="Brazil">Brazil</option>
            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
            <option value="Brunei Darussalam">Brunei Darussalam</option>
            <option value="Bulgaria">Bulgaria</option>
            <option value="Burkina Faso">Burkina Faso</option>
            <option value="Burundi">Burundi</option>
            <option value="Cambodia">Cambodia</option>
            <option value="Cameroon">Cameroon</option>
            <option value="Canada">Canada</option>
            <option value="Cape Verde">Cape Verde</option>
            <option value="Cayman Islands">Cayman Islands</option>
            <option value="Central African Republic">Central African Republic</option>
            <option value="Chad">Chad</option>
            <option value="Chile">Chile</option>
            <option value="China">China</option>
            <option value="Christmas Island">Christmas Island</option>
            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
            <option value="Colombia">Colombia</option>
            <option value="Comoros">Comoros</option>
            <option value="Congo">Congo</option>
            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
            <option value="Cook Islands">Cook Islands</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Cote D'ivoire">Cote D'ivoire</option>
            <option value="Croatia">Croatia</option>
            <option value="Cuba">Cuba</option>
            <option value="Curacao">Curacao</option>
            <option value="Cyprus">Cyprus</option>
            <option value="Czech Republic">Czech Republic</option>
            <option value="Denmark">Denmark</option>
            <option value="Djibouti">Djibouti</option>
            <option value="Dominica">Dominica</option>
            <option value="Dominican Republic">Dominican Republic</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Egypt">Egypt</option>
            <option value="El Salvador">El Salvador</option>
            <option value="Equatorial Guinea">Equatorial Guinea</option>
            <option value="Eritrea">Eritrea</option>
            <option value="Estonia">Estonia</option>
            <option value="Ethiopia">Ethiopia</option>
            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
            <option value="Faroe Islands">Faroe Islands</option>
            <option value="Fiji">Fiji</option>
            <option value="Finland">Finland</option>
            <option value="France">France</option>
            <option value="French Guiana">French Guiana</option>
            <option value="French Polynesia">French Polynesia</option>
            <option value="French Southern Territories">French Southern Territories</option>
            <option value="Gabon">Gabon</option>
            <option value="Gambia">Gambia</option>
            <option value="Georgia">Georgia</option>
            <option value="Germany">Germany</option>
            <option value="Ghana">Ghana</option>
            <option value="Gibraltar">Gibraltar</option>
            <option value="Greece">Greece</option>
            <option value="Greenland">Greenland</option>
            <option value="Grenada">Grenada</option>
            <option value="Guadeloupe">Guadeloupe</option>
            <option value="Guam">Guam</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guernsey">Guernsey</option>
            <option value="Guinea">Guinea</option>
            <option value="Guinea-bissau">Guinea-bissau</option>
            <option value="Guyana">Guyana</option>
            <option value="Haiti">Haiti</option>
            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
            <option value="Honduras">Honduras</option>
            <option value="Hong Kong">Hong Kong</option>
            <option value="Hungary">Hungary</option>
            <option value="Iceland">Iceland</option>
            <option value="India">India</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
            <option value="Iraq">Iraq</option>
            <option value="Ireland">Ireland</option>
            <option value="Isle of Man">Isle of Man</option>
            <option value="Israel">Israel</option>
            <option value="Italy">Italy</option>
            <option value="Jamaica">Jamaica</option>
            <option value="Japan">Japan</option>
            <option value="Jersey">Jersey</option>
            <option value="Jordan">Jordan</option>
            <option value="Kazakhstan">Kazakhstan</option>
            <option value="Kenya">Kenya</option>
            <option value="Kiribati">Kiribati</option>
            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
            <option value="Korea, Republic of">Korea, Republic of</option>
            <option value="Kuwait">Kuwait</option>
            <option value="Kyrgyzstan">Kyrgyzstan</option>
            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
            <option value="Latvia">Latvia</option>
            <option value="Lebanon">Lebanon</option>
            <option value="Lesotho">Lesotho</option>
            <option value="Liberia">Liberia</option>
            <option value="Libya">Libya</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lithuania">Lithuania</option>
            <option value="Luxembourg">Luxembourg</option>
            <option value="Macao">Macao</option>
            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
            <option value="Madagascar">Madagascar</option>
            <option value="Malawi">Malawi</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Maldives">Maldives</option>
            <option value="Mali">Mali</option>
            <option value="Malta">Malta</option>
            <option value="Marshall Islands">Marshall Islands</option>
            <option value="Martinique">Martinique</option>
            <option value="Mauritania">Mauritania</option>
            <option value="Mauritius">Mauritius</option>
            <option value="Mayotte">Mayotte</option>
            <option value="Mexico">Mexico</option>
            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
            <option value="Moldova, Republic of">Moldova, Republic of</option>
            <option value="Monaco">Monaco</option>
            <option value="Mongolia">Mongolia</option>
            <option value="Montenegro">Montenegro</option>
            <option value="Montserrat">Montserrat</option>
            <option value="Morocco">Morocco</option>
            <option value="Mozambique">Mozambique</option>
            <option value="Myanmar">Myanmar</option>
            <option value="Namibia">Namibia</option>
            <option value="Nauru">Nauru</option>
            <option value="Nepal">Nepal</option>
            <option value="Netherlands">Netherlands</option>
            <option value="New Caledonia">New Caledonia</option>
            <option value="New Zealand">New Zealand</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Niger">Niger</option>
            <option value="Nigeria">Nigeria</option>
            <option value="Niue">Niue</option>
            <option value="Norfolk Island">Norfolk Island</option>
            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
            <option value="Norway">Norway</option>
            <option value="Oman">Oman</option>
            <option value="Pakistan">Pakistan</option>
            <option value="Palau">Palau</option>
            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
            <option value="Panama">Panama</option>
            <option value="Papua New Guinea">Papua New Guinea</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Peru">Peru</option>
            <option value="Philippines">Philippines</option>
            <option value="Pitcairn">Pitcairn</option>
            <option value="Poland">Poland</option>
            <option value="Portugal">Portugal</option>
            <option value="Puerto Rico">Puerto Rico</option>
            <option value="Qatar">Qatar</option>
            <option value="Reunion">Reunion</option>
            <option value="Romania">Romania</option>
            <option value="Russian Federation">Russian Federation</option>
            <option value="Rwanda">Rwanda</option>
            <option value="Saint Barthelemy">Saint Barthelemy</option>
            <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
            <option value="Saint Lucia">Saint Lucia</option>
            <option value="Saint Martin (French part)">Saint Martin (French part)</option>
            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
            <option value="Samoa">Samoa</option>
            <option value="San Marino">San Marino</option>
            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
            <option value="Saudi Arabia">Saudi Arabia</option>
            <option value="Senegal">Senegal</option>
            <option value="Serbia">Serbia</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra Leone">Sierra Leone</option>
            <option value="Singapore">Singapore</option>
            <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
            <option value="Slovakia">Slovakia</option>
            <option value="Slovenia">Slovenia</option>
            <option value="Solomon Islands">Solomon Islands</option>
            <option value="Somalia">Somalia</option>
            <option value="South Africa">South Africa</option>
            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
            <option value="South Sudan">South Sudan</option>
            <option value="Spain">Spain</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Sudan">Sudan</option>
            <option value="Suriname">Suriname</option>
            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
            <option value="Swaziland">Swaziland</option>
            <option value="Sweden">Sweden</option>
            <option value="Switzerland">Switzerland</option>
            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
            <option value="Taiwan, Province of China">Taiwan, Province of China</option>
            <option value="Tajikistan">Tajikistan</option>
            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
            <option value="Thailand">Thailand</option>
            <option value="Timor-leste">Timor-leste</option>
            <option value="Togo">Togo</option>
            <option value="Tokelau">Tokelau</option>
            <option value="Tonga">Tonga</option>
            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
            <option value="Tunisia">Tunisia</option>
            <option value="Turkey">Turkey</option>
            <option value="Turkmenistan">Turkmenistan</option>
            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
            <option value="Tuvalu">Tuvalu</option>
            <option value="Uganda">Uganda</option>
            <option value="Ukraine">Ukraine</option>
            <option value="United Arab Emirates">United Arab Emirates</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="United States">United States</option>
            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Uzbekistan">Uzbekistan</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
            <option value="Viet Nam">Viet Nam</option>
            <option value="Virgin Islands, British">Virgin Islands, British</option>
            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
            <option value="Wallis and Futuna">Wallis and Futuna</option>
            <option value="Western Sahara">Western Sahara</option>
            <option value="Yemen">Yemen</option>
            <option value="Zambia">Zambia</option>
            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                        </div>
                  </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home red"></i></span>
                        <input type="text" name="state" class="form-control" placeholder="State of Origin">
                    </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home red"></i></span>
                        <input type="text" name="lga" class="form-control" placeholder="Local Government Area">
                    </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone red"></i></span>
                        <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                    </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope red"></i></span>
                        <input type="text" name="email" class="form-control" placeholder="Email Address">
                    </div>;
                <div class="clearfix"></div><br>
                <h4 align="left"><strong>Parent/Guardian information </strong></br></h4>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" name="father_name" class="form-control" placeholder="Father's Name">
                    </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-globe red"></i></span>
                        <input type="text" name="father_address" class="form-control" placeholder="Father's Address">
                    </div>
                    
                <div class="clearfix"></div><br>
                   <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-globe red"></i></span>
                        <input type="text" name="father_number" class="form-control" placeholder="Father's Number">
                    </div>
                    
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase red"></i></span>
                        <input type="text" name="father_occupation" class="form-control" placeholder="Father's Occupation">
                    </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" name="mother_name" class="form-control" placeholder="Mother's Name">
                    </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone red"></i></span>
                        <input type="text" name="mother_number" class="form-control" placeholder="Mother's Phone Number">
                    </div>
                    
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase red"></i></span>
                        <input type="text" name="mother_occupation" class="form-control" placeholder="Mother's Occupation">
                    </div>
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-bell red"></i></span>
                        <input type="text" name="religion" class="form-control" placeholder="Religion">
                    </div>
                <div class="clearfix"></div><br>
                   
                <div class="clearfix"></div><br>
                    <div class="input-group col-md-4">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-heart red"></i></span>
                        <input type="text" name="health" class="form-control" placeholder="Special Health Problem">
                    </div>
                   
                <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </p>
                </fieldset>
            </form>
                      
                        
                       </p>
                        <p>&nbsp;                        </p>
                     
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
 <?php ob_end_flush(); ?>