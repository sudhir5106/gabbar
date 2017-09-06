<?php 
include('../../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/classes/ps_pagination.php');
$db = new DBConn();
error_reporting(0);

$con  = mysql_connect(SERVER, DBUSER, DBPASSWORD);
$rows_per_page=ROWS_PER_PAGE;
$totpagelink=PAGELINK_PER_PAGE;
$condition='';


//Check Here IF Course Name is Empty For Filter
if($_REQUEST['enrolled_for']!='')
{
	$condition.=' AND SE.Enrolled_For="'.$_REQUEST['enrolled_for'].'"';
}
//Check Here course Name is Empty For Filter
if($_REQUEST['student_name']!='')
{
	$condition.=' AND SE.Student_Id="'.$_REQUEST['student_name'].'"';
}


	//Get Here Subject List 
  $sql="SELECT Enrolled_Id, CONCAT(First_Name,' ',Middle_Name,' ',Last_Name) AS Student_Name, CS.Course_Name, CASE WHEN Enrolled_For='C' THEN 'Course' WHEN Enrolled_For='S' THEN 'Subject' END Enrolled, SS.Subject_Name, BS.Batch_Name FROM student_enrolled SE INNER JOIN students ST ON ST.Student_Id=SE.Student_Id LEFT JOIN courses CS ON CS.Course_Id=SE.Course_Name  LEFT JOIN subjects SS ON SS.Subject_Id=SE.Subject_Name LEFT JOIN batches BS ON BS.Batch_Id=SE.Batch_Name  WHERE 1=1 ".$condition." ORDER BY Enrolled_Id DESC";
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
              <th>Student Name</th>
              <th>Enrolled Name</th>
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
              <td><?php echo $val['Student_Name'];?></td>
              <td><?php echo $val['Enrolled'];?></td>
              <td><?php echo $val['Course_Name'];?></td>
              <td><?php echo $val['Subject_Name'];?></td>
              <td><?php echo $val['Batch_Name'];?></td>
              <td> <a href="edit.php?id=<?php echo $val['Enrolled_Id'];?>">Edit</a> | <a class="delete" href="#" id="<?php echo $val['Enrolled_Id'];?>"> Delete</a>
              
              <!--<div id="show<?php// echo $val['Student_Subject_Id'];?>" title="Batch Name - <?php// echo //$val['Batch_Name']?>" style="display:none; width:500px !important; ">
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

