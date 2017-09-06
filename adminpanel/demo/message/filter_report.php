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
if($_REQUEST['name']!='')
{
	$condition.=' AND Email="'.$_REQUEST['name'].'"';
}

//Get Here News  List
$sql="SELECT * FROM contact_request WHERE 1=1 ".$condition." ORDER BY Id DESC";
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
              <th>Sender Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Message</th>
              <th>Attachment</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
				 if(empty($rs)==false)
		{
		while($val=mysql_fetch_array($rs)){ ?>
            <tr <?php if($val['Read_Status']==0){ echo 'style="background-color:#F9E2C2" title="unread message"';} ?>>
              <td><?php echo $i;?></td>
              <td><a href="view_more.php?id=<?php echo $val['Id'];?>"><?php echo $val['Name'];?></a></td>
              <td><?php echo $val['Email'];?></td>
              <td><?php echo $val['Phone'];?></td>
              <td><?php echo substr($val['Message'].'...',0,100);?></td>
              <td><?php if($val['File']!=''){ ?><a href="<?php echo PATH_UPLOAD_IMAGE.'/files_upload/'.$val['File']?>"  >open <i class="fa fa-paperclip " aria-hidden="true"></i></a> <?php } ?></td>
              <td><a href="reply.php?id=<?php echo $val['Id'];?>">Reply</a><a href="#" class='checkStatus' value="<?php echo $val['Id']?>" ><?php echo $val['PStatus'];?></a> <!--| <a href="edit.php?id=<?php //echo $val['Id'];?>">Edit</a>--> | <a class="delete" href="#" id="<?php echo $val['Id'];?>"> Delete</a></td>
            </tr>
            <?php $i++;}}else{ ?>
            <td colspan="9" align="center">Opps No Data Found</td>
            <?php } ?>
          </tbody>
        </table>
         
 		<div class="text-center">
     		 <?php echo $pager->renderFullNav() ?>
     	</div> 
        <input type="hidden" name="page" id="page" value="1"/>
        <input type="hidden" name="name" id="name" value="<?php echo @$_REQUEST['title']; ?>" />

</form>

