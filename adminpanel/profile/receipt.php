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
<div class="lg col-sm-10 col-sm-offset-2">
  <section class="content-header">
    <h1> RECEIPT</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo PATH_MEMBER;?>/index.php"><i class="fa fa-user"></i> My Account</a></li>
      <li class="active">Receipt</li>
    </ol>
  </section>
  <div class="content">
    <div class="row">
      <div class="col-md-10 col-sm-offset-1">
        <form id="form1" name="form1" method="post">
          <!-- ****************page data put here************** -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title text-center ">Receipt</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <tr>
                    <td>Name</td>
                    <td><?php echo $obj[1]['User_Name']; ?></td>
                    <td  align="right">Date: <?php echo date('M d, Y'); ?></td>
                  </tr>
                  <tr>
                    <td>Invoice No:</td>
                    <td colspan="2"><?php echo "IME".$obj[1]['User_Id']; ?> </td>
                  </tr>
                  <tr>
                    <td>Date Of Registration:</td>
                    <td colspan="2"><?php echo $obj[1]['Join_Date']; ?></td>
                  </tr>
                  <!-- <tr>
    <td>Date Of Activation:</td>
    <td>&nbsp;</td>
    <td><?php echo $obj[1]['acdate']; ?></td>
    <td>&nbsp;</td>
  </tr>-->
                  <tr>
                    <td>Recieved With thanks from:</td>
                    <td colspan="2"> Crestera</td>
                  </tr>
                  <tr>
                    <td>Member Id:</td>
                    <td colspan="2"><?php echo $obj[1]['User_Id']; ?></td>
                  </tr>
                  <!-- <tr>
    <td>Amount Paid:</td>
    <td>&nbsp;</td>
    <td>
    <?php echo $obj[1]['value']?>
	
    </td>
    <td>&nbsp;</td>
  </tr>-->
                  <tr>
                    <td>Status:</td>
                    <td colspan="2"> Active </td>
                  </tr>
                  <tr> </tr>
                  <tr>
                    <td colspan="3">Note: No Signature is required as this is computer generated invoice</td>
                  </tr>
                  <tr>
                    <td colspan="3"  class="noprint" align="center"><input name="Button1" value="Print" onclick="printme();" id="Button1" type="submit">
                      &nbsp;</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- global_container ends here ** footer_container starts here -->
<?php include(MEMBER_PATH_INCLUDE.'/footer.php')?>
