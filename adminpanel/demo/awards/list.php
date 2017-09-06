<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();


/*//Get Here Category List
$getCategory=$db->ExecuteQuery("SELECT SC.Sub_Id, CG.Category_Name , SC.Position, Lang_Name, SC.Sub_Name FROM sub_category SC INNER JOIN category CG ON CG.Category_Id=SC.Category_Id INNER JOIN langauge LG ON LG.Id=CG.Langauge ORDER BY Sub_Id DESC");
*/
////Get Here Langauge List
$getLang=$db->ExecuteQuery("SELECT * FROM langauge");
?>
<script type="text/javascript" src="awards.js"></script>

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
      <h3>Awards </h3>
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
                <input type="text" id="title" class="form-control col-md-7 col-xs-12" name="title" placeholder="Title"/>
                </div>
              <div class="col-md-3 col-sm-3 ">
                <input type="text" id="date" class="form-control col-md-7 col-xs-12 datetimepicker" name="date" placeholder="DD/MM/YYYY"/>
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
          <p>Something is wrong</p>
        </div>
    </div>
  </div>
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
