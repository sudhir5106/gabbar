<?php
include('config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/classes/ps_pagination_blogs.php');
$db = new DBConn();

//Get Here Slider 
$getSlider=$db->ExecuteQuery("SELECT  * FROM slider S ORDER BY S.Position ASC");

error_reporting(0);

$con  = mysql_connect(SERVER, DBUSER, DBPASSWORD);
$rows_per_page=ROWS_PER_PAGE;
$totpagelink=PAGELINK_PER_PAGE;
$condition='';

//Get Here Event  List

//GEt Here Post Details
$sql="SELECT *, DATE_FORMAT(Date_Time,'%M %d %Y') AS Postdate FROM blogs WHERE Status=1 ";
$getPost=$db->ExecuteQuery($sql);

if(isset($_REQUEST['page']) && $_REQUEST['page']>1)
		{
			$i=($_REQUEST['page']-1)*$rows_per_page+1;
		}
		else
		{
			$i=1;
		}
		$pager = new PS_Pagination($con,$sql,$rows_per_page,$totpagelink);
		$rs=$pager->paginate();
?>
				<form name="planresult" id="planresult">
 
                    <!-- Blog Article Start-->
                    <?php 
					 if(empty($rs)==false)
					{
					while($val=mysql_fetch_array($rs)){ ?>
     				 <article>
                        <!-- Blog item Start -->
                        <div class="blog-item-wrap">
                            <!-- Post Format icon Start -->
                            <div class="post-format">
                                <span><i class="fa fa-camera"></i></span>
                            </div><!-- Post Format icon End -->
                            <h2 class="blog-title"><a href=
                            "single.html"><?php echo $val['Title']?></a></h2><!-- Entry Meta Start-->
                            <div class="entry-meta">
                                <span class="meta-part"><i class=
                                "ico-user"></i> <a href="#">Website Owner</a></span> <span class=
                                "meta-part"><i class=
                                "ico-calendar-alt-fill"></i> <a href=
                                "#"><?php echo $val['Postdate'];?></a>
                            </div><!-- Entry Meta End-->
                            <!-- Feature inner Start -->
                            <div class="feature-inner">
                                <a data-lightbox="roadtrip" href=
                                "<?php echo PATH_UPLOAD_IMAGE.'/blogs/'.$val['Image_Path']?>"><img alt="" src="<?php echo PATH_UPLOAD_IMAGE.'/blogs/'.$val['Image_Path']?>"></a>
                            </div><!-- Feature inner End -->
                            <!-- Post Content Start -->
                            <div class="post-content">
                               <?php echo substr($val['Description'],0,500);?>
                            </div><!-- Post Content End -->
                            <div class="entry-more">
                                <div class="pull-left">
                                    <a class="btn btn-common" href=
                                    "<?php echo LINK_ROOT.'view-more.php'.base64_encode($val['Blogs_Id'])?>">Read More <i class=
                                    "ico-arrow-right"></i></a>
                                </div>
                                <div class="share-icon pull-right">
                                    <span class="socialShare"></span>
                                </div>
                            </div>
                        </div><!-- Blog item End -->
                    </article><!-- Blog Article End-->
                   <?php } } ?>
                      
 		<div class="text-center">
     		 <?php echo $pager->renderFullNav() ?>
     	</div> 
        <input type="hidden" name="page" id="page" value="1"/>
       
               </form>