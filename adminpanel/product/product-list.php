<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');


//GEt Here category
$getcategories=$db->ExecuteQuery("SELECT Category_Id, Category_Name FROM categories");

//Get Here Manufactures
//$res2=$db->ExecuteQuery("Select Manufacturer_Id,Manufacturer_Name from manufacturer_master where Manufacturer_Status=0");


?>
<script type="text/javascript"  src="product.js" ></script>

<script type="text/javascript">

	$( document ).ready(function() {
	  var x;
			$.ajax({
			   type: "GET",
			   url: "filter_report.php",
			   async: false,
			   beforeSend: function(){
				   $('#loading').show();
				   },
			   success: function(data){ //alert(data);
				   x=data;
				   $('#add').html(data);
			   }
			   });
	});
	
</script>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Product List </h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>View List </h2>
        <ul class="nav navbar-right panel_toolbox">
         <li><button class="btn btn-round btn-success" onclick="location.href='index.php';">Add New</button></li>
         <li><button class="btn btn-round btn-danger" id="delete">Delete</button></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_title">
      	<form class="form-horizontal form-label-left" action="" method="post" id="categoryform">
       <div class="col-md-12 col-sm-12">
        <div class="item form-group">
        
              
              <div class="col-md-3 col-sm-3 ">
        		<select class="form-control col-md-7 col-xs-12" id="categoryId" name="categoryId" >
                    <option value="">Select Category</option>
                    
					<?php foreach($getcategories as $getcategoriesVal){ ?>
                    <option value="<?php echo $getcategoriesVal['Category_Id']?>"><?php echo  $getcategoriesVal['Category_Name']?></option>
                    <?php } ?>
                    
                </select>
              </div>
              
              <div class="col-md-1 col-sm-3 ">
                <input type="button" id="search" class="btn btn-primary" name="search" value="Search" />
              </div>
              
            </div>
            </div>
        </form>
      </div>
      <div class="x_content" id="add">
        
        <!-- Get ?here Al The List data-->
      </div>
      <div id="deletemsg" title="Message" style="display:none; text-align:left;">
          <p>You can not delete this Product , <br/>
            becouse this data is used in other place also</p>
        </div>
    </div>
  </div>
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
