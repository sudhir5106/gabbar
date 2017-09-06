  <?php 
  include('../../config.php');
  require_once(PATH_LIBRARIES.'/classes/DBConn.php');
  $db = new DBConn();
  require_once(PATH_ADMIN_INCLUDE.'/header.php');

  //Get package List
  $getPackage=$db->ExecuteQuery("SELECT Package_Id, Package_Name, Old_Price, New_Price, SKU, Image FROM packages ORDER BY Package_Id DESC");
  
  //GEt Here Menu List
  $getCategory=$db->ExecuteQuery("SELECT Category_Id, Category_Name FROM categories Order BY Category_Name ASC");
  
  ?>
  <script type="text/javascript" src="package.js"></script>

  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Package</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Add New</h2>
           
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          <form class="form-horizontal form-label-left" action="" method="post" id="packageform">
            <input type="hidden" id="id" value="">
            <div class="col-sm-12">
             <!---Write here English Content Here-->
              <div class="col-sm-8">
              
              	<div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="packageName">Package Name <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="packageName" name="packageName" class="form-control col-md-7 col-xs-12 " placeholder="Enter Package Name">
                  </div>
                </div>
              
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categoryId">Product Categories <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php foreach($getCategory as $val){?>
                    <input type="checkbox" name="catId[]" class="categoryId" id="<?php echo $val['Category_Id'];?>" /> <?php echo $val['Category_Name'];?><br>
                    <?php } ?>
                    
                  </div>
                </div>                
                
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="oldprice">Old Price <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="oldprice" name="oldprice" class="form-control col-md-7 col-xs-12 " placeholder="Enter package old price">
                  </div>
                </div>
                
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="newprice">New Price <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="newprice" name="newprice" class="form-control col-md-7 col-xs-12 " placeholder="Enter package New price">
                  </div>
                </div>
                
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sku">SKU Code <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="sku" name="sku" class="form-control col-md-7 col-xs-12 " placeholder="Ex: SKU001">
                  </div>
                </div>                
                
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pimage">Upload Image <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="pimage" name="pimage" class="form-control col-md-7 col-xs-12" >
                   	<br/>
                 	<strong>Note</strong> : Image size must be less than 300kb
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
                <button id="submit" type="button" class="btn btn-lg btn-success">Add</button>
              </div>
            </div>
          </form>
        </div>
        <div id="dialog" title="Message" style="display:none; text-align:left;">
          <p>Package Added Successfully!</p>
        </div>
      </div>
    </div>
    <!-- Menu List Sho HEre -->

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><a name="packageList"></a>View Package List </h2>
           
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          <form class="form-horizontal form-label-left" action="" method="post" id="categoryform">
            <input type="hidden" id="id" value="">
            <div class="col-sm-12">
             <!---Write here English Content Here-->
              <div class="col-sm-12">
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th>No.</th>
                                <th>Image</th>
                                <th>Package Name</th>
                                <th>SKU</th>
                                <th>Old Price</th>
                                <th>New Price</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach( $getPackage as $val){ ?>
                              <tr>
                                <td><?php echo $i;?></td>
                                <td><img src="../../image_upload/package/thumb/<?php echo $val['Image'];?>" width="50" alt="" /></td>
                                <td><?php echo $val['Package_Name'];?></td>
                                <td><?php echo $val['SKU'];?></td>
                                <td><?php echo $val['Old_Price'];?></td>
                                <td><?php echo $val['New_Price'];?></td>
                                
                                <td>
                                	<a href="edit.php?id=<?php echo $val['Package_Id'];?>" class="btn btn-warning btn-sm">Edit</a> 
                                	<button id="<?php echo $val['Package_Id'];?>" type="button" class="btn btn-sm btn-danger delete">Delete</button>
                                </td>
                              </tr>
                              <?php $i++;} ?>
                              
                            </tbody>
                          </table>
        
              </div>
              <!---Close Here English -->
             <div class="clearfix"></div>
            </div>
             <div class="clearfix"></div>
            <div class="ln_solid"></div>
            
          </form>
        </div>
        <div id="deletemsg" title="Message" style="display:none; text-align:left;">
          <p>Package Deleted Successfully!</p>
        </div>
      </div>
    </div>

  </div>
  </div>
  <?php 
  require_once(PATH_ADMIN_INCLUDE.'/footer.php');

  ?>
