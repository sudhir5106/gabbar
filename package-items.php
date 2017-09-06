<?php 
	include("config.php");
	require_once(PATH_LIBRARIES."/classes/DBConn.php");
	$db = new DBConn();
	require_once(PATH_INCLUDE."/header.php");
	
	$pkgid=$_GET['pkgid'];
	
	//GET PACKAGE NAME
	$getpkgname = $db->ExecuteQuery("SELECT Package_Id, Package_Name, New_Price FROM packages WHERE Package_Id =".$pkgid);
	
	//get Items
	$getItems=$db->ExecuteQuery("SELECT PRC.Package_Id, PRC.Category_Id, C.Category_Name	
	FROM package_relation_category PRC
	RIGHT JOIN categories C ON PRC.Category_Id = C.Category_Id
	WHERE PRC.Package_Id=".$pkgid);
	
?>

<script>
	$(document).ready(function(e) {
		
		$(document).on("click","#payment", function(){
			
			var storeIds = [];
			$("#itemsBlock").find(".catradio").each(function(index, element) {
				if($(this).is(":checked"))
				{
                	storeIds.push($(this).val());
				}
            });
			
			$("#proIds").val(storeIds);
			var uid = $("#uid").val();
			
			//alert(uid);
			
			if(uid!=""){
				$("#gridSystemModal").modal('show');
				$("#usersignin").hide('slow');
				$("#shippingAddress").show('slow');
			}
			else{
				$("#gridSystemModal").modal('show');
			}
		})//eof click event
		
		
    });//eof of ready function
</script>
<!--<script src="../dist/js/lightbox-plus-jquery.min.js"></script>
<link rel="stylesheet" href="../dist/css/lightbox.min.css">-->

   <!-- Page header Section Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="entry-title"><?php echo $getpkgname[1]['Package_Name']; ?></h2>
                    <div class="breadcrumb">
                        <a href="index.php"><i class="icon-home"></i> Home</a>
                        <span class="crumbs-spacer"><i class=
                        "ico-fast-forward"></i></span> <span class=
                        "current"><?php echo $getpkgname[1]['Package_Name']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Page header Section End -->
    <!-- Content Start -->
    <div id="content">
    	<div class="container">
        	<article class="single-post-content">
            	<div id="itemsBlock">
                    <form class="form-horizontal form-label-left" action="" method="post" id="itemsform">
                     <input id="packageId" type="hidden" value="<?php echo $getpkgname[1]['Package_Id']; ?>" />
                     <input id="pkgAmt" type="hidden" value="<?php echo $getpkgname[1]['New_Price']; ?>" />
                     <input id="proIds" type="hidden" value="" />
                     
                    <?php 
                    foreach($getItems as $getItemsVal){ ?>
                        <div style="margin-bottom:50px; padding-bottom:20px; border-bottom:solid 1px #F2F2F2;">
                            <div><h4><?php echo $getItemsVal['Category_Name']; ?></h4></div>
                            <?php
                            //get products
                            $getProducts=$db->ExecuteQuery("SELECT Product_Id, Product_Image	
                            FROM product_master WHERE Category_Id=".$getItemsVal['Category_Id']);
                            
                            $i=1;
                            foreach($getProducts as $getProductsVal){ ?>
                            <div class="col-sm-3"><div style="border:solid 1px #F2F2F2; padding:10px; margin-bottom:20px;"><input type="radio" name="cat<?php echo $getItemsVal['Category_Id'] ?>" class="catradio" value="<?php echo $getProductsVal['Product_Id'] ?>" <?php if($i==1){echo 'checked';} ?>> <div style="height:150px; overflow:hidden;"><a class="example-image-link" href="image_upload/product/<?php echo $getProductsVal['Product_Image'] ?>" data-lightbox="example-1"><img src="image_upload/product/thumb/<?php echo $getProductsVal['Product_Image'] ?>" alt=""></a></div></div></div>
                            <?php $i++; } ?>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    <?php } ?>
                    
                        <div class="text-center"><button type="button" id="payment" class="btn btn-lg btn-success">Proceed to Payment</button></div>
                    </form>
                </div>
            </article>
        </div>
    </div>
	<!-- Content End -->
   
<?php 
require_once(PATH_INCLUDE."/footer.php");

?>
