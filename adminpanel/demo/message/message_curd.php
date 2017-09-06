<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/functions/fun1.php');
$db = new DBConn();

$filepath = ROOT."/image_upload/files_upload/";

///*******************************************************
/// Validate that the data already exist or not
///*******************************************************
/*if($_POST['type']=="validate")
{

	$sql="SELECT Category_Name FROM category WHERE Category_Name='".$_POST['cate_name']."' and Category_Id<>'".$_REQUEST['id']."'";
	$res=$db->ExecuteQuery($sql);
		
	if(empty($res))
    {
 		echo 0;
    }
	else
	{
		echo 1;
	}

}*/

///*******************************************************
/// To Insert New category /////////////////////////////////
///*******************************************************
if($_POST['type']=="addrequest")
{
	/*print_r($_POST);
	exit;*/
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		$gallary = $_FILES['file']['name'];
		
		$tmp2 = $_FILES['file']['tmp_name'];
		//print_r($tmp2);
		$image=explode('.',$gallary);
		$gallary_image = time().'.'.$image[1]; // rename the file name
		if(move_uploaded_file($tmp2, $filepath.$gallary_image))
		  {
				
				$tblfield=array('From_Email','To_Email','Subject','Message','File','Date');
				$tblvalues=array($_POST['from_email'],$_POST['to_email'],$_POST['subject'],$_POST['message'],$gallary_image,date('Y-m-d H:i'));
				$res=$db->valInsert("message_sent",$tblfield,$tblvalues);
				if(!$res)
				{
					throw new Exception('0');
				}
				
		//Update Reply Mail 
		$arrField=array('Reply');
		$arrValue=array(1);
		$update=$db->updateValue('contact_request',$arrField,$arrValue,' Id='.$_REQUEST['id']);
	
		///******************************************************************************************
		///////////////////////After Contact Form is Submition Email Send /////////////////////////
		//******************************************************************************************
						
				$to  =trim($_POST['to_email']);  
				
				// subject ///////////////////////////////////////
				$subject = 'Reply : '.$_POST['subject'];
				// message ////////////////////////////////////////////////
				$message = $_POST['message'];
				
				
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
				$headers .= 'From: Shrishti Architecture <'.trim($_POST['from_email']).'>' . "\r\n";
				
				mail($to, $subject, $message, $headers);
		
		  }
		  
	   echo 1;
		mysql_query("COMMIT",$con);
			
	}
	catch(Exception $e)
	{
		echo  $e->getMessage();
		mysql_query('ROLLBACK',$con);
		mysql_query('SET AUTOCOMMIT=1',$con);
	}
}

///*******************************************************
/// Edit Sub news
///*******************************************************
if($_POST['type']=="editTest")
{
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
	 	$tblfield=array('Client_Name','Review','H_Client_Name','H_Review','Status');
		$tblvalues=array($_POST['name'],$_POST['review'],$_POST['hname'],$_POST['hreview'],1);
		$condition="Test_Id=".$_POST['id'];
	    $res=$db->updateValue('testimonials',$tblfield,$tblvalues,$condition);
		if(!$res)
		{
			throw new Exception('0');
		}
     	
	
	   echo 1;
		mysql_query("COMMIT",$con);
			
	}
	catch(Exception $e)
	{
		echo  $e->getMessage();
		mysql_query('ROLLBACK',$con);
		mysql_query('SET AUTOCOMMIT=1',$con);
	}
}

///*******************************************************
/// Update Status
///*******************************************************
if($_POST['type']=="CheckStatus")
{
		$mysql=$db->ExecuteQuery("SELECT * FROM testimonials WHERE Test_Id='".$_REQUEST['id']."'");
		
		//Check Here Any Records IS Availble OR Not
		if(count($mysql)>0)
		{
			if($mysql[1]['Status']==1)
			{
				$status=0;
			}else
			{
				$status=1;
			
			}
			$tblfield=array('Status');
			$tblvalues=array($status);
			$condition="Test_Id=".$_POST['id'];
		    $res=$db->updateValue('testimonials',$tblfield,$tblvalues,$condition);
			if (empty($res))
			{
				//echo mysql_error();
				echo 0;
			}
			else
			{
				echo 1;
			}

		}
}


 ///*******************************************************
/// Delete row from testimonials table
///*******************************************************
if($_POST['type']=="delete")
{
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
	
		
			//Delete Row
			$tblname="contact_request";
			$condition="Id=".$_POST['id'];
			$res=$db->deleteRecords($tblname,$condition);
			if(!$res)
			{
				throw new Exception('0');
			}
			 
	    echo 1;
		mysql_query("COMMIT",$con);
			
	}
	catch(Exception $e)
	{
		echo  $e->getMessage();
		mysql_query('ROLLBACK',$con);
		mysql_query('SET AUTOCOMMIT=1',$con);
	}
}