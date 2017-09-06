<?php 
include('../../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/classes/ps_pagination.php');
$db = new DBConn();
error_reporting(0);

$con  = mysql_connect(SERVER, DBUSER, DBPASSWORD);
$rows_per_page=ROWS_PER_PAGE;
$totpagelink=PAGELINK_PER_PAGE;


//Get Here Category List
 $sql="SELECT * FROM gallery_image ORDER BY Id DESC";
$getCategory=$db->ExecuteQuery($sql);

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
              <th>No.</th>
              <th>Title Name</th>
              <th>Image</th>
            <!--  <th>Description</th>-->
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
				 if(empty($rs)==false)
		{
		while($val=mysql_fetch_array($rs)){
			
			
			 ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $val['Title'];?></td>
              <td><?php if(count($val['Image'])>0){ echo '<img src="'.LINK_ROOT.'/image_upload/gallery/'.$val['Image'].'" style="width:100px">'; }else{ echo '<img src="'.LINK_ROOT.'/image_upload/thumb/defult.jpg"  style="width:50px">'; }?></td>
              <!--<td><?php //echo $val['Description'];?></td>-->
              <td><a href="edit.php?id=<?php echo $val['Id'];?>">Edit</a> | <a class="delete" href="#" id="<?php echo $val['Id'];?>"> Delete</a></td>
            </tr>
            <?php $i++;}}else{ ?>
            <td colspan="6" align="center">Opps No Data Found</td>
            <?php } ?>
          </tbody>
        </table>
         
 		<div class="text-center">
     		 <?php echo $pager->renderFullNav() ?>
     	</div> 
        <input type="hidden" name="page" id="page" value="1"/>
</form>

