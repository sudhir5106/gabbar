<?php 
include('../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');


$res = $db->ExecuteQuery("SELECT DATE_FORMAT(Order_Date,'%d-%b-%Y (%h:%m:%i)') AS Order_Date, Order_No, Order_Amount, User_Name, Shipping_Address, CASE WHEN Payment_Status = 0 THEN 'Pending' ELSE 'Paid' END AS Payment_Status, Pay_Status
FROM orders O
INNER JOIN user_registration U ON O.User_Id = u.User_Id
ORDER BY Order_Date DESC LIMIT 10
");


?>
<div>
  <div class="page-title">
    <div class="title_left">
      <h3>Dashboard</h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_title">
       <h2>View Lastest Orders</h2>
       <div class="clearfix"></div>
    </div>
    
    <div>
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
    
    <div id="deletemsg" title="Message" style="display:none; text-align:left;">
      <p>You can not delete </p>
    </div>
  </div>
</div>

<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
