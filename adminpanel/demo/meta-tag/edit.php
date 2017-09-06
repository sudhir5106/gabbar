<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();


//Get Here Category List
$getList=$db->ExecuteQuery("SELECT * FROM meta_detail WHERE Meta_Id='".$_REQUEST['id']."'");

?>
<script type="text/javascript" src="metatag.js"></script>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Meta Tag</h3>
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
                  <label class="control-label col-md-3" for="page_url">Page Url  <span class="required">*</span> </label>
                  <div class="col-md-9">
                    <input type="text" id="page_url" class="form-control" name="page_url" placeholder="http://shrishtiarchitecure.com/project.php" value="<?php echo $getList[1]['Page_Url']?>"/>
                  </div>
                </div>
                
                <div class="item form-group">
                  <label class="control-label col-md-3" for="page_title">Title  <span class="required">*</span> </label>
                  <div class="col-md-9">
                    <input type="text" id="page_title" class="form-control" name="page_title" placeholder="Page Title" value="<?php echo $getList[1]['Page_Title']?>"/>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3" for="page_heading">Heading <span class="required">*</span> </label>
                  <div class="col-md-9">
                    <input type="text" id="page_heading" name="page_heading" required="required" class="form-control " placeholder="Page Heading" value="<?php echo $getList[1]['Page_Heading']?>" />
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 " for="meta_keyword"> Keyword <span class="required">*</span> </label>
                  <div class="col-md-9">
                    <textarea id="meta_keyword" name="meta_keyword" required="required" class="form-control" placeholder="Write Here Meta Keyword..." rows="5"><?php echo $getList[1]['Meta_Key']?></textarea>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3" for="meta_desc">Description <span class="required"></span> </label>
                  <div class="col-md-9">
                    <textarea id="meta_desc" name="meta_desc"  class="form-control col-md-7 col-xs-12 " placeholder="Write Here Meta Description... "  rows="10"><?php echo $getList[1]['Meta_Description']?></textarea>
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
                  <label class="control-label col-md-3" for="h_page_title">शीर्षक </label>
                  <div class="col-md-9">
                    <input type="text" id="h_page_title" class="form-control" name="h_page_title" placeholder="Page Title" value="<?php echo $getList[1]['HPage_Title']?>"/>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3" for="h_page_heading">हैडिंग  </label>
                  <div class="col-md-9">
                    <input type="text" id="h_page_heading" name="h_page_heading"  class="form-control " placeholder="Page Heading" value="<?php echo $getList[1]['HPage_Heading']?>">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 " for="h_meta_keyword"> संकेत शब्द </label>
                  <div class="col-md-9">
                    <textarea id="h_meta_keyword" name="h_meta_keyword"  class="form-control" placeholder="Write Here Meta Keyword..." rows="5"><?php echo $getList[1]['HMeta_Key']?></textarea>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3" for="meta_desc">विवरण  </label>
                  <div class="col-md-9">
                    <textarea id="h_meta_desc" name="h_meta_desc"  class="form-control col-md-7 col-xs-12 " placeholder="Write Here Meta Description... "  rows="10"><?php echo $getList[1]['HMeta_Description']?></textarea>
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
          	<p>Successfully Update </p>
    	</div> <div id="dialog2" title="Message" style="display:none; text-align:left;">
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
