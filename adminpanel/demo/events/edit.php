<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_ADMIN_INCLUDE.'/header.php');
$db = new DBConn();

//GEt Here Event List For Edit
$getEdit=$db->ExecuteQuery("SELECT * FROM events WHERE Event_Id='".$_REQUEST['id']."'");
?>
<script type="text/javascript" src="event.js"></script>
<link href="<?php echo PATH_TINYMCE?>/tinymce.css" />
<link href="<?php echo PATH_TINYMCE?>/codepen.min.css" />
<script src="<?php echo PATH_TINYMCE?>/tinymce.min.js"></script>
<script src="<?php echo PATH_TINYMCE?>/tinymce_text_format.js"></script>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Events</h3>
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
              <button class="btn btn-round btn-success" onclick="location.href='list.php';">View List</button>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <form class="form-horizontal form-label-left" action="" method="post" id="addform">
          <input type="hidden" id="id" value="<?php echo $getEdit[1]['Event_Id']?>">
          <div class="col-sm-12">
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Event Title <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="title" name="title" required="required" class="form-control col-md-7 col-xs-12 " placeholder="Event Title Write Here..." value="<?php echo $getEdit[1]['Title']?>">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imageupload">Events Image <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="imageupload2" name="imageupload2" class="form-control col-md-7 col-xs-12 " accept="image/jpg,image/png,image/jpeg,image/gif" multiple/>
                <span id="errmsg"></span> </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12 " for="start_date">Start Date <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="start_date" name="start_date" required="required" class="form-control col-md-7 col-xs-12 datepicker" placeholder="15-06-2016" value="<?php echo $getEdit[1]['Start_Date']?>">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="end_date">End Date <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="end_date" name="end_date" required="required" class="form-control col-md-7 col-xs-12 datepicker" placeholder="15-07-2016"  value="<?php echo $getEdit[1]['End_Date']?>">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12 " for="start_time"> Time <span class="required">*</span> </label>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <input type="text" id="start_time" name="start_time" required="required" class="form-control col-md-6 col-xs-10 timepicker" placeholder="13:00"  value="<?php echo $getEdit[1]['Start_Time']?>">
                (24 houres format) </div>
              <div class="col-md-1 col-sm-3 col-xs-12 text-center"> TO</div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <input type="text" id="end_time" name="end_time" required="required" class="form-control col-md-6 col-xs-12 timepicker" placeholder="14:00"  value="<?php echo $getEdit[1]['End_Time']?>">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Discription <span class="required">*</span> </label>
              <div class="col-md-9 col-sm-6 col-xs-12">
                <textarea id="desc" name="desc" required="required" class="form-control col-md-7 col-xs-12 "  rows="7" cols="10" placeholder="Write Here Something..."> <?php echo $getEdit[1]['Description']?></textarea>
                <span id="errmsg"></span> </div>
            </div>
          </div>
          </div>
          <div class="clearfix"></div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3"> 
              <!-- <button type="submit" class="btn btn-primary">Cancel</button>-->
              <button id="update" type="button" class="btn btn-success" name="update">Update</button>
            </div>
            <div id="loading" class="col-md-6 col-md-offset-5" style="display:none;" align="center">
            <img src="<?php echo PATH_IMAGE?>/loader.gif" style="width:30px" />
            </div>
          </div>
        </form>
        <?php
			//*****************************************************
			// Image Showing
			//*****************************************************
			if(isset($_REQUEST['id']))
			{
				$id=trim($_REQUEST['id']);
				////////Get Gallery Image
			$gallery_list=$db->ExecuteQuery("SELECT * FROM event_image WHERE Event_Id='".$id."'");
			
			if(count($gallery_list)>0)
			{	
	?>
        <div class="form-group">
          <div class="col-sm-12">
            <input title="Select All" type="checkbox" id="selecctallgallery"/>
            <button title="Delete" type="button" class="btn btn-danger btn-sm " id="deletegalleryimage" name="deletegalleryimage"> <span class="glyphicon glyphicon-trash"></span> Delete All</button>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <?php 
                     $i=1;
                      foreach($gallery_list as $value){ 
                       ?>
            <div class="col-sm-3 bg-success imgBlck">
              <div>
                <input title="Set As Base Image" type="radio" class="select mainimage" name="mainimage"  value="<?php echo $value['Event_Image_Id'];?>" <?php if($value['Main_Image']==1){ echo "checked ";}?> />
                Base Image </div>
              <div class="galleryImg"><img width="80px" height="60px" src="<?php echo PATH_UPLOAD_IMAGE."/event/thumb/".$value['Image_Path'];?>" alt="" /></div>
              <div> </div>
              <div>
                <?php if($value['Main_Image']!=1){?>
                <input type="checkbox" class="deletegallery" id="<?php echo $value['Event_Image_Id'];?>"/>
                <?php } ?>
                <!--<button type="button" class="btn btn-danger btn-sm delete" id="<?php echo $value['Id']; ?>" name="delete"> <span class="glyphicon glyphicon-trash"></span></button>--> 
              </div>
            </div>
            <?php $i++;}
                      ?>
          </div>
          <?php } }?>
        </div>
        <div id="dialog1" title="Message" style="display:none; text-align:left;">
          <p>Successfully Added </p>
        </div>
        <div id="dialog2" title="Message" style="display:none; text-align:left;">
          <p>Something is Wrong </p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
