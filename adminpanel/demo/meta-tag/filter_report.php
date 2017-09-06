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

//Check Here IF Langauge is Empty For Filter
if($_REQUEST['page_title']!='')
{
	$condition.=' AND Page_Url="'.trim($_REQUEST['page_title']).'"';
}

//Get Here Category List
$sql="SELECT Meta_Id,Page_Url, Page_Title, Page_Heading, Meta_Key,Meta_Description FROM meta_detail WHERE 1=1 ".$condition." ORDER BY Meta_Id DESC";
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
              <th>Page Url</th>
              <th>Page Title</th>
              <th>Page Heading</th>
              <th>Meta Key</th>
              <th>Meta Description</th>
             <!-- <th>Langauge</th>-->
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
				 if(empty($rs)==false)
		{
		while($val=mysql_fetch_array($rs)){ ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $val['Page_Url'];?></td>
              <td><?php echo $val['Page_Title'];?></td>
              <td><?php echo $val['Page_Heading'];?></td>
              <td><?php echo $val['Meta_Key'];?></td>
              <td><?php echo $val['Meta_Description'];?></td>
              <td><!--<a href="view.php?id=<?php //echo $val['Sub_Id'];?>">View</a> |--> <a href="edit.php?id=<?php echo $val['Meta_Id'];?>">Edit</a> | <a class="delete" href="#" id="<?php echo $val['Meta_Id'];?>"> Delete</a></td>
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
        <input type="hidden" name="page_title" id="page_title" value="<?php echo @$_REQUEST['page_title']; ?>" />

</form>

