<?php 
include('config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(PATH_INCLUDE.'/header.php');

	foreach($getMenu as $val2){
		if(basename(__FILE__)==$val2["File_Name"]){  $pagename=$val2["Menu_Name"]; $menu=$val2["Menu_Id"]; }
	}
//get Here Page Details
$getPage=$db->ExecuteQuery("SELECT * FROM pages WHERE Menu_Id=$menu");

//######################################################
//##########  Email Send HEre ##########################
//######################################################
$getEmail=$db->ExecuteQuery("SELECT * FROM contact_email WHERE Status=1");

$mgs='';
$display='none';
if(isset($_REQUEST['submit']))
{
	//header('Content-type: application/json');
	
    $name       = @trim(stripslashes($_POST['name'])); 
    $email      = @trim(stripslashes($_POST['email'])); 
    $subject    = @trim(stripslashes($_POST['subject'])); 
    $message    = @trim(stripslashes($_POST['message'])); 

    $email_from = $email;
    $email_to = $getEmail[1]['Email_Id'];//replace with your email

    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

    $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');
	if($success)
	{
		$mgs='Thank you for contact us. As early as possible  we will contact you ';
	
	}
	else
	{
		$mgs='Your form is not submitted please try again!!';
	
	
	}
	
$display='block';

}

?>
<!-- Page header Section Start -->

<div class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="entry-title"><?php echo $pagename;?></h2>
        <div class="breadcrumb"> <a href="index.php"><i class="icon-home"></i> Home</a> <span class="crumbs-spacer"><i class="ico-fast-forward"></i></span> <span class="current"><?php echo $pagename;?></span> </div>
      </div>
    </div>
  </div>
</div>
<!-- Page header Section End --> 
<!-- Content Start -->
<div id="content">
  <div class="container middle-content">
    <div class="row"><!-- Contact Info Start --> 
      
      <?php echo $getPage[1]["Details"]; ?> 
      <!-- Contact Info End -->
      <div class="col-md-8 col-md-offset-2 contact-form">
      <div class="status alert alert-success" style="display: <?php echo $display;?>"><?php echo $mgs;?></div>
        <form id="contactForm" class="shake" name="contactForm" data-toggle="validator">
          <div class="col-md-12">
            <div class="form-group">
              <input id="name" class="form-control" required="" name="name" type="text" placeholder="Your Name" data-error="Please enter your name" />
              <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group">
              <input id="email" class="form-control" required="" type="email" placeholder="Your Email" data-error="Please enter your email" name="email" />
              <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group">
              <input id="subject" class="form-control" required="" type="text" placeholder="Subject" data-error="Please enter your message subject"  name="subject"/>
              <div class="form-group">
                <textarea class="form-control" data-error="Write your message" id="message" placeholder="Massage" required="" rows="5" name="message"></textarea>
                <div class="help-block with-errors"></div>
              </div>
              <div class="help-block with-errors">&nbsp;</div>
            </div>
            <div class="form-group">&nbsp;</div>
          </div>
          <div class="col-md-12">
            <button id="submit" class="btn btn-common btn-sn" type="submit" name="submit" value="submit">Send Message</button>
            <div id="msgSubmit" class="h3 text-center hidden">&nbsp;</div>
            <div class="clearfix">&nbsp;</div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php 
require_once(PATH_INCLUDE.'/footer.php');

?>
