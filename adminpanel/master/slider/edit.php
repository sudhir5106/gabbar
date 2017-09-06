<?php 
include('../../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');

//Get Here Category List
$getCategory=$db->ExecuteQuery("SELECT * FROM slider  WHERE Id='".$_REQUEST['id']."'");


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
          <h2>Edit Form </h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <button class="btn btn-round btn-success" onclick="location.href='list.php';">Back</button>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form class="form-horizontal form-label-left" action="" method="post" id="categoryform">
            <input type="hidden" id="id" value="<?php echo $_REQUEST['id']?>">
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="title" class="form-control col-md-7 col-xs-12" name="title" placeholder="title name" value="<?php echo $getCategory[1]['Title']?>"/>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imageupload">Image Upload <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="imageupload2" name="imageupload2"  class="form-control col-md-7 col-xs-12 " accept="image/jpg,image/png,image/jpeg,image/gif" />
                <span id="errmsg"></span>
                <input type="hidden" id="oldimage" value="<?php echo $getCategory[1]['Image']?>">
                <?php if($getCategory[1]['Image']!=''){ ?>
                <img src="<?php echo PATH_UPLOAD_IMAGE.'/slider/'.$getCategory[1]['Image']?>" style="width:200px; margin-top:5px" />
                <?php } ?>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Position <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="position" name="position" required="required" class="form-control col-md-7 col-xs-12 number" placeholder="1" value="<?php echo $getCategory[1]['Position']?>">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Description </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="desc" name="desc"  class="form-control col-md-7 col-xs-12 "  rows="5" placeholder="Write Here Something..."><?php echo $getCategory[1]['Description']?></textarea>
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3"> 
                <!-- <button type="submit" class="btn btn-primary">Cancel</button>-->
                <button id="update" type="button" class="btn btn-success">Update</button>
              </div>
            </div>
          </form>
        </div>
        <div id="loding" style="display:none; text-align:left;"><img src="<?php echo PATH_IMAGE;?>/loading.gif" /> Please Wait...</div>
      </div>
      <!-- GEt HEre All The Image -->
      <div id="imageShow"> </div>
      <div id="dialog1" title="Message" style="display:none; text-align:left;">
        <p>Data Successfully Updated</p>
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
