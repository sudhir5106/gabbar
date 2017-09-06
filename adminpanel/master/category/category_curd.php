<?php 
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

///*******************************************************
/// Validate that the data already exist or not
///*******************************************************
if($_POST['type']=="CatNameExist")
{
	$sql="SELECT Category_Name FROM categories WHERE Category_Name='".$_POST['catName']."'";
	$res=$db->ExecuteQuery($sql);
		
	if(empty($res))
    {
 		echo 0;
    }
	else
	{
		echo 1;
	}
}

///*******************************************************
/// Validate that the data already exist or not
///*******************************************************
if($_POST['type']=="EditCatNameExist")
{
	$sql="SELECT Category_Name FROM categories WHERE Category_Id!= ".$_POST['catId']." AND Category_Name='".$_POST['catName']."'";
	$res=$db->ExecuteQuery($sql);
		
	if(empty($res))
    {
 		echo 0;
    }
	else
	{
		echo 1;
	}
}

///*******************************************************
/// To Insert New catelog_category /////////////////////////////////
///*******************************************************
if($_POST['type']=="addCategory")
{
	
	    $tblfield=array('Category_Name');
		$tblvalues=array($_POST['catName']);
		$res=$db->valInsert("categories",$tblfield,$tblvalues);
		if(empty($res))
    	{
 	  		echo 0;
    	}
     	else
		{
			echo 1;
		}
}

///*******************************************************
/// Edit Category
///*******************************************************
if($_POST['type']=="editCategory")
{
	
	 $tblfield=array('Category_Name');
	 $tblvalues=array($_POST['catName']);
	 $condition="Category_Id=".$_POST['catId'];
	 $res=$db->updateValue('categories',$tblfield,$tblvalues,$condition);
	if (empty($res))
	{
		echo 'Error Message :- '.mysql_error();
	}
	else
	{
		echo 1;
	}
}


 ///*******************************************************
/// Delete row from categories table
///*******************************************************
if($_POST['type']=="delete")
{
	$tblname="categories";
	$condition="Category_Id=".$_POST['id'];
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