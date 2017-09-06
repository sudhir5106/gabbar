  <?php 
  include('../../config.php');
  require_once(PATH_LIBRARIES.'/classes/DBConn.php');
  $db = new DBConn();
  require_once(PATH_ADMIN_INCLUDE.'/header.php');
  
  $packageId = $_GET['id'];

  //Get package List
  /*$getPackage=$db->ExecuteQuery(
  
  	"SELECT P.Package_Id, Package_Name, Old_Price, New_Price, SKU, Image, Category_Id 
	FROM packages P 
	INNER JOIN package_relation_category PRC ON P.Package_Id = PRC.Package_Id 
	WHERE P.Package_Id IN (SELECT Package_Id FROM package_relation_category WHERE Package_Id=".$packageId.")"  
  );*/
  
  $getPackage=$db->ExecuteQuery(  
  	"SELECT Package_Id, Package_Name, Old_Price, New_Price, SKU, Image FROM packages WHERE Package_Id=".$packageId  
  );
  
  //Get Category List
  $getCategory=$db->ExecuteQuery("SELECT Category_Id, Category_Name 
  FROM categories Order BY Category_Name ASC");
    
  $getSelectedCat=$db->ExecuteQuery("SELECT PRC.Category_Id, Category_Name 
  FROM package_relation_category PRC
  LEFT JOIN categories C ON C.Category_Id = PRC.Category_Id
  WHERE Package_Id=".$packageId);
  
  
  ?>
  <script type="text/javascript" src="package.js"></script>

  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Update Package</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Update</h2>
            <ul class="nav navbar-right panel_toolbox">
             <li><button class="btn btn-round btn-success" onclick="location.href='index.php';">Add New</button></li>
             <li><button class="btn btn-round btn-info" onclick="location.href='index.php#packageList';">Package List</button></li>
            </ul>           
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          <form class="form-horizontal form-label-left" action="" method="post" id="editpackageform">
          	
            <input type="hidden" id="packageId" value="<?php echo $getPackage[1]['Package_Id'];?>">
            <div class="col-sm-12">
             <!---Write here English Content Here-->
              <div class="col-sm-8">
              	
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="packageName">Package Name <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="packageName" name="packageName" class="form-control col-md-7 col-xs-12 " placeholder="Enter Package Name" value="<?php echo $getPackage[1]['Package_Name'];?>">
                  </div>
                </div>
              
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categoryId">Product Categories <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php 
					
					foreach($getCategory as $val){?>
                    <input type="checkbox" name="catId[]" class="categoryId" id="<?php echo $val['Category_Id'];?>" <?php if(count($getSelectedCat)>0){ foreach($getSelectedCat as $vall){if($vall['Category_Id']==$val['Category_Id']){ echo 'checked';}} }?> /> <?php echo $val['Category_Name'];?><br>
                    <?php } ?>
                    
                  </div>
                </div>                
                
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="oldprice">Old Price <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="oldprice" name="oldprice" class="form-control col-md-7 col-xs-12 " placeholder="Enter package old price" value="<?php echo $getPackage[1]['Old_Price'];?>">
                  </div>
                </div>
                
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="newprice">New Price <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="newprice" name="newprice" class="form-control col-md-7 col-xs-12 " placeholder="Enter package New price" value="<?php echo $getPackage[1]['New_Price'];?>">
                  </div>
                </div>
                
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sku">SKU Code <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="sku" name="sku" class="form-control col-md-7 col-xs-12 " placeholder="Ex: SKU001" value="<?php echo $getPackage[1]['SKU'];?>">
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
                 
                <div class="item form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-sm-offset-3">
                    <img src="<?php echo PATH_UPLOAD_IMAGE.'/package/thumb/'.$getPackage[1]['Image'];?>" alt="" />
                    <input type="hidden" id="pic" value="<?php echo $getPackage[1]['Image']; ?>" />
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
                <button id="update" type="button" class="btn btn-lg btn-success">Update</button>
              </div>
            </div>
          </form>
        </div>
        <div id="dialog" title="Message" style="display:none; text-align:left;">
          <p>Package Updated Successfully!</p>
        </div>
      </div>
    </div>
    <!-- Menu List Sho HEre -->

  </div>
  </div>
  <?php 
  require_once(PATH_ADMIN_INCLUDE.'/footer.php');

  ?>
