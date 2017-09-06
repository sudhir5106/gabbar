<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();

 $sql="Select Login_Id,Login_Name,Login_Password  from admin_login where Login_Name='".$_POST['user']."' and Login_Password='".$_POST['password']."'";
$res=$db->ExecuteQuery($sql);

if (!empty($res))
{
	if($res[1]['Login_Name']== $_POST['user'])
	{
		
		if($res[1]['Login_Password']== $_POST['password'])
		{
			 $_SESSION['admin_name']=$res[1]['Login_Name'];
			 $_SESSION['admin']=$res[1]['Login_Id'];
		
			echo "true";
		
		}
		else
		{
			
			echo "false";
			}
	}
	else
	{
	echo "false";
		}
	
}
  else
  {
      echo "false";
  }
?>