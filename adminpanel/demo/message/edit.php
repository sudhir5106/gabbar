<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

//Get Here Langauge List
//$getLang=$db->ExecuteQuery("SELECT * FROM langauge");

//Get Here Category List
$getCategory=$db->ExecuteQuery("SELECT *  FROM testimonials WHERE Test_Id='".$_REQUEST['id']."'");

?>
<script type="text/javascript" src="testimonial.js"></script>
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
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Client's Name <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12 " placeholder="Name" value="<?php echo $getCategory[1]['Client_Name']?>">
                  </div>
                </div>
                
                <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="review">Review <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="review" name="review" required="required" class="form-control col-md-7 col-xs-12 "  rows="5" cols="10" placeholder="Write Here Something..."><?php echo $getCategory[1]['Review']?></textarea>
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
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hname">Client's Name <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="hname" name="hname"  class="form-control col-md-7 col-xs-12 " placeholder="ग्राहक का नाम" value="<?php echo $getCategory[1]['H_Client_Name']?>">
                  </div>
                </div>
                	<div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hreview">Review <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="hreview" name="hreview"  class="form-control col-md-7 col-xs-12 "  rows="5" cols="10" placeholder="यहाँ कुछ लिखिए..."><?php echo $getCategory[1]['H_Review']?></textarea>
                <span id="errmsg"></span>
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
    	</div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
