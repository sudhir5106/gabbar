<?php 

	require_once(PATH_ADMIN_INCLUDE.'/head.php');
	//Check Here If Admin is authorised or not
	if(empty($_SESSION['admin']))
	{?>
<script>
			window.location.href = '<?php echo LINK_CONTROL.'/login/index.php'; ?>';
		</script>
<?php } ?>
<script>
	$(document).ready(function() {
		$("#logoff").click(function(){
			$.ajax(
			{
				url:'<?php echo LINK_CONTROL.'/login/logout.php'; ?>',
				type:'POST',
				data:{},
				async:false,
				success:function(data){
				if (data=="true")
					{
						document.location.href='<?php echo LINK_CONTROL.'/login/index.php'; ?>';
					}
				}
			});//eof ajax
		});// eof click function
	});// eof ready function
</script>
<?php
//GEt HEre Admin Personal Details 
$getPer=$db->ExecuteQuery("SELECT *,  CASE WHEN Profile_Image IS NOT NULL && Profile_Image!=0 THEN Profile_Image ELSE 'profile.jpg' END Profile_Image , CONCAT(City,' , ', Country) AS Address FROM admin_login");


?>
<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;"> <a href="index.php" class="site_title"><i class="fa fa-laptop"></i> <span>Admin</span></a> </div>
    <div class="clearfix"></div>
    
    <!-- menu prile quick info -->
    <div class="profile">
      <div class="profile_pic"> 

        <img src="<?php echo PATH_UPLOAD_IMAGE.'/profile/'.$getPer[1]['Profile_Image'];?>" alt="..." class="img-circle profile_img"> </div>
      <div class="profile_info"> <span>Welcome,</span>
        <h2><?php echo $_SESSION['admin_name']?></h2>
      </div>
    </div>
    <!-- /menu prile quick info --> 
    
    <br />
    
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a href="index.php"><i class="fa fa-home"></i> Dashboard</a></li>
          <li><a><i class="fa fa-maxcdn" aria-hidden="true"></i> Master <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu" style="display: none">
            <li><a href="<?php echo LINK_CONTROL?>/master/favicon/index.php">Set Favicon </a> </li>
            <li><a href="<?php echo LINK_CONTROL?>/master/title/index.php">Page Title </a> </li>
              <li><a href="<?php echo LINK_CONTROL?>/master/toplogo/index.php">Top Logo</a> </li> 
              <li><a href="<?php echo LINK_CONTROL?>/master/menu/">Menu</a> </li>
              <li><a href="<?php echo LINK_CONTROL?>/master/social/list.php">Social Media </a> </li>
              <li><a href="<?php echo LINK_CONTROL?>/master/slider/list.php">Slider</a> </li>
              <li><a href="<?php echo LINK_CONTROL?>/master/gallery/list.php">Gallery</a> </li>
              <li><a href="<?php echo LINK_CONTROL?>/master/contact_email/index.php">Set Contact Email Id</a> </li>
              <li><a href="<?php echo LINK_CONTROL?>/master/footer/index.php">Footer</a></li>
              <li><a href="<?php echo LINK_CONTROL?>/master/visitor_counter/index.php">Set Visitor Count</a> </li>
            </ul>
          </li>
          
          <li><a><i class="fa fa-tags" aria-hidden="true"></i> Product Category <span class="fa fa-chevron-down"></span></a>
          	<ul class="nav child_menu" style="display: none">
            	<li><a href="<?php echo LINK_CONTROL?>/master/category">Add Category</a></li>
            </ul>
          </li>
          
          
          <li><a><i class="fa fa-product-hunt" aria-hidden="true"></i> Products<span class="fa fa-chevron-down"></span></a>
          	<ul class="nav child_menu" style="display: none">
            	<li><a href="<?php echo LINK_CONTROL?>/product">Add Products</a></li>
            </ul>
		  </li>
          
          <li><a><i class="fa fa-gift" aria-hidden="true"></i> Package <span class="fa fa-chevron-down"></span></a>
          	<ul class="nav child_menu" style="display: none">
            	<li><a href="<?php echo LINK_CONTROL?>/package">Add Package</a></li>
            </ul>
          </li>
          
          <li><a><i class="fa fa-file-text" aria-hidden="true"></i> Pages <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu" style="display: none">
              <li><a href="<?php echo LINK_CONTROL?>/pages/addnew.php">Create New Page</a></li>
              <li><a href="<?php echo LINK_CONTROL?>/pages/index.php">List Of Page</a></li>
            </ul>
          </li>
          <li><a href="<?php echo LINK_CONTROL?>/tracks"> <i class="fa fa-eye" aria-hidden="true"></i>Track Visitor</a> </li>
          <li><a href="<?php echo LINK_CONTROL?>/users"> <i class="fa fa-user" aria-hidden="true"></i>Users</a> </li>
          <li><a href="<?php echo LINK_CONTROL?>/orders"> <i class="fa fa-user" aria-hidden="true"></i>Orders</a> </li>
          <li><a href="<?php echo LINK_CONTROL?>/profile"><i class="fa fa-user" aria-hidden="true"></i>Profile </a></li>
          <li><a href="<?php echo LINK_CONTROL?>/login/changepassword.php"> <i class="fa fa-lock" aria-hidden="true"></i>Change Password</a> </li> 
       
        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
    <!-- /sidebar menu --> 
  </div>
</div>

<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav class="" role="navigation">
      <div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
      <ul class="nav navbar-nav navbar-right">
        <li class=""> <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> 
          <img src="<?php echo PATH_UPLOAD_IMAGE.'/profile/'.$getPer[1]['Profile_Image']?>" alt=""><?php echo $_SESSION['admin_name']?><span class=" fa fa-angle-down"></span> </a>
          <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
             <li><a href="<?php echo LINK_CONTROL?>/profile/"> Profile</a> </li>
             <li><a href="<?php echo LINK_CONTROL?>/login/changepassword.php"> Change Password</a> </li>
           <!-- <li> <a href="javascript:;"> <span class="badge bg-red pull-right">50%</span> <span>Settings</span> </a> </li>
            <li> <a href="javascript:;">Help</a> </li>-->
            <li><a href="#" id="logoff"><i class="fa fa-sign-out pull-right"></i> Log Out</a> </li>
          </ul>
        </li>
      </ul>
      </li>
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation --> 
<!-- page content -->
<div class="right_col" role="main">
