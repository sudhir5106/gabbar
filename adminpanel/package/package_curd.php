<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/functions/fun1.php');
$db = new DBConn();

////***************************************
//// validaton for Package
////**************************************

if($_POST['type']=="packageExist")
{

	$sql="SELECT Package_Name FROM packages WHERE Package_Name='".$_POST['packageName']."'";
	$res=$db->ExecuteQuery($sql);
		
	if(empty($res))
    {
 	 	echo 1;
    }
	else
	{
		echo 0;
	}

}

////***************************************
//// validaton for Edit Package
////**************************************

if($_POST['type']=="EditExist")
{

	echo $sql="SELECT Package_Name FROM packages WHERE Package_Id!=".$_POST['packageId']." AND Package_Name='".$_POST['packageName']."'";
	$res=$db->ExecuteQuery($sql);
		
	if(empty($res))
    {
 	 	echo 1;
    }
	else
	{
		echo 0;
	}

}


$path = ROOT."/image_upload/package/";
$paththumbimg = ROOT."/image_upload/package/thumb/";
///*******************************************************
/// To Insert New catelog_category /////////////////////////////////
///*******************************************************
if($_POST['type']=="addPackage")
{
	
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{	
		
		$checkedCatId= $_POST['checkedCatId'];
		$CatIdArr = explode(',',$checkedCatId);
		
		$imgname = $_FILES['pimage']['name'];
		
		$imgextension = explode('.',$imgname);
		$newimgname = 'PKG'.time().'.'.$imgextension[1];
		
		/*echo $newimgname;
		exit();*/
		
		//$newimgname = 'PKG'.time().$imgname;
		
		$tmp = $_FILES['pimage']['tmp_name'];
		//move_uploaded_file($tmp, $path.$newimgname);
		
		if(move_uploaded_file($tmp, $path.$newimgname))
	  {
		// move the image in the thumb folder
		$resizeObj1 = new resize($path.$newimgname);
		$resizeObj1 ->resizeImage(200,200,'auto');
		$resizeObj1 -> saveImage($paththumbimg.$newimgname, 100);
		
	  }
		
		
	    $tblfield=array('Package_Name','Old_Price', 'New_Price', 'SKU', 'Image');
		$tblvalues=array($_POST['packageName'],$_POST['oldprice'],$_POST['newprice'],$_POST['sku'],$newimgname);
		$res=$db->valInsert("packages",$tblfield,$tblvalues);
		
		if (!$res) {
           throw new Exception('0');
        }
				
		$packageId = mysql_insert_id();
		
		foreach($CatIdArr as $checkedCatIdVal){	
			
		
			$tblfield=array('Package_Id','Category_Id');
			$tblvalues=array($packageId,$checkedCatIdVal);
			$res=$db->valInsert("package_relation_category",$tblfield,$tblvalues);		
		}
		
		if (!$res) {
           throw new Exception('0');
        }
		
		mysql_query("COMMIT",$con);
		echo 1;
		
		
	}
	catch(Exception $e)
	{
		echo  $e->getMessage();
		mysql_query('ROLLBACK',$con);
		mysql_query('SET AUTOCOMMIT=1',$con);
	}
}

///*******************************************************
/// Edit Category
///*******************************************************
if($_POST['type']=="update")
{
	
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{	
		
		$checkedCatId= $_POST['checkedCatId'];
		$CatIdArr = explode(',',$checkedCatId);
		
		//$imgname = $_FILES['pimage']['name'];
		if(isset($_FILES['pimage']['name'])){
			$imgname = $_FILES['pimage']['name'];
		}
		else
		{
			$imgname=NULL;
		}
		
		if(strlen($imgname)>0) 
		{
			$imgextension = explode('.',$imgname);
			$newimgname = 'PKG'.time().'.'.$imgextension[1];		
			$tmp = $_FILES['pimage']['tmp_name'];
			
			// move the image in the thumb folder
			move_uploaded_file($tmp, $path.$newimgname);
			$resizeObj1 = new resize($path.$newimgname);
			$resizeObj1 ->resizeImage(200,200,'auto');
			$resizeObj1 -> saveImage($paththumbimg.$newimgname, 200);
			
			unlink($path.$_POST['pic']);
			unlink($paththumbimg.$_POST['pic']);
		}
		else{
			$newimgname=$_POST['pic'];
		}
		
		//Code for Update 
		$tblname="packages";
	    $tblfield=array('Package_Name','Old_Price', 'New_Price', 'SKU', 'Image');
		$tblvalues=array($_POST['packageName'],$_POST['oldprice'],$_POST['newprice'],$_POST['sku'],$newimgname);
		$condition="Package_Id=".$_POST['packageId'];
		$res=$db->updateValue("packages",$tblfield,$tblvalues,$condition);
		
		if (!$res) {
           throw new Exception('a');
        }
		
		//Delete records from package_relation_category table
		$tblname="package_relation_category";
		$condition="Package_Id=".$_POST['packageId'];
		$res1=$db->deleteRecords($tblname,$condition);
		
		if (!$res1) {
           throw new Exception('b');
        }
		
		//Insert the selected categories in package_relation_category table
		foreach($CatIdArr as $checkedCatIdVal){	
			$tblfield=array('Package_Id','Category_Id');
			$tblvalues=array($_POST['packageId'],$checkedCatIdVal);
			$res2=$db->valInsert("package_relation_category",$tblfield,$tblvalues);		
		}
		
		if (!$res2) {
           throw new Exception('c');
        }
		
		mysql_query("COMMIT",$con);
		echo 1;
		
		
	}
	catch(Exception $e)
	{
		echo  $e->getMessage();
		mysql_query('ROLLBACK',$con);
		mysql_query('SET AUTOCOMMIT=1',$con);
	}
}


 ///*******************************************************
/// Delete row from Packages table
///*******************************************************
if($_POST['type']=="delete")
{
	$res=$db->ExecuteQuery("SELECT Image FROM packages WHERE Package_Id=".$_POST['id']);
	
	unlink($path.$res[1]['Image']);
	unlink($paththumbimg.$res[1]['Image']);	
	
	
	$tblname="package_relation_category";
	$condition="Package_Id=".$_POST['id'];
	$res=$db->deleteRecords($tblname,$condition);
	
	
	$tblname="packages";
	$condition="Package_Id=".$_POST['id'];
	$res=$db->deleteRecords($tblname,$condition);
	
	if($res)
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
	 
}