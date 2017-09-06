  <?php 
  include('../../../config.php');
  require_once(PATH_LIBRARIES.'/classes/DBConn.php');
  $db = new DBConn();
  require_once(PATH_ADMIN_INCLUDE.'/header.php');

  //GEt Here Menu List
  $getMenu=$db->ExecuteQuery("SELECT * FROM menu Order BY Menu_Id DESC");

  ?>
  <script type="text/javascript" src="category.js"></script>

  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3> Main Menu </h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Add New </h2>
           
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          <form class="form-horizontal form-label-left" action="" method="post" id="categoryform">
            <input type="hidden" id="id" value="">
            <div class="col-sm-12">
             <!---Write here English Content Here-->
              <div class="col-sm-8">
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Menu Name <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="Home" required type="text">
                  </div>
                </div>
                <div class="item form-group" style="display:none">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file_name">File Name<span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="file_name" class="form-control col-md-7 col-xs-12" name="file_name" placeholder="index.php" required type="text">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Position <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="position" name="position" required="required" class="form-control col-md-7 col-xs-12 number" placeholder="1">
                  </div>
                </div>
              </div>
              <!---Close Here English -->
             <div class="clearfix"></div>
            </div>
             <div class="clearfix"></div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-8 col-md-offset-3"> 
                <!-- <button type="submit" class="btn btn-primary">Cancel</button>-->
                <button id="submit" type="button" class="btn btn-success">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <div id="dialog" title="Message" style="display:none; text-align:left;">
          <p>Successfully Added Menu</p>
        </div>
      </div>
    </div>
    <!-- Menu List Sho HEre -->

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>View List </h2>
           
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          <form class="form-horizontal form-label-left" action="" method="post" id="categoryform">
            <input type="hidden" id="id" value="">
            <div class="col-sm-12">
             <!---Write here English Content Here-->
              <div class="col-sm-12">
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th>No.</th>
                                <th>Logo</th>
                                <th>Position</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($getMenu as $val){ ?>
                              <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $val['Menu_Name'];?></td>
                                <td><?php if($val['Position']==0){echo 'Defualt';}else{ echo $val['Position'];}?></td>
                                <td><input type="checkbox" <?php if($val['Status']==1){ echo "Checked";}?> value="<?php echo $val['Menu_Id']?>" class="status" name="status" <?php if($val['Defualt_Menu']==1){ echo "disabled";}?> /></td>
                                <td><a href="edit.php?id=<?php echo $val['Menu_Id'];?>" class="btn btn-warning btn-sm">Edit</a> <?php if($val['Defualt_Menu']!=1){?>  <a href="#" id="<?php echo $val['Menu_Id'];?>" class="btn btn-danger btn-sm delete"> Delete</a><?php } ?></td>
                              </tr>
                              <?php $i++;} ?>
                              
                            </tbody>
                          </table>
        
              </div>
              <!---Close Here English -->
             <div class="clearfix"></div>
            </div>
             <div class="clearfix"></div>
            <div class="ln_solid"></div>
            
          </form>
        </div>
      </div>
    </div>

  </div>
  </div>
  <?php 
  require_once(PATH_ADMIN_INCLUDE.'/footer.php');

  ?>
