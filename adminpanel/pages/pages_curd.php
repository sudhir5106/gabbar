<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/functions/fun1.php');
$db = new DBConn();

$pathproject = ROOT."/image_upload/pages/";
$pathproject1 = ROOT."/image_upload/pages/thumb/";
///*******************************************************
/// Validate that the data already exist or not
///*******************************************************
if($_POST['type']=="validate")
{

	$sql="SELECT 1 FROM pages WHERE Menu_Id='".$_POST['menu_id']."' and Pages_Id<>'".$_REQUEST['id']."'";
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
/// To Insert Image /////////////////////////////////
///*******************************************************
if($_POST['type']=="image")
{
	/*print_r($_POST);
	exit;*/
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		//Image Name
		$gallary = $_FILES['imageupload']['name'];
		
		//TEmp Image Image
		$tmp2 = $_FILES['imageupload']['tmp_name'];
	
		$image=explode('.',$gallary);
		$gallary_image = time().'.'.$image[1]; // rename the file name
		if(move_uploaded_file($tmp2, $pathproject.$gallary_image))
		{
			// move the image in the thumb folder
			$resizeObj1 = new resize($pathproject.$gallary_image);
			$resizeObj1 ->resizeImage(200,200,'auto');
			$resizeObj1 -> saveImage($pathproject1.$gallary_image, 100);
		}
		else
		{
			throw new Exception('0');
		}
			//Update Here Image Path Link
			/*$image=$db->EXecuteQuery("SELECT Pages_Id,Image_Path FROM pages WHERE Pages_Id='".$_POST['id']."'");
			if(count($image)>0)
			{
				//Delete Image Old Image
				//unlink($pathproject.$image[1]['Image_Path']);
				//unlink($pathproject1.$image[1]['Image_Path']);
			    
				//Update HEre New Image Path
				$tblfield=array('Image_Path');
				$tblvalues=array($gallary_image);
				$condition="Pages_Id=".$_POST['id'];
		 		$res=$db->updateValue('pages',$tblfield,$tblvalues,$condition);
				if(!$res)
				{
					//echo mysql_error();
					throw new Exception('0');
				}
				
			
			
			}*/
	   
	   echo     'http://'.$_SERVER['SERVER_NAME'].PATH_UPLOAD_IMAGE.'/pages/'.$gallary_image;
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
/// To Insert New Pages /////////////////////////////////
///*******************************************************
if($_POST['type']=="addPages")
{
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		//Get Here File Name Exits or not
		if($_POST['menu_id']!='')
		{
			$getmenu=$db->ExecuteQuery("SELECT File_Name FROM menu WHERE Menu_Id='".$_POST['menu_id']."' AND Defualt_Menu IS NULL ");
		
			//Get HEre MEnu Details
			if(count($getmenu)>0)
			{
				$filename=trim($getmenu[1]['File_Name']);
				if(!file_exists(ROOT.'/'.$filename))
				{
					$handle = fopen(ROOT.'/'.$filename, 'w') or die('Cannot open file:  '.$filename); 
					
					// Open the file to get existing content
					$current = file_get_contents(ROOT.'/'.$filename);
					// Append a new person to the file
					$current .= '<?php 
						include("config.php");
						require_once(PATH_LIBRARIES."/classes/DBConn.php");
						$db = new DBConn();
						require_once(PATH_INCLUDE."/header.php");
						
						foreach($getMenu as $val2){
							if(basename(__FILE__)==$val2["File_Name"]){  $pagename=$val2["Menu_Name"]; $menu=$val2["Menu_Id"]; }
						}
						
						//get Here Page Details
						$getPage=$db->ExecuteQuery("SELECT * FROM pages WHERE Menu_Id=$menu");
						
						?>
    		<!-- Page header Section Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="entry-title"><?php echo $pagename;?></h2>
                    <div class="breadcrumb">
                        <a href="#"><i class="icon-home"></i> Home</a>
                        <span class="crumbs-spacer"><i class=
                        "ico-fast-forward"></i></span> <span class=
                        "current"><?php echo $pagename;?></span>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Page header Section End -->
    <!-- Content Start -->
    <div id="content">
        <?php echo $getPage[1]["Details"]; ?>
    </div>
	<!-- Content End -->
   
<?php 
require_once(PATH_INCLUDE."/footer.php");

?>
';
					// Write the contents back to the file
					file_put_contents(ROOT.'/'.$filename, $current);
					
					
				}
			
				//GEt HEre PAge Name
				$tblfield=array('Menu_Id','Details');
				$tblvalues=array($_POST['menu_id'],$_POST['details']);
				$res=$db->valInsert("pages",$tblfield,$tblvalues);
				if(!$res)
				{
					//echo mysql_error();
					throw new Exception('0');
				}
     	
			
			}
		}
		
		mysql_query("COMMIT",$con);
		
	   echo 1;
			
	}
	catch(Exception $e)
	{
		echo  $e->getMessage();
		mysql_query('ROLLBACK',$con);
		mysql_query('SET AUTOCOMMIT=1',$con);
	}
}

///*******************************************************
/// Edit Pages
///*******************************************************
if($_POST['type']=="editPages")
{
	
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		
		$getmenu=$db->ExecuteQuery("SELECT File_Name FROM menu WHERE Menu_Id='".$_POST['menu_id']."' AND Defualt_Menu IS NULL ");
		
			//Get HEre MEnu Details
			if(count($getmenu)>0)
			{
				$filename=trim($getmenu[1]['File_Name']);
				if(!file_exists(ROOT.'/'.$filename))
				{
					$handle = fopen(ROOT.'/'.$filename, 'w') or die('Cannot open file:  '.$filename); 
					
					// Open the file to get existing content
					$current = file_get_contents(ROOT.'/'.$filename);
					// Append a new person to the file
					$current .= '<?php 
						include("config.php");
						require_once(PATH_LIBRARIES."/classes/DBConn.php");
						$db = new DBConn();
						require_once(PATH_INCLUDE."/header.php");
						
						foreach($getMenu as $val2){
							if(basename(__FILE__)==$val2["File_Name"]){  $pagename=$val2["Menu_Name"]; $menu=$val2["Menu_Id"]; }
						}
						
						//get Here Page Details
						$getPage=$db->ExecuteQuery("SELECT * FROM pages WHERE Menu_Id=$menu");
						
						?>
    		<!-- Page header Section Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="entry-title"><?php echo $pagename;?></h2>
                    <div class="breadcrumb">
                        <a href="#"><i class="icon-home"></i> Home</a>
                        <span class="crumbs-spacer"><i class=
                        "ico-fast-forward"></i></span> <span class=
                        "current"><?php echo $pagename;?></span>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Page header Section End -->
    <!-- Content Start -->
    <div id="content">
        <?php echo $getPage[1]["Details"]; ?>
    </div>
	<!-- Content End -->
   
<?php 
require_once(PATH_INCLUDE."/footer.php");

?>
';
					// Write the contents back to the file
					file_put_contents(ROOT.'/'.$filename, $current);
					
					
				}
			
			}
		
		
	     $tblfield=array('Menu_Id','Details');
		 $tblvalues=array($_POST['menu_id'],$_POST['details']);
		 $condition="Pages_Id=".$_POST['id'];
		 $res=$db->updateValue('pages',$tblfield,$tblvalues,$condition);
     	if(!$res)
		{
			//echo mysql_error();
			throw new Exception('0');
		}
     	
		mysql_query("COMMIT",$con);
			
	   echo 1;
	}
	catch(Exception $e)
	{
		echo  $e->getMessage();
		mysql_query('ROLLBACK',$con);
		mysql_query('SET AUTOCOMMIT=1',$con);
	}
}


 ///*******************************************************
/// Delete row from Pages table
///*******************************************************
if($_POST['type']=="delete")
{
	$getmenu=$db->ExecuteQuery("SELECT M.File_Name FROM pages P INNER JOIN menu M ON M.Menu_Id=P.Menu_Id WHERE P.Pages_Id='".$_POST['id']."' AND Defualt_Menu IS NULL ");
		
			//Get HEre MEnu Details
			if(count($getmenu)>0)
			{
				$filename=trim($getmenu[1]['File_Name']);
				
				$tblname="pages";
				$condition="Pages_Id=".$_POST['id'];
				$res=$db->deleteRecords($tblname,$condition);
				if($res)
				{
					if(file_exists(ROOT.'/'.$filename))
					{
		
						unlink(ROOT.'/'.$filename);
						echo 1;
					}
				}
				else
				{
					echo 0;
				}
					
			}
			
}