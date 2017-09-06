<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

//Get Here Langauge List
//$getLang=$db->ExecuteQuery("SELECT * FROM langauge");

//Get Here Category List
$getCategory=$db->ExecuteQuery("SELECT H_Title,Awards_Id AS Id, CASE WHEN Date=0 THEN '----' ELSE DATE_FORMAT(Date,'%d/%m/%Y') END  PDate, CASE WHEN Status=1 THEN 'Active' ELSE 'Not Active' END Status,CASE WHEN Status=0 THEN 'Show' ELSE 'Hide' END PStatus, Title,Image_Path  FROM awards WHERE Awards_Id='".$_REQUEST['id']."'");

?>
<script type="text/javascript" src="awards.js"></script>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Awards</h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Edit Form </h2>
          <ul class="nav navbar-right panel_toolbox">
             <li><button class="btn btn-round btn-success" onclick="window.history.back();">Back</button>
                          </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form class="form-horizontal form-label-left" action="" method="post" id="categoryform">
          	<input type="hidden" id="id" value="<?php echo $_REQUEST['id']?>">
            <div class="col-sm-12"> 
              <!---Write here English Content Here-->
              <div class="col-sm-6">
                <div class="item form-group">
                  <center>
                    <strong >English Section</strong>
                  </center>
                </div>
                
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="title" name="title" required="required" class="form-control col-md-7 col-xs-12 " placeholder="Title" value="<?php echo $getCategory[1]['Title']?>">
                  </div>
                </div>
                
                <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imageupload">Image Upload <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="imageupload2" name="imageupload2" class="form-control col-md-7 col-xs-12 " accept="image/jpg,image/png,image/jpeg,image/gif" /></br>
                <img src="<?php echo PATH_UPLOAD_IMAGE."/awards/thumb/".$getCategory[1]['Image_Path']?>" style="width:80px;height:80px;">
             	 <input type="hidden" id="imageupload" name="imageupload" value="<?php echo $getCategory[1]['Image_Path']; ?>" />
                <span id="errmsg"></span>
              </div>
            </div>
              </div>
              <!---Close Here English --> 
              <!---Write here Hindi Content Here-->
              <div class="col-sm-6">
                <div class="item form-group">
                  <center>
                    <strong >Hindi Section</strong>
                  </center>
                </div>
              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="htitle">Title <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="htitle" name="htitle"  class="form-control col-md-7 col-xs-12 " placeholder="शीर्षक" value="<?php echo $getCategory[1]['H_Title']?>">
                  </div>
                </div>
                
              </div>
            </div>
            <div class="clearfix"></div>
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
          	<p>Successfully Update Awards</p>
    	</div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
