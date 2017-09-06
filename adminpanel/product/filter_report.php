<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/classes/ps_pagination.php');
$db = new DBConn();
error_reporting(0);

$con  = mysql_connect(SERVER, DBUSER, DBPASSWORD);
$rows_per_page=ROWS_PER_PAGE;
$totpagelink=PAGELINK_PER_PAGE;
$condition='';

//print_r($_POST);
//Check Here IF Catgory Name is Empty For Filter
/*if($_REQUEST['category']!='')
{
	$condition.=' AND p.Category_Id="'.$_REQUEST['category'].'"';
}	


//Check Here IF Subcategory Name is Empty For Filter
if($_REQUEST['subcategory']!='')
{
	$condition.=' AND p.Subcategory_Id="'.$_REQUEST['subcategory'].'"';
}

//Check Here IF manufacturer Name is Empty For Filter
if($_REQUEST['manufacturer']!='')
{
	$condition.=' AND p.Manufacturer_Id="'.$_REQUEST['manufacturer'].'"';
}
//Check Here IF Product Name is Empty For Filter
if($_REQUEST['product']!='')
{
	$condition.=' AND p.Product_Name="'.$_REQUEST['product'].'"';
}*/


//select query for fetching the products
  $sql="SELECT Product_Id, Product_Image, Category_Name FROM product_master p
  		INNER JOIN categories C ON P.Category_Id = C.Category_Id ORDER BY Product_Id DESC";

	$getSubcategory=$db->ExecuteQuery($sql);

	if(!$getSubcategory)
	{
		echo mysql_error();
	}
	
	
	if(isset($_REQUEST['page']) && $_REQUEST['page']>1)
	{
		$i=($_REQUEST['page']-1)*$rows_per_page+1;
	}
	else
	{
		$i=1;
	}
	$pager = new PS_Pagination($con,$sql,$rows_per_page,$totpagelink);
	$rs=$pager->paginate();
		
?>
<script>
$(document).ready(function() {
$(".pagination a").click( function(event)
	{		
	event.preventDefault();
	var page=$(this).attr('id');
	
		$("#planresult input[id=page]").val(page);
		var str = $("#planresult").serializeArray();
		
			$.ajax({  
				type: "GET",  
				url: "filter_report.php",  
				data: str,  
				async: false,
				success: function(value) {  $("#add").html(value);}
			});//eof ajax
		});
	});
</script>

<form name="planresult" id="planresult">
  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th width="30"><input type="checkbox" id="selecctall" /></th>
        <th width="30">SNo.</th>
        <th width="100">Image</th>
        <th>Product Category</th>
        <!--<th style="padding-left:50px;">Action</th>-->
      </tr>
    </thead>
    <tbody>
      <?php 
		if(empty($rs)==false)
			{
			while($value=mysql_fetch_array($rs))
				{ 
			?>		 
      <tr>
        <td><input class="delete1" type="checkbox" id="<?php echo $value['Product_Id'];?>" /></td>
        <td><?php echo $i;?></td>
        <td><img src="<?php echo PATH_UPLOAD_IMAGE."/product/thumb/".$value['Product_Image'];?>" width="80" /></td>
        <td><?php echo $value['Category_Name'];?></td>
        
        <!--<td><button type="button" id="editbtn" class="btn btn-success btn-xs" onClick="window.location.href='edit.php?id=<?php echo $value['Product_Id'];?>'" ><span class="glyphicon glyphicon-edit"></span> Edit</button>
        </td>-->
      </tr>
      <?php $i++;}}else{ ?>
    	<td colspan="4" align="center">Opps No Data Found</td>
      <?php } ?>
        </tbody>
  </table>
  <div class="text-center"> <?php echo $pager->renderFullNav() ?> </div>
  <input type="hidden" name="page" id="page" value="1"/>
  <input type="hidden" name="category" id="category" value="<?php echo @$_REQUEST['category']; ?>" />
  <input type="hidden" name="subcategory" id="subcategory" value="<?php echo @$_REQUEST['subcategory']; ?>" />
  <input type="hidden" name="manufacturer" id="manufacturer" value="<?php echo @$_REQUEST['manufacturer']; ?>" />
  <input type="hidden" name="product" id="product" value="<?php echo @$_REQUEST['product']; ?>" />
</form>
