<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

?>
<script type="text/javascript" src="metatag.js"></script>

<script>
	$( document ).ready(function() {
		
	  var x;
			$.ajax({
			   type: "GET",
			   url: "filter_report.php",
			   async: false,
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
      <h3>Sub - Category </h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>View List </h2>
        <ul class="nav navbar-right panel_toolbox">
         <li><button class="btn btn-round btn-success" onclick="location.href='index.php';">Add New</button></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_title">
      	<form class="form-horizontal form-label-left" action="" method="post" id="categoryform">
        <div class="item form-group">
              
              <div class="col-md-3 col-sm-3 ">
                <input type="text" id="page_title" class="form-control col-md-7 col-xs-12" name="page_title" placeholder="Page Url"/>
              </div>
               <div class="col-md-3 col-sm-3 ">
                <input type="button" id="search" class="btn btn-primary" name="search" value="Search" />
                 	
              </div>
              
            </div>
        </form>
      </div>
      <div class="x_content" id="add">
        
        <!-- Get ?here Al The List data-->
      </div>
      <div id="deletemsg" title="Message" style="display:none; text-align:left;">
          <p>You can not delete this category , <br/>
            becouse this category is used in sub-category</p>
        </div>
    </div>
  </div>
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
