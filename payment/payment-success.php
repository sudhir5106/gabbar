<?php
include('../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
include(PATH_INCLUDE.'/header.php');
error_reporting(0);
		 
///******************************** pay U Money Code *****************************************///

 $con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	   mysql_query('SET AUTOCOMMIT=0',$con);
	   mysql_query('START TRANSACTION',$con);
		try
			{
				$status=$_POST["status"];
				$firstname=$_POST["firstname"];
				$amount=$_POST["amount"];
				$txnid=$_POST["txnid"];
				$posted_hash=$_POST["hash"];
				$key=$_POST["key"];
				$productinfo=$_POST["productinfo"];
				$email=$_POST["email"];
				$salt="8nLWOyBc";
				$mode=$_POST['mode'];
				$payuMoneyId=$_POST['payuMoneyId'];

				if(isset($_POST["additionalCharges"]))
				 {
      				 $additionalCharges=$_POST["additionalCharges"];
        			 $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
				  else 
				  {	  

       				 $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

        			}
		
					$hash = hash("sha512", $retHashSeq);
        
		 			 $Id = explode("-",base64_decode($txnid));	
		   			 $_SESSION['userId']=$Id[1];
					 
					 //#########################################################################
					 //#################### Check Here Member Associated or not ################					 
					 /*$perDetails=$db->ExecuteQuery("SELECT User_Id, Pin_Type, First_Name FROM customer_login WHERE Login_Id='".$Id[1]."' AND Active=1");
					 if(count($perDetails)>0)
					 {
						 if($perDetails[1]['Pin_Type']>0)
						 {
							$_SESSION['creUserId']	=	$perDetails[1]['User_Id'];
						 }
					 }
					 
					 $_SESSION['username']=$perDetails[1]['First_Name'];*/
					 
					 
					 
					 
					 
      				 if ($hash != $posted_hash)
					 {
		   				 //echo "Invalid Transaction. Please try again";
						 throw new Exception('0');		  	   			
		  			 }
					 
	  				 else 
					 {
         
						///********** for database (starts) *****************************///   
		  
						///////////////////////////////////
						///// Query for payment status( not reload page)
						////////////////////////////////////					
						
						$paymentCheck=$db->ExecuteQuery("SELECT Order_Amount, User_Id  FROM orders WHERE Payment_Status=0 AND Order_Id=".$Id[0]." AND User_Id=".$Id[1]." ");
						
						
						if(count($paymentCheck)>0)
						{
							
							///////////////////////////////////
							///// update transection detail after transection
							////////////////////////////////////	
							
							$res=mysql_query("UPDATE orders SET Transaction_Id='".$txnid."', Transaction_Date=TIMESTAMPADD(MINUTE, 330,NOW()), Payment_Id='".$payuMoneyId."', Pay_Status='".$status."', Payment_Mode='".$mode."', Payment_Status=1  WHERE Order_Id=".$Id[0]." AND User_Id=".$Id[1]."");
							
							if(!$res)
							{
								/*echo mysql_error();
								exit;
*/								throw new Exception('0');
							}
							//*************************************
							//******* Update Stock Quantity
							//*************************************
							
							/*$getProduct=$db->ExecuteQuery("SELECT PM.Product_Id, PM.Product_Stock , OD.Qty FROM order_detail OD INNER JOIN product_master PM ON PM.Product_Id=OD.Product_Id WHERE (PM.Product_Availabilty=1 AND PM.Product_Stock > 0) AND  Order_Id='".$Id[0]."'");
									
								
							if(count($getProduct)>0)
							{
								foreach($getProduct as $val1)
								{
									$totalStock=$val1['Product_Stock']-$val1['Qty'];
									if($totalStock==0)
									{
										$available=0;
									}
									else
									{
									$available=1;
									}
									
									//Update HEre Stock 
									$res=mysql_query("UPDATE product_master SET Product_Stock='".$totalStock."', Product_Availabilty=".$available."  WHERE Product_Id=".$val1['Product_Id']."");
								
								}
							
							}*/
							
							 
							 //############################################################### 
							 //###### Distribut here Selling Bonus to Associated Member ******
							 //****************************************************************
							
							/*$getuser=$db->ExecuteQuery("SELECT Login_Id FROM customer_login WHERE User_Id='".$paymentCheck[1]['Associate_Id']."' AND Pin_Type!=0 ");
							
							
							if(($perDetails[1]['Pin_Type']!=0) || (count($getuser) > 0))
							{
								
								if((count($getuser) > 0))
								{
									$BonusUserid=$getuser[1]['Login_Id'];
								}
								else
								{
								
									$BonusUserid=$_SESSION['user'];
								}
								
								
								$persent=0;
								$getPersent=$db->ExecuteQuery("SELECT * FROM selling_bonus WHERE Status=1");
								
								if(count($getPersent)>0)
								{
								
									$persent=$getPersent[1]['Persent'];
									$persenrid=$getPersent[1]['Selling_Id'];
								}
								
								$amount=($paymentCheck[1]['Order_Amount']*$persent)/100;
								
								//Update HEre Ewallet HEre
								$getwallet=$db->ExecuteQuery("SELECT userid, balance FROM ewallet WHERE userid='".$BonusUserid."'");
			
								$r=($getwallet[1]['balance']+$amount);
								
								//Get Here Direct Comminssion
								 $tblfield1=array('balance');
								 $tblvalues1=array($r);
								 $condition=" userid='".$BonusUserid."'";
								 $res=$db->updateValue('ewallet',$tblfield1,$tblvalues1,$condition);
								 
								 if(!$res)
									{
										///echo mysql_error();
										//exit;
										throw new Exception('0');
									}
									
								//Bonus Report Genrate HEre
								$tblfield1=array('userid','getbonusid','order_id','amount','order_amount','close_date','persent');
								$tblvalues1=array($BonusUserid,$_SESSION['user'],$Id[0],$amount,$paymentCheck[1]['Order_Amount'],date('Y-m-d'),$persent);
								$res=$db->valInsert('bonus_report',$tblfield1,$tblvalues1);
								
								if(!$res)
								{
									
									throw new Exception('0');
								}
								
							}*/
							
							 
							  
						} //if closing (payment status for transection and no reload page )
					 }
			
			mysql_query("COMMIT",$con);
			echo '<script type="text/javascript">window.location.href="success-report.php?id='.$txnid.'";</script>';
		}
	catch(Exception $e)
	{
		echo  $e->getMessage();
		mysql_query('ROLLBACK',$con);
		mysql_query('SET AUTOCOMMIT=1',$con);
		if( $e->getMessage()==0)
		{
			echo '<script type="text/javascript">window.location.href="invalid_trans.php";</script>';
		}

		
	mysql_close($con);
}
?>
<script type="text/javascript">
$(window).load(function() {
	$(".loader").fadeOut("slow");
	$('.try').show();
})
</script>
<!--<style type="text/css">
.loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('<?php echo PATH_IMAGE?>/loading.gif') 50% 50% no-repeat rgb(249,249,249);
}
</style>-->
<body style="background:#fff;">
<?php //$_SESSION['CustomerId']=$Id[1];?>
<div style="margin:50px auto; width:150px; padding-bottom:30px;"> <a class="navbar-brand"  style="padding-top:4px" href='<?php echo LINK_ROOT."/index.php"?>'>Crestera<!--<img src="<?php //echo PATH_IMAGE ?>/logo.png"  />--></a></div>
<br />
<div class="container">
  <div class="row">
  <div class="loader">
    <div class="col-sm-12 " align="center">
    <img src="<?php echo PATH_IMAGE?>/loading.gif" style="width:200px">
      <h4 class="text-center"> Please wait while your transaction is processing, and do not refresh or close the page until your transaction completed</h4>
    </div>
    </div> 
  </div>
</div>
</body>


<?php include(PATH_INCLUDE.'/footer.php'); ?>