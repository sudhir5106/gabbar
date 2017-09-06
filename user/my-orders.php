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

$res = $db->ExecuteQuery("SELECT DATE_FORMAT(Order_Date,'%d-%b-%Y (%h:%m:%i)') AS Order_Date, Order_No, Order_Amount, User_Name, Shipping_Address, CASE WHEN Payment_Status = 0 THEN 'Pending' ELSE 'Paid' END AS Payment_Status, Pay_Status
FROM orders O
INNER JOIN user_registration U ON O.User_Id = u.User_Id
ORDER BY Order_Date DESC
");

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
                    	
                        <h3>My Orders</h3>
                    	
                        <table class="table table-bordered table-striped table-hover">
                            <tr class="success">
                                <th>Sno.</th>
                                <th>Order Date &amp; Time</th>
                                <th>Order No</th>
                                <th>Order Amount</th>
                                <th>User Name</th>
                                <th>Shipping Address</th>
                                <th>Payment Status</th>
                                <th>Transaction Status</th>
                                <th>Action</th>
                            </tr>
                            <?php 
                            $i=1;
                            foreach($res as $val){ ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $val['Order_Date']; ?></td>
                                <td><a href=""><?php echo $val['Order_No']; ?></a></td>
                                <td><?php echo $val['Order_Amount']; ?></td>
                                <td><?php echo $val['User_Name']; ?></td>                
                                <td><?php echo $val['Shipping_Address']; ?></td>
                                <td class='<?php echo $val['Payment_Status']=='Pending'?'text-danger' : 'text-success'; ?>'><strong><?php echo $val['Payment_Status']; ?></strong></td>
                                <td class='<?php echo $val['Pay_Status']=='failure'?'text-danger' : 'text-success'; ?>'><?php echo $val['Pay_Status']; ?></td>
                                <td><a href="order-detail.php?ono=<?php echo $val['Order_No']; ?>" class="btn btn-sm btn-success">Order Detail</a></td>
                            </tr>
                            <?php $i++;} ?>
                        </table>
                    	
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
