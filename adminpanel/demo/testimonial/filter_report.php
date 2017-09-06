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
if($_REQUEST['title']!='')
{
	$condition.=' AND Client_Name LIKE "%'.$_REQUEST['title'].'%"';
}

//Get Here News  List
$sql="SELECT Test_Id AS Id,Review, CASE WHEN Status=1 THEN 'Active' ELSE 'Not Active' END Status,CASE WHEN Status=0 THEN 'Show' ELSE 'Hide' END PStatus, Logo, User_Name  FROM testimonials WHERE 1=1 ".$condition." ORDER BY Test_Id DESC";
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
              <th>User Name</th>
              <th>Profile Image</th>
              <th>Review</th>
              <th>Status</th>
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
              <td><?php echo $val['User_Name'];?></td>
              <td><img src="<?php echo PATH_UPLOAD_IMAGE.'/testimonial/thumb/'.$val['Logo'];?>" style="width:80px;height:80px" /></td>
               <td><?php echo substr($val['Review'],0,150);?></td>
              <td><?php echo $val['Status'];?></td>
             <!-- <td><?php //echo $val['Lang_Name'];?></td>-->
              <td><a href="#" class='checkStatus' value="<?php echo $val['Id']?>" ><?php echo $val['PStatus'];?></a> | <a href="edit.php?id=<?php echo $val['Id'];?>">Edit</a> | <a class="delete" href="#" id="<?php echo $val['Id'];?>"> Delete</a></td>
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
        <input type="hidden" name="title" id="title" value="<?php echo @$_REQUEST['title']; ?>" />

</form>

