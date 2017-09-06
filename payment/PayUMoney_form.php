<?php
include('../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_INCLUDE.'/header.php');
$getid=$_REQUEST['id'];		

//GEt Here Payment Gateway Details
$paymentGateway=$db->ExecuteQuery("SELECT * FROM `payment_gateway_detail` WHERE `Status`=1");	
		
		$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
		mysql_query('SET AUTOCOMMIT=0',$con);
		mysql_query('START TRANSACTION',$con);
 		try
		{
		
		//Exlode Here Product Order Id 
		$Id = explode('-',base64_decode($getid));		
		
		//Get Here product Order Details
			
		$sql = "SELECT Order_Id, Order_No, DATE_FORMAT(Order_Date,'%d-%m-%Y %h:%i %p') AS Order_Date, Order_Amount, Shipping_Address, O.User_Id, Name, Email, Mobile_No, Address FROM orders O
		
		INNER JOIN shipping_address SP ON O.User_Id = SP.User_Id		
		WHERE O.User_Id =".$_SESSION['userId'];
		
		$getDetails=$db->ExecuteQuery($sql);
			
		mysql_query("COMMIT",$con);
	   }
			catch(Exception $e)
		{
			echo  $e->getMessage();
			mysql_query('ROLLBACK',$con);
			mysql_query('SET AUTOCOMMIT=1',$con);
			
		}
		
		mysql_close($con);
///********************* pay U Money Code ****************************///

$MERCHANT_KEY = $paymentGateway[1]['Merchant_Key']; 

$SALT =  $paymentGateway[1]['Salt_Key'];

// End point - change to https://secure.payu.in for LIVE mode
//$PAYU_BASE_URL = "https://test.payu.in"; //for test 
$PAYU_BASE_URL = "https://secure.payu.in"; // for bookmymoment

$action = '';

$posted = array();
if(!empty($_POST)) {
  //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;
$txnid=$getid;
$hash = '';

// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
// $hashSequence = "key|txnid|amount|productinfo|firstname|email|||||||||||salt ";
//echo $posted['key']."##".$posted['txnid']."##".$posted['amount']."##".$posted['productinfo']."##".$posted['firstname']."##".$posted['email']."##".$posted['phone']."##".$posted['surl']."##".$posted['furl']."##".$posted['service_provider'];

if(empty($posted['hash']) && sizeof($posted) > 0) {
	
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone']) 
		  || empty($posted['productinfo'])         
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) 
  {

    $formError = 1;
  }//eof if condition 
  else {
	  
	//echo "else";
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';		
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;
	

    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';	
  }
} elseif(!empty($posted['hash'])) {
	//echo "elseif";
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();	  
    }
</script>

<!-- Page header Section Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="entry-title">Payment</h2>
                <div class="breadcrumb">
                    <a href="index.php"><i class="icon-home"></i> Home</a>
                    <span class="crumbs-spacer"><i class=
                    "ico-fast-forward"></i></span> <span class=
                    "current">Payment</span>
                </div>
            </div>
        </div>
    </div>
</div><!-- Page header Section End -->

<div id="content">
    <div class="container">
        <article class="single-post-content">
			
            <section id="form">
                <!--form-->
                <div class="container">
                    <div class="row">
                    
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="content-wrapper">
                              <section class="content-header">
                                <h3> Pay </h3>
                              </section>
                              <div class="content">
                                <?php if($formError) { ?>
                                <span style="color:red; margin-bottom:20px; margin-top:20px;">Please fill all mandatory fields.</span>
                                <?php } 
                                 
                              
                                ?>
                                <div class="row">
                                  <div>
                                    <div class="box box-primary">
                                      <div class="box-header with-border">
                                        <h3 class="box-title"> </h3>
                                      </div>
                                      <div class="box-body">
                                        <form action="<?php echo $action; ?>" method="post" name="payuForm">
                                          <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
                                          <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
                                          <input type="hidden" name="txnid" value="<?php echo $txnid?>" />
                                          <?php  //$surl=PATH_USER_LINK.'/payment/payment-success.php';
                                              /* $furl='http://'.$_SERVER['SERVER_NAME'].LINK_ROOT.'/payment/payment-success.php';
                                               $surl='http://'.$_SERVER['SERVER_NAME'].LINK_ROOT.'/payment/payment-failure.php';
                                               */
                                               $surl='http://'.$_SERVER['SERVER_NAME'].LINK_ROOT.'/payment/payment-success.php';
                                               $furl='http://'.$_SERVER['SERVER_NAME'].LINK_ROOT.'/payment/payment-failure.php';
                                              
                                        // $furl=PATH_USER_LINK.'/payment/payment-failure.php';
                                        
                                  ?>
                                          <div class="col-md-9 col-md-offset-1">
                                            <div class="table-responsive">
                                              <table class="table table-bordered">
                                                <tbody  style="display:none">
                                                  <tr>
                                                    <td><b>Mandatory Parameters</b></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Amount: </td>
                                                    <td><input type="text" name="amount" value="<?php echo (empty($getDetails[1]['Order_Amount'])) ? '' :$getDetails[1]['Order_Amount']?>" /></td>
                                                    <td>Name: </td>
                                                    <td><input type="text" name="firstname" id="firstname" value="<?php echo (empty($getDetails[1]['Name']))? '' : $getDetails[1]['Name']; ; ?>" /></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Email: </td>
                                                    <td><input type="text" name="email" id="email" value="<?php echo (empty($getDetails[1]['Email'])) ? '' : $getDetails[1]['Email']; ?>" /></td>
                                                    <td>Phone: </td>
                                                    <td><input type="text" name="phone" value="<?php echo (empty($getDetails[1]['Mobile_No'])) ? '' : $getDetails[1]['Mobile_No']; ?>" /></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Product Info: </td>
                                                    <td colspan="3"><textarea name="productinfo"><?php echo 'Total Amount : '.$getDetails[1]['Order_Amount'].'<br>Shipping Charge :0'?></textarea></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Success URI: </td>
                                                    <td colspan="3"><input  type="text" name="surl" value="<?php echo (empty($surl)) ? '' : $surl ?>" size="64" /></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Failure URI: </td>
                                                    <td colspan="3"><input type="text" name="furl" value="<?php echo (empty($furl)) ? '' : $furl ?>" size="64" /></td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="3"><input  type="hidden"  name="service_provider" value="payu_paisa" size="64" /></td>
                                                  </tr>
                                                </tbody>
                                                
                                                <!---------------------------------------------------------------------------------------------
                                                                        for display order ----------------------------------------------------------------------------------------------->
                                                
                                                <tr>
                                                  <td class="active"><strong>Payment Method :</strong></td>
                                                  <td><?php echo 'Online' ?></td>
                                                </tr>
                                                <tr>
                                                  <td class="active"><strong>Payment Gateway :</strong></td>
                                                  <td><?php echo 'Pay U Money' ?></td>
                                                </tr>
                                                <tr>
                                                  <td class="active"><strong>Total Amount:</strong></td>
                                                  <td><i class="fa fa-inr"></i> <?php echo (empty($getDetails[1]['Order_Amount'])) ? '' : $getDetails[1]['Order_Amount']; ?></td>
                                                </tr>
                                                <tr>
                                                  <td class="active"><strong>Order Date:</strong></td>
                                                  <td><?php echo (empty($getDetails[1]['Order_Date'])) ? '' : $getDetails[1]['Order_Date']; ?></td>
                                                </tr>
                                                <tr>
                                                  <?php if(!$hash) { ?>
                                                  <td colspan="4" align="center"><input type="submit"  class="btn btn-lg btn-success" value="Pay by Net Banking/ Credit Card/ Debit Card " /></td>
                                                  <?php } ?>
                                                </tr>
                                              </table>
                                            </div>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        <!--middile containar start here-->
                        </div>
                    </div>
                </div>
                </section>            
                    
        </article>
    </div>
</div>

<?php include(PATH_INCLUDE.'/footer.php');?>

