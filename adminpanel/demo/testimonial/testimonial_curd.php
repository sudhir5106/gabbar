<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/functions/fun1.php');
$db = new DBConn();

$pathmulti = ROOT."/image_upload/testimonial/";
$pathmulti1 = ROOT."/image_upload/testimonial/thumb/";



///*******************************************************
/// To Insert New category /////////////////////////////////
///*******************************************************
if($_POST['type']=="addNew")
{
	
		if($_REQUEST['validimage']==1)
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
			  }
		  }
				$tblfield=array('User_Name','Logo','Status','Review');
				$tblvalues=array($_POST['name'],$gallary_image,1,$_POST['review']);
				$res=$db->valInsert("testimonials",$tblfield,$tblvalues);
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

///*******************************************************
/// Edit Sub testimonials
///*******************************************************
if($_POST['type']=="editForm")
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
				$resizeObj1 ->resizeImage(192,93,'auto');
				$resizeObj1 -> saveImage($pathmulti1.$gallary_image, 100);
			}
			
			//Unlink Old Image from folders
			$select=$db->ExecuteQuery("SELECT Logo FROM testimonials WHERE Test_Id='".$_REQUEST['id']."'");
			if(count($select)>0 && file_exists($pathmulti.$select[1]['Logo']))
				{
					unlink($pathmulti.$select[1]['Logo']);
					unlink($pathmulti1.$select[1]['Logo']);
			    }
			
			
		}
		else
		{
			//Old New PAth
			$gallary_image=$_POST['imageupload'];
		
		}
	
		$tblfield=array('User_Name','Logo','Status','Review');
		$tblvalues=array($_POST['name'],$gallary_image,1,$_POST['review']);
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
		$mysql=$db->ExecuteQuery("SELECT Status FROM testimonials WHERE Test_Id='".$_REQUEST['id']."'");
		
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
/// Delete row from Plant table
///*******************************************************
if($_POST['type']=="delete")
{
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
	
		$res=$db->ExecuteQuery("SELECT Logo FROM testimonials WHERE Test_Id='".$_REQUEST['id']."'");
	
		//Check HEre If Category  is used than you can not delete the row
		 if(count($res)>0)
		 {
			 //Delete All The Image 
			if($res[1]['Logo']!='' && file_exists($pathmulti.$res[1]['Logo']))
			{
				unlink($pathproject.$res[1]['Logo']);
				unlink($pathproject1.$res[1]['Logo']);
			}
			
			//Delete Row
			$tblname="testimonials";
			$condition="Test_Id=".$_POST['id'];
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