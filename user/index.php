<?php 
include('../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/classes/ps_pagination_blogs.php');
$db = new DBConn();
error_reporting(0);

//Check Here If User is authorised or not
if(empty($_SESSION['userId']))
{?>
	<script>
        window.location.href = '<?php echo '../index.php'; ?>';
    </script>
<?php } 

require_once(PATH_INCLUDE.'/header.php');
//Get User Info 
$getUserInfo=$db->ExecuteQuery("SELECT User_Name, User_Email, User_Mobile, User_Password, User_Address FROM user_registration");

?>

<link href="<?php PATH_CSS_LIBRARIES?>/home.css" type="text/css" />
<style>
	.userleftmenu{background:#EFEFEF; padding:20px 15px;}
	.userleftmenu li{margin-bottom:10px;}
	.userInfo{margin-top:30px;}
	.userInfo div{margin-bottom:15px;}
</style>
	
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="entry-title">My Account</h2>
                    <div class="breadcrumb">
                        <a href="index.php"><i class="icon-home"></i> Home</a>
                        <span class="crumbs-spacer"><i class=
                        "ico-fast-forward"></i></span> <span class=
                        "current">My Profile</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Content Start -->
    <div id="content">
    	<div class="container">
        	<article class="single-post-content">
                <div class="contentTxt">        
                    <div class="col-sm-3">
                        <?php include('userleftmenu.php'); ?>
                    </div>
                    <div class="col-sm-9">
                    	
                        <h3>My Profile</h3>
                    	
                        <div class="userInfo">
                        	<div class="col-sm-3">Name</div>
                            <div class="col-sm-9">: <?php echo $getUserInfo[1]['User_Name'] ?></div>
                            
                            <div class="col-sm-3">Mobile</div>
                            <div class="col-sm-9">: <?php echo $getUserInfo[1]['User_Mobile'] ?></div>
                            
                            <div class="col-sm-3">Address</div>
                            <div class="col-sm-9">: <?php echo $getUserInfo[1]['User_Address'] ?></div>
                            
                            <div class="col-sm-3">Email</div>
                            <div class="col-sm-9">: <?php echo $getUserInfo[1]['User_Email'] ?></div>
                            
                            <div class="col-sm-3">Password</div>
                            <div class="col-sm-9">: <?php echo $getUserInfo[1]['User_Password'] ?></div>
                        </div>
                    	
                    </div>
                    <div class="clearfix"></div>
                </div>
            </article>
        </div>
    </div><!-- Content End -->
  

<?php 

require_once(PATH_LIBRARIES.'/classes/tracker.php');
require_once(PATH_INCLUDE.'/footer.php');

?>
