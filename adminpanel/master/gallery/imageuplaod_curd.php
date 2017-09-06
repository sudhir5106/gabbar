<?php 
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/functions/fun1.php');
$db = new DBConn();

$pathmulti = ROOT."/image_upload/gallery/";
$pathmulti1 = ROOT."/image_upload/gallery/thumb/";


///*******************************************************
/// To Insert New category /////////////////////////////////
///*******************************************************
if($_POST['type']=="addImageupload")
{	
	
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		
		$gallary = $_FILES['imageupload']['name'];
		//print_r($gallary);
		$i=0;
		foreach($gallary as $gallaryval)
		{
		
		$tmp2 = $_FILES['imageupload']['tmp_name'];
		//print_r($tmp2);
		$image=explode('.',$gallaryval);
		$gallary_image = time().'.'.$image[1]; // rename the file name
		if(move_uploaded_file($tmp2[$i], $pathmulti.$gallary_image))
		 {
			 // move the image in the thumb folder
			$resizeObj1 = new resize($pathmulti.$gallary_image);
			$resizeObj1 ->resizeImage(300,300,'auto');
			$resizeObj1 -> saveImage($pathmulti1.$gallary_image, 300);
					
						
								
			 $sql1="insert into gallery_image(Image,Title,Position,Description)VALUES('".$gallary_image."','".$_POST['title']."','".$_POST['position']."','".$_POST['desc']."')";
						
			$res1=mysql_query($sql1);
			if(!$res1)
			{
				//echo mysql_error();
				throw new Exception('0');
			}
				
					$i++;
	   	 }
		}//end of foreach
	
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
/// Edit Sub GAllery
///*******************************************************
if($_POST['type']=="editImageupload")
{
	
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		if($_POST['imgval']==1)
		{
			
			$gallary = $_FILES['imageupload2']['name'];
			
			$tmp2 = $_FILES['imageupload2']['tmp_name'];
			//print_r($tmp2);
			$image=explode('.',$gallary);
			$gallary_image = time().'.'.$image[1]; // rename the file name
			if(move_uploaded_file($tmp2, $pathmulti.$gallary_image))
			{
			 // move the image in the thumb folder
				$resizeObj1 = new resize($pathmulti.$gallary_image);
				$resizeObj1 ->resizeImage(300,300,'auto');
				$resizeObj1 -> saveImage($pathmulti1.$gallary_image, 300);
			}
			
			//GEt Here Update Image When Uplaod new image
			$res=$db->ExecuteQuery("Select Image FROM gallery_image  where Id=".$_POST['id']."");
	
			//Check image exist or not
			 if(count($res)>0 && file_exists($pathmulti.$res[1]['Image']))
			 {
				unlink($pathmulti.$res[1]['Image']);
				//unlink($pathmulti1.$image['Image']);
			 }
		}
		else
		{
			$gallary_image=$_POST['oldimage'];
		
		}
		
		
			$tblfield=array('Image','Title','Position','Description');
			$tblvalues=array($gallary_image,$_POST['title'],$_POST['position'],$_POST['desc']);
			 $condition=" Id=".$_POST['id'];
			 $res=$db->updateValue('gallery_image',$tblfield,$tblvalues,$condition);
			if(!$res)
			{
				//echo mysql_error();
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
/// Delete row from Plant table
///*******************************************************
if($_POST['type']=="delete")
{
	$res=$db->ExecuteQuery("Select Image FROM gallery_image  where Id=".$_POST['id']."");
	
	//Check image exist or not
	 if(count($res)>0)
	 {
		 if(file_exists($pathmulti.$res[1]['Image']))
		 {
			unlink($pathmulti.$res[1]['Image']);
			unlink($pathmulti1.$image['Image']);
		 }
		$tblname="gallery_image";
		$condition=" Id=".$_POST['id'];
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
