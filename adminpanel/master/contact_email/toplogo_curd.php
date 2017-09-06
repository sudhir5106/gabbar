<?php 
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/functions/fun1.php');
$db = new DBConn();

if($_POST['type']=="addCategory")
{
	
/*print_r($_POST);
	exit;
	*/
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		
	//GEt Here List Of 
	 $tblfield=array('Email_Id');
	 $tblvalues=array($_POST['email']);
	 $condition=" Contact_Id=".$_POST['id'];
	 $res=$db->updateValue('contact_email',$tblfield,$tblvalues,$condition);
	 if(!$res)
		{
			//echo mysql_error();
			throw new Exception('0');
		}
		
		
		mysql_query("COMMIT",$con);
		echo 1;
		
	}
	catch(Exception $e){
		echo  $e->getMessage();
		mysql_query('ROLLBACK',$con);
		mysql_query('SET AUTOCOMMIT=1',$con);
	}
}
