<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');

//########################################### Get Here Personal Details ###############3
 $sql = "SELECT * FROM admin_login  WHERE Login_Id='".$_SESSION['admin']."'";
 $getPer = $db->ExecuteQuery($sql);

?>
<script src="profile.js"></script>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Admin Profile</h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Edit Form </h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
       <div class="col-md-10 col-sm-offset-1">
        <form action="#" method="post" enctype="multipart/form-data" name="regForm" id="regForm" role="form">
           
              <div class="form-group col-sm-12" >
                <label for="" class="mandatory col-sm-3">Login Id</label>
               
			   <div class="col-sm-5">
			    <p><?php echo $getPer[1]['Login_Name']; ?></p>
				</div>
              </div>
			  <div class="item form-group col-sm-12">
                <label for="sponser" class="col-sm-3 control-label">Admin  Name  </label>
                <div class="col-sm-5">
                  <input name="username" type="text" id="username" class="form-control Required" placeholder="Admin Name"   value="<?php echo $getPer[1]['User_Name']?>"  />
                </div>
              </div>
              <div class="item form-group col-sm-12">
                <label for="sponser" class="col-sm-3 control-label">Email Id </label>
                <div class="col-sm-5">
                  <input name="email" type="text" id="email" class="form-control Required" placeholder="example@test.com"   value="<?php echo $getPer[1]['Email']?>"  />
                </div>
              </div>
              
              <div class="form-group col-sm-12">
                <label for="" class="mandatory col-sm-3">Mobile No.</label>
				<div class="col-sm-5">
                <input name="mobile" class="form-control input-sm Required" type="text" id="mobile"  value="<?php echo $getPer[1]['Mobile_No']; ?>" placeholder="9000090000" >
              </div>
			  </div>
              <div class="form-group col-sm-12">
                <label for="" class="mandatory col-sm-3">Position </label>
				<div class="col-sm-5">
                <input type="text" name="job_title" id="job_title" class="form-control input-sm"  value="<?php echo $getPer[1]['Job_Title'];?>" placeholder="Web-Developer"/>
              </div>
			  </div>
              <div class="form-group col-sm-12">
                <label for="" class="mandatory col-sm-3"> Country Name</label>
				<div class="col-sm-5">
                <input type="text" name="country" id="country"   class="Required form-control input-sm" placeholder="India" value="<?php echo $getPer[1]['Country'];?>"/>
				</div>
              </div>
              <div class="form-group col-sm-12">
                <label for="" class="mandatory col-sm-3"> City</label>
             	<div class="col-sm-5">
                    <input name="city" type="text" id="city" value="<?php echo $getPer[1]['City'];?>" class="form-control input-sm" placeholder="Bhilai" />
                </div>
              </div>
              <div class="form-group col-sm-12">
                <label for="" class="mandatory col-sm-3"  >Website</label>
				<div class="col-sm-5">
                <input name="website" type="text" id="website"   class="input-sm form-control"  value="<?php echo $getPer[1]['Website']; ?>" placeholder="test.com" >
              </div>
			  </div>
            </div>
            <!-- /.box-body --> 
          </div>
		 <div class="box-footer"> 
            <span class="loading" style="display:none; text-align: center;"><img src="<?php echo PATH_IMAGE?>/load.gif" /></span>
          <center>
                <input type="button" id="submit" name="submit" value="Update" class="btn btn-primary" /></center>
                
             </div>
          <!-- /.box-footer-->
        </form>
		 
        <div id="dialog_success" title="Message" style="display:none; text-align:left;">
          <p>Profile Successfully Updated</p>
        </div>
        <div id="dialog_error" title="Message" style="display:none; text-align:left;">
          <p>Something is Wrong </p>
        </div>
        <!-- global_container ends here ** footer_container starts here --> 
        <!--************************* page data end here***************** --> 
      </div>
    </div>
  </div>
</div>
<?php include(PATH_ADMIN_INCLUDE.'/footer.php')?>
