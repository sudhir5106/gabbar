<?php 
						include("config.php");
						require_once(PATH_LIBRARIES."/classes/DBConn.php");
						$db = new DBConn();
						require_once(PATH_INCLUDE."/header.php");
						
						foreach($getMenu as $val2){
							if(basename(__FILE__)==$val2["File_Name"]){  $pagename=$val2["Menu_Name"]; $menu=$val2["Menu_Id"]; }
						}
						
						//get Here Page Details
						$getPage=$db->ExecuteQuery("SELECT * FROM pages WHERE Menu_Id=$menu");
						
						//Get Gallery Image HEre
						$getGallery=$db->ExecuteQuery("SELECT * FROM gallery_image ORDER BY Position ASC")
						?>

                        </script>
<!-- Page header Section Start -->

<div class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="entry-title"><?php echo $pagename;?></h2>
        <div class="breadcrumb"> <a href="index.php"><i class="icon-home"></i> Home</a> <span class="crumbs-spacer"><i class="ico-fast-forward"></i></span> <span class="current"><?php echo $pagename;?></span> </div>
      </div>
    </div>
  </div>
</div>
<!-- Page header Section End --> 
<!-- Content Start -->
<div id="content">
  <div class="container">
    <div class="row">
      <div class="list-group gallery middleTxt">
        <?php foreach($getGallery as $value){ ?>
        <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'><a class="thumbnail fancybox" rel="ligthbox" href="<?php echo PATH_UPLOAD_IMAGE.'/gallery/'.$value['Image'];?>">
            <div style="overflow:hidden; height:150px;">
        		<img class="img-responsive" alt="" src="<?php echo PATH_UPLOAD_IMAGE.'/gallery/thumb/'.$value['Image'];?>" />
            </div>
          <div class='text-center' style="padding:5px 0;"> <small class='text-muted'><?php echo $value['Title'];?></small> </div>
          <!-- text-right / end --> 
          </a></div>
        <!-- col-6 / end -->
        <?php } ?>
        <div class="clearfix"></div>
      </div>
      <!-- list-group / end --> 
    </div>
    <!-- row / end --> 
  </div>
  <!-- container / end --> 
  <?php echo $getPage[1]["Details"]; ?> </div>
<!-- Content End -->

<?php 
require_once(PATH_INCLUDE."/footer.php");

?>
