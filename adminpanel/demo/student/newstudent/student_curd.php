<?php 
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/functions/fun1.php');
$db = new DBConn();

$pathmulti = ROOT."/image_upload/student/";
$pathmulti1 = ROOT."/image_upload/student/thumb/";

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
/// To Insert New Student /////////////////////////////////
///*******************************************************
if($_POST['type']=="addNew")
{
	/*print_r($_POST);
	exit;*/
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	try{
			
		//Upload Here Profile Image	
		if($_REQUEST['imageval']==1)
		{
			$gallary = $_FILES['profile_image']['name'];
		
			$tmp2 = $_FILES['profile_image']['tmp_name'];
			//print_r($tmp2);
			$image=explode('.',$gallary);
			$gallary_image = time().'.'.$image[1]; // rename the file name
			if(move_uploaded_file($tmp2, $pathmulti.$gallary_image))
			  {
				// move the image in the thumb folder
				$resizeObj1 = new resize($pathmulti.$gallary_image);
				$resizeObj1 ->resizeImage(50,50,'auto');
				$resizeObj1 -> saveImage($pathmulti1.$gallary_image, 100);
				
			  }
		}
		else
		{
			//if Image Is Empty Than
			$gallary_image =$_REQUEST['profile_image'];
		}
			
			//insert Here table data
			$dob=date('y-m-d',strtotime($_POST['dob']));
			$join=date('y-m-d');
			$tblfield=array('First_Name','Middle_Name','Last_Name','DOB','Father_Name','Mother_Name','Guardian_Name','Roll_No','Collage','Qualification','Address','City','State','Country','Mobile','Other_Contact','Email','Join_Date','Profile_Image','Status','Gender');
			$tblvalues=array($_POST['fname'],$_POST['mname'],$_POST['lname'],$dob,$_POST['father'],$_POST['mother'],$_POST['guardian_name'],$_POST['roll_no'],$_POST['school'],$_POST['qualification'],$_POST['address'],$_POST['city'],$_POST['state'],$_POST['country'],$_POST['mobile'],$_POST['telephone'],$_POST['email'],$join,$gallary_image,1,$_POST['gender']);
			$res=$db->valInsert("students",$tblfield,$tblvalues);
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
/// Edit Student
///*******************************************************
if($_POST['type']=="editForm")
{
		
	/*print_r($_POST);
	exit;*/
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	try{
			
			//Upload Here Profile Image	
		if($_REQUEST['imageval']=='')
		{
			$gallary = $_FILES['profile_image']['name'];
		
			$tmp2 = $_FILES['profile_image']['tmp_name'];
			//print_r($tmp2);
			$image=explode('.',$gallary);
			$gallary_image = time().'.'.$image[1]; // rename the file name
			if(move_uploaded_file($tmp2, $pathmulti.$gallary_image))
			  {
				// move the image in the thumb folder
				$resizeObj1 = new resize($pathmulti.$gallary_image);
				$resizeObj1 ->resizeImage(50,50,'auto');
				$resizeObj1 -> saveImage($pathmulti1.$gallary_image, 100);
				
			  }
			  
			  //Delete Old Image from folder
			  $remove=$db->ExecuteQuery("SELECT Profile_Image FROM students WHERE Student_Id='".$_REQUEST['id']."'");
			  if(count($remove)>0 && file_exists($pathmulti.$remove[1]['Profile_Image']))
			  {
			  		unlink($pathmulti.$remove[1]['Profile_Image']);
					unlink($pathmulti1.$remove[1]['Profile_Image']);
			  }
			  
		}
		else
		{
			//if Image Is Empty Than
			$gallary_image =$_REQUEST['imageval'];
		}
			
			
			//update Here table data
			$dob=date('y-m-d',strtotime($_POST['dob']));
			$tblfield=array('First_Name','Middle_Name','Last_Name','DOB','Father_Name','Mother_Name','Guardian_Name','Roll_No','Collage','Qualification','Address','City','State','Country','Mobile','Other_Contact','Email','Profile_Image','Gender');
			$tblvalues=array($_POST['fname'],$_POST['mname'],$_POST['lname'],$dob,$_POST['father'],$_POST['mother'],$_POST['guardian_name'],$_POST['roll_no'],$_POST['school'],$_POST['qualification'],$_POST['address'],$_POST['city'],$_POST['state'],$_POST['country'],$_POST['mobile'],$_POST['telephone'],$_POST['email'],$gallary_image,$_POST['gender']);
			
			$condition="Student_Id=".$_POST['id'];
			$res=$db->updateValue('students',$tblfield,$tblvalues,$condition);
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
/// Delete row from Student table
///*******************************************************
if($_POST['type']=="delete")
{
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	try{
			
		//Check HEre Id is Exit or Not
		$res=$db->ExecuteQuery("SELECT Profile_Image FROM students WHERE Student_Id='".$_REQUEST['id']."'");
		
		if(!$res)
			{
				//echo mysql_error();
				throw new Exception('0');
			}
		
		 
		    
		//Check HEre If Category  is used than you can not delete the row
		 if(count($res)>0)
		 {
			
			$tblname="students";
			$condition="Student_Id=".$_POST['id'];
			$res2=$db->deleteRecords($tblname,$condition);
			if(!$res2)
			{
				//echo mysql_error();
				throw new Exception('0');
			}
			
		
			
			 //Delete Here Image From Folder
			if($res[1]['Profile_Image']!='' && file_exists($pathmulti.$res[1]['Profile_Image']))
			  {
					unlink($pathmulti.$res[1]['Profile_Image']);
					unlink($pathmulti1.$res[1]['Profile_Image']);
			  }
			
			
		 }
		 else
		 {
		
			echo 0;
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
/// Get HEre Courses Name
///*******************************************************
if($_POST['type']=="courseType")
{
	
	$slt=$db->ExecuteQuery("SELECT Course_Id, Course_Name FROM courses WHERE Coursetype_Id='".$_REQUEST['id']."'");
	echo '<option value="">Select Course Name</option>';
	foreach($slt as $val)
	{
		echo '<option value="'.$val['Course_Id'].'">'.$val['Course_Name'].'</option>';

	}
}
///*******************************************************
/// Get Here Subject Name
///*******************************************************
if($_POST['type']=="subjectList")
{
	/*print_r($_POST);
	exit;*/
	$slt=$db->ExecuteQuery("SELECT Subject_Id, Subject_Name FROM subjects WHERE Course_Id='".$_REQUEST['id']."'");
	echo '<option value="">Select Subject Name</option>';
	foreach($slt as $val)
	{
		echo '<option value="'.$val['Subject_Id'].'">'.$val['Subject_Name'].'</option>';

	}
}

///*******************************************************
/// Get Here Batch Name
///*******************************************************
if($_POST['type']=="batchList")
{
	/*print_r($_POST);
	exit;*/
	$slt=$db->ExecuteQuery("SELECT Batch_Id, Batch_Name FROM batches WHERE Course_Id='".$_REQUEST['id']."'");
	echo '<option value="">Select Batch Name</option>';
	foreach($slt as $val)
	{
		echo '<option value="'.$val['Batch_Id'].'">'.$val['Batch_Name'].'</option>';

	}
}
 ///*******************************************************
/// Get HEre State Name
///*******************************************************
if($_POST['type']=="getState")
{
	
	$slt=$db->ExecuteQuery("SELECT id, name FROM states WHERE country_id='".$_REQUEST['id']."'");
	echo '<option value="">Select State Name</option>';
	foreach($slt as $val)
	{
		echo '<option value="'.$val['id'].'">'.$val['name'].'</option>';

	}
}
///*******************************************************
/// Get HEre City Name
///*******************************************************
if($_POST['type']=="getCity")
{
	
	$slt=$db->ExecuteQuery("SELECT id, name FROM cities WHERE state_id='".$_REQUEST['id']."'");
	echo '<option value="">Select City Name</option>';
	foreach($slt as $val)
	{
		echo '<option value="'.$val['id'].'">'.$val['name'].'</option>';

	}
}
