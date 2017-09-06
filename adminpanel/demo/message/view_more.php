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
<script type="text/javascript" src="testimonial.js"></script>

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
          <h2>View Details</h2>
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
            <div class="col-sm-12"> 
             <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sender Name <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                   <strong><?php echo $send[1]['Name']?></strong>
                  </div>
                </div>
                
                <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="review">Phone <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <strong><?php echo $send[1]['Phone']?></strong>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="review">Email <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <strong><?php echo $send[1]['Email']?></strong>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="review">Message <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <strong><?php echo $send[1]['Message']?></strong>
              </div>
            </div>
            <?php if($send[1]['File']!=''){ ?>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="review">Click Here <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <strong><a href="<?php echo PATH_UPLOAD_IMAGE.'/files_upload/'.$val['File']?>">Open Document</a></strong>
              </div>
            </div>
            <?php } ?>
            </div>
            
          </form>
        </div>
        <div id="dialog1" title="Message" style="display:none; text-align:left;">
          <p>Successfully Added Testimonials</p>
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
