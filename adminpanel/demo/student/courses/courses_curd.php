<?php 
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/functions/fun1.php');
$db = new DBConn();


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

///*******************************************************
/// To Insert New Enrolled ID  /////////////////////////////////
///*******************************************************
if($_POST['type']=="addSubject")
{
	
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	try{
			$subject=explode(',',$_POST['subject_name']);
			$enrolled_for=explode(',',$_POST['enrolled_for']);
			$course_name=explode(',',$_POST['course_name']);
			$batch_name=explode(',',$_POST['batch_name']);
			$sdate=explode(',',$_POST['start_date']);
			
			$i=0;
			foreach($enrolled_for as $val)
			{
				$date=date('Y-m-d',strtotime($sdate[$i]));
				//insert Here table data
				$tblfield=array('Student_Id','Enrolled_For','Course_Name','Subject_Name','Batch_Name','DOA');
				$tblvalues=array($_POST['student_name'],$val,$course_name[$i],$subject[$i],$batch_name[$i],$date);
				$res=$db->valInsert("student_enrolled",$tblfield,$tblvalues);
				
				if(!$res)
				{
					//echo mysql_error();
					throw new Exception('0');
				}
				$i++;
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
/// Edit Student Enrolled ID
///*******************************************************
if($_POST['type']=="editSubject")
{
		
	/*print_r($_POST);
	exit;*/
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	try{
			$date=date('Y-m-d',strtotime($_POST['start_date']));
			//update Here table data
			$tblfield=array('Student_Id','Enrolled_For','Course_Name','Subject_Name','Batch_Name','DOA');
			$tblvalues=array($_POST['student_name'],$_POST['enrolled_for'],$_POST['course_name'],$_POST['subject_name'],$_POST['batch_name'],$date);
			$condition="Enrolled_Id=".$_POST['id'];
			$res=$db->updateValue('student_enrolled',$tblfield,$tblvalues,$condition);
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
/// Delete row from Student Enrolled table
///*******************************************************
if($_POST['type']=="subjectDelete")
{
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	try{
			
		
			$tblname="student_enrolled";
			$condition="Enrolled_Id=".$_POST['id'];
			$res2=$db->deleteRecords($tblname,$condition);
			if(!$res2)
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

