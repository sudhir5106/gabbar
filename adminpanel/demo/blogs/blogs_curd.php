<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/functions/fun1.php');
$db = new DBConn();

$pathmulti = ROOT."/image_upload/blogs/";
$pathmulti1 = ROOT."/image_upload/blogs/thumb/";


///*******************************************************
/// To Insert New  Blogs Details/////////////////////////
///*******************************************************
if($_POST['type']=="addNew")
{	
	
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		
		   //Check Here Image Is Selected Or Not
			$gallary_image='';
			if($_REQUEST['varifyimage']==1)
			{
				$gallaryval = $_FILES['imageupload']['name'];
				$tmp2 = $_FILES['imageupload']['tmp_name'];
				//print_r($tmp2);
				$image=explode('.',$gallaryval);
				$gallary_image = time().'.'.$image[1]; // rename the file name
				if(move_uploaded_file($tmp2, $pathmulti.$gallary_image))
					{
						// move the image in the thumb folder
						$resizeObj1 = new resize($pathmulti.$gallary_image);
						$resizeObj1 ->resizeImage(100,100,'auto');
						$resizeObj1 -> saveImage($pathmulti1.$gallary_image, 100);
								
							
					}
			}
			// First Insert Here Event details
			$start_date=date('Y-m-d H:i:s');
			
			$tblfield=array('Title','Date_Time','Image_Path','Description','Status');
			$tblvalues=array($_POST['title'],$start_date,$gallary_image,$_POST['desc'],1);
			$res=$db->valInsert("blogs",$tblfield,$tblvalues);
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
/// Edit Blogs
///*******************************************************
if($_POST['type']=="editForm")
{	
	
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		 //Check Here Image Is Selected Or Not
			$gallary_image='';
			if($_REQUEST['varifyimage']=='')
			{
				$gallaryval = $_FILES['imageupload']['name'];
				$tmp2 = $_FILES['imageupload']['tmp_name'];
				$image=explode('.',$gallaryval);
				$gallary_image = time().'.'.$image[1]; // rename the file name
				if(move_uploaded_file($tmp2, $pathmulti.$gallary_image))
					{
						// move the image in the thumb folder
						$resizeObj1 = new resize($pathmulti.$gallary_image);
						$resizeObj1 ->resizeImage(100,100,'auto');
						$resizeObj1 -> saveImage($pathmulti1.$gallary_image, 100);
								
							
					}
					//Select Image Name From Table Blogs
				$sql=$db->ExecuteQuery("SELECT Image_Path FROM blogs WHERE Blogs_Id='".$_REQUEST['id']."'"); 
				//If Old Image is Exists Than delete
				if(count($sql)>0 && file_exists($pathmulti.$sql[1]['Image_Path']))
				{
					unlink($pathmulti.$sql[1]['Image_Path']);
					unlink($pathmulti1.$sql[1]['Image_Path']);
				
				}
			}else
			{
				$gallary_image=$_REQUEST['varifyimage'];
			}
			
			$tblfield=array('Title','Image_Path','Description');
			$tblvalues=array($_POST['title'],$gallary_image,$_POST['desc']);
			
			$condition="Blogs_Id=".$_POST['id'];
			$res=$db->updateValue('blogs',$tblfield,$tblvalues,$condition);
				
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
/// Update Status Event Status 
///*******************************************************
if($_POST['type']=="CheckStatus")
{
		$mysql=$db->ExecuteQuery("SELECT Status FROM blogs WHERE Blogs_Id='".$_REQUEST['id']."'");
		
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
			$condition="Blogs_Id=".$_POST['id'];
		    $res=$db->updateValue('blogs',$tblfield,$tblvalues,$condition);
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
/// Delete row from Event table
///*******************************************************
if($_POST['type']=="delete")
{
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
	
		$res=$db->ExecuteQuery("SELECT Image_Path, Blogs_Id FROM blogs WHERE Blogs_Id='".$_REQUEST['id']."'");
	
		//Check HEre If Category  is used than you can not delete the row
		 if(count($res)>0)
		 {
			
				 $id=$_REQUEST['id'];
				 
				 //Delete event image row here
				$tblname="blogs";
				$condition="Blogs_Id=".$id;
				$res=$db->deleteRecords($tblname,$condition);
				if(!$res)
				{
					throw new Exception('0');
				}
			
			 //Delete All The Image 
			if($res[1]['Image_Path']!='' && file_exists($pathmulti.$res[1]['Image_Path']))
			{
				unlink($pathmulti.$res[1]['Image_Path']);
				unlink($pathmulti1.$res[1]['Image_Path']);
			}
			
			
	   }//Closed If Condition
		
		 
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

