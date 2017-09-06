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
	$condition.=' AND Title LIKE "%'.$_REQUEST['title'].'%"';
}
//
if($_REQUEST['start_date']!='')
{
	$start=date('Y-m-d',strtotime($_REQUEST['start_date']));
	$condition.=' AND Start_Date >="'.$start.'"';
}
if($_REQUEST['end_date']!='')
{
	$end=date('Y-m-d',strtotime($_REQUEST['end_date']));
	$condition.=' AND Start_Date <="'.$end.'"';
}

//Get Here Event  List
$sql="SELECT E.Event_Id, Title, DATE_FORMAT(Start_Date,'%d-%m-%Y') AS Start_Date,  DATE_FORMAT(End_Date,'%d-%m-%Y') AS End_Date, CASE WHEN Status=1 THEN 'Actvie' ELSE 'Not Active' END Status, Description, Image_Path , CONCAT(DATE_FORMAT(Start_Time, '%h:%i %P'),' TO ',DATE_FORMAT(End_Time, '%h:%i %P')) AS STIME , E.Status AS PStatus FROM events E LEFT JOIN event_image EI ON EI.Event_Id=E.Event_Id  AND EI.Main_Image=1 WHERE 1=1  ".$condition." ORDER BY EI.Event_Id DESC";
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
              <th>Event Title</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Description</th>
              <th>Main Image</th>
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
              <td><?php echo $val['Title'];?></td>
              <td><?php echo $val['Start_Date']?></td>
              <td><?php echo $val['End_Date']?></td>
               <td><?php echo substr($val['Description'],0,150);?></td>
             <td><img src="<?php echo PATH_UPLOAD_IMAGE.'/event/thumb/'.$val['Image_Path'];?>" style="width:80px;height:80px" /></td>
              <td> <a href="#" class='checkStatus' value="<?php echo $val['Event_Id']?>" title="Click For <?php if($val['PStatus']==1){ echo "Not Active"; }else{ echo "Active";}?>" ><?php echo $val['Status'];?></a></td>
              <td>
             <a href="#" class="view-details" value="<?php echo $val['Event_Id']?>">View</a> | <a href="edit.php?id=<?php echo $val['Event_Id'];?>">Edit</a> | <a class="delete" href="#" id="<?php echo $val['Event_Id'];?>"> Delete</a>
             
             <!--View Deatils Get Here-->
              
              <div id="show<?php echo $val['Event_Id'];?>" title="Event Details " style="display:none; width:500px !important; ">
                  <p> <strong> Title </strong> - <?php echo $val['Title'];?><br/> 
                 	  <strong>Date </strong> - <?php echo $val['Start_Date'].' TO '.$val['End_Date'];?><br/> 
                  	  <strong>Time</strong> - <?php echo $val['STIME'];?><br/>
                      <strong>Description </strong> - <?php echo $val['Description'];?><br/>
                  </p>
                  <?php $getImage=$db->ExecuteQuery("SELECT * FROM event_image WHERE Event_Id='".$val['Event_Id']."'");
				  foreach($getImage as $val){
					  
				  ?>
                  <div class="pull-left">
 				  <img src="<?php echo PATH_UPLOAD_IMAGE.'/event/thumb/'.$val['Image_Path'];?>" style="width:100px; height:100px;margin-left: 5px;" /></div>
                  <?php } ?>
                </div>
             
             </td>
            </tr>
            <?php $i++;}}else{ ?>
            <td colspan="10" align="center">Opps No Data Found</td>
            <?php } ?>
          </tbody>
        </table>
         
 		<div class="text-center">
     		 <?php echo $pager->renderFullNav() ?>
     	</div> 
        <input type="hidden" name="page" id="page" value="1"/>
        <input type="hidden" name="title" id="title" value="<?php echo @$_REQUEST['title']; ?>" />

</form>

