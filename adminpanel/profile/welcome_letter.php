<?php 
include('../../config.php');
require_once(PATH_LIBRARIES.'/classes/DBConn.php');
$db = new DBConn();
require_once(MEMBER_PATH_INCLUDE.'/header.php');

  $sql = "SELECT CL.*, CONCAT(IFNULL(CL.Title,''),' ', IFNULL(CL.First_Name,''),' ',IFNULL(CL.Last_Name,'')) AS User_Name, DATE_FORMAT(CL.dob,'%d-%m-%Y') AS dob,DATE_FORMAT(CL.Join_Date,'%d-%m-%Y') AS Join_Date,CBA.Address2, CM.Country_Name, SM.State_Name, CiM.City_Name, CBA.pin_code, CONCAT(IFNULL(CBA.MCode,''),' - ',CBA.Mobile_No) AS Mobile, CONCAT(IFNULL(CBA.LCode,''),' - ',CBA.Landline_No) AS Phone ,(SELECT User_Id FROM customer_login WHERE Login_Id=CL.Sponser_Id) AS Sponser_Id  ,(SELECT User_Id FROM customer_login CL2 WHERE CL2.Login_Id=CoM.Login_Id) AS Co_Ordinator FROM `customer_login` CL left join  pin_type PT on  PT.id=CL.pin_type LEFT JOIN customer_billing_address CBA ON CBA.Login_Id=CL.Login_Id LEFT JOIN country_master CM ON CM.Country_Id=CBA.Country_Id 
	   LEFT JOIN state_master SM ON SM.State_Id=CBA.State_Id 
	   LEFT JOIN city_master CiM ON CiM.City_Id=CBA.City_Id 
	   LEFT JOIN cordinator_member CoM ON Com.Cor_Id=CL.Co_ordinator_Id
	   where CL.`Login_Id`='".$_SESSION['user']."'";
				
$obj = $db->ExecuteQuery($sql);
?>
<script language="javascript">
function printme()
{
    window.print();
}
</script>
<style type="text/css">

        @media print 
        {
			html, body { overflow-x: hidden; }
	        .noprint {display: none}
			.lg{ width:100% !important;  margin-left:0 !important;}
			.skin-red-light .content-wrapper, .skin-red-light .main-footer{  margin-left:0 !important;}
        }
        </style>
