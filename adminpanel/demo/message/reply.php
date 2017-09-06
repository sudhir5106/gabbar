<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();
//GEt Here SEnder Email Id
$send=$db->ExecuteQuery("SELECT * FROM contact_request WHERE Id='".$_REQUEST['id']."'");

//Read Data Update
$arrField=array('Read_Status');
$arrValue=array(1);
$update=$db->updateValue('contact_request',$arrField,$arrValue,' Id='.$_REQUEST['id']);

?>
<script type="text/javascript" src="message.js"></script>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Message</h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Send Reply </h2>
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
            <div class="col-sm-12">
            <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="from_email">From<span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="from_email" name="from_email" required="required" class="form-control col-md-7 col-xs-12 " placeholder="Your Email Id">
                  </div>
                </div>                 
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="to_email">To<span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="to_email" name="to_email" required="required" class="form-control col-md-7 col-xs-12 " placeholder="Demo@gmail.com" value="<?php echo $send[1]['Email']?>">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject">Subject<span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="subject" name="subject" required="required" class="form-control col-md-7 col-xs-12 " placeholder="Subject">
                  </div>
                </div>
                <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="review">Review <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="message" name="message" required="required" class="form-control col-md-7 col-xs-12 "  rows="5" cols="10" placeholder="Write Here Something..."></textarea>
                <span id="errmsg"></span>
              </div>
              </div>
              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject">File Upload</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="file" name="file"  class="form-control col-md-7 col-xs-12 " />
                  </div>
                </div>
            </div>
              
              <!---Close Here English --> 
            </div>
            <div class="clearfix"></div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3"> 
                <!-- <button type="submit" class="btn btn-primary">Cancel</button>-->
                <button id="submit" type="button" class="btn btn-success">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <div id="dialog1" title="Message" style="display:none; text-align:left;">
          <p>Successfully Sent Mail </p>
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
