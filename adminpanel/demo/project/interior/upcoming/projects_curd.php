<?php 
include('../../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/functions/fun1.php');
$db = new DBConn();

$pathproject = ROOT."/image_upload/projects/";
$pathproject1 = ROOT."/image_upload/projects/thumb/";
///*******************************************************
/// Validate that the data already exist or not
///*******************************************************
if($_POST['type']=="validate")
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

}

///*******************************************************
/// To Insert New Project /////////////////////////////////
///*******************************************************
if($_POST['type']=="addProject")
{
/*	print_r($_POST);
	exit;*/
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		//Image Name
		$gallary = $_FILES['imageupload']['name'];
		
		//TEmp Image Image
		$tmp2 = $_FILES['imageupload']['tmp_name'];
	
		$image=explode('.',$gallary);
		$gallary_image = time().'.'.$image[1]; // rename the file name
		if(move_uploaded_file($tmp2, $pathproject.$gallary_image))
		{
			// move the image in the thumb folder
			$resizeObj1 = new resize($pathproject.$gallary_image);
			$resizeObj1 ->resizeImage(400,224,'auto');
			$resizeObj1 -> saveImage($pathproject1.$gallary_image, 100);
		}
			
	    $tblfield=array('Project_Title','Project_Image','Project_Desc','Project_HTitle','Project_HDesc','Status','Project_Category');
		$tblvalues=array($_POST['title'],$gallary_image,$_POST['description'],$_POST['htitle'],$_POST['hdescription'],1,2);
		$res=$db->valInsert("upcoming_projects",$tblfield,$tblvalues);
		if(!$res)
		{
			//echo mysql_error();
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
/// Edit Upcoming  Project
///*******************************************************
if($_POST['type']=="editProject")
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
			if(move_uploaded_file($tmp2, $pathproject.$gallary_image))
			{
				// move the image in the thumb folder
				$resizeObj1 = new resize($pathproject.$gallary_image);
				$resizeObj1 ->resizeImage(400,224,'auto');
				$resizeObj1 -> saveImage($pathproject1.$gallary_image, 100);
			}
			
			//Unlink Old Image from folders
			$select=$db->ExecuteQuery("SELECT Project_Image FROM upcoming_projects WHERE Project_Id='".$_REQUEST['id']."'");
			if(count($select)>0)
				{
					unlink($pathproject.$select[1]['Project_Image']);
					unlink($pathproject1.$select[1]['Project_Image']);
			    }
			
			
		}
		else
		{
			//Old New PAth
			$gallary_image=$_POST['imageupload'];
		
		}
	
			
	 	$tblfield=array('Project_Title','Project_Image','Project_Desc','Project_HTitle','Project_HDesc','Status','Project_Category');
		$tblvalues=array($_POST['title'],$gallary_image,$_POST['description'],$_POST['htitle'],$_POST['hdescription'],1,2);
		$condition="Project_Id=".$_POST['id'];
	    $res=$db->updateValue('upcoming_projects',$tblfield,$tblvalues,$condition);
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
/// Delete row from Projects table
///*******************************************************
if($_POST['type']=="delete")
{
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
	
		$res=$db->ExecuteQuery("SELECT Project_Image FROM upcoming_projects WHERE Project_Id='".$_REQUEST['id']."'");
	
		//Check HEre If Category  is used than you can not delete the row
		 if(count($res)>0)
		 {
			 //Delete All The Image 
			if($res[1]['Project_Image']!='')
			{
				unlink($pathproject.$res[1]['Project_Image']);
				unlink($pathproject1.$res[1]['Project_Image']);
			}
			
			//Delete Row
			$tblname="upcoming_projects";
			$condition="Project_Id=".$_POST['id'];
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