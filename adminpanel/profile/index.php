<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');

?>
<script src="profile.js"></script>
<!-- page content -->

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Admin Profile</h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>View </h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
            <div class="profile_img">
              <div class="box-header with-border">
                <h4 class="box-title">Profile Image</h4>
              </div>
              <div id="crop-avatar"> 
                <!-- Current avatar --> 
                <a href="#" data-toggle="modal" data-target="#imageShow" >
                  <?php if($getPer[1]['Profile_Image']!='' && $getPer[1]['Profile_Image']!=0 && file_exists(ROOT."/image_upload/profile/thumb/".$getPer[1]['Profile_Image']) ){?>
                     <div class="avatar-view" title="Change the avatar" style="width:100%;height:100%">
                     	<img src="<?php echo PATH_UPLOAD_IMAGE.'/profile/thumb/'.$getPer[1]['Profile_Image'] ?>" style="width:100%"/> 
                       </div>
					<?php }else{ ?>
                    <div class="avatar-view" title="Change the avatar">
                    	<img src="<?php echo PATH_IMAGE?>/img.jpg" style="width:100%"/> </div>
                    <?php } ?>
                
                </a> </div>
              
              <!-- Modal -->
              <div class="modal fade" id="imageShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                      <h4 class="modal-title" id="myModalLabel">Full Profile Image</h4>
                    </div>
                    <?php if($getPer[1]['Profile_Image']!='' && $getPer[1]['Profile_Image']!=0 && file_exists(ROOT."/image_upload/profile/".$getPer[1]['Profile_Image']) ){?>
                    <div class="modal-body"><img src="<?php echo PATH_UPLOAD_IMAGE.'/profile/'.$getPer[1]['Profile_Image'] ?>" style="width:100%"/> </div>
					<?php }else{ ?>
                    <div class="modal-body"><img src="<?php echo PATH_IMAGE?>/img.jpg" style="width:100%"/> </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <!-- end of image cropping --> 
              
            </div>
            <div class="box-footer clearfix"> <a href="#" class="btn btn-sm btn-info btn-flat pull-left" data-toggle="modal" data-target="#editImage"><i class="fa fa-edit m-right-xs"></i> Edit Image</a> </div>
            <!--Image Edit-->
            <div class="modal fade" id="editImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    <h4 class="modal-title" id="myModalLabel">Change Profile Image</h4>
                  </div>
                  <div class="modal-body">
                    <form id="myImage" name="myImage" method="post"  action="" enctype="multipart/form-data">
                      <input type="file" id="profileimage" name="profileimage" class="form-control input-sm" />
                      <br/>
                      <button type="button" class="btn btn-primary" id="updateImage" name="updateImage">Upload</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!--End Image Edit--> 
            
          </div>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <form id="form1" name="form1" method="post"  action="">
              <div class="box-header with-border">
                <h4 class="box-title">Personal Details</h4>
              </div>
              <div class="table-responsive">
                <table class="table no-margin">
                  <tbody>
                    <tr>
                      <td class="gray-bg align_right"> Login Id </td>
                      <td><?php echo  ucfirst($getPer[1]['Login_Name']); ?></td>
                    </tr>
                    <tr>
                      <td class="gray-bg align_right"> Admin Name </td>
                      <td><?php echo  ucfirst($getPer[1]['User_Name']); ?></td>
                    </tr>
                    <tr>
                      <td class="gray-bg align_right">Email Id</td>
                      <td><?php echo $getPer[1]['Email']; ?></td>
                    </tr>
                    <tr>
                      <td class="gray-bg align_right">Mobile</td>
                      <td><?php echo $getPer[1]['Mobile_No']; ?></td>
                    </tr>
                    <tr>
                      <td class="gray-bg align_right">Position</td>
                      <td><?php echo $getPer[1]['Job_Title']; ?></td>
                    </tr>
                    <tr>
                      <td class="gray-bg align_right">Website</td>
                      <td><?php echo $getPer[1]['Website']; ?></td>
                    </tr>
                    <tr>
                      <td class="gray-bg align_right">Location</td>
                      <td><?php echo $getPer[1]['Address']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
              <!-- /.box-body -->
              <div class="box-footer clearfix"> <a href="<?php echo LINK_CONTROL.'/profile/editprofile.php'?>" class="btn btn-sm btn-info btn-flat pull-left"><i class="fa fa-edit m-right-xs"></i> Edit Profile</a> </div>
            </form>
             
        <div id="dialog_success" title="Message" style="display:none; text-align:left;">
          <p>Profile Image Successfully Updated</p>
        </div>
        <div id="dialog_error" title="Message" style="display:none; text-align:left;">
          <p>Something is Wrong </p>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include(PATH_ADMIN_INCLUDE.'/footer.php')?>
