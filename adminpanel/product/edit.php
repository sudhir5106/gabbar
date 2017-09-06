<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_ADMIN_INCLUDE.'/header.php');

//########################################################################################
//########### Get Here Total Product Details #############################################
	 $sql="SELECT O.Login_Id, O.Order_Id,O.Order_No, d.Courier_Id, Courier_Name, DATE_FORMAT(Dispatch_Date,'%d-%m-%y') AS 'Dispatch_Date' , Dispatch_No ,O.Grand_Total,Order_Amount,
	CASE 
		WHEN (Transaction_Id IS NULL && Transaction_Date IS NULL && Pay_Status=0) THEN 'Pending' 		
		WHEN (Transaction_Id IS NOT NULL && Transaction_Date IS NOT NULL && Pay_Status=1) THEN 'Done' 		ELSE 'Cancelled' END 'Payment_Status', O.Shipping_Amount, O.Disc, 
	CASE 
		WHEN Delivery_Status IS NULL THEN 'Pending'
		WHEN Delivery_Status=1 THEN 'Done' 
		ELSE 'Cancelled' END 'Delivery_Status', Additional_Comments, Comments,
CONCAT(ca.Title,' ',ca.First_Name,' ',ca.Last_Name) AS 'PName',
ca.House_No AS 'PHouse_No',ca.Address1 AS 'PAddress1',ca.Address2 AS 'PAddress2',
c.City_Name AS 'PCity_Name',s.State_Name AS 'PState_Name',cm.Country_Name AS 'PCountry_Name',
ca.pin_code AS 'PPin_Code',ca.Mobile_No AS 'PMobile_No',ca.Landline_No AS 'PLandline_No',
CONCAT(csa.Title,' ',csa.First_Name,' ',csa.Last_Name) AS 'Name',csa.House_No,csa.Address1,csa.Address2,
c1.City_Name,s1.State_Name,cm1.Country_Name,csa.pin_code,csa.Mobile_No,csa.Landline_No,Dispatch_Amount,d.Shipping_Amount as 'Dispatch_Shipping_Amount',
d.Grand_Total as 'Dispatch_Grand_Total' 
	FROM order_main O 
LEFT JOIN dispatch_main d ON O.Order_Id=d.Order_Id
LEFT JOIN courier_master RM ON RM.Courier_Id=d.Courier_Id
LEFT JOIN customer_billing_address ca ON O.Login_Id=ca.Login_Id 
LEFT JOIN customer_shipping_address csa ON  O.Shipping_Address_Id=csa.Shipping_Address_Id 
LEFT JOIN city_master c ON ca.City_Id=c.City_Id 
LEFT JOIN state_master s ON c.State_Id=s.State_Id
LEFT JOIN country_master cm ON cm.Country_Id=s.Country_Id 
LEFT JOIN city_master c1 ON csa.City_Id=c1.City_Id 
LEFT JOIN state_master s1 ON c1.State_Id=s1.State_Id
LEFT JOIN country_master cm1 ON cm1.Country_Id=s1.Country_Id
 Where O.Order_Id=".$_REQUEST['id']."";

$res=$db->ExecuteQuery($sql);
if(!$res)
{
	echo mysql_error();	
}

