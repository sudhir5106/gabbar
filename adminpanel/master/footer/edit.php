<?php 
include('../../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');


//List Of Top Logo Cord
$getValue=$db->ExecuteQuery("SELECT * FROM footer ")
?>
<script type="text/javascript" src="toplogo.js"></script>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Footer</h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Edit</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <form class="form-horizontal form-label-left" action="" method="post" id="categoryform">
          <input type="hidden" id="id" name="id" value="<?php echo $_REQUEST['id'];?>">
          <div class="col-sm-12">
            <div class="item form-group">
             
               <label class="control-label col-sm-2 " for="email">Footer Details<span class="required">*</span> </label>
              <div class="col-sm-7 ">
                <textarea  id="details" class="form-control col-md-7 col-xs-12 tinymce" name="details" placeholder="" rows="5" cols="10"><?php echo $getValue[1]['Details'];?></textarea>
              </div>
            </div>
            <div class="item col-sm-7">
             <center><button id="submit" type="button" class="btn btn-success" name="submit">Update</button></center>
            </div>
          </div>
          <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
          <div class="ln_solid"></div>
        </form>
      </div>
      <div id="dialog_success" title="Confirmation Message" style="display:none; text-align:left;">
        <p>Successfully Updated</p>
      </div>
      
       <div id="dialog_error" title="Error Message" style="display:none; text-align:left;">
        <p>Something is wrong</p>
      </div>
    </div>
    <!--List OF View-->
    
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
