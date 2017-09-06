 <?php
 $baseurl = basename($_SERVER['PHP_SELF']);
//GEt HEre All The Table Query 
$getLogo=$db->ExecuteQuery("SELECT * FROM `toplogo` WHERE Status=1");

//get here menu list
$getMenu=$db->ExecuteQuery("SELECT * FROM menu WHERE Status=1 ORDER BY Position ASC");

//Get Here Title And Favicon Image
$getTitle=$db->ExecuteQuery("SELECT T.Title_Name  FROM title T INNER JOIN menu M ON M.Menu_Id=T.Menu_Id WHERE File_Name='".basename($_SERVER['PHP_SELF'])."'");

//get Here favicon Image 
$extension='jpg';
$favicon='favicon.png';
$getfavicon=$db->ExecuteQuery("SELECT * FROM favicon WHERE Status=1");
	if(count($getfavicon)>0)
	{
	 	$extension=explode('.',$getfavicon[1]['Logo_Image']);
		$favicon=$getfavicon[1]['Logo_Image'];
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php if(count($getTitle)>0){ echo $getTitle[1]['Title_Name'];}else{ echo $getLogo[1]['Website_Name'];}?></title>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!-- Page Description and Author -->
    <meta content="Intimate - Bootstrap HTML5 Blog Template" name=
    "description">
    <meta content="GrayGrids" name="author"><!-- Bootstrap Css -->
    <link rel="icon"  type="image/<?php echo strtolower($extension);?>"  href="<?php echo PATH_UPLOAD_IMAGE.'/favicon/thumb/'.$favicon;?>" />
    <link href="<?php echo PATH_CSS_LIBRARIES ?>/bootstrap.min.css" madia="screen" rel="stylesheet" type="text/css"><!-- Font Icon Css -->
    <link href="<?php echo PATH_FONTS?>/font-awesome.min.css" madia="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo PATH_FONTS?>/intimate-fonts.css" madia="screen" rel="stylesheet" type="text/css">
    
    <!-- Owl Carousel -->
    <link href="<?php echo PATH_EXTRAS ?>/owl/owl.carousel.css" media="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo PATH_EXTRAS ?>/owl/owl.theme.css" media="screen" rel="stylesheet" type="text/css">
	<link href="<?php echo PATH_EXTRAS ?>/owl/owl.transitions.css" media="screen" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" href="<?php echo PATH_CSS_LIBRARIES ?>/owl.carousel.css" type="text/css">
	<link rel="stylesheet" href="<?php echo PATH_CSS_LIBRARIES ?>/owl.theme.default.min.css"  type="text/css" />
    
    <link href="<?php echo PATH_EXTRAS ?>/animate.css" media="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo PATH_EXTRAS ?>/lightbox.css" media="screen" rel="stylesheet" type="text/css">
    
    <!-- For Mobile Menu -->
    <link href="<?php echo PATH_EXTRAS ?>/slicknav.css" media="screen" rel="stylesheet" type="text/css">
    <!-- Responsive Css Styles -->
    <link href="<?php echo PATH_CSS_LIBRARIES ?>/responsive.css" madia="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo PATH_CSS_LIBRARIES ?>/jquery.fancybox.min.css" madia="screen" rel="stylesheet" type="text/css">
    <!-- Main Css Styles -->
    <link href="<?php echo PATH_CSS_LIBRARIES ?>/main.css" madia="screen" rel="stylesheet" type="text/css">
    <!--<link href="<?php //echo PATH_CSS_LIBRARIES ?>/gallery_index.css" madia="screen" rel="stylesheet" type=
    "text/css">-->
    
    
    <script src="<?php echo PATH_JS_LIBRARIES ?>/jquery-1.10.2.js"></script>
	<script src="<?php echo PATH_JS_LIBRARIES?>/owl.carousel.js" type="text/javascript"></script>
	<script src="<?php echo PATH_JS_LIBRARIES ?>/owl.carousel.min.js"></script>
    <script src="<?php echo PATH_JS_LIBRARIES ?>/jquery.flexslider.js" type="text/javascript"></script>
    <script src="<?php echo PATH_JS_LIBRARIES; ?>/jquery.validate.js"></script>
    
    <script>
    	$(document).ready(function(e) {
		
			$(document).on("click","#signup", function(){
				event.preventDefault();
				$("#gridSystemModal").modal('show');
			});
			
			$(document).on("click",".signin", function(){
				event.preventDefault();

				$("#successmsg").hide('slow');
				$("#usersignin").show('slow');
				
				$("#addCustomer").trigger('reset');
				$("#email").focus();
			});
			
			//////////////////////////////
			//code for login
			//////////////////////////////
			$(document).on("click","#login", function(){
				
				var formdata = new FormData();
				formdata.append('type', "login");
				formdata.append('email', $("#email").val());
				formdata.append('userpass', $("#userpass").val());
				
				var x;
				
				$.ajax({
				   type: "POST",
				   url: "user_curd.php",
				   data:formdata,
				   success: function(data){ //alert(data);
					   x=data;
					   if(x==1){
						   location.reload(); 
					   }
				   },
				   cache: false,
				   contentType: false,
				   processData: false	
				});//eof ajax
				
			});
			
			//////////////////////////////
			//code for user registration
			//////////////////////////////
			$(document).on("click","#register", function(){
				
				var formdata = new FormData();
				formdata.append('type', "register");
				formdata.append('username', $("#username").val());
				formdata.append('useremail', $("#useremail").val());
				formdata.append('mobile', $("#mobile").val());	
				formdata.append('pass', $("#pass").val());	
				
				var x;
				
				$.ajax({
				   type: "POST",
				   url: "user_curd.php",
				   data:formdata,
				   success: function(data){
					   x=data;
					   if(x==1){
						   //location.reload();
						   $("#usersignin").hide('slow');
						   $("#successmsg").show('slow');
					   }
				   },
				   cache: false,
				   contentType: false,
				   processData: false
				});//eof ajax
				
			});
			
			//////////////////////////////
			//code for signout
			//////////////////////////////
			$(document).on("click","#signout", function(){
				var formdata = new FormData();
				formdata.append('type', "signout");
				
				var x;
				
				$.ajax({
				   type: "POST",
				   url: "<?php echo LINK_ROOT; ?>/user_curd.php",
				   data:formdata,
				   success: function(data){
					   x=data;
					   if(x==1){
						   
						   location.reload();
					   }
				   },
				   cache: false,
				   contentType: false,
				   processData: false
				});//eof ajax
			});// eof signout code
			
			////////////////////////////////////
			// validation for shipping address
			////////////////////////////////////
			$("#addShipping").validate({
				rules: 
				{ 
					uname: 
					{ 
						required: true,
					},
					uemail: 
					{ 
						required: true,
					},
					umobile: 
					{ 
						required: true,
					},
					uShipAddress:
					{
						required: true,
					}
				},
				messages:
				{
					
				}
			});// eof validation
			
			//////////////////////////////
			//code for shipping address
			//////////////////////////////			
			$(document).on("click","#continue", function(){
				
				flag=$("#addShipping").valid();
		
				if (flag==true)
				{ 
				
					var formdata = new FormData();
					formdata.append('type', "shippingAddress");
					formdata.append('useruid', $("#useruid").val());
					formdata.append('uname', $("#uname").val());
					formdata.append('uemail', $("#uemail").val());
					formdata.append('umobile', $("#umobile").val());	
					formdata.append('uShipAddress', $("#uShipAddress").val());
					
					formdata.append('packageId', $("#packageId").val());
					formdata.append('pkgAmt', $("#pkgAmt").val());
					formdata.append('proIds', $("#proIds").val());
					
					var x;
					
					$.ajax({
					   type: "POST",
					   url: "user_curd.php",
					   data:formdata,
					   success: function(data){ //alert(data);
						   x=data;
						   window.location.replace("payment/PayUMoney_form.php?id="+x);						   
					   },
					   cache: false,
					   contentType: false,
					   processData: false
					});//eof ajax				
				}
			});// eof shipping address
			

		});//eof ready function
    </script>
    
</head>
<body <?php if($baseurl=='PayUMoney_form.php'){ ?> onLoad="submitPayuForm()" <?php } ?>>
    <!-- Header Section Start -->
    <header class="site-header">
        <nav class="navbar navbar-default navbar-intimate role="
        data-offset-top="50" data-spy="affix">
            <div class="container" style="position:relative;">
            	
                <?php if(!isset($_SESSION['userId'])){ ?>
                <!-- login and signup button -->
                <div id="login-panel" style="position:absolute; right:0;">
                    <div><a class="btn btn-sm btn-warning" id="signup">Login/Sign up</a></div>
                </div>
                
                
                <?php } else{?>
                <!-- logout and my account button -->
                
                <div id="logout-panel" style="position:absolute; right:0; width:190px;">
                	<div><a href="<?php echo LINK_USER;?>" class="btn btn-sm btn-success pull-left">My Account</a></div>
                    <div><a class="btn btn-sm btn-danger pull-left" id="signout">Logout</a></div>
                </div>
                
                <?php } ?>
                
                <input type="hidden" id="uid" value="<?php if(isset($_SESSION['userId'])){echo $_SESSION['userId'];} ?>" />
                
                <div id="gridSystemModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" style="display: none;" aria-hidden="false">
                  <div class="modal-dialog modal-lg" role="document">
                    
                    <div class="modal-content" id="usersignin">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="gridModalLabel">Sign up or Login to get Booking</h4>
                        </div>
                        <div class="modal-body">
                                    
            
                            <!--  ///////////////signup containt here-->
                            <div class="col-sm-5">
                               <h4>Sign up for new account</h4>
                               <form id="addCustomer" novalidate="novalidate">
                                <div class="form-group">
                                      <input type="text" placeholder="Name" name="username" id="username" class="form-control">
                                    </div>
                                <div class="form-group">
                                      <input type="text" placeholder="Email ID" name="useremail" id="useremail" class="form-control">
                                    </div>
                                <div class="form-group">
                                      <input type="password" placeholder="Password" name="pass" id="pass" class="form-control">
                                    </div>
                                <div class="form-group">
                                      <input type="text" placeholder="Mobile No" name="mobile" id="mobile" class="form-control">
                                    </div>
                                
                                <div class="form-group">
                                      <button type="button" class="btn btn-danger" id="register">Sign up</button>
                                    </div>
                                <div class="clearfix"></div>
                              </form>
                            </div>
                            
                        	<!--  ///////////////signup end signin containt start here-->
                            <div class="col-sm-5 col-sm-offset-2">
                               <h4>Sign in to your account</h4>
                               <form>
                                <div class="alert alert-danger alert-dismissable" id="msg" style="display: none;"> <a href="#" class="close" data-dismiss="alert">×</a> </div>
                                <div class="form-group">
                                      <input type="text" placeholder="Email ID" class="form-control" id="email" name="email" value="">
                                </div>
    
                                <div class="form-group">
                                      <input type="password" placeholder="Password" class="form-control" id="userpass" name="userpass">
                                </div>
                                
                                <div class="form-group">
                                      <button type="button" class="btn btn-success " id="login" data-toggle="modal" data-target="#pay-sm">Sign In</button>
                                </div>
                                <!--<div class="form-group or-box"> <a id="forget" href="#" class="need-help">Forgot Password ? </a> </div>-->
                                <div class="clearfix"></div>
                              </form>
                            </div>
                        
                        <!--/////////////////////////////End Of Login/////////////////////////// --> 
                        
                      </div>
                      <div class="clearfix"></div>
                    </div>
                
                    <!--/////////////////////////////End of Sign up/////////////////////////// -->
                    
                    <div class="modal-content modal-dialog modal-sm" id="userforgetpass" style="display: none;">
                          <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="gridModalLabel">Enter Your Registered Email ID </h4>
                      </div>
                          <div class="alert alert-success alert-dismissable" id="msgforget" style="display:none"> </div>
                          <div class="modal-body">
                        <div class="col-sm-12">
                              <form class="form-horizontal" role="form" method="post" id="forgetpwd" novalidate="novalidate">
                            <div class="form-group has-feedback">
                                  <label>Email ID</label>
                                  <input type="text" name="useremailforforget" id="useremailforforget" class="form-control" placeholder="Enter Registered(Email Address)">
                                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span> </div>
                            <div class="form-group">
                                  <button type="button" class="btn btn-danger btn-block" id="send">Send</button>
                                </div>
                            <div class="clearfix"></div>
                          </form>
                            </div>
                      </div>
                          <div class="clearfix"></div>
                        </div>
                    
                    <!--/////////////////////////////End Forget Password/////////////////////////// -->
                    
                    <div class="modal-content" id="successmsg" style="display: none;">
                          <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="gridModalLabel">Success </h4>
                      </div>
                          <div class="modal-body">
                        <section class="content">
                              <div align="center" class="min-height">
                            <h2> <i class="fa fa-check-circle text-green"></i> <font class="text-green"><strong>Congratulations!</strong></font></h2>
                            <h4> Your Account has been Registered with us Successfully.
                                  
                                  Please click here to <a class="signin" style="cursor:pointer;">Sign In</a> </h4>
                          </div>
                            </section>
                      </div>
                          <div class="clearfix"></div>
                        </div>
                        
                    
                    <!--////////// Shipping Address //////// -->
                    <div class="modal-content" id="shippingAddress" style="display: none;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="gridModalLabel">Shpping Address</h4>
                          </div>
                          <div class="modal-body">
                            <section class="content">
                              <article>
                              	<?php 
								//check user exist or not in shipping table
								$checkUser = $db->ExecuteQuery("SELECT User_Id FROM shipping_address WHERE User_Id=".$_SESSION['userId']);
								
								if(!$checkUser){
									$getUserInfo = $db->ExecuteQuery("SELECT User_Id, User_Name, User_Email, User_Mobile, User_Address FROM user_registration WHERE User_Id=".$_SESSION['userId']); 
								}
								else{
									$getUserInfo = $db->ExecuteQuery("SELECT Name AS User_Name, Email AS User_Email, Mobile_No AS User_Mobile, Address AS User_Address, User_Id FROM shipping_address WHERE User_Id=".$_SESSION['userId']); 
								}
								?>
                              
                              	<form id="addShipping" novalidate="novalidate">
                                	
                                    <input type="hidden" id="useruid" value="<?php echo $getUserInfo[1]['User_Id'] ?>">
                                	
                                	<div class="col-sm-8 block-center">
                                        <div class="form-group">
                                          <label>Full Name</label>
                                          <input type="text" class="form-control" id="uname" name="uname" value="<?php echo $getUserInfo[1]['User_Name'] ?>" placeholder="Enter Full Name">
                                        </div>
            
                                        <div class="form-group">
                                           <label>Email</label>
                                           <input type="text" class="form-control" id="uemail" name="uemail" value="<?php echo $getUserInfo[1]['User_Email'] ?>" placeholder="Email" >
                                        </div>
                                        
                                        <div class="form-group">
                                           <label>Mobile No.</label>
                                           <input type="text" class="form-control" id="umobile" name="umobile" value="<?php echo $getUserInfo[1]['User_Mobile'] ?>" placeholder="Mobile No." >
                                        </div>
                                        
                                        <div class="form-group">
                                           <label>Shipping Address</label>
                                           <textarea style="height:150px;" class="form-control" id="uShipAddress" name="uShipAddress" placeholder="Enter Shipping Address"><?php echo $getUserInfo[1]['User_Address'] ?></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                              <button type="button" class="btn btn-success" id="continue" data-toggle="modal">Continue</button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                              </article>
                            </section>
                      	  </div>
                          <div class="clearfix"></div>
                        </div>
                    <!--////////// eof Shipping Address //////// -->
                  </div>
                </div>
                
                
                
                
            
                <div class="navbar-header">
                    <!-- Start Toggle Nav For Mobile -->
                     <button class="navbar-toggle" data-target="#navigation"
                    data-toggle="collapse" type="button"><span class=
                    "sr-only">Toggle navigation</span> <span class=
                    "icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                    <div class="logo">
                    <!--Brand Logo-->
                    <?php if(count($getLogo)>0){
							if($getLogo[1]['Logo_Image']!='')
							{
							?>
                        <a class="navbar-brand col-sm-3" href="<?php echo LINK_ROOT;?>">
                    		<img class="img-responsive" src="<?php echo PATH_UPLOAD_IMAGE.'/logo/'.$getLogo[1]['Logo_Image']; ?>" />
                        </a>
                        <?php } }?>
                        <!--Brand Title -->
                        <?php if(count($getLogo)>0){?>
                        <a class="navbar-brand-title col-sm-5" href="<?php echo LINK_ROOT;?>"><?php echo $getLogo[1]['Website_Name']?></a>
                        <?php } ?>
                        <div class="clearfix"></div>
                    </div>
                </div><!-- Stat Search -->
              <?php /* <div class="side">
                    <a class="show-search"><i class="ico-search"></i></a>
                </div><!-- Form for navbar search area -->
                <form class="full-search">
                    <div class="container">
                        <div class="row">
                            <input class="form-control" placeholder="Search"
                            type="text"> <a class="close-search"><span class=
                            "ico-times"></span></a>
                        </div>
                    </div>
                </form><!-- Search form ends -->*/?>
                <!-- Navigation Start -->
                <div class="navbar-collapse collapse" id="navigation">
                    <ul class="nav navbar-nav navbar-right">
                       <?php $i=1;foreach($getMenu as $val){ ?>
                       
                        <li class="<?php $path=$_SERVER['PHP_SELF'];  if(basename($path)==$val["File_Name"]){  echo "active";  } ?>">
                            <a  href=
                            "<?php if(file_exists(ROOT.'/'.$val['File_Name'])){ echo LINK_ROOT.'/'.$val['File_Name'];}else{ echo "#";} ?>"><?php echo $val['Menu_Name'];?></a>
                        </li>
                        <?php $i++;} ?>
                       
                      <?php /* <li class="dropdown dropdown-toggle">
                            <a data-toggle="dropdown" href="#">Blog</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="blog.html">Blog View</a>
                                </li>
                                <li>
                                    <a href="single.html">Single Post</a>
                                </li>
                            </ul>
                        </li>*/?>
                        
                    </ul>
                </div><!-- Navigation End -->
            </div>
        </nav><!-- Mobile Menu Start -->
        <ul class="wpb-mobile-menu">
           <?php $i=1;foreach($getMenu as $val){ ?>
                       
                <li class="<?php  if(basename(__FILE__)==$val["File_Name"]){  echo "active";  } else if($i==1){ echo "active";}?>">
                    <a  href=
                    "<?php if(file_exists(ROOT.'/'.$val['File_Name'])){ echo LINK_ROOT.'/'.$val['File_Name'];}else{ echo "#";} ?>"><?php echo $val['Menu_Name'];?></a>
                </li>
           <?php $i++;} ?>
        </ul><!-- Mobile Menu End -->
    </header><!-- Header Section End -->
