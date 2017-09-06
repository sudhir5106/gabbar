<?php
session_start();
date_default_timezone_set('Asia/Calcutta');
define("SERVER",'localhost');
define("DBUSER",'root');//define(DBUSER,'kritipho_to');
define("DBPASSWORD",'');
define("DBNAME",'gabbar');
define("ROOT",$_SERVER['DOCUMENT_ROOT'].'/gabbar'); //FOR PHP ROOT LINK

define("PATH_LIBRARIES", ROOT.'/libraries');
define("PATH_USER", ROOT.'/user');
//define("PATH_CALANDER", '/calender');
define("PATH_LANGUAGES",ROOT.'/languages');
define("PATH_JS_LIBRARIES",'/gabbar/js');
define("PATH_CSS_LIBRARIES",'/gabbar/css');
define("PATH_IMAGE",'/gabbar/images'); // Images Link
define("PATH_ICON",'/gabbar/icon'); // ICON Link
define("PATH_FONTS",'/gabbar/fonts'); // FONTS Link
define("PATH_EXTRAS",'/gabbar/extras'); // EXTRAS Link
define("PATH_INCLUDE",ROOT.'/include');
define("PATH_TINYMCE",'/gabbar/js/tinymce');
//Admin Section
define("LINK_CONTROL", '/gabbar/adminpanel');
define("PATH_ADMIN", ROOT.'/adminpanel');
define("PATH_ADMIN_INCLUDE",PATH_ADMIN.'/include');
define("PATH_UPLOAD_IMAGE",'/gabbar/image_upload');

define("LINK_USER", '/gabbar/user');
//define(LINK_ROOT,'/demo'); //For HTML LINK
define("LINK_ROOT",'/gabbar'); //For HTML LINK
define("ROWS_PER_PAGE",10);
define("PAGELINK_PER_PAGE",10);
/*__________________________________*/

?>