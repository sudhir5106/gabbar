<?php 
include('../../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

//Get HEre Student Name
$getStudent=$db->ExecuteQuery("SELECT CONCAT(First_Name,' ',Middle_Name,' ',Last_Name) AS Student_Name, Student_Id FROM students ORDER BY First_Name ASC");

//Get Here Course Type list
$slt=$db->ExecuteQuery("SELECT Course_Id, CONCAT(Course_Name,' (',Name,')') AS Course_Name FROM courses CS LEFT JOIN course_type ST ON ST.Id=CS.Coursetype_Id ORDER BY Course_Name ASC");

$getSubject=array();
$getBatch=array();
//get Here Subject Name here
//$getSubject=$db->ExecuteQuery("SELECT Subject_Id,Subject_Name FROM `subjects` ORDER BY `subjects`.`Subject_Name` ASC ");


//get Here Batch Name here
//$getBatch=$db->ExecuteQuery("SELECT Batch_Id,Batch_Name FROM `batches` ORDER BY `Batch_Name` ASC ");

   
?>
<script type="text/javascript" src="courses.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
	 $(document).on('click','.del',function(){
			$(this).parent().parent().remove();
	});
	
   $(document).on('click' ,'.add_new',function(){
	 
	 //Get here Course Name
		var course='<?php foreach($slt as $val){ echo '<option value="'.$val['Course_Id'].'">'.$val['Course_Name'].'</option>'; } ?>';
		
		//Get Here Subject Name
		var subject='<?php foreach($getSubject as $val){ echo '<option value="'.$val['Subject_Id'].'">'.$val['Subject_Name'].'</option>';} ?>';
		
		//GEt here Batches Name
		var batch='<?php foreach($getBatch as $val){  echo '<option value="'.$val['Batch_Id'].'">'.$val['Batch_Name'].'</option>';} ?>';
		
		$('#add_new').append('<tr><td><select  class="form-control col-md-7 col-xs-12 enrolled_for" name="enrolled_for"><option value="">Select </option><option value="C">Course</option><option value="S">Subject</option></select></td><td><select class="form-control col-md-7 col-xs-12 course_name" name="course_name"><option value="">Select Course</option>'+course+'</select></td><td><select class="form-control col-md-7 col-xs-12 subject_name" name="subject_name"><option value="">Select Subject</option>'+subject+'</select></td><td><select class="form-control col-md-7 col-xs-12 batch_name" name="batch_name"><option value="">Select Batch</option>'+batch+'</select></td><td><input type="text" class="form-control col-md-7 col-xs-12 datepicker start_date" name="start_date" placeholder="Date Of Addition" /></td><td><input type="button" class="btn-danger del" value="Delete" /></td></tr>');
		
	   });
	   
	
});
</script>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3> Student Course Enrolled  </h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Add New </h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <button class="btn btn-round btn-success" onclick="location.href='subject_list.php';">View List</button>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <form class="form-horizontal form-label-left" action="" method="post" id="addform">
          <input type="hidden" id="id" value="">
          <div class="col-sm-12">
            	<div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="faculty_name">Student Name <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="student_name" class="form-control col-md-7 col-xs-12" name="student_name">
                  <option value="">Select Student Name</option>
                  <?php foreach($getStudent as $val){ ?>
                  <option value="<?php echo $val['Student_Id']?>"><?php echo $val['Student_Name']?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>
              <table class="table coursetable">
              	<thead>
                <tr>
                	<th>Enrolled For</th>
                    <th>Course Name</th>
                    <th>Subject Name</th>
                    <th>Batch Name</th>
                    <th colspan="2">Start Date</th>
                </tr>
              	<tr>
                	<td>
                    	<select class="form-control col-md-7 col-xs-12 enrolled_for" name="enrolled_for">
                        <option value="">Select </option>
                        <option value="C">Course</option>
                        <option value="S">Subject</option>
                        </select>
                    </td>
                    <td>
                    	<select  class="form-control col-md-7 col-xs-12 course_name" name="course_name">
                        <option value="">Select Course</option>
                        <?php foreach($slt as $val){ ?>
                        <option value="<?php echo $val['Course_Id']?>"><?php echo $val['Course_Name']?></option>
                        <?php } ?>
                        </select>
                    </td>
                    <td>
                    	<select  class="form-control col-md-7 col-xs-12 subject_name" name="subject_name">
                        <option value="">Select Subject</option>
                        <?php foreach($getSubject as $val){ ?>
                        <option value="<?php echo $val['Subject_Id']?>"><?php echo $val['Subject_Name']?></option>
                        <?php } ?>
                        </select>
                    
                    </td>
                     <td>
                    	<select class="form-control col-md-7 col-xs-12 batch_name" name="batch_name">
                        <option value="">Select Batch</option>
                        <?php foreach($getBatch as $val){ ?>
                        <option value="<?php echo $val['Batch_Id']?>"><?php echo $val['Batch_Name']?></option>
                        <?php } ?>
                        </select>
                    
                    </td>
                    <td>
                     <input type="text" class="form-control col-md-7 col-xs-12 datepicker start_date" name="start_date" placeholder="Date Of Addition" />
                    </td>
                	<td>
                      <a href="#" class="btn btn-primary add_new">Add</a>
                    </td>
                </tr>
                </thead>
                <tbody id="add_new">
                
                </tbody>
              </table>
          </div>
          
           <div class="clearfix"></div>
          </div>
           <div class="clearfix"></div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-5"> 
              <!-- <button type="submit" class="btn btn-primary">Cancel</button>-->
              <button id="subject_submit" name="subject_submit" type="button" class="btn btn-success">Submit</button>
            </div>
            <div id="loading" class="col-md-6 col-md-offset-5" style="display:none;" align="center">
            <img src="<?php echo PATH_IMAGE?>/loader.gif" style="width:30px" />
            </div>
          </div>
        </form>
      </div>
      <div id="dialog_success" title="Success Message" style="display:none; text-align:left;">
        <p>Your date is successfully submited</p>
      </div>
       <div id="dialog_error" title="Error Message" style="display:none; text-align:left;">
        <p>Your date is not submited</p>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
