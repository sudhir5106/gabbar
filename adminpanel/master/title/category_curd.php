<?php 
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

///*******************************************************
/// Validate that the data already exist or not
///*******************************************************
if($_POST['type']=="validate")
{

	$sql="SELECT Menu_Id FROM title WHERE Menu_Id='".$_POST['menu']."' and Title_Id<>'".$_REQUEST['id']."'";
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
if($_POST['type']=="addMenu")
{
	
	    $tblfield=array('Menu_Id','Title_Name');
		$tblvalues=array($_POST['menu'],$_POST['title']);
		$res=$db->valInsert("title",$tblfield,$tblvalues);
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
if($_POST['type']=="editMenu")
{
	
	 $tblfield=array('Menu_Id','Title_Name');
	 $tblvalues=array($_POST['menu'],$_POST['title']);
	 $condition="Title_Id=".$_POST['id'];
	 $res=$db->updateValue('title',$tblfield,$tblvalues,$condition);
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
/// Delete row from Plant table
///*******************************************************
if($_POST['type']=="delete")
{
		$res=$db->ExecuteQuery("Select 1 from title  where Title_Id=".$_POST['id']."");
	//print_r($res);

	//Check HEre If Category  is used than you can not delete the row
	 if(count($res)>0)
	 {
		$tblname="title";
		$condition="Title_Id=".$_POST['id'];
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
	 else
	 {
	
		echo 0;
	}
}