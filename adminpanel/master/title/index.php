  <?php 
  include('../../../config.php');
  require_once(PATH_LIBRARIES.'/classes/DBConn.php');
  $db = new DBConn();
  require_once(PATH_ADMIN_INCLUDE.'/header.php');

  //GEt Here Menu List
  $getMenu=$db->ExecuteQuery("SELECT * FROM menu Order BY Menu_Id DESC");
  
  //GEt Here Menu List
  $getTitle=$db->ExecuteQuery("SELECT Title_Name, Title_Id, Menu_Name FROM title T INNER JOIN menu M ON M.Menu_Id=T.Menu_Id Order BY Title_Id DESC");

  ?>
  <script type="text/javascript" src="category.js"></script>

  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Page Title </h3>
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
                    <select id="menu" class="form-control col-md-7 col-xs-12" name="menu" required>
                    	<option value="">--Select Name --</option>
                   		<?php foreach($getMenu as $val){?>
                        <option value="<?php echo $val['Menu_Id'];?>"><?php echo $val['Menu_Name'];?></option>
  							<?php } ?>                 
                    </select>
                    <br /><span id="menu_error"></span>
                  </div>
                </div>
               
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Title <span class="required">*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="title" name="title" required="required" class="form-control col-md-7 col-xs-12 " placeholder="Write Here Page Title">
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
          <p>Successfully Added Title</p>
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
                                <th>Title Name</th>
                                <th>Menu</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach( $getTitle as $val){ ?>
                              <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $val['Title_Name'];?></td>
                                <td><?php echo $val['Menu_Name'];?></td>
                                <td><a href="edit.php?id=<?php echo $val['Title_Id'];?>" class="btn btn-warning btn-sm">Edit</a> <a href="#" id="<?php echo $val['Title_Id'];?>" class="btn btn-danger btn-sm delete"> Delete</a></td>
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
