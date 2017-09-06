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

$ono = $_GET['ono'];

$res = $db->ExecuteQuery("SELECT DATE_FORMAT(Order_Date,'%d-%b-%Y (%h:%m:%i)') AS Order_Date, Order_No, Order_Amount, User_Name, Shipping_Address, Product_Image, Category_Name 
FROM orders O
INNER JOIN user_registration U ON O.User_Id = u.User_Id
INNER JOIN order_details OD ON O.Order_Id = OD.Order_Id
INNER JOIN product_master P ON OD.Product_Id = P.Product_Id
INNER JOIN categories C ON P.Category_Id = C.Category_Id
WHERE Order_No = ".$ono);
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
                        "current">My Orders</span>
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
                    	
                        <h3>Order Detail</h3>
    
                        <div class="col-sm-4">
                            <strong>Order Date</strong> : <?php echo $res[1]['Order_Date']; ?><br>
                            <strong>Order No.</strong> : <?php echo $res[1]['Order_No']; ?><br>
                            <strong>Order Amount</strong> : Rs.<?php echo $res[1]['Order_Amount']; ?><br><br>
                            <strong>Name</strong> : <?php echo $res[1]['User_Name']; ?><br>
                            <strong>Shipping Address</strong> : <?php echo $res[1]['Shipping_Address']; ?>
                        </div>
                        <div class="clearfix"></div>
                        <div style="margin-top:30px;">
                            <h2>List of Ordered Items</h2>
                            <table class="table table-bordered">
                                <tr class="info">
                                    <th>Sno.</th>
                                    <th>Item Image</th>
                                    <th>Category</th>
                                </tr>
                                <?php 
                                $i=1;
                                foreach($res as $val){ ?>
                                <tr>
                                    <td width="30"><?php echo $i; ?></td>
                                    <td width="60"><img width="60" src="<?php echo PATH_UPLOAD_IMAGE.'/product/thumb/'.$val['Product_Image']; ?>" alt=""></td>
                                    <td><?php echo $val['Category_Name']; ?></td>
                                </tr>
                                <?php $i++; } ?>
                            </table>
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