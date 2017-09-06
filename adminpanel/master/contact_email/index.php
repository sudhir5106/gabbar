<?php 
include('../../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');


//List Of Top Logo Cord
$getValue=$db->ExecuteQuery("SELECT * FROM contact_email ")
?>
<script type="text/javascript" src="toplogo.js"></script>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Set Contact Email Id </h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <!--<div class="col-md-12 col-sm-12 col-xs-12">
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
             
               <label class="control-label col-sm-2 " for="Top Logo_cost">Logo <span class="required">*</span> </label>
              <div class="col-sm-3 ">
                <input type="file" id="logo" class="form-control col-md-7 col-xs-12" name="logo" >
              </div>
              <button id="submit" type="button" class="btn btn-success">Upload</button>
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
    </div>-->
    <!--List OF View-->
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Contact us email id </h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Email </th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td><?php echo $getValue[1]['Email_Id']; ?></td>
                               <td><input type="checkbox" name="status" value="<?php echo $getValue[1]['Contact_Id'];?>" <?php if($getValue[1]['Status']==1){ echo "Checked";}?> class="status" disabled="disabled" ></td>
                              <td><a href="edit.php?id=<?php echo $getValue[1]['Contact_Id'];?>">Edit</a></td>
                            </tr>
                            
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
