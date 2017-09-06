<?php 
include('../../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/functions/fun1.php');
$db = new DBConn();

$pathmulti = ROOT."/image_upload/slider/";
//$pathmulti1 = ROOT."/image_upload/slider/thumb/";


///*******************************************************
/// To Insert New category /////////////////////////////////
///*******************************************************
if($_POST['type']=="addImageupload")
{	
	
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		
		$gallary = $_FILES['imageupload']['name'];
		//print_r($gallary);
		$i=0;
		foreach($gallary as $gallaryval)
		{
		
		$tmp2 = $_FILES['imageupload']['tmp_name'];
		//print_r($tmp2);
		$image=explode('.',$gallaryval);
		$gallary_image = time().'.'.$image[1]; // rename the file name
		if(move_uploaded_file($tmp2[$i], $pathmulti.$gallary_image))
		 {
								
			 $sql1="insert into slider(Image,Title,Position,Description)VALUES('".$gallary_image."','".$_POST['title']."','".$_POST['position']."','".$_POST['desc']."')";
						
			$res1=mysql_query($sql1);
			if(!$res1)
			{
				//echo mysql_error();
				throw new Exception('0');
			}
				
					$i++;
	   	 }
		}//end of foreach
	
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
/// Edit Sub category
///*******************************************************
if($_POST['type']=="editImageupload")
{
	
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	
	try
	{
		if($_POST['imgval']==1)
		{
			
			$gallary = $_FILES['imageupload2']['name'];
			
			$tmp2 = $_FILES['imageupload2']['tmp_name'];
			//print_r($tmp2);
			$image=explode('.',$gallary);
			$gallary_image = time().'.'.$image[1]; // rename the file name
			move_uploaded_file($tmp2, $pathmulti.$gallary_image);
			
			//GEt Here Update Image When Uplaod new image
			$res=$db->ExecuteQuery("Select Image FROM slider  where Id=".$_POST['id']."");
	
			//Check image exist or not
			 if(count($res)>0 && file_exists($pathmulti.$res[1]['Image']))
			 {
				unlink($pathmulti.$res[1]['Image']);
				//unlink($pathmulti1.$image['Image']);
			 }
		}
		else
		{
			$gallary_image=$_POST['oldimage'];
		
		}
		
		
			$tblfield=array('Image','Title','Position','Description');
			$tblvalues=array($gallary_image,$_POST['title'],$_POST['position'],$_POST['desc']);
			 $condition=" Id=".$_POST['id'];
			 $res=$db->updateValue('slider',$tblfield,$tblvalues,$condition);
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
/// Delete row from Plant table
///*******************************************************
if($_POST['type']=="delete")
{
	$res=$db->ExecuteQuery("Select Image FROM slider  where Id=".$_POST['id']."");
	
	//Check image exist or not
	 if(count($res)>0)
	 {
		unlink($pathmulti.$res[1]['Image']);
		//unlink($pathmulti1.$image['Image']);
		
		$tblname="slider";
		$condition=" Id=".$_POST['id'];
		$res=$db->deleteRecords($tblname,$condition);
		if($res)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	 }
	 else
	 {
	
		echo 0;
	}
}
///*******************************************************
/// Onchange Langauge
///*******************************************************
if($_POST['type']=="getCategory")
{

	$sql="SELECT Category_Name, Category_Id FROM category WHERE  Langauge='".$_REQUEST['id']."'";
	$res=$db->ExecuteQuery($sql);
	
	echo '<option value="">Select Category</option>';
	foreach($res as $val)
	{
		echo '<option value="'.$val['Category_Id'].'">'.$val['Category_Name'].'</option>';
	
	}
	

}

///*******************************************************
/// Onchange Category
///*******************************************************
if($_POST['type']=="getSubcategory")
{

	$sql="SELECT Sub_Name, Sub_Id FROM sub_category WHERE  Category_Id='".$_REQUEST['id']."'";
	$res=$db->ExecuteQuery($sql);
	
	echo '<option value="">Select Subcategory</option>';
	foreach($res as $val)
	{
		echo '<option value="'.$val['Sub_Id'].'">'.$val['Sub_Name'].'</option>';
	
	}
	

}
///*******************************************************
/// Delete gallery Images
///*******************************************************
if($_POST['type']=="deletegallerymultiimg")
{
	
 foreach($_POST['id'] as $deleteVal)
 {
	  
		$sql="SELECT Image_Path FROM image_upload WHERE Image_Id =".$deleteVal;
		$imagename=$db->ExecuteQuery($sql);
		
		$tblname="image_upload";
		$condition="Image_Id =".$deleteVal;
		$res=$db->deleteRecords($tblname,$condition);
		foreach($imagename as $image)
		{
			if($image['Image_Path']!="")
				{
				unlink($pathmulti.$image['Image_Path']);
				unlink($pathmulti1.$image['Image_Path']);
			    }
		}
		
 }
}

///*******************************************************
/// make main image
///*******************************************************
if($_POST['type']=="makemainimage")
{
	
     $res1=mysql_query("update image_upload set MainImage=0 WHERE Sub_Id='".$_POST['book_id']."'");	
	 $res=mysql_query("update image_upload set MainImage=1 where Sub_Id='".$_POST['book_id']."' AND Image_Id=".$_POST['id']."");
	 		
	if(empty($res))
		{
		  echo 0;
		}
		else
		{
		  echo 1;
		}
} 

//*****************************************************
// Image Showing
//*****************************************************
if($_POST['type']=='imageShow')
{
	
	////////Get Gallery Image
$gallery_list=$db->ExecuteQuery("SELECT * FROM image_upload WHERE Sub_Id='".$_POST['subcategory']."'");

if($gallery_list)
{	
?>
<div class="form-group">
                <div class="col-sm-12">
                  <input title="Select All" type="checkbox" id="selecctallgallery"/>
                  <button title="Delete" type="button" class="btn btn-danger btn-sm " id="deletegalleryimage" name="deletegalleryimage"> <span class="glyphicon glyphicon-trash"></span> Delete All</button>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <?php 
                     $i=1;
                      foreach($gallery_list as $value){ 
                       ?>
                  <div class="col-sm-3 bg-success imgBlck">
                    <div>
                      <input title="Set As Base Image" type="radio" class="select mainimage" name="mainimage"  value="<?php echo $value['Image_Id'];?>" <?php if($value['MainImage']==1){ echo "checked ";}?> />
                      Base Image </div>
                    <div class="galleryImg"><img width="80px" src="<?php echo PATH_UPLOAD_IMAGE."/thumb/".$value['Image_Path'];?>" alt="" /></div>
                    <div>
                     
                    </div>
                    <div>
                      <?php if($value['MainImage']!=1){?>
                      <input type="checkbox" class="deletegallery" id="<?php echo $value['Image_Id'];?>"/>
                      <?php } ?>
                      <!--<button type="button" class="btn btn-danger btn-sm delete" id="<?php echo $value['Id']; ?>" name="delete"> <span class="glyphicon glyphicon-trash"></span></button>-->
                    </div>
                  </div>
                  <?php $i++;}
                      ?>
 </div>
 <?php } }?>