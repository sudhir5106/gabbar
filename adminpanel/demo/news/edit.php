<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

//Get Here Langauge List
//$getLang=$db->ExecuteQuery("SELECT * FROM langauge");

//Get Here Category List
$getCategory=$db->ExecuteQuery("SELECT H_Description , H_Heading,Id, CASE WHEN Date=0 THEN '----' ELSE DATE_FORMAT(Date,'%d-%m-%Y') END  PDate, CASE WHEN Status=1 THEN 'Active' ELSE 'Not Active' END Status,CASE WHEN Status=0 THEN 'Show' ELSE 'Hide' END PStatus, Description, Heading  FROM news WHERE Id='".$_REQUEST['id']."'");

?>
<script type="text/javascript" src="news.js"></script>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>News & Updates </h3>
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
          <form class="form-horizontal form-label-left" action="" method="post" id="addform">
          	<input type="hidden" id="id" value="<?php echo $_REQUEST['id']?>">
            <div class="col-sm-12"> 
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subcategory">Heading <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="heading" name="heading" required="required" class="form-control col-md-7 col-xs-12 " placeholder="Heading" value="<?php echo $getCategory[1]['Heading']?>"/>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="published_date">Date <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="published_date" name="published_date" required="required" class="form-control col-md-7 col-xs-12 datepicker" placeholder="26-07-2016" value="<?php echo $getCategory[1]['PDate']?>">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="desc" name="desc" required="required" class="form-control col-md-7 col-xs-12 " placeholder="Write Here Something... "  rows="10"><?php echo $getCategory[1]['Description']?></textarea>
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
