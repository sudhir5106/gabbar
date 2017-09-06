<?php 
include('../../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();


 //Get Student name here
 $getStudent=$db->ExecuteQuery("SELECT CONCAT(First_Name,' ',Middle_Name,' ',Last_Name) AS Student_Name, Student_Id FROM students ORDER BY First_Name ASC");
 
 //edit List get Here
 $getEdit=$db->ExecuteQuery("SELECT *, DATE_FORMAT(DOA,'%d-%m-%Y') AS SDate FROM student_enrolled  WHERE  Enrolled_Id=".$_REQUEST['id']."");
//Get Here Course Type list
$slt=$db->ExecuteQuery("SELECT Course_Id, CONCAT(Course_Name,' (',Name,')') AS Course_Name FROM courses CS LEFT JOIN course_type ST ON ST.Id=CS.Coursetype_Id ORDER BY Course_Name ASC");

//$getSubject=array();
//$getBatch=array();
//get Here Subject Name here
$getSubject=$db->ExecuteQuery("SELECT Subject_Id,Subject_Name FROM `subjects` WHERE Course_Id='".$getEdit[1]['Course_Name']."' ORDER BY `subjects`.`Subject_Name` ASC ");


//get Here Batch Name here
$getBatch=$db->ExecuteQuery("SELECT Batch_Id,Batch_Name FROM `batches` ORDER BY `Batch_Name` ASC ");
?>
<script type="text/javascript" src="courses.js"></script>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Student Enrolled Course Edit  </h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Edit Form  </h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <button class="btn btn-round btn-success" onclick="window.history.back();">Back</button>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <form class="form-horizontal form-label-left" action="" method="post" id="addform">
          <input type="hidden" id="id" value="<?php echo $getEdit[1]['Enrolled_Id']?>">
          <div class="col-sm-12">
            	<div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="faculty_name">Student Name <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="student_name" class="form-control col-md-7 col-xs-12" name="student_name">
                  <option value="">Select Student Name</option>
                  <?php foreach($getStudent as $val){ ?>
                  <option value="<?php echo $val['Student_Id']?>" <?php if($val['Student_Id']==$getEdit[1]['Student_Id']){ echo "Selected"; } ?>><?php echo $val['Student_Name']?></option>
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
                        <option value="C" <?php if($getEdit[1]['Enrolled_For']=='C'){ echo "selected"; }?>>Course</option>
                        <option value="S" <?php if($getEdit[1]['Enrolled_For']=='S'){ echo "selected"; }?>>Subject</option>
                        </select>
                    </td>
                    <td>
                    	<select  class="form-control col-md-7 col-xs-12 course_name" name="course_name">
                        <option value="">Select Course</option>
                        <?php foreach($slt as $val){ ?>
                        <option value="<?php echo $val['Course_Id']?>" <?php if($getEdit[1]['Course_Name']==$val['Course_Id']){ echo "selected"; }?>><?php echo $val['Course_Name']?></option>
                        <?php } ?>
                        </select>
                    </td>
                    <td>
                    	<select  class="form-control col-md-7 col-xs-12 subject_name" name="subject_name">
                        <option value="">Select Subject</option>
                        <?php foreach($getSubject as $val){ ?>
                        <option value="<?php echo $val['Subject_Id']?>" <?php if($getEdit[1]['Subject_Name']==$val['Subject_Id']){ echo "selected"; }?> ><?php echo $val['Subject_Name']?></option>
                        <?php } ?>
                        </select>
                    
                    </td>
                     <td>
                    	<select class="form-control col-md-7 col-xs-12 batch_name" name="batch_name">
                        <option value="">Select Batch</option>
                        <?php foreach($getBatch as $val){ ?>
                        <option value="<?php echo $val['Batch_Id']?>" <?php if($getEdit[1]['Batch_Name']==$val['Batch_Id']){ echo "selected"; }?>><?php echo $val['Batch_Name']?></option>
                        <?php } ?>
                        </select>
                    
                    </td>
                    <td>
                     <input type="text" class="form-control col-md-7 col-xs-12 datepicker start_date" name="start_date" placeholder="Date Of Addition" value="<?php echo $getEdit[1]['SDate'];?>"/>
                    </td>
                	<!--<td>
                      <a href="#" class="btn btn-primary add_new">Add</a>
                    </td>-->
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
              <button id="subject_update" name="subject_update" type="button" class="btn btn-success">Update</button>
            </div>
            <div id="loading" class="col-md-6 col-md-offset-5" style="display:none;" align="center">
            <img src="<?php echo PATH_IMAGE?>/loader.gif" style="width:30px" />
            </div>
          </div>
        </form>
      </div>
      <div id="dialog_success" title="Success Message" style="display:none; text-align:left;">
        <p>Your date is successfully update</p>
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
