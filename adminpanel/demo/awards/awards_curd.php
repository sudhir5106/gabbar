<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/functions/fun1.php');
$db = new DBConn();

$pathmulti = ROOT."/image_upload/awards/";
$pathmulti1 = ROOT."/image_upload/awards/thumb/";

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
if($_POST['type']=="addAwards")
{
		$gallary = $_FILES['image']['name'];
		
		$tmp2 = $_FILES['image']['tmp_name'];
		//print_r($tmp2);
		$image=explode('.',$gallary);
		$gallary_image = time().'.'.$image[1]; // rename the file name
		if(move_uploaded_file($tmp2, $pathmulti.$gallary_image))
		  {
				// move the image in the thumb folder
				$resizeObj1 = new resize($pathmulti.$gallary_image);
				$resizeObj1 ->resizeImage(100,100,'auto');
				$resizeObj1 -> saveImage($pathmulti1.$gallary_image, 100);
				
				$tblfield=array('Title','H_Title','Image_Path','Status');
				$tblvalues=array($_POST['title'],$_POST['htitle'],$gallary_image,1);
				$res=$db->valInsert("awards",$tblfield,$tblvalues);
				if(empty($res))
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
/// Edit Sub news
///*******************************************************
if($_POST['type']=="editAwards")
{
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		
		//New HEre Id NEw Image path is selected or not 
		if($_REQUEST['imageupload']=='')
		{
			//Image Name
			$gallary = $_FILES['imageupload2']['name'];
			
			//TEmp Image Image
			$tmp2 = $_FILES['imageupload2']['tmp_name'];
		
			$image=explode('.',$gallary);
			$gallary_image = time().'.'.$image[1]; // rename the file name
			if(move_uploaded_file($tmp2, $pathmulti.$gallary_image))
			{
				// move the image in the thumb folder
				$resizeObj1 = new resize($pathmulti.$gallary_image);
				$resizeObj1 ->resizeImage(100,100,'auto');
				$resizeObj1 -> saveImage($pathmulti1.$gallary_image, 100);
			}
			
			//Unlink Old Image from folders
			$select=$db->ExecuteQuery("SELECT Image_Path FROM awards WHERE Awards_Id='".$_REQUEST['id']."'");
			if(count($select)>0)
				{
					unlink($pathmulti.$select[1]['Image_Path']);
					unlink($pathmulti1.$select[1]['Image_Path']);
			    }
			
			
		}
		else
		{
			//Old New PAth
			$gallary_image=$_POST['imageupload'];
		
		}
	
			
	 	 $tblfield=array('Title','Image_Path','H_Title');
		$tblvalues=array($_POST['title'],$gallary_image,$_POST['htitle'],1);
		$condition="Awards_Id=".$_POST['id'];
	    $res=$db->updateValue('awards',$tblfield,$tblvalues,$condition);
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
		$mysql=$db->ExecuteQuery("SELECT * FROM awards WHERE Awards_Id='".$_REQUEST['id']."'");
		
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
			$condition="Awards_Id=".$_POST['id'];
		    $res=$db->updateValue('awards',$tblfield,$tblvalues,$condition);
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
/// Delete row from Plant table
///*******************************************************
if($_POST['type']=="delete")
{
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
	
		$res=$db->ExecuteQuery("SELECT Image_Path FROM awards WHERE Awards_Id='".$_REQUEST['id']."'");
	
		//Check HEre If Category  is used than you can not delete the row
		 if(count($res)>0)
		 {
			 //Delete All The Image 
			if($res[1]['Image_Path']!='')
			{
				unlink($pathproject.$res[1]['Image_Path']);
				unlink($pathproject1.$res[1]['Image_Path']);
			}
			
			//Delete Row
			$tblname="awards";
			$condition="Awards_Id=".$_POST['id'];
			$res=$db->deleteRecords($tblname,$condition);
			if(!$res)
			{
				throw new Exception('0');
			}
			
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