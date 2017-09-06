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

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3> Faculty Subjects  </h3>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="faculty_name">Faculty Name <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="faculty_name" class="form-control col-md-7 col-xs-12" name="faculty_name">
                  <option value="">Select Faculty Name</option>
                  <?php foreach($getFaculty as $val){ ?>
                  <option value="<?php echo $val['Faculty_Id']?>"><?php echo $val['Faculty_Name']?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>
              
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_type">Course Name <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="course_type" class="form-control col-md-7 col-xs-12" name="course_type">
                  <option value="">Select Course Name</option>
                 <?php foreach($slt as $val)
					{
						echo '<option value="'.$val['Course_Id'].'">'.$val['Course_Name'].'</option>';
				
					}
	?>
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_name">Subject Name <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="subject_name" class="form-control col-md-7 col-xs-12" name="subject_name">
                  <option value="">Select Subject Name</option>
                 
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="batch_name">Batch Name <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="batch_name" class="form-control col-md-7 col-xs-12" name="batch_name">
                  <option value="">Select Batch Name</option>
                 
                  </select>
                </div>
              </div>
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
