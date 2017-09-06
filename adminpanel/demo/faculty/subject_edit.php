<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();


 //Get faculty name here
 $getEdit=$db->ExecuteQuery("SELECT * FROM faculty_subject WHERE Faculty_Subject_Id='".$_REQUEST['id']."'");
 
 //Get HEre Faculty Name
$getFaculty=$db->ExecuteQuery("SELECT CONCAT(First_Name,' ',Middle_Name,' ',Last_Name) AS Faculty_Name, Faculty_Id FROM faculties ORDER BY First_Name ASC");

//Get Here Course Type list
$slt=$db->ExecuteQuery("SELECT Course_Id, CONCAT(Course_Name,' (',Name,')') AS Course_Name FROM courses CS LEFT JOIN course_type ST ON ST.Id=CS.Coursetype_Id ORDER BY Course_Name ASC");

//subject Name Select
$subject=$db->ExecuteQuery("SELECT Subject_Id, Subject_Name FROM subjects WHERE Course_Id='".$getEdit[1]['Course_Id']."'"); 

//Get Here batch name 
$batch=$db->ExecuteQuery("SELECT Batch_Id, Batch_Name FROM batches WHERE Batch_Id='".$getEdit[1]['Batch_Id']."'");

?>
<script type="text/javascript" src="faculty.js"></script>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3> Faculty Subject Edit  </h3>
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
          <input type="hidden" id="id" value="<?php echo $_REQUEST['id']?>">
          <div class="col-sm-12">
            	<div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="faculty_name">Faculty Name <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="faculty_name" class="form-control col-md-7 col-xs-12" name="faculty_name">
                  <option value="">Select Faculty Name</option>
                  <?php foreach($getFaculty as $val){ ?>
                  <option value="<?php echo $val['Faculty_Id']?>" <?php if($val['Faculty_Id']==$getEdit[1]['Faculty_Id']){ echo "Selected"; }?>><?php echo $val['Faculty_Name']?></option>
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
						echo '<option value="'.$val['Course_Id'].'"';
						 if($val['Course_Id']==$getEdit[1]['Course_Id'])
						 { 
						 echo "Selected"; 
						 }
						echo '>'.$val['Course_Name'].'</option>';
				
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
                  <?php foreach($subject as $val)
					{
						echo '<option value="'.$val['Subject_Id'].'"';
						 if($val['Subject_Id']==$getEdit[1]['Subject_Id'])
						 { 
						 echo "Selected"; 
						 }
						echo '>'.$val['Subject_Name'].'</option>';
				
					}
	?>
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="batch_name">Batch Name <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="batch_name" class="form-control col-md-7 col-xs-12" name="batch_name">
                  <option value="">Select Batch Name</option>
                 <?php foreach($batch as $val){?>
                 	<option value="<?php echo $val['Batch_Id']?>" <?php if($val['Batch_Id']==$getEdit[1]['Batch_Id']){ echo 'selected';}?>><?php echo $val['Batch_Name']?></option>
                 <?php } ?>
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
