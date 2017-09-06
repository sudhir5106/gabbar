<?php 
include('../../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');


//List Of Top Logo Cord
$getValue=$db->ExecuteQuery("SELECT *, CASE WHEN (Website_Name='' || Website_Name IS NULL) THEN '----' ELSE Website_Name END Website_Name  FROM toplogo ORDER BY Toplogo_Id DESC")
?>
<script type="text/javascript" src="toplogo.js"></script>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3> Top Logo </h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Add New Top Logo</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <form class="form-horizontal form-label-left" action="" method="post" id="categoryform">
          <input type="hidden" id="id" value="">
          <div class="col-sm-12">
            <div class="item form-group">
             
               <label class="control-label col-sm-2 " for="website_name">Website Name  </label>
              <div class="col-sm-3 ">
                <input type="text" id="website_name" class="form-control col-md-7 col-xs-12" name="website_name" placeholder="mywebportal.com" >
              </div>
             </div> 
              <div class="item form-group">
             
               <label class="control-label col-sm-2 " for="Top Logo_cost">Logo </label>
              <div class="col-sm-3 ">
                <input type="file" id="logo" class="form-control col-md-7 col-xs-12" name="logo" >
              </div>
             </div>
              <div class="item form-group col-sm-6">
              <center> <button id="submit" type="button" class="btn btn-success">Submit</button></center>
           </div>
          </div>
          <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
          <div class="ln_solid"></div>
        </form>
      </div>
      <div id="dialog" title="Message" style="display:none; text-align:left;">
        <p>Successfully Added Top Logo </p>
      </div>
    </div>
    <!--List OF View-->
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Top Logo List </h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Website Name</th>
                              <th>Logo</th>
                              <th>Position</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i=1; foreach($getValue as $val){ ?>
                            <tr>
                              <td><?php echo $i;?></td>
                               <td><?php echo $val['Website_Name'];?></td> 
                              <td>
                              <?php if(file_exists(ROOT."/image_upload/logo/".$val['Logo_Image']) &&$val['Logo_Image']!='' ){ ?>
                              <img src="<?php echo PATH_UPLOAD_IMAGE.'/logo/thumb/'.$val['Logo_Image'];?>"/>
                              <?php } ?>
                              </td>
                               <td><input type="radio" name="status" value="<?php echo $val['Toplogo_Id'];?>" <?php if($val['Status']==1){ echo "Checked";}?> class="status" ></td>
                              <td><a href="edit.php?id=<?php echo $val['Toplogo_Id'];?>">Edit </a>   <a class="delete" href="#" id="<?php echo $val['Toplogo_Id'];?>">| Delete</a></td>
                            </tr>
                            <?php $i++;} ?>
                            
                          </tbody>
                        </table>
      </div>
      <div id="dialog_success" title="Message" style="display:none; text-align:left;">
          <p>Logo Successfully Updated</p>
        </div>
        <div id="dialog_error" title="Message" style="display:none; text-align:left;">
          <p>Something is Wrong </p>
        </div>
    </div>
  </div>
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
