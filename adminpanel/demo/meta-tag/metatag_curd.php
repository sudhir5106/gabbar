<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

$pathmulti = ROOT."/image_upload/";
$pathmulti1 = ROOT."/image_upload/thumb/";

///*******************************************************
/// Validate that the data already exist or not
///*******************************************************
if($_POST['type']=="validate")
{

	$sql="SELECT Page_Url FROM meta_detail WHERE Page_URl='".$_POST['cate_name']."' and Meta_Id<>'".$_REQUEST['id']."'";
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
/// To Insert New category /////////////////////////////////
///*******************************************************
if($_POST['type']=="addDetail")
{
	
	    $tblfield=array('Page_Url','Page_Title','Page_Heading','Meta_Key','Meta_Description','HPage_Title','HPage_Heading','HMeta_Key','HMeta_Description');
		$tblvalues=array($_POST['page_url'],$_POST['page_title'],$_POST['page_heading'],$_POST['meta_keyword'],$_POST['meta_desc'],$_POST['h_page_title'],$_POST['h_page_heading'],$_POST['h_meta_keyword'],$_POST['h_meta_desc']);
		$res=$db->valInsert("meta_detail",$tblfield,$tblvalues);
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
/// Edit Sub category
///*******************************************************
if($_POST['type']=="editDetail")
{
	
		 $tblfield=array('Page_Url','Page_Title','Page_Heading','Meta_Key','Meta_Description','HPage_Title','HPage_Heading','HMeta_Key','HMeta_Description');
		$tblvalues=array($_POST['page_url'],$_POST['page_title'],$_POST['page_heading'],$_POST['meta_keyword'],$_POST['meta_desc'],$_POST['h_page_title'],$_POST['h_page_heading'],$_POST['h_meta_keyword'],$_POST['h_meta_desc']);
		$condition="Meta_Id=".$_POST['id'];
	 $res=$db->updateValue('meta_detail',$tblfield,$tblvalues,$condition);
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
/// Delete row from Plant table
///*******************************************************
if($_POST['type']=="delete")
{
		
	$res=$db->ExecuteQuery("Select Meta_Id FROM meta_detail  where Meta_Id='".$_POST['id']."'");
		
	//Check HEre If Category  is used than you can not delete the row
	 if(count($res)>0)
	 {
		
		$tblname="meta_detail";
		$condition="Meta_Id=".$_POST['id'];
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