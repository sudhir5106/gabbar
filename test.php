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
						
						?>
    		<!-- Page header Section Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="entry-title"><?php echo $pagename;?></h2>
                    <div class="breadcrumb">
                        <a href="#"><i class="icon-home"></i> Home</a>
                        <span class="crumbs-spacer"><i class=
                        "ico-fast-forward"></i></span> <span class=
                        "current"><?php echo $pagename;?></span>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Page header Section End -->
    <!-- Content Start -->
    <div id="content">
        <?php echo $getPage[1]["Details"]; ?>
    </div>
	<!-- Content End -->
   
<?php 
require_once(PATH_INCLUDE."/footer.php");

?>
