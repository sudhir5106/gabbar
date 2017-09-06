<?php 
include('../../config.php'); 
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
require_once(PATH_LIBRARIES.'/functions/fun1.php');
$db = new DBConn();

$pathmulti = ROOT."/image_upload/product/";
$pathmulti1 = ROOT."/image_upload/product/thumb/";


///*******************************************************
/// Validate that the data already exist or not
///*******************************************************
if($_POST['type']=="validate")
{
	 $sql="Select Product_Name from product_master where Subcategory_Id='".$_POST['subcategory']."' and Category_Id='".$_POST['category']."' AND Product_Name='".$_POST['product_name']."' AND Product_Id<>'".$_POST['product_id']."'";
	  $res=$db->ExecuteQuery($sql);
	
	if(empty($res))
    {
 		echo 1;
    }
	else
	{
		echo 0;
	}

}


///*******************************************************
/// To Insert New Proudct Name ///////////////////////////
///*******************************************************
if($_POST['type']=="addNew")
{
	
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	try{
			
		//Insert Image Here 
		$gallary = $_FILES['imageupload']['name'];
		//print_r($gallary);
		$i=0;
		foreach($gallary as $gallaryval)
		{
			
			$tmp2 = $_FILES['imageupload']['tmp_name'];
			$image=explode('.',$gallaryval);
			$gallary_image = time().$i.'.'.$image[1]; // rename the file name
			
			if(move_uploaded_file($tmp2[$i], $pathmulti.$gallary_image))
			{
				// move the image in the thumb folder
				$resizeObj1 = new resize($pathmulti.$gallary_image);
				$resizeObj1 ->resizeImage(300,300,'auto');
				$resizeObj1 -> saveImage($pathmulti1.$gallary_image, 300);
				
				/*$CheckQuery=$db->ExecuteQuery("SELECT Product_Image_Id FROM product_image WHERE Main_Image=1 AND Product_Id='".$last_id."'");
				
				if(count($CheckQuery)==0)
				{			
					$sql1="insert into product_image(Image_Path,Main_Image,	Product_Id) values('".$gallary_image."','1','".$last_id."')";
				}else{
					$sql1="insert into product_image(Image_Path, Product_Id) values('".$gallary_image."','".$last_id."')";
				
				}*/
				
				
				//Data insertion into DB
				$tblfield=array('Product_Image','Category_Id');
				$tblvalues=array($gallary_image,$_POST['categoryId']);
				$res=$db->valInsert("product_master",$tblfield,$tblvalues);
				
				if(!$res)
				{
					//echo mysql_error();
					throw new Exception('0');
				}	
				
				
				
			/*$res1=mysql_query($sql1);
			if(!$res1)
			{
				//echo mysql_error();
				throw new Exception('0');
			}*/
		
				$i++;
			}
		}//end of foreach
			
	
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
/// Delete row from Product table
///*******************************************************
if($_POST['type']=="delete")
{
	
	$productIds = $_POST['delete_id'];
	$productIdArr = explode(',',$productIds);
	
	$con= mysql_connect(SERVER,DBUSER,DBPASSWORD);
	mysql_query('SET AUTOCOMMIT=0',$con);
	mysql_query('START TRANSACTION',$con);
	try{

		foreach($productIdArr as $productId){
		
	   		$res=$db->ExecuteQuery("SELECT Product_Image FROM product_master WHERE Product_Id=".$productId);
	
			//After All Images Is delete  Then Product Deleted
			$tblname="product_master";
			$condition="Product_Id=".$productId;
			$res3=$db->deleteRecords($tblname,$condition);
			
			//Delete All The Image 
			//$pathmulti = ROOT."/image_upload/product/";
			//$pathmulti1 = ROOT."/image_upload/product/thumb/";
			
			if($res[1]['Product_Image']!='' && file_exists($pathmulti.$res[1]['Product_Image']))
			{
				unlink($pathmulti.$res[1]['Product_Image']);
				unlink($pathmulti1.$res[1]['Product_Image']);
			} 
		
	   }//eof foreach loop
		
		if(!$res3)
		{
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
/// Search Product category wise /////////////////////////
///*******************************************************
if($_POST['type']=="searchList")
{
	 $sql="SELECT Product_Id, Product_Image, Category_Name FROM product_master P
  		INNER JOIN categories C ON P.Category_Id = C.Category_Id 
		WHERE P.Category_Id = ".$_POST['categoryId']."
		ORDER BY Product_Id DESC";
		//exit();

	$getproduct=$db->ExecuteQuery($sql);
?>

<form name="planresult" id="planresult">
  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th width="30"><input type="checkbox" id="selecctall" /></th>
        <th width="30">SNo.</th>
        <th width="100">Image</th>
        <th>Product Category</th>
      </tr>
    </thead>
    <tbody>
      <?php 
	  $i = 1;		
	foreach($getproduct as $value)
	{ 
	?>		 
      <tr>
        <td><input class="delete1" type="checkbox" id="<?php echo $value['Product_Id'];?>" /></td>
        <td><?php echo $i;?></td>
        <td><img src="<?php echo PATH_UPLOAD_IMAGE."/product/thumb/".$value['Product_Image'];?>" width="80" /></td>
        <td><?php echo $value['Category_Name'];?></td>
      </tr>
      <?php $i++;} ?>

        </tbody>
  </table>
</form>
	
<?php } ?>