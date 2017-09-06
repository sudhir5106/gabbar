<?php
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

 ///*******************************************************
/// Delete row from Plant table
///*******************************************************
if($_POST['type']=="delete")
{
	$id=explode(',',$_POST['id']);	
	//Check HEre If Category  is used than you can not delete the row
	 if(count($id)>0)
	 {
		 foreach($id as $val)
		 {
			$tblname="visitor_tracker";
			$condition="id=".$val;
			$res=$db->deleteRecords($tblname,$condition);
			
		 }
	 }
	
}