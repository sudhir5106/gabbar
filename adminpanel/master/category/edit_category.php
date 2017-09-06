  <?php 
  include('../../../config.php');
  require_once(PATH_LIBRARIES.'/classes/DBConn.php');
  $db = new DBConn();
  require_once(PATH_ADMIN_INCLUDE.'/header.php');

  //GEt Here Menu List
  $getCategory=$db->ExecuteQuery("SELECT Category_Id, Category_Name FROM categories WHERE Category_Id =".$_GET['id']);

  ?>
  <script type="text/javascript" src="category.js"></script>

  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Edit Category</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div style="margin-top:30px;"></div>
          <div class="x_content">
          <form class="form-horizontal form-label-left" action="" method="post" id="editcategoryform">
            <input type="hidden" id="catId" value="<?php echo $getCategory[1]['Category_Id']; ?>">
            <div class="col-sm-12">

              <div class="col-sm-8">
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catName">Category Name <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="catName" name="catName" class="form-control col-md-7 col-xs-12 " placeholder="Ex: Cake, Bookey etc... " value="<?php echo $getCategory[1]['Category_Name']; ?>">
                  </div>
                </div>
              </div>

             <div class="clearfix"></div>
            </div>
             <div class="clearfix"></div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-8 col-md-offset-2"> 
                <button id="update" type="button" class="btn btn-success">Update</button>
              </div>
            </div>
          </form>
        </div>
        <div id="dialog" title="Message" style="display:none; text-align:left;">
          <p>Successfully Updated Category Name</p>
        </div>
      </div>
    </div>

  </div>
  </div>
  <?php 
  require_once(PATH_ADMIN_INCLUDE.'/footer.php');

  ?>
