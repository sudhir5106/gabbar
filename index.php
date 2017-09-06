<?php 
include('config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/classes/ps_pagination_blogs.php');
$db = new DBConn();
error_reporting(0);
require_once(PATH_INCLUDE.'/header.php');
//Get Here Slider 
$getSlider=$db->ExecuteQuery("SELECT  * FROM slider S ORDER BY S.Position ASC");
	
//Get Here Page Details
$getPage=$db->ExecuteQuery("SELECT * FROM pages WHERE Menu_Id=1");	

//Get Here Gallery Image HEre
$getGallery=$db->ExecuteQuery("SELECT * FROM gallery_image ORDER BY Id DESC");

//Get Package
$getPackages=$db->ExecuteQuery("SELECT Package_Id, Package_Name, Old_Price, New_Price, Image FROM packages ORDER BY Package_Id DESC");

?>

<link href="<?php PATH_CSS_LIBRARIES?>/home.css" type="text/css" />
   <div class="slidesblock">
   
   		<div id="myCarousel" class="carousel slide" data-ride="carousel">  

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <?php $i=1; 
            foreach($getSlider as $value){
            ?>
            <div class="item <?php if($i===1){echo "active";} ?>">
                <a href="#"><img alt="" src="<?php echo PATH_UPLOAD_IMAGE.'/slider/'.$value['Image'];?>"></a>
                <div class="carousel-caption">
                    <h1><?php echo $value['Title']?></h1>
                    <h2><?php echo $value['Description'];?></h2>
                </div>
            </div>
            <?php 
            $i++;
            } ?>
          </div>
        
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
   </div>
    
    <div class="homeMiddle">
    	<!-- Content Start -->
        <div id="content">
            <div class="contentTxt product-grid">
            
            	<?php foreach($getPackages as $PkgVal){ ?>
            	<div class="col-sm-3 package-grid">
                	<div style="border:solid 1px #E4E4E4; padding:10px;">
                    	<figure>
                            <div class="pkgImg"><a href="package-items.php?pkgid=<?php echo $PkgVal['Package_Id'] ?>"><img src="image_upload/package/thumb/<?php echo $PkgVal['Image']; ?>" alt="" ></a></div>
                            <figcaption>
                                <div>
                                    <?php 
                                        echo '<p class="pkgprice"><span style="font-size:.8em; color:#666;"><strike>Rs. '.$PkgVal['Old_Price'].'</strike></span><br>Rs.'.$PkgVal['New_Price'].'</p>'.
                                        $PkgVal['Package_Name'].'<br><br>';
                                     ?>
                                     <a href="package-items.php?pkgid=<?php echo $PkgVal['Package_Id'] ?>" class="btn btn-success btn-sm buybtn">BUY</a>
                                 </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
        </div><!-- Content End -->
    </div>
  

<style>
#carousel-example-generic
{
 background: #FFF;
 padding:10px;
 margin-bottom:20px;
}
.col-item
{
    border: 1px solid #E1E1E1;
    border-radius: 5px;
    background: #FFF;
}


.col-item .info
{
    padding: 10px;
    border-radius: 0 0 5px 5px;
    margin-top: 1px;
}

.col-item:hover .info {
    background-color: #F5F5DC;
}

.col-item .separator
{
    border-top: 1px solid #E1E1E1;
}

.clear-left
{
    clear: left;
}

.col-item .separator p
{
    line-height: 20px;
    margin-bottom: 0;
    margin-top: 10px;
    text-align: center;
}

.col-item .separator p i
{
    margin-right: 5px;
}
.col-item .btn-add
{
    width: 50%;
    float: left;
}

.col-item .btn-add
{
    border-right: 1px solid #E1E1E1;
}

.col-item .btn-details
{
    width: 50%;
    float: left;
    padding-left: 10px;
}
.controls
{
    margin-top: 20px;
}
[data-slide="prev"]
{
    margin-right: 10px;
}

</style> 
  

<?php 

require_once(PATH_LIBRARIES.'/classes/tracker.php');
require_once(PATH_INCLUDE.'/footer.php');

?>
