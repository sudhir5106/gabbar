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

if(!empty($_REQUEST['ip']))
{
	 $condition.=' AND ip="'.trim($_REQUEST['ip']).'"';
}

//date From and to
if($_REQUEST['fromdate']!='' && $_REQUEST['todate']!='')
{
	$fromdate=date('Y-m-d',strtotime($_REQUEST['fromdate']));
	$todate=date('Y-m-d',strtotime($_REQUEST['todate']));
	
	$condition.=' AND date >="'.$fromdate.'" AND date <="'.$todate.'"';
}
//Get Here Category List
  $sql="SELECT *, DATE_FORMAT(date,'%d-%m-%y') AS date2, TIME_FORMAT(time,'%h:%i %p') AS time2 FROM visitor_tracker WHERE 1=1 ".$condition." ORDER BY id DESC";
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
		//alert(str);
				$.ajax({  
    					type: "GET",  
   						url: "filter_report.php",  
    					data: str,  
						async: false,
    					success: function(value) {  
							//alert(value);
							$("#add").html(value);}
						});//eof ajax
	});
	});
</script>

<form name="planresult" id="planresult">
 
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th> <input type="checkbox" id="selectall" /> No.</th>
              <th>Ip Address</th>
              <th>Date</th>
              <th>Referer</th>
              <th>Browser</th> 
              <th>Web Page</th>
            </tr>
          </thead>
          <tbody>
            <?php 
				 if(empty($rs)==false)
		{
		while($val=mysql_fetch_array($rs)){
			
			
			 ?>
            <tr>
              <td><input type="checkbox" name="chk" value="<?php echo $val['id']?>" id="chk<?php echo $val['id']?>" class="select" /> <?php echo $i;?></td>
              <td><?php echo $val['ip'];?></td>
              <td><?php echo $val['date2'].' '.$val['time2'];?></td>
              <td><?php echo $val['http_referer'];?></td>
              <td><?php echo $val['http_user_agent'];?></td>
              <td><?php echo $val['web_page'];?></td>
              
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
        <input type="hidden" name="ip" id="ip" value="<?php echo $_REQUEST['ip'] ?>"/>
        <input type="hidden" name="fromdate" id="fromdate" value="<?php echo  $_REQUEST['fromdate'] ?>"/>
        <input type="hidden" name="todate" id="todate" value="<?php echo  $_REQUEST['todate'] ?>"/>
</form>

