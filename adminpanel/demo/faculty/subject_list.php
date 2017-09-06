<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();


//Get HEre Faculty Name
$getFaculty=$db->ExecuteQuery("SELECT CONCAT(First_Name,' ',Middle_Name,' ',Last_Name) AS Faculty_Name, Faculty_Id FROM faculties ORDER BY First_Name ASC");

//Get Here Course Type list
$slt=$db->ExecuteQuery("SELECT Course_Id, CONCAT(Course_Name,' (',Name,')') AS Course_Name FROM courses CS LEFT JOIN course_type ST ON ST.Id=CS.Coursetype_Id ORDER BY Course_Name ASC");

?>
<script type="text/javascript" src="faculty.js"></script>

<script>
	$( document ).ready(function() {
		
	  var x;
			$.ajax({
			   type: "GET",
			   url: "subject_filter_report.php",
			   async: false,
			   success: function(data){ //alert(data);
				   x=data;
				   $('#add').html(data);
			   }
			   });
	});
	
</script>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Faculty Subject Details </h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>View List </h2>
        <ul class="nav navbar-right panel_toolbox">
         <li><button class="btn btn-round btn-success" onclick="location.href='add_subject.php';">Add New</button></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_title">
      	<form class="form-horizontal form-label-left" action="" method="post" id="categoryform">
        <div class="item form-group">
              <div class="col-md-3 col-sm-3 ">
                <select id="faculty_name" class="form-control col-md-7 col-xs-12" name="faculty_name">
                 	<option value="">Select Faculty Name</option>
                    <?php foreach($getFaculty as $val){?>
                  <option value="<?php echo $val['Faculty_Id']?>"><?php echo $val['Faculty_Name']?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-3 col-sm-3 ">
                <select id="course_type" class="form-control col-md-7 col-xs-12" name="course_type">
                 	<option value="">Select Course Name</option>
                 <?php foreach($slt as $val)
					{
						echo '<option value="'.$val['Course_Id'].'">'.$val['Course_Name'].'</option>';
				
					}
	?>
                </select>
              </div>
              <div class="col-md-3 col-sm-3 ">
                <select id="subject_name" class="form-control col-md-7 col-xs-12" name="subject_name">
                 	<option value="">Select Subject Name</option>
                
                </select>
              </div>
               <div class="col-md-3 col-sm-3 ">
                <input type="button" id="subject_search" class="btn btn-primary" name="subject_search" value="Search" />
                 	
              </div>
              
            </div>
        </form>
      </div>
      <div class="x_content" id="add">
        
        <!-- Get ?here Al The List data-->
      </div>
      <div id="deletemsg" title="Message" style="display:none; text-align:left;">
          <p>You can not delete this batch name , <br/>
            becouse this data is used in other place also</p>
        </div>
    </div>
  </div>
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
