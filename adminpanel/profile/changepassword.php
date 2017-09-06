<?php include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');
error_reporting(0);

$res=$db->ExecuteQuery("Select Country_Id,Country_Name from country_master where Country_Status=0");
	
?>
<script type="text/javascript" src="profile.js"></script>

<div class="content-wrapper">
  <section class="content-header">
    <h1> Change Password</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo PATH_MEMBER;?>/index.php"><i class="fa fa-user"></i> My Account</a></li>
      <li class="active">Change Password</li>
    </ol>
  </section>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- ****************page data put here************** -->
        <div class="col-md-6 col-sm-offset-2">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">EDIT PASSWORD</h3>
              </p>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="" method="post" name="chnagepassword" id="chnagepassword">
              <!-- /.box-body -->
              <div class="box-body">
                <div class="form-group">
                  <label><span>*</span> Old Password</label>
                  <input type="password" id="oldpassword" name="oldpassword" class="Required form-control" />
                </div>
                <div class="form-group">
                  <label><span>*</span> New Password</label>
                  <input type="password" id="newpassword" name="newpassword" class="Required form-control" />
                </div>
                <div class="form-group">
                  <label><span>*</span> Retype Password</label>
                  <input type="password" id="retypepassword" name="retypepassword" class="Required form-control" />
                </div>
              </div>
              <div class="box-footer">
                <input type="button" class="btn btn-primary" border="0" id="changeSubmit" value="submit"/>
              </div>
            </form>
          </div>
          <!-- /.box -->
		  
        <div id="dialog_success" title="Message" style="display:none; text-align:left;">
          <p>Password updated successfully</p>
        </div>
        <div id="dialog_error" title="Error" style="display:none; text-align:left;">
        </div>
        </div>
      </div>
      <!-- middle_container ends here -->
    </div>
  </div>
</div>
<?php include(MEMBER_PATH_INCLUDE.'/footer.php')?>