//######################################################################
//############# GEt Here Product Total Qnty ANd Order Details ##########
$res_detail=$db->ExecuteQuery("SELECT od.Product_Id,Image_Path AS 'Product_Image',Product_Name,Reference_Id,Order_Detail_No,
od.Price,od.Qty,CAST(od.Price*od.Qty AS DECIMAL(10,2)) AS 'Amount',Delivered_Qty,Delivered_Status

FROM product_master p LEFT JOIN product_image PI ON PI.Product_Id=p.Product_Id AND Main_Image=1 INNER JOIN order_detail od
ON p.Product_Id=od.Product_Id INNER JOIN order_main o 
ON o.`Order_Id`=od.`Order_Id` 
WHERE o.Order_Id=".$_REQUEST['id']." order by Order_Detail_No");

//##################################################################################
//################ Get Here Courier Name ###########################################
$getCourier=$db->ExecuteQuery("SELECT * FROM courier_master Order By Courier_Name ASC");
?>
<script type="text/javascript"  src="order.js" ></script>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Edit Order Details </h3>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
      <div class="x_title">
        <h2>Edit Form </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li>
            <button class="btn btn-round btn-success" onclick="location.href='list.php';">Back</button>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      <form class="form-horizontal" role="form" id="edit_order" method="post">
        <input type="hidden" id="id" value="<?php echo $_REQUEST['id'];?>" />
        <input type="hidden" id="userid" value="<?php echo $res[1]['Login_Id'];?>" />
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#menu1">Dispatch Details</a></li>
          <li><a data-toggle="tab" href="#menu2">Billing Address</a></li>
          <li><a data-toggle="tab" href="#menu3">Shipping Address</a></li>
          <li><a data-toggle="tab" href="#menu4">Order Details</a></li>
        </ul>
        <div class="tab-content">
          <div id="menu1" class="tab-pane fade in active"> 
            <!-- step-1 starts from here -->
            <div class="col-sm-12"> <br/>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="order_no">Order No. <span>*</span>:</label>
                <div class="col-md-3">
                  <label class="control-label " for="order_no"><?php echo $res[1]['Order_No']?></label>
                </div>
              </div>
              <div class="item form-group clear">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dispatch_ref_no">Courier Name.:</label>
                <div class="col-sm-3">
                  <Select class="form-control input-sm" id="courier" name="courier" >
                    <option value="">Select Courier Name</option>
                    <?php foreach($getCourier as $getVal){?>
                    <option value="<?php echo $getVal['Courier_Id']?>" <?php if($getVal['Courier_Id']==$res[1]['Courier_Id']){ echo "Selected";}?>><?php echo $getVal['Courier_Name']?></option>
                    <?php } ?>
                  </Select>
                </div>
              </div>
              <div class="item form-group clear">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dispatch_ref_no">Dispatch No.:</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control input-sm" id="dispatch_ref_no" name="dispatch_ref_no" placeholder="Enter AWB / Docket / Ref Number" value="<?php echo $res[1]['Dispatch_No']; ?>" />
                </div>
              </div>
              <div class="item form-group clear">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dispatch_date">Dispatch Date:</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control input-sm datepicker" id="dispatch_date" name="dispatch_date" placeholder="DD-MM-YYYY" value="<?php echo $res[1]['Dispatch_Date']; ?>" />
                </div>
              </div>
              <div class="item form-group clear">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Order_amount">Order Amount  :</label>
                <div class="col-sm-3 ">
                  <label class="control-label mandatory" id="order_amount" name="order_amount" value="<?php echo $res[1]['Grand_Total']?>"><?php echo "Rs. ".$res[1]['Grand_Total']; ?></label>
                </div>
              </div>
              <div class="item form-group">
                <label class=" control-label  col-md-3 col-sm-3 col-xs-12" for="delivered_status">Status :</label>
                <div class="col-sm-3">
                  <select class="form-control input-sm " id="delivered_status" name="delivered_status">
                    <option value="NULL" <?php if($res[1]['Delivery_Status']=='Pending' || $res[1]['Delivery_Status']==''){echo 'selected = "selected"';} ?>>Pending</option>
                    <option value="0" <?php if($res[1]['Delivery_Status']=='Cancelled'){echo 'selected = "selected"';} ?>>Cancelled</option>
                    <option value="1" <?php if($res[1]['Delivery_Status']=='Done'){echo 'selected = "selected"';} ?>>Done</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label mandatory" for="payment_status">Payment Status</label>
                <div class="col-sm-3">
                  <select class="form-control" id="payment_status" name="payment_status">
                    <option value="NULL" <?php if($res[1]['Payment_Status']=='Pending'){echo 'selected = "selected"';} ?>>Pending</option>
                    <option value="0" <?php if($res[1]['Payment_Status']=='Cancelled'){echo 'selected = "selected"';} ?>>Cancelled</option>
                    <option value="1" <?php if($res[1]['Payment_Status']=='Done'){echo 'selected = "selected"';} ?>>Done</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="ln_solid"></div>
          </div>
          
          <!-- step-1 ends here ** step-2 starts from here-->
          <div id="menu2" class="tab-pane fade">
            <div class="col-sm-12">
              <div class="form-group">
                <label class="col-sm-2 control-label mandatory" for="personal_address">Personal Address</label>
                <div class="col-sm-10">
                  <label class="col-sm-2 control-label mandatory" id="personal_address" name="personal_address"><?php echo $res[1]['PName']; ?></label>
                </div>
                <div class="col-sm-10 col-sm-offset-2">
                  <label class="col-sm-2 control-label mandatory" id="personal_address" name="personal_address"><?php echo $res[1]['PHouse_No']; ?></label>
                </div>
                <div class="col-sm-10 col-sm-offset-2">
                  <label class="col-sm-2 control-label mandatory" id="personal_address" name="personal_address"><?php echo $res[1]['PAddress1']; ?></label>
                </div>
                <div class="col-sm-10 col-sm-offset-2">
                  <label class="col-sm-2 control-label mandatory" id="personal_address" name="personal_address"><?php echo $res[1]['PAddress2']; ?></label>
                </div>
                <div class="col-sm-10 col-sm-offset-2">
                  <label class="col-sm-2 control-label mandatory" id="personal_address" name="personal_address"><?php echo $res[1]['PPin_Code']; ?></label>
                </div>
                <div class="col-sm-10 col-sm-offset-2">
                  <label class="col-sm-2 control-label mandatory" id="personal_address" name="personal_address"><?php echo $res[1]['PCity_Name'].' , '.$res[1]['PState_Name']; ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label mandatory" for="personal_country">Country</label>
                <div class="col-sm-10">
                  <label class="col-sm-2 control-label mandatory" id="personal_country" name="personal_country"><?php echo $res[1]['PCountry_Name']; ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label mandatory" for="personal_landlineno">Landline No</label>
                <div class="col-sm-10">
                  <label class="col-sm-2 control-label mandatory" id="personal_landlineno" name="personal_landlineno"><?php echo $res[1]['PLandline_No']; ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label mandatory" for="personal_mobileno">Mobile No</label>
                <div class="col-sm-10">
                  <label class="col-sm-2 control-label mandatory" id="personal_mobileno" name="personal_mobileno"><?php echo $res[1]['PMobile_No']; ?></label>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="ln_solid"></div>
            </div>
          </div>
          
          <!-- step-2 ends from here ** step-3 starts from here -->
          <div id="menu3" class="tab-pane fade">
            <div class="col-sm-12">
              <div class="form-group">
                <label class="col-sm-2 control-label mandatory" for="shipping_address">Shipping Address</label>
                <div class="col-sm-10">
                  <label class="col-sm-2 control-label mandatory" id="shipping_address" name="shipping_address"><?php echo $res[1]['Name']; ?></label>
                </div>
                <div class="col-sm-10 col-sm-offset-2">
                  <label class="col-sm-2 control-label mandatory" id="shipping_address" name="shipping_address"><?php echo $res[1]['House_No']; ?></label>
                </div>
                <div class="col-sm-10 col-sm-offset-2">
                  <label class="col-sm-2 control-label mandatory" id="shipping_address" name="shipping_address"><?php echo $res[1]['Address1']; ?></label>
                </div>
                <div class="col-sm-10 col-sm-offset-2">
                  <label class="col-sm-2 control-label mandatory" id="shipping_address" name="shipping_address"><?php echo $res[1]['Address2']; ?></label>
                </div>
                <div class="col-sm-10 col-sm-offset-2">
                  <label class="col-sm-2 control-label mandatory" id="shipping_address" name="shipping_address"><?php echo $res[1]['pin_code']; ?></label>
                </div>
                <div class="col-sm-10 col-sm-offset-2">
                  <label class="col-sm-2 control-label mandatory" id="shipping_address" name="shipping_address"><?php echo $res[1]['City_Name'].' , '.$res[1]['State_Name']; ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label mandatory" for="shipping_country">Country</label>
                <div class="col-sm-10">
                  <label class="col-sm-2 control-label mandatory" id="shipping_country" name="shipping_country"><?php echo $res[1]['Country_Name']; ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label mandatory" for="shipping_landlineno">Landline No</label>
                <div class="col-sm-10">
                  <label class="col-sm-2 control-label mandatory" id="shipping_landlineno" name="shipping_landlineno"><?php echo $res[1]['Landline_No']; ?></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label mandatory" for="shipping_mobileno">Mobile No</label>
                <div class="col-sm-10">
                  <label class="col-sm-2 control-label mandatory" id="shipping_mobileno" name="shipping_mobileno"><?php echo $res[1]['Mobile_No']; ?></label>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="ln_solid"></div>
            </div>
          </div>
          <!-- step-3 ends from here --> 
          
          <!--  step-4 starts from here -->
          <div id="menu4" class="tab-pane fade">
            <div class="col-sm-12"> <br/>
              <table class="table table-hover" id="summary">
                <thead>
                  <tr class="danger">
                    <th>Sl.</th>
                    <th>Image</th>
                    <th>RID</th>
                    <th>Product Title</th>
                    <th>Per Unit Price(Rs.)</th>
                    <th>Ordered Qty</th>
                    <th>Dispatched Qty</th>
                    <th>Availability</th>
                    <th>Amount(Rs.)</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
	$i=1;
	foreach ($res_detail as $val)
	{
		
	?>
                  <tr>
                    <td><?php echo $i.'.'; ?></td>
                    <td><img class="img-thumbnail" src="<?php echo PATH_UPLOAD_IMAGE."/product/thumb/".$val['Product_Image'];?>" width="52" hight="52" /></td>
                    <td><?php echo $val['Reference_Id']; ?></td>
                    <td><?php echo $val['Product_Name']; ?></td>
                    <td><?php echo $val['Price']; ?></td>
                    <td><?php echo $val['Qty']; ?></td>
                    <td id="<?php echo $val['Order_Detail_No']; ?>"><input type="text"  id="qty<?php echo $val['Order_Detail_No']; ?>" value="<?php echo $val['Delivered_Qty']; ?>" /></td>
                    <td><input type="checkbox"  id="status<?php echo $val['Order_Detail_No']; ?>" <?php if ($val['Delivered_Status']==1) echo 'checked' ?> /></td>
                    <td><?php echo $val['Amount']; ?></td>
                  </tr>
                  <?php 
		$i=$i+1;
	} ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="8" align="right">Total Amount (Inc VAT) (Rs) </td>
                    <td><?php echo $res[1]['Order_Amount']; ?></td>
                  </tr>
                  <tr>
                    <td colspan="8" align="right">Shipping Charges (Rs) </td>
                    <td><?php echo $res[1]['Shipping_Amount']; ?></td>
                  </tr>
                  <tr>
                    <td colspan="8" align="right">Total (Inc VAT) (Rs) </td>
                    <td><?php echo $res[1]['Grand_Total']; ?></td>
                  </tr>
                  <?php 
//Items Cancellation & Refunds
if ($res[1]['Dispatch_Amount']!='')
{ ?>
                  <tr>
                    <td colspan="8" align="right">New Total Amount (Inc VAT) (Rs) </td>
                    <td><?php echo $res[1]['Dispatch_Amount']; ?></td>
                  </tr>
                  <tr>
                    <td colspan="8" align="right">New Shipping Charges (Rs) </td>
                    <td><?php echo $res[1]['Dispatch_Shipping_Amount']; ?></td>
                  </tr>
                  <tr>
                    <td colspan="8" align="right">New Total (Inc VAT) (Rs) </td>
                    <td><?php echo $res[1]['Dispatch_Grand_Total']; ?></td>
                  </tr>
                  <?php } ?>
                </tfoot>
              </table>
              <h4>Shipping Details - Additional Comments</h4>
              <textarea class="form-control textarea" rows="3" id="acomment"><?php echo $res[1]['Additional_Comments']; ?></textarea>
              <h4>Comments</h4>
              <textarea class="form-control textarea" rows="3" id="comment"><?php echo $res[1]['Comments']; ?></textarea>
              <br />
            </div>
          </div>
          <!--End Of Step-4--> 
          <!--Update Button Here-->
          <div class="form-group">
            <div class="col-sm-offset-6 col-sm-4">
              <input type="button" class="btn btn-primary" id="submit" value="Update">
              <div id="loading" style="display:none;text-align:center; padding-top:20px;"><img src="<?php echo PATH_IMAGE ?>/loader.gif" alt="" style="width:80px"><br/>
                <strong>Please wait..</strong></div>
            </div>
          </div>
        </div>
        </div>
        </div>
        <input type="hidden" id="loginid" value="<?php echo $res5[1]['Login_Id']; ?>" name="loginid" />
      </form>
    </div>
    <div id="dialog_success" title="Success Message" style="display:none; text-align:left;">
      <p>Your data is successfully update</p>
    </div>
    <div id="dialog_error" title="Error Message" style="display:none; text-align:left;">
      <p>Your data is not submited</p>
    </div>
  </div>
</div>
<?php 
require_once(PATH_ADMIN_INCLUDE.'/footer.php');

?>
