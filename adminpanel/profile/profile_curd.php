<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/functions/fun1.php');
$db = new DBConn();

$pathmulti = ROOT."/image_upload/profile/";
$pathmulti1 = ROOT."/image_upload/profile/thumb/";
$db = new DBConn();

if($_POST['type']=="validate")
{
	$sql="SELECT Email FROM admin_login WHERE Email='".$_POST['email']."' AND Login_Id<>'".$_SESSION['admin']."'";
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


////////////////////////////////////////
/* insertion of new customer details */
////////////////////////////////////////
if($_POST['type']=="editProfile")
{
	/*print_r($_POST);
	exit;
	*/
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		
		//#####################################################################################
		//####################### LOGIN Insert Here Customer Details ##########################
		
		//$dob=date('Y-m-d',strtotime($_POST['birth']));
		$tblfield1=array('User_Name','Email','Mobile_No','Country','City','Job_Title','Website');
			
		$tblvalues1=array($_POST['username'],$_POST['email'],$_POST['mobile'],$_POST['country'],$_POST['city'],$_POST['job_title'],$_POST['website']);
		$condition=" Login_Id='".$_SESSION['admin']."'";
		$res=$db->updateValue('admin_login',$tblfield1,$tblvalues1,$condition);
	
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

////////////////////////////////////////
/* update here Image details */
////////////////////////////////////////
if($_POST['type']=="editImage")
{
	/*print_r($_FILES);
	exit;
	*/
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
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
				$resizeObj1 ->resizeImage(100,100,'auto');
				$resizeObj1 -> saveImage($pathmulti1.$gallary_image, 100);
				
			  }
			  
			  //Delete Old Image from folder
			  $remove=$db->ExecuteQuery("SELECT Profile_Image FROM admin_login WHERE Login_Id='".$_SESSION['admin']."'");
			  if($remove[1]['Profile_Image']!='' && $remove[1]['Profile_Image']!=0 && file_exists($pathmulti.$remove[1]['Profile_Image']))
			  {
			  		unlink($pathmulti.$remove[1]['Profile_Image']);
					unlink($pathmulti1.$remove[1]['Profile_Image']);
			  }
			  
		//Update Here Image 
		$tblfield1=array('Profile_Image');
			
		$tblvalues1=array($gallary_image);
		$condition=" Login_Id='".$_SESSION['admin']."'";
		$res=$db->updateValue('admin_login',$tblfield1,$tblvalues1,$condition);
	
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
			
///////////////////////////////////////////@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@////////////////////////////////////////////////////////////////////
//########################################################3 Change the password %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

if($_POST['type']=='chnagePasswd')
{
 if(@$_POST['oldpassword']!="" && $_POST['newpassword']!="" && $_POST['retypepassword']!="")
 {
	 $oldpass=trim($_POST['oldpassword']);
	 $newpassword=trim($_POST['newpassword']);
	 $retypepassword=trim($_POST['retypepassword']);
	$s="select Pwd from  customer_login where Login_Id='".$_SESSION['user']."'"	 ;
	$obj = $db->ExecuteQuery($s);
	if($obj[1]['Pwd']==$oldpass)
	{
		
		if($newpassword==$retypepassword)
		{
			if(strlen($newpassword)>=6)
			{
				$tblfield1=array('Pwd');
				$tblvalues1=array($newpassword);
				$condition=" Login_Id='".$_SESSION['user']."'";
				$db->updateValue('customer_login',$tblfield1,$tblvalues1,$condition);
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
?>