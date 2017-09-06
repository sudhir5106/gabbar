<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');
//get here menu list
$getMenu=$db->ExecuteQuery("SELECT * FROM menu  ORDER BY Position ASC");

//Get Here Category List
$getCategory=$db->ExecuteQuery("SELECT * FROM pages WHERE Pages_Id='".$_REQUEST['id']."'");
?>
<script type="text/javascript" src="pages.js"></script>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3> Pages </h3>
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
              <button class="btn btn-round btn-success" onclick="location.href='index.php';">View List</button>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form class="form-horizontal form-label-left" action="" method="post" id="categoryform">
          	<input type="hidden" id="id" value="<?php echo $_REQUEST['id']?>">
              <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Menu Name <span class="required">*</span> </label>
              <div class="col-md-5 col-sm-6 col-xs-12">
                <select id="menu_id" class="form-control col-md-7 col-xs-12" name="menu_id" required>
                <option value="">-- Select Menu Name --</option>
                <?php foreach($getMenu as $val3){ ?>
                <option value="<?php echo $val3['Menu_Id']?>" <?php if($getCategory[1]['Menu_Id']==$val3['Menu_Id']){ echo "selected";}?>><?php echo $val3['Menu_Name'];?></option>
                <?php } ?>
                </select>
              </div>
            </div>
           
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imageupload">Image Upload  </label>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <input type="file" id="imageupload" name="imageupload"  class="form-control col-md-7 col-xs-12 " accept="image/jpg,image/png,image/jpeg,image/gif" />
                <span id="errmsg"></span>
                (Note: Copy image path link and paste in image url )
                <br/>
               <div id="imagepath"></div> 
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <button type="button" id="imagesave" name="imagesave" required="required" class="btn btn-primary"  >Image Save</button>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="details">Content Details <span class="required">*</span> </label>
              <div class="col-md-8 col-sm-6 col-xs-12">
                <textarea  id="details" name="details" required="required" class="form-control col-md-7 col-xs-12 tinymce " cols="10" rows="10" placeholder="Write Here Page Details..."><?php echo $getCategory[1]['Details']?></textarea>
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
         <div id="dialog" title="Message" style="display:none; text-align:left;">
          	<p>Successfully Update Pages</p>
    	</div> 
        <div id="dialog_error" title="Error Message" style="display:none; text-align:left;">
          	<p>Something is wrong , please check the content</p>
    	</div>
         <div id="dialog_image" title="Image Uploaded Path" style="display:none; text-align:left;">
    	</div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
