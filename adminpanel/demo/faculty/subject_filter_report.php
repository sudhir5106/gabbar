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


//Check Here IF Course Name is Empty For Filter
if($_REQUEST['course_type']!='')
{
	$condition.=' AND FS.Course_Id="'.$_REQUEST['course_type'].'"';
}
//Check Here course Name is Empty For Filter
if($_REQUEST['faculty_name']!='')
{
	$condition.=' AND FS.Faculty_Id="'.$_REQUEST['faculty_name'].'"';
}
//Check Here Subject Name is Empty For Filter
if($_REQUEST['subject_name']!='')
{
	$condition.=' AND FS.Subject_Id="'.$_REQUEST['subject_name'].'"';
}


	//Get Here Subject List 
   $sql="SELECT Faculty_Subject_Id, CONCAT(First_Name,' ',Middle_Name,' ',Last_Name) AS Faculty_Name, Course_Name, Subject_Name, Batch_Name FROM faculty_subject FS INNER JOIN faculties FT ON FT.Faculty_Id=FS.Faculty_Id LEFT JOIN courses CS ON CS.Course_Id=FS.Course_Id  LEFT JOIN subjects SS ON SS.Subject_Id=FS.Subject_Id LEFT JOIN batches BS ON BS.Batch_Id=FS.Batch_Id  WHERE 1=1 ".$condition." ORDER BY Faculty_Subject_Id DESC";
$getList=$db->ExecuteQuery($sql);


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
   						url: "subject_filter_report.php",  
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
              <th>Faculty Name</th>
              <th>Course Name</th>
              <th>Subject Name</th>
              <th>Batch Name</th>
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
              <td><?php echo $val['Faculty_Name'];?></td>
              <td><?php echo $val['Course_Name'];?></td>
              <td><?php echo $val['Subject_Name'];?></td>
              <td><?php echo $val['Batch_Name'];?></td>
              <td><!--<a href="#" class="view-details" value="<?php//echo $val['Faculty_Subject_Id']?>">View</a> |--> <a href="subject_edit.php?id=<?php echo $val['Faculty_Subject_Id'];?>">Edit</a> | <a class="subject_delete" href="#" id="<?php echo $val['Faculty_Subject_Id'];?>"> Delete</a>
              
              <!--<div id="show<?php// echo $val['Faculty_Subject_Id'];?>" title="Batch Name - <?php// echo //$val['Batch_Name']?>" style="display:none; width:500px !important; ">
                  <p> 
                  	  <strong>Course Type</strong> - <?php// echo $val['Course_Type'];?><br/> 
                  	  <strong>Course Name</strong> - <?php// echo $val['Course_Name'];?><br/>
                  	  <strong>Start Date</strong> - <?php// echo $val['Start_Date'].' '.$val['Start_Time'];?><br/>
                  	  <strong>End Date</strong> - <?php// echo $val['End_Date'].' '.$val['End_Time'];?><br/>
                  </p>
                </div>
 -->
              
              
              
              </td>
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
       <!-- <input type="hidden" name="course_type" id="course_type" value="<?php echo @$_REQUEST['course_type']; ?>" />-->
        <input type="hidden" name="course_name" id="course_name" value="<?php echo @$_REQUEST['course_name']; ?>" />
        <input type="hidden" name="batch_name" id="batch_name" value="<?php echo @$_REQUEST['batch_name']; ?>" />

</form>

