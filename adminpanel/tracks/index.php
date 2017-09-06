<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');

?>
<script src="tracks.js"></script>
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
      <h3>Tracks Visitor</h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>View List </h2>
        <!--<ul class="nav navbar-right panel_toolbox">
          <li>
            <button class="btn btn-round btn-success" onclick="location.href='index.php';">Add New</button>
          </li>
        </ul>-->
        <div class="clearfix"></div>
      </div>
      <div class="x_content" >
      <form action="" method="post"  name="myform" class="form-inline" id="myform">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
            <label>Ip Address</label>
            <br />
            <input type="text" name="ip" id="ip" class="Required from-control input-sm " placeholder="Id Address" />
          </div>
          <div class="form-group">
            <label>From Date</label>
            <br />
            <input type="text" name="fromdate" id="fromdate" class="Required from-control input-sm datepicker" placeholder="From Date" />
          </div>
          <div class="form-group">
            <label>To Date</label>
            <br />
            <input type="text" name="todate" id="todate" class="Required from-control input-sm datepicker" placeholder="To Date" />
            <input type="button" id="search" name="search" class="btn btn-success btn-sm" value="Search" >
          </div>
        </div>
        <hr />
        <a href="#" id="delete" name="delete" class="btn btn-danger btn-sm"  > <i class="fa fa-trash" aria-hidden="true"></i> delete</a>
        <div class="box-body">
          <div  id="add"> </div>
        </div>
        </div>
      </form>
      <!-- Get ?here Al The List data--> 
    </div>
    <div id="deletemsg" title="Message" style="display:none; text-align:left;">
      <p>You can not delete </p>
    </div>
  </div>
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
