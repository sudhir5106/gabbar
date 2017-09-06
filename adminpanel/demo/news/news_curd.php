<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

$pathmulti = ROOT."/image_upload/";
$pathmulti1 = ROOT."/image_upload/thumb/";

///*******************************************************
/// To Insert New News & Updates//////////////////////////
///*******************************************************
if($_POST['type']=="addNews")
{
		$date=date('Y-m-d',strtotime($_POST['date']));
	
	    $tblfield=array('Heading','Date','Description','Status');
		$tblvalues=array($_POST['heading'],$date,$_POST['desc'],1);
		$res=$db->valInsert("news",$tblfield,$tblvalues);
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
/// Edit Sub news
///*******************************************************
if($_POST['type']=="editNews")
{
		/*print_r($_POST);
		exit;*/
		$date=date('Y-m-d',strtotime($_POST['date']));
	
	    $tblfield=array('Heading','Date','Description','Status');
		$tblvalues=array($_POST['heading'],$date,$_POST['desc'],1);
		$condition="Id=".$_POST['id'];
		 $res=$db->updateValue('news',$tblfield,$tblvalues,$condition);
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

///*******************************************************
/// Update Status
///*******************************************************
if($_POST['type']=="CheckStatus")
{
		$mysql=$db->ExecuteQuery("SELECT * FROM news WHERE Id='".$_REQUEST['id']."'");
		
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
			$condition="Id=".$_POST['id'];
		    $res=$db->updateValue('news',$tblfield,$tblvalues,$condition);
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
			
	$res=$db->ExecuteQuery("Select Id FROM news  where Id='".$_POST['id']."'");
		
	//Check HEre If Category  is used than you can not delete the row
	 if(count($res)>0)
	 {
		
		$tblname="news";
		$condition="Id=".$_POST['id'];
		$res=$db->deleteRecords($tblname,$condition);
		if($res)
		{
			echo 1;
		}
		else
		{
			//echo mysql_error();
			echo 0;
		}
	 }
	 else
	 {
	
		echo 0;
	}
}