<div class="col-sm-10 col-sm-offset-2 lg">
  <section class="content-header">
    <h1>WELCOME LETTER</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo PATH_MEMBER;?>/index.php"><i class="fa fa-user"></i> My Account</a></li>
      <li class="active">Welcome Letter</li>
    </ol>
  </section>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- ****************page data put here************** -->
        <div class="col-md-10 col-sm-offset-1 ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">WELCOME TO CRESTERA</h3>
            </div>
            <!-- /.box-header -->
            <div class="table-responsive">
              <table style="font-family: Verdana; width: 660px; height: 826px;" align="center" border="0" cellpadding="5" cellspacing="0">
                <tbody>
                  <tr>
                    <td colspan="3" style="font-size: 12px; height: 31px;"><br>
                      To, </td>
                  </tr>
                  <tr>
                    <td style="font-size: 12px; padding-right: 1px;"> Memberid</td>
                    <td style="width: 8px; font-size: 12px; padding-left: 3px;"> :</td>
                    <td style="padding-left: 3px; font-size: 12px; width: 624px;"><span id="lblMemno"> <span id="Lbl_Memid"><?php echo $obj[1]['User_Id']; ?></span></span></td>
                  </tr>
                  <tr>
                    <td style="padding-right: 1px; font-size: 12px;"> Member Name</td>
                    <td style="padding-left: 3px; font-weight: bold; font-size: 13px; width: 8px;"> :</td>
                    <td style="padding-left: 3px; font-size: 12px; width: 624px;"><span id="lblName"> <span id="Lbl_memname"><?php echo $obj[1]['User_Name']; ?></span></span></td>
                  </tr>
                  <tr>
                    <td style="padding-right: 1px; font-size: 12px; vertical-align: top;"> Address</td>
                    <td style="padding-left: 3px; vertical-align: top; font-weight: bold; font-size: 12px; width: 8px;"> :</td>
                    <td style="padding-left: 3px; vertical-align: top; font-size: 12px; width: 624px;"><span id="lblMemAdd">
                      <textarea name="Txt_Address" id="Txt_Address" cols="20" style="height: 64px;" readonly="readOnly"><?php echo $obj[1]['Address2']; ?></textarea>
                      </span></td>
                  </tr>
                  <tr>
                    <td style="padding-right: 1px; font-size: 12px;"> City</td>
                    <td style="padding-left: 3px; font-size: 12px; width: 8px;"> :</td>
                    <td style="padding-left: 3px; font-size: 12px; width: 624px;"><span id="lblCity"> <span id="Lbl_city"><?php echo $obj[1]['City_Name']." ,".$obj[1]['State_Name'].","." ,".$obj[1]['Country_Name'].","; ?></span></span></td>
                  </tr>
                  <tr>
                    <td style="padding-right: 1px; font-size: 12px;"> Pincode</td>
                    <td style="padding-left: 3px; font-weight: bold; font-size: 12px; width: 8px;"> :</td>
                    <td style="padding-left: 3px; font-size: 12px; width: 624px;"><span id="lblPin"> <span id="Lbl_pincode"><?php echo $obj[1]['pin_code']; ?></span></span></td>
                  </tr>
                  <tr>
                    <td colspan="3" style="font-weight: normal; font-size: 12px; text-align: center;"><br>
                      <u> <span id="Label1">Label</span>Sub:- Allotment of code of Member No. <span id="lblMemNo2"> <span id="Lbl_memid1"><?php echo $obj[1]['User_Id']; ?></span></span></u> </td>
                  </tr>
                  <tr>
                    <td colspan="3" style="font-size: 12px;"><div style="font-size: 12px; text-align: justify;"> <br>
                        <p>Sir/Madam,</p>
                        <p>Your application dated <span id="Lbl_doj"><?php echo $obj[1]['Join_Date']; ?></span><span id="lblDOJ1"></span> is received. After scrutinizing the same you are found to be competent person.</p>
                        <p>Given
                          below are the user Id No. along with other details for accessing your
                          account &amp; any related information at our Official website :<b><?php echo $_SERVER['SERVER_NAME'];?></b>. we suggest you to change your password immediately &amp; if any problem relating to login occurs, 
                          &amp; you need any asistance please do not hesitate to contact us at our Email Id :<strong><span style="font-size: 11pt;">support@crestera.com&nbsp;</span></strong></p>
                        <p style="margin: 0in 0in 0pt; text-align: justify;"> <span></span> </p>
                        <p> <span><span style="font-size: 11pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span></span>Last
                          but not least you are a very important pillar of our Network marketing
                          System, it is very important that who soever works will be rewarded
                          with maximum returns, and it is very necessary for all members
                          including you to work hard to promote our products and earn maximum
                          income and assured payouts.</p>
                        <p>We wish you a healthy and prosperous future.</p>
                        <center>
                          <table width="472" border="1" cellpadding="1" cellspacing="1" style="border-style: solid; border-color: rgb(0, 0, 0); vertical-align: middle; background-color: transparent; text-align: center; width: 500px; margin-top:20px;">
                            <tbody>
                              <tr>
                                <td width="78" style="vertical-align: middle; width: 70px; text-align: center;"> ID No. </td>
                                <td width="99" style="vertical-align: middle; width: 88px; text-align: center;"> Sponser Id </td>
                                <td width="112" style="vertical-align: middle; width: 112px; text-align: center;"> Co-Ordinator </td>
                                <td width="94" style="vertical-align: middle; width: 72px; text-align: center;"> D.O.R </td>
                                <td width="83" style="vertical-align: middle; width: 72px; text-align: center;"> D.O.A </td>
                              </tr>
                              <tr>
                                <td style="vertical-align: middle; text-align: center;"><span id="lblidrec"><?php echo $obj[1]['User_Id']; ?></span> </td>
                                <td style="vertical-align: middle; text-align: center;"><span id="lblsponrec"><?php echo $obj[1]['Sponser_Id']; ?></span> </td>
                                <td style="vertical-align: middle; text-align: center;"><span id="lbl_side"><?php echo $obj[1]['Co_Ordinator']; ?></span> </td>
                                <td style="vertical-align: middle; text-align: center; width: 72px;"><st1:date day="15" month="11" w:st="on" year="2006"></st1:date>
                                  <span><span id="lbldojrec" style="text-align: left;"><?php echo $obj[1]['Join_Date']; ?></span></span> </td>
                                <td style="vertical-align: middle; text-align: center; width: 72px;"><?php  echo $obj[1]['Activation_Date']	?></td>
                              </tr>
                            </tbody>
                          </table>
                        </center>
                        <br>
                        <br>
                        <p> Yours Truly,<br>
                          Authorised Signature</p>
                        <p> Crestera<br>
                        </p>
                      </div>
                      <br>
                      <br>
                      <br>
                      <br>
                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Note:No
                      Signature is required as this is computer generated document</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="noprint" align="center">
              <input name="Button1" value="Print" onclick="printme();" id="Button1" type="submit">
            </div>
            <div>&nbsp;</div>
          </div>
          <!--************************* page data end here***************** -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- global_container ends here ** footer_container starts here -->
<?php include(MEMBER_PATH_INCLUDE.'/footer.php')?>
