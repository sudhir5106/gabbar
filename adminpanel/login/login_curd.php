<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/functions/fun1.php');
$db = new DBConn();

///////////////////////////////////////////@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@////////////////////////////////////////////////////////////////////
//########################################################3 Change the password %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

if($_POST['type']=='chnagePasswd')
{
	/*print_r($_POST);
	exit;*/
	
 if(@$_POST['oldpassword']!="" && $_POST['newpassword']!="" && $_POST['retypepassword']!="")
 {
	 $oldpass=trim($_POST['oldpassword']);
	 $newpassword=trim($_POST['newpassword']);
	 $retypepassword=trim($_POST['retypepassword']);
	 $s="select Login_Password from  admin_login where Login_Id='".$_SESSION['admin']."'"	 ;
	$obj = $db->ExecuteQuery($s);
	if($obj[1]['Login_Password']==$oldpass)
	{
		
		if($newpassword==$retypepassword)
		{
			if(strlen($newpassword)>=6)
			{
				$tblfield1=array('Login_Password');
				$tblvalues1=array($newpassword);
				$condition=" Login_Id='".$_SESSION['admin']."'";
				$db->updateValue('admin_login',$tblfield1,$tblvalues1,$condition);
				echo 1;
			}
			else
				echo 'New Password Length is less than 6 char';	
		}
		else
			echo 'New Password Not Match With Rtype Password';
		
	}
	else
		echo 'Old Password Is Wrong';
 }
}