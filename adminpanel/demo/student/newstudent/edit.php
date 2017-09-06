<?php 
include('../../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

//Get Here Student List
 $sql="SELECT *, DATE_FORMAT(DOB,'%d-%m-%Y') AS DOB, DATE_FORMAT(Join_Date,'%d-%m-%Y') AS Join_Date FROM students  WHERE Student_Id='".$_REQUEST['id']."'";
 $getEdit=$db->ExecuteQuery($sql);
 
 //Get Country Name Here
 $country=$db->ExecuteQuery("SELECT * FROM countries");
 
 //Get State Name Here
 $state=$db->ExecuteQuery("SELECT * FROM states WHERE country_id='".$getEdit[1]['Country']."'");
 
 //Get City Name Here
 $city=$db->ExecuteQuery("SELECT * FROM cities WHERE state_id='".$getEdit[1]['State']."'");
?>
<script type="text/javascript" src="student.js"></script>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3> Edit Student   </h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Edit Form  </h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <button class="btn btn-round btn-success" onclick="location.href='list.php';">Back</button>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <form class="form-horizontal form-label-left" action="" method="post" id="addform">
          <input type="hidden" id="id" value="<?php echo $getEdit[1]['Student_Id']?>">
          <div class="col-sm-12">
            <div class="col-sm-6">
               <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fname">First Name <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <input type="text" id="fname" class="form-control col-md-7 col-xs-12" name="fname" placeholder="Ex. Ram" required type="text" value="<?php echo $getEdit[1]['First_Name']?>">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lname">Last Name <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <input type="text" id="lname" class="form-control col-md-7 col-xs-12" name="lname" placeholder="Last Name" required type="text" value="<?php echo $getEdit[1]['Last_Name']?>">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12 " for="mother">Mother Name  <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <input type="text" id="mother" name="mother" required="required" class="form-control col-md-7 col-xs-12 " placeholder="Mother's Name" value="<?php echo $getEdit[1]['Mother_Name']?>">
                 
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12 " for="dob">DOB<span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <input type="text" id="dob" name="dob" required="required" class="form-control col-md-7 col-xs-12 datepicker" placeholder="15-05-1990" value="<?php echo $getEdit[1]['DOB']?>">
                </div>
              </div>
              
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12 " for="roll_no">Roll No </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <input type="text" id="roll_no" name="roll_no"  class="form-control col-md-7 col-xs-12" placeholder="RG1230012" value="<?php echo $getEdit[1]['Roll_No']?>">
                 
                </div>
              </div>
              
              
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12 " for="country">County<span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <select  id="country" name="coutry" required="required" class="form-control col-md-7 col-xs-12" >
                  	<option value="">Select Country Name</option>
                    <?php foreach($country as $val){?>
                    <option value="<?php echo $val['id']?>" <?php if($val['id']==$getEdit[1]['Country']){ echo "SELECTED"; }?>><?php echo $val['name']?></option>
                    <?php } ?>
                  </select>
                 
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">State <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <select id="state" name="state" class="form-control col-md-7 col-xs-12 " required="required"  >
                  	<option value="">Select State Name</option>
                    <?php foreach($state as $val){ ?>
                    <option value="<?php echo $val['id']?>" <?php if($val['id']==$getEdit[1]['State']){ echo "selected";}?> ><?php echo $val['name']?></option>
					<?php } ?>
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="City">City <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <select id="city" name="city" class="form-control col-md-7 col-xs-12 " >
                  	<option value="">Select City</option>
                    <?php foreach($city as $val){ ?>
                    <option value="<?php echo $val['id']?>" <?php if($val['id']==$getEdit[1]['City']){ echo "selected";}?> ><?php echo $val['name']?></option>
					<?php } ?>
                  </select>
                </div>
              </div>
              
              
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile">Mobile <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <input type="text" id="mobile" name="mobile" class="form-control col-md-7 number col-xs-12 " placeholder="Ex. 9000090000" value="<?php echo $getEdit[1]['Mobile']?>" />
                </div>
              </div>
              
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <input type="text" id="email" name="email" class="form-control col-md-7 col-xs-12 " placeholder="Ex. demo@gamil.com" value="<?php echo $getEdit[1]['Email']?>" />
                </div>
              </div>
              
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="profile">Profile Image </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <input type="file" id="profile_image" name="profile_image" class="form-control col-md-7 col-xs-12 " />
                </div>
                
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="profile">Profile Image </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                <?php if($getEdit[1]['Profile_Image']!=''){ ?>
                	<a href="<?php echo PATH_UPLOAD_IMAGE.'/student/'.$getEdit[1]['Profile_Image']?>" target="_open"><img src="<?php echo PATH_UPLOAD_IMAGE.'/student/thumb/'.$getEdit[1]['Profile_Image']?>" /></a>
                    <input type="hidden" id="profile_old" name="profile_old" value="<?php echo $getEdit[1]['Profile_Image']?>" />
                <?php } ?>
                </div>
              </div>
          </div>
          <!--Right Side -->
          <div class="col-sm-6">
               <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mname">Middle Name <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <input type="text" id="mname" class="form-control col-md-7 col-xs-12" name="mname" placeholder="Middle Name " required type="text" value="<?php echo $getEdit[1]['Middle_Name']?>">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12 " for="father">Father Name  <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <input type="text" id="father" name="father" required="required" class="form-control col-md-7 col-xs-12 " placeholder="Father's Name" value="<?php echo $getEdit[1]['Father_Name']?>">
                 
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12 " for="guardian_name">Guardian Name   </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <input type="text" id="guardian_name" name="guardian_name" required="required" class="form-control col-md-7 col-xs-12 " placeholder="Guardian Name" value="<?php echo $getEdit[1]['Guardian_Name']?>">
                 
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12 " for="gender">Gender  <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                <select id="gender" name="gender" required="required" class="form-control col-md-7 col-xs-12">
                	<option>Select Gender</option>
                    <option value="M" <?php if($getEdit[1]['Gender']=='M'){ echo "Selected";} ?> >Male</option>
                    <option value="F" <?php if($getEdit[1]['Gender']=='F'){ echo "Selected";} ?> >Female</option>
                    <option value="O" <?php if($getEdit[1]['Gender']=='O'){ echo "Selected";} ?> >Other</option>
                </select>
                 
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12 " for="school">School </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <input type="text" id="school" name="school"  class="form-control col-md-7 col-xs-12" placeholder="School/Collage Name" value="<?php echo $getEdit[1]['Collage']?>">
                 
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qualification">Qualification  </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <input type="text" id="qualification" name="qualification" class="form-control col-md-7 col-xs-12 " placeholder="Ex. MSc" value="<?php echo $getEdit[1]['Qualification']?>"  />
                </div>
              </div>
              
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <textarea id="address" name="address" class="form-control col-md-7 col-xs-12 " placeholder="Write Here Address.." cols="10" rows="5"><?php echo $getEdit[1]['Address']?></textarea>
                </div>
              </div>
              
              
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone  </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <input type="text" id="telephone" name="telephone" class="form-control col-md-7 col-xs-12 " placeholder="Ex. 4454545,56566" value="<?php echo $getEdit[1]['Other_Contact']?>"/>
                </div>
              </div>
              
              <!--<div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="joindate">Join Date  </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <input type="text" id="joindate" name="joindate" class="form-control col-md-7 col-xs-12 datepicker " placeholder="21-05-2016" value="<?php echo $getEdit[1]['Join_Date']?>" />
                </div>
              </div>-->
              
          </div>
          </div>
          
           <div class="clearfix"></div>
          </div>
           <div class="clearfix"></div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-5"> 
              <!-- <button type="submit" class="btn btn-primary">Cancel</button>-->
              <button id="update" name="update" type="button" class="btn btn-success">Update</button>
            </div>
            <div id="loading" class="col-md-6 col-md-offset-5" style="display:none;" align="center">
            <img src="<?php echo PATH_IMAGE?>/loader.gif" style="width:30px" />
            </div>
          </div>
        </form>
      </div>
      <div id="dialog_success" title="Success Message" style="display:none; text-align:left;">
        <p>Your date is successfully update</p>
      </div>
       <div id="dialog_error" title="Error Message" style="display:none; text-align:left;">
        <p>Your date is not submited</p>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
