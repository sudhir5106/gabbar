<?php 
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/functions/fun1.php');
$db = new DBConn();

$pathmulti = ROOT."/image_upload/favicon/";
$pathmulti1 = ROOT."/image_upload/favicon/thumb/";
///*******************************************************
/// To Insert New  /////////////////////////////////
///*******************************************************
if($_POST['type']=="addCategory")
{
	
/*print_r($_POST);
	exit;
	*/
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		
	//GEt Here List Of 
	 $tblfield=array('Status');
	 $tblvalues=array(0);
	 $condition=" 1=1";
	 $res=$db->updateValue('favicon',$tblfield,$tblvalues,$condition);
	 if(!$res)
		{
			//echo mysql_error();
			throw new Exception('0');
		}
		
		$gallary_image='';
		if($_REQUEST['imgval']==1)
		{
			$gallary = $_FILES['logo']['name'];
		
			$tmp2 = $_FILES['logo']['tmp_name'];
			//print_r($tmp2);
			$image=explode('.',$gallary);
			$gallary_image = time().'.'.$image[1]; // rename the file name
			if(move_uploaded_file($tmp2, $pathmulti.$gallary_image))
			  {
				// move the image in the thumb folder
				$resizeObj1 = new resize($pathmulti.$gallary_image);
				$resizeObj1 ->resizeImage(32,32,'auto');
				$resizeObj1 -> saveImage($pathmulti1.$gallary_image, 32);
				
			  }
		}
		//Isert Here New Value
	    $tblfield=array('Logo_Image','Status');
		$tblvalues=array($gallary_image,1);
		$res=$db->valInsert("favicon",$tblfield,$tblvalues);
		if(!$res)
		{
			//echo mysql_error();
			throw new Exception('0');
		}
		mysql_query("COMMIT",$con);
		echo 1;
		
	}
	catch(Exception $e){
		echo  $e->getMessage();
		mysql_query('ROLLBACK',$con);
		mysql_query('SET AUTOCOMMIT=1',$con);
	}
}

///*******************************************************
/// Edit Status
///*******************************************************
if($_POST['type']=="status")
{
	 //GEt Here List Of 
	 $tblfield=array('Status');
	 $tblvalues=array(0);
	 $condition=" 1=1";
	 $res=$db->updateValue('favicon',$tblfield,$tblvalues,$condition);
	
	
	 //GEt Here List Of 
	 $tblfield=array('Status');
	 $tblvalues=array(1);
	 $condition="Toplogo_Id=".$_POST['id'];
	 $res2=$db->updateValue('favicon',$tblfield,$tblvalues,$condition);
	
	if (empty($res2))
	{
		echo 0;
	}
	else
	{
		echo 1;
	}
}


 ///*******************************************************
/// Delete row from Shipping Charge table
///*******************************************************
if($_POST['type']=="delete")
{
	/*print_r($_POST);
	exit;
	*/
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		 //Delete Old Image from folder
		  $remove=$db->ExecuteQuery("SELECT Logo_Image FROM favicon WHERE Toplogo_Id='".$_POST['id']."'");
		  if($remove[1]['Logo_Image']!='' && $remove[1]['Logo_Image']!=0 && file_exists($pathmulti.$remove[1]['Logo_Image']))
		  {
		  		unlink($pathmulti.$remove[1]['Logo_Image']);
				unlink($pathmulti1.$remove[1]['Logo_Image']);
		  }
		//Check HEre If Category  is used than you can not delete the row
		 if(count($remove)>0)
		 {
			$tblname="favicon";
			$condition="Toplogo_Id=".$_POST['id'];
			$res=$db->deleteRecords($tblname,$condition);
		    if(!$res)
			{
				//echo mysql_error();
				throw new Exception('0');
			}
			
		}
		mysql_query("COMMIT",$con);
		
		echo 1;
		
	}
	catch(Exception $e){
		echo  $e->getMessage();
		mysql_query('ROLLBACK',$con);
		mysql_query('SET AUTOCOMMIT=1',$con);
	}
}