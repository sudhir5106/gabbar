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

//Check Here IF Student Name  is Empty For Filter
if($_REQUEST['student_name']!='')
{
	$condition.=' AND ST.First_Name = "'.trim($_REQUEST['student_name']).'"';
} 
//Check Here Mobile No is Empty For Filter
if($_REQUEST['mobile']!='')
{
	$condition.=' AND ST.Mobile="'.$_REQUEST['mobile'].'"';
}
//Check Here Email id is Empty For Filter
if($_REQUEST['email']!='')
{
	$condition.=' AND ST.email="'.$_REQUEST['email'].'"';
}


//Get Here Student List
 $sql="SELECT Student_Id, CONCAT(First_Name,' ', Middle_Name,' ',Last_Name) AS Student_Name, DATE_FORMAT(DOB,'%d-%m-%Y') AS DOB, Father_Name,Mother_Name,Guardian_Name,Roll_No, Collage, Qualification, Address,Mobile, Email, DATE_FORMAT(Join_Date,'%d-%m-%Y') AS Join_Date, Profile_Image, CT.name AS Country_Name, SS.name AS State_Name, CS.name AS City_Name FROM students ST LEFT JOIN countries CT ON CT.id=ST.Country LEFT JOIN states SS ON SS.id=ST.State LEFT JOIN cities CS ON CS.id=ST.City WHERE 1=1 ".$condition." ORDER BY Student_Id DESC";
$getCategory=$db->ExecuteQuery($sql);
/*if(!$getCategory)
{
echo mysql_error();
}*/
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
              <th>Name</th>
              <th>Father </th>
              <th>Qualification</th>
              <th>Address</th>
              <th>Mobile</th>
              <th>Email</th>
              <th>Registration Date</th>
              <th>Profile</th>
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
              <td><?php echo $val['Father_Name'];?></td>
             <td><?php echo $val['Qualification'];?></td>
              <td><?php echo $val['Address'];?></td>
              <td><?php echo $val['Mobile'];?></td>
              <td><?php echo $val['Email'];?></td>
              <td><?php echo $val['Join_Date'];?></td>
              <td><?php if($val['Profile_Image']!=''){ echo '<img src="'.PATH_UPLOAD_IMAGE.'/student/thumb/'.$val['Profile_Image'].'"/>'; } ?></td>
              <td><a href="#" class="view-details" value="<?php echo $val['Student_Id']?>">View</a> | <a href="edit.php?id=<?php echo $val['Student_Id'];?>">Edit</a> | <a class="delete" href="#" id="<?php echo $val['Student_Id'];?>"> Delete</a>
              
              <div id="show<?php echo $val['Student_Id'];?>" title="Student Details" style="display:none; width:500px !important; ">
                  <p> <strong>Student Name</strong> - <?php echo $val['Student_Name'];?><br/> 
                 	  <strong>DOB</strong> - <?php echo $val['DOB'];?><br/> 
                  	  <strong>Father's Name </strong> - <?php echo $val['Father_Name'];?><br/>
                      <strong>Mother's Name </strong> - <?php echo $val['Mother_Name'];?><br/>
                      <strong>Guardian's Name </strong> - <?php echo $val['Guardian_Name'];?><br/>
                      <strong>Roll No </strong> - <?php echo $val['Roll_No'];?><br/>
                  	  <strong>School/Collage </strong> - <?php echo $val['Collage'];?><br/>
                      <strong>Qualification </strong> - <?php echo $val['Qualification'];?><br/>
                      <strong>Address </strong> - <?php echo $val['Address'];?><br/>
                      <strong>City </strong> - <?php echo $val['City_Name'];?><br/>
                      <strong>State</strong> - <?php echo $val['State_Name'];?><br/>
                      <strong>Country </strong> - <?php echo $val['Country_Name'];?><br/>
                      <strong>Mobile </strong> - <?php echo $val['Mobile'];?><br/>
                      <strong>Other Contact </strong> - <?php echo $val['Other_Contact'];?><br/>
                      <strong>Email </strong> - <?php echo $val['Email'];?><br/>
                      <strong>Join Date </strong> - <?php echo $val['Join_Date'];?><br/>
                      <strong>Profile Image </strong> - <?php if($val['Profile_Image']!=''){ echo '<img src="'.PATH_UPLOAD_IMAGE.'/student/'.$val['Profile_Image'].'"/>';} ?><br/>
                  </p>
                </div>
 
              
              
              
              </td>
            </tr>
            <?php $i++;}}else{ ?>
            <td colspan="11" align="center">Opps No Data Found</td>
            <?php } ?>
          </tbody>
        </table>
         
 		<div class="text-center">
     		 <?php echo $pager->renderFullNav() ?>
     	</div> 
        <input type="hidden" name="page" id="page" value="1"/>
        <input type="hidden" name="course_type" id="course_type" value="<?php echo @$_REQUEST['course_type']; ?>" />
        <input type="hidden" name="course_name" id="course_name" value="<?php echo @$_REQUEST['course_name']; ?>" />

</form>

