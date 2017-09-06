  <?php 
  include('../../config.php');
  require_once(PATH_LIBRARIES.'/classes/DBConn.php');
  $db = new DBConn();
  require_once(PATH_ADMIN_INCLUDE.'/header.php');

  //GEt Here Menu List
  $getCategory=$db->ExecuteQuery("SELECT Category_Id, Category_Name FROM categories Order BY Category_Name ASC");

  ?>
  <script type="text/javascript" src="product.js"></script>

<div id="loader">
    <div class="loader-block"><i class="fa-li fa fa-spinner fa-spin spinloader"></i></div>
</div>


  <div>
    <div class="page-title">
      <div class="title_left">
        <h3>Add Products</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Upload Images</h2>
            <ul class="nav navbar-right panel_toolbox">
             <li><button class="btn btn-round btn-success" onclick="location.href='product-list.php';">Product List</button></li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          <form class="form-horizontal form-label-left" action="" method="post" id="addproduct">
          
            <div class="col-sm-12">
             <!---Write here English Content Here-->
              <div class="col-sm-8">              	
              	<div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catName">Category Name <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="categoryId" name="categoryId" class="form-control col-md-7 col-xs-12">
                    	<option value="">--Select Category --</option>
                        <?php 
						 foreach($getCategory as $getCategoryVal)
						 { ?>
                         
                         <option value="<?php echo $getCategoryVal['Category_Id']; ?>"><?php echo $getCategoryVal['Category_Name']; ?></option>
							 
						<?php }
						?>
                    </select>
                  </div>
                </div>
              
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12 mandatory" for="image">Image <span class="required">*</span> :</label>
                  <div class="col-sm-5">
                    <input type="file" id="image" name="image"  class="form-control input-sm col-md-7 col-xs-12"  multiple/>
                    <span id="errmsg"></span>
                    <br />
                    Note: Press CTR and Select click for multiple selection<br />
                    Image Extension JPG,GIF,PNG.<br />
                    Maximum Weight 1 MB.
                  </div>
                </div>
                
                
              </div>
              <!---Close Here English -->
             <div class="clearfix"></div>
            </div>
             <div class="clearfix"></div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-8 col-md-offset-3"> 
                <!-- <button type="submit" class="btn btn-primary">Cancel</button>-->
                <button id="submit" type="button" class="btn btn-success">Upload</button>
              </div>
            </div>
          </form>
        </div>
        <div id="dialog" title="Message" style="display:none; text-align:left;">
          <p>Successfully Added Category Name</p>
        </div>
        <div id="deletemsg" title="Message" style="display:none; text-align:left;">
          <p>Successfully Deleted Category Name</p>
        </div>
      </div>
    </div>
    <!-- Menu List Sho HEre -->

  </div>
  </div>
  <?php 
  require_once(PATH_ADMIN_INCLUDE.'/footer.php');

  ?>
