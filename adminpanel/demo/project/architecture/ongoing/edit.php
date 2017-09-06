<?php 
include('../../../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

//Get Here Langauge List
$getLang=$db->ExecuteQuery("SELECT * FROM langauge");

//Get Here Category List
$getCategory=$db->ExecuteQuery("SELECT Project_Id,Project_Title, Project_Image, Project_Desc,Project_HTitle, Project_HDesc  FROM ongoing_projects WHERE Project_Id='".$_REQUEST['id']."'");
?>
<script type="text/javascript" src="projects.js"></script>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h4 style="background-color:#9F9; width:170px;padding:5px;"><a href="../upcoming/list.php">Upcoming Projects </a></h4>
      
    </div>
     <div class="title_right">
      <h3>Accomplished Projects</h3> 
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
              <button class="btn btn-round btn-success" onclick="window.history.back();">Back</button>
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
                  <input type="text" id="title" class="form-control col-md-7 col-xs-12" name="title" placeholder="Ex. Hospital" required value="<?php echo $getCategory[1]['Project_Title']?>" />
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imageupload">Image Upload <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="imageupload2" name="imageupload2"  class="form-control col-md-7 col-xs-12 " accept="image/jpg,image/png,image/jpeg,image/gif" />
                   (Note: Image size must be greater than from 400 X 224 )
                   <br/>
                  <input type="hidden" id="imageupload" name="imageupload"  class="form-control col-md-7 col-xs-12 " accept="image/jpg,image/png,image/jpeg,image/gif" value="<?php echo $getCategory[1]['Project_Image'];?>"/>
                  <?php if(count($getCategory[1]['Project_Image'])>0){ echo '<img src="'.LINK_ROOT.'/image_upload/projects/thumb/'.$getCategory[1]['Project_Image'].'" style="width:50px">'; }else{ echo '<img src="'.LINK_ROOT.'/image_upload/thumb/defult.jpg"  style="width:50px">'; }?>
                  <span id="errmsg"></span> </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="description" class="form-control col-md-7 col-xs-12" name="description" placeholder="write here somthing...."  rows="5"><?php echo $getCategory[1]['Project_Desc']?></textarea>
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
                  <input type="text" id="htitle" class="form-control col-md-7 col-xs-12" name="htitle" placeholder=" हॉप्टिाल " value="<?php echo $getCategory[1]['Project_HTitle']?>"/>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hdescription">Description </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="hdescription" class="form-control col-md-7 col-xs-12" name="hdescription" placeholder="इस के बारे में कुछ लिखिए ...."  rows="5"><?php echo $getCategory[1]['Project_HDesc']?></textarea>
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
          <p>Successfully Updated</p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
