<?php 
include('../../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');


//Get Here Category List

$getCategory=$db->ExecuteQuery("SELECT Menu_Id, Menu_Name,File_Name,  Position,Defualt_Menu FROM menu WHERE Menu_Id='".$_REQUEST['id']."'");

?>
<script type="text/javascript" src="category.js"></script>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3> Menu </h3>
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
            <div class="col-sm-8 col-sm-offset-2">
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Menu Name <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="HOME" required type="text" value="<?php echo $getCategory[1]['Menu_Name']?>">
                </div>
              </div>  <div class="item form-group" style="display:none">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file_name">File Name<span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="file_name" class="form-control col-md-7 col-xs-12" name="file_name" placeholder="index.php" required  value="<?php echo $getCategory[1]['File_Name']?>" <?php if($getCategory[1]['Defualt_Menu']==1){ echo "disabled";}?>  />
                  </div>
                </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Position <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="position" name="position" required="required" class="form-control col-md-7 col-xs-12 number"  value="<?php echo $getCategory[1]['Position']?>">
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-8 col-md-offset-5"> 
                <!-- <button type="submit" class="btn btn-primary">Cancel</button>-->
                <button id="update" type="button" class="btn btn-success">Update</button>
              </div>
            </div>
          </form>
            </div>
         <div id="dialog" title="Message" style="display:none; text-align:left;">
          	<p>Successfully Update Menu</p>
    	</div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
