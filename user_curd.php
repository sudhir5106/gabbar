<?php
include('config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

///////////////////////////////
// code for user registration
///////////////////////////////
if($_POST['type']=='register'){

	//Data insertion into DB
	$tblfield=array('User_Name','User_Email','User_Mobile','User_Password');
	$tblvalues=array($_POST['username'],$_POST['useremail'],$_POST['mobile'],$_POST['pass']);
	$res=$db->valInsert("user_registration",$tblfield,$tblvalues);
	
	if($res){
		echo 1;	
	}
	else 0;
	
}

///////////////////////////////
// code for user registration
///////////////////////////////
if($_POST['type']=='login'){
	
	$res=$db->ExecuteQuery("SELECT User_Id FROM user_registration WHERE User_Email='".$_POST['email']."' AND User_Password='".$_POST['userpass']."'");
	
	if($res){	
					
		// Set session variables
		$_SESSION["userId"] = $res[1]['User_Id'];
		
		echo 1;
	}
	else {
		echo 0;
	}
	
}

///////////////////////////////
// code for signout
///////////////////////////////
if($_POST['type']=='signout'){
	
	session_destroy(); 
	echo 1;

}

///////////////////////////////
// code for shipping address
///////////////////////////////
if($_POST['type']=='shippingAddress'){

	//check user exist or not in shipping table
	$checkUser = $db->ExecuteQuery("SELECT User_Id FROM shipping_address WHERE User_Id=".$_POST['useruid']);
	
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
		mysql_query('SET AUTOCOMMIT=0',$con);
		mysql_query('START TRANSACTION',$con);
 		try
		{
	
			//echo "SELECT User_Id FROM shipping_address WHERE User_Id=".$_POST['useruid'];
			
			if(!$checkUser){
				//Data insertion into DB
				$tblfield=array('Name','Email','Mobile_No','Address','User_Id');
				$tblvalues=array($_POST['uname'],$_POST['uemail'],$_POST['umobile'],$_POST['uShipAddress'],$_POST['useruid']);
				$result=$db->valInsert("shipping_address",$tblfield,$tblvalues);
			}
			else{
				//Data Update if already exist
				$tblname="shipping_address";
				$tblfield=array('Name','Email','Mobile_No','Address');
				$tblvalues=array($_POST['uname'], $_POST['uemail'], $_POST['umobile'], $_POST['uShipAddress']);
				$condition="User_Id=".$_POST['useruid'];
				$result=$db->updateValue($tblname,$tblfield,$tblvalues,$condition);
				
			}
			
			if (!$result) 
			{
				throw new Exception('0');
			}
			
			$orderno = rand(100000,999999);
			$date = date('Y-m-d H:i:s');
			
			//Data insertion into orders
			$tblfield=array('Order_No','Order_Date','Order_Amount','Shipping_Address','User_Id');
			$tblvalues=array($orderno, $date,$_POST['pkgAmt'],$_POST['uShipAddress'],$_POST['useruid']);
			$result=$db->valInsert("orders",$tblfield,$tblvalues);
			
			/*$res=mysql_query("INSERT INTO orders(Order_No,Order_Date,Order_Amount,Shipping_Address,User_Id) 
			VALUES($orderno, Now(), $_POST['umobile'],$_POST['uShipAddress'],$_POST['useruid'] )");*/
			
			if (!$result) 
			{
				throw new Exception('0');
			}
			
			$orderId = mysql_insert_id();
			
			$proIds = $_POST['proIds'];
			$productIds = explode(',',$proIds);
			
			//$i = 0;			
			foreach($productIds as $productIdsVal){
				//Data insertion into orders
				$tblfield=array('Order_Id','Product_Id');
				$tblvalues=array($orderId, $productIdsVal);
				$result=$db->valInsert("order_details",$tblfield,$tblvalues);
				//$i++;
			}
			
			if (!$result) 
			{
				throw new Exception('0');
			}
			
			
			$result=base64_encode($orderId.'-'.$_SESSION['userId'].'-'.date('d/m/Y'));
			
			mysql_query("COMMIT",$con);
			echo $result;
	
		}
		catch(Exception $e)
		{
			echo  $e->getMessage();
			mysql_query('ROLLBACK',$con);
			mysql_query('SET AUTOCOMMIT=1',$con);
		}
		mysql_close($con);
	
}

?>