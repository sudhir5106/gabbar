<?php 
include('../../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');
?>
<script type="text/javascript" src="imageuplaod.js"></script>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Slider Image Uplaod </h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Add New </h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <button class="btn btn-round btn-success" onclick="location.href='list.php';">Back</button>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form class="form-horizontal form-label-left" action="" method="post" id="categoryform">
            <input type="hidden" id="id" value="">
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="title" class="form-control col-md-7 col-xs-12" name="title" placeholder="title name" />
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imageupload">Image Upload <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="imageupload" name="imageupload" required="required" class="form-control col-md-7 col-xs-12 " accept="image/jpg,image/png,image/jpeg,image/gif" />
                <span id="errmsg"></span> </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Position <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="position" name="position" required="required" class="form-control col-md-7 col-xs-12 number" placeholder="1">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Description </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="desc" name="desc"  class="form-control col-md-7 col-xs-12 "  rows="5" placeholder="Write Here Something..."></textarea>
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3"> 
                <!-- <button type="submit" class="btn btn-primary">Cancel</button>-->
                <button id="submit" type="button" class="btn btn-success">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <div id="loding" style="display:none; text-align:left;"><img src="<?php echo PATH_IMAGE;?>/loading.gif" /> Please Wait...</div>
      </div>
      <!-- GEt HEre All The Image -->
      <div id="imageShow"> </div>
      <div id="dialog1" title="Message" style="display:none; text-align:left;">
        <p>Data Successfully Submitted</p>
      </div>
      <div id="dialog2" title="Message" style="display:none; text-align:left;">
        <p>Something is Wrong </p>
      </div>
    </div>
  </div>
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
