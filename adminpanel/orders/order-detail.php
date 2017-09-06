<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');

$ono = $_GET['ono'];

$res = $db->ExecuteQuery("SELECT DATE_FORMAT(Order_Date,'%d-%b-%Y (%h:%m:%i)') AS Order_Date, Order_No, Order_Amount, User_Name, Shipping_Address, Product_Image, Category_Name 
FROM orders O
INNER JOIN user_registration U ON O.User_Id = u.User_Id
INNER JOIN order_details OD ON O.Order_Id = OD.Order_Id
INNER JOIN product_master P ON OD.Product_Id = P.Product_Id
INNER JOIN categories C ON P.Category_Id = C.Category_Id
WHERE Order_No = ".$ono);
?>

<div>
  <div class="page-title">
    <div class="title_left">
      <h3>Order Detail</h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_title">
       <h2>View Order</h2>
       <ul class="nav navbar-right panel_toolbox">
          <li><button class="btn btn-round btn-success" onclick="location.href='index.php';">List of Orders</button></li>
        </ul>
       <div class="clearfix"></div>
    </div>
    
    <div class="col-sm-4">
    	<strong>Order Date</strong> : <?php echo $res[1]['Order_Date']; ?><br>
        <strong>Order No.</strong> : <?php echo $res[1]['Order_No']; ?><br>
        <strong>Order Amount</strong> : Rs.<?php echo $res[1]['Order_Amount']; ?><br><br>
        <strong>User Name</strong> : <?php echo $res[1]['User_Name']; ?><br>
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
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
