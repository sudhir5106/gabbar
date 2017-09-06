<?php 
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

///*******************************************************
/// Validate that the data already exist or not
///*******************************************************
if($_POST['type']=="validate")
{

	$sql="SELECT Menu_Name FROM menu WHERE Menu_Name='".$_POST['cate_name']."' and Menu_Id<>'".$_REQUEST['id']."'";
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
		$file=trim($_POST['cate_name']);
		$filename = strtolower(preg_replace('/\s+/', '_', $file).'.php');
		/*echo $filename;
		exit;*/
		/*if(!file_exists(ROOT.'/'.$filename))
		{
			$handle = fopen(ROOT.'/'.$filename, 'w') or die('Cannot open file:  '.$filename); 
			//echo $handle;
			}*/
		
	    $tblfield=array('Menu_Name','Position','File_Name');
		$tblvalues=array($_POST['cate_name'],$_POST['position'],$filename);
		$res=$db->valInsert("menu",$tblfield,$tblvalues);
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
	$file=trim($_POST['cate_name']);
	$filename = strtolower(preg_replace('/\s+/', '_', $file).'.php');
	
	//get Here Old File Name Update 
	$oldfile=$db->ExecuteQuery("SELECT File_Name FROM menu M INNER JOIN pages P ON P.Menu_Id=M.Menu_Id WHERE M.Menu_Id='".$_POST['id']."' AND Menu_Name!='$file' ");
	
	if(count($oldfile)>0)
	{
		if(file_exists(ROOT.'/'.$oldfile[1]['File_Name']))
		{
			if(!file_exists(ROOT.'/'.$filename))
				{
					rename (ROOT.'/'.$oldfile[1]['File_Name'],ROOT.'/'.$filename);
				}else
				{
					die( "This File Is Already Exists");
					exit;
				}
			
		}
	}
	
	//Check here If home page is edit than 
	if($_POST['id']==1)
	{
		$filename='index.php';
	}
	
	 $tblfield=array('Menu_Name','Position','File_Name');
	 $tblvalues=array($_POST['cate_name'],$_POST['position'],$filename);
	 $condition="Menu_Id=".$_POST['id'];
	 $res=$db->updateValue('menu',$tblfield,$tblvalues,$condition);
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
		$res=$db->ExecuteQuery("Select Menu_Id from menu  where Menu_Id=".$_POST['id']."");
	//print_r($res);

	//Check HEre If Category  is used than you can not delete the row
	 if(count($res)>0)
	 {
		$tblname="menu";
		$condition="Menu_Id=".$_POST['id'];
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