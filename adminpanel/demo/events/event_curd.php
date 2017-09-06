<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/functions/fun1.php');
$db = new DBConn();

$pathmulti = ROOT."/image_upload/event/";
$pathmulti1 = ROOT."/image_upload/event/thumb/";

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
/// To Insert New  Event Details/////////////////////////
///*******************************************************
if($_POST['type']=="addNew")
{	
	
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		// First Insert Here Event details
		$start_date=date('Y-m-d',strtotime($_POST['start_date']));
		$end_date=date('Y-m-d',strtotime($_POST['end_date']));
		
		$tblfield=array('Title','Start_Date','End_Date','Start_Time','End_Time','Description','Status');
		$tblvalues=array($_POST['title'],$start_date,$end_date,$_POST['start_time'],$_POST['end_time'],$_POST['desc'],1);
			$res=$db->valInsert("events",$tblfield,$tblvalues);
			if(!$res)
			{
				//echo mysql_error();
				throw new Exception('0');
			}
	 	
	
		$lastid=mysql_insert_id();
	
		//Image Upload HEre 
		$gallary = $_FILES['imageupload']['name'];
		//print_r($gallary);
		
		$i=0;
		foreach($gallary as $gallaryval)
		{
		
		$tmp2 = $_FILES['imageupload']['tmp_name'];
		//print_r($tmp2);
		$image=explode('.',$gallaryval);
		$gallary_image = time().$i.'.'.$image[1]; // rename the file name
		if(move_uploaded_file($tmp2[$i], $pathmulti.$gallary_image))
					{
						// move the image in the thumb folder
						$resizeObj1 = new resize($pathmulti.$gallary_image);
						$resizeObj1 ->resizeImage(100,100,'auto');
						$resizeObj1 -> saveImage($pathmulti1.$gallary_image, 100);
						$CheckQuery=$db->ExecuteQuery("SELECT Event_Image_Id FROM event_image WHERE Main_Image=1 AND Event_Id='".$lastid."'");
						
						if(count($CheckQuery)==0)
						{			
							$sql1="insert into event_image(Image_Path,Main_Image,Event_Id) values('".$gallary_image."','1','".$lastid."')";
						}else{
							$sql1="insert into event_image(Image_Path,Event_Id) values('".$gallary_image."','".$lastid."')";
						
						}
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
/// Edit Sub news
///*******************************************************
if($_POST['type']=="editForm")
{	
	
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		// First Insert Here Event details
		$start_date=date('Y-m-d',strtotime($_POST['start_date']));
		$end_date=date('Y-m-d',strtotime($_POST['end_date']));
		
		$tblfield=array('Title','Start_Date','End_Date','Start_Time','End_Time','Description','Status');
		$tblvalues=array($_POST['title'],$start_date,$end_date,$_POST['start_time'],$_POST['end_time'],$_POST['desc'],1);
		$condition="Event_Id=".$_POST['id'];
		$res=$db->updateValue('events',$tblfield,$tblvalues,$condition);
			
		if(!$res)
		{
			//echo mysql_error();
			throw new Exception('0');
		}
	 	
	
		$lastid=$_REQUEST['id'];
		
		//Check Here If Any New Images Upload Or Not 
		if($_REQUEST['image']==1)
		{
			//Image Upload HEre 
			$gallary = $_FILES['imageupload']['name'];
			
			$i=0;
			foreach($gallary as $gallaryval)
			{
			
			$tmp2 = $_FILES['imageupload']['tmp_name'];
			//print_r($tmp2);
			$image=explode('.',$gallaryval);
			$gallary_image = time().$i.'.'.$image[1]; // rename the file name
			if(move_uploaded_file($tmp2[$i], $pathmulti.$gallary_image))
						{
							// move the image in the thumb folder
							$resizeObj1 = new resize($pathmulti.$gallary_image);
							$resizeObj1 ->resizeImage(100,100,'auto');
							$resizeObj1 -> saveImage($pathmulti1.$gallary_image, 100);
							$CheckQuery=$db->ExecuteQuery("SELECT Event_Image_Id FROM event_image WHERE Main_Image=1 AND Event_Id='".$lastid."'");
							
							if(count($CheckQuery)==0)
							{			
								$sql1="insert into event_image(Image_Path,Main_Image,Event_Id) values('".$gallary_image."','1','".$lastid."')";
							}else{
								$sql1="insert into event_image(Image_Path,Event_Id) values('".$gallary_image."','".$lastid."')";
							
							}
						 $res1=mysql_query($sql1);
						if(!$res1)
						{
							//echo mysql_error();
							throw new Exception('0');
						}
					
						$i++;
				}
			}//end of foreach
		 }//If Condition
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
/// Update Status Event Status 
///*******************************************************
if($_POST['type']=="CheckStatus")
{
		$mysql=$db->ExecuteQuery("SELECT Status FROM events WHERE Event_Id='".$_REQUEST['id']."'");
		
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
			$condition="Event_Id=".$_POST['id'];
		    $res=$db->updateValue('events',$tblfield,$tblvalues,$condition);
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
	
		$res=$db->ExecuteQuery("SELECT Image_Path, Event_Image_Id FROM event_image WHERE Event_Id='".$_REQUEST['id']."'");
	
		//Check HEre If Category  is used than you can not delete the row
		 if(count($res)>0)
		 {
			foreach($res as $val)
			{
				 $id=$val['Event_Image_Id'];
				 
				 //Delete event image row here
				$tblname="event_image";
				$condition="Event_Image_Id=".$id;
				$res=$db->deleteRecords($tblname,$condition);
				if(!$res)
				{
					throw new Exception('0');
				}
			
			 //Delete All The Image 
			if($val['Image_Path']!='' && file_exists($pathmulti.$val['Image_Path']))
			{
				unlink($pathmulti.$val['Image_Path']);
				unlink($pathmulti1.$val['Image_Path']);
			}
			
			
		 }//Closed Foreach Loop
	   }//Closed If Condition
		 
		 //Delete Here Event Row
			$tblname="events";
			$condition="Event_Id=".$_REQUEST['id'];
			$res=$db->deleteRecords($tblname,$condition);
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
/// Delete gallery Images
///*******************************************************
if($_POST['type']=="deletegallerymultiimg")
{
	
 foreach($_POST['id'] as $deleteVal)
 {
	  
		$sql="SELECT Image_Path FROM event_image WHERE Event_Image_Id =".$deleteVal;
		$imagename=$db->ExecuteQuery($sql);
		
		$tblname="event_image";
		$condition="Event_Image_Id =".$deleteVal;
		$res=$db->deleteRecords($tblname,$condition);
		foreach($imagename as $image)
		{
			if($image['Image_Path']!="")
				{
				unlink($pathmulti.$image['Image_Path']);
				unlink($pathmulti1.$image['Image_Path']);
			    }
		}
		
 }
}

///*******************************************************
/// make main image
///*******************************************************
if($_POST['type']=="makemainimage")
{
	
     $res1=mysql_query("update event_image set Main_Image=0 WHERE Event_Id='".$_POST['event_id']."'");	
	 $res=mysql_query("update event_image set Main_Image=1 where Event_Id='".$_POST['event_id']."' AND Event_Image_Id=".$_POST['id']."");
	 		
	if(empty($res))
		{
		  echo 0;
		}
		else
		{
		  echo 1;
		}
} 
