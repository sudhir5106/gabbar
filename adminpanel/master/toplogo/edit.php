<?php 
include('../../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');


//List Of Top Logo Cord
$getValue=$db->ExecuteQuery("SELECT *, CASE WHEN (Website_Name='' || Website_Name IS NULL) THEN '----' ELSE Website_Name END Website_Name  FROM toplogo WHERE Toplogo_Id='".$_REQUEST['id']."'")


?>
<script type="text/javascript" src="toplogo.js"></script>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Edit Top Logo </h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Form </h2><ul class="nav navbar-right panel_toolbox">
            <li>
              <button class="btn btn-round btn-success" onclick="location.href='index.php';">Back</button>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <form class="form-horizontal form-label-left" action="" method="post" id="categoryform">
          <input type="hidden" id="id" value="<?php echo $_REQUEST['id']?>">
          <div class="col-sm-12">
            <div class="item form-group">
             
               <label class="control-label col-sm-2 " for="website_name">Website Name  </label>
              <div class="col-sm-3 ">
                <input type="text" id="website_name" class="form-control col-md-7 col-xs-12" name="website_name" placeholder="mywebportal.com" value="<?php echo $getValue[1]['Website_Name'];?>" >
              </div>
             </div> 
              <div class="item form-group">
             
               <label class="control-label col-sm-2 " for="Top Logo_cost">Logo </label>
              <div class="col-sm-3 ">
                <input type="file" id="logo" class="form-control col-md-7 col-xs-12" name="logo" >
                <span id="errmsg"></span>
                <input type="hidden" id="oldimage" value="<?php echo $getValue[1]['Logo_Image']?>">
                <?php if($getValue[1]['Logo_Image']!=''){ ?>
                <img src="<?php echo PATH_UPLOAD_IMAGE.'/logo/thumb/'.$getValue[1]['Logo_Image']?>" style="width:120px; margin-top:5px" />
                <?php } ?>
              </div>
             </div>
              <div class="item form-group col-sm-6">
              <center> <button id="update" type="button" class="btn btn-success">Update</button></center>
           </div>
          </div>
          <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
          <div class="ln_solid"></div>
        </form>
      </div>
     <div id="dialog1" title="Message" style="display:none; text-align:left;">
        <p>Data Successfully Updated</p>
      </div>
      <div id="dialog2" title="Message" style="display:none; text-align:left;">
        <p>Something is Wrong </p>
      </div>
    </div>
    <!--List OF View-->
    
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
