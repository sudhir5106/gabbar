<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');

?>
<script type="text/javascript" src="blogs.js"></script>
<link href="<?php echo PATH_TINYMCE?>/tinymce.css" />
<link href="<?php echo PATH_TINYMCE?>/codepen.min.css" />
<script src="<?php echo PATH_TINYMCE?>/tinymce.min.js"></script>
<script src="<?php echo PATH_TINYMCE?>/tinymce_text_format.js"></script>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Post</h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>New  Post</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <button class="btn btn-round btn-success" onclick="location.href='list.php';">View List</button>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form class="form-horizontal form-label-left" action="" method="post" id="addform">
            <input type="hidden" id="id" value="">
            <div class="col-sm-12"> 
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Title <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="title" name="title" required="required" class="form-control col-md-7 col-xs-12 " placeholder="Post Title Write Here...">
                  </div>
                </div>
                
                <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imageupload">Image Upload <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="imageupload" name="imageupload" class="form-control col-md-7 col-xs-12 " accept="image/jpg,image/png,image/jpeg,image/gif" multiple/>
                <span id="errmsg"></span>
              </div>
            </div>
            
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Discription <span class="required">*</span> </label>
              <div class="col-md-9 col-sm-6 col-xs-12">
                <textarea id="desc" name="desc" required="required" class="form-control col-md-7 col-xs-12 "  rows="7" cols="10" placeholder="Write Here Something..."></textarea>
             
              </div>
            </div>
              </div>
              
            </div>
            <div class="clearfix"></div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3"> 
                <!-- <button type="submit" class="btn btn-primary">Cancel</button>-->
                <button id="submit" type="button" class="btn btn-success">Submit</button>
                
              </div>
              <div id="loading" class="col-md-6 col-md-offset-5" style="display:none;" align="center">
           	 <img src="<?php echo PATH_IMAGE?>/loader.gif" style="width:30px" />
            </div>
            </div>
          </form>
        </div>
        <div id="dialog1" title="Message" style="display:none; text-align:left;">
          <p>Successfully Added </p>
        </div>
        <div id="dialog2" title="Message" style="display:none; text-align:left;">
          <p>Something is Wrong </p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